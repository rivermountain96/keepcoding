<?php
  $title =  '강좌등록';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/category_func.php';
?>

<!-- 이강산 product_up 시작 -->
<div class="product_up content">
  <h4 class="fs-4 pd72">강좌 등록</h4>

  <form action="product_ok.php" method="POST" id="product_up_form" enctype="multipart/form-data">
      <input type="hidden" name="file_table_id" id="file_table_id" value="">
      <input type="hidden" name="content" id="content" value="">
        <div class="product_up_category">
          <h3 class="pd10 h6">카테고리</h3>
          <div class="row pd24 gap-3">
            <select class="form-select form-select-lg col" aria-label="Small select example" id="cate1" name="cate1">
              <option selected disabled>대분류</option>
              <?php
                foreach($cate1 as $c){            
              ?>
                <option value="<?php echo $c->cid ?>"><?php echo $c->name ?></option>
              <?php } ?>
            </select>
          
            <select class="form-select form-control-lg col" aria-label="Small select example" id="cate2" name="cate2">
              <option selected disabled>중분류</option>
            </select>
      
            <select class="form-select form-control-lg col" aria-label="Small select example" id="cate3" name="cate3">
              <option selected disabled>소분류</option>
            </select>
          </div>
        </div>

  <div class="pd24">
    <div class="product_up_name">
        <label class="pd10 h6" for="name">강의명</label>
        <input class="form-control form-control-lg" name="name" id="name" type="text" placeholder="강의명 입력하기" aria-label="default input example">
    </div>
  </div>

  <div class="pd24">
      <label class="pd10 h6" for="product_intro">강의소개</label>
      <textarea class="form-control form-control-lg" placeholder="강의소개 입력하기" id="product_intro"></textarea>
  </div>

  <div class="row justify-content-start pd24 gap-3">
    <div class="product_up_usedate col p-0">
      <h6 class="pd10 h6">수강 기한</h6>
      <select class="form-select form-select-lg" name="usedate" id="usedate" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
      </select>
    </div>

    <div class="product_up_regdate col p-0 datepicker">
      <label class="pd10 h6" for="regdate">시작일</label>
      <input type="text" id="regdate" name="regdate" class="form-control form-control-lg" placeholder="시작일 선택">
    </div>

    <div class="product_up_enddate col p-0 datepicker">
      <label class="pd10 h6" for="sale_end_date">종료일</label>
      <input type="text" id="sale_end_date" name="sale_end_date" class="form-control form-control-lg" placeholder="종료일 선택">
    </div>

  </div>

  <div class="row justify-content-start pd24 row-cols-8 gap-3 form-width-973">
    <div class="product_up_price col-4 p-0">
      <label class="pd10 h6" for="price">판매 금액</label>
      <input class="form-control form-control-lg" name="price" id="price" type="number" placeholder="숫자만 입력하세요" min="0" max="100000" step="5000" aria-label="default input example">
    </div>
    <div class="product_status row col p-0">
      <h6 class="pd10 h6">판매 상태</h6>
      <div class="product_status_checkbox d-flex">
        <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="0" name="status" id="status_sale">
            <label class="form-check-lsabel" for="status_sale">판매중</label>
        </div>
        <div class="form-check product_no_status">
            <input class="product_status_input form-check-input" type="radio" value="1" name="status" id="status_notsale" checked>
            <label class="form-check-label" for="status_notsale">판매중지</label>
        </div>
      </div>
    </div>

  <div class="product_status row col p-0">
      <h6 class="pd10 h6">추천강의여부</h6>
      <div class="product_status_checkbox d-flex justify-content-start gap-3">
        <div class="form-check">
            <input class="product_status_input form-check-input" type="checkbox" value="0" name="isbest" id="isbest">
            <label class="form-check-lsabel" for="isbest">추천강의</label>
        </div>
      </div>
  </div>
  <!-- <div class="product_status row col p-0">
      <h6 class="pd10 h6">컨텐츠유형</h6>
      <div class="product_status_checkbox d-flex justify-content-start gap-3">
        <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="0" name="shortform" id="shortform">
            <label class="form-check-lsabel" for="shortform">숏강의</label>
        </div>
        <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="1" name="shortform" id="normalform" checked>
            <label class="form-check-lsabel" for="normalform">일반강의</label>
        </div>
      </div>
  </div> -->

  <div class="pd24">
    <div class="product_up_detail col p-0">
      <h6 class="pd10">상세설명</h6>
        <textarea id="product_detail" name="product_detail"></textarea>
    </div>
  </div>

  <div class="pd24">
    <div class="product_up_thumbnail">
      <label for="thumbnail" class="form-label pd10 h6">썸네일</label>
      <input class="form-control form-control-lg" name="thumbnail" id="thumbnail" type="file">
    </div>
  </div>

  <div class="d-flex pd48 gap-3 row">
    <div class="product_up_video_url col p-0">
      <label for="video_url" class="pd10 h6">강의 영상 주소</label>
      <input type="url" id="video_url" name="video_url" class="form-control form-control-lg" placeholder="URL을 입력하세요">
    </div>
  </div>

  <div class="product_up_btn d-flex justify-content-end gap-3 p-0">
    <button type="submit" class="btn btn-primary" id="product_up_btn_up">등록</button>
    <button type="button" id="btn-cancel" class="product_up_cancel btn btn-secondary">취소</button>
  </div>
  </form> 
</div>

<!-- 이강산 product_up 끝 -->
<script src="/keepcoding/admin/js/makeoption.js"></script>

<script>

  $('#product_up_form').submit(function(){
    let markupStr = $('#product_detail').summernote('code');
    let content = encodeURIComponent(markupStr);
    $('#content').val(content);

    if ($('#product_detail').summernote('isEmpty')) {
      alert('상품 설명을 입력하세요');
      // return false;
    }
    
  });

  $('#btn-cancel').click(function() {
    window.location.href = 'product_list.php'; // 취소버튼
  });


  $('#product_detail').summernote({
      placeholder: '상세 설명을 입력하세요',
      tabsize: 2,
      height: 100
    });

  $('#regdate').datepicker({
    dateFormat:'yy.mm.dd',
    minDate: 'today',
    maxDate: '+1Y',
    onSelect: function (dateText, inst) {
      // 선택한 날짜를 Date 객체로 파싱합니다.
      var selectedDate = new Date(dateText);
      

      // 1년을 더합니다.
      selectedDate.setFullYear(selectedDate.getFullYear() + 1);
      
      // 새로운 날짜를 출력합니다.
      var formattedDate = $.datepicker.formatDate('yy.mm.dd', selectedDate);
      console.log(formattedDate);
      $('#sale_end_date').datepicker( "setDate", selectedDate);
    }
  });
  
  $('#sale_end_date').datepicker({
    dateFormat:'yy.mm.dd',
    minDate: '+1D',
    maxDate: '+1Y'
  });


  let usedate = $('#usedate');
  usedate.change(function(){
    let value = usedate.val();
    if(value == 2){
      $("#regdate").datepicker("option", {disabled:true, dateFormat: ''});
      $("#sale_end_date").datepicker("option", {disabled:true, dateFormat: ''});
    }else{
      $("#regdate").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
      $("#sale_end_date").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
    }
  });

  $("#cate1").on("change", function () {
  console.log("click");
  makeOption($(this), 2, $("#cate2"));
  }); //cate1 change

  $("#cate2").on("change", function () {
    makeOption($(this), 3, $("#cate3"));
  }); //cate2 change


  function makeOption(evt, step, target) {
  let cid = evt.val();
  console.log(cid);


  $.ajax({
    async: false, //sucess의 결과 나오면 이후 작업 수행
    type: "_GET", //변수명cate1의 값을 전달할 방식 post
    url: "printOption.php?cate=" + cid + "&step=" + step,
    dataType: "html", //success성공후 printOption.php가 반환하는 데이터의 형식  <option></option>
    success: function (result) {
      console.log(result);
      target.html(result);
      },
    }); //ajax
  }

  
</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>