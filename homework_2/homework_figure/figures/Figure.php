<?php
namespace Figures;

spl_autoload_register();


abstract class Figure {
    
    public function __construct() {
        
    }
        
    abstract function getSquare();  //корректно ли так именовать функцию?
        
    abstract function getPerimeter();
    
}

