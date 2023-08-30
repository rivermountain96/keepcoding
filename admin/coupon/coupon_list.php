<?php
  $title =  '쿠폰 관리';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  $pageNumber = $_GET['pageNumber'] ?? 1;

  //검색, 조회 대상 지정
  $status = $_GET['status'] ?? ''; //받아올값
  $search_keyword = $_GET['search_keyword'] ?? ''; //받아올값

  $search_where = ''; //빈 문자열 생성

  if($status > 0){
    $search_where .= " and status = 1";
  }else if($status == 0){
    $search_where .= " and status = 0";
  }

  if($search_keyword){
    $search_where .= " and (coupon_name like '%{$search_keyword}%')";
  }

  $sql = "SELECT * FROM coupons WHERE 1=1";

  $sql .= $search_where;
  $order = ' order by cid desc'; //최신순 정렬

  //페이지네이션
  $pagenationTarget = 'coupons';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/pagenation.php';
      
  $limit = " limit $startLimit, $endLimit";
  // $limit = " limit 0, 10";
  $query = $sql.$order.$limit;

  $result = $mysqli -> query($query);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }



?>

<!-- 이은서 coupon_list 시작-->
<div class="content">
  <h4 class="pd72">쿠폰 관리</h4>
    <form class="d-flex justify-content-between align-items-center pd48">
      <div class="d-flex gap-3">
        <div class="form-check d-flex align-items-center gap-3">
          <input class="form-check-input" type="radio" name="status" id="statusAll" value="">
          <label class="form-check-label" for="status2">
            전체
          </label>
        </div>
        <div class="form-check d-flex align-items-center gap-3">
          <input class="form-check-input" type="radio" name="status" id="status1" value="1">
          <label class="form-check-label" for="status1">
            활성화 쿠폰
          </label>
        </div>
        <div class="form-check d-flex align-items-center gap-3">
          <input class="form-check-input" type="radio" name="status" id="status0" value="0">
          <label class="form-check-label" for="status0">
            비활성화 쿠폰
          </label>
        </div>
      </div>
      <!-- <h5> 검색 결과: 총 <?= $row_num; ?> 개가 있습니다.</h5> -->
      <div class="d-flex gap-3">
        <input class="form-control me-2" type="search" name="search_keyword" placeholder="쿠폰명으로 검색하기" aria-label="Search">
        <button class="btn btn-outline-primary nowrap" type="submit">쿠폰 검색</button>
      </div>
    </form>

    <!-- <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" name="search_keyword" placeholder="쿠폰명으로 검색하기" aria-label="Search">
      <button class="btn btn-outline-primary nowrap" type="submit">쿠폰 검색</button>
    </form> -->
  <table class="table pd48">
    <thead>
      <tr scope="row">
        <th class="fw-bold col-4">쿠폰명</th>
        <th class="col-2">상태</th>
        <th class="col-2">할인액</th>
        <th class="col-2">사용기한</th>
        <th class="col-1">수정</th>
        <th class="col-1">삭제</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($rsc)){
          foreach($rsc as $item){
      ?>
      <tr>
        <th scope="row" class="fw-bold align-middle"><?= $item -> coupon_name ?></th>
        <td class="align-middle">
          <div class="form-check form-switch">
            <?php
              if($item->status > 0){
            ?>
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked disabled>
            <?php
              }else{
            ?>
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" disabled>
            <?php
              }
            ?>
            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
          </div>
        </td>
        <td class="align-middle">₩<span class="number"><?= $item -> coupon_price;?></span></td>
        <td class="align-middle"><?php
          $itemDate = $item -> duedate;
          $dateResult = str_replace("-",".",$itemDate);
          echo $dateResult;
        ?></td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">수정</button>
        </td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <?php
          }
        }
      ?>
    </tbody>
  </table>
  <div class="d-flex align-items-center">
    <nav aria-label="Page navigation" class="col-11">
      <ul class="pagination justify-content-center align-items-center ">
      <?php
          if($pageNumber>1){                   
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?status=$status&pageNumber=1\">Previous</a></li>";
              if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href='?status=$status&pageNumber=$prev' class=\"page-link\">&lt;</a></li>";
              }
          }
          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?status=$status&pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?status=$status&pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }
          }
          if($pageNumber<$total_page){
            if($total_block > $block_num){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\">&gt;</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\">Next</a></li>";
          }
        ?>
      </ul>
    </nav>
    <button type="button" class="btn btn-primary col-1">쿠폰 등록</button>
  </div>
<div>
<!-- 이은서 coupon_list 끝-->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>