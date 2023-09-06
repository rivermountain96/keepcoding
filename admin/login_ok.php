<?php 
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$userid=$_POST["userid"];
$passwd=$_POST["userpw"];
$passwd=hash('sha512',$passwd); //암호를 sha512 알고리즘으로 암호화화

$query = "select * from admins where userid='".$userid."' and passwd='".$passwd."'"; //입력한 아이디 비번에 맞는 데이터 조회회
$result = $mysqli->query($query) or die("query error => ".$mysqli->error);
$rs = $result->fetch_object();

if($rs){
    $sql="update admins set last_login=now() where idx=".$rs->idx;  //관리자의 마지막 로그인 시간을 업데이트
    $result=$mysqli->query($sql) or die($mysqli->error);
    $_SESSION['AUID']= $rs->userid;  //세션 생성
    $_SESSION['AUNAME']= $rs->username; //세션 생성
    $_SESSION['ALEVEL']= $rs->level; //세션 생성

    echo "<script>
    alert('welcome $userid!');
    location.href='/keepcoding/admin/index.php';
    </script>";
    }else{ //조회한 값이 없다면
    echo "<script>
    alert('아이디나 암호가 틀렸습니다.');
    history.back();
    </script>";
}


?>