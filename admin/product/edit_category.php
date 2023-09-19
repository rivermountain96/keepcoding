<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $cid = $_POST['cid'];
  $name = $_POST['name'];

  $query = "UPDATE category SET name='{$name}' WHERE cid={$cid};";

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