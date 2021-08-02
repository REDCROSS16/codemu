
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Гостевая книга</h1>

            <?php
            require_once 'db/config.php';


            while( $row = $result->fetch_assoc()) {
                $name = $row['user'];
                $message = $row['message'];
                $date = $row['date'];
                echo '<div class="note">'
                    . '<p>'
                    . "<span class='date'>" . $row['date'] . "</span>"
                    . "<span class='name'>" . $row['user'] . "</span>"
                    . '</p>'
                    . '<p>' . $row['message'] . '</p></div>';
            } ?>
            <?php require_once 'functions.php';?>
			<div id="form">
				<form action="#form" method="POST" name="form">
					<p><input class="form-control" placeholder="Ваше имя" name="name"></p>
					<p><textarea class="form-control" placeholder="Ваш отзыв" name="message"></textarea></p>
					<p><input type="submit" class="btn btn-info btn-block" value="Сохранить" name="submit"></p>
				</form>
			</div>
		</div>

	</body>
</html>