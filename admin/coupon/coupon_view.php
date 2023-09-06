<?php
  $title =  '쿠폰 상세보기';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  $cid = $_GET['cid'];

  $sql = "SELECT * FROM coupons WHERE cid = {$cid};";

  $result = $mysqli->query($sql);
  if(isset($result)){
    while($rs = $result -> fetch_object()){
      $rsArr[]=$rs;
    }
  }
?>

<!-- 이은서 coupon_view 시작 -->
<div class="content coupon_view">
  <h2 class="pd48 fs-4">쿠폰 상세보기</h2>
  <hr class="pd24">
  <?php
    foreach($rsArr as $item){
  ?>
  <div class="row pd24 form-width-973">
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">쿠폰명</h3>
      <p class="h6"><?= $item-> coupon_name ?></p>
    </div>
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">상태</h3>
      <p>
      <?php
        if($item-> status == 1){
          echo '활성화';
        }else{
          echo '비활성화';
        }
      ?>
      </p>
    </div>
  </div>
  <hr class="pd24">
  
  <div class="row pd24 form-width-973">
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">할인가</h3>
      <p>₩<span class="number"><?= $item-> coupon_price ?></span></p>
    </div>
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">최소사용금액</h3>
      <p>₩<span class="number"><?= $item-> use_min_price ?></span></p>
    </div>
  </div>
  <hr class="pd24">

  <div class="row pd24 form-width-973">
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">사용기한</h3>
      <p>
        <?php
          if($item-> duedate == ''){
            echo '무제한';
          }else{
            echo '기간제한';
          }
        ?>
      </p>
    </div>
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">시작일</h3>
      <p>
        <?php
          $regResult = str_replace("-",".",$item->regdate);
          echo $regResult;
        ?>
      </p>
    </div>
    <div class="col-4 p-0">
      <h3 class="pd24 h6 text-secondary">만료일</h3>
      <p>
        <?php
          if($item-> duedate == ''){
            echo '무제한';
          }else{
            $dateResult = str_replace("-",".",$item->duedate);
            echo $dateResult;
          }
        ?>
      </p>
    </div>
  </div>
  <hr class="pd24">
    <div class="pd24">
      <h3 class="pd24 h6 text-secondary">이미지</h3>
      <img src="<?= $item-> coupon_image ?>" alt="">
    </div>
  <?php
    }
  ?>
  <hr class="pd48">
    <div class="d-flex justify-content-end gap-3">
      <button type="button" class="btn btn-primary" onClick="location.href='coupon_edit.php?cid=<?= $cid ?>'">수정</button>
      <button type="button" class="btn btn-secondary delete_btn" data-cid="<?= $cid ?>">삭제</button>
      <button type="button" class="btn btn-primary" onClick="location.href='coupon_list.php'">쿠폰 리스트</button>
    </div>
</div>
<!-- 이은서 coupon_view 끝 -->

<script>
  $('.delete_btn').click(function(){
    if(confirm('정말 삭제하시겠습니까?')){
      let cid = $(this).attr('data-cid');
      let data = {cid : cid}
      console.log(data);
      $.ajax({
        async:false,
        type:'POST',
        url:'coupon_delete.php',
        data: data,
        dataType:'json',
        error:function(error){
            console.log(error);
        },
        success:function(data){
          if(data.result == 'ok'){
              alert('삭제 완료');
              location.href='/keepcoding/admin/coupon/coupon_list.php';
          } else{
              alert('삭제 취소');}
        }
    });

    } else{// 삭제하시겠습니까 예를 누르면 할일 / 아니오를 누르면 할일
      alert('삭제 취소');
    }
    });//delete btn을 클릭하면 할일
</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>