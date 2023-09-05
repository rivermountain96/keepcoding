<?php
$title = '공지수정';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

$bno = $_GET['idx'];
$sql = "SELECT * FROM notice where idx='{$bno}'";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();

if($_SESSION['AUNAME']){
  $name = $_SESSION['AUNAME'];
}
?>

<!-- 최성희 notice_change 시작 -->
<div class="content notice_change">
  <h2 class="pd72 fs-4">공지 수정</h2>
    <form class="pd48" action="/keepcoding/admin/notice/notice_change_ok.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="idx" id="idx" value="<?= $bno ?>">
      <div class="pd24">
        <label class="pd10 h6" for="title">제목</label>
        <input class="form-control form-control-lg" id="title" name="title" type="text"  aria-label="default input example" value="<?= $rs -> title; ?>">
      </div>
      
      <div class="row pd24 gap-3 form-width-973">
        <div class="col-4 p-0">
          <p class="pd10 h6">공지 기한</p>
          <select class="form-select form-select-lg" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
          </select>
        </div>
        <div class="notice_change_regdate col-4 p-0 datepicker">
          <label class="pd10 h6" for="regdate">시작일</label>
          <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg" value="<?= $rs -> regdate; ?>">
        </div> 
        <!-- <div class="notice_change_enddate col p-0 datepicker">
          <label class="pd10 h6" for="duedate">만료일</label>
          <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg" value="<?= $rs -> duedate; ?>">
        </div> -->
      </div>

      <div class="pd24">
        <p class="pd10 h6">내용</p>
        <textarea id="summernote" name="content"><?= $rs -> content; ?></textarea>
      </div>

      <div class="pd48">
        <label for="notice_img" class="form-label pd10 h6">이미지</label>
        <input class="form-control form-control-lg form-control form-control-lg" id="notice_img" name="notice_img" value="<?= $rs -> notice_img; ?>" type="file">
      </div>

      <div class="d-flex justify-content-end gap-3">
        <button type="submit" class="btn btn-primary">수정</button>
        <button type="button" class="btn btn-secondary" onclick="history.back(1)">취소</button>
      </div>
    </form>
</div>
  <!-- 최성희 notice_change 끝 -->
  
  <script>    
    $('#summernote').summernote({
    placeholder: 'Hello keep coding',
    tabsize: 2,
    height: 100
    });
    $("#regdate").datepicker({
      dateFormat:'yy.mm.dd'
    });
    $("#duedate").datepicker({
      dateFormat:'yy.mm.dd'
    });

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
        $("#datepicker").datepicker("option", {disabled:true, dateFormat: 'yy.mm.dd'});
        $("#datepicker2").datepicker("option", {disabled:true, dateFormat: 'yy.mm.dd'});
      }else{
        $("#datepicker").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
        $("#datepicker2").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
      }
     
    })
  </script>

  <?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>