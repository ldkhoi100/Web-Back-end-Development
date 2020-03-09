<?php

namespace Model;

class Nationalteam
{
    public $id;
    public $name;
    public $continent;
    public $ranking;
    public $coach;
    public $image;

    public function __construct($id, $name, $continent, $ranking, $coach, $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->continent = $continent;
        $this->ranking = $ranking;
        $this->coach = $coach;
        $this->image = $image;
    }
}