<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 11/21/18
 * Time: 17:17
 */
include_once('Circle.php');
include_once('Cylinder.php');
include_once('Rectangle.php');
include_once('Square.php');
//include_once('Resizeable.php');








$circle[0] = new Circle('Circle 01', 3);
echo 'Before: <br>';
echo 'Circle Radius: ' . $circle[0]->getRadius() . '<br>';
echo 'Circle area: ' . $circle[0]->calculateArea() . '<br />';
echo 'Circle perimeter: ' . $circle[0]->calculatePerimeter() . '<br /> <br />';
$circle[0]->resize();
echo 'Last: <br>';
echo 'Circle Radius: ' . $circle[0]->getRadius() . '<br>';
echo 'Circle area: ' . $circle[0]->calculateArea() . '<br />';
echo 'Circle perimeter: ' . $circle[0]->calculatePerimeter() . '<br /> <br />';

$cylinder = new Cylinder('Cylinder 01', 3, 4);
$cylinder->resize();
echo 'Cylinder Radius: ' . $cylinder->getRadiusHeight()[0] . '<br>';
echo 'Cylinder Height: ' . $cylinder->getRadiusHeight()[1] . '<br>';
echo 'Cylinder area: ' . $cylinder->calculateArea() . '<br />';
echo 'Cylinder perimeter: ' . $cylinder->calculatePerimeter() . '<br /> <br />';

$rectangle = new Rectangle('Rectangle 01', 3, 4);
$rectangle->resize();
echo 'Rectangle Width: ' . $rectangle->getWH()[0] . '<br>';
echo 'Rectangle Height: ' . $rectangle->getWH()[1] . '<br>';
echo 'Rectangle area: ' . $rectangle->calculateArea() . '<br />';
echo 'Rectangle perimeter: ' . $rectangle->calculatePerimeter() . '<br /> <br />';

$square = new Square('Square 01', 4);
$square->resize();
echo 'Square edge: ' . $square->getedge() . '<br>';
echo 'Square area: ' . $square->calculateArea() . '<br />';
echo 'Square perimeter: ' . $square->calculatePerimeter() . '<br />';