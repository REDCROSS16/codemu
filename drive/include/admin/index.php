<?php

session_start();
# роутинг
if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}
# подключение к БД
include '../db/db.php';

//$db = connect(HOST1, USER1, PASSWORD1, DB_NAME1);
$db = connect();
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
    $content .=
        '<tr>'
            . '<td>' . $page['title'] . '</td>'
            . '<td>' . $page['url'] . '</td>'
            . '<td>' . "<a href='/codemu/drive/include/admin/edit.php?id={$page['id']}'><button class='btn btn-outline-light'>edit</button></a></td>"
            . '<td>' . "<a href='?delete={$page['id']}'><button class='btn btn-danger'>delete</button></a></td>"
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
            $_SESSION['message'] = [
                'text' => 'page removed successfully',
                'status' => 'success'
            ];
            header('Location: /codemu/drive/include/admin');
        } else {
            $_SESSION['message'] = [
                'text' => 'page not removed',
                'status' => 'error'
            ];
            return  false;
        }
    }
}

$isDelete = deletePage($db);

if (isset($_GET['added'])) {
    $info = '<span class="success" style="color:green">Page added succesful</span>';
}

/**
 * Метод описывает кнопку добавить
 */
function addPageButton() : string
{
    $out = '<a href="add.php"><button class="btn btn-danger">Add Page</button></a>';
    return $out;
}

include 'layout.php';