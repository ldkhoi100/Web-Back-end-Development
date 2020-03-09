<?php

namespace Model;

class Clubleague
{
    public $idclub;
    public $idleague;
    public $nameclub;
    public $nameleague;

    public function __construct($idclub, $idleague, $nameclub = null, $nameleague = null)
    {
        $this->idclub = $idclub;
        $this->idleague = $idleague;
        $this->nameclub = $nameclub;
        $this->nameleague = $nameleague;
    }
}