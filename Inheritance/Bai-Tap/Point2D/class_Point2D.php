<?php

class Point2D
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
        return "\"(" . $this->x . "," . $this->y . ")\"";
    }
}

class Point3D extends Point2D
{
    public float $z = 0.0;

    public function __construct()
    {
    }

    public function getZ()
    {
        return $this->z;
    }

    public function setZ($new_z)
    {
        $this->z = $new_z;
    }

    public function getXYZ()
    {
        return array($this->x, $this->y, $this->z);
    }

    public function setXYZ($new_x, $new_y, $new_z)
    {
        parent::setXY($new_x, $new_y);
        $this->z = $new_z;
    }

    public function toString()
    {
        return "\"(" . $this->x . "," . $this->y . "," . $this->z . ")\"";
    }
}
