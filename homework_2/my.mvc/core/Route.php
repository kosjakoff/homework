<?php

namespace core;

use \core\Config;

class Route {

    private static $instance;
    private $routes;

    private function __construct() {
        $this->routes = Config::route();
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
}
