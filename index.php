<?php
session_start();


$message1="Invalid Username or Password";
if(isset($_POST['username']) && isset($_POST['password'])){
      if($_POST['username']=="admin" && $_POST['password']=="admin123"){
              $_SESSION['username']=$_POST['username'];
              header('Location: Admin/admin.php');
       }
      else if($_POST['username']=="nurse" && $_POST['password']=="nurse123"){
              $_SESSION['username']=$_POST['username'];
              header('Location: Nurse/nurse.php');
       }
       else if($_POST['username']=="enquiry" && $_POST['password']=="enquiry123"){
              $_SESSION['username']=$_POST['username'];
              header('Location: Enquiry/enquiry.php');
       }
       else{
             echo "<script type='text/javascript'>alert('$message1');</script>";
       }
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    
    <title>Login for Admission portal</title>

    <!-- Bootstrap core CSS -->
    
	<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="signin.css">
   
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <img  src="logo.png" align="center" alt="Pushpa Mission Hospital" width="320" height="144">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
      
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2020 St. Joseph Enterprises</p>
      
    </form>
  </body>
</html>
