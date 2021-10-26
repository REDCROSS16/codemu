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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM pages WHERE id=$id";
        $result = mysqli_query($link, $query);
        $page = mysqli_fetch_assoc($result);
        include 'layout.php';

        if ($page) {
            $pageExists = true;

            if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
                $title = mysqli_real_escape_string($link, $_POST['title']);
                $url = mysqli_real_escape_string($link, $_POST['url']);
                $text = mysqli_real_escape_string($link, $_POST['text'] );
            } else {
                $title = $page['title'];
                $url = $page['url'];
                $text = $page['text'];
            }

            ob_clean();
            include ('../elems/admin/form.php');
            $content = ob_get_clean();
//            $content = '<div style="display: flex; justify-content: center;align-items: center"><form method="POST" action=""><br><br>'
//                . '<label>Заголовок</label>'
//                . '<input name="title" class="form-control" style="width: 500px" placeholder="type title" value="' . $title . '"><br>'
//                . '<label>URL</label>'
//                . '<input name="url" class="form-control" style="width: 500px" placeholder="type url" value="' . $url . '"><br>'
//                . '<label>Текст</label>'
//                . '<textarea name="text" class="form-control" style="width: 500px">' . $text . '</textarea><br><br>'
//                . '<input type="submit" name="submit" class="btn btn-primary">'
//                . '</form></div>';

        } else {
            $pageExists = false;
            $content = '<div><p>page not found</p></div>';
        }
    } else {
        $content = "PAGE NOT FOUND, H4CK3R HA-HA-HA";
    }
    // $content выводится в лайоут
    return '';
}

function savePage($db) {
    if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text'];
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM pages WHERE id = $id";
            $result = mysqli_query($db, $query);
            $page = mysqli_fetch_assoc($result);

            if ($page['url'] !== $url) {
                $query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
                $result = mysqli_query($db, $query);
                $isPage = mysqli_fetch_assoc($result)['count'];

                if ($isPage == 1) {
                    return [
                        'text'   => 'This URL is exists!',
                        'status' => 'error'
                    ];
                }

            }

            $query = "UPDATE pages SET title = '$title' , url = '$url', text = '$text'  WHERE id= $id";
            mysqli_query($db, $query);

            return [
                'text' => 'Page edited successful',
                'status' => 'success'
            ];

        }


    } else {
        return false;
    }
}
//if (isset($_GET['submit'])) {
//    savePage();
//}
$info = savePage($db);
getPage($db, $info);