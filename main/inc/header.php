<?php
  // session_start(); 
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/png" href="/keepcoding/admin/img/logo_favicon.ico" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
  integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
  crossorigin="anonymous" referrerpolicy="no-referrer">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
  integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
  crossorigin="anonymous" referrerpolicy="no-referrer">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!-- summernote 시작--> 
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <!-- summernote 끝 -->
  <link href="/keepcoding/common.css" rel="stylesheet">
  <link href="/keepcoding/main/css/main.css" rel="stylesheet">
  <link href="/keepcoding/main/css/test.css" rel="stylesheet">
  <link href="/keepcoding/main/css/main_style.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- summernote 시작-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <!-- summernote 끝 -->
  <title><?php if(isset($title)){echo $title;}else{echo '홈';} ?> - KEEP CODING</title>
</head>
<body>
  <!-- header 시작 -->
  <header class="header_wrap">
    <div class="nav nav-tabs container d-flex justify-content-between">
      <!-- 로고 시작 -->
        <h1 class="main_logo"><a href="/keepcoding/main/index.php"><span>keep coding</span></a></h1>
      <!-- 로고 끝 -->
      
      <!-- 메뉴 시작 -->
        <ul class="nav d-flex col-4 justify-content-between nav_menu">
          <li class="nav-item dropdown">
            <a class="dropdown-toggle h5" data-bs-toggle="dropdown" href="/keepcoding/main/product/product_shop_list.php" role="button" aria-expanded="false">강의탐색</a>
            <ul class="dropdown-menu nav_dropdown shadow-sm">
              <li class="fs-6"><a class="dropdown-item fs-6" href="/keepcoding/main/product/product_shop_list.php">프론트엔드</a></li>
              <li><hr></li>
              <li><a class="dropdown-item fs-6" href="/keepcoding/main/product/product_shop_list.php">백엔드</a></li>
              <li><hr></li>
              <li><a class="dropdown-item fs-6" href="/keepcoding/main/product/product_shop_list.php">기초강의</a></li>
              <li><hr></li>
              <li><a class="dropdown-item fs-6" href="/keepcoding/main/product/product_shop_list.php">숏강의</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
          <a class="h5" href="/keepcoding/main/shorts/shorts.php">숏강의?</a>
          </li>

          <li class="nav-item dropdown">
            <a class="dropdown-toggle h5" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">커뮤니티</a>
            <ul class="dropdown-menu nav_dropdown shadow-sm">
              <li><a class="dropdown-item fs-6" href="#">공지사항</a></li>
              <li><hr></li>
              <li><a class="dropdown-item fs-6" href="#">Q&amp;A</a></li>
            </ul>
          </li>
        </ul>
      <!-- 메뉴 끝 -->

      <!-- 장바구니,로그인 시작 -->
        <ul class="nav nav-login">
          <li class="nav-item item_cart"><a class="fs-6" href="/keepcoding/main/cart/cart.php">장바구니</a></li>
          <li class="nav-item"><a class="fs-6" href="/keepcoding/main/login.php">로그인</a></li>
          <!-- <li class="nav-item"><a class="fs-6" href="../mypage/myproduct_list.php"><span>아이디</span></a></li> -->
          <li class="nav-item"><a class="fs-6" href="/keepcoding/main/members/signup.php">회원가입</a></li>
          <!-- <li class="nav-item"><a class="fs-6" href="../login_out.php">로그아웃</a></li> -->
        </ul>
      <!-- 장바구니,로그인 끝 -->
    </div>
  </header>
  <!-- header 끝 -->