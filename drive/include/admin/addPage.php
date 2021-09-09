<?php
include '../db/db.php';

$content = '<div style="display: flex; justify-content: center;align-items: center"><form method="post" action=""><br><br>'
        . '<input name="title" class="form-control" style="width: 500px" placeholder="type title"><br><br>'
        . '<input name="url" class="form-control" style="width: 500px" placeholder="type url"><br><br>'
        . '<textarea name="text" class="form-control" style="width: 500px"></textarea><br><br>'
    . '<input type="submit" name="submit" class="btn btn-primary">'
    .'</form></div>';

function addPage () {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $text = $_POST['text'];
    $db = connect();
    $query = "INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')";
    mysqli_query($db, $query);
    return true;
}

$title = 'Add page';

include 'layout.php';

if (isset($_POST['submit'])) {
    addPage();
    var_dump($_POST);
}