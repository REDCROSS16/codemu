<?php

require_once 'db/config.php';
//require_once 'template.php';
const TABLE = 'guestbook';

$db = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);


if (isset($_REQUEST["submit"])) {
    $name = $_REQUEST['name'];
    $message = $_REQUEST['message'];
    $date = date('Y-M-D : H:i:s');

    $query = "INSERT INTO guestbook (user, message, date) VALUES ('$name', '$message', '$date')";
    $res = $db->query($query);
    if ($res) {
        echo "<div class='info alert alert-info'>Запись успешно сохранена!</div>";
    }
}


function pagination() {
    $showOnPage = 5;
    $query = "SELECT * FROM TABLE WHERE LIMIT 5";
}