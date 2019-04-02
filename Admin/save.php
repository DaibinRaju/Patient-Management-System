<?php
include("connect.php");
if(!$conn){
       die("connection failed:" . mysqli_connect_error());
}

session_start();
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
       
      $sqlcheck = "SELECT * FROM admitted WHERE ipno=$ipno ";

$result = mysqli_query($conn, $sqlcheck);
$message="The same IPNO exists in the database Please check IPNO";
if (mysqli_num_rows($result) > 0) {
    echo '<script type="text/javascript">'; 
      echo "alert('$message');"; 
      echo 'window.history.back();';
      echo '</script>';

      
    }
else{
       
	if($roomno){
			$sql ="INSERT INTO admitted(ipno,fname,lname,contno,age,gender,addr1,addr2,city,district,state,refdoc,category,admdate,roomno) VALUES($ipno,'$fname','$lname',$contno,			$age,'$gender','$addr1','$addr2','$city','$distr','$state','$refdoc','$category','$doa',$roomno)";
	}
	else{
		$sql ="INSERT INTO admitted(ipno,fname,lname,contno,age,gender,addr1,addr2,city,district,state,refdoc,category,admdate) VALUES($ipno,'$fname','$lname',$contno,			$age,'$gender','$addr1','$addr2','$city','$distr','$state','$refdoc','$category','$doa')";

	}
if(mysqli_query($conn,$sql)){
    header('Location: portal.php');  
}
else{
       echo "Error adding patient :".$sql ."<br>".mysqli_error($conn);
}
}
?>