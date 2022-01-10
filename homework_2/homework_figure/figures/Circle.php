<?php
namespace Figures;

class Circle extends Figure {
    
    public  $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    function getSquare () {
        return ($this->radius * $this->radius * 3.14);
    }
    
    public function getPerimeter() {
        return $this->radius * 2 * 3.14;
    }
}
