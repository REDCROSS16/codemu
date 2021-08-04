<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <div id="wrapper">
        <header>
            <?php include 'elems/header.php';?>
        </header>
        <main>
            <?php if (file_exists('elems/main.php')) { include 'elems/main.php';} ;?>
        </main>
        <footer>
            footer
        </footer>
    </div>
</body>
</html>