<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $cate = $_POST['cate']; //부모분류의 cid가 넘어온다
  $step = $_POST['step'];
  $category = $_POST['category'];

  $html = "<option selected disabled>".$category."</option>";
  $query = "select * from category where step=".$step." and pcode='".$cate."'";
  $result = $mysqli -> query($query); //쿼리실행결과를 $result 할당

  while($rs = $result -> fetch_object()){
      $html.= "<option value=\"".$rs->cid."\">".$rs->name."</option>";
  }
  echo $html;
?>