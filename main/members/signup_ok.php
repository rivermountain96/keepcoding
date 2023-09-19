<?php
$title =  '회원가입';
require_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/coupon_function.php';

$username = $_POST['username'];
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$userpw = hash('sha512', $userpw);
$useremail = $_POST['useremail'];

$sql = "INSERT INTO members
  (username,userid,userpw,useremail)
  VALUES('{$username}','{$userid}','{$userpw}','{$useremail}')";
$result = $mysqli -> query($sql) or die($mysqli->error);

if($result){
  user_coupon($mysqli, $userid, 1,'회원가입');
}else{
  echo "<script>
  alert('회원가입 실패');
  history.back();
  </script>";
}

?>
