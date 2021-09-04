<?php

# роутинг
if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}
# подключение к
include '../db/db.php';

$db = connect(HOST1, USER1, PASSWORD1, DB_NAME1);
$query = 'SELECT id, title, url FROM pages';

$result = mysqli_query($db, $query);
$page = mysqli_fetch_assoc($result);

for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

$content = '<table class="table">'
    . '<tr>'
        . '<th> title </th>'
        . '<th> url </th>'
        . '<th> edit</th>'
        . '<th> delete </th>'
    . '</tr>';
foreach ($data as $page) {
    $content .= '<tr>'
        . '<td>' . $page['title'] . '</td>'
        . '<td>' . $page['url'] . '</td>'
        . '<td>' . '<a href="#">edit</a>' . '</td>'
            . '<td>' . "<a href='?delete={$page['id']}'>delete</a></td>"
        . '</tr>';
}


$title = 'Admin main page';

include 'layout.php';

# функция удаления страницы
function deletePage($pageId)
{
    $db = connect();
    $query = "Delete $pageId FROM pages";
    if (mysqli_query($db, $query)) {
        return true;
    } else {
        return false;
    }
}

$info = '';

if (deletePage($link)) {
    $info = "page $link delete succesful";
}