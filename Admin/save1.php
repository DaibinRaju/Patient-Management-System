<?php
include("connect.php");
if(!$conn){
       die("connection failed:" . mysqli_connect_error());
}

session_start();

if(isset($_POST['ipno'])){

       $ipno = mysqli_real_escape_string($conn,$_POST['ipno']);
       $fname = mysqli_real_escape_string($conn,$_POST['fname']);
       $lname = mysqli_real_escape_string($conn,$_POST['lname']);
       $contno = mysqli_real_escape_string($conn,$_POST['contno']);
       $age = mysqli_real_escape_string($conn,$_POST['age']);
       $gender = mysqli_real_escape_string($conn,$_POST['gender']);
       $addr1 = mysqli_real_escape_string($conn,$_POST['addr1']);
       $addr2 = mysqli_real_escape_string($conn,$_POST['addr2']);
       $city = mysqli_real_escape_string($conn,$_POST['city']);
       $distr = mysqli_real_escape_string($conn,$_POST['distr']);
       $state = mysqli_real_escape_string($conn,$_POST['state']);
       $refdoc = mysqli_real_escape_string($conn,$_POST['refdoc']);
       $category = mysqli_real_escape_string($conn,$_POST['category']);
       $doa = $_POST['doa'];
       $roomno = mysqli_real_escape_string($conn,$_POST['roomno']);
       


       $sql ="UPDATE admitted SET fname='$fname',lname='$lname',contno=$contno,age=$age,gender='$gender',addr1='$addr1',addr2='$addr2',city='$city',district='$distr',state='$state',refdoc='$refdoc',category='$category',admdate='$doa',roomno=$roomno WHERE ipno=$ipno";
if(mysqli_query($conn,$sql)){
    header('Location: update.php');  
}
else{
	$message="Error Updating Patient Details";        
	echo "<script type='text/javascript'>alert('$message');</script>";
}
}

?>
