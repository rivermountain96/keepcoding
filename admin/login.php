<?php
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  
  if(isset($_SESSION['AUID'])){
    if($_SESSION['AUID'] == 'admin'){
      echo "<script>
        alert('이미 로그인 하셨습니다.');
        location.href = '/keepcoding/admin/index.php';
      </script>";
    }
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
    integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="/keepcoding/common.css" rel="stylesheet">
  <link href="/keepcoding/admin/css/style.css" rel="stylesheet">
<style>
    body {
      background-color: var(--mc-gray2);
    }
  </style>
  <!-- script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- <title><?php if(isset($title)){echo $title;}else{echo 'home';} ?>KEEP CODING</title> -->
  <title>login</title>
</head>

<!-- 정이원 login 시작--> 
<body>

<div class="login">
    <form action="login_ok.php" class="login_content" method="POST">
      <div class="login_id row">
        <label for="userid" class="fw-medium">ID</label>
        <input type="text" name="userid" id="userid">
      </div>

      <div class="login_pw row">
        <label for="userpw" class="fw-medium">Password</label>
        <input type="password" name="userpw" id="userpw">
        <a href="" class="fw-medium">Forgot password?</a>
      </div>

      <div class="login_ir d-flex justify-content-end">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">ID 저장</label>
      </div>

      <button type="submit" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">login</button>
    </form>
  </div>
  <!-- 정이원 login 끝-->

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>