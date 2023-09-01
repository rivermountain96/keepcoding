<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  ?>

  <title>product_list</title>

  <style>
  .product_list_sec3 tbody tr td,
  .product_list_sec3 tbody tr th {
    vertical-align: middle;
  }
</style>

<body>

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
      <button class="btn btn-outline-primary btn-sm col-sm-1" type="submit">강좌검색 </button>
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
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">WEB1 - HTML & Internet</a></th>
          <td>판매중</td>
          <td>프론트엔드>html>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE1</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE2</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>


        <tr>
          <th scope="row"> <a href="#">DATABASE3</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <tr>
          <th scope="row"> <a href="#">DATABASE4</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
        </tr>


        <tr>
          <th scope="row"> <a href="#">DATABASE5</a></th>
          <td>판매중지</td>
          <td>백엔드>database>초급</td>
          <td>₩100,000</td>
          <td><a href="#" class="btn btn-outline-primary">수정</a></td>
          <td><a href="#" class="btn btn-outline-primary">삭제</a></td>
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



</body>

</html>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>