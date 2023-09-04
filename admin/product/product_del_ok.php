<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $pid = $_GET['pid'];
  $sql = "DELETE FROM products WHERE pid = '$pid'";
  $result = $mysqli->query($sql);

  if ($result) {
     echo "<script>
     alert('삭제되었습니다.');
     location.href='/keepcoding/admin/product/product_list.php';
     </script>";
  } else {
     echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

  $mysqli->close();
?>