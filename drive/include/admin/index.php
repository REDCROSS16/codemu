<?php
# роутинг
if (isset($_GET['page'])) {
    $page = $page = $_GET['page'];
} else {
    $page = 'index';
}
# подключение к БД
include '../elems/init.php';

if (isset($_POST['password']) && $_POST['password'] === '123') {
    $db = connect();
    $query = 'SELECT id, title, url FROM pages';
    $result = mysqli_query($db, $query);
    $page = mysqli_fetch_assoc($result);

    /**
     * Метод описывает кнопку добавить
     */
    function addPageButton() : string
    {
        return '<a href="add.php"><button class="btn btn-info">Add Page</button></a>';
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
                    'text'   => 'Page removed successfully',
                    'status' => 'success'
                ];
                header('Location: /codemu/drive/include/admin'); die();
            } else {
                $_SESSION['message'] = [
                    'text' => 'Page not removed!',
                    'status' => 'error'
                ];
                return  false;
            }
        }
    }

    $isDelete = deletePage($db);
    include 'elems/layout.php';
} else {

}
?>

<form>

    <input type="password" name="password">
    <input type="submit">
</form>
    
