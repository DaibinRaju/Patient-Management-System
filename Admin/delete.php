<?php
include("connect.php");
if(!$conn){
       die("connection failed:" . mysqli_connect_error());
}
$message="Error Discharging Patient";
$message1="Error Discharging Patient";
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
       $disdate=date("Y-m-d");

       $sql ="INSERT INTO discharged(ipno,fname,lname,contno,age,gender,addr1,addr2,city,district,state,refdoc,category,admdate,roomno,disdate) VALUES($ipno,'$fname','$lname',$contno,$age,'$gender','$addr1','$addr2','$city','$distr','$state','$refdoc','$category','$doa',$roomno,'$disdate')";
if(mysqli_query($conn,$sql)){

	$sql1="DELETE FROM admitted WHERE ipno=$ipno";
	if(mysqli_query($conn,$sql1)){
	header('Location: discharge.php');
	}
	else{
	 echo "Error adding patient :".$sql1 ."<br>".mysqli_error($conn);
	}
}
else{
       echo "Error adding patient :".$sql ."<br>".mysqli_error($conn);
}
}
?>
