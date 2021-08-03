<?php
$files = ['1.php', '2.php', '3.php'];
//foreach ($files as $file) {
//    include $file;
//}

$page = $_GET['page'];
$path = "dir/$page.php";
if (file_exists($path)) {
    include $path;
} else {
    echo "file $path не найден";
}



