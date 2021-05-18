<?php 
require_once("mysql.php");
require_once("check1.php");
	$ntext = $_POST['body1'];
	$nuser = $userdata['id'];
	$npostid = $_POST['messa'];
	if(isset($_POST['submit']))
	{
		//mysql_query($link,"INSERT INTO news SET ntitle='".$ntitle."', ntext='".$ntext."', ncreator='".$nuser."'");
		$sql = "INSERT INTO comments (`com_userid`, `com_postid`, `com_text`) VALUES ('".$nuser."', '".$npostid."', '".$ntext."')";
		if(mysqli_query($link, $sql)){
			header("Location: livefeed.php"); exit();
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Write comment | SberMed</title>
	<link rel="stylesheet" type="text/css" href="media/css/add-comment-styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class" style="margin-top: 15%;">
        <div class="title-container">
        	<span>Выбор новости</span>
				<?php
				$sql1 = "SELECT * FROM `news`";
  				$result_select1 = mysqli_query($link, $sql1);

  				echo "<select style = 'width: 230px;height: 22px;' name = 'messa'>";
			  	echo "<option value='0'></option>";
  				while($object1 = mysqli_fetch_object($result_select1)){
 				echo "<option value = '$object1->id' > $object1->n_title </option>";}
  			    echo "</select>";
  				?>
				<br>
				<br>
			<span style="margin-top: 5%; font-size: 120%;">Текст комментария</span>
			<div class="textarea-style">
				<textarea name="body1" rows="10"></textarea>
			</div>
            <input name="submit" type="submit" value="Отправить">
            <div class="back-link">
            	<a href="livefeed.php">Назад</a>
            </div>
            <span class="invisible">invisible</span>
        </div>
    </form>
</body>
</html>