<?php
/**
 * редактирование страниц
 */

include 'functions.php';
$db = connect();

// получение информации о контенте для редактирования
/**
 * @param $pageId
 */
function getPage ($link, $info)
{
    $id = $_GET['id'];
    $query = "SELECT * FROM pages WHERE id=$id";
    $result = mysqli_query($link, $query);
    $page = mysqli_fetch_assoc($result);

    if (!$page) {
        $content = '<div><p>page not found</p></div>';
    } else {
        $content = '<div style="display: flex; justify-content: center;align-items: center"><form method="POST" action=""><br><br>'
            . '<label>Заголовок</label>'
            . '<input name="title" class="form-control" style="width: 500px" placeholder="type title" value="' . $page["title"] . '"><br>'
            . '<label>URL</label>'
            . '<input name="url" class="form-control" style="width: 500px" placeholder="type url" value="' . $page["url"] .'"><br>'
            . '<label>Текст</label>'
            . '<textarea name="text" class="form-control" style="width: 500px">'. $page['text'] .'</textarea><br><br>'
            . '<input type="submit" name="submit" class="btn btn-primary">'
            .'</form></div>';
    }
    // $content выводится в лайоут
    include 'layout.php';
}

function savePage($db) {

    if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
        $id = $_GET['id'];

//        if (checkPage($url)) { return false; }

        $query = "UPDATE pages SET title = '$title' , url = '$url', text = '$text'  WHERE id= $id";
        mysqli_query($db, $query);

        return [
            'text' => 'Page edited successful',
            'status' => 'success'
        ];
    }
}
//if (isset($_GET['submit'])) {
//    savePage();
//}
$info = savePage($db);
getPage($db, $info);