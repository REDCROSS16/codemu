<h5>Практика на функции PHP</h5>
<p>Сделайте функцию, которая будет проверять пару чисел на дружественность. <br>Дружественные числа - два числа, для которых
    сумма всех собственных делителей первого числа равна второму числу и наоборот,<br>
    сумма всех собственных делителей второго числа равна первому числу. </p>
<form action="#">
    <input type="text" name="num1" placeholder="первое число">
    <input type="text" name="num2" placeholder="второе число">
    <input type="submit">
</form>

<?php
# проверка на дружелюбность
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
?>


<?php
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];

$result = checkOnFrendly((int)$num1, (int)$num2);

if ($result) {
    echo '<h4 style="color:blue">Два числа дружелюбны!</h4>';
} else {
    echo '<h4 style="color:red">Два числа недружелюбны!</h4>';
}
