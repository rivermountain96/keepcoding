<?php
  $title = '마이페이지';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

if(isset($_SESSION['UID'])){
  $userid = $_SESSION['UID'];
} else{
  $userid = '';
}
?>

  <!-- myproduct_list 시작 -->
  <section class="container myproduct_list d-flex justify-content-between">
    <div class="myproduct_list_my col-3">
      <h2 class="h4 myproduct_list_id"><span><?= $userid;?></span>님</h2>
      <p class="myproduct_list_main"><span>id@email.net</span></p>
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

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon01.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">회원가입 축하쿠폰</h3>
                  <p class="mc-gray4">강의 수강 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩10,000 </p>
              </div>
            </div>
          </div>
        </div>

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon03.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">할인쿠폰</h3>
                  <p class="mc-gray4">10만원 이상 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩20,000 </p>
              </div>
            </div>
          </div>
        </div>

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon04.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">첫 강의 신청 할인 쿠폰</h3>
                  <p class="mc-gray4">2만원 이상 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩5,000 </p>
              </div>
            </div>
          </div>
        </div>

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon01.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">회원가입 축하쿠폰</h3>
                  <p class="mc-gray4">강의 수강 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩10,000 </p>
              </div>
            </div>
          </div>
        </div>

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon02.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">여름방학 할인 쿠폰</h3>
                  <p class="mc-gray4">2만원 이상 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩10,000 </p>
              </div>
            </div>
          </div>
        </div>

        <div class="cart col-6">
          <div class="cart_card shadow-sm mcbg-white d-flex">
            <div class="d-flex gap-4 mycoupon_list">
              <img src="../../admin/img/coupon04.svg" alt="cart img" class="shadow-sm col">
              <div class="cart_info d-flex flex-column justify-content-between col-8">
                  <h3 class="h6">첫 강의 신청 할인 쿠폰</h3>
                  <p class="mc-gray4">강의 수강 신청 시 사용 가능</p>
                  <p>무제한</p>
                <p class="">₩5,000 </p>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#none">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#none">1</a></li>
            <li class="page-item"><a class="page-link" href="#none">2</a></li>
            <li class="page-item"><a class="page-link" href="#none">3</a></li>
            <li class="page-item"><a class="page-link" href="#none">Next</a></li>
          </ul>
        </nav>
      </div>

    </div>
  </section>
  <!-- myproduct_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>