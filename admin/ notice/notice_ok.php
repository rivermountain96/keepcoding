<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$title = $_POST['title'];
$name = $_POST['name'];
$content = $_POST['content'];
// $hit = $_POST['hit'];

$regdate = date('Y-m-d');
 
$notice_img = $_POST['notice_img']?? '';

if($_FILES['notice_img']['name']){
  //파일 사이즈 검사
  if($_FILES['notice_img']['size']> 10240000){
    echo "<script>
      alert('10MB 이하만 첨부할 수 있습니다.');    
      history.back();      
    </script>";
    exit;
  }
  //이미지 여부 검사
  if(strpos($_FILES['notice_img']['type'], 'image') === false){
    echo "<script>
    alert('이미지만 첨부 할 수 있습니다');
    history.back();
    </script>";
    exit;
  }

  //파일 업로드
  $save_dir = $_SERVER['DOCUMENT_ROOT']."/keepcoding/admin/cdata/";
  $filename = $_FILES['notice_img']['name']; //insta.jpg
  $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
  $newfilename = date("YmdHis").substr(rand(),0,6); //20238171184015
  $notice_img = $newfilename.".".$ext; //20238171184015.jpg

  if(move_uploaded_file($_FILES['notice_img']['tmp_name'], $save_dir.$notice_img)){
  $notice_img = "/keepcoding/admin/cdata/".$notice_img;
} else {
    echo 
    "<script>
      alert('이미지 등록 실패');    
      history.back();            
    </script>";
  }
} //첨부파일 있다면 할일


  $sql = "INSERT INTO notice 
    (title, name, content, regdate, notice_img) 
    VALUES 
    ('{$title}', '{$name}', '{$content}','{$regdate}','{$notice_img}')";
  $result = $mysqli -> query($sql);

  if($result){
    echo "<script>
      alert('공지사항 등록 완료');
      location.href = '/keepcoding/admin/notice/notice_list.php';
    </script>";
  } else {
  $mysqli -> rollback();//저장한 테이블이 있다면 롤백한다.
    echo "<script>
    alert('공지사항 등록 실패');
    history.back();
    </script>";
}  
?>