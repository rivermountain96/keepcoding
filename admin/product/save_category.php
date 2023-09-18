<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $name = $_POST['name'];
  $search_where = '';

  if(isset($_POST['pcid'])){
    $pcid = $_POST['pcid'];
    $search_where .= " and pcid = '".$pcid."'";
  }else{
    $pcid = '';
  }

  $step = $_POST['step'];

  $query = "SELECT cid from category WHERE step=".$step." and name='".$name."'";
  $query .= $search_where;

  $result = $mysqli -> query($query);

  $rs = $result->fetch_object();

  if(isset($rs->cid)){
    $rdata = array("result" => "-1");
    echo json_encode($rdata);
    exit;
  }

  $sql = "INSERT INTO category (pcid, name, step) VALUES ('".$pcid."', '".$name."', '".$step."')";
  $result = $mysqli ->query($sql);

  if(isset($result)){
    $rdata = array("result"=>1);
    echo json_encode($rdata);
  }else{
    $rdata = array("result"=>0);
    echo json_encode($rdata);
  }
  

?>