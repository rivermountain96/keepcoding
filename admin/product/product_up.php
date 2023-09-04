<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<body>
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
        <label class="pd10 h6" for="name">강좌명</label>
        <input class="form-control form-control-lg" name="name" id="name" type="text" placeholder="강좌명 입력하기" aria-label="default input example">
    </div>
  </div>

  <div class="row justify-content-start pd24 gap-3 form-width-973">
    <div class="product_up_usedate col-4 p-0">
      <h6 class="pd10 h6">수강 기한</h6>
      <select class="form-select form-select-lg" name="usedate" id="usedate" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
      </select>
    </div>

    <div class="product_up_regdate col-4 p-0 datepicker">
      <label class="pd10 h6" for="reg_date">시작일</label>
      <input type="text" id="reg_date" name="reg_date" class="form-control form-control-lg" placeholder="<?php echo date("Y.m.d");?>">
    </div>

    <div class="product_up_enddate col p-0 datepicker">
      <label class="pd10 h6" for="sale_end_date">종료일</label>
      <input type="text" id="sale_end_date" name="sale_end_date" class="form-control form-control-lg" placeholder="<?php echo $sale_end_date;?>">
    </div>

  </div>

  <div class="row justify-content-start pd24 row-cols-8 gap-3 form-width-973">
    <div class="product_up_price col-4 p-0">
      <label class="pd10 h6" for="price">판매 금액</label>
      <input class="form-control form-control-lg" name="price" id="price" type="number" placeholder="숫자만 입력하세요" min="5000" max="100000" step="5000" aria-label="default input example">
    </div>
    <div class="product_status row col p-0">
      <h6 class="pd10 h6">판매 상태</h6>
      <div class="product_status_checkbox d-flex">
        <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="0" id="status_0" name="status">
            <label class="form-check-lsabel" for="status_0">판매중</label>
        </div>
        <div class="form-check product_no_status">
            <input class="product_status_input form-check-input" type="radio" value="1" id="status_1" name="status" checked>
            <label class="form-check-label" for="status_1">판매중지</label>
        </div>
      </div>
    </div>
  </div>

  <div class="pd24">
    <div class="product_up_detail col p-0">
      <h6 class="pd10">상세설명</h6>
        <div id="product_detail" name="product_detail"></div>
    </div>
  </div>

  <div class="pd24">
    <div class="product_up_thumbnail">
      <label for="thumbnail" class="form-label pd10 h6">썸네일</label>
      <input class="form-control form-control-lg" name="thumbnail" id="thumbnail" type="file">
    </div>
  </div>

  <div class="d-flex pd48 gap-3">
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

  $('#reg_date').datepicker({
    dateFormat:'yy.mm.dd',
    minDate: 'today',
    maxDate: '+1Y'
    // onSelect: function (dateText, inst) {
    //   // 선택한 날짜를 Date 객체로 파싱합니다.
    //   var selectedDate = new Date(dateText);
      

    //   // 1년을 더합니다.
    //   selectedDate.setFullYear(selectedDate.getFullYear() + 1);
      
    //   // 새로운 날짜를 출력합니다.
    //   var formattedDate = $.datepicker.formatDate('yy.mm.dd', selectedDate);
    //   console.log(formattedDate);
    //   $('#sale_end_date').datepicker( "setDate", selectedDate);
    //     }
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
      $("#reg_date").datepicker("option", {disabled:true, dateFormat: ''});
      $("#sale_end_date").datepicker("option", {disabled:true, dateFormat: ''});
    }else{
      $("#reg_date").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
      $("#sale_end_date").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
    }
  });

  function attachFile(file) {
    console.log(file);
    let formData = new FormData(); //페이지 전환없이 이페이지 바로 이미지 등록
    formData.append('savefile', file) //<input type="file" name="savefile" value="파일명">
    console.log(formData);
    $.ajax({
      url: 'product_save_video.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'json',
      type: 'POST',
      error: function (error) {
        console.log('error:', error)
      },
      success: function (return_data) {

        console.log(return_data);

        if (return_data.result == 'member') {
          alert('로그인을 하십시오.');
          return;
        } else if (return_data.result == 'image') {
          alert('이미지파일만 첨부할 수 있습니다.');
          return;
        } else if (return_data.result == 'size') {
          alert('10메가 이하만 첨부할 수 있습니다.');
          return;
        } else if (return_data.result == 'error') {
          alert('관리자에게 문의하세요');
          return;
        } else {
          //첨부이미지 테이블에 저장하면 할일
          let vid = $('#file_table_id').val() + return_data.vid + ',';
          $('#file_table_id').val(vid);
          let html = `
              <div class="thumb" id="f_${return_data.vid}" data-vid="${return_data.vid}">
                <img src="/keepcoding/pdata/${return_data.savefile}" alt="">
                <button type="button" class="btn btn-warning">삭제</button>
            </div>
          `;
          $('#thumbnails').append(html);
        }
      }

    });
  }
  
</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>