<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header('Access-Control-Allow-Origin: *'); 

$user = $_GET['user'];
$vendor = $_GET['vendor'];
$con=mysqli_connect("localhost","hmhpenfwaa","wuJJFZs7a7","hmhpenfwaa");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queriess

$result = mysqli_query($con,"SELECT * FROM vawe_messages WHERE vendor='$vendor' AND client='$user' ORDER BY id ASC") or die(mysql_error());

while ($row = mysqli_fetch_array($result)) {
	
	if ($row[4] == "to") {
		echo '<div data-id='.$row[0].'class="clientMessage">'.$row[3].'</div>';
	}
	else if ($row[4] == "from") {
		echo '<div data-id='.$row[0].'class="vendorMessage">'.$row[3].'</div>';
	}
}



mysqli_close($con);
?>