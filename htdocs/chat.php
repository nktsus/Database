<?php 
require_once("mysql.php");
require_once("check1.php");
$html_username = "".$userdata['id']."";
ob_start();
if(isset($_POST['submit'])){


	//echo "<table border=1>";
	$tmp11 = $_POST['messages'];

	$sql = mysqli_query($link, "SELECT * FROM `messages` WHERE mes_sender = '$tmp11' AND mes_reciever = '$html_username' OR mes_reciever = '$tmp11' AND mes_sender = '$html_username'");
  	while ($result = mysqli_fetch_array($sql)) {
  		$tmp1 = $result['mes_sender'];
  		$sql1 = mysqli_query($link, "SELECT * FROM `users` WHERE id = '$tmp1' ");
  		$result1 = mysqli_fetch_array($sql1);
  		//echo "{$result1['username']}";
  	}
  }
	//while ($row=$result->fetch_assoc()){
		//print"".$row['n_title']."";
		//print"".$row['n_text']."";
  if(isset($_POST['submit2'])){

  	header("Location: createmessage.php"); exit();
  }

ob_end_flush();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Chat | SberMed</title>
	<link rel="stylesheet" href="media/css/chat-styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
        <div class="title-container">
            <span>Выбор собеседника</span>
				<?php
				$sql1 = "SELECT * FROM `users`";
  				$result_select1 = mysqli_query($link, $sql1);

  				echo "<select style='width:60%; margin-left:20%;'  name = 'messages'>";
			  	echo "<option value='0'></option>";
  				while($object1 = mysqli_fetch_object($result_select1)){
 				echo "<option value = '$object1->id' > $object1->username | $object1->firstname $object1->lastname </option>";}
  			    echo "</select>";
  				?>
				<br>
				<br>
			<div class="date-submit">
            	<input name="submit" type="submit" value="Показать сообщения">
            	<input name="submit2" type="submit" value="Написать сообщение">
            </div>
            <span class="invisible">invisible</span>	
        </div>

    </form>
    <div class="message-story">
      <span style="text-align: center; margin-top: 3%; font-weight: 700;">История сообщений</span>
      <div class="message-container">
      <?php 
require_once("mysql.php");
require_once("check1.php");
$html_username = "".$userdata['id']."";
ob_start();
if(isset($_POST['submit'])){


  //echo "<table border=1>";
  $tmp11 = $_POST['messages'];

  $sql = mysqli_query($link, "SELECT * FROM `messages` WHERE mes_sender = '$tmp11' AND mes_reciever = '$html_username' OR mes_reciever = '$tmp11' AND mes_sender = '$html_username'");
    while ($result = mysqli_fetch_array($sql)) {
      echo "<br>" ;
      echo "<br>" ;
      $tmp1 = $result['mes_sender'];
      $sql1 = mysqli_query($link, "SELECT * FROM `users` WHERE id = '$tmp1' ");
      $result1 = mysqli_fetch_array($sql1);
      echo "{$result1['username']}: ";
      //echo "{$result1['username']}";
      echo "{$result['mes_text']}";
      echo "<br>" ;
    }
  }
  //while ($row=$result->fetch_assoc()){
    //print"".$row['n_title']."";
    //print"".$row['n_text']."";
  if(isset($_POST['submit2'])){

    header("Location: createmessage.php"); exit();
  }

ob_end_flush();
?></div>
  <span class="invisible">invisible</span>
    <a href="livefeed.php" class="back-link">Назад</a>
    <span class="invisible">invisible</span>
    </div>
</body>
</html>