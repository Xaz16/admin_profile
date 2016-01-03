<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <?php

// Скрипт проверки


# Соединямся с БД

    require_once('connect.php');


    if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

    {   

        $query = $dbh->query("SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

        $userdata = $query->fetch($dbh::FETCH_ASSOC);


        if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
            or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))

        {

            setcookie("id", "", time() - 3600*24*30*12, "/");

            setcookie("hash", "", time() - 3600*24*30*12, "/");

            print "Хм, что-то не получилось";

        }

        else

        {
            if($userdata['user_admin'] == 1) {

                header("Location: admin.php");
            }

            print "Привет, ".$userdata['user_login'].". Всё работает!";

        }



    }

    else

    {

        print "Включите куки";

    }

    ?>
    
</body>
</html>