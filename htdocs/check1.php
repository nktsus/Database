<?php
// Скрипт проверки

// Соединямся с БД
require_once("mysql.php");

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "Хм, возникла проблема во время авторизации. Повторите попытку позднее.";
        header("Location: index.php"); exit();
    }
    else
    {
        
    }
}
else
{
    print "Включите куки";
    header("Location: index.php"); exit();
}
?>