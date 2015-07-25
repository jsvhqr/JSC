<?php
require_once 'DatabaseInteraction.php';

$post_username = $_POST ['username'];
$post_password = $_POST ['password'];

$dbi = new DatabaseInteraction ();

if ($dbi->login ( $post_username, $post_password )) {
	$url = 'http://localhost/CalcioForums/index.php';
	header ( "Location:$url" );
} else {
	echo 'invalid login';
}
?>