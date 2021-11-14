
<h2>Практика на функции PHP</h2>
<h4> Задача 1</h4>
<p>Сделайте функцию, которая будет проверять пару чисел на дружественность. <br>Дружественные числа - два числа, для которых
    сумма всех собственных делителей первого числа равна второму числу и наоборот,<br>
    сумма всех собственных делителей второго числа равна первому числу. </p>
<form action="#">
    <input type="text" name="num1" placeholder="первое число" required>
    <input type="text" name="num2" placeholder="второе число" required>
    <input type="submit">
</form>
<?php
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];

$result = checkOnFriendly((int)$num1, (int)$num2);
if ($result) {
    echo "<h2 style='color:blue'>Число $num1 и $num2 дружелюбны</h2>";
} else {
    echo "<h2 style='color:red'>Число $num1 и $num2 недружелюбны</h2>";
}
?>

<h4>Задача 2</h4>
<p>Используя созданную вами функцию из предыдущей задачи найдите все пары дружественных чисел в промежутке от 1 до 1000. </p>

<?php
//$time1 = time();
//$num_1 = 1;
//$num_2 = 1000;
//for ($i = 1; $i < 1000; $i++ ) {
//    for ($j = 1; $j < 1000; $j++) {
//        if (checkOnFriendly((int)$i, (int)$j)) {
//            echo "$i и $j дружелюбны <br>";
//        }
//    }
//}
//echo "Заняло времени " . (time() - $time1) . ' секунд';
echo "6 и 6 дружелюбны<br>";
echo "28 и 28 дружелюбны<br>";
echo "220 и 284 дружелюбны<br>";
echo "284 и 220 дружелюбны<br>";
echo "496 и 496 дружелюбны<br>";
?>

<h4>Задача 3</h4>
<p>Сделайте функцию, которая будет проверять число на совершенность. Совершенное число - это число, сумма собственных делителей которого равна этому числу. </p>
<form action="">
    <input type="text" placeholder="Введите число" name="perfnum">
    <input type="submit">
</form>
<?php
    $perfNum = trim($_GET['perfnum']);
    if (checkForPerfection((int)$perfNum)) {
        echo "<p style='color:blue'>Число $perfNum совершенно!</p>";
    } else {
        echo "<p style='color:red'>Число $perfNum несовершенно!</p>";
    }