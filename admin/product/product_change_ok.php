<?php
  $title = '제품수정확인';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';


$cate1 =  $_POST['cate1']??'' ;
$cate2 =  $_POST['cate2']??'' ;
$cate3 =  $_POST['cate3']??'' ;


$cate = $cate1.'/'.$cate2.'/'.$cate3;
$pid = $_GET['pid'];
$name = $_POST['name'];
$content = $_POST['product_detail'];
$price = $_POST['price'];
// $reg_date = date('Y-m-d');
$status = $_POST['status'];
$thumbnail = $_FILES['thumbnail']['name'];
$video_url = $_POST['video_url'];

//  SQL 쿼리
 $sql = "UPDATE products SET
  name='{$name}',
  cate='{$cate}',
  content='{$content}',
  price={$price},
  status={$status},
  thumbnail='{$thumbnail}',
  video_url='{$video_url}'
  WHERE pid={$pid}";

// var_dump($sql);

if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('수정 완료.');
    location.href='product_list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>