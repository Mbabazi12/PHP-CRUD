<?php
session_start();
include 'connect.php';

if (!$_SESSION['data']) {
	header("location: login.php?invalidCredentials");
}
else{
?>

<?php
$namerr = $regnoerr =  $sexerr = $ageerr = $classerr = "";
	
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// code...
	
		$name = $_POST['name'];
		$regno = $_POST['regno'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$class = $_POST['class'];

		if (empty($name)) {
			$namerr = "Name is required";
		}
		else if(!preg_match("/^[a-zA-Z-']*$/", $name)){
			$namerr = "Only characters are allowed";
		}
		else if(empty($regno)){
			$regnoerr = "Regno is required";
		}
		
		else if (empty($class)) {
			$classerr = "Class is required";
		}
		else if(!preg_match("/^[a-zA-Z-']*$/", $class)){
			$classerr = "Invalid class name";
		}

		else{
			$sql = mysqli_query($link,"update studentsData set name='$name', regno='$regno', sex='$sex', age='$age', class='$class'where regno = '$regno'");

			if($sql){
				header("location:dashboard.php?recordUpdatedSuccessfuly");
			}
			else{
				echo"Records not updated";
			}
		}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	update <?php echo $_SESSION['data']; }?></title>
	<?php
	$id = $_GET['id'];
$sql2 = mysqli_query($link, "select * from studentsData where id = '$id'");
while (	$row = mysqli_fetch_array($sql2)) {
	$a = $row['name'];
	$b = $row['regno'];
	$c = $row['sex'];
	$d = $row['age'];
	$e = $row['class'];



	?>
</head>
<body>
	<h3> Student MS</h3>
<p style="position:relative; left: 1150px; top: -40px;"><?php echo $_SESSION['username'];?> 
<a href="logout.php" style="color:red;">Logout</a></p></div>
<center><h3>Update student</h3></center>
	<form method="post" action="">
		<label>	Name:</label>
		<input type="text" name="name" placeholder="Enter student name" 
		value="<?php echo $a;?>">
		<span><?php echo $namerr ?></span>
		<label>Registration number:	</label>
		<input type="text" name="regno" placeholder="Enter Reg_No"
		value="<?php echo $b;?>">
		<span><?php echo $regnoerr ?></span>
		<label>	Sex:</label>
		<input type="radio" name="sex" value="M">Male
		<input type="radio" name="sex" value="F">Female
<br>
		<label>	Age:</label>
		<input type="text" name="age" placeholder="Enter student age"
		value="<?php echo $d;?>">
		<span><?php echo $ageerr ?></span>
		<label>	Class:</label>
		<input type="text" name="class" placeholder="Enter student class"
		value="<?php echo $e;?>">
		<span><?php echo $classerr ?></span>
		<input type="submit" name="submit" value="Update">


		
	</form>

	<?php }?>

	<style type="text/css">
	span{
		color:red;
	}
	input[type=text]{
	width: 100%;
	padding: 12px 20px;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;

}
input[type=submit]{
	width: 100%;
	padding: 12px 20px;
	display: inline-block;
	border: 1px solid #000;
	border-radius: 4px;
	box-sizing: border-box;
	background: #03f76c;
	color: black;
	margin:8px 0;
}
form{
	width: 50%;
	background: #f2f2f2;
	padding: 20px 30px;
	position: relative;
	transform: translate(50%);
}
table{
	border-collapse: collapse;
	padding: 20px 12px;
}
label{
	font-weight: bold;
}
</style>	