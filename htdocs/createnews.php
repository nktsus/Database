<?php 
require_once("mysql.php");
require_once("check1.php");
print "Привет, ".$userdata['username']."";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create news | SberMed</title>
</head>
<body>
    <form method="POST" class="form-class">
        <div class="title-container">
        	<span>Заголовок</span>
			<input type="text" class="login-area" id="title1" name="title1">
			<span>Текст новости</span>
			<input type="text" class="login-area" id="body1" name="body1">
            <input name="submit" type="submit" value="Опубликовать">
        </div>
    </form>
</body>
</html>

<?php

	$title = (addslashes($_POST['title1']));
	$text = (addslashes($_POST['body1']));
	$user = ($userdata['id']);
	mysql_query($link, "INSERT INTO news SET ntitle='".$title."', ntext='".$text."', ncreator='".$user."'");
	header("Location: livefeed.php"); exit();


?>