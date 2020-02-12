<?php

function checkIsvalid($number)
{
    return is_numeric($number) && !empty($number) && $number > 0;
}