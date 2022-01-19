<?php
namespace Figures;

class Circle extends Figure {
    
    private  $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    function calcSquare () {
        return ($this->radius * $this->radius * M_PI);
    }
    
    public function calcPerimeter() {
        return $this->radius * 2 * M_PI;
    }
}
