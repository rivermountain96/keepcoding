<?php
  $title =  'Q&A 게시판 목록';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';
  
  $pageNumber = $_GET['pageNumber'] ?? 1;

  $qid = $_GET['qid'];
  $regdate = $_GET['regdate'] ?? ''; //받아올값
  $search_keyword = $_GET['search_keyword'] ?? '';

  $search_where = '';

  
  if($search_keyword){
    $search_where .= " and (username like '%{$search_keyword}%' or qna_content like '%{$search_keyword}%')";
    //제목과 내용에 키워드가 포함된 상품 조회
  }

  $sql = "SELECT * FROM qna WHERE 1=1";
  
  $sql .= $search_where;
  $order = ' order by qid desc'; //최신순 정렬

  //페이지네이션
  $pagenationTarget = 'qna';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/pagenation.php';

  $limit = " limit $startLimit, $endLimit";
  // $limit = " limit 0, 10";
  $query = $sql.$order.$limit;

  $result = $mysqli->query($query);

  if (!$result) {
    die("쿼리 실행 중 오류 발생: " . mysqli_error($mysqli));
  }

  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }

?>

<!-- 이강산 qna_list 시작 -->
<div class="content">
  <h2 class="pd72 fs-4">Q&A 게시판</h2>
    <form class="d-flex pd48" role="search">
      <input class="form-control form-control-lg me-4" type="search" name="search_keyword" placeholder="제목 및 내용 검색하기" aria-label="Search">
      <button class="btn btn-outline-primary nowrap col-1" type="submit">검색</button>
    </form>
  <table class="table qna_list_table">
    <thead>
      <tr class="fw-bold">
        <th class="col-1">No.</th>
        <th class="col-5">제목</th>
        <th class="col-1">작성자</th>
        <th class="col-1">답변</th>
        <th class="col-1">조회</th>
        <th class="col-2">작성일</th>
        <th class="col-1">삭제</th>
      </tr>
    </thead>
    <tbody>
    <?php
      if(isset($rsc)){
        foreach($rsc as $item){
        $post_time = $item -> regdate; //포스트의 등록일
        $time_now = date('Y-m-d'); //오늘 날짜
        $current_qid = $item -> qid; // 현재 행의 qid
    ?>


    <tr>
      <td class="align-middle"><?= $item->qid; ?></td>
      <td class="align-middle"><a href="qna_view.php?qid=<?= $current_qid; ?>"><?= $item->qna_title; ?></a></td>
      <td class="align-middle"><?= $item->username; ?></td>
      <td class="align-middle"><?= $item->isanswer; ?></td>
      <td class="align-middle"><?= $item->views; ?></td>
      <td class="align-middle"><?= date("Y.m.d"); ?></td>
      <td class="align-middle">
        <button type="button" class="btn btn-outline-primary btn-sm qna_list_del" data-qid="<?= $current_qid; ?>">삭제</button>
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
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?&due=$regdate&pageNumber=1\">Previous</a></li>";
              if($block_num > 1){
                  $prev = ($block_num - 2) * $block_ct + 1;
                  echo "<li class=\"page-item\"><a href='?&due=$regdate&pageNumber=$prev' class=\"page-link\">&lt;</a></li>";
              }
          }
          for($i=$block_start;$i<=$block_end;$i++){
            if($pageNumber == $i){
                echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?&due=$regdate&pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }else{
                echo "<li class=\"page-item\"><a href=\"?&due=$regdate&pageNumber=$i\" class=\"page-link\">$i</a></li>";
            }
          }
          if($pageNumber<$total_page){
            if($total_block > $block_num){
                $next = $block_num * $block_ct + 1;
                echo "<li class=\"page-item\"><a href=\"?&due=$regdate?pageNumber=$next\" class=\"page-link\">&gt;</a></li>";
            }
            echo "<li class=\"page-item\"><a href=\"?&due=$regdate?pageNumber=$total_page\" class=\"page-link\">Next</a></li>";
          }
        ?>
      </ul>
    </nav>
  </div>

</div>
<!-- 이강산 qna_list 끝 -->
<script>
  $('.qna_list_del').click(function(e){
    e.preventDefault();
    var qid = $(this).data('qid');
    if(confirm('삭제하시겠습니까?')){
      window.location = 'qna_del.php?qid='+qid;
    } else {
      alert('취소완료');
    }
  });
</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>