<?php

require __DIR__ . "/Calculator.php";

class CalculatorTest extends Calculator
{
    public function testCalculateAdd()
    {
        $firstOperand = 1;
        $secondOperand = 1;
        $operator = ADDITION;

        $expected = 2;

        $calculator = new Calculator();
        $result = $calculator->calculate($firstOperand, $secondOperand, $operator);
        $this->assertEquals($expected, $result);
    }
}

$a = new CalculatorTest();
echo $a->calculate(4, 5, ADDITION);