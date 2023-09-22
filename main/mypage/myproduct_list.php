<?php
  session_start(); 
  $title = '마이페이지';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

  if(isset($_SESSION['UID'])){
    $userid = $_SESSION['UID'];
  } else{
    $userid = '';
  }

  $sql = "SELECT * FROM members WHERE 1=1" ;
  $result = $mysqli->query($sql);

  if ($result) {
    $rs = $result->fetch_object();
    $useremail = $rs->useremail;
  } else {
    echo "쿼리 실행 오류: " . $mysqli->error;
  }


?>

  <!-- myproduct_list 시작 -->
  <section class="container myproduct_list d-flex justify-content-between">
    <div class="myproduct_list_my col-3">
      <h2 class="h4 myproduct_list_id"><span><?= $userid;?></span>님</h2>
      <p class="myproduct_list_main"><span></span><?= $useremail;?></p>
      <ul>
        <li class="h6"><a class="mc-gray1" href="/keepcoding/main/mypage/myproduct_list.php">나의 강의</a></li>
        <li class="h6"><a class="mc-gray1" href="/keepcoding/main/mypage/mycoupon_list.php">나의 쿠폰</a></li>
      </ul>
    </div> 
    
    <div class="myproduct_list_list col-9">
      <h2 class="h4">나의 강의</h2>
      <div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search">
          <button class="btn btn-primary col-1 h6" type="submit">검색</button>
        </form>
      </div>

      <div>
        <!-- 사용자가 담은 강의 정보를 출력 -->
        <?php
          // 페이지 설정
          $pageCount = 5; // 페이지당 보여줄 상품 개수
          $pageNumber = $_GET['pageNumber'] ?? 1; // 현재 페이지 번호

          // products 테이블에서 데이터 가져오기
          $startLimit = ($pageNumber - 1) * $pageCount; // 시작 레코드 인덱스
          $sql_products = "SELECT * FROM products WHERE 1=1 LIMIT $startLimit, $pageCount";
          $result_products = $mysqli->query($sql_products);

          if ($result_products) {
            while ($prs = $result_products->fetch_object()) {
              $productId = $prs->pid;
              $productName = $prs->name;
              $productCategory = $prs->cate;
              $productContent = $prs->content;
              $productIntro = $prs->product_intro;
              $productThumbnail = $prs->thumbnail;
        ?>

        <div class="cart">
          <div class="cart_card shadow-sm mcbg-white w-100 d-flex justify-content-between">
            <div class="d-flex gap-4">
              <img src="<?=$productThumbnail;?>" alt="cart img" class="shadow-sm">
              <div class="cart_info d-flex flex-column justify-content-start p-0 gap-2">
                <div class="ccart_about d-flex flex-column gap-2">
                  <h3 class="h5"><a href="/keepcoding/main/product/product_shop_details.php?pid=<?= $productId; ?>" class="mc-gray1"><?= $productName; ?></a></h3>
                  <p class="mc-gray4">프론트엔드>HTML>초급</p>
                </div>
                <p class="d-flex"><?= $productIntro; ?></p>
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
              // 전체 상품 개수 가져오기
              $sql_total_count = "SELECT COUNT(*) as total_count FROM products WHERE 1=1";
              $result_total_count = $mysqli->query($sql_total_count);
              $total_count_row = $result_total_count->fetch_assoc();
              $totalProducts = $total_count_row['total_count'];

              // 전체 페이지 수 계산
              $totalPages = ceil($totalProducts / $pageCount);

              // 페이지네이션 코드
              echo '<ul class="pagination justify-content-center align-items-center">';
              if ($pageNumber > 1) {
                  echo '<li class="page-item"><a class="page-link" href="?pageNumber=1">Previous</a></li>';
                  // echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . ($pageNumber - 1) . '">Previous</a></li>';
              }

              for ($i = 1; $i <= $totalPages; $i++) {
                  if ($i == $pageNumber) {
                      echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                  } else {
                      echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . $i . '">' . $i . '</a></li>';
                  }
              }

              if ($pageNumber < $totalPages) {
                $nextPage = $pageNumber + 1;
                echo '<li class="page-item"><a class="page-link" href="?pageNumber=' . $nextPage . '">Next</a></li>';
              }
               echo '</ul>';

            ?>
          </ul>
        </nav>
      </div>

  </section>
  <!-- myproduct_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>