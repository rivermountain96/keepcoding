<?php
  $title = '장바구니';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/admin_check.php';

// $where = '';

// if(isset($_SESSION['UID'])){
//     $where = " c.userid = '{$_SESSION['UID']}' ";
// } else {
//     $where = " c.userid = '' ";
// }

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

$ucresult = $mysqli -> query($sql2);
while($urs = $ucresult -> fetch_object()){
    $ucArr[] = $urs;
}

// 사용자의 cartid를 데이터베이스에서 조회합니다.
$cartsql = "SELECT cartid FROM cart WHERE userid = '{$userid}'";
$cartresult = $mysqli->query($cartsql);

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
        <div class="noCart">
          <div class="d-flex justify-content-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M60 5.625C60 5.12772 59.8025 4.65081 59.4508 4.29917C59.0992 3.94754 58.6223 3.75 58.125 3.75H52.5C52.0818 3.75012 51.6756 3.89007 51.346 4.14759C51.0165 4.40512 50.7825 4.76544 50.6812 5.17125L49.1625 11.25H5.625C5.34968 11.2503 5.07781 11.3111 4.82868 11.4283C4.57955 11.5455 4.35928 11.7161 4.18352 11.928C4.00777 12.1399 3.88083 12.3879 3.81174 12.6544C3.74265 12.9209 3.73309 13.1994 3.78375 13.47L9.40875 43.47C9.48918 43.8997 9.7172 44.2877 10.0534 44.5671C10.3896 44.8465 10.8129 44.9996 11.25 45H45C45.4371 44.9996 45.8604 44.8465 46.1966 44.5671C46.5328 44.2877 46.7608 43.8997 46.8412 43.47L52.4625 13.5263L53.9625 7.5H58.125C58.6223 7.5 59.0992 7.30246 59.4508 6.95083C59.8025 6.59919 60 6.12228 60 5.625ZM48.3675 15L43.4437 41.25H12.8062L7.8825 15H48.3675ZM41.25 45C43.2391 45 45.1468 45.7902 46.5533 47.1967C47.9598 48.6032 48.75 50.5109 48.75 52.5C48.75 54.4891 47.9598 56.3968 46.5533 57.8033C45.1468 59.2098 43.2391 60 41.25 60C39.2609 60 37.3532 59.2098 35.9467 57.8033C34.5402 56.3968 33.75 54.4891 33.75 52.5C33.75 50.5109 34.5402 48.6032 35.9467 47.1967C37.3532 45.7902 39.2609 45 41.25 45ZM15 45C16.9891 45 18.8968 45.7902 20.3033 47.1967C21.7098 48.6032 22.5 50.5109 22.5 52.5C22.5 54.4891 21.7098 56.3968 20.3033 57.8033C18.8968 59.2098 16.9891 60 15 60C13.0109 60 11.1032 59.2098 9.6967 57.8033C8.29017 56.3968 7.5 54.4891 7.5 52.5C7.5 50.5109 8.29017 48.6032 9.6967 47.1967C11.1032 45.7902 13.0109 45 15 45ZM41.25 48.75C42.2446 48.75 43.1984 49.1451 43.9016 49.8484C44.6049 50.5516 45 51.5054 45 52.5C45 53.4946 44.6049 54.4484 43.9016 55.1516C43.1984 55.8549 42.2446 56.25 41.25 56.25C40.2554 56.25 39.3016 55.8549 38.5983 55.1516C37.8951 54.4484 37.5 53.4946 37.5 52.5C37.5 51.5054 37.8951 50.5516 38.5983 49.8484C39.3016 49.1451 40.2554 48.75 41.25 48.75ZM15 48.75C15.9946 48.75 16.9484 49.1451 17.6516 49.8484C18.3549 50.5516 18.75 51.5054 18.75 52.5C18.75 53.4946 18.3549 54.4484 17.6516 55.1516C16.9484 55.8549 15.9946 56.25 15 56.25C14.0054 56.25 13.0516 55.8549 12.3483 55.1516C11.6451 54.4484 11.25 53.4946 11.25 52.5C11.25 51.5054 11.6451 50.5516 12.3483 49.8484C13.0516 49.1451 14.0054 48.75 15 48.75Z" fill="#495057"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M35.0781 21.1724C34.9039 20.9978 34.697 20.8593 34.4692 20.7648C34.2414 20.6702 33.9972 20.6216 33.7506 20.6216C33.5039 20.6216 33.2597 20.6702 33.0319 20.7648C32.8041 20.8593 32.5972 20.9978 32.4231 21.1724L28.1256 25.4737L23.8281 21.1724C23.476 20.8204 22.9985 20.6226 22.5006 20.6226C22.0026 20.6226 21.5251 20.8204 21.1731 21.1724C20.821 21.5245 20.6232 22.002 20.6232 22.4999C20.6232 22.9978 20.821 23.4754 21.1731 23.8274L25.4743 28.1249L21.1731 32.4224C20.821 32.7745 20.6232 33.252 20.6232 33.7499C20.6232 34.2478 20.821 34.7254 21.1731 35.0774C21.5251 35.4295 22.0026 35.6273 22.5006 35.6273C22.9985 35.6273 23.476 35.4295 23.8281 35.0774L28.1256 30.7762L32.4231 35.0774C32.5974 35.2518 32.8043 35.39 33.0321 35.4844C33.2599 35.5787 33.504 35.6273 33.7506 35.6273C33.9971 35.6273 34.2412 35.5787 34.469 35.4844C34.6968 35.39 34.9037 35.2518 35.0781 35.0774C35.2524 34.9031 35.3907 34.6961 35.485 34.4684C35.5794 34.2406 35.6279 33.9965 35.6279 33.7499C35.6279 33.5034 35.5794 33.2593 35.485 33.0315C35.3907 32.8037 35.2524 32.5968 35.0781 32.4224L30.7768 28.1249L35.0781 23.8274C35.2527 23.6533 35.3912 23.4464 35.4857 23.2186C35.5803 22.9908 35.6289 22.7466 35.6289 22.4999C35.6289 22.2533 35.5803 22.0091 35.4857 21.7813C35.3912 21.5535 35.2527 21.3466 35.0781 21.1724Z" fill="#495057"/>
          </svg>
          </div>  

          <p class="noCart_tt fw-medium text-center mc-gray3">장바구니에 담긴 강의가 없습니다</p>

          <div class="productlistBtn d-flex justify-content-center">
            <button class="btn btn-primary h6" onclick="location.href='/keepcoding/main/product/product_shop_list.php';">강의 둘러보기</button>
          </div>
        </div>
        
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
          if(isset($ucArr)){
          foreach($ucArr as $uc){
          ?>
          <option value="<?= $uc -> ucid; ?>" data-price="<?= $uc-> coupon_price; ?>"><?= $uc -> coupon_name; ?></option>
          <?php
            }
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
  let ucid = '';
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
    
    // 장바구니에 담긴 상품이 없을 경우
    let databaseResult = <?php echo $cartresult->num_rows; ?>;
    console.log(databaseResult);
    if (databaseResult === 0) {
    alert('장바구니에 담긴 강의가 없습니다');
    } else {
    if (confirm('결제를 진행하시겠습니까?')){
    let userid = '<?= $_SESSION['UID']; ?>';

    let data = {
      ucid : ucid,
      userid : userid,
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
  } 
});



</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>
