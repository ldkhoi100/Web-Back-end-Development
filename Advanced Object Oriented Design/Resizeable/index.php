<?php
include_once('Circle.php');
include_once('Cylinder.php');
include_once('Rectangle.php');
include_once('Square.php');

$result = null;

$circle[0] = new Circle('Circle 01', 3);
$circle[0]->resize();
$result .= 'Circle Radius: ' . $circle[0]->getRadius() . '<br>';
$result .= 'Circle area: ' . $circle[0]->calculateArea() . '<br />';
$result .= 'Circle perimeter: ' . $circle[0]->calculatePerimeter() . '<br /> <br />';

$cylinder = new Cylinder('Cylinder 01', 3, 4);
$cylinder->resize();
$result .= 'Cylinder Radius: ' . $cylinder->getRadiusHeight()[0] . '<br>';
$result .= 'Cylinder Height: ' . $cylinder->getRadiusHeight()[1] . '<br>';
$result .= 'Cylinder area: ' . $cylinder->calculateArea() . '<br />';
$result .= 'Cylinder perimeter: ' . $cylinder->calculatePerimeter() . '<br /> <br />';

$rectangle = new Rectangle('Rectangle 01', 3, 4);
$rectangle->resize();
$result .= 'Rectangle Width: ' . $rectangle->getWH()[0] . '<br>';
$result .= 'Rectangle Height: ' . $rectangle->getWH()[1] . '<br>';
$result .= 'Rectangle area: ' . $rectangle->calculateArea() . '<br />';
$result .= 'Rectangle perimeter: ' . $rectangle->calculatePerimeter() . '<br /> <br />';

$square = new Square('Square 01', 4);
$square->resize();
$result .= 'Square edge: ' . $square->getedge() . '<br>';
$result .= 'Square area: ' . $square->calculateArea() . '<br />';
$result .= 'Square perimeter: ' . $square->calculatePerimeter() . '<br />';