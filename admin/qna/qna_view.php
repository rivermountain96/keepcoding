<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  $qid = $_GET['qid'];

  $sql = "SELECT * FROM qna WHERE qid='{$qid}'";
  $result = $mysqli->query($sql);
  $rs = $result->fetch_object();

  if ($rs) {
      $views = $rs->views + 1; // 조회수 증가시키기

      $sql2 = "UPDATE qna SET views = '{$views}' WHERE qid='{$qid}'";
      $result2 = $mysqli->query($sql2);
  }
?>

<!-- 이강산 qna_view 시작 -->
<div class="content qna_view">
  <h2 class="pd48 fs-4">Q&amp;A 상세보기</h2>
  <div class="pd24">
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">제목</h3>
        <div class="d-flex row">
          <p class="h6 col-5 p-0"><?= $rs->qna_title;?></p>
          <p class="col-5"><?= date("Y.m.d") ;?></p>
        </div>
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <img src="/keepcoding/admin/img/qna_qna.png" alt="">
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">내용</h3>
      <p class="lh-base">
        <?= $rs->qna_content ;?>
      </p>
    </div>
  <hr class="pd48">
      <div class="d-flex justify-content-end gap-3">
        <button type="button" class="btn btn-secondary qna_view_del">삭제</button>
        <button type="button" class="btn btn-primary" onClick="location.href='qna_list.php'">Q&amp;A 게시판</button>
      </div>
    </div>
</div>
  <!-- 이강산 qna_view 끝 -->
  
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>