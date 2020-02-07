<?php
interface Edible
{
    public function howtoEat();
}

abstract class Fruit implements Edible
{
}

class Apple extends Fruit
{
    public function howtoEat()
    {
        return "Apple could be slided";
    }
}

class Orange extends Fruit
{
    public function howtoEat()
    {
        return "Orange could be juiced";
    }
}