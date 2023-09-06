<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/category_func.php';

$pid = $_GET['pid'];
$sql = "SELECT * FROM products WHERE pid = '$pid'";
$result = $mysqli ->query($sql);
$row = $result -> fetch_object();

?>


<body>
<!-- 박민용 product_change 시작 -->
<div class="product_change content">
  <h4 class="fs-4 pd72">강좌 수정</h4>

<form action="product_change_ok.php?pid=<?= $pid ?>" method="POST" id="product_change_form" enctype="multipart/form-data">
    <input type="hidden" name="file_table_id" id="file_table_id" value="">
    <input type="hidden" name="content" id="content" value="">

      
    <div class="product_change_category">
      <h3 class="pd10 h6">카테고리</h3>
      <div class="row pd24 gap-3">
        <select class="form-select form-control-lg col" aria-label="Small select example" id="cate1" name="cate1" >
          <option selected disabled>대분류</option>
          <?php
            foreach($cate1 as $c){            
          ?>
            <option value="<?php echo $c->cid ?>"><?php echo $c->name ?></option>
          <?php } ?>
        </select>
     

        <select class="form-select form-control-lg col" aria-label="Small select example" id="cate2" name="cate2" >
          <option selected disabled>중분류</option>
        </select>


        <select class="form-select form-control-lg col" aria-label="Small select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
        </select>

      </div>
  
  </div>

  <div class="pd24">
    <div class="product_change_name">
    <label class="pd10 h6" for="product_change_title">강좌명</label>
        <input class="form-control" name="name" id="name" type="text" value ="<?php echo $row->name ?>" placeholder="" aria-label="default input example">
    </div>
  </div>

  <div class="row justify-content-start pd24 gap-3">
    <div class="product_change_usedate col p-0">
        <h6 class="pd10 h6">수강 기한</h6>
      <!-- <select class="form-select form-select-sm" name="usedate" id="usedate" require aria-label="Small select example"> -->
      <select class="form-select form-control-lg" name="usedate" id="usedate" aria-label="Small select example">
          <option value="1"  <?php echo $row->status == 1?"checked":""; ?>>제한 </option>
          <option value="2" <?php echo $row->status == 1?"checked":""; ?>>무제한</option>
      </select>
    </div>

    <div class="product_change_regdate col p-0 datepicker">
      <label class="pd10 h6" for="regdate">시작일</label>
      <input type="text" id="reg_date" name="reg_date" class="form-control" value="<?php echo $row->reg_date;?>"></p>
    </div>

    <div class="product_change_enddate col p-0 datepicker">
        <label class="pd10 h6" for="sale_end_date">종료일</label>
        <input type="text" id="sale_end_date" name="sale_end_date" class="form-control" value="<?php echo  $row->sale_end_date;?>">
      </div>

  </div>

  <div class="row justify-content-start pd24 row-cols-8 gap-3 form-width-973">
      <div class="product_change_price col-4 p-0">
      <label class="pd10 h6" for="product_change_price">판매 금액</label>
      <input class="form-control form-control-lg" name="price" id="product_change_price" type="number" value="" min="5000"
          max="100000" step="5000" aria-label="default input example">
      </div>
    <div class="product_status row col p-0">
    <h6 class="pd10 h6">판매 상태</h6>
      <div class="product_status_checkbox d-flex">
        <div class="form-check">
            <input class="product_status_input form-check-input" type="radio" value="1" <?php echo $row->status == 1?"checked":""; ?> id="status_0" name="status">
            <label class="form-check-label" for="status_0">판매중</label>
        </div>
        <div class="form-check product_no_status">
            <input class="product_status_input form-check-input" type="radio" value="2" <?php echo $row->status == 2?"checked":""; ?> id="status_1" name="status" >
            <label class="form-check-label" for="status_1">판매중지</label>
        </div>
      </div>
    </div>
  </div>

  <div class="pd24">
  <div class="product_detail col p-0">
  <h6 class="pd10">상세설명</h6>

      <textarea id="product_detail" name="product_detail">
      <?php echo $row->content?>;
      </textarea>

  </div>
</div>

  <div class="pd24">
    <div class="product_change_thumbnail">
    <label for="thumbnail" class="form-label pd10 h6">썸네일</label>
      <input class="form-control form-control-lg" name="thumbnail" id="thumbnail" type="file">
    </div>
  </div>

  <div class="d-flex pd48 gap-3">
      <div class="product_change_video_url col p-0">
        <label for="product_url" class="pd10 h6">강의 영상 주소</label>
        <input type="url" id="product_url" name="video_url" class="form-control form-control-lg"
          value="<?php echo $row->video_url?>">
      </div>
    </div>  

    <div class="product_change_btn d-flex justify-content-end gap-3 p-0">
     <button type="submit" class="btn btn-primary">수정</button>
     <button type="button" class="product_change_cancel btn btn-secondary" onclick="location.href='/keepcoding/admin/product/product_list.php?>'">취소</button>
 
    </div>

  </div>
</form> 

<script>
      $("#product_detail").summernote({
        tabsize: 2,
        height: 100,
      });


      $("#reg_date").datepicker({
        dateFormat: "yy.mm.dd",
        minDate: "today",
        maxDate: "+1Y",
        onSelect: function (dateText, inst) {
          // 선택한 날짜를 Date 객체로 파싱합니다.
          var selectedDate = new Date(dateText);

          // 1년을 더합니다.
          selectedDate.setFullYear(selectedDate.getFullYear() + 1);

          // 새로운 날짜를 출력합니다.
          var formattedDate = $.datepicker.formatDate("yy.mm.dd", selectedDate);
          console.log(formattedDate);
          $("#sale_end_date").datepicker("setDate", selectedDate);
        },
      });

      $("#sale_end_date").datepicker({
        dateFormat: "yy.mm.dd",
      });

      let usedate = $("#usedate");
      usedate.change(function () {
        let value = usedate.val();
        if (value == 2) {
          $("#reg_date").datepicker("option", { disabled: true, dateFormat: "" });
          $("#sale_end_date").datepicker("option", { disabled: true, dateFormat: "" });
        } else {
          $("#reg_date").datepicker("option", { disabled: false, dateFormat: "yy.mm.dd" });
          $("#sale_end_date").datepicker("option", { disabled: false, dateFormat: "yy.mm.dd" });
        }
      });

      $("#btn-cancel").click(function () {
        window.location.href = "product_list.php"; // 이동할 페이지 URL 설정
      });

      
      //카테고리

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
  </body>
</html>


<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>
