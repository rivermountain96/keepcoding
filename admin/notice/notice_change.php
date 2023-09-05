<?php
  $title =  '공지 수정';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 notice_change 시작 -->
<div class="content notice_change">
  <h2 class="pd72 fs-4">공지 수정</h2>
    <form class="pd48" action="#.php" id="notice_change_submit">
      <div class="pd24">
        <label class="pd10 h6" for="notice_title">제목</label>
        <input class="form-control form-control-lg" id="notice_title" type="text" value="에디터가 만들어가는 헬로 킵콘 이야기" aria-label="default input example">
      </div>
      
      <div class="row pd24 gap-3">
        <div class="col p-0">
          <p class="pd10 h6">공지 기한</p>
          <select class="form-select form-select-lg" aria-label="Small select example">
          <option value="1" selected>제한</option>
          <option value="2">무제한</option>
          </select>
        </div>
        <div class="notice_change_regdate col p-0 datepicker">
          <label class="pd10 h6" for="datepicker_start">시작일</label>
          <input type="text" id="datepicker_start" name="datepicker" class="form-control form-control-lg" value="2023.09.09">
        </div> 
        <div class="notice_change_enddate col p-0 datepicker">
          <label class="pd10 h6" for="datepicker_end">만료일</label>
          <input type="text" id="datepicker_end" name="datepicker" class="form-control form-control-lg" value="2023.09.09">
        </div>
      </div>

      <div class="pd24">
        <p class="pd10 h6">내용</p>
        <div id="summernote">
          <br>
          <h1>1. 에디터가 만들어가는 헬로 킵콘 이야기 🙆‍♀️</h1>  
          <br> 이번 호에서는 헬로 킵콘이 지금까지 달려온 1년간의 시간을 돌아보며, 헬로 킵콘을 만드는 5명의 에디터의 이야기를 담아봤어요.
        </div>
      </div>

      <div class="pd48">
        <label for="formFile" class="form-label pd10 h6">이미지</label>
        <input class="form-control form-control-lg form-control form-control-lg" id="formFile" type="file">
      </div>

      <div class="d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-primary" form="notice_change_submit">수정</button>
        <button type="button" class="btn btn-secondary" onClick="location.href='notice_list.php'">취소</button>
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
    $("#datepicker_start").datepicker({
      dateFormat:'yy.mm.dd'
    });
    $("#datepicker_end").datepicker({
      dateFormat:'yy.mm.dd'
    });
  </script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>

