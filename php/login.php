<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<title>Логин</title>
</head>
<body>
	<div class="container">
		
		<?php

// Страница авторизации



# Функция для генерации случайной строки

		function generateCode($length=6) {

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

			$code = "";

			$clen = strlen($chars) - 1;  
			while (strlen($code) < $length) {

				$code .= $chars[mt_rand(0,$clen)];  
			}

			return $code;

		}

		require_once('connect.php');

		if(isset($_POST['submit']))

		{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

			$query = $dbh->query("SELECT user_id, user_password FROM users WHERE user_login=".$dbh->quote($_POST['login'])." LIMIT 1");
			$data = $query->fetch($dbh::FETCH_ASSOC); 

    # Сравниваем пароли

			if($data['user_password'] === md5(md5($_POST['password'])))

			{

        # Генерируем случайное число и шифруем его

				$hash = md5(generateCode(10));
 
        # Записываем в БД новый хеш авторизации и IP

				$dbh->query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");



        # Ставим куки

				setcookie("id", $data['user_id'], time()+60*60*24*30);

				setcookie("hash", $hash, time()+60*60*24*30);



        # Переадресовываем браузер на страницу проверки нашего скрипта

				header("Location: php/check.php"); exit();

			}

			else

			{

				print "Вы ввели неправильный логин/пароль";

			}

		}

		?>

		<form method="POST">
			<div class="form-group">
				<label for="loginInput">Логин</label>
				<input type="text" class="form-control" name="login" id="loginInput" placeholder="Логин">
			</div>
			<div class="form-group">
				<label for="passInput">Пароль</label>
				<input type="password" class="form-control" name="password" id="passInput" placeholder="Пароль">
			</div>
				<button type="submit" class="btn btn-primary" name="submit">Войти</button>
			</form>
		</div>
	</body>
	</html>