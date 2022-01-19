<?php 
spl_autoload_register();

$rectangle = new Figures\Rectangle(3, 4);
$circle = new Figures\Circle(5);
$triangle = new Figures\Triangle(3, 4, 4);

function PrintParam (Figures\Figure $figure) {
    echo $figure->calcSquare(). "<br/>";
    echo $figure->calcPerimeter() . "<br/>";
}

PrintParam($rectangle);
PrintParam($circle);
PrintParam($triangle);
