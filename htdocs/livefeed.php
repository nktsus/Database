<?php 
require_once("mysql.php");
require_once("check1.php");
$html_username = "".$userdata['username']."";
if(isset($_POST['submit'])){
	header("Location: createnews.php"); exit();
}

	//echo "<table border=1>";

	$sql = mysqli_query($link, 'SELECT `n_title`,`n_text` FROM `news`');
  	while ($result = mysqli_fetch_array($sql)) {
  		echo "<br>" ;
    	echo "{$result['n_title']}";
    	echo "<br>" ;
    	echo "{$result['n_text']}";
    	echo "<br>";
  	}

	//while ($row=$result->fetch_assoc()){
		//print"".$row['n_title']."";
		//print"".$row['n_text']."";

	//}	
	
	//echo "</table>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Live feed | SberMed</title>
  <link rel="stylesheet" href="media/css/livefeed_styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
      <nav>
        <div class="username">
          <span>Рады видеть вас снова,   <?php echo $html_username ?></span>
          <input type="checkbox" disabled="true" style="opacity: 0;">
        </div>
          <div class="title-container">
              <input name="submit" type="submit" value="Создать новость">
              <a href="profile.php">Профиль</a>
              <a href="visitregistration.php">Зарегистрироваться на прием</a>
              <a href="viewvisits.php">История посещений</a>
          </div>
      </nav>
    </form>
  
</body>
</html>





