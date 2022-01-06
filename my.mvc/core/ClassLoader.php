<?php

namespace core;

class ClassLoader {

    private static $instance;
    
    private function __construct() {
        
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

    public function init() {
        spl_autoload_register(function ($className) {
            $path = str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
            
            if(!file_exists($path)) {
                throw new \Exception("File with name: " . $path . " not found");
            }
        
        require_once($path);
        });
    }
    
}