<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  ?>

  <title>product_view</title>

<body>

  <!-- 박민용 product_view 시작 -->

  <div class="product_view_sec1 content mcbg-white d-flex flex-column">

    <div>
      <h4 class=" h4 pd48 ">강의상세보기</h4>
      <hr>
    </div>

    <!-- product_view_sec1  강좌명 -->

    <div class="product_view_sec2 row ">
      <div class="col">
        <h6 class="">강좌명</h6>
        <p class="">JavaScript 입문 수업</p>
      </div>

      <div class="col">
        <h6 class="">카테고리</h6>
        <p class="">기초강의>javascript>초급</p>
      </div>

    </div>

    <!-- product_view_sec2 수강기간, 판매금액,상태 -->

    <hr>
    <div class="product_view_sec2 row ">
      <div class="col">
        <h6 class="">수강 기한</h6>
        <p class="">무제한</p>
      </div>

      <div class="col">
        <h6 class="">시작일</h6>
        <p class="">2023.09.09</p>
      </div>

    </div>

    <hr>
    <!-- product_view_sec3 강좌설명 -->


    <div class="col">
      <h6>강좌설명</h6>
      <p class="">1.수업소개<br><br>
        &nbsp &nbsp a. 본 모듈은 자바스크립트 언어에 대한 기초 수업입니다. <br><br>
        &nbsp &nbsp b.텍스트 수업과 동영상 수업이 함께 제공 됩니다. 텍스트만으로도 완주 하실 수 있고, 동영상만으로도 완주 할 수 있도록 구성되었습니다.</p>
      <hr>
    </div>


    <!-- product_view_sec4 썸네일이미지 -->

    <div class="col">
      <h6 class="">썸네일</h6>
      <p class="mb-24">오리엔테이션.jpg</p>
      <br>
      <img src="../img/Ellipse 3.png" alt="">
    </div>

    <hr>
    <!-- product_view_sec5 영상업로드 -->


    <div class="product_view_sec2 row ">
      <h6 class="">강의 영상</h6>

      <div class="col">
        <p class="">JavaScript - 오리엔테이션</p>
      </div>


      <div class="col">
        <p class="col text-nowrap">
          <a href="#" data-toggle="modal" data-target="#videoModal">
            http://www.youtube.com/playlist?list=PLuHgQVnccGMA4uSig3hCjl7wTDeyIeZVU
          </a>

        </p>

      </div>

    </div>

    <hr>
    <!-- 3buttons -->

    <div class="d-flex gap-3 justify-content-end">
      <a href="#" class="btn btn-primary ">수정</a>
      <a href="#" class="btn btn-outline-primary  ">삭제</a>
      <a href="#" class="btn btn-primary  ">강좌 리스트</a>
    </div>
  </div>



  <!-- modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <iframe width="100%" height="485"
            src="https://www.youtube.com/embed/videoseries?list=PLuHgQVnccGMA4uSig3hCjl7wTDeyIeZVU" frameborder="0"
            allowfullscreen></iframe>
          <h4 class="">WEB2 -JavaScript</h4>
          <p class="">기초강의 > javascript > 중급</p>

          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div> <!-- contents끝 -->

  <style>
    .content {
      height: 100%;
    }

    .modal-dialog {
      max-width: 600px;
      /* 모달 창 최대 너비 설정 */
    }

    hr {
      margin-top: calc(var(--base-unit) * 1);
      margin-bottom: calc(var(--base-unit) * 1);
    }


    h6 {
      margin-bottom: 24px;
      color: #6C757D;
    }
  </style>

  <script>



  </script>

  <!-- 박민용 product_list 끝 -->

</body>

</html>


?>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>