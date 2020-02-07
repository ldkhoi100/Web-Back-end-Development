<?php
class Shape
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Circle extends Shape
{
    public $radius;

    public function __construct($name, $radius)
    {
        Shape::__construct($name); //Or parent
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function caculatePerimeter()
    {
        return pi() * $this->radius * 2;
    }
}

class Cylinder extends Circle
{
    public $height;

    public function __construct($name, $radius, $height)
    {
        Circle::__construct($name, $radius);
        $this->height = $height;
    }

    public function CalculateArea()
    {
        return parent::calculateArea() * 2 + parent::caculatePerimeter() * $this->height;
    }

    public function CalculateVolume()
    {
        return parent::calculateArea() * $this->height;
    }
}

class Rectangle extends Shape
{
    public $width;
    public $height;

    public function __construct($name, $width, $height)
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    public function CalculateArea()
    {
        return $this->height * $this->width;
    }

    public function caculatePerimeter()
    {
        return ($this->height + $this->width) * 2;
    }
}

class Square extends Rectangle
{
    public function __construct($name, $width, $height)
    {
        parent::__construct($name, $width, $height);
    }
}