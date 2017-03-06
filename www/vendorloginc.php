<?php

header('content-type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *'); 

include_once('../wp-config.php');
include_once('../wp-load.php');
include_once('../wp-includes/wp-db.php');
include_once('../wp-includes/class-phpass.php');

global $userdata;
global $wpdb; 

//get the posted values

$posted_username = $_GET['user'];
$posted_password = $_GET['pass'];

$user_name = htmlspecialchars($posted_username,ENT_QUOTES);

$pass_word = wp_hash_password($posted_password);

$pass_md5 = md5($posted_password);

$pass = $pass_word;

$userinfo = get_userdatabylogin($user_name);

$passcheck = $userinfo->user_pass;

$vendor = $userinfo->vendor_status;

$hash = $userinfo->user_pass;
$wp_hasher = new PasswordHash(8, TRUE);
$check = $wp_hasher->CheckPassword($posted_password, $hash);
if ($vendor == "YES" && $check == "1") {
	session_start();
	$_SESSION['login'] = "1";
	$_SESSION['user'] = $user_name; 
	$_SESSION['vendor'] = "true";
	echo "YES";
}
else if ($vendor == "NO" && $check == "!") { echo "NO"; }
else if ($vendor == "YES" && $check != "1") { echo "FAIL"; }
else { echo "FAIL"; }
?>