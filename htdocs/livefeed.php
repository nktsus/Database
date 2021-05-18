<?php 
require_once("mysql.php");
require_once("check1.php");
$html_username = "".$userdata['username']."";
if(isset($_POST['submit'])){
	header("Location: createnews.php"); exit();
}

	//echo "<table border=1>";

	/*$sql = mysqli_query($link, 'SELECT `n_title`,`n_text` FROM `news`');
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

<<<<<<< HEAD
	//}	
	
=======
	//}
>>>>>>> ec02b4a920b67ff0ece9ab68c35c3fe33f4707f4
	//echo "</table>";
  */
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
              <a href="addlike.php">| Поставить лайк</a>
              <a href="addcomment.php">| Оставить комментарий</a>
              <a href="profile.php">| Профиль</a>
              <a href="visitregistration.php">| Зарегистрироваться на прием</a>
              <a href="viewvisits.php">| История посещений</a>
              <a href="chat.php">| Чат</a>
          </div>
      </nav>
      <div style="
        display: flex;
        flex-direction: column;
        margin-top: 5%;
        ">
        <div style="
          padding: 1% 1% 1% 1%;
          background-color: #fff;
        ">
          <?php  
          $sql = mysqli_query($link, 'SELECT * FROM `news`');
    while ($result = mysqli_fetch_array($sql)) {
      echo "<br>" ;
      echo "<span style='font-weight: 700;'>{$result['n_title']}</span>";
      echo "<br>" ;
      echo "<span style='font-size: 90%;'>{$result['n_text']}</span>";
      echo "<br>"; 
      $tmp = $result['id'];
      $sql1 = mysqli_query($link, "SELECT * FROM `likes` where like_postid = '$tmp'");
      $numr = mysqli_num_rows($sql1);
      echo "<span style='font-size: 90%;'>Лайков: {$numr}</span>";
      echo "<br>";
      echo "Комментарии: ";
      $sql2 = mysqli_query($link, "SELECT * FROM `comments` where com_postid = '$tmp'");
      while ($result2 = mysqli_fetch_array($sql2)){
        echo "<br>" ;
        $tmp2 = $result2['com_userid'];
        $sql22 = mysqli_query($link, "SELECT * FROM `users` WHERE id = '$tmp2' ");
        $result22 = mysqli_fetch_array($sql22);
        echo "{$result22['username']}: ";
        //echo "{$result1['username']}";
        echo "{$result2['com_text']}";
        echo "<br>" ;
        echo "{$result2['com_date']}";
        echo "<br>";
        }
       
      }
    ?>
        </div>
      </div>  
    </form>
  
</body>
</html>





