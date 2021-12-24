<?php
namespace Figure;

spl_autoload_register();


abstract class Figure {
    
    function __construct(array $parameters){
        foreach ($parameters as $key=>$value) {
            $this->{$key} = $value;
        }
    }
    
    abstract function getSquare();  //корректно ли так именовать функцию?
        
    abstract function getPerimeter();
    
}

