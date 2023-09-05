<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';


$pid = $_POST['pid'];
$name = $_POST['name'];
$cate = $_POST['cate'];
$content = $_CONTENT['content'];
$price = $_POST['price'];
$reg_date = $_POST['reg_date'];
$status = $_POST['status'];
$thumbnail = $_POST['thumbnail'];
$product_url = $_POST['video_url'];

//  SQL 쿼리
 $sql = "UPDATE products SET
  pid='{$pid}',
  pname='{$name}',
  pcate='{$cate}',
  content='{$content}',
  price='{$price}',
  reg_date='{$reg_date}',
  pstatus='{$status}',
  thumbnail='{$thumbnail}',
  product_url='{$video_url}',
  WHERE pid='{$pid}'";


if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('수정되었습니다.');
    location.href='product_list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>