<?php ob_start();
include '../CookieShell/CookieShell.php';
$cookieCounter = new CookieShell;

if (isset($_COOKIE['count']))
{
    $cookieCounter->set('count', $_COOKIE['count'] + 1, 3600 * 24);
} else {
    $cookieCounter->set('count', '1', 3600 * 24);
}


if (trim($_POST['login']) === 'admin' && $_POST['pass'] === '123456') {
    echo 'Welcome!';
    echo 'Страница админа!';
} else {
    echo 'НЕВЕРНЫЙ пароль!';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5> Входов на страницу: <?echo $cookieCounter->get('count');?></h5>
</body>
</html>
