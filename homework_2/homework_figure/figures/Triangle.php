<?php
namespace Figures;

class Triangle extends Figure {
    
    private  $sideA;
    private  $sideB;
    private  $sideC;
    
    public function __construct($sideA, $sideB, $sideC) {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        $this->sideC = $sideC;
    }
    
    function square () {
        $halfPerimetr = ($this->sideA + $this->sideB + $this->sideC) / 2;
        return sqrt($halfPerimetr * ($halfPerimetr - $this->sideA) * ($halfPerimetr - $this->sideB) * ($halfPerimetr - $this->sideC));
    }
    
    public function perimeter() {
        return $this->sideA + $this->sideB + $this->sideC;
    }
}
