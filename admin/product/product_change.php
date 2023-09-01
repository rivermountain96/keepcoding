<!DOCTYPE html>
<html lang="ko">
  
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  ?>


<body>

  <!-- 정이원 product_up 시작 -->
  <div class="product_up content">
    <h4 class="fs-4 pd48">강좌 수정</h4>

    <div class="d-flex justify-content-between pd24">
      <div class="product_up_category">
        <h6 class="pd10">카테고리</h6>
        <select class="form-select form-select-sm" aria-label="Small select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>
          <option value="">기초강의</option>
          <option value="">프론트엔드</option>
          <option value="">백엔드</option>
        </select>
      </div>
      <div class="product_up_category">
        <h6 class="category_name pd10">중분류</h6>
        <select class="form-select form-select-sm" aria-label="Small select example" id="cate2" name="cate2">
          <option selected disabled>중분류</option>
        </select>
      </div>
      <div class="product_up_category">
        <h6 class="category_name pd10">소분류</h6>
        <select class="form-select form-select-sm" aria-label="Small select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
        </select>
      </div>
    </div>

    <div class="d-flex pd24">
      <div class="product_up_name col">
        <h6 class="pd10">강좌명</h6>
        <label for=""></label>
        <input class="form-control" type="text" placeholder="강좌명 입력하기" aria-label="default input example">
      </div>
    </div>

    <div class="d-flex justify-content-start pd24">
      <div class="product_up_usedate">
        <h6 class="pd10">수강 기한</h6>
        <select class="form-select form-select-sm" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
        </select>
      </div>

      <div class="product_up_regdate">
        <h6 class="pd10">시작일</h6>
        <label for="product_start"></label>
        <input type="text" id="product_start" name="product_start" class="form-control" placeholder="2023-09-11"></p>
      </div>

    </div>

    <div class="d-flex justify-content-start pd24">
      <div class="product_up_price">
        <h6 class="pd10">판매 금액</h6>
        <label for=""></label>
        <input class="form-control" type="number" placeholder="숫자만 입력하세요" min="5000" max="100000" step="5000"
          aria-label="default input example">
      </div>
      <div class="product_status d-flex row">
        <h4>판매 상태</h4>
        <div class="product_status_checkbox d-flex">
          <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="" id="issale">
            <label class="form-check-lsabel" for="issale">
              판매중
            </label>
          </div>
          <div class="form-check product_no_status">
            <input class="product_status_input form-check-input" type="radio" value="" id="isnotsale" checked>
            <label class="form-check-label" for="isnotsale">
              판매중지
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="pd24">
      <div class="product_detail col">
        <h6 class="pd10">상세설명</h6>
        <form method="post">
          <textarea id="product_detail" name="product_detail"></textarea>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between pd24">
      <div class="product_up_thumbnail">
        <h6 class="pd10">썸네일</h6>
        <label for="thumbnail" class="form-label"></label>
        <input class="form-control form-control-lg" id="thumbnail" type="file">
      </div>
    </div>

    <div class="d-flex justify-content-between pd24">
      <div class="product_up_video">
        <h6 class="pd10">강의 영상 업로드</h6>
        <label for="product_name"></label>
        <input type="text" id="product_name" name="product_name" class="form-control" placeholder="강의명 입력하기">
      </div>
      <div class="product_up_video_url col-md-8">
        <h6 class="pd10">강의 영상 주소</h6>
        <label for="product_url"></label>
        <input type="url" id="product_url" name="product_url" class="form-control" placeholder="영상 주소">
      </div>
      <div class="product_up_video_plus">
        <h6 class="pd10">강의 영상 추가</h6>
        <button type="button" class="btn btn-outline-primary">추가</button>
      </div>
    </div>

    <div class="product_up_btn d-flex justify-content-end">
      <button type="button" class="btn btn-primary">등록</button>
      <button type="button" class="product_up_cancel btn btn-primary">취소</button>
    </div>

  </div>

  <script>
    $('#product_detail').summernote();
    $("#product_start").datepicker({ dateFormat: 'yy-mm-dd' });

  </script>
</body>

</html>