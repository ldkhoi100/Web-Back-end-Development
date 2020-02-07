<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 11/21/18
 * Time: 17:14
 */
include_once('Shape.php');
include_once('Resizeable.php');

class Circle extends Shape implements Resizeable
{
    public $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function calculateArea()
    {
        return round(pi() * pow($this->radius, 2), 3);
    }

    public function calculatePerimeter()
    {
        return round(pi() * $this->radius * 2, 3);
    }

    public function resize()
    {
        $this->radius = rand(1, 100);
    }
}