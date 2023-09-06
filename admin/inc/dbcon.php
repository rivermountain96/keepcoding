<?php

$hostname = 'localhost';
$dbuserid = 'keepcoding-develop';
$dbpasswd = 'keep0329!';
$dbname = 'keepcoding-develop';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
} 

?>
