
<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student MS | Login</title>
</head>
<body><center>
<h3>Login</h3>
	<form method="post" action="">
		<label>Username:</label>
		<input type="text" name="username" placeholder="enter username">
		<label>Password:</label>
		<input type="password" name="password" placeholder="enter password">
		<input type="submit" name="submit" value="Login">
	</form>
<p>Click <a href="signup.php">here</a> to create account</p>
</body>
</html>

<?php
include 'connect.php';
	
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	$username = $_POST['username'];	

	$password = $_POST['password'];

$sql = mysqli_query($link,"select * from users where username = '$username' and passcode = '$password'");

 if (mysqli_num_rows($sql) > 0) { 
         $_SESSION['data'] = $username;
        header("location:dashboard.php?welcome");
    }

	else{
		header("location:login.php?InvalidCredential");
	}
}

?>

<style type="text/css">
	span{
		color:red;
	}
	input[type=text], input[type=password]{
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
	width: 30%;
	background: #f2f2f2;
	padding: 20px 30px;
	text-align: left;
	
}
table{
	border-collapse: collapse;
	padding: 20px 12px;
}
label{
	font-weight: bold;
}
</style>