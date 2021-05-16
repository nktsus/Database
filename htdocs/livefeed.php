<?php 
require_once("mysql.php");
require_once("check1.php");
print "Привет, ".$userdata['username']."";
echo "<br>" ;
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
</head>
<body>
    <form method="POST" class="form-class">
        <div class="title-container">
            <input name="submit" type="submit" value="Создать новость">
            <a href="profile.php">Профиль</a>
            <a href="visitregistration.php">Зарегистрироваться на прием</a>
        </div>
    </form>
</body>
</html>