<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 11/21/18
 * Time: 17:15
 */
include_once('Circle.php');
include_once('Resizeable.php');

class Cylinder extends Circle implements Resizeable
{
    public $height;

    public function __construct($name, $radius, $height)
    {
        parent::__construct($name, $radius);
        $this->height = $height;
    }

    public function getRadiusHeight()
    {
        return array($this->radius, $this->height);
    }

    public function calculateArea()
    {
        return parent::calculateArea() * 2 + parent::calculatePerimeter() * $this->height;
    }

    public function calculateVolume()
    {
        return parent::calculateArea() * $this->height;
    }

    public function resize()
    {
        $this->radius = rand(1, 100);
        $this->height = rand(1, 100);
    }
}