<?php
include './Comparator.php';
include './Circle.php';
class CircleComparator extends Circle implements Comparator
{
    public function __construct($name, $radius)
    {
        parent::__construct($name, $radius);
    }

    public function compareTo($circleTwo)
    {
        $circleTwoRadius = $circleTwo->getRadius();

        if ($this->getRadius() > $circleTwoRadius) {
            return 1;
        } else if ($this->getRadius() < $circleTwoRadius) {
            return -1;
        } else {
            return 0;
        }
    }
}