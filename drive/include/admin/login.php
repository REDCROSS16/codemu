<?php
include '../elems/init.php';
$title = 'login page';


?>
<?php if (isset($_POST['password']) && md5($_POST['password']) === '202cb962ac59075b964b07152d234b70') {
    $_SESSION['auth'] = true;
    $_SESSION['message'] = [
        'status' => 'success',
        'text'   => 'U auth successfully!'
    ];
    header('Location: /codemu/drive/include/admin'); die();
} else {
    include 'elems/loginForm.php';
}
?>

<head>
    <?php include 'elems/head.php';?>
    <title><?= $title;?></title>
</head>
