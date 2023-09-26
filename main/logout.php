<?php
session_start();

if(isset($_SESSION['UID'] )) {
  unset($_SESSION['UID']); // 세션 변수 삭제
}

header('Location:/keepcoding/main/login.php');
die();
?>