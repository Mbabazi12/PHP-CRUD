<?php
session_start();
include 'connect.php';

if ($_SESSION['data'] == false) {
	header("location:login.php?ERROR_loginFirst");
}

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
		else if($age <= 18){
			$ageerr = "Age should be 18 above";
		}

		else{
			$sql = mysqli_query($link,"INSERT INTO studentsData(name, regno, sex, age, class) values ('$name','$regno','$sex','$age','$class')");

			if($sql){
				header("location:dashboard.php?recordInsertedSuccessfuly");
			}
			else{
				echo"Records not inserted";
			}
		
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	Welcome <?php echo $_SESSION['data']; }?></title>
</head>
<body>
	<h3> Student MS</h3>
<p style="position:relative; left: 1150px; top: -40px;"><?php echo $_SESSION['data'];?> 
<a href="logout.php" style="color:red;">Logout</a></p></div>
<center><h3>Record  student</h3></center>
	<form method="post" action="">
		<label>	Name:</label>
		<input type="text" name="name" placeholder="Enter student name">
		<span><?php echo $namerr ?></span>
		<label>Registration number	</label>
		<input type="text" name="regno" placeholder="Enter Reg_No">
		<span><?php echo $regnoerr ?></span>
		<label>	Sex:</label>
		<input type="radio" name="sex" value="M">Male
		<input type="radio" name="sex" value="F">Female<br>
<br>
		<label>	Age:</label>
		<input type="text" name="age" placeholder="Enter student age">
		<span><?php echo $ageerr ?></span>
		<label>	Class:</label>
		<input type="text" name="class" placeholder="Enter student class">
		<span><?php echo $classerr ?></span>
		<input type="submit" name="submit" value="Record">


		
	</form><center>
<h3>Recorded Students Data</h3>



		<?php

			$sql2 = mysqli_query($link,"select * from studentsData");
			echo "<table border = '1' cellpadding='12'> ";
				echo "<thead><th>ID</th> <th>Student Names</th> <th>Registration No</th> <th>Gender</th> <th>Age</th> <th>Class</th> <th>Action</th></thead> ";

			while ($row = mysqli_fetch_array($sql2)) {

				
				echo "<tr><td> ".$row['id']."</td>";
				echo "<td> ".$row['name']."</td>";
				echo "<td> ".$row['regno']."</td>";
				echo "<td> ".$row['sex']."</td>";
				echo "<td> ".$row['age']."</td>";
				echo "<td> ".$row['class']."</td>";
				echo " <td colspan='2'> <a href='delete.php?id=".$row['id']."'>Delete</a>
								        <a href='update.php?id=".$row['id']."'>Update</a>
				</td></tr>";
			
			}


		?>




</body>
</html>

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