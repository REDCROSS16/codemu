<?php
/**
 * редактирование страниц
 */

include '../db/db.php';

$content = '<div style="display: flex; justify-content: center;align-items: center"><form method="post" action=""><br><br>'
    . '<input name="title" class="form-control" style="width: 500px" placeholder="type title" value="' . $_POST["title"] . '"><br><br>'
    . '<input name="url" class="form-control" style="width: 500px" placeholder="type url" value="' . $_POST["url"] .'"><br><br>'
    . '<textarea name="text" class="form-control" style="width: 500px">'. $_POST['text'] .'</textarea><br><br>'
    . '<input type="submit" name="submit" class="btn btn-primary">'
    .'</form></div>';


// получение информации о контенте для редактирования

function getContent ($pageId)
{
    $db = connect();
    $query = "SELECT * FROM pages WHERE id=$pageId";
    $result = mysqli_query($db, $query);
    var_dump($result);
}


getContent($_GET['edit']);
echo 'result';