<!doctype html>
<html lang="en">
<head>
    <title>Index</title>
</head>
<body>
    <div id="wrapper">
        <header>

            <?php
            # подключение модуля nav
            include 'elems/nav/nav.php';
            ?>
            
        </header>
        <main>
            <?php if (file_exists('elems/main.php')) { include 'elems/main.php';} ;?>
        </main>
        <footer>

        </footer>
    </div>
    <script src="elems/nav/nav.js"></script>
</body>
</html>