<?php
include '../db/db.php';

$content = '<div style="display: flex; justify-content: center;align-items: center"><form method="post" action=""><br><br>'
        . '<input name="title" class="form-control" style="width: 500px" placeholder="type title" value="' . $_POST["title"] . '"><br><br>'
        . '<input name="url" class="form-control" style="width: 500px" placeholder="type url" value="' . $_POST["url"] .'"><br><br>'
        . '<textarea name="text" class="form-control" style="width: 500px">'. $_POST['text'] .'</textarea><br><br>'
    . '<input type="submit" name="submit" class="btn btn-primary">'
    .'</form></div>';

function addPage () {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $text = $_POST['text'];
    $db = connect();

    if (checkPage($url)) { return false; }

    $query = "INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')";
    mysqli_query($db, $query);
    return true;
}

function checkPage ($url) {
    $db = connect();
    $query = "SELECT COUNT(*) as count FROM pages WHERE url = '$url'";
    $res = mysqli_query($db, $query);
    $isPage = mysqli_fetch_assoc($res)['count'];
    return (bool)$isPage;
}

$title = 'Add page';



if (isset($_POST['submit'])) {
    if (addPage()) {
        header('Location: /codemu/drive/include/admin/?added=true');

    } else {
        $info = '<span class="nosucces" style="color:red">Page not added (exists!)</span>';
    }

}
include 'layout.php';