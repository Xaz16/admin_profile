<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Страница администратора</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	
	<div class="container">
		<h2>Добавить человека:</h2>
		<form method="GET" action="add.php">
			<div class="form-group">
				<label for="lastNameInput">Фамилия:</label>
				<input type="text" class="form-control" name="lastName" id="lastNameInput">
				<label for="firstNameInput">Имя, Отчество:</label>
				<input type="text" class="form-control" name="firstName" id="firstNameInput">
				<label for="descriptionInput">Описание:</label>
				<textarea class="form-control" name="description" id="descriptionInput" rows="3"></textarea>
			</div>
				<button type="submit" class="btn btn-primary" name="submit">Добавить</button>
		</form>

		<h2>Редактировать:</h2>
		<form method="GET" action="edit.php">
			<div class="form-group">
				<label for="titleInput">Название страницы (h1, title):</label>
				<input type="text" class="form-control" name="title" id="titleInput">
				<label for="subtitleInput">Подзаголовок:</label>
				<input type="text" class="form-control" name="subtitle" id="subtitleInput">
			</div>
			<button type="submit" class="btn btn-primary" name="submit">Изменить</button>
		</form>

		<div class="pull-right">
			<a href="../index.php">На главную</a>
		</div>
	</div>


</body>
</html>