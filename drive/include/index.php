<?php

if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}




$path = "pages/$page.php";
if (file_exists($path)) {
    $page = file_get_contents($path);

    $regexp = "/\{\{title:(.*?)\}\}/";
    if (preg_match($regexp, $page, $match)) {
        $title = $match[1];
        $content = preg_replace($regexp, '', $page);

    } else {
        $title = '';
    }

} else {
    $title = 'page not found';
    include 'pages/404.php';
}
include 'layout.php';
