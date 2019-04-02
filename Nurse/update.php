<?php
session_start();
include("connect.php");
if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
}

if(isset($_POST['ipno'])){
$ipno=$_POST['ipno'];
$sql = "SELECT * FROM admitted WHERE ipno=$ipno ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $fname=$row["fname"];
      $lname=$row["lname"];
      $contno=$row["contno"];
      $age=$row["age"];
      $gender=$row["gender"];
      $addr1=$row["addr1"];
      $addr2=$row["addr2"];
      $city=$row["city"];
      $district=$row["district"];
      $state=$row["state"];
      $refdoc=$row["refdoc"];
      $category=$row["category"];
      $admdate=$row["admdate"];
      $roomno=$row["roomno"];

    }
} else {
	$message="No records found for this IP Number";
    echo "<script type='text/javascript'>alert('$message');</script>";
}


}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
<title>Updation Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}


</style>
</head>
<body class="bg-light">

<ul>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
  <li><a href="nurse.php">Home</a></li>
  <li><a href="update.php">Update Patient</a></li>
  <li><a href="search.php">Search Patient</a></li>
  
  
</ul>

<div class="w3-container  w3-text-blue ">
<br>
<h1 class="w3-center">Updation Form</h1>
<br>
<br>	
<div class="container-fluid">
        
        <div class="row">
              <div class="col-md-3 mb-3">
		   <form class="needs-validation" novalidate method="post">
                   <div class="py-3 text-center">
        	        <img  src="logo.png" align="center" alt="Pushpa Mission Hospital" width="320" height="144">
	           </div>
                   <label for="ipno"><strong>Enter IP Number</strong></label>
                   <input type="text" name="ipno" class="form-control" id="ipno" value="<?php echo htmlentities($ipno); ?>" placeholder="IP Number" required>
                   <div class="invalid-feedback">
                        IP Number is Required.
                   </div>
                   <hr class="mb-4">
            	   <button class="btn btn-primary btn-lg btn-block" type="submit">Search Patient</button>
                   </form>
               </div>


               <div class="col-md-2 mb-3">
               </div>

		
              <div class="col-md-6 mb-3">
	
	     <form class="needs-validation" action="save1.php" novalidate method="post">
            <h4 class="mb-3">Patient Details</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="ipno" value="<?php echo htmlentities($ipno); ?>" id="ipno" hidden>
                <input type="text" name="fname" class="form-control" id="firstName" placeholder="First Name" value="<?php echo htmlentities($fname); ?>" disabled required>
                 
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
               <input type="text" name="lname" class="form-control" id="lastName" placeholder="Last Name" value="<?php echo htmlentities($lname); ?>" disabled required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
	   
            <div class="mb-3">
              <label for="username">Contact</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">+91</span>
                </div>
                <input type="text" name="contno" class="form-control" id="mobno" placeholder="Mobile No" value="<?php echo htmlentities($contno); ?>" disabled required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your contact No is required.
                </div>
              </div>
            </div>

	  <div class="row">
              <div class="col-md-4 mb-3">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" id="age" placeholder="Age" value="<?php echo htmlentities($age); ?>" disabled required>
                <div class="invalid-feedback">
                  Your Age is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="gender">Gender</label>
                <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender" value="<?php echo htmlentities($gender); ?>" disabled required>
                <div class="invalid-feedback">
                  Your Gender is required.
                </div>
              </div>
	</div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="addr1" class="form-control" id="address" placeholder="Address" value="<?php echo htmlentities($addr1); ?>" disabled required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 </label>
               <input type="text" name="addr2" class="form-control" id="address2" placeholder="Landmark" value="<?php echo htmlentities($addr2); ?>" disabled required>
	      <div class="invalid-feedback">
                Please enter your Landmark.
              </div>
            </div>

            <div class="row">
	      <div class="col-md-4 mb-3">
                <label for="city">City</label>
               <input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?php echo htmlentities($city); ?>" disabled required>
                <div class="invalid-feedback">
                  Please enter your City.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="district">District</label>
                <input type="text" name="distr" class="form-control" id="district" placeholder="District" value="<?php echo htmlentities($district); ?>" disabled required>
                <div class="invalid-feedback">
                  Please enter your District.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" id="state" placeholder="State" value="<?php echo htmlentities($state); ?>" disabled required>
                <div class="invalid-feedback">
                  Your State is required.
                </div>
                
              </div>
              
            </div>
	    <div>
	      <hr class="mb-4">
	      <h4 class="mb-3">Admission Details</h4>
		<div class="mb-3">
                <label for="refdoc">Refered Doctor</label>
              <input type="text" name="refdoc" class="form-control" id="refdoc" placeholder="Refered Doctor" value="<?php echo htmlentities($refdoc); ?>" disabled required>
              <div class="invalid-feedback">
                Please enter your Refered Doctor.
              </div>
              </div>
		<div class="row">
		<div class="col-md-4 mb-3">
		   <label for="category">Category</label>
                <input type="text" name="category" class="form-control" id="category" placeholder="Category" value="<?php echo htmlentities($category); ?>"  disabled required>
                <div class="invalid-feedback">
                  Your Category is required.
                </div>
		 </div>
		<div class="col-md-4 mb-3">
		   <label for="dat">Admission Date</label>
                <input type="date" name="doa" class="form-control" id="dat" placeholder="Admission Date" value="<?php echo htmlentities($admdate); ?>"  disabled required>
                <div class="invalid-feedback">
                  Your Admission Date is required.
                </div>
              
		 </div>
		<div class="col-md-4 mb-3">
		   <label for="roomno">Room Number</label>
                <input type="text" name="roomno" class="form-control" id="roomno" placeholder="Room Number" value="<?php echo htmlentities($roomno); ?>" required>
                <div class="invalid-feedback">
                  Room Number is required.
                </div>
		 </div>
		</div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Update Patient</button>
         </div>
      </div>

</div>
</div>
		
          </form>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 St. Joseph Enterprises</p>
	<p class="mb-1">&copy; 2018-2022 Site Designed and Developed BY Daibin Raju</p>
        
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
