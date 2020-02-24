<?php

namespace Model;

class Club
{
    public $id;
    public $name;
    public $stadium;
    public $coach;

    public function __construct($id, $name, $stadium, $coach)
    {
        $this->id = $id;
        $this->name = $name;
        $this->stadium = $stadium;
        $this->coach = $coach;
    }
}