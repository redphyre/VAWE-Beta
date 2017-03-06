<?php
header('Content-Type: text/html; charset=ISO-8859-1');
header('Access-Control-Allow-Origin: *'); 

$user = "hmhpenfwaa";
$pass = "wuJJFZs7a7";
$dbname = "hmhpenfwaa";
$vendorID = $_POST['id'];
$query = "SELECT wp_sabai_content_post.post_id,wp_sabai_content_post.post_title,wp_sabai_content_post.post_entity_bundle_type,wp_sabai_entity_field_content_body.entity_id,wp_sabai_entity_field_content_body.value FROM wp_sabai_content_post INNER JOIN wp_sabai_entity_field_content_body ON wp_sabai_content_post.post_id=wp_sabai_entity_field_content_body.entity_id WHERE wp_sabai_content_post.post_entity_bundle_type = 'directory_listing' AND wp_sabai_content_post.post_id = '$vendorID'";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=hmhpenfwaa', $user, $pass);
    foreach($dbh->query($query) as $row) {
		echo "<h3>" . $row[1] . "</h3>";
		echo "<hr>";
		echo $row[4];
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>