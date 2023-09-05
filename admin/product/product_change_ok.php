
<?php
  $title = '제품수정확인';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';


$pid = $_GET['pid'];
$name = $_POST['name'];
$cate = $_POST['cate'];
$content = $_POST['content'];
$price = $_POST['price'];
// $reg_date = date('Y-m-d');
$status = $_POST['status'];
$thumbnail = $_FILES['thumbnail']['name'];
$product_url = $_POST['video_url'];

//  SQL 쿼리
 $sql = "UPDATE products SET
  pid='{$pid}',
  name='{$name}',
  cate='{$cate}',
  content='{$content}',
  price='{$price}',
  reg_date='{$reg_date}',
  status='{$status}',
  thumbnail='{$thumbnail}',
  video_url='{$video_url}',
  WHERE pid='{$pid}'";




if ($mysqli->query($sql) === TRUE) {
    echo "<script>
    alert('수정 완료.');
    location.href='product_list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>