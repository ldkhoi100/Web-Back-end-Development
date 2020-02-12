<?php
include_once('Circle.php');
include_once('Cylinder.php');
include_once('Rectangle.php');
include_once('Square.php');

$rectangle[0] = new Rectangle('Rectangle 01', 3, 4, 'blue');
$rectangle[1] = new Rectangle('Rectangle 02', 6, 8);
$rectangle[2] = new Rectangle('Rectangle 03', 9, 12, 'green');

$result = null;

foreach ($rectangle as $key => $value) {
    $result .= "{$rectangle[$key]->name} <br> area: "  . $rectangle[$key]->calculateArea() . '<br />';
    if ($rectangle[$key] instanceof Rectangle) {
        $result .= $rectangle[$key]->howToColor() . "<br>";
    }
}