<?php

$page = $_GET['page'];
$path = "pages/$page.php";
if (file_exists($path)) {
//    include $path;
    $content = file_get_contents($path);
} else {
    $content = 'file not found';
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php include 'elems/head.php';?>
    <title>Index</title>
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