<?php

/**
 * Created by PhpStorm.
 * User: phanluan
 * Date: 27/10/2018
 * Time: 21:55
 */
include "../Exercise.ArrayList/MyList.php";
$listInteger = new MyList();
$listInteger->add(1);
$listInteger->add(2);
$listInteger->add(3);

echo $listInteger->get(1);
$listInteger->remove(1);
print_r($listInteger->toArray());