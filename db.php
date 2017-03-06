<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php
header("Content-Type: text/html; charset=ISO-8859-1");
$user = "elementm";
$pass = "Qazplm10!";
$dbname = "elementm_wp5";
$query = "SELECT wp_sabai_content_post.post_id,wp_sabai_content_post.post_title,wp_sabai_content_post.post_entity_bundle_type,wp_sabai_entity_field_content_body.entity_id,wp_sabai_entity_field_content_body.value FROM wp_sabai_content_post INNER JOIN wp_sabai_entity_field_content_body ON wp_sabai_content_post.post_id=wp_sabai_entity_field_content_body.entity_id WHERE wp_sabai_content_post.post_entity_bundle_type = 'directory_listing'";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=elementm_wp5', $user, $pass);
    foreach($dbh->query($query) as $row) {
		print "<li><b>" . $row[1] . "</b><br/>";
		$query2 = "SELECT wp_sabai_taxonomy_term.term_title FROM wp_sabai_entity_field_directory_category INNER JOIN wp_sabai_taxonomy_term ON wp_sabai_entity_field_directory_category.value=wp_sabai_taxonomy_term.term_id WHERE wp_sabai_entity_field_directory_category.entity_id = '$row[0]'";
		foreach($dbh->query($query2) as $row2) {
			print $row2[0] . "<br/>";
		}
		print "</li>";
    }
	print "</table>";
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
</html>