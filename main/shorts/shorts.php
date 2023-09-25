<?php
  $title =  '강의 탐색';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';
?>

  <section class="sectoin_shorts_01">
    <div class="shorts_svg_wrap container">
      <p class="h3 mc-white mb-2">Try everything</p>
      <h2 class="mb-4"><img src="../img/what'sShorts.svg" alt="킵코딩숏츠"></h2>
      <button class="btn btn-lg btn-primary h4 fs-3 p-3 pe-4 ps-4" onClick="location.href='/keepcoding/main/product/product_shop_list.php?category=48'">모든 숏강의는 결제없이 바로 무료수강</button>
    </div>
  </section>

  <section class="sectoin_shorts_02 container text-center">
    <h2 class="h2 pb-3">왜 킵코딩 숏강의를 선택해야 할까요?</h2>
    <p class="h5 pb-5">킵코딩 숏강의는 단순 취미, 직장인, 비전공자들도 입문하기 쉬운 강의입니다.</p>
      <div class="d-flex justify-content-between gap-4">
        <div>
          <img src="../img/shorts_why01.svg" alt="쇼츠이미지" class="shadow mb-4">
          <p class="h4">빠르게 습득 가능한 강의</p>
        </div>
        <div>
          <img src="../img/shorts_why02.svg" alt="최대 3분" class="shadow mb-4" >
          <p class="h4">짧고 재미있는 강의</p>
        </div>
        <div>
          <img src="../img/shorts_why03.svg" alt="Keep Going!" class="shadow mb-4">
          <p class="h4">포기하지 않게 만드는 강의</p>
        </div>
      </div>
  </section>

  <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>

