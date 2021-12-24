<?php
namespace Figure;

class Triangle extends Figure {
    
    public  $sideA;
    public  $sideB;
    public  $sideC;
    
    function __construct(array $parameters) {
        if(!$parameters['sideA'] || !$parameters['sideB'] || !$parameters['sideC']) {
            throw new Exception('invalid parameters!');
        }
        
        parent::__construct($parameters);
    }
    
    function getSquare () {
        $halfPerimetr = ($this->sideA + $this->sideB + $this->sideC) / 2;
        return sqrt($halfPerimetr * ($halfPerimetr - $this->sideA) * ($halfPerimetr - $this->sideB) * ($halfPerimetr - $this->sideC));
    }
    
    public function getPerimeter() {
        return $this->sideA + $this->sideB + $this->sideC;
    }
}
