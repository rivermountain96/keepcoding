<?php
  header("Access-Control-Allow-Origin: *"); // 모든 출처에서의 요청 허용
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
  
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
        <input class="form-check-input" type="checkbox" name="checkId" id="saveId">
        <label class="form-check-label" for="saveId">ID 저장</label>
      </div>

      <button type="submit" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">login</button>
    </form>
  </div>
  <!-- 정이원 login 끝-->

  <!-- 이강산 DIALOG POPUP 시작 -->
  <dialog class="popup">
  <h2>KEEPCODING LMS 학습사이트(포트폴리오)</h2>
  <p>
    <span>본 사이트는 구직용 포트폴리오 사이트입니다.</span>
  </p>

  <hr>

  <div class="info">
    <p><span>제작기간</span> : 2023. 08. 11 - 09. 08</p>
    <p><span>특징</span> : html, css, jQuery (Bootstrap, jQuery Library)</p>
    <p>local: Windows, XAMPP(PHP, APACHE, MYSQL) | remote : PHP, LINUX, MYSQL</p>
    <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span class="font_green">발표 자료</span></a>  |  <span>코드</span> : <a href="https://github.com/rivermountain96/keepcoding" target="_blank" class="git"><span>깃허브</span><i class="fa-brands fa-github"></i></a></p>
    <p><span>구현 완료 페이지</span> : </p>
  </div>

  <hr>

  <div class="work">
    <p><span>팀원</span> : 정*원, 박*용, 이*산, 이*서, 최*희</p>
    <p><span>기획</span> : 전원참가(공동)</p>
    <dl>
      <dt><span>- 퍼블리싱 구현 -</span></dt>
      <dd><span>최*희</span> : 강좌관리/쿠폰등록/공지사항/QNA/강사&수강생 관리</dd>
      <dt><span>- 백엔드 구현 -</span></dt>
      <dd><span>박*용</span> : 강좌리스트</dd>
      <dd><span>이*산</span> : 강좌관리/강좌등록</dd>
      <dt><span>- 퍼블리싱/백엔드 구현 -</span></dt>
      <dd><span>정*원</span> : 로그인/쿠폰등록/공지사항</dd>
      <dd><span>이*서</span> : 헤더/대시보드/카테고리관리/쿠폰관리/</dd>
    </dl>
  </div>

  <hr>

  <div class="close_wrap d-flex justify-content-between">
    <div class="checkbox">
      <input type="checkbox" id="daycheck" class="hidden">
      <label for="daycheck">
        <i class="fa-solid fa-check"></i>
        오늘 하루 안보기
      </label>
    </div>
    <button type="button" id="close">닫기</button>
  </div>
</dialog>
<!-- 이강산 DIALOG POPUP 끝 -->

<script>
$(document).ready(function(){
  var key = getCookie('admin'); 
  if(key!=""){
    $("#userid").val(key); 
  }
   
  if($("#userid").val() != ""){ 
    $("#saveId").attr("checked", true); 
  }
   
  $("#saveId").change(function(){ 
    if($("#saveId").is(":checked")){ 
      setCookie('admin', $("#userid").val(), 7); 
    }else{ 
      deleteCookie('admin');
    }
  });
   
  $("#userid").keyup(function(){ 
    if($("#saveId").is(":checked")){
      setCookie('admin', $("#userid").val(), 7); 
    }
  });
});
</script>


<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>