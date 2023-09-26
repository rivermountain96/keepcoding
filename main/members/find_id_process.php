<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$userid = $_POST['userid'];
$useremail = $_POST['useremail'];

// 이메일 주소로 아이디 찾기
$sql = "SELECT userid FROM members WHERE useremail = '$useremail'";
$result = $mysqli->query($sql);

if ($result) {
  // 아이디 찾기 성공
  $row = $result->fetch_assoc();
  $foundId = $row['userid'];

  // 아이디를 세션 변수에 저장
  $_SESSION['foundId'] = $foundId;

  // 아이디를 find_id.php로 리다이렉트
  header('Location: find_id.php');
  exit();

} else {
  // 아이디 찾기 실패
  $_SESSION['notFoundMessage'] = "아이디를 찾을 수 없습니다."; // 실패 시 메시지 설정
  header('Location: find_id.php');
  exit();
  
}

// MySQL 연결 종료
$mysqli->close();
?>