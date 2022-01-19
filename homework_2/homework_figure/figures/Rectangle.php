<?php
namespace Figures;

class Rectangle extends Figure {
    
    private  $width;
    private  $hight;
    
    public function __construct($width, $hight) {
        $this->width = $width;
        $this->hight = $hight;
    }
    
    public function calcSquare() {
        return $this->width * $this->hight;
    }
    
    public function calcPerimeter() {
        return $this->width * 2 + $this->hight * 2;
    }
}
