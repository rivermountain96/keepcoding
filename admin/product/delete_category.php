<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $cid = $_POST['cid'];

  $query = "DELETE FROM category WHERE cid={$cid};";

  $result = $mysqli -> query($query);

  if(isset($result)){
    $rdata = array("result" => "1");
    echo json_encode($rdata);
    exit;
  }else{
    $rdata = array("result"=> "-1");
    echo json_encode($rdata);
  }
  

?>