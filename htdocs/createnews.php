<?php 
require_once("mysql.php");
require_once("check1.php");
print "Привет, ".$userdata['username']."";

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
</head>
<body>
    <form method="POST" class="form-class">
        <div class="title-container">
        	<span>Заголовок</span>
			<input type="text" name="title1">
			<span>Текст новости</span>
			<input type="text" name="body1">
            <input name="submit" type="submit" value="Опубликовать">
        </div>
    </form>
</body>
</html>
