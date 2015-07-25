<?php
require 'DatabaseInteraction.php';

$dbi = new DatabaseInteraction ();
$dbi->logout ();
$url = 'http://localhost/CalcioForums/index.php';
header ( "Location:$url" );
?>