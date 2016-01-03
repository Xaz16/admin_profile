<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">    

    <?php

    require_once('connect.php');

    if(isset($_POST['submit']))

    {

      $err = array();


    # проверям логин

      if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

      {

        $err[] = "Логин может состоять только из букв английского алфавита и цифр";

      }



      if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

      {

        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";

      }



    # проверяем, не сущестует ли пользователя с таким именем

      $query = $dbh->query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

      if(mysql_result($query, 0) > 0)

      {

        $err[] = "Пользователь с таким логином уже существует в базе данных";

      }



    # Если нет ошибок, то добавляем в БД нового пользователя

      if(count($err) == 0)

      {


        $login = $_POST['login'];

        

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));

        

        $dbh->query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");

        header("Location: ../index.php"); exit();

      }

      else

      {

        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

          print $error."<br>";

        }

      }

    }

    ?>

    <form method="POST">
      <div class="form-group">
        <label for="loginInput">Логин</label>
        <input type="text" class="form-control" name="login" id="loginInput">
        <label for="passInput">Пароль</label>
        <input type="password" class="form-control" name="password" id="passInput">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Зарегистрироваться</button>
    </form>
  </div>
</body>
</html>