<?php
require_once("mysql.php");
require_once("check1.php");

	$userid = $userdata['id'];
	//$sql = "SELECT * FROM visits WHERE visit_userid = '".$userid."'";
	//$sql = "INSERT INTO visits (`visit_userid`, `visit_clinid`, `visit_empid`, `visit_servid`, `visit_date`) VALUES ('".$visituser."', '".$clinics."', '".$employees."', '".$clinic_services."', '".$date."')";
	$sql = mysqli_query($link, 'SELECT * FROM `visits`');
  	while ($result = mysqli_fetch_array($sql)){
  		echo "<br>" ;
    	echo "{$result['visit_clinid']}";
    	echo "<br>" ;
    	echo "{$result['visit_empid']}";
    	echo "<br>";
    	echo "<br>" ;
    	echo "{$result['visit_servid']}";
    	echo "<br>";
    	echo "<br>" ;
    	echo "{$result['visit_date']}";
    	echo "<br>";
  	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Visits history | SberMed</title>
	<link rel="stylesheet" href="media/css/profile_styles.css">
</head>
<body class="bg">
	
</body>
</html>