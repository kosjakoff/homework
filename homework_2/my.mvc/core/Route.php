<?php

namespace core;

use \core\ConfigRoutes;

class Route {

    private static $instance;
    private $routes;

    private function __construct() {
        $this->routes = ConfigRoutes::route();
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function route() {
        $uri = trim($_SERVER["REQUEST_URI"], " \t\r\n\\/");
        $routes = $this->routes[$_SERVER["REQUEST_METHOD"]];
        
        if($routes !== null){
            foreach($routes as $route) {
                if(preg_match("#^" . $route["uri"] ."$#", $uri)) {
                    
                    $params = preg_replace("#^".$route["uri"]."$#", $route["params"], $uri);
                    $route["params"] = $params;
                    
                    return $route;
                }
            }
        }
        return $route = [];
    }
    
    public function render() {
        $route = $this->route();
        
        foreach ($route as $key=>$value) {
            $$key = $value;
        }
        
        if(class_exists($controller)) {
            $controller = new $controller();
        } else {
            $controller = new \controllers\Error();
            $action = "error_404";
        }
        
        if(method_exists($controller, $action)){
            $params = explode("/", $params);
            $contents = call_user_func_array([$controller, $action], $params);
            
            if (!$contents) {                           // is content
                $controller = new \controllers\Error();
                $action = "error_404";
                $controller->$action;
            }
            
        } else {
            throw new \Exception("Action with name: " . $action . " not found"); 
        }
        
        if (isset($controller->tamplate) && file_exists("views/" . $controller->tamplate . ".php")){
            require_once("views/" . $controller->tamplate . ".php");
        } elseif (isset($action)) {
            require("views/" . $action . ".php");
        }
        
    }
}
