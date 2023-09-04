<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $pid = $_GET['pid'];

  // JavaScript를 사용하여 삭제를 확인하는 창을 띄웁니다.
  echo "<script>
    var confirmDelete = confirm('정말로 삭제하시겠습니까?');

    if (confirmDelete) {
      // 사용자가 확인을 선택한 경우
      window.location.href = '/keepcoding/admin/product/product_del_ok.php?pid={$pid}';
    } else {
      // 사용자가 취소를 선택한 경우
      window.location.href = '/keepcoding/admin/product/product_list.php';
    }
  </script>";

  $mysqli->close();
?>