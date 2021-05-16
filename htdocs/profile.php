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
			<span class="hello">Привет, <?php echo $html_login;?></span>
		</div>
		<div class="info">
			<span>Персональная информация</span>
			<span>Имя: <?php echo $html_name;?></span>
			<span>Фамилия:<?php echo $html_lastname;?></span>
			<span>E-mail: <?php echo $html_email;?></span>
			<span>Дата регистрации: <?php echo $html_reg_date;?></span>
		</div>
		<form method="POST" class="form-class">
        	<div class="title-container">
            	<a href="logout.php">Выйти из профиля</a>
        	</div>
    	</form>
	</div>
</body>
</html>