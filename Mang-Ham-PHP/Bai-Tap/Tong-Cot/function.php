<?php
//Creat 2 way matrix
function creatMatrix($array, $rows, $cols)
{
    //$array = [];
    for ($i = 0; $i < $rows; $i++) {
        $array[$i] = array();
        for ($j = 0; $j < $cols; $j++) {
            $number = rand(1, 100);
            array_push($array[$i], $number);
        }
    }
    return $array;
}

// Show 2 way matrix
function showMatrix($array, $row, $col)
{
    $str = "";
    for ($i = 0; $i < $row; $i++) {
        $str .= '<tr>';
        for ($j = 0; $j < $col; $j++) {
            $str .= '<td>' . $array[$i][$j] . '</td>';
        }
        $str .= '</tr>';
    }
    return $str;
}

//Tổng 1 cột bất kỳ được nhập từ ngoài vào
function totalColsArray($array, $rows, $colInput)
{
    $colInput -= 1;
    $total = 0;
    for ($i = 0; $i < $rows; $i++) {
        $total += $array[$i][$colInput];
    }
    return $total;
}

function isValid($number)
{
    return $number != null && is_numeric($number) && $number > 0;
}