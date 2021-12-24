<?php
namespace Figure;

class Rectangle extends Figure {
    
    public  $width;
    public  $hight;
    
    function __construct(array $parameters) {
        if(!$parameters['width'] || !$parameters['hight']) {
            throw new Exception('invalid parameters!');
        }
        parent::__construct($parameters);
    }
    
    public function getSquare() {
        return $this->width * $this->hight;
    }
    
    public function getPerimeter() {
        return $this->width * 2 + $this->hight * 2;
    }
}
