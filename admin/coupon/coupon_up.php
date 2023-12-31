<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';

  // if(!$_SESSION['AUID']){
  //   echo "<script>
  //   altert ('관리자 권한이 없습니다');
  //   history.back();</script>";
  //   exit;
  // }
?>
  <!-- 정이원 coupon_up 시작-->
  <div class="content coupon_up">
    <h2 class="fs-4 pd72">쿠폰 등록</h2>

    <form action="coupon_ok.php" method="post" enctype="multipart/form-data">
      <div class="pd48 row">
        <div class="coupon_up_name col-8 p-0">
          <label for="coupon_name" class="pd10 h6">쿠폰명</label>
          <input class="form-control form-control-lg" type="text" name="coupon_name" id="coupon_name" placeholder="쿠폰명을 입력하세요"
            aria-label="default input example">
        </div>
        <div class="coupon_up_status d-flex row col-4">
          <h3 class="pd10 h6">상태</h3>
          <div class="coupon_up_status_checkbox d-flex">
            
            <div class="coupon_up_status_on form-check">
              <input class="coupon_up_status_input form-check-input" type="radio" value="1" name="status" id="status1">
              <label class="form-check-lsabel" for="status1">활성화</label>
            </div>
            <div class="coupon_up_status_off form-check text-center">
              <input class="coupon_up_status_input form-check-input" type="radio" value="1" name="status" id="status0" checked>
              <label class="form-check-label" for="status0">비활성화</label>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex pd48 row gap-3 form-width-973">
        <div class="coupon_up_price col-4 p-0">
          <label class="pd10 h6" for="couponPrice">할인가</label>
          <input class="form-control form-control-lg" type="number" name="coupon_price" id="couponPrice" min="1000" max="100000"
            step="1000" placeholder="숫자를 입력하세요" aria-label="default input example">
        </div>

        <div class="coupon_up_min_price col-4 p-0">
          <label class="pd10 h6" for="useminPrice">최소사용금액</label>
          <input class="form-control form-control-lg" type="number" name="use_min_price" id="useminPrice" min="1000" max="110000"
            step="1000" aria-label="default input example">
        </div>
      </div>

        <div class="row justify-content-start pd48 gap-3">
          <div class="coupon_up_usedate col p-0">
            <h3 class="pd10 h6">사용기한</h3>
            <select class="form-select form-select-lg" id="usedate" aria-label="Small select example">
              <option value="1" selected>제한</option>
              <option value="2">무제한</option>
            </select>
          </div>

        <div class="coupon_up_regdate col p-0 datepicker">
          <label class="pd10 h6" for="datepicker">시작일</label>
          <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg" required>
        </div>

        <div class="coupon_up_enddate col p-0 datepicker">
          <label class="pd10 h6" for="datepicker2">만료일</label>
          <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg" required>
        </div>
      </div>

      <div class="pd48">
        <div class="coupon_up_image">
          <label class="pd10 h6 form-label" for="coupon_image">이미지</label>
          <input class="form-control form-control-lg form-control form-control-lg" name="coupon_image" id="coupon_image" type="file">
        </div>
      </div>

      <div class="coupon_up_btn d-flex justify-content-end gap-3 p-0">
        <button type="submit" class="btn btn-primary">등록</button>
        <button type="button" class="btn btn-secondary" onclick="history.back(1)">취소</button>
    </div>

    </form>
  </div>
  <!-- 정이원 coupon_up 끝 -->


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

    let usedate = $('#usedate');
    console.log(usedate);
    usedate.change(function(){
      let value = usedate.val();
      console.log(value);
      if(value == 2){
        $("#datepicker").datepicker("option", {disabled:true, dateFormat: ''});
        $("#datepicker2").datepicker("option", {disabled:true, dateFormat: ''});
      }else{
        $("#datepicker").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
        $("#datepicker2").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
      }
     
    })

    // 활성화, 비활성화 체크박스 하나씩 체크하기
//     function doOpenCheck(chk){
//     var obj = document.getElementsByName("status");
//     for(var i=0; i<obj.length; i++){
//         if(obj[i] != chk){
//             obj[i].checked = false;
//         }
//     }
// }

</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>

