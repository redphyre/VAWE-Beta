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

$result = mysqli_query($con,"SELECT id FROM vawe_messages WHERE vendor='$vendor' AND client='$user' ORDER BY id ASC LIMIT 1") or die(mysql_error());

while ($row = mysqli_fetch_array($result)) {
	
	echo $row[0];
	
}



mysqli_close($con);
?>