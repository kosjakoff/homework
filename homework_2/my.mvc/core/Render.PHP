<?php
// больше не нужен
namespace core;

use \core\Route;

class Render {
    
    protected $route;
    
    public function __construct() {
        $this->route = Route::getInstance()->route();
    }
    
    public function init() {
        
        foreach ($this->route as $key=>$value) {
            $$key = $value;
        }
        
        if(class_exists($controller)) {
            $controller = new $controller();
        }
        else {
            $controller = new \controllers\Error();
            $action = "error_404";
        }
        
        if(method_exists($controller, $action)){
            $params = explode("/", $params);
            $contents = call_user_func_array([$controller, $action], $params);
        }
        else {
            throw new \Exception("Action with name: " . $action . " not found"); 
        }
        
        require_once("views/header.php");
        
        if ($action) {
            require("views/" . $action . ".php");
        }
        require_once("views/footer.php");
        
    }
}