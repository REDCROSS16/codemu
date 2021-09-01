<?php

if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}
# подключение к
include 'db/db.php';
$db = connect(HOST1, USER1, PASSWORD1, DB_NAME1);
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


# без использования БД
//$path = "pages/$page.php";
//if (file_exists($path)) {
//    $page = file_get_contents($path);
//
//    $regexp = "/\{\{title:(.*?)\}\}/";
//    if (preg_match($regexp, $page, $match)) {
//        $title = $match[1];
//        $content = preg_replace($regexp, '', $page);
//
//    } else {
//        $title = '';
//    }
//
//} else {
//    $title = 'page not found';
//    include 'pages/404.php';
//}
include 'layout.php';
