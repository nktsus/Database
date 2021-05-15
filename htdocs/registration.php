<?php
// Страница регистрации нового пользователя

// Соединямся с БД
require_once("mysql.php");

if(isset($_POST['submit']))
{
    $err = [];

    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT id FROM users WHERE username='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];
        $password = ($_POST['password']);
        $firstname = ($_POST['firstname']);
        $lastname = ($_POST['lastname']);
        $email = ($_POST['email']);


        mysqli_query($link,"INSERT INTO users SET username='".$login."', passw='".$password."', firstname='".$firstname."', lastname='".$lastname."', email='".$email."'");
        header("Location: index.php"); exit();
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
<!DOCTYPE html>
<html>
<head>
    <title>Registration | SberMed</title>
    <link rel="stylesheet" type="text/css" href="media/css/reg_styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
        <div class="title-container">
            <span>Логин</span>
            <input name="login" type="text" required>
            <span>Пароль</span>
            <input name="password" type="password" required>
            <span>Имя</span>
            <input name="firstname" type="text" required>
            <span>Фамилия</span>
            <input name="lastname" type="text" required>
            <span>E-mail</span>
            <input name="email" type="text">

            <input name="submit" type="submit" value="Зарегистрироваться">
        </div>
    </form>

</body>
</html>


