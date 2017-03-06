<?php
header("Content-Type: text/html; charset=ISO-8859-1");
header('Access-Control-Allow-Origin: *'); 

$user = "hmhpenfwaa";
$pass = "wuJJFZs7a7";
$dbname = "hmhpenfwaa";
$query = "SELECT wp_sabai_content_post.post_id,wp_sabai_content_post.post_title,wp_sabai_content_post.post_entity_bundle_type,wp_sabai_entity_field_content_body.entity_id,wp_sabai_entity_field_content_body.value FROM wp_sabai_content_post INNER JOIN wp_sabai_entity_field_content_body ON wp_sabai_content_post.post_id=wp_sabai_entity_field_content_body.entity_id WHERE wp_sabai_content_post.post_entity_bundle_type = 'directory_listing'";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=hmhpenfwaa', $user, $pass);
    foreach($dbh->query($query) as $row) {
		$return = "<li><a onClick='changePage(" . $row[0] . ")'><h4>" . $row[1] . "</h4>";
		$query2 = "SELECT wp_sabai_taxonomy_term.term_title FROM wp_sabai_entity_field_directory_category INNER JOIN wp_sabai_taxonomy_term ON wp_sabai_entity_field_directory_category.value=wp_sabai_taxonomy_term.term_id WHERE wp_sabai_entity_field_directory_category.entity_id = '$row[0]'";
		foreach($dbh->query($query2) as $row2) {
			$return = $return . "<p>" . $row2[0] . "</p>";
		}
		$return = $return . "</a></li>";
		echo $return;
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>