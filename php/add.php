<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

<?php		
require_once('connect.php');
$variables = array('last_name' => $_GET['lastName'], 'first_name' => $_GET['firstName'], 'description' => $_GET['description']);

if(isset($_GET['submit']) and strlen($variables['last_name']) > 2 and strlen($variables['first_name']) > 2 ) {
	$query = $dbh->prepare('INSERT INTO composition (last_name, first_name, description) VALUES (:last_name, :first_name, :description)');
	$query->execute($variables);

	echo ('Данные добавлены <br> Фамилия:'.$variables['last_name'].'<br> Имя, Отчество:'.$variables['first_name'].'<br> Описание:'.$variables['description'].'<br><a href="admin.php">Назад</a>');
} else {
	echo ('Имя и Фамилия должны быть больше 2 символов <a href="admin.php">Назад</a>');
}
?>
</body>
</html>