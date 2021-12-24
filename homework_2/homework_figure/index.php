<?php 
spl_autoload_register();

$rectangleParameters = [
    "width" => 3,
    "hight" => 4,
];
$circleParameters = [
    "radius" => 5,
];
$triangleParameters = [
    "sideA" => 3,
    "sideB" => 4,
    "sideC" => 4,
];


$rectangle = new Figure\Rectangle($rectangleParameters);
$circle = new Figure\Circle($circleParameters);
$triangle = new Figure\Triangle($triangleParameters);

echo $rectangle->getSquare() . "<br/>";
echo $rectangle->getPerimeter() . "<br/>";
echo $circle->getSquare() . "<br/>";
echo $circle->getPerimeter() . "<br/>";
echo $triangle->getSquare() . "<br/>";
echo $triangle->getPerimeter() . "<br/>";
?>

