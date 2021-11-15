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

# проверка на совершенство
function checkForPerfection ($num)
{
    return (sumOfDivisors($num) === $num) ? true : false;
}

# проверка на счастливость билета
function checkHappyTicket($num) {
    if ($num < 100000 || $num > 999999) return false;
    $num = str_split((string)$num);
    return (((int)$num[0] + (int)$num[1] + (int)$num[2]) === ((int)$num[3] + (int)$num[4] + (int)$num[5])) ? true : false;
}