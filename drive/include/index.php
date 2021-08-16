<?php

$page = $_GET['page'];
$path = "pages/$page.php";
if (file_exists($path)) {
    $page = file_get_contents($path);

    if (preg_match("/\{\{title:(.*?)\}\}/", $page, $match)) {
        $title = $match[1];

    } else {
        $title = '';
    }
    $content = preg_replace('#\{\{title:(.*?)\}\}#', '', $page);

} else {
    $content = 'file not found';
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'elems/head.php';?>
    <title><?= $title;?></title>
</head>
<body>
    <nav> <?php include 'elems/nav/nav.php';?> </nav>
    <div id="wrapper">
        <header>
            <?php
            # подключение модуля nav
            include 'elems/header.php';?>
        </header>
        <main>
            <?php echo $content; ?>
        </main>
        <footer>
            <?php
            # подключение модуля nav
            include 'elems/footer.php';?>
        </footer>
    </div>
    <script src="elems/nav/nav.js"></script>
</body>
</html>