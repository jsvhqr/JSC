<?php
require_once 'DatabaseInteraction.php';

$post_username = $_POST ['username'];

$post_password = $_POST ['password'];

$post_email = $_POST ['email'];

$dbi = new DatabaseInteraction ();

$result = $dbi->registerUser ( $post_username, $post_password, $post_email );

if (! $result) {
	echo 'user exists..';
} else {
	$url = 'http://localhost/CalcioForums/index.php';
	header ( "Location:$url" );
}
?>