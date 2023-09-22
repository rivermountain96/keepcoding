<?php
  $title = '마이페이지';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

  if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
  } else{
    $userid = '';
  }

  $sql = "SELECT * FROM members WHERE 1=1";
  $result = $mysqli->query($sql);

  if ($result) {
    $rs = $result->fetch_object();
    $useremail = $rs->useremail;
  } else {
    echo "쿼리 실행 오류: " . $mysqli->error;
  }

  $sql2 = "SELECT uc.ucid, c.status, c.coupon_name, c.coupon_price, c.coupon_image
  FROM user_coupons uc
  JOIN coupons c ON c.cid = uc.couponid
  WHERE uc.status = 1 AND uc.duedate >= NOW() AND uc.userid='{$userid}'";


  $ucresult = $mysqli -> query($sql2);
  while($urs = $ucresult -> fetch_object()){
      $ucArr[] = $urs;
  }

?>

  <!-- myproduct_list 시작 -->
  <section class="container myproduct_list d-flex justify-content-between">
    <div class="myproduct_list_my col-3">
      <h2 class="h4 myproduct_list_id"><span><?= $userid;?></span>님</h2>
      <p class="myproduct_list_main"><span><?= $useremail;?></span></p>
      <ul>
        <li class="h6"><a class="mc-gray1" href="/keepcoding/main/mypage/myproduct_list.php">나의 강의</a></li>
        <li class="h6"><a class="mc-gray1" href="/keepcoding/main/mypage/mycoupon_list.php">나의 쿠폰</a></li>
      </ul>
    </div> 

    <div class="myproduct_list_list col-9">
      <h2 class="h4">나의 쿠폰</h2>
      <div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search">
          <button class="btn btn-primary col-1 h6" type="submit">검색</button>
        </form>
      </div>

      <div class="d-flex row">
        <?php
          if(isset($ucArr)){
          foreach($ucArr as $uc){

          $couponRegdate = $uc -> regdate;
          $couponDuedate = $uc -> sale_end_date;
          $couponStatus = $uc -> status;
          $couponImg = $uc -> coupon_image;
          $couponName = $uc -> coupon_name;
          
          if($couponDuedate == NULL){
            $couponResult = '무제한';
          } else {
            $couponResult = $couponRegdate.' ~ '.$couponDuedate;
          }
          
          if($couponStatus == 1){
            $couponStatus = '사용 가능';
          } else {
            $couponStatus = '사용 불가';
          }
        ?>
        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="<?= $couponImg;?>" alt="<?= $couponName;?>" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6"><?= $couponName; ?></h3>
                  <p class="mc-gray4"><?= $couponStatus ;?></p>
                  <p><?= $coupontResult ;?></p>
                <p class="">₩<span class="number"><?= $uc-> coupon_price; ?></span></p>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
        ?>
      </div>

      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation" class="col-11">
          <ul class="pagination justify-content-center align-items-center ">
          <?php
              // 쿠폰 개수 가져오기
              $userCouponCountSql = "SELECT COUNT(*) as coupon_count FROM user_coupons WHERE userid = '{$userid}'";
              $userCouponCountResult = $mysqli->query($userCouponCountSql);
              $userCouponCountRow = $userCouponCountResult->fetch_assoc();
              $userCouponCount = $userCouponCountRow['coupon_count'];

              // 페이지당 보여줄 쿠폰 개수와 페이지 번호 설정
              $pageCount = 10; // 페이지당 보여줄 쿠폰 개수
              $pageNumber = $_GET['pageNumber'] ?? 1;

              // 페이지 수 계산
              $totalPages = ceil($userCouponCount / $pageCount);

              // 페이지네이션 코드 수정
              echo '<ul class="pagination justify-content-center align-items-center">';
              if ($pageNumber > 1) {
                  echo '<li class="page-item"><a class="page-link" href="?pageNumber=1">처음</a></li>';
                  echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . ($pageNumber - 1) . '">이전</a></li>';
              }

              for ($i = 1; $i <= $totalPages; $i++) {
                  if ($i == $pageNumber) {
                      echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                  } else {
                      echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . $i . '">' . $i . '</a></li>';
                  }
              }

              if ($pageNumber < $totalPages) {
                  echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . ($pageNumber + 1) . '">다음</a></li>';
                  echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . $totalPages . '">마지막</a></li>';
              }
              echo '</ul>';
            ?>
          </ul>
        </nav>
      </div>

    </div>
  </section>
  <!-- myproduct_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>