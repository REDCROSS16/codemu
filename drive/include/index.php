<?php

# если использовать ЧПУ
//$page = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI'], '/'));
//var_dump($uri);
//
//if (empty($page)) {
//    $page = '/';
//}




if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}
# подключение к
include 'elems/init.php';
$db = connect();
$query = "SELECT * FROM pages WHERE url='$page'";
$result = mysqli_query($db, $query);
$page = mysqli_fetch_assoc($result);

if ($page) {
    $title = $page['title'];
    $content = $page['text'];
} else {
    $content = file_get_contents("pages/404.php");
    header("HTTP/1.0 404 Not found");
}

include 'layout.php';
