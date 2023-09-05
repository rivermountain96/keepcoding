<?php
session_start();
// include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$coupon_name = $_POST['coupon_name'];
$coupon_price = $_POST['coupon_price']?? 0;
$status = $_POST['status'];
$regdate = date('Y-m-d');  
$duedate = $_POST['duedate']?? '';  
$use_min_price = $_POST['use_min_price'];

if($_FILES['coupon_image']['name']){
    //파일 사이즈 검사
    if($_FILES['coupon_image']['size']> 10240000){
      echo "<script>
        alert('10MB 이하만 첨부할 수 있습니다.');    
        history.back();      
      </script>";
      exit;
    }
    //이미지 여부 검사
    if(strpos($_FILES['coupon_image']['type'], 'image') === false){
      echo "<script>
      alert('이미지만 첨부 할 수 있습니다');
      history.back();
      </script>";
      exit;
    }

    //파일 업로드
    $save_dir = $_SERVER['DOCUMENT_ROOT']."/keepcoding/admin/cdata/";
    $filename = $_FILES['coupon_image']['name']; //insta.jpg
    $ext = pathinfo($filename, PATHINFO_EXTENSION); //jpg
    $newfilename = date("YmdHis").substr(rand(),0,6); //20238171184015
    $coupon_image = $newfilename.".".$ext; //20238171184015.jpg

    if(move_uploaded_file($_FILES['coupon_image']['tmp_name'], $save_dir.$coupon_image)){
    $coupon_image = "/keepcoding/admin/cdata/".$coupon_image;
  } else {
      echo 
      "<script>
        alert('이미지 등록 실패');    
        history.back();            
      </script>";
    }
  } //첨부파일 있다면 할일

  $mysqli->autocommit(FALSE); // 커밋이 안되도록 지정

  try{

    $sql = "INSERT INTO coupons 
      (coupon_name, coupon_image, coupon_price, status, regdate, duedate, use_min_price) 
      VALUES 
      ('{$coupon_name}', '{$coupon_image}', '{$coupon_price}', '{$status}', '{$regdate}', '{$duedate}', {$use_min_price})";
    var_dump($sql);
    $result = $mysqli -> query($sql);
    $mysqli->commit();//디비에 커밋한다.
  
    if($result){
      echo "<script>
        alert('쿠폰 등록 완료');
        location.href = '/keepcoding/admin/coupon/coupon_list.php';
      </script>";
    } 
    
  } catch (Exception $e) {
    $mysqli -> rollback();//저장한 테이블이 있다면 롤백한다.
      echo "<script>
      alert('쿠폰 등록 실패');
      history.back();
      </script>";
  }  
?>