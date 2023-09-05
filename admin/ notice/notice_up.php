<?php
$title = '공지등록';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';

// $bno = $_GET['idx'];
// $name = $_POST['name'];
// $hit = $_POST['hit'];
// $sql = "SELECT * from notice where idx='{$bno}'";
// $result = $mysqli->query($sql);
// $nrow = $result ->fetch_object();
if($_SESSION['AUNAME']){
  $name = $_SESSION['AUNAME'];
}
?>

<!-- 최성희 notice_up 시작 -->
<div class="content notice_up">
  <h2 class="pd72 fs-4">공지 등록</h2>
    <form class="pd48" action="notice_ok.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="name" value="<?= $name; ?>">
      <div class="pd24">
        <label class="pd10 h6" for="title">제목</label>
        <input class="form-control form-control-lg" type="text" id="title" name="title" placeholder="제목 입력하기" aria-label="default input example" required>
      </div>
      
      <div class="row pd24 gap-3 form-width-973">
        <div class="col-4 p-0">
          <p class="pd10 h6" for="">공지 기한</p>
          <select class="form-select form-select-lg" id="usedate" aria-label="Small select example">
          <option value="1"selected>제한</option>
          <option value="2">무제한</option>
          </select>
        </div>
        <div class="notice_up_regdate col-4 p-0 datepicker">
          <label class="pd10 h6" for="regdate">시작일</label>
          <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg">
        </div> 
        <!-- <div class="notice_up_enddate col p-0 datepicker">
          <label class="pd10 h6" for="duedate">만료일</label>
          <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg">
        </div> -->
      </div>

      <div class="pd24">
        <p class="pd10 h6" for="">내용</p>
        <textarea id="summernote" name="content"></textarea>
      </div>

      <div class="pd48">
        <label for="notice_img" class="form-label pd10 h6">이미지</label>
        <input class="form-control form-control-lg" id="notice_img" name="notice_img" type="file">
      </div>

      <div class="d-flex justify-content-end gap-3">
        <button type="submit" class="btn btn-primary">등록</button>
       <button type="button" class="btn btn-secondary" onclick="history.back(1)">취소</button></a>
      </div>
    </form>
</div>
  <!-- 최성희 notice_up 끝 -->
  
  <script>    
    $('#summernote').summernote({
      placeholder: 'Hello keep coding',
      tabsize: 2,
      height: 100
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