<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header('Access-Control-Allow-Origin: *'); 

$user = "hmhpenfwaa";
$pass = "wuJJFZs7a7";
$dbname = "hmhpenfwaa";
$username = $_GET['username'];


$con=mysqli_connect("localhost","hmhpenfwaa","wuJJFZs7a7","hmhpenfwaa");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$query = "SELECT wp_sabai_directory_claim.claim_entity_id,wp_users.user_login FROM wp_sabai_directory_claim INNER JOIN wp_users ON wp_sabai_directory_claim.claim_name=wp_users.display_name WHERE wp_sabai_directory_claim.claim_name = '$username'";

$result = mysqli_query($con,$query) or trigger_error($result->error."[ $query]");

while ($row = mysqli_fetch_array($result)) {
	echo $row[0].",".$row[1];
}


mysqli_close($con);
?>   