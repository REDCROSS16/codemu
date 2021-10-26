<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title><?= $title;?></title>
</head>
<body>
<!--<nav> --><?php //include 'elems/nav/nav.php';?><!-- </nav>-->
<div id="wrapper">
    <header>
        <?php
        # подключение модуля nav
        include '../elems/header.php';?>
    </header>
    <main>

        <?php if (isset($info)){
            if ($info['status'] == 'success') {
                echo "<p class='info text-success'>" . $info['text'] . "</p>";
            } else {
                echo "<p class='info text-fail'>" . $info['text'] . "</p>";
            }
        }?>
        <?php echo $content; ?>
    </main>
    <footer>
        <?php
        # подключение модуля nav
        include '../elems/footer.php';?>
    </footer>
</div>
</body>
</html>