<?php
session_start();

if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
}


?>


<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
<script>
function showHintdate(str) {

    if (str.length == 0) {
        document.getElementById("txtHintdate").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHintdate").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethintdate.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
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
  <li><a href="enquiry.php">Home</a></li>
  
  <li><a href="search.php">Search Admitted Patient</a></li>
  
  <li><a href="searchdischarged.php">Search Discharged Patient</a></li>
</ul>

<div class="w3-container  w3-text-blue ">
<br>
<h1 class="w3-center">Search Patient</h1>
<br>
<br>	
<div class="container-fluid">
        
        <div class="row">
              <div class="col-md-3 mb-3">
		   <form class="needs-validation" novalidate method="post">
                   <div class="py-3 text-center">
        	        <img  src="logo.png" align="center" alt="Pushpa Mission Hospital" width="320" height="144">
	           </div>
                   <label for="ipno"><strong>Enter First Name or Last Name</strong></label>
                   <input type="text" name="ipno" class="form-control" id="ipno" placeholder="Name" onkeyup="showHint(this.value)" required>
                   <div class="invalid-feedback">
                      Name is Required.
                   </div>
                
            	   
                   </form>
               </div>


             
              <div class="col-md-8 mb-3">
	<p>Search Results Will Appear Here <span id="txtHint"></span></p>
        	</div>
</div>

<hr class="mb-4">

<div class="row">
              <div class="col-md-3 mb-3">
		   <form class="needs-validation" novalidate method="post">
                   <div class="py-3 text-center">
        	        
	           </div>
                   <label for="ipno"><strong>Enter Date Of Admission</strong></label>
                   <input type="date" name="doa" class="form-control" id="dat" placeholder="Admission Date" onchange="showHintdate(this.value)" required>
                   <div class="invalid-feedback">
                      Admission is Required.
                   </div>
                
            	   
                   </form>
               </div>


             
              <div class="col-md-8 mb-3">
	<p>Search Results Will Appear Here <span id="txtHintdate"></span></p>
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
