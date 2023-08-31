<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>
  <!-- php header -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  
  <!-- summernote 시작-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <!-- summernote 끝 -->
  <script src="keepcoding/admin/js/makeoption.js"></script>
  <link rel="stylesheet" href="/keepcoding/common.css">
  <link rel="stylesheet" href="/keepcoding/admin/css/style.css">
  <link rel="stylesheet" href="/keepcoding/admin/css/product_up.css">
  <title>강좌 등록</title>
</head>
<body>
<!-- 이강산 product_up 시작 -->
<div class="product_up content">
  <h4 class="fs-4 pd48">강좌 등록</h4>

  <form action="product_ok.php" method="POST" id="product_up_form" enctype="multipart/form-data">
    <div class="d-flex justify-content-between pd24">
      <div class="product_up_category">
        <h6 class="pd10">카테고리</h6>
        <select class="form-select form-select-sm" aria-label="Small select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>
          <?php
            foreach($cate1 as $c){            
          ?>
            <option value="<?php echo $c->cid ?>"><?php echo $c->name ?></option>
          <?php } ?>
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
        <label for="name"></label>
        <input class="form-control" name="name" id="name" type="text" placeholder="강좌명 입력하기" aria-label="default input example">
    </div>
  </div>

  <div class="d-flex justify-content-start pd24">
    <div class="product_up_usedate">
      <h6 class="pd10">수강 기한</h6>
      <select class="form-select form-select-sm" name="" id="" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
      </select>
    </div>

    <div class="product_up_regdate">
      <h6 class="pd10">시작일</h6>
      <label for="reg_date"></label>
      <input type="text" id="reg_date" name="reg_date" class="form-control" placeholder="2023-09-11"></p>
    </div>

  </div>

  <div class="d-flex justify-content-start pd24">
    <div class="product_up_price">
      <h6 class="pd10">판매 금액</h6>
      <label for="price"></label>
      <input class="form-control" name="price" id="price" type="number" placeholder="숫자만 입력하세요" min="5000" max="100000" step="5000" aria-label="default input example">
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
      <input class="form-control form-control-lg" name="thumbnail" id="thumbnail" type="file">
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
        <button type="button" class="btn btn-primary" id="product_up_btn_up">등록</button>
        <button type="button" class="product_up_cancel btn btn-primary">취소</button>
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
  });

  $('#product_detail').summernote({
      placeholder: '상세 설명을 입력하세요',
      tabsize: 2,
      height: 100
    });

  $('#product_start').datepicker({
    dateFormat:'yy-mm-dd',
    minDate: 'today',
    maxDate: '+1Y'
  });





</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>