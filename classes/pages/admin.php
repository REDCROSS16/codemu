<?php

if (trim($_POST['login']) === 'admin' && $_POST['pass'] === '123456') {
    echo 'Welcome!';
    echo 'Страница админа!';
} else {
    echo 'НЕВЕРНЫЙ пароль!';
}