<?php
  $title = '제품 상세보기';

  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';


  $pid = $_GET['pid'];
  $sql = "SELECT * FROM products WHERE pid = '$pid'";
  $result = $mysqli ->query($sql);
  $row = $result -> fetch_object();

?>

  <!-- 박민용 product_view 시작 -->
  <div class="product_view_sec1 content product_view mcbg-white d-flex flex-column">
    <div>
      <h4 class="fs-4 pd48">강좌 상세보기</h4>
      <hr class="pd24">
    </div>

    <!-- product_view_sec1  강좌명 -->
    <div class="product_view_sec2 row pd24">
      <div class="col p-0">
        <h6 class="pd24 text-secondary">강좌명</h6>
        <p class="h6"><?php echo $row->name; ?></p>
      </div>
      <div class="col p-0">
        <h6 class="pd24 text-secondary">카테고리</h6>
        <p class="">기초강의>CSS>고급</p>
      </div>
    </div>
    <hr class="pd24">

    <!-- product_view_sec2 수강기간, 판매금액,상태 -->
    <div class="product_view_sec2 row pd24">
      <div class="col p-0">
        <h6 class="pd24 text-secondary">수강 기한</h6>
        <p class="">무제한</p>
      </div>
      <div class="col p-0">
        <h6 class="pd24 text-secondary">시작일</h6>
        <p class=""><?php echo $row->reg_date; ?></p>
      </div>
    </div>
    <hr class="pd24">

     <!-- product_view_sec3 강좌설명 -->
     <div class="pd24">
      <h6 class="pd24 text-secondary">강좌설명</h6>
      <p class="">
      <?php echo $row->content; ?>

      <!-- 1.수업소개<br><br>
        &nbsp; &nbsp; a. 생활코딩 주력 수업인 WEBn은 프로그래밍이 처음인 분들을 위해서 고안된 수업입니다. <br><br>
        &nbsp; &nbsp; b. WEBn을 통해서 교양으로 코딩을 공부하려는 분들에게는 출구를, 직업으로 코딩을 공부하려는 분들에게는 입구를 제공해드리려고 노력하고 있습니다. -->
      </p>
    </div>
    <hr class="pd24">

    <!-- product_view_sec4 썸네일이미지 -->
    <div class="pd24">
      <h6 class="pd24 text-secondary">썸네일</h6>
      <img src="<?php echo $row->thumbnail ?>" alt="">
    </div>
    <hr class="pd24">

    <!-- product_view_sec5 영상업로드 -->
    <div class="product_view_sec2 pd24">
      <h6 class="pd24 text-secondary">강의 영상</h6>
      <div class="row">
        <p class="col-4 p-0"><?php echo $row->name ?></p>
          <!-- WEB2 JavaScript &#45; 1&#46; 수업소개 -->
        <p class="col-7 pd24"><a href="#" data-toggle="modal"
            data-target="#videoModal"><?php echo $row->video_url ?></a></p>
        <div class="col-1"><a class="btn btn-outline-primary" href="#" data-toggle="modal"
            data-target="#videoModal">보기</a></div>
      </div>
    </div>
    <hr class="pd24">

    <!-- 3buttons -->
    <div class="d-flex gap-3 justify-content-end">
      <a href="/keepcoding/admin/product/product_change.php?pid=<?= $row->pid ?>" class="btn btn-outline-primary" class="btn btn-primary ">수정</a>
      <a href="/keepcoding/admin/product/product_del.php?pid=<?= $row->pid ?>" class="btn btn-secondary" class="btn btn-secondary">삭제</a>
      <a href="/keepcoding/admin/product/product_list.php" class="btn btn-primary  ">강좌 리스트</a>
    </div>
  </div>

  <!-- modal -->
  <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-static" role="document">
      <div class="modal-content">
        <div class="modal-body p10">

        <iframe width="400" height="315" src="<?php echo $row->video_url?> " title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          

          <h4 class="pd10"><?php echo $row->name ?></h4>
          <p class="pd24">기초강의 > javascript > 중급</p>

          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal" aria-label="Close">닫기</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contents끝 -->

  <!-- 박민용 product_list 끝 -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>