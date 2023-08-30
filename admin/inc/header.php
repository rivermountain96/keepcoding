<?php
  session_start();
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
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
  <link href="/keepcoding/common.css" rel="stylesheet">
  <link href="/keepcoding/admin/css/style.css" rel="stylesheet">
  <!-- script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <title><?php if(isset($title)){echo $title;}else{echo 'home';} ?>KEEP CODING</title>
  <title>KEEP CODING</title>
</head>
<body>
  <?php  
  if(isset($_SESSION['AUID'])){
    if($_SESSION['AUID'] == 'admin'){
  ?> 
  <nav class="navbar">
    <div class="nav_top container-fluid">
      <h1 class="logo"><a href="index.html"><span>keep coding</span></a></h1>
      <div class="d-flex align-items-center">
        <div class="d-flex gap-3 align-items-center">
          <span><i class="bi bi-bell mc-gray3"></i></span>
          <div class="user d-flex align-items-center gap-3">
            <p class="mc-gray3">총관리자</p>
            <img src="../img/Ellipse 3.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="nav_side navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">대시보드</a>
        </li>
        <li>
          <ul>
            <li class="nav-item">
              <a class="nav-link" href="category_list.php">카테고리 관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product_up.php" aria-disabled="true">강좌 관리</a>
            </li>
          </ul>
        </li>
        <li>
          <ul>
            <li class="nav-item">
              <a class="nav-link" href="#">강사 관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-disabled="true">수강생 관리</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">쿠폰 관리</a>
        </li>
        <li>
          <ul>
            <li class="nav-item">
              <a class="nav-link" href="#">공지사항</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-disabled="true">Q&A 게시판</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul>
        <li class="nav-item d-flex justify-content-between">
          <a class="nav-link mc-b-rgba" aria-current="page" href="#">로그아웃</a>
          <a class="nav-link mc-b-rgba" aria-current="page" href="#"><i class="bi bi-gear-wide-connected"></i></a>
        </li>
      </ul>
    </div>
  </nav>


  <?php
      }
    }
  ?>
