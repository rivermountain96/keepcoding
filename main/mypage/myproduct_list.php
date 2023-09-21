<?php
  session_start(); 
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

    // 페이지네이션

    $pagenationTarget = 'products';
    include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/pagenation.php';
  
    $limit = " limit $startLimit, $endLimit";
    $query = $sql.$order.$limit;
  
    // var_dump($query);
    $result = $mysqli -> query($query);
  
    while($rs = $result -> fetch_object()){
      $rsc[] = $rs;
    }
  
    $num_result = $mysqli -> query($sql);
  
    if(isset($num_result)){
      $num_rows = mysqli_num_rows($num_result);
    }else{
      $num_rows = 0;
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
          // products 테이블에서 사용자가 담은 강의 정보를 가져오는 쿼리
          $sql_products = "SELECT * FROM products WHERE 1=1";
          $result_products = $mysqli->query($sql_products);

          if ($result_products) {
            while ($prs = $result_products->fetch_object()) {
              $productName = $prs->name;
              $productCategory = $prs->cate;
              $productContent = $prs->content;
              $productIntro = $prs->product_intro;
              $productId = $prs->pid;
        ?>
        <div class="cart">
          <div class="cart_card shadow-sm mcbg-white w-100 d-flex justify-content-between">
            <div class="d-flex gap-4">
              <img src="../img/example06.png" alt="cart img" class="shadow-sm">
              <div class="cart_info d-flex flex-column justify-content-start p-0 gap-2">
                <div class="ccart_about d-flex flex-column gap-2">
                  <h3 class="h5"><a href="/keepcoding/main/product/product_shop_details.php" class="mc-gray1"><?= $productName; ?></a></h3>
                  <p class="mc-gray4">프론트엔드>HTML>초급</p>
                </div>
                <p class="d-flex"><?= $productIntro; ?></p>
              </div>
            </div>
            <div class="d-flex flex-column align-items-end col-1">
              <a href="" class="mc-gray1 cart_trash justify-content-end">삭제
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
              </a>
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
              if($pageNumber>1){                   
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?category=$category&recommend=$recommend&levelPage&search_keyword=$search_keyword&pageNumber=1\">Previous</a></li>";
                  if($block_num > 1){
                      $prev = ($block_num - 2) * $block_ct + 1;
                      echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend$levelPage&search_keyword=$search_keyword&pageNumber=$prev\" class=\"page-link\">&lt;</a></li>";
                  }
              }
              for($i=$block_start;$i<=$block_end;$i++){
                if($pageNumber == $i){
                    echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?category=$category&recommend=$recommend$levelPage&search_keyword=$search_keyword&pageNumber=$i\" class=\"page-link\">$i</a></li>";
                }else{
                    echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend$levelPage&search_keyword=$search_keyword&pageNumber=$i\" class=\"page-link\">$i</a></li>";
                }
              }
              if($pageNumber<$total_page){
                if($total_block > $block_num){
                    $next = $block_num * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend$levelPage&search_keyword=$search_keyword&pageNumber=$next\" class=\"page-link\">&gt;</a></li>";
                }
                echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend$levelPage&search_keyword=$search_keyword&pageNumber=$total_page\" class=\"page-link\">Next</a></li>";
              }
            ?>
          </ul>
        </nav>
      </div>

  </section>
  <!-- myproduct_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>