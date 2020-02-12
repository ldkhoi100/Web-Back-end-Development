<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 11/21/18
 * Time: 17:16
 */
include_once('Shape.php');
include_once('./Colorable.php');

class Rectangle extends Shape implements Colorable
{
    public float $width;
    public float $height;
    public string $color;

    public function __construct($name, $width, $height, $color = 'red')
    {
        parent::__construct($name);
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    public function calculateArea()
    {
        return $this->height * $this->width;
    }

    public function calculatePerimeter()
    {
        return ($this->height + $this->width) * 2;
    }

    public function howToColor()
    {
        return "Color <b style='color: " . $this->color . "'> " . $this->color . "</b>" . " all four sides.";
    }
}