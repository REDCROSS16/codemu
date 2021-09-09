<?php

$out = '';
$out .= '<form method="post" action="">'
        . '<input name="title" class="">'
        . '<input name="url" class="">'
        . '<textarea name="text" class=""></textarea>'
    . '<input type="submit" class="">'
    .'</form>';

function addPage () {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $text = $_POST['text'];
    $db = ''; # !!!!
    $query = 'INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')';
    mysqli_query($db, $query);
}