<?php
function createRandomArray(int $number)
{
    $arr = [];
    if ($number === 0) {
        return $arr;
    }
    for ($i = 0; $i < $number; $i++) {
        $arr[] = mt_rand(0, 5000);
    }
    return $arr;
}

function showArray(array $arr)
{
    $str = '';
    if (count($arr) === 0) {
        return $str;
    }
    foreach ($arr as $value) {
        $str .= '<td>' . $value . '</td>';
    }
    return $str;
}

function selectionSort($arr)
{
    $length = count($arr);
    for ($i = 0; $i < $length - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        $arr = swapPositions($arr, $i, $min);
    }
    return $arr;
}

function swapPositions($arr, $left, $right)
{
    $tmp = $arr[$right];
    $arr[$right] = $arr[$left];
    $arr[$left] = $tmp;
    return $arr;
}