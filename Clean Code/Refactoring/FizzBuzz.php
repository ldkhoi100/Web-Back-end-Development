<?php

class FizzBuzz
{
    public $status;

    public function __construct($number)
    {
        if ($number % 3 == 0 && $number % 5 == 0) {
            $this->status =  "FizzBuzz";
        } elseif ($number % 3 == 0) {
            $this->status = "Fizz";
        } elseif ($number % 5 == 0) {
            $this->status = "Buzz";
        } else {
            $this->status =  $number . "";
        }
    }

    public function __toString()
    {
        return $this->status;
    }
}