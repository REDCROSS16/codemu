<?php
include 'functions.php';
include '../elems/init.php';

// загружаем форму через отдельный элемент
ob_start();
$title = $_POST['title'] ?? '';
$url = $_POST['url'] ?? '';
$text = $_POST['text'] ?? '';
include ('../elems/admin/form.php');
$content = ob_get_clean();

function addPage () {
    if (isset($_POST['title']) && isset($_POST['url']) && isset($_POST['title'])) {

        $db = connect();

        $title = mysqli_real_escape_string($db, $_POST['title']);
        $url = mysqli_real_escape_string($db, $_POST['url']);
        $text = mysqli_real_escape_string($db, $_POST['text']);

        $query = "SELECT COUNT(*) as count FROM pages WHERE url= '$url'";
        $result = mysqli_query($db, $query);
        $isPage = mysqli_fetch_assoc($result)['count'];


        if ($isPage) {
            $pageExists = true;
            $_SESSION['message'] = [
                'text'   => 'url is Exists',
                'status' => 'error'
            ];

        } else {
            $query = "INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')";
            mysqli_query($db, $query) or die(mysqli_error($db));

            $_SESSION['message'] = [
                'text'   => 'Page added successfully!',
                'status' => 'success'
            ];
            header('Location: /codemu/drive/include/admin/'); die();
        }
    } else {
        return '';
    }
}

addpage();
include 'elems/layout.php';