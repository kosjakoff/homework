<?php
namespace Figures;

class Circle extends Figure {
    
    private  $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    function square () {
        return ($this->radius * $this->radius * M_PI);
    }
    
    public function perimeter() {
        return $this->radius * 2 * M_PI;
    }
}
