<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/dbcon.php';

if(isset($_SESSION['UID'])){

    echo "<script>
      alert('이미 로그인 하셨습니다.');
      location.href = '/keepcoding/main/index.php';
    </script>";
}

  $userid = $_POST['userid'];
  $userpw = $_POST['userpw'];
  $passwd = hash('sha512',$userpw); //암호를 sha512 알고리즘이용 암호화
  
  $query = "select * from members where userid='{$userid}' and userpw='{$passwd}'"; 
  $result = $mysqli->query($query);
  $rs = $result->fetch_object();

  if($rs){

    $_SESSION['UID'] = $rs->userid;

    $sql = "UPDATE cart SET userid='{$userid}' where 1=1";    
    $result = $mysqli->query($sql);
    echo "<script>
      alert('$rs->username 님 반갑습니다');
      location.href = '/keepcoding/main/index.php';
    </script>";
  } else{
    echo "<script>
      alert('아이디, 비밀번호를 다시 확인하세요');
      history.back();
    </script>";
  }

include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>