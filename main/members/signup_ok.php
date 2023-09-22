<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/members/coupon_function.php';

$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$userpw_check = $_POST['userpw_check'];
$useremail = $_POST['useremail'];

// 비밀번호와 비밀번호 확인 값이 다르면 회원가입 처리를 하지 않고 에러 메시지를 표시
if ($userpw !== $userpw_check) {
  echo "<script>
      alert('입력한 비밀번호와 비밀번호 확인이 일치하지 않습니다.');
      history.back();
  </script>";
} else {
  // 비밀번호 해싱
  $userpw = hash('sha512', $userpw);

  // 회원가입 쿼리 실행
  $sql = "INSERT INTO members (userid,userpw,useremail)
    VALUES('{$userid}','{$userpw}','{$useremail}')";
  // $result = $mysqli -> query($sql) or die($mysqli->error);

  $result = $mysqli->query($sql) or die(mysqli_error($mysqli));


  if ($result) {
    user_coupon($mysqli, $userid, 13,'회원가입');
  } else {
    echo "<script>
        alert('회원가입 실패');
        history.back();
    </script>";
  }
}
?>