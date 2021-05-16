<?php
require_once("mysql.php");
require_once("check1.php");
print "Привет, ".$userdata['username']."";
echo "<br>";
print "Персональная информация:";
echo "<br>";
print "Имя: ".$userdata['firstname']."";
echo "<br>";
print "Фамилия: ".$userdata['lastname']."";
echo "<br>";
print "Email: ".$userdata['email']."";
echo "<br>";
print "Дата регистрации: ".$userdata['reg_date']."";
echo "<br>";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile | SberMed</title>
</head>
<body>
    <form method="POST" class="form-class">
        <div class="title-container">
            <a href="logout.php">Выйти из профиля</a>
        </div>
    </form>
</body>
</html>