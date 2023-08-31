<?php

  $query = "select * from category where step=1";
  //$mysqli->함수명,   쿼리실행 $mysqli -> query(sql지시문);
  $result = $mysqli -> query($query); //쿼리실행결과를 $result 할당

  while($rs = $result -> fetch_object()){
      $cate1[] = $rs;
  }
  
  ?>