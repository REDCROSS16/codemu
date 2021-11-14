<h5>Практика на функции PHP</h5>
<p>Сделайте функцию, которая будет проверять пару чисел на дружественность. <br>Дружественные числа - два числа, для которых
    сумма всех собственных делителей первого числа равна второму числу и наоборот,<br>
    сумма всех собственных делителей второго числа равна первому числу. </p>

<?php

function checkOnFrendly($num1, $num2) {
    if (sumOfDivisors($num1) === $num2 && sumOfDivisors($num2) === $num1) {
        return true;
    } else {
        return false;
    }
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


//var_dump(checkOnFrendly(220,284));
?>


<form action="#">
    <input type="text" name="num1" placeholder="первое число">
    <input type="text" name="num2" placeholder="первое число">
    <input type="submit">
</form>
<?php
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

$result = checkOnFrendly($num1, $num2);
echo "<h4></h4>h4>"