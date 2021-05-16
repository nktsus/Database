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

	$ntitle = ($_POST['title1']);
	$ntext = ($_POST['body1']);
	$nuser = ($userdata['id']);
	if(isset($_POST['submit'])){
		mysql_query($link,"INSERT INTO news SET ntitle='".$ntitle."', ntext='".$ntext."', ncreator='".$nuser."'");
		header("Location: livefeed.php"); exit();
	}

?>