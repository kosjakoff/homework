<?php
namespace Figure;

class Circle extends Figure {
    
    public  $radius;
    
    function __construct(array $parameters) {
        if(!$parameters['radius']) {
            throw new Exception('invalid parameters!');
        }
        parent::__construct($parameters);
    }
    
    function getSquare () {
        return ($this->radius * $this->radius * 3.14);
    }
    
    public function getPerimeter() {
        return $this->radius * 2 * 3.14;
    }
}
