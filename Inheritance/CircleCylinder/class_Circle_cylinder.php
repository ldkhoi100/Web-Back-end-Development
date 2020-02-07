<?php
class Circle
{
    public int $radius;
    public string $color;

    public function __construct($radius, $color)
    {
        $this->radius = $radius;
        $this->color = $color;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($new_radius)
    {
        $this->radius = $new_radius;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($new_color)
    {
        $this->color = $new_color;
    }

    public function getRadCol()
    {
        return array($this->radius, $this->color);
    }

    public function setRadCol($new_radius, $new_color)
    {
        $this->radius = $new_radius;
        $this->color = $new_color;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function caculatePerimeter()
    {
        return pi() * $this->radius * 2;
    }

    public function toString()
    {
        return 'Area is: ' . self::calculateArea() . '<br>Perimeter is: ' . self::caculatePerimeter() .'<br>';
    }
}

class Cylinder extends Circle
{   
    public int $height = 10;

    public function __construct($radius, $color, $height)
    {
        parent::__construct($radius, $color);
        $this->height = $height;
    }

    public function getHeigth()
    {
        return $this->height;
    }

    public function setHeight($new_height)
    {
        $this->radius = $new_height;
    }

    public function getRadColHeight()
    {
        return array($this->radius, $this->color, $this->height);
    }

    public function setRadColHeight($new_radius, $new_color, $new_height)
    {
        parent::setRadCol($new_radius, $new_color);
        $this->height = $new_height;
    }

    public function CalculateArea()
    {
        return parent::calculateArea() * 2 + parent::caculatePerimeter() * $this->height;
    }

    public function CalculateVolume()
    {
        return parent::calculateArea() * $this->height;
    }
    
    public function toString()
    {
        return 'Area is: ' . self::calculateArea() . '<br>Volume is: ' . self::CalculateVolume() .'<br>';
    }
}
