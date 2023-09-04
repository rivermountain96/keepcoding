<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 notice_view 시작 -->
<div class="content notice_view">
  <h2 class="pd48 fs-4">공지 상세보기</h2>
  <div class="pd24">
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">제목</h3>
        <div class="d-flex row">
          <p class="h6 col-5 p-0">에디터가 만들어가는 헬로 킵콘 이야기</p>
          <p class="col-5">2023.09.09 ~ 2024.09.09</p>
        </div>
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <img src="/keepcoding/admin/img/notice_view_smile.png" alt="">
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">내용</h3>
      <h1>1. 에디터가 만들어가는 헬로 킵콘 이야기 🙆‍♀️</h1>  
      <br> 이번 호에서는 헬로 킵콘이 지금까지 달려온 1년간의 시간을 돌아보며, 헬로 킵콘을 만드는 5명의 에디터의 이야기를 담아봤어요.
    </div>
  <hr class="pd48">
      <div class="d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-primary" onClick="location.href='notice_change.php'">수정</button>
        <button type="button" class="btn btn-secondary">삭제</button>
        <button type="button" class="btn btn-primary" onClick="location.href='notice_list.php'">공지 리스트</button>
      </div>
    </div>
</div>
  <!-- 최성희 notice_view 끝 -->
  
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>