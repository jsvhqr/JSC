<?php
require_once 'DatabaseInteraction.php';

header ( 'Content-Type: text/xml' );

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
echo '<msg>';

$username = $_GET ['username'];
$fail = 'false';

if ($username != null) {
	$dbi = new DatabaseInteraction ();
	
	if ($dbi->userExists ( $username )) {
		echo "$username exists";
		$fail = 'true';
	} else {
		echo "$username available";
	}
} else {
	echo "username was null..";
}

echo '</msg>';

echo '<fail>';
echo "$fail";
echo '</fail>'; 

echo '</response>';

?>