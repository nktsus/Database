<?php 
require_once("mysql.php");
require_once("check1.php");
print "Привет, ".$userdata['username']."";
if(isset($_POST['submit'])){
	header("Location: createnews.php"); exit();
}
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
        </div>
    </form>
</body>
</html>