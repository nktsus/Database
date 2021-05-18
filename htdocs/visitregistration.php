<?php
require_once("mysql.php");
require_once("check1.php");
	$clinics = $_POST['clinics'];
	$employees = $_POST['employees'];
	$clinic_services = $_POST['clinic_services'];
	$date = $_POST['date'];
	$visituser = $userdata['id'];
	if(isset($_POST['submit']))
	{
		//mysql_query($link,"INSERT INTO news SET ntitle='".$ntitle."', ntext='".$ntext."', ncreator='".$nuser."'");
		$sql = "INSERT INTO visits (`visit_userid`, `visit_clinid`, `visit_empid`, `visit_servid`, `visit_date`) VALUES ('".$visituser."', '".$clinics."', '".$employees."', '".$clinic_services."', '".$date."')";

		if(mysqli_query($link, $sql)){
		    echo "Records inserted successfully.";
		} 
		else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}

		header("Location: viewvisits.php"); exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile | SberMed</title>
	<link rel="stylesheet" href="media/css/visit_reg_styles.css">
</head>
<body class="bg">
    <form method="POST" class="form-class">
        <div class="title-container">
            <span>Клиника</span>
				<?php
				$sql1 = "SELECT * FROM `clinics`";
  				$result_select1 = mysqli_query($link, $sql1);

  				echo "<select style = 'width: 230px;height: 22px;' name = 'clinics'>";
			  	echo "<option value='0'></option>";
  				while($object1 = mysqli_fetch_object($result_select1)){
 				echo "<option value = '$object1->id' > $object1->clinicname </option>";}
  			    echo "</select>";
  				?>
				<br>
				<br>
			<span>Сотрудник</span>
				<?php
				$sql2 = "SELECT * FROM `employees`";
				//$sql2 =   "SELECT employees.id, employees.emp_name, employees.emp_surname, employees.emp_posid, positions.positionname ".
                  //      "FROM employees, posiions ".
                    //    "WHERE employees.emp_posid = posiions.id ";
  				$result_select2 = mysqli_query($link, $sql2);

  				echo "<select style = 'width: 230px;height: 22px;' name = 'employees'>";
			  	echo "<option value='0'></option>";
  				while($object2 = mysqli_fetch_object($result_select2)){
  						echo "<option value = '$object2->id' > $object2->emp_name $object2->emp_surname </option>";}
  				echo "</select>";
  				?>
				<br>
				<br>
			<span>Услуга</span>
				<?php
				$sql3 = "SELECT * FROM `clinic_services`";
  				$result_select3 = mysqli_query($link, $sql3);

  				echo "<select style = 'width: 230px;height: 22px;' name = 'clinic_services'>";
			  	echo "<option value='0'></option>";
  				while($object3 = mysqli_fetch_object($result_select3)){
 				echo "<option value = '$object3->id' > $object3->serv_name, $object3->serv_price </option>";}
  			    echo "</select>";
  				?>
				<br>
				<br>
			<div class="date-submit">
				<input type="date" name="date">
            	<input name="submit" type="submit" value="Зарегистрироваться">
            </div>	
        </div>
    </form>
</body>
</html>