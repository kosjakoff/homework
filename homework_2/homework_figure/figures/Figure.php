<?php
namespace Figures;

spl_autoload_register();


abstract class Figure {
    
    public function __construct() {
        
    }
        
    abstract function calcSquare();
        
    abstract function calcPerimeter();
    
}

