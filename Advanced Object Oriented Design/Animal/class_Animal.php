<?php
include('./class_Edible.php');
//Tạo lớp trừu tượng Animal
abstract class Animal
{
    abstract public function makeSound();
}

class Tiger extends Animal
{
    public function makeSound()
    {
        return "Tiger: roarrrrrrr!";
    }
}

class Chicken extends Animal
{
    public function makeSound()
    {
        return "Chicken: Cục cục tát, cục tát";
    }

    public function howtoEat()
    {
        return 'Could be fried';
    }
}