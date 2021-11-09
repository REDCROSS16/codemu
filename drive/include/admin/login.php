<?php

include '../elems/init.php';
$title = 'login page';
include 'elems/head.php';

if (isset($_POST['password']) && $_POST['password'] == '123') {
    $_SESSION['auth'] = true;
    $_SESSION['message'] = [
        'status' => 'success',
        'text'   => 'U auth successfully!'
    ];
    header('Location: /codemu/drive/include/admin'); die();
} else {
    include 'elems/loginForm.php';
}