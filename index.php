<?php require_once('php/connect.php'); 

$values = $dbh->query("SELECT * FROM data");
$datatitle = $values->fetch(PDO::FETCH_LAZY);

$res = $dbh->query("SELECT * FROM composition");

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php echo $datatitle['title'] ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
	<div class="pull-right"><a href="php/register.php">Регистрация</a></div>
		<?php require_once('php/login.php') ?>

		<!--<a href="php/register.php">Регистрация</a>-->


		<h1><?php echo $datatitle['title'] ?></h1>
		<h4><?php echo $datatitle['subtitle'] ?></h4>
		<ul><?php while ($row = $res->fetch(PDO::FETCH_LAZY)) {
			echo '<li>Фамилия: '.$row['last_name'].'<br>Имя, Отчество: '.$row['first_name'].'<br>Описание: '.$row['description'].'</li>';
		} ?>
	</ul>
</div>
</body>
</html>