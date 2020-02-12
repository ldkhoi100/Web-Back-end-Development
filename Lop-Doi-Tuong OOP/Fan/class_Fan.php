<?php
class Fan
{
    public const SLOW = 1;
    public const MEDIUM = 2;
    public const FAST = 3;
    public int $speed = self::SLOW;
    public float $radius = 5;
    public bool $status = false; // Off
    public string $color = 'Blue';

    function __construct()
    {
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getSatus()
    {
        return $this->status;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function getColor()
    {
        return $this->color;
    }

    // Set Speed
    public function setSpeedFast()
    {
        $this->speed = self::FAST;
        return $this;
    }

    public function setSpeedMedium()
    {
        $this->speed = self::MEDIUM;
        return $this;
    }

    public function setSpeedSlow()
    {
        $this->speed = self::SLOW;
        return $this;
    }

    // Set status Fan
    public function setOn()
    {
        $this->status = true;
        return $this;
    }

    public function setOff()
    {
        $this->status = false;
        return $this;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;
        return $this;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    // Show
    function toString()
    {
        if ($this->status) {
            return 'Speed: ' . $this->speed . '<br> Color: ' . $this->color . '<br> Radius: ' . $this->radius . '<br> Status: Fan is on';
        } else {
            return 'Color: ' . $this->color . '<br> Radius: ' . $this->radius . '<br> Status: Fan is off';
        }
    }
}