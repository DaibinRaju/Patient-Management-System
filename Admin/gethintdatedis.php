<?php
session_start();
include("connect.php");

$hint="";

$q=$_GET['q'];

$sql = "SELECT * FROM discharged WHERE disdate='$q'";

$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>



<h2>Search Result</h2>
<?php if (mysqli_num_rows($result) > 0) : ?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>IPNo</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Age</th>
		  <th>Room No</th>
		  <th>Link</th>
                </tr>
              </thead>
              <tbody>
<?php
	 while($row = mysqli_fetch_assoc($result)) {
      		$ipno=$row["ipno"];
		$fname=$row["fname"];
      		$lname=$row["lname"];
      		$age=$row["age"];
      		$gender=$row["gender"];
      		$roomno=$row["roomno"];
		
                echo "<tr>";
		  echo "<td>".$ipno."</td>";
                  echo "<td>".$fname."</td>";
                  echo "<td>".$lname."</td>";
                  echo "<td>".$gender."</td>";
                  echo "<td>".$age."</td>";
                  echo "<td>".$roomno."</td>";
		  echo "<td>";
		  echo "<a href=\"details.php?ipno=".$ipno."\">";
		  echo "View</a>";
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
