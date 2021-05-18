<?php 
require_once("mysql.php");
require_once("check1.php");
	$ntitle = $_POST['title1'];
	$ntext = $_POST['body1'];
	$nuser = $userdata['id'];
	if(isset($_POST['submit']))
	{
		//mysql_query($link,"INSERT INTO news SET ntitle='".$ntitle."', ntext='".$ntext."', ncreator='".$nuser."'");
		$sql = "INSERT INTO news (`n_title`, `n_text`, `n_creator`) VALUES ('".$ntitle."', '".$ntext."', '".$nuser."')";

		if(mysqli_query($link, $sql)){
		    echo "Records inserted successfully.";
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

		header("Location: livefeed.php"); exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create news | SberMed</title>
	<link rel="stylesheet" type="text/css" href="media/css/create_news_styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
        <div class="title-container" style="background-color: #fff; border-radius: 10%;">
        	<span style="margin-top: 2%; font-size: 150%;">Заголовок</span>
			<input type="text" name="title1" style="text-align: center; margin-top: 3%; width: 80%; margin-left: 10%;">
			<span style="margin-top: 5%; font-size: 120%;">Текст новости</span>
			<div class="textarea-style">
				<textarea name="body1" rows="10"></textarea>
			</div>
            <input name="submit" type="submit" value="Опубликовать">
            <div class="back-link">
            	<a href="livefeed.php">Назад</a>
            </div>
        </div>
    </form>
</body>
</html>
