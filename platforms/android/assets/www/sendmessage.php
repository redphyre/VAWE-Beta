<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header('Access-Control-Allow-Origin: *'); 

$message = $_GET['message'];
$user = $_GET['user'];
$vendor = $_GET['vendor'];
$to_from = "to";
$con=mysqli_connect("localhost","hmhpenfwaa","wuJJFZs7a7","hmhpenfwaa");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries 
echo $user."<br>";
echo $vendor."<br>";
echo $message."<br>";

mysqli_query($con,"INSERT INTO vawe_messages (vendor,client,message,to_from) 
VALUES ('$vendor','$user','$message','$to_from')") or die(mysqli_error());

mysqli_close($con);
?>