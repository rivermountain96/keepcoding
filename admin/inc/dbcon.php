<?php
  $hostname="localhost";
  $dbuserid="keepcoding";
  $dbpasswd="keep0329!";
  $dbname="keepcoding";

  $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);
  if ($mysqli->connect_errno) {
      die('Connect Error: '.$mysqli->connect_error);
  }

?>
