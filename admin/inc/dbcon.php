<?php

$hostname = 'localhost';
$dbuserid = 'keepcoding';
$dbpasswd = 'keep0329!';
$dbname = 'keepcoding';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
} 

?>