<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 coupon_view 시작 -->
<div class="content coupon_view">
  <h2 class="pd48 fs-4">쿠폰 상세보기</h2>
  <hr class="pd24">
  <div class="row pd24">
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">쿠폰명</h3>
      <p class="h6">회원가입 축하쿠폰</p>
    </div>
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">상태</h3>
      <p>활성화</p>
    </div>
  </div>
  <hr class="pd24">
  
  <div class="row pd24">
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">할인가</h3>
      <p>₩10,000</p>
    </div>
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">최소사용금액</h3>
      <p>₩5,000</p>
    </div>
  </div>
  <hr class="pd24">

  <div class="row pd24">
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">사용기한</h3>
      <p>무제한</p>
    </div>
    <div class="col p-0">
      <h3 class="pd24 h6 text-secondary">시작일</h3>
      <p>2023.09.09</p>
    </div>
  </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <img src="../img/coupon01.svg" alt="">
    </div>
  <hr class="pd48">
    <div class="d-flex justify-content-end gap-3">
      <button type="button" class="btn btn-primary">수정</button>
      <button type="button" class="btn btn-secondary">삭제</button>
      <button type="button" class="btn btn-primary">쿠폰 리스트</button>
    </div>
</div>
<!-- 최성희 coupon_view 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>