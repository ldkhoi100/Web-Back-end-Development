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

    public function getRadius_Color()
    {
        return array($this->radius, $this->color);
    }

    public function setRadius_Color($new_radius, $new_color)
    {
        $this->radius = $new_radius;
        $this->color = $new_color;
    }

    public function getArea()
    {
        return pi() * pow($this->radius, 2);
    }

    public function getPerimeter()
    {
        return pi() * $this->radius * 2;
    }

    public function toString()
    {
        return 'Area is: ' . self::getArea() . '<br>Perimeter is: ' . self::getPerimeter() . '<br>';
    }
}