<?php
  $title =  'Q&A 상세보기';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 qna_view 시작 -->
<div class="content qna_view">
  <h2 class="pd48 fs-4">Q&amp;A 상세보기</h2>
  <div class="pd24">
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">제목</h3>
        <div class="d-flex row">
          <p class="h6 col-5 p-0">section04 - 각각의 객체에 개별 애니메이션 적용하기</p>
          <p class="col-5">09/09/2023</p>
        </div>
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <img src="../img/qna_qna.png" alt="">
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">내용</h3>
      <p class="lh-base">선생님 안녕하세요 !<br>
      강의를 듣는 중 궁금한 점이 있어 질의 드립니다.<br>
      section04 - 각각의 객체에 개별 애니메이션 적용하기 영상에서<br>
      let bar를 for문 밖에 선언하고 for문 안에서 document.createElement를 할당한 이유가 있을까요?<br>
      for문 안에 같이 선언하면서 할당하는 코드와 어떤 부분이 다른지 잘 모르겠어서 질의 드립니다.
      </p>
    </div>
  <hr class="pd48">
      <div class="d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-secondary">삭제</button>
        <button type="button" class="btn btn-primary" onClick="location.href='qna_list.php'">Q&amp;A 게시판</button>
      </div>
    </div>
</div>
<!-- 최성희 qna_view 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>