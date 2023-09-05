<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $cid = $_POST['cid'];

  $sql = "DELETE FROM coupons WHERE cid = {$cid}";
  $result = $mysqli -> query($sql);
  
  if($result){
    $data = array('result' => 'ok');
  }else{
    $data = array('result' => 'no');
  }

  echo json_encode($data);
?>