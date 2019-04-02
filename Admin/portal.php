<?php
session_start();
if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
}

include("connect.php");
$sql = "SELECT * FROM doctor ORDER BY name";

$result = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM category ORDER BY name";

$result1 = mysqli_query($conn, $sql1);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>In-patient Admission Form</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="w3.css">

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
 <li><a href="admin.php">Home</a></li>
  <li><a href="portal.php">Patient Entry</a></li>
  <li><a href="update.php">Update Patient</a></li>
  <li><a href="discharge.php">Discharge Patient</a></li>
  <li><a href="search.php">Search Admitted Patient</a></li>
  <li><a href="searchdischarged.php">Search Discharged Patient</a></li>
  <li><a href="addoc.php">Manage Doctors</a></li>
  <li><a href="addcat.php">Manage Category</a></li>
</ul>
    <div class="container w3-text-blue">
      <div class="py-5 text-center">
        	<img  src="logo.png" align="center" alt="Pushpa Mission Hospital" width="320" height="144">
        <h2>In-Patient Admission Form</h2>
        
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Patient Details</h4>
          <form method="post" action ="save.php" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="ipno">IP Number</label>
              <input type="text" name="ipno" class="form-control" id="ipno" placeholder="IP Number" required>
              <div class="invalid-feedback">
                Please enter the IP Number.
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="fname" class="form-control" id="firstName" placeholder="First Name"  required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="lname" class="form-control" id="lastName" placeholder="Last Name"  required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="mobno">Contact</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">+91</span>
                </div>
                <input type="text" name="contno" class="form-control" id="mobno" placeholder="Mobile No" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your contact No is required.
                </div>
              </div>
            </div>

	  <div class="row">
              <div class="col-md-6 mb-3">
                <label for="age">Age</label>
                <input type="text" name="age" class="form-control" id="age" placeholder="Age"  required>
                <div class="invalid-feedback">
                  Your Age is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" id="gender">
      			<option value="male">Male</option>
      			<option value="female">Female</option>
      		</select>
              </div>
	</div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="addr1" class="form-control" id="address" placeholder="Address" required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 </label>
              <input type="text" name="addr2" class="form-control" id="address2" placeholder="Landmark" required>
	      <div class="invalid-feedback">
                Please enter your Landmark.
              </div>
            </div>

            <div class="row">
	      <div class="col-md-4 mb-3">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                <div class="invalid-feedback">
                  Please enter your City.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="district">District</label>
                <input type="text" name="distr" class="form-control" id="district" placeholder="District" required>
                <div class="invalid-feedback">
                  Please enter your District.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select name="state" id="state" class="custom-select d-block w-100" id="state" required>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
		  <option value="Delhi">Delhi</option>
		  <option value="Maharashtra">Maharashtra</option>
		  <option value="Kerala">Kerala</option>
		  <option value="Gujarat">Gujarat</option>
                </select>
                
              </div>
              
            </div>
	    <div>
	      <hr class="mb-4">
	      <h4 class="mb-3">Admission Details</h4>
		<div class="mb-3">
                <label for="doctor">Refered Doctor</label>
                <select name="refdoc" class="custom-select d-block w-100" id="doctor" required>
                  <?php 
			if (mysqli_num_rows($result) > 0){
				 while($row = mysqli_fetch_assoc($result)) {
					$name=$row["name"];
					echo "<option value=\"".$name."\">".$name."</option>";
                  		}
			}
		?>
                </select>
                <div class="invalid-feedback">
                        Please enter Refered Doctor.
                    </div>
              </div>
		<div class="row">
		<div class="col-md-6 mb-3">
		   <label for="category">Category</label>
      		   <select name="category" class="custom-select d-block w-100" id="doctor" required>
                  <?php 
      if (mysqli_num_rows($result1) > 0){
         while($row = mysqli_fetch_assoc($result1)) {
          $name=$row["name"];
          echo "<option value=\"".$name."\">".$name."</option>";
                      }
      }
    ?>
                </select>
		   <div class="invalid-feedback">
                        Please enter Category.
                    </div>
		 </div>
		<div class="col-md-6 mb-3">
		   <label for="date">Admission date</label>
      		   <input type="date" name="doa" id="date" class="form-control" required />
		   <div class="invalid-feedback">
                        Please enter Admission Date.
                    </div>
		 </div>
		</div>
             <div class="mb-3">
              <label for="roomno">Room Number</label>
              <input type="text" name="roomno" class="form-control" id="roomno" placeholder="Room Number" >
             
            </div>
	     </div>
		<hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Admit Patient</button>
          </form>
        </div>
      </div>

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
