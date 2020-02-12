<?php include './class_Circle.php';

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

    public function getRadius_Color_Height()
    {
        return array($this->radius, $this->color, $this->height);
    }

    public function setRadius_Color_Height($new_radius, $new_color, $new_height)
    {
        parent::setRadius_Color($new_radius, $new_color);
        $this->height = $new_height;
    }

    public function getArea()
    {
        return parent::getArea() * 2 + parent::getPerimeter() * $this->height;
    }

    public function getVolume()
    {
        return parent::getArea() * $this->height;
    }

    // Show
    public function toString()
    {
        return 'Area is: ' . self::getArea() . '<br>Volume is: ' . self::getVolume() . '<br>';
    }
}