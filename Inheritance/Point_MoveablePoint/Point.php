<?php
class Point
{
    public float $x = 0.0;
    public float $y = 0.0;

    public function __construct()
    {
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getXY()
    {
        return array($this->x, $this->y);
    }

    public function setX($new_x)
    {
        $this->x = $new_x;
    }

    public function setY($new_y)
    {
        $this->y = $new_y;
    }

    public function setXY($new_x, $new_y)
    {
        $this->x = $new_x;
        $this->y = $new_y;
    }

    public function toString()
    {
        return "(" . $this->x . "," . $this->y . ")";
    }
}