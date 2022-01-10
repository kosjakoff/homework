<?php
namespace Figures;

class Rectangle extends Figure {
    
    public  $width;
    public  $hight;
    
    public function __construct($width, $hight) {
        $this->width = $width;
        $this->hight = $hight;
    }
    
    public function getSquare() {
        return $this->width * $this->hight;
    }
    
    public function getPerimeter() {
        return $this->width * 2 + $this->hight * 2;
    }
}
