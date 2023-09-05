<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
  
  $cid = $_POST['cid']; //부모분류의 cid
  $step = $_POST['step'] +1;

  if($cid == 0){
    $query = "SELECT * FROM category WHERE step={$step} ORDER BY cid asc";
  }else{
    $query = "SELECT * FROM category WHERE step={$step} and pcid={$cid} ORDER BY cid asc";
  }

  $result = $mysqli -> query($query); //쿼리실행결과를 $result 할당
  
  if(isset($result)){
    while($rs = $result -> fetch_object()){
      $rsc[] = $rs;
    }
    $html = '';
    foreach($rsc as $ct){
      $html .= "<li class=\"list-group-item big d-flex justify-content-between align-items-center\" data-cid=\"".$ct -> cid."\" data-step=\"".$ct -> step."\">
          <span class=\"cate_size\">".$ct -> name."</span>
          <div class=\"cate_edit_btns d-flex gap-3\">
              <a href=\"\" class=\"edit_btn\" data-bs-toggle=\"modal\" data-bs-target=\"#cateEditModal\">수정</a>
              <a href=\"\" class=\"delete_btn\">삭제</a>
          </div>
      </li>";
    }
  echo $html;
  }else{
    echo $html;
  }

?>