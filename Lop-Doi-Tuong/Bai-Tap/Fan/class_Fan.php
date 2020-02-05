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

    function toString(){
        if($this->status){
            return 'Speed: ' .$this->speed . ', color: ' .$this->color . ', radius: ' . $this->radius . ': fan is on';
        }
        else{
            return 'Color: ' .$this->color . ', radius: ' . $this->radius . ': fan is off';
        }
    }
}
