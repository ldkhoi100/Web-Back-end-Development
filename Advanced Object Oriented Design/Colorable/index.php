<?php
include_once('Circle.php');
include_once('Cylinder.php');
include_once('Rectangle.php');
include_once('Square.php');

$rectangle[0] = new Rectangle('Rectangle 01', 3, 4, 'blue');
$rectangle[1] = new Rectangle('Rectangle 02', 6, 8);
$rectangle[2] = new Rectangle('Rectangle 03', 9, 12);

foreach ($rectangle as $key => $value) {
    echo "{$rectangle[$key]->name} area:"  . $rectangle[$key]->calculateArea() . '<br />';
    if ($rectangle[$key] instanceof Rectangle) {
        echo $rectangle[$key]->howToColor() . "<br>";
    }
}

// foreach ($animals as $animal) {
//     echo $animal->makeSound() . '<br>';
//     if ($animal instanceof Chicken) { //Kiểm tra function có tồn tại hay không, nếu có function đó thì in ra
//         echo $animal->howtoEat();
//     }
// }