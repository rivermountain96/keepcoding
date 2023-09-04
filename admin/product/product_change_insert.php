<?php  

include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';


$pid = $_POST[ 'pid' ];
$cate = $_POST[ 'cate' ];
// $usedate = $_POST[ 'usedate' ];
// $reg_date = $_POST[ 'reg_date' ];
$price = $_POST[ 'price' ];
// $status = $_POST[ 'status' ];
// $thumbnail = $_POST[ 'thumbnail' ];
$product_name = $_POST[ 'product_name' ];
$product_url = $_POST[ 'product_url' ];


$sql = "UPDATE product SET
  cate='{$cate}',
--   reg_date='{$reg_date}',
  price='{$price}',
--   thumbnail='{$thumbnail}',
  product_name='{$product_name}',
  product_url='{$product_url}'
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
