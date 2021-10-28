<?php
include 'functions.php';

session_start();


// загружаем форму через отдельный элемент
ob_start();
include ('../elems/admin/form.php');
$content = ob_get_clean();
$db = connect();

function addPage ($db) {
    if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['title'])) {
        $title = mysqli_real_escape_string($db, $_POST['title']);
        $url = mysqli_real_escape_string($db, $_POST['url']);
        $text = mysqli_real_escape_string($db, $_POST['title']);

        $query = "SELECT COUNT(*) as count FROM pages WHERE url= '$url'";
        $result = mysqli_query($db, $query);
        $isPage = mysqli_fetch_assoc($result)['count'];

        if ($isPage) {

            $_SESSION['message'] = [
                'text' => 'url is Exists',
                'status' => 'error'
            ];

        } else {
            $query = "INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')";
            mysqli_query($db, $query) or die(mysqli_error($db));

            $_SESSION['message'] = [
                'text' => 'page add successfully',
                'status' => 'success'
            ];
            header('Location: /codemu/drive/include/admin/?added=true');
        }
    } else {
        return '';
    }
}

//if (isset($_POST['submit'])) {
//    if (addPage($db)) {
//        header('Location: /codemu/drive/include/admin/?added=true');
//    } else {
//        $info = '<span class="nosucces" style="color:red">Page not added (exists!)</span>';
//    }
//
//}

addpage($db);
//getPage($db);
include 'layout.php';