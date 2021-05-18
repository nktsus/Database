<?php 
require_once("mysql.php");
require_once("check1.php");
	$nlike = $_POST['posta'];
	$nuser = $userdata['id'];
	$nreciever = $_POST['messa'];
	if(isset($_POST['submit']))
	{
		//mysql_query($link,"INSERT INTO news SET ntitle='".$ntitle."', ntext='".$ntext."', ncreator='".$nuser."'");
		$sql = "INSERT INTO likes (`like_userid`, `like_postid`) VALUES ('".$nuser."', '".$nlike."')";
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
	<title>Add like | SberMed</title>
	<link rel="stylesheet" type="text/css" href="media/css/add-like_styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
        <div class="title-container">
        	<span>Выбор новости</span>
				<?php
				$sql1 = "SELECT * FROM `news`";
  				$result_select1 = mysqli_query($link, $sql1);

  				echo "<select style = 'width: 230px;height: 22px;' name = 'posta'>";
			  	echo "<option value='0'></option>";
  				while($object1 = mysqli_fetch_object($result_select1)){
 				echo "<option value = '$object1->id' > $object1->n_title </option>";}
  			    echo "</select>";
  				?>
				<br>
				<br>
            <input name="submit" type="submit" value="Поставить лайк">
            <div class="back-link">
            	<a href="livefeed.php">Назад</a>
            </div>
            <span class="invisible">invisible</span>
        </div>
    </form>
</body>
</html>