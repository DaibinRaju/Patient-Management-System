<?php
session_start();
if(!isset($_SESSION['username'])){
       session_destroy();
       header('Location: ../index.php');
}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<title>Admin</title>
</head>
<body onload="startTime()">
<div class="container">
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
  	<div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img alt="Logo" src="logo.png">
        </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
              <li><a href="logout.php"><button type="button" class="btn btn-primary">Log out</button></a></li>
        </ul>
  </div>
  </nav>
  <header>   
  </header>
  <main>
	<div class="row">
        <div class="left col-lg-4">
        	<div class="photo-left">
          		<img class="photo" src="user.jpg"/>
        	</div>
        <h3 class="name">Enquiry</h4>
        </div>
	</div>
  </main>
	
	<span> <div id="txt">    </div></span>
	
        
        <div class="right col-lg-12">
        <ul class="nav">
          <li>Home</li>
          
          <li><a href="search.php" >Search Admitted Patient</a></li>
          
         
        </ul>
        <br>
        <br>

        </div>
    
</div>
</body>
 <script>
		function startTime() {
   		var today = new Date();
    		var h = today.getHours();
    		var m = today.getMinutes();
    		var s = today.getSeconds();
    		m = checkTime(m);
    		s = checkTime(s);
    		document.getElementById('txt').innerHTML =
    		today;
    		var t = setTimeout(startTime, 500);
			}
		function checkTime(i) {
    			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    				return i;
			}
	</script>
</html>
