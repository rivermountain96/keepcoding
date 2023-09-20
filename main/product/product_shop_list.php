<?php
  $title =  '강의 탐색';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

  $pageNumber = $_GET['pageNumber'] ?? 1;

  // 필터링
  $category = $_GET['category'] ?? ''; //받아올값
  $recommend = $_GET['recommend'] ?? ''; //받아올값
  $level = $_GET['level'] ?? ''; //받아올값

  // 검색
  $search_keyword = $_GET['search_keyword'] ?? ''; //받아올값

  $search_where = ''; //빈 문자열 생성

  if($category !== ''){
    $search_where .= " and (cate like '{$category}%')";
  }

  if($recommend !== ''){
    $search_where .= " and isrecom = $recommend";
  }

  if($level !== ''){
    $search_where .= " and level = '{$level}'";
  }

  if($search_keyword !== ''){
    $search_where .= " and (name like '%{$search_keyword}%' or product_intro like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
  }

  $sql = "SELECT * FROM products WHERE 1=1";

  $sql .= $search_where;
  $order = ' order by pid desc'; //최신순 정렬

  // 페이지네이션

  $pagenationTarget = 'products';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/pagenation.php';

  $limit = " limit $startLimit, $endLimit";
  $query = $sql.$order.$limit;

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
  <h2 class="h4 container pshop_title">강의탐색</h2>
  <div class="container d-flex justify-content-between">
    <!-- pshop_section01 시작 -->
    <section class="pshop_section01 col-3 mb-5">
      <div class="d-flex justify-content-between">
        <p class="h6"><img src="/keepcoding/main/img/pshop_sliders.svg" alt="필터"> 필터</p>
        <p class="h6"><a href="/keepcoding/main/product/product_shop_list.php" class="mc-gray1">초기화 <img src="/keepcoding/main/img/pshop_repeat.svg" alt="초기화"></a></p>
      </div>
      
      <div class="pshop_section01_list">
        <form method="GET">
          <div class="pshop_section01_category_wrap">
            <h3 class="h6">카테고리</h3>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="category" id="category01" value="2">
              <label class="form-check-label" for="category01">
                프론트엔드
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="category" id="category02" value="3">
              <label class="form-check-label" for="category02">
                백엔드
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="category" id="category03" value="1">
              <label class="form-check-label" for="category03">
                기초강의
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="category" id="category04" value="48">
              <label class="form-check-label" for="category04">
                숏강의
              </label>
            </div>
          
          <div class="pshop_section01_recommend">
            <h3 class="h6">추천</h3>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="recommend" name="recommend">
              <label class="form-check-label" for="recommend">
                BEST 강의
              </label>
            </div>
          </div>
          <div class="pshop_section01_level">
            <h3 class="h6">난이도</h3>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="초급" id="level01" name="level">
              <label class="form-check-label" for="level01">
                초급
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="중급" id="level02" name="level">
              <label class="form-check-label" for="level02">
                중급
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="고급" id="level03" name="level">
              <label class="form-check-label" for="level03">
                고급
              </label>
            </div>
          </div>
          </div>
          <button class="btn btn-primary mt-3 w-100" type="submit">탐색</button>
        </form>
      </div>
    </section>
    <!-- pshop_section01 끝 -->
    <!-- pshop_section02 시작 -->
    <section class="pshop_section02 col-9">
      <h2 class="h6">총 <span><?= $num_rows ?></span> 개의 강의</h2>
      <div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search" name="search_keyword">
          <button class="btn btn-primary col-1" type="submit">검색</button>
        </form>
      </div>
      <div class="card_list d-flex justify-content-between gap-3 row m-0">
        <?php
          if(isset($rsc)){
            foreach($rsc as $item){

              // 중분류 카테고리명 추출
              $cate = $item->cate;
              $cateNum = explode('/', $cate);
              $middleNumber = $cateNum[1]; // 중간 숫자 추출

              $catesql = "SELECT name FROM category WHERE cid=$middleNumber";
              $cateresult = $mysqli->query($catesql);
              while($cr = $cateresult -> fetch_object()){
                $crs[] = $cr;
              }
              foreach($crs as $cateName){$cateName2 = $cateName->name;};

              // 제목 생략
              // var_dump($item->name);
              $name = $item->name;
              // var_dump($name);
              $maxLength = 25;

              $length = mb_strlen($name, 'utf-8');
              if($length <= $maxLength){
                $name = $name;
              }else{
                $str = mb_substr($name, 0, $maxLength, 'utf-8');
                $name = $str . '⋯';
              }
              // function truncateString($name, $maxLength) {
              //   if (mb_strlen($name, 'utf-8') <= $maxLength) {
              //       return $name; // 문자열의 길이가 제한 이하이면 그대로 반환
              //   } else {
              //       $truncatedStr = mb_substr($name, 0, $maxLength, 'utf-8'); // 제한 길이만큼 잘라냄
              //       return $truncatedStr . '...'; // 말줄임표 추가
              //   }
              // }

              // $newname = truncateString($name, $maxLength);
              
        ?>
        <div class="card sec2 text-center p-0" data-bs-theme="dark">
          <a href="/keepcoding/main/product/product_shop_details.php?pid=<?= $item->pid ?>">
            <div class="card-img-top-wrap">
                <img src="<?= $item->thumbnail ?>" class="card-img-top" alt="lecture img">
            </div>
          </a>
          <div class='card-body z-3'>
              <p class='card-title text-center fw-semibold'><a href="/keepcoding/main/product/product_shop_details.php?pid=<?= $item->pid ?>"><?= $name ?></a></p>
              <a href='' class='btn btn-primary fs-10 mt-2'><?= $cateName2 ?></a>
              <a href='' class='btn btn-primary fs-10 mt-2'><?php
                  if($item->price == 0){
                    echo "무료 강의";
                  }else{
                    echo "₩ <span class=\"number\">$item->price;<span>";
                  }
               ?></a>
          </div>
        </div>
        <?php
            }}else{
        ?>
          <p class="text-center mc-gray3 noresult">검색 결과가 없습니다</p>
        <?php
            }
        ?>
      </div>

      <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation" class="col-11">
          <ul class="pagination justify-content-center align-items-center ">
          <?php
              if($pageNumber>1){                   
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=1\">Previous</a></li>";
                  if($block_num > 1){
                      $prev = ($block_num - 2) * $block_ct + 1;
                      echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=$prev\" class=\"page-link\">&lt;</a></li>";
                  }
              }
              for($i=$block_start;$i<=$block_end;$i++){
                if($pageNumber == $i){
                    echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=$i\" class=\"page-link\">$i</a></li>";
                }else{
                    echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=$i\" class=\"page-link\">$i</a></li>";
                }
              }
              if($pageNumber<$total_page){
                if($total_block > $block_num){
                    $next = $block_num * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=$next\" class=\"page-link\">&gt;</a></li>";
                }
                echo "<li class=\"page-item\"><a href=\"?category=$category&recommend=$recommend&level=$level&pageNumber=$total_page\" class=\"page-link\">Next</a></li>";
              }
            ?>
          </ul>
        </nav>
      </div>
    </section>
    <!-- pshop_section02 끝 -->
  </div>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>