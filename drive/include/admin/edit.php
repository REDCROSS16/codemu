<?php
/**
 * редактирование страниц
 */

include '../db/db.php';




// получение информации о контенте для редактирования

function getContent ($pageId)
{
    $db = connect();
    $query = "SELECT * FROM pages WHERE id=$pageId";
    $result = mysqli_query($db, $query);
    $page = mysqli_fetch_assoc($result);

    $content = '<div style="display: flex; justify-content: center;align-items: center"><form method="post" action=""><br><br>'
        . '<input name="title" class="form-control" style="width: 500px" placeholder="type title" value="' . $page["title"] . '"><br><br>'
        . '<input name="url" class="form-control" style="width: 500px" placeholder="type url" value="' . $page["url"] .'"><br><br>'
        . '<textarea name="text" class="form-control" style="width: 500px">'. $page['text'] .'</textarea><br><br>'
        . '<input type="submit" name="submit" class="btn btn-primary">'
        .'</form></div>';
    echo $content;
    include 'layout.php';
}

getContent($_GET['id']);
