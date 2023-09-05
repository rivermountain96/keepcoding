<?php
  $title =  '쿠폰 수정';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';


$cid = $_GET['cid'];

$sql = "SELECT * FROM coupons WHERE cid={$cid}";
$result = $mysqli -> query($sql);

while($rs = $result -> fetch_object()){
  $rsArr[]=$rs;
}
?>

<div class="content">
    <h2 class="fs-4 pd72">쿠폰 수정</h2>

    <form action="coupon_edit_ok.php" method="post" enctype="multipart/form-data">
      <div class="pd48 row">
        <?php
          foreach($rsArr as $item){
        ?>
        <input type="hidden" name="cid" id="cid" value="<?= $cid ?>">
        <div class="coupon_up_name col-8 p-0">
          <label for="" class="pd10 h6">쿠폰명</label>
          <input class="form-control form-control-lg" type="text" name="coupon_name" id="coupon_name" placeholder="쿠폰명을 입력하세요"
            aria-label="default input example" value="<?= $item->coupon_name?>">
        </div>
        <div class="coupon_up_status d-flex row col-4">
          <h3 class="pd10 h6">상태</h3>
          <div class="coupon_up_status_checkbox d-flex">
            <?php
              if($item->status == 0){
            ?>
              <div class="coupon_up_status_on form-check">
              <input class="coupon_up_status_input form-check-input" type="radio" value="1" name="status" id="status">
              <label class="form-check-lsabel" for="flexCheckDefault">활성화</label>
            </div>
            <div class="coupon_up_status_off form-check text-center">
              <input class="coupon_up_status_input form-check-input" type="radio" value="0" name="status" id="status" checked>
              <label class="form-check-label" for="flexCheckChecked">비활성화</label>
            </div>
            <?php
              }else{
            ?>
            <div class="coupon_up_status_on form-check">
              <input class="coupon_up_status_input form-check-input" type="radio" value="1" name="status" id="status" checked>
              <label class="form-check-lsabel" for="flexCheckDefault">활성화</label>
            </div>
            <div class="coupon_up_status_off form-check text-center">
              <input class="coupon_up_status_input form-check-input" type="radio" value="0" name="status" id="status">
              <label class="form-check-label" for="flexCheckChecked">비활성화</label>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>

      <div class="d-flex pd48 row gap-3 form-width-973">
        <div class="coupon_up_price col-4 p-0">
          <label class="pd10 h6" for="">할인가</label>
          <input class="form-control form-control-lg" type="number" name="coupon_price" id="coupon_price" min="1000" max="100000"
            step="1000" placeholder="" aria-label="default input example" value="<?= $item-> coupon_price?>">
        </div>

        <div class="coupon_up_min_price col-4 p-0">
          <label class="pd10 h6" for="">최소사용금액</label>
          <input class="form-control form-control-lg" type="number" name="use_min_price" id="use_min_price" min="1000" max="110000"
            step="1000" aria-label="default input example" value="<?= $item->	use_min_price?>">
        </div>
      </div>

        <div class="row justify-content-start pd48 gap-3">
          <div class="coupon_up_usedate col p-0">
            <h3 class="pd10 h6">사용기한</h3>
            <select class="form-select form-select-lg" id="usedate" aria-label="Small select example">
              <?php
                if($item->duedate == ''){
              ?>
              <option value="1">제한</option>
              <option value="2" selected>무제한</option>
              <?php
                }else{
              ?>
              <option value="1" selected>제한</option>
              <option value="2">무제한</option>
              <?php
                }
              ?>
            </select>
          </div>

        <?php
          if($item->duedate == ''){
        ?>
        <div class="coupon_up_regdate col p-0 datepicker">
          <label class="pd10 h6" for="regdate">시작일</label>
          <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg" required disabled>
        </div>

        <div class="coupon_up_enddate col p-0 datepicker">
          <label class="pd10 h6" for="duedate">만료일</label>
          <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg" required disabled>
        </div>
      </div>
      <?php
          }else{
      ?>
        <div class="coupon_up_regdate col p-0 datepicker">
          <label class="pd10 h6" for="regdate">시작일</label>
          <input type="text" id="datepicker" name="regdate" class="form-control form-control-lg" required>
        </div>

        <div class="coupon_up_enddate col p-0 datepicker">
          <label class="pd10 h6" for="duedate">만료일</label>
          <input type="text" id="datepicker2" name="duedate" class="form-control form-control-lg" required>
        </div>
      </div>
    <?php
        }
    ?>

      <div class="pd48">
        <div class="coupon_up_image">
          <div class="row pd48">
            <div class="col-4">
              <h6 class="pd10">기존 이미지</h6>
              <div class="img_container">
                <img src="<?= $item-> coupon_image ?>" alt="">
                <input type="hidden" name="origin_image" id="origin_image" value="<?= $item-> coupon_image ?>">
              </div>
            </div>
            <div class="col-8">
              <h6 class="pd10">기존 이미지 경로</h6>
              <p class="path_container"><?= $item-> coupon_image ?></p>
            </div>
          </div>
          <label class="pd10 h6" for="coupon_image" class="form-label">이미지 수정</label>
          <input class="form-control form-control-lg form-control form-control-lg mb-5" name="coupon_image" id="coupon_image" type="file">
      </div>
      </div>
      <?php
        }
      ?>
      <div class="coupon_up_btn d-flex justify-content-end gap-3 p-0">
        <button type="submit" class="btn btn-primary">수정</button>
        <a href="/keepcoding/admin/coupon/coupon_list.php" class="btn btn-secondary">취소</a>
    </div>

    </form>
  </div>

    </form>
  </div>
  <!-- 정이원 coupon_up 끝 -->


<script>
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

    let val = ($('#usedate').val());
    if(val == 2){
      $("#datepicker").datepicker("option", {disabled:true, dateFormat: ''});
      $("#datepicker2").datepicker("option", {disabled:true, dateFormat: ''});
    }

    let usedate = $('#usedate');
    usedate.change(function(){
      let value = usedate.val();
      if(value == 2){
        $("#datepicker").datepicker("option", {disabled:true, dateFormat: ''});
        $("#datepicker2").datepicker("option", {disabled:true, dateFormat: ''});
      }else{
        $("#datepicker").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
        $("#datepicker2").datepicker("option", {disabled:false, dateFormat: 'yy.mm.dd'});
      }
    })

    console.log($('#coupon_image').val());
</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>