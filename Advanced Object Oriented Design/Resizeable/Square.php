<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 11/21/18
 * Time: 17:16
 */
include_once('Rectangle.php');
include_once('Resizeable.php');

class Square extends Rectangle implements Resizeable
{
    public $name;
    public $edge;
    public function __construct($name, $edge)
    {
        $this->name = $name;
        $this->edge = $edge;
    }

    public function getedge()
    {
        return $this->edge;
    }

    public function calculateArea()
    {
        return $this->edge ** 2;
    }

    public function calculatePerimeter()
    {
        return ($this->edge) * 4;
    }

    public function resize()
    {
        $this->edge = rand(1, 100);
    }
}