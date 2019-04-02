<?php
session_start();
if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
}


include("connect.php");
$sql = "SELECT * FROM category";

$result = mysqli_query($conn, $sql);


if(isset($_POST['name'])){
  $name=$_POST['name'];
  $insert="INSERT INTO category(name) VALUES('$name')";
  if(mysqli_query($conn,$insert)){
    header('Location: addcat.php');  
  }
  else{
       $message1="Error Adding Category Try Again";
       echo "<script type='text/javascript'>alert('$message1');</script>";
  }
}
mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Add Category</title>

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
        <h2>Manage Category</h2>
        
      </div>

<h4>Available Categories</h4>
<?php if (mysqli_num_rows($result) > 0) : ?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category</th>
		  <th>Remove Category</th>
                </tr>
              </thead>
              <tbody>
<?php
	 while($row = mysqli_fetch_assoc($result)) {
      		$id=$row["id"];
		$name=$row["name"];
      		
                echo "<tr>";
		  echo "<td>".$id."</td>";
                  echo "<td>".$name."</td>";
		  echo "<td>";
		  echo "<a href=\"deletecat.php?id=".$id."\">";
		  echo "Delete</a>";
		  echo "</td>";
                echo "</tr>";
		
	}
?>
              </tbody>
            </table>
          </div>
<?php else : ?>
<h4>No records Found</h4>
<?php endif; ?>



    <br/> <br/>

      <div class="row">
        
        <div class="col-md-8 mb-3">
          <h4 class="mb-3">Add Category</h4>
          <form method="post" class="needs-validation" novalidate>
            
	     <div class="mb-3">
              <label for="name">Category</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Category" required>
              <div class="invalid-feedback">
                Please enter the Category
              </div>
            </div>
		<hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Add Category</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 St. Joseph Enterprises</p>
	
        
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
