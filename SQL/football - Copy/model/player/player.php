<?php

namespace Model;

class Player
{
    public $id;
    public $firstname;
    public $lastname;
    public $age;
    public $height;
    public $weight;
    public $clothersnumber;
    public $idclub;
    public $idnation;
    public $nameclub;
    public $namenation;
    public $image;

    public function __construct($id, $firstname, $lastname, $age, $height, $weight, $clothersnumber, $idclub, $idnation, $nameclub = null, $namenation = null, $image)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->clothersnumber = $clothersnumber;
        $this->idclub = $idclub;
        $this->idnation = $idnation;
        $this->nameclub = $nameclub;
        $this->namenation = $namenation;
        $this->image = $image;
    }
}