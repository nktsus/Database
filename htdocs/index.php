<?php
	require_once("mysql.php");
?>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="media/login_styles.css">
	<title>SberMed</title>
</head>
<body class="bg">
	<form action="" id="loginForm" method="post" name="loginForm">
		<div class="container">
			<div class="logo-section">
				<img src="media/img/logo.svg" alt="" class="logo">
				<span class="name">СБЕР</span>
				<br>
			</div>
			<div class="info-section">
				<span style="font-size: 1vw;">Для продолжения пожайлуста пройдите авторизацию</span>
			</div>
			<div class="auth-section">
				<span>Логин</span>
				<input type="text" class="login-area" id="usernameInput" name="login">
				<span>Пароль</span>
				<input type="text" class="pass" id="passwordInput" name="password">
				<span>Не привязывать сессию к IP (не безопасно)</span>
				<input type="checkbox" name="not_attach_ip">
			</div>
			<div class="enter-section">
				<input type="submit" value="Войти" class="input-button" name="submit">
			</div>
			<div class="reg-section">
				<a href="registration.php" class="reg-link">Регистрация</a>
			</div>
		</div>
	</form>
</body>
</html>

<?php
	// Страница авторизации

	// Функция для генерации случайной строки
	function generateCode($length=6) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
	    $code = "";
	    $clen = strlen($chars) - 1;
	    while (strlen($code) < $length) {
	            $code .= $chars[mt_rand(0,$clen)];
	    }
	    return $code;
	}
	if(isset($_POST['submit']))
	{
	    // Вытаскиваем из БД запись, у которой логин равняеться введенному
	    $query = mysqli_query($link,"SELECT id, passw FROM users WHERE username='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
	    $data = mysqli_fetch_assoc($query);

	    // Сравниваем пароли
	    if($data['passw'] === $_POST['password'])
	    {
	        // Генерируем случайное число и шифруем его
	        $hash = md5(generateCode(10));

	        if(!empty($_POST['not_attach_ip']))
	        {
	            // Если пользователя выбрал привязку к IP
	            // Переводим IP в строку
	            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
	        }

	        // Записываем в БД новый хеш авторизации и IP
	        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE id='".$data['id']."'");

	        // Ставим куки
	        setcookie("id", $data['id'], time()+60*60*24*30, "/");
	        setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true);

	        // Переадресовываем браузер на страницу проверки нашего скрипта
	        header("Location: check.php"); exit();
	    }
	    else
	    {
	        print ("Вы ввели неправильный логин/пароль");
	    }
	}
?>
