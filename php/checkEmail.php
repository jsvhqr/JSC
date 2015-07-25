<?php
require_once 'DatabaseInteraction.php';

header ( 'Content-Type: text/xml' );

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
echo '<msg>';

$email = $_GET ['email'];
$fail = 'false';

if ($email != null) {
	$dbi = new DatabaseInteraction ();
	
	if ($dbi->emailExists($email)) {
		echo "$email already registered";
		$fail = 'true';
	} else {
		echo "ok";
	}
} else {
	echo "email was null..";
}

echo '</msg>';

echo '<fail>';
echo "$fail";
echo '</fail>';

echo '</response>';
?>