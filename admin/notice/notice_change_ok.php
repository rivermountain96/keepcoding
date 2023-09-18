<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$bno = $_POST['idx'];
$title = $_POST['title'];
// $name = $_POST['name'];
$content = $_POST['content'];
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


$sql = "UPDATE notice SET title='{$title}', content='{$content}', regdate='{$regdate}',notice_img='{$notice_img}' WHERE idx='{$bno}'";
// var_dump($sql);
$result = $mysqli -> query($sql);

if($result === TRUE){
    echo 
    "<script>
    alert('공지사항 수정 완료');
    location.href='/keepcoding/admin/notice/notice_list.php';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>