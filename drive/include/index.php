<?php

$page = $_GET['page'];
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
    $content = 'file not found';
}
include 'layout.php';
?>
