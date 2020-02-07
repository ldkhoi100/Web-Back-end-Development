<?php
class QuadraticEquation
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
    //delta
    public function getDiscriminant()
    {
        return $this->b ** 2 - (4 * $this->a * $this->c);
    }

    public function getRoot1()
    {
        return (-$this->b + pow($this->getDiscriminant(), 0.5)) / (2 * $this->a);
    }

    public function getRoot2()
    {
        return (-$this->b - pow($this->getDiscriminant(), 0.5)) / (2 * $this->a);
    }

    public function getBothRoot()
    {
        return (-$this->b) / (2 * $this->a);
    }
}