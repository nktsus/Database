<?php
require_once("mysql.php");
require_once("check1.php");
$html_login = "".$userdata['username']."";
$html_name = "".$userdata['firstname']."";
$html_lastname = "".$userdata['lastname']."";
$html_email = "".$userdata['email']."";
$html_reg_date = "".$userdata['reg_date']."";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile | SberMed</title>
	<link rel="stylesheet" href="media/css/profile_styles.css">
</head>
<body class="bg">
	<div class="container">
		<div class="person-logo">
			<span style="margin-top: 5%; margin-bottom: 5%;">Привет, <?php echo $html_login;?></span>
			<div class="logo-class">
				<img src="media/img/logo.svg" alt="">
			</div>
		</div>
		<div class="info">
			<span style="text-align: center; font-size: 150%;">Персональная информация</span>
			<div class="person-info">
				<span>Имя: <?php echo $html_name;?></span>
				<span>Фамилия: <?php echo $html_lastname;?></span>
				<span>E-mail: <?php echo $html_email;?></span>
				<span>Дата регистрации: <?php echo $html_reg_date;?></span>
			</div>
		</div>
		<form method="POST" class="form-class">
			<a href="livefeed.php">Назад</a>
            <hr>
        	<a href="logout.php">Выйти из профиля</a>
        	<input type="checkbox" disabled="true">
    	</form>
	</div>
</body>
</html>