<?php
include("connect.php");
if(!$conn){
       die("connection failed:" . mysqli_connect_error());
}

session_start();

if(isset($_POST['ipno'])){

       
       $ipno =$_POST['ipno'];
       $roomno =$_POST['roomno'];

       $sql ="UPDATE admitted SET roomno=$roomno WHERE ipno=$ipno";
if(mysqli_query($conn,$sql)){
    header('Location: update.php');  
}
else{
	$message="Error Updating Patient Details";        
	echo "<script type='text/javascript'>alert('$message');</script>";
}
}

?>
