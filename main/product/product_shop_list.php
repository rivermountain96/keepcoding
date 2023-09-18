<?php
  $title =  '강의 탐색';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/admin_check.php';

  // $pageNumber = $_GET['pageNumber'] ?? 1;

  // //검색, 조회 대상 지정
  // $status = $_GET['status'] ?? ''; //받아올값
  // $duedate = $_GET['due'] ?? ''; //받아올값
  // $search_keyword = $_GET['search_keyword'] ?? ''; //받아올값

  // $search_where = ''; //빈 문자열 생성

  // if($status !== ''){
  //   if($status > 0){
  //     $search_where .= " and status = 1";
  //   }else if($status == 0){
  //     $search_where .= " and status = 0";
  //   }
  // }

  // if($duedate !== ''){
  //   if($duedate == 0){
  //     $search_where .= " and duedate = ''";
  //   }else if($duedate == 1){
  //     $search_where .= " and duedate IS NOT NULL AND duedate <> ''";
  //   }
  // }

  // if($search_keyword){
  //   $search_where .= " and (name like '%{$search_keyword}%')";
  // }

  // $sql = "SELECT * FROM products WHERE 1=1";

  // $sql .= $search_where;
  // $order = ' order by cid desc'; //최신순 정렬

  // //페이지네이션
  // $pagenationTarget = 'products';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/pagenation.php';
      
  // $limit = " limit $startLimit, $endLimit";
  // // $limit = " limit 0, 10";
  // $query = $sql.$order.$limit;

  // $result = $mysqli -> query($query);
  
  // while($rs = $result -> fetch_object()){
  //   $rsc[] = $rs;
  // }



?>
  <h2 class="h4 container pshop_title">강의탐색</h2>
  <div class="container d-flex justify-content-between">
    <!-- pshop_section01 시작 -->
  <section class="pshop_section01 col-3 mb-5">
    <div class="d-flex justify-content-between">
      <p class="h6"><img src="/keepcoding/main/img/pshop_sliders.svg" alt="필터"> 필터</p>
      <p class="h6"><a href="#" class="mc-gray1">초기화 <img src="/keepcoding/main/img/pshop_repeat.svg" alt="초기화"></a></p>
    </div>
    
    <div class="pshop_section01_list">
      <div class="pshop_section01_category">
        <h3 class="h6">카테고리</h3>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="category" id="category01">
          <label class="form-check-label" for="category01">
            프론트엔드
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="category" id="category02">
          <label class="form-check-label" for="category02">
            백엔드
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="category" id="category03" checked>
          <label class="form-check-label" for="category03">
            기초강의
          </label>
        </div>
      
      <div class="pshop_section01_recommend">
        <h3 class="h6">추천</h3>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="recommend">
          <label class="form-check-label" for="recommend">
            BEST 강의
          </label>
        </div>
      </div>
      
      <div class="pshop_section01_type">
        <h3 class="h6">유형</h3>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="type01">
          <label class="form-check-label" for="type01">
            숏강의
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="type" id="type02">
          <label class="form-check-label" for="type02">
            일반강의
          </label>
        </div>
      </div>

      <div class="pshop_section01_level">
        <h3 class="h6">난이도</h3>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="level01">
          <label class="form-check-label" for="level01">
            초급
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="level02">
          <label class="form-check-label" for="level02">
            중급
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="level03">
          <label class="form-check-label" for="level03">
            고급
          </label>
        </div>
      </div>
      </div>
    </div>
  </section>
  <!-- pshop_section01 끝 -->

  <!-- pshop_section02 시작 -->
  <section class="pshop_section02 col-9">
    <h2 class="h6"><span>24개</span>의 강의</h2>
    <div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search">
        <button class="btn btn-outline-primary col-1" type="submit">검색</button>
      </form>
    </div>

    <div class="card_list d-flex justify-content-between gap-3 row m-0">
      <!-- <div class="card sec2 text-center" data-bs-theme="dark">
        <a href="#">
          <div class="card-img-top-wrap">
            <img src="../img/example01.png" class="card-img-top" alt="example img">
          </div>
        </a>
          <div class="card-body z-3">
            <p class="card-title text-center fw-semibold">HTML - 기본 문법 학습</p>
            <p class="card-text text-center fs-12">코딩 기초 필수! 기본 문법 다지기!</p>
            <a href="#" class="btn btn-primary fs-10 mt-2">HTML</a>
            <a href="#" class="btn btn-primary fs-10 mt-2">￦1000</a>
          </div>
      </div> -->
    </div>

    <div class="d-flex justify-content-center">
      <!-- <nav aria-label="Page navigation" class="col-11">
        <ul class="pagination justify-content-center align-items-center ">
        <?php
            if($pageNumber>1){                   
                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?status=$status&due=$duedate&pageNumber=1\">Previous</a></li>";
                if($block_num > 1){
                    $prev = ($block_num - 2) * $block_ct + 1;
                    echo "<li class=\"page-item\"><a href='?status=$status&due=$duedate&pageNumber=$prev' class=\"page-link\">&lt;</a></li>";
                }
            }
            for($i=$block_start;$i<=$block_end;$i++){
              if($pageNumber == $i){
                  echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?status=$status&due=$duedate&pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }else{
                  echo "<li class=\"page-item\"><a href=\"?status=$status&due=$duedate&pageNumber=$i\" class=\"page-link\">$i</a></li>";
              }
            }
            if($pageNumber<$total_page){
              if($total_block > $block_num){
                  $next = $block_num * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href=\"?status=$status&due=$duedate&pageNumber=$next\" class=\"page-link\">&gt;</a></li>";
              }
              echo "<li class=\"page-item\"><a href=\"?status=$status&due=$duedate&pageNumber=$total_page\" class=\"page-link\">Next</a></li>";
            }
          ?>
        </ul>
      </nav> -->
    </div>
  </section>
  <!-- pshop_section02 끝 -->
  </div>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>