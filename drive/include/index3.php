<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./elems/nav/nav.css">
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