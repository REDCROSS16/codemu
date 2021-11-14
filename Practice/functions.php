<?php
# проверка на дружелюбность
function checkOnFriendly($num1, $num2) : bool
{
    return sumOfDivisors($num1) === $num2 && sumOfDivisors($num2) === $num1;
}

# найти все делители числа
function getNumOfDivisors($num) : array
{
    $result = [];
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i === 0) {
            $result[] = $i;
        }
    }
    return $result;
}

# сумма делителей числа
function sumOfDivisors($num) : int
{
    $result = getNumOfDivisors($num);
    return array_sum($result) - $num;
}


function checkForPerfection ($num)
{
    return (sumOfDivisors($num) === $num) ? true : false;
}

