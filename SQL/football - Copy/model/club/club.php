<?php

namespace Model;

class Club
{
    public $id;
    public $name;
    public $stadium;
    public $coach;
    public $image;

    public function __construct($id, $name, $stadium, $coach, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->stadium = $stadium;
        $this->coach = $coach;
        $this->image = $image;
    }
}