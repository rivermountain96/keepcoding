<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $cate = $_GET['cate']; //부모분류의 cid
  $step = $_GET['step'];
  $category = '';
  
  switch ($step) {
    case 1:
      $category ="대분류";
        break;
    case 2:
      $category ="중분류";
        break;
    case 3:
      $category ="소분류";
        break;

}

  $html = "<option selected disabled>".$category."</option>";
  $query = "select * from category where step=".$step." and pcid='".$cate."'";
  $result = $mysqli -> query($query); //쿼리실행결과를 $result 할당

  while($rs = $result -> fetch_object()){
      $html.= "<option value=\"".$rs->cid."\" data-step=\"".$rs->step."\">".$rs->name."</option>";
  }
  echo $html;
?>