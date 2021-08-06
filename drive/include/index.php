<?php

$page = $_GET['page'];
$path = "pages/$page.php";
if (file_exists($path)) {
    include $path;
} else {
    echo "file $path не найден";
}



123123