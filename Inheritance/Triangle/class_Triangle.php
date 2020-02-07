<?php
class Triangle
{
    public float $a;
    public float $b;
    public float $c;
    public string $color;

    public function __construct($a, $b, $c, $color)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->color = $color;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->c;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setA($new_a)
    {
        $this->a = $new_a;
    }

    public function setB($new_b)
    {
        $this->a = $new_b;
    }

    public function setC($new_c)
    {
        $this->a = $new_c;
    }

    public function setColor($new_color)
    {
        $this->a = $new_color;
    }

    public function getABCCo()
    {
        return array($this->a, $this->b, $this->c, $this->color);
    }

    public function setABCCo($new_a, $new_b, $new_c, $new_color)
    {
        $this->a = $new_a;
        $this->b = $new_b;
        $this->c = $new_c;
        $this->color = $new_color;
    }

    public function getHalf_perimeter()
    {
        return ($this->a + $this->b + $this->c) / 2;
    }

    public function getHeight_triangle()
    {
        return (2 * (pow(self::getHalf_perimeter() * (self::getHalf_perimeter() - $this->a) * (self::getHalf_perimeter() - $this->b) * (self::getHalf_perimeter() - $this->c), 0.5))) / $this->a;
    }

    public function getArea()
    {
        return (1 / 2) * $this->a * self::getHeight_triangle();
    }

    public function getPerimeter()
    {
        return $this->a + $this->b + $this->c;
    }

    public function toString()
    {
        return 'Area: ' . self::getArea() . ' , perimeter: ' . self::getPerimeter() . ', color: ' . $this->color;
    }
}