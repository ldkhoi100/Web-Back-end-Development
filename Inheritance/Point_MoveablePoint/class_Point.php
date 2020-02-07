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

class MoveablePoint extends Point
{
    public float $xSpeed = 0.0;
    public float $ySpeed = 0.0;

    public function getXSpeed()
    {
        return $this->xSpeed;
    }

    public function getYSpeed()
    {
        return $this->ySpeed;
    }

    public function setXSpeed($new_xspeed)
    {
        $this->xSpeed = $new_xspeed;
    }

    public function setYSpeed($new_yspeed)
    {
        $this->ySpeed = $new_yspeed;
    }

    public function setSpeed($new_xspeed, $new_yspeed)
    {
        $this->xSpeed = $new_xspeed;
        $this->ySpeed = $new_yspeed;
    }

    public function getSpeed()
    {
        return array($this->xSpeed, $this->ySpeed);
    }

    public function toString()
    {
        return "\"($this->x, $this->y), speed = ($this->xSpeed, $this->ySpeed)\"";
    }

    public function move()
    {
        $this->x += $this->xSpeed;
        $this->y += $this->ySpeed;
        return array($this->x, $this->y);
    }
}