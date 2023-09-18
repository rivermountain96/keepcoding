<?php 
session_start();

if(isset($_SESSION['AUID']) && $_SESSION['AUID'] == 'admin'){
    unset($_SESSION['AUID']); // 세션 변수 
}

header("Location:/keepcoding/admin/login.php");
die();

?>