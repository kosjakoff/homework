<?php
namespace Figures;

class Triangle extends Figure {
    
    public  $sideA;
    public  $sideB;
    public  $sideC;
    
    public function __construct($sideA, $sideB, $sideC) {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        $this->sideC = $sideC;
    }
    
    function getSquare () {
        $halfPerimetr = ($this->sideA + $this->sideB + $this->sideC) / 2;
        return sqrt($halfPerimetr * ($halfPerimetr - $this->sideA) * ($halfPerimetr - $this->sideB) * ($halfPerimetr - $this->sideC));
    }
    
    public function getPerimeter() {
        return $this->sideA + $this->sideB + $this->sideC;
    }
}
