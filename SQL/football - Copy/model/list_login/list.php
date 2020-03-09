<?php

namespace Model;

class Listlogin
{
    public $id;
    public $username;
    public $password;
    public $creatat;
    public $flag;

    public function __construct($id, $username, $password, $creatat, $flag)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->creatat = $creatat;
        $this->flag = $flag;
    }
}