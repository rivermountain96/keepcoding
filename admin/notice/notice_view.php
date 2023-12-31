<?php
$title =  '공지 상세보기';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';

$bno = $_GET['idx'];
$sql = "SELECT * FROM notice where idx='{$bno}'";
$result = $mysqli -> query($sql);
$rs = $result -> fetch_object();


$hit = $rs->hit + 1;
$sql2 = "UPDATE notice set hit = {$hit} where idx='{$bno}'";
var_dump($sql2);
$result2 = $mysqli -> query($sql2);

?>

<!-- 최성희 notice_view 시작 -->
<div class="content notice_view">
  <h2 class="pd48 fs-4">공지 상세보기</h2>

  <div class="pd24">
  <hr class="pd24">

  <input type="hidden" name="idx" value="<?php echo $bno;?>">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">제목</h3>
        <div class="d-flex row">
          <p class="h6 col-5 p-0"><?= $rs -> title; ?></p>
          <p class="col-5">
          <?php $date = str_replace('-', '.', $rs -> regdate); echo $date?>
          </p>
        </div>
    </div>
  <hr class="pd24">
  <div class="pd24">
    <?php
      $query3="select * from notice where idx=".$bno;
      $result3 = $mysqli->query($query3);
      while($rs3 = $result3->fetch_object()){
      ?>
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <?php
        if($rs3 -> notice_img){
      ?>
        <img src="<?= $rs3 -> notice_img; ?>" alt="<?= $rs3 -> title; ?>">
      <?php
        }else{
      ?>
        <p>이미지 없음</p>
      <?php
        }}
      ?>
    </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">내용</h3>
      <?= $rs -> content; ?>
    </div>


  <hr class="pd48">
      <div class="d-flex justify-content-end gap-3">
        <a href="notice_change.php?idx=<?= $bno; ?>" class="btn btn-primary">수정</a>
        <a href="notice_del.php?idx=<?= $bno; ?>" id="delete" class="btn btn-secondary">삭제</a>
        <a href="notice_list.php" class="btn btn-primary">공지 리스트</a>
      </div>

    </div>

</div>
  <!-- 최성희 notice_view 끝 -->
  
  <script>    
    $('#summernote').summernote({
      placeholder: 'Hello keep coding',
      tabsize: 2,
      height: 100
    });

    let btn = document.querySelector('#delete');

  btn.addEventListener('click',(e)=>{
  e.preventDefault();
  if(confirm('삭제하시겠습니까?')){
    window.location = 'notice_del.php?idx=<?= $bno; ?>';
  }else{
    alert('취소되었습니다');
  }
});
  </script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>