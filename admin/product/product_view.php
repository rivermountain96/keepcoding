<?php
  $title = '제품 상세보기';

  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';


  $pid = $_GET['pid'];
  $sql = "SELECT * FROM products WHERE pid = '$pid'";
  $result = $mysqli ->query($sql);
  $row = $result -> fetch_object();
  


  ?>


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
        <p class=""><?php echo $row->name ?></p>
      </div>

      <div class="col">
        <h6 class="">카테고리</h6>
        <p class=""><?php echo $row->cate ?></p>
      </div>

    </div>

    <!-- product_view_sec2 수강기간, 판매금액,상태 -->

    <hr>
    <div class="product_view_sec2 row ">
      <div class="col">
        <h6 class="">수강 기한</h6>
        <p class=""><?php echo $row->reg_date ?></p>
      </div>

      <div class="col">
        <h6 class="">시작일</h6>
        <p class=""><?php echo $row->reg_date ?></p>
      </div>

    </div>

    <hr>
    <!-- product_view_sec3 강좌설명 -->


    <div class="col">
      <h6>강좌설명</h6>
      <p class="">1.수업소개<br><br>
      <?php echo $row->content ?></p>
      <hr>
    </div>


    <!-- product_view_sec4 썸네일이미지 -->

    <div class="col">
      <h6 class="">썸네일</h6>
      <p class="mb-24"><?php echo $row->thumbnail ?></p>
      <br>
      <img src="<?php echo $row->thumbnail ?>" alt="">
    </div>

    <hr>
    <!-- product_view_sec5 영상업로드 -->


    <div class="product_view_sec2 row ">
      <h6 class="">강의 영상</h6>

      <div class="col">
        <p class=""><?php echo $row->content ?></p>
      </div>


      <div class="col">
        <p class="col text-nowrap">
          <a href="#" data-toggle="modal" data-target="#videoModal">
          <?php echo $row->content ?>
          </a>

        </p>

      </div>

    </div>

    <hr>
    <!-- 3buttons -->

    <div class="d-flex gap-3 justify-content-end">
    <a href="/keepcoding/admin/product/product_change.php?pid=<?= $row->pid ?>" class="btn btn-outline-primary">수정</a>
      <a href="/keepcoding/admin/product/product_del.php?pid=<?= $row->pid ?>" class="btn btn-outline-primary">삭제</a>
      <a href="/keepcoding/admin/product/product_list.php" class="btn btn-primary  ">강좌 리스트</a>
    </div>
  </div>


  <!-- modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <iframe width="100%" height="485"
            src="<?php echo $row->content ?>" frameborder="0"
            allowfullscreen></iframe>
          <h4 class=""><?php echo $row->content ?></h4>
          <p class=""><?php echo $row->content ?></p>

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

<style>


</style>





<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>

