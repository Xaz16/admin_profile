<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Успех</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
<?php
require_once('connect.php');
$values = array('title' => $_GET['title'], 'subtitle' => $_GET['subtitle']);
if(isset($_GET['submit'])) {

			$querytitle = $dbh->prepare('UPDATE data SET title = :title');
			$querytitle->execute(array(':title' => $_GET['title']));


			$querysubtitle = $dbh->prepare('UPDATE data SET subtitle = :subtitle');
			$querysubtitle->execute(array(':subtitle' => $_GET['subtitle']));	

}
echo ('Вы ввели данные:<br> Заголовок: '.$values['title'].'<br>Подзаголовок: '.$values['subtitle'].'<br><a href="../index.php">Назад</a>');
?>

</body>
</html>
