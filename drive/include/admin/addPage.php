<?php
include 'functions.php';

// загружаем форму через отдельный элемент
ob_start();
include ('../elems/admin/form.php');
$content = ob_get_clean();

function addPage () {
    $db = connect();
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $url = mysqli_real_escape_string($db, $_POST['url']);
    $text = mysqli_real_escape_string($db, $_POST['title']);;


    if (checkPage($url)) { return false; }

    $query = "INSERT INTO pages (title, url, text) VALUES('$title', '$url', '$text')";
    mysqli_query($db, $query);
    return true;
}

$title = 'Add page';

if (isset($_POST['submit'])) {
    if (addPage()) {
        header('Location: /codemu/drive/include/admin/?added=true');
    } else {
        $info = '<span class="nosucces" style="color:red">Page not added (exists!)</span>';
    }

}
include 'layout.php';