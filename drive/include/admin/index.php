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

if ($_GET['edit']) {
    editPage();
    include 'edit.php';
}


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
        . '<td>' . "<a href='?edit={$page['id']}'>edit</a></td>"
            . '<td>' . "<a href='?delete={$page['id']}'>delete</a></td>"
        . '</tr>';
}

$content.= addPageButton();

$title = 'Admin main page';



# функция удаления страницы
function deletePage($db)
{
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "Delete FROM pages where id=$id";
        if (mysqli_query($db, $query)) {
            return true;
        } else {
            return  false;
        }
    }
}

$info = '';
$isDelete = deletePage($db);

if ($isDelete) { $info = "page delete succesful"; }

if (isset($_GET['added'])) {
    $info = '<span class="succes" style="color:green">Page added succesful</span>';
}

/**
 * Метод описывает кнопку добавить
 */
function addPageButton() : string
{
    $out = '<a href="addPage.php"><button class="">Add Page</button></a>';
    return $out;
}


function editPage() {
    if (isset($_GET['edit'])) {
        var_dump($_GET);
    }
}

include 'layout.php';