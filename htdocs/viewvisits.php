<?php
require_once("mysql.php");
require_once("check1.php");

	$userid = $userdata['id'];
	//$sql = "SELECT * FROM visits WHERE visit_userid = '".$userid."'";
	//$sql = "INSERT INTO visits (`visit_userid`, `visit_clinid`, `visit_empid`, `visit_servid`, `visit_date`) VALUES ('".$visituser."', '".$clinics."', '".$employees."', '".$clinic_services."', '".$date."')";
	$sql = mysqli_query($link, "SELECT * FROM `visits` WHERE visit_userid ='$userid' ");
  	while ($result = mysqli_fetch_array($sql)){
  		echo "<br>" ;
  		echo "<br>" ;

  		$tmp1 = $result['visit_clinid'];
  		$sql1 = mysqli_query($link, "SELECT * FROM `clinics` WHERE id = '$tmp1' ");
  		$result1 = mysqli_fetch_array($sql1);
    	echo "{$result1['clinicname']}";
    	echo "<br>" ;
    	echo "<br>" ;

    	$tmp2 = $result['visit_empid'];
  		$sql2 = mysqli_query($link, "SELECT * FROM `employees` WHERE id = '$tmp2' ");
  		$result2 = mysqli_fetch_array($sql2);
    	echo "{$result2['emp_name']}";
    	echo " {$result2['emp_surname']}";
    	echo "<br>";
    	echo "<br>" ;
    	$tmp3 = $result['visit_servid'];
  		$sql3 = mysqli_query($link, "SELECT * FROM `clinic_services` WHERE id = '$tmp3' ");
  		$result3= mysqli_fetch_array($sql3);
    	echo "{$result3['serv_name']}";
    	echo "<br>";
    	echo "<br>" ;
    	echo "{$result3['serv_price']}";
    	echo " рублей";
    	echo "<br>" ;
    	echo "<br>" ;

    	echo "{$result['visit_date']}";
    	echo "<br>";
    	echo "===========================================================";
  	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Visits history | SberMed</title>
	<link rel="stylesheet" href="media/css/view_visits.css">
</head>
<body class="bg">
	<a href="livefeed.php">Назад</a>
</body>
</html>