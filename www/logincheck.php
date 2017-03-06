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

$posted_username = $_POST['user'];
$posted_password = $_POST['pass'];

$user_name = htmlspecialchars($posted_username,ENT_QUOTES);

$pass_word = wp_hash_password($posted_password);

$pass_md5 = md5($posted_password);

$pass = $pass_word;

$userinfo = get_userdatabylogin($user_name);

$passcheck = $userinfo->user_pass;

$hash = $userinfo->user_pass;
$wp_hasher = new PasswordHash(8, TRUE);
$check = $wp_hasher->CheckPassword($posted_password, $hash);
if ($check == "1") {
	session_start();
	$_SESSION['login'] = "1";
	$_SESSION['user'] = $user_name; 
	echo $check;
} 
else { echo "Username or Password is incorrect. Please try again."; }
?>