<?php
  $title =  '쿠폰 수정';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 coupon_change 시작-->
<div class="content coupon_change">
  <h2 class="fs-4 pd72">쿠폰 수정</h2>

  <form action="coupon_ok.php" method="post" enctype="multipart/form-data">
    <div class="pd48 row">
      <div class="coupon_change_name col-8 p-0">
        <label for="coupon_name" class="pd10 h6">쿠폰명</label>
        <input class="form-control form-control-lg" type="text" name="coupon_name" id="coupon_name" placeholder="" value="회원가입 축하쿠폰"
          aria-label="default input example">
      </div>
      <div class="coupon_change_status d-flex row col-4">
        <h3 class="pd10 h6">상태</h3>
        <div class="coupon_change_status_checkbox d-flex">
          
          <div class="form-check">
            <input class="coupon_change_status_input form-check-input" type="radio" value="1" name="status" id="status" checked>
            <label class="form-check-lsabel" for="status">활성화</label>
          </div>
          <div class="form-check coupon_no_status text-center">
            <input class="coupon_change_status_input form-check-input" type="radio" value="1" name="disabled" id="disabled">
            <label class="form-check-label" for="disabled">비활성화</label>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex pd48 row gap-3">
      <div class="coupon_change_price col-4 p-0">
        <label class="pd10 h6" for="coupon_price">할인가</label>
        <input class="form-control form-control-lg" type="number" name="coupon_price" id="coupon_price" min="5000" max="100000"
          step="5000" aria-label="default input example">
      </div>

      <div class="coupon_change_min_price col-4 p-0">
        <label class="pd10 h6" for="use_min_price">최소사용금액</label>
        <input class="form-control form-control-lg" type="number" name="use_min_price" id="use_min_price" min="10000" max="110000"
          step="5000" aria-label="default input example">
      </div>
    </div>

    <div class="row justify-content-start pd24 gap-3">
      <div class="coupon_change_usedate col p-0">
        <h3 class="pd10 h6">사용기한</h3>
        <select class="form-select form-select-lg" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
        </select>
      </div>

      <div class="coupon_change_regdate col p-0 datepicker">
        <label class="pd10 h6" for="datepicker">시작일</label>
        <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg" required>
      </div>

      <div class="coupon_change_enddate col p-0 datepicker">
        <label class="pd10 h6" for="datepicker2">만료일</label>
        <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg" required>
      </div>
    </div>

    <div class="pd48">
      <div class="coupon_change_image">
        <label class="pd10 h6 form-label" for="coupon_image">이미지</label>
        <input class="form-control form-control-lg form-control form-control-lg" name="coupon_image" id="coupon_image" type="file">
      </div>
    </div>

    <div class="product_up_btn d-flex justify-content-end gap-3 p-0">
      <button type="button" class="btn btn-primary" onClick="location.href='coupon_change.php'">수정</button>
      <button type="button" class="product_up_cancel btn btn-primary">취소</button>
  </div>

  </form>
</div>
<!-- 최성희 coupon_change 끝 -->

<script>
  $("#datepicker").datepicker({
    dateFormat: 'yy.mm.dd',
    minDate: 'today',
    maxDate: '+1Y'
  });
  $("#datepicker").datepicker("setDate", new Date());
  $("#datepicker2").datepicker({
    dateFormat: 'yy.mm.dd',
    minDate: 'today',
    maxDate: '+1Y'
  });
  $("#datepicker2").datepicker("setDate", new Date());
</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>