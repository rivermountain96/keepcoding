<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';


  $servername = "localhost"; // 데이터베이스 서버 주소
  $username = "username"; // 사용자명
  $password = "password"; // 비밀번호
  $dbname = "database_name"; // 데이터베이스 이름
  
  // 데이터베이스 연결 생성
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // 연결 확인
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 


$sql = "SELECT column_name FROM table_name"; // 가져올 데이터 SQL 쿼리
$result = $conn->query($sql);



  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
    integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
    integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="../css/style.css" rel="stylesheet" />
  <link href="/common.css" rel="stylesheet" />


  <title>product_list</title>






</head>

<body>
  <!-- 이은서 header 시작 -->
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
              <a class="nav-link" href="#">카테고리 관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" aria-disabled="true">강좌 관리</a>
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
  <!-- 이은서 header 끝 -->

  <!-- 박민용 product_list 시작 -->


  <div class="  content mcbg-white">
    <h2 class=" h4 pd72">강의 리스트</h2>

    <!-- product_list_sec1 강의리스트 분류단 -->
    <div class=" product_list_sec1 row pd48">
      <div class="col">
        <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>

          <option>기초강의</option>
          <option>프론트엔드</option>
          <option>백엔드</option>

        </select>
      </div>

      <div class="col">
        <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
          <option selected disabled>중분류</option>
          <option>HTML</option>
          <option>CSS</option>
          <option>Node.js</option>
          <option>React</option>
          <option>jquery</option>
          <option>JavaScript</option>
          <option>Java</option>
          <option>Python</option>
          <option>C++</option>
          <option>Spring</option>
          <option>PHP</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
          <option>초급</option>
          <option>중급</option>
          <option>고급</option>
        </select>
      </div>
    </div>
    </nav>

    <!-- product_list_sec2 검색단 -->

    <form class="product_list_sec2 d-flex pd48 " role="search">
      <input class="form-control me-2" type="search" placeholder="강좌명으로 검색하기" aria-label="Search">
      <button class="btn btn-outline-success btn-sm col-sm-1" type="submit">강좌검색 </button>
    </form>


    <!-- product_list_sec3 강좌내용 테이블 -->



    <table class=" product_list_sec3 table pd48">
      <thead>
        <tr>
          <th scope="col" class="fw-bold col-4">강좌명</th>
          <th scope="col" class="fw-bold col-1.5">상태</th>
          <th scope="col" class="fw-bold col-3">카테고리</th>
          <th scope="col" class="fw-bold col-1.5">가격</th>
          <th scope="col" class="fw-bold col-1">수정</th>
          <th scope="col" class="fw-bold col-1">삭제</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"> <a href="#">JavaScript 입문 수업</a></th>
          <td>판매중</td>
          <td>프론트엔드>javascript>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">WEB1 - HTML & Internet</a></th>
          <td>판매중</td>
          <td>프론트엔드>html>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE1</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE2</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>


        <tr>
          <th scope="row"> <a href="#">DATABASE3</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE4</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>


        <tr>
          <th scope="row"> <a href="#">DATABASE5</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-success">수정</a></td>
          <td><a href="#" class="btn btn-outline-success">삭제</a></td>
        </tr>

        <div>


        </div>

      </tbody>
    </table>


    <!-- product_list_pagenation 페이지네이션 -->

    <div class="d-flex justify-content-between align-items-center">

      <nav id="pagenation" class="mx-auto" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>


      <!-- 강의등록 -->

      <td><a href="#" class="btn btn-primary">등록</a></td>
      </nav>
    </div>


    <!-- 박민용 product_list 끝 -->
    <style>
      .product_list_sec3>tbody tr {
        border-top: 1px solid #DEE2E6;
        box-sizing: border-box;
        height: 80px;
      }

      .product_list_sec3 th {
        border-top: 1px solid #DEE2E6;
      }

      .product_list_sec3>tbody tr:last-child {
        border-bottom: 1px solid #DEE2E6;
      }

      .product_list_sec3>thead {
        height: 50px;
        vertical-align: center;
      }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"></script>


</body>

</html>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>