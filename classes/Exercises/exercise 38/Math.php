<?php
namespace exercise_38;

class Math implements iMath
{
    public function sum($a, $b)
    {
     return $a + $b;
    }

    public function subtract($a, $b)
    {
        return $a - $b;
    }

    public function multiply($a, $b)
    {
        return $a * $b;
    }

    public function divide($a, $b)
    {
        return $a / $b;
    }
}