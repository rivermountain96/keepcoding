<?php
  $title = '장바구니';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
} else{
  $userid = '';
}

// $userid = $_SESSION['UID'];

$sql = "SELECT p.pid, p.thumbnail, p.name, p.price, p.sale_end_date, c.cartid, c.regdate
from products p
join cart c
on p.pid = c.pid
where c.userid = '{$userid}' ";

// var_dump($sql);
$result = $mysqli -> query($sql);
while($rs = $result -> fetch_object()){
    $rsArr[] = $rs;
}

$sql2 = "SELECT uc.ucid, c.coupon_name, c.coupon_price
from user_coupons uc
join coupons c
on c.cid = uc.couponid
where c.status = 1 and uc.status = 1 and uc.duedate >= now() and uc.userid='{$userid}'";
// var_dump($sql2);

$ucresult = $mysqli -> query($sql2);
while($urs = $ucresult -> fetch_object()){
    $ucArr[] = $urs;
}
?>

  <!-- cart_section 시작 -->
  <section class="container cart_section">
    <div class="d-flex justify-content-between cart_section_title">
      <h2 class="h4">장바구니</h2>
      <p class="fs-6"><a href="#" class="mc-gray1 cart_all_trash">전체 삭제 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
        </svg>
      </a></p>
    </div>

    <!-- 장바구니에 담긴 상품이 없을 때 -->
    <!-- <div class="noCart d-flex justify-content-center">
      <h5 class="fw-normal">장바구니에 담긴 상품이 없습니다</h5>
    <div> -->

    <div class="cart">
      <?php
      if(isset($rsArr)){
        foreach($rsArr as $item){
          $pid = $item->pid;

          $sql3 = "SELECT * FROM products WHERE pid = $pid";
          $cateresult = $mysqli -> query($sql3);
          while($rs3 = $cateresult -> fetch_object()){
            $rsArr3[] = $rs3;
          }

          foreach($rsArr3 as $item3){
            $cate = $item3->cate;
            $ecate = explode('/', $cate);
            $big = $ecate[0]; // 대분류
            $mid = $ecate[1]; // 중분류
            $sm = $item3->level;

            $sql4 = "SELECT * FROM category WHERE cid=$big";
            $result4 = $mysqli -> query($sql4);
            while($rs4 = $result4 -> fetch_object()){
              $rsArr4[] = $rs4;
            }
            foreach($rsArr4 as $item4){
                $bigCate = $item4->name;
            }

            $sql5 = "SELECT * FROM category WHERE cid=$mid";
            $result5 = $mysqli -> query($sql5);
            while($rs5 = $result5 -> fetch_object()){
              $rsArr5[] = $rs5;
            }
            foreach($rsArr5 as $item5){
                $midCate = $item5->name;
            }
          }
      ?>
      <div class="cart_card shadow-sm mcbg-white w-100 d-flex justify-content-between" data-id="<?= $item -> cartid; ?>">
        <div class="d-flex gap-4">
          <img src="<?= $item -> thumbnail; ?>" alt="cart img" class="shadow-sm">
          <div class="cart_info d-flex flex-column justify-content-between">
            <div class="cart_about d-flex flex-column gap-1">
              <h3 class="h5"><a href="/keepcoding/main/product/product_shop_details.php?pid=<?= $item->pid?>" class="mc-gray1"><?= $item -> name; ?></a></h3><br>              
              <p class="mc-gray4">
                <?= $bigCate.'>'.$midCate.'>'.$sm; ?>
              </p>
            </div>
            <p class="d-flex gap-1">
              <span>수강기한</span>
              <span class="pc2">

              <?php 
              $cartRegdate = $item -> regdate;
              $cartDuedate = $item -> sale_end_date;
              
              if($cartDuedate == NULL){
                $cartResult = '무제한';
              } else {
                $cartResult = $cartRegdate.' ~ '.$cartDuedate;
              }
              echo $cartResult;
              ?>

              </span>
            </p>
          </div>
        </div>
        <div class="d-flex flex-column justify-content-between align-items-end">
          <h5 class="cart_price">₩<span class="number"><?= $item -> price; ?></span></h5>
          <a href="" class="cart_trash mc-gray1">삭제
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
            </svg>
          </a>
        </div>
      </div>

      <?php
        }
      } else {
      ?>
          <p class="noCart text-center mc-gray3">장바구니에 담긴 강의가 없습니다</p>
      <?php
      }
      ?>
    </div>

    <div class="container d-flex justify-content-between g-0">
      <div class="cart_section_select col-4">
        <h4 class="h6">쿠폰선택</h4>
        <select class="form-select form-select-lg mb-3 fs-6 p-3 shadow-sm" aria-label="Large select example" id="cartCoupon" name="cartCoupon">
          <option value="" disabled selected>쿠폰선택</option>

          <?php
          foreach($ucArr as $uc){
          ?>
          <option value="<?= $uc -> ucid; ?>" data-price="<?= $uc-> coupon_price; ?>"><?= $uc -> coupon_name; ?></option>
          <!-- <option value="2">쿠폰 Two</option>
          <option value="3">쿠폰 Three</option> -->
          <?php
          }
          ?>
        </select>
      </div>

      <div class="cart_section_calc d-flex justify-content-end col-8">
        <div class="shadow-sm col-6">
          <ul class="d-flex justify-content-between">
            <li>전체상품금액</li>
            <li>₩ <span class="subtotal"></span></li>
          </ul>
          <ul class="d-flex justify-content-between">
            <li>할인예상금액</li>
            <li><span>- ₩ </span><span class="discount">0</span></li>
          </ul>
          <ul class="h4 d-flex justify-content-between">
            <li>결제금액</li>
            <li>₩ <span class="grandtotal"></span></li>
          </ul>
          <button type="submit" class="karl-checkout-btn btn btn-primary btn-lg col-12 fs-6 p-3 h6">결제하기</button>
        </div>

      </div>
    </div>
  </section>
  <!-- cart 끝 -->
  
  <script>
  // 강의 결제하기
  let cartItem = $('.cart_card');

  function cartClac(){
      let subtotal = 0;
      cartItem.each(function(){
        let unitprice = Number($(this).find('.cart_price span').text());
       subtotal = subtotal + unitprice;
        // cartPirce.text(itemtotal);
        // console.log(unitprice);
        });
        // console.log(subtotal);
        $('.subtotal').text(subtotal);
        $('.grandtotal').text(subtotal);
  }
  cartClac();

// 장바구니 삭제
  $('.cart_trash').click(function(){

    let cartid = $(this).parents('.cart_card').attr('data-id');

    if(confirm('해당 강의를 장바구니에서 삭제하시겠습니까?')){
          // 확인
          let data = {
              cartid : cartid
          }

    $.ajax({
        async: false,
        type: 'post',
        url: 'cart_delete.php',
        data: data,
        dataType: 'json',
        error: function(error){
            console.log(error);
        },
        success: function(data){
            if(data.result == 'ok'){
                alert('삭제 완료');
                location.reload();
            } else {
                alert('삭제 실패');
            } 
        }
          });

          }else{
            alert('삭제 취소');
          }
});

// 장바구니 전체 삭제
$('.cart_all_trash').click(function(e){
  e.preventDefault();
  // console.log('전체삭제');
  let userid = '<?php echo $userid; ?>';
  
  if(confirm('장바구니에 담긴 강의를 전체 삭제하시겠습니까?')){
          // 확인
          let data = {
            userid : userid
          }

          $.ajax({
        async: false,
        type: 'post',
        url: 'cart_all_delete.php',
        data: data,
        dataType: 'json',
        error: function(error){
            console.log(error);
        },
        success: function(data){
            if(data.result == 'ok'){
                alert('삭제 완료');
                location.reload();
            } else {
                alert('삭제 실패');
            } 
        }
          });

          }else{
            alert('삭제 취소');
          }
});

  // 쿠폰을 이용하여 할인 결제하기
  let ucid;
    $('#cartCoupon').change(function(){
      let discount = Number($('#cartCoupon option:selected').attr('data-price'));
      let subtotal = Number($('.subtotal').text());
      ucid = Number($('#cartCoupon option:selected').val());

      $('.discount').text(discount);
      $('.grandtotal').text(subtotal - discount);
    });

// 결제하기 버튼 클릭 시
$('.karl-checkout-btn').click(function(e){
  e.preventDefault();
  if(confirm('결제를 진행하시겠습니까?')){
    let userid = '<?= $_SESSION['UID']; ?>';

    let data = {
      ucid : ucid,
      userid : userid
    }

    $.ajax({
        async: false,
        type: 'post',
        url: 'cart_payment.php',
        data: data,
        dataType: 'json',
        error: function(error){
            console.log(error);
        },
        success: function(data){
            if(data.result == 'ok'){
                alert('결제 완료');
                location.href = '/keepcoding/main/index.php';
            } else {
                alert('결제 실패');
                location.reload();
            } 
        }
      });

  }
});

</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>
