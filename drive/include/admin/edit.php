<?php
/**
 * редактирование страниц
 */
include '../elems/init.php';
include 'functions.php';
$db = connect();


// получение информации о контенте для редактирования
/**
 * @param $pageId
 */
function getPage ($db, $info)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM pages WHERE id=$id";
        $result = mysqli_query($db, $query);
        $p = mysqli_fetch_assoc($result);
        $content = '';
        include 'layout.php';

        if ($p) {
            $pageExists = true;
            if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['text'])) {
                $title = mysqli_real_escape_string($db, $_POST['title']);
                $url = mysqli_real_escape_string($db, $_POST['url']);
                $text = mysqli_real_escape_string($db, $_POST['text'] );
            } else {
                $title = $p['title'];
                $url = $p['url'];
                $text = $p['text'];
            }

//            ob_clean();
            include ('../elems/admin/form.php');
//            $content = ob_get_clean();
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
                    $_SESSION['message'] = [
                        'text' => 'This URL is exists!',
                        'status' => 'error'
                    ];
                }
            }

            $query = "UPDATE pages SET title = '$title' , url = '$url', text = '$text'  WHERE id= $id";
            mysqli_query($db, $query);

            $_SESSION['message'] = [
                'text' => 'Page edited successful',
                'status' => 'success'
            ];
        }
    } else {
        return false;
    }
}

$info = savePage($db);
getPage($db, $info);