<?php
  $title =  '쿠폰 관리';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  //페이지네이션
  // $pagenationTarget = 'products';
  // include_once $_SERVER['DOCUMENT_ROOT'].'/abcmall/admin/inc/pagenation.php';

  //검색, 조회 대상 지정
  // $status = $_GET['status'] ?? ''; //받아올값
  // $search_keyword = $_GET['search_keyword'] ?? ''; //받아올값

  // $search_where = ''; //빈 문자열 생성

  // if($status > 0){
  //   $search_where .= " and status = 1";
  // }else{
  //   $search_where .= " and status = 0";
  // }
  // if($search_keyword){
  //   $search_where .= " and (name like '%{$search_keyword}%')";
  // }

  // $sql = "SELECT * FROM coupons WHERE 1=1";

  // $sql .= $search_where;
  // $order = ' order by pide desc'; //최신순 정렬
  // $limit = " limit $startLimit, $endLimit";
  // $query = $sql.$order.$limit;
  // $query = $sql.$order;
  $sql = "SELECT * FROM coupons";
  var_dump($sql);

  $result = $mysqli -> query($sql);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>

<!-- 이은서 coupon_list 시작-->
<div class="content">
  <h4 class="pd72">쿠폰 관리</h4>
  <div class="d-flex justify-content-between pd48">
      <div class="btn-group" role="group" aria-label="Default button group">
          <button type="button" class="btn btn-outline-primary">활성화 쿠폰</button>
          <button type="button" class="btn btn-outline-primary">비활성화 쿠폰</button>
          <button type="button" class="btn btn-outline-primary">전체</button>
      </div>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="쿠폰명으로 검색하기" aria-label="Search">
        <button class="btn btn-outline-primary nowrap" type="submit">쿠폰 검색</button>
      </form>
  </div>
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
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
            <?php
              }else{
            ?>
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
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
    <nav aria-label="Page navigation example" class="col-11">
      <ul class="pagination justify-content-center align-items-center ">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
    <button type="button" class="btn btn-primary col-1">쿠폰 등록</button>
  </div>
<div>
<!-- 이은서 coupon_list 끝-->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>