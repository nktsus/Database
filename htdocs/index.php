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
				<input type="text" class="login-area" id="usernameInput" name="usernameInput">
				<span>Пароль</span>
				<input type="text" class="pass" id="passwordInput" name="passwordInput">
			</div>
			<div class="enter-section">
				<input type="submit" value="Войти" class="input-button">
			</div>
			<div class="reg-section">
				<a href="registration" class="reg-link">Регистрация</a>
			</div>
		</div>
	</form>
</body>
</html>

<?php 
$query = "SELECT * FROM auth_users_list";
	$result = mysql_query($query) or die (mysql_error()); 
	$row = mysql_fetch_row($result); 



	if(isset($_POST['usernameInput']) && isset($_POST['passwordInput'])){
    $username = $_POST['usernameInput'];    
    $password = $_POST['passwordInput'];
	}
	else{
	   echo 'Please check username and password.';
	}

	if($username == $row ['username'] && $password == $row ['password']){
	    
	} 
	else{
	    echo 'Username or password is wrong.';
	} 
?>