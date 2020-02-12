<?php
class Triangle
{
    public $side1;
    public $side2;
    public $side3;
    public $color;

    public function __construct($side1, $side2, $side3, $color)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->color = $color;
    }

    public function getSide1()
    {
        return $this->side1;
    }

    public function getSide2()
    {
        return $this->side2;
    }

    public function getSide3()
    {
        return $this->side3;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setSide1($new_Side1)
    {
        $this->side1 = $new_Side1;
    }

    public function setSide2($new_Side2)
    {
        $this->side2 = $new_Side2;
    }

    public function setSide3($new_Side3)
    {
        $this->side3 = $new_Side3;
    }

    public function setColor($new_color)
    {
        $this->side1 = $new_color;
    }

    public function getSide123_Color()
    {
        return array($this->side1, $this->side2, $this->side3, $this->color);
    }

    public function setSide123_Color($new_Side1, $new_Side2, $new_Side3, $new_color)
    {
        $this->side1 = $new_Side1;
        $this->side2 = $new_Side2;
        $this->side3 = $new_Side3;
        $this->color = $new_color;
    }

    public function getHalf_perimeter()
    {
        return ($this->side1 + $this->side2 + $this->side3) / 2;
    }

    public function getHeight_triangle()
    {
        return (2 * (pow(self::getHalf_perimeter() * (self::getHalf_perimeter() - $this->side1) * (self::getHalf_perimeter() - $this->side2) * (self::getHalf_perimeter() - $this->side3), 0.5))) / $this->side1;
    }

    public function getArea()
    {
        return (1 / 2) * $this->side1 * self::getHeight_triangle();
    }

    public function getPerimeter()
    {
        return $this->side1 + $this->side2 + $this->side3;
    }

    public function toString()
    {
        return 'Area: ' . self::getArea() . ' , perimeter: ' . self::getPerimeter() . ', color: ' . $this->color;
    }
}