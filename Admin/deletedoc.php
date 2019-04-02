<?php
session_start();
if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
	die();
}

include("connect.php");
if(!$conn){
       die("connection failed:" . mysqli_connect_error());
}
if(isset($_GET['id'])){
	$id =  $_GET['id']; 
	$sql="DELETE FROM doctor WHERE id=$id"; 
	if(mysqli_query($conn,$sql)){
	header('Location: addoc.php');
	}
	else{
	$message="Error Removing Doctor";
	echo "<script type='text/javascript'>alert('$message');</script>";
	 
	}   
}
mysqli_close($conn);
?>

