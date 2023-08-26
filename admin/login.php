<?php
  session_start(); 
  include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/dbcon.php';
  ini_set( 'display_errors', '0' );
  
  $userid=$_POST["userid"];
  $passwd=$_POST["passwd"];
  $passwd=hash('sha512',$passwd); //암호를 sha512 알고리즘으로 암호화화
  
  $query = "select * from admins where userid='".$userid."' and passwd='".$passwd."'"; //입력한 아이디 비번에 맞는 데이터 조회회
  $result = $mysqli->query($query) or die("query error => ".$mysqli->error);
  $rs = $result->fetch_object();
  

  if($rs){
      $sql="update admins set last_login=now() where idx=".$rs->idx;  //관리자의 마지막 로그인 시간을 업데이트
      $result=$mysqli->query($sql) or die($mysqli->error);
      $_SESSION['AUID']= $rs->userid;  //세션 생성
      $_SESSION['AUNAME']= $rs->username; //세션 생성
      $_SESSION['ALEVEL']= $rs->level; //세션 생성
     
      echo "<script>alert('어서오십시오.');location.href='/admin/product/product_list.php';</script>";
      exit;
  
  
  }else{ //조회한 값이 없다면
      echo "<script>alert('아이디나 암호가 틀렸습니다. 다시한번 확인해주십시오.');history.back();</script>";
      exit;
  }
  

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
  integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
  crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
  integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="../common.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
    body{background-color: var(--mc-gray2);}
  </style>
  <!-- script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- <title><?php if(isset($title)){echo $title;}else{echo 'home';} ?>KEEP CODING</title> -->
  <title>login</title>
</head>
<body>

    <body>
        <div class="login">
            <form action="" class="login_content">
                    <div class="login_id row">
                        <label for="userid" class="fw-medium">ID</label>
                        <input type="text" name="userid" id="userid">
                    </div>
                    <div class="login_pw row">
                        <label for="userpw" class="fw-medium">Password</label>
                        <input type="password" name="userpw" id="userpw">
                        <a href="" class="fw-medium">Forgot password?</a>
                    </div>
                    <!-- <button class="text-uppercase fw-bold" type="submit">login</button> -->
                    <button type="button" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">login</button>
            </form>
        </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>