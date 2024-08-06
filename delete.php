<?php
session_start();
include 'connect.php';
		$id = $_GET['id'];
		$sql = mysqli_query($link,"delete from studentsData where id = '$id'");
		header("location:dashboard.php");

?>