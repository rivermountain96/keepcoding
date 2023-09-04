<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';


  // //관리자 검사
  // if(!isset($_SESSION['AUID'])){
  //   echo "<script>
  //   alert('권한이 없습니다');
  //   history.back();
  //   </script>";
  // }

$mysqli->autocommit(FALSE);//커밋이 안되도록 지정, 일단 바로 저장하지 못하도록
try{

  $cate1 =  $_POST['cate1']??'' ;
  $cate2 =  $_POST['cate2']??'' ;
  $cate3 =  $_POST['cate3']??'' ;

  $cate = $cate1.'/'.$cate2.'/'.$cate3;
  $name = $_POST['name'];
  $price = $_POST['price']??'' ;
  $sale_price =  $_POST['sale_price']??0 ;
  
  $isnew = $_POST['isnew']??0 ;
  $isrecom = $_POST['isrecom']??0 ;
  $sale_cnt =  $_POST['sale_cnt']??0 ;
  $status = $_POST['status'];

  // if (empty($name)) {
  //     echo "<script>
  //         alert('강좌명을 입력하세요.');    
  //         history.back();            
  //     </script>";
  //     exit;
  // }

  $sale_end_date =  $_POST['sale_end_date'];
  $sale_end_date = date('Y.m.d H:i:s', strtotime('+1 year'));
  $content =  rawurldecode($_POST['content']); //encodeURIComponent통해 변경된 코드를 원래코드로 변경
  $file_table_id = $_POST['file_table_id']??0;
  $file_table_id = $_POST['file_table_id'];
  $file_table_id = rtrim($file_table_id, ',');//최우측 콤마 제거



  if($_FILES['thumbnail']['name']){
      //파일 사이즈 검사
      if($_FILES['thumbnail']['size']> 10240000){
        echo "<script>
          alert('10MB 이하만 첨부할 수 있습니다.');    
          history.back();      
        </script>";
        exit;
      }
      //이미지 여부 검사
      if(strpos($_FILES['thumbnail']['type'], 'image') === false){
        echo "<script>
          alert('이미지만 첨부할 수 있습니다.');    
          history.back();            
        </script>";
        exit;
      }
      //파일 업로드
      $save_dir = $_SERVER['DOCUMENT_ROOT']."/keepcoding/pdata/";
      $filename = $_FILES['thumbnail']['name']; //insta.jpg
      $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
      $newfilename = date("YmdHis").substr(rand(), 0,6); //20238171184015
      $thumbnail = $newfilename.".".$ext; //20238171184015.jpg


      if(move_uploaded_file($_FILES['thumbnail']['tmp_name'], $save_dir.$thumbnail)){  
        $thumbnail = "/keepcoding/pdata/".$thumbnail;
      } else{
        echo "<script>
          alert('이미지등록 실패!');    
          history.back();            
        </script>";
      }


  } //첨부파일 있다면 할일



  $sql = "INSERT INTO products
  (name, cate, content, thumbnail, price, sale_price, sale_cnt, isnew,
  isrecom, userid, reg_date, sale_end_date, file_table_id)
  VALUES
  ('{$name}', '{$cate}', '{$content}', '{$thumbnail}',{$price}, {$sale_price},{$sale_cnt},
  '{$isnew}', '{$isrecom}', '{$_SESSION['AUID']}', now(), '{$sale_end_date}', '{$file_table_id}')";




$result = $mysqli -> query($sql);
if (!$result) {
  echo "쿼리 실행 중 오류: " . $mysqli->error;
} 
echo "실행된 쿼리: " . $sql;
// var_dump($result);
// $pid = $mysqli -> insert_id; //테이블에 저장되는 값의 고유 번호


if($result){ //상품이 등록되면

  $mysqli->commit();//디비에 커밋한다.

  echo "<script>
    alert('강좌 등록 완료!');
    location.href='/keepcoding/admin/product/product_list.php';  
  </script>";
  }
}  catch (Exception $e) {
  $mysqli->rollback();//저장한 테이블이 있다면 롤백한다.
  echo "<script>
    alert('강좌 등록 실패');
    history.back();
  </script>";
  exit;
  }

?>