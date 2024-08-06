
<?php
include 'connect.php';

$usernameErr = $passwordErr = $password2Err =  "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
$username = $_POST['username'];		
$password = $_POST['password'];
$password2 = $_POST['password2'];

		if (empty($username)) {
			 $usernameErr = "<p class='error'> Username is required</p>";
		}
		else if(!preg_match("/^[a-zA-Z-' ]*$/", $username)){

			 $usernameErr = "<p class='error'>Only letter allowed</p>";
		}
		else if(strlen($password) < 8){
			 $passwordErr = "<p class='error'> use atleast 8 characters</p>";
		}
		else if($password != $password2){
			 $password2Err = "<p class='error'> password didn't match</p>";
		}

		else {
			$sql = mysqli_query($link,"insert into users(username, passcode) values('$username', '$password')");
			if ($sql) {
				header("location:login.php?account_created");
			}
			else{
				echo "Could not create account";
			}

		}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create account</title>
</head>
<body><center>
	<h3>Create account</h3>
<form method="post" action="">
		<label>Username:</label>
		<input type="text" name="username" placeholder="enter username">
		<span><?php echo $usernameErr ?></span>
		<label>Password:</label>
		<input type="password" name="password" placeholder="enter password">
		<span><?php echo $passwordErr ?></span>
		<label>Comfirm password:</label>
		<input type="password" name="password2" placeholder="re-enter password">
		<span><?php echo $password2Err ?></span>
		<input type="submit" name="submit" value="Create account">
	</form>
	<p>Have an account <a href="login.php">Login</a> </p>
</body>
</html>

<style type="">
	.error{
		color: 	red;
	}
</style>

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