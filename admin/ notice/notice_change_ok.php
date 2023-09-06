<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$bno = $_POST['idx'];
$title = $_POST['title'];
// $name = $_POST['name'];
$content = $_POST['content'];
$regdate = date('Y-m-d');
$notice_img = $_POST['notice_img']?? '';

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