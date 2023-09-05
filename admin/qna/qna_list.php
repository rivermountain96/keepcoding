<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  $qid = $_GET['qid'];
  $sql = "SELECT * FROM qna WHERE qid='{$qid}'";
  $result = $mysqli->query($sql);
  $row = $result ->fetch_assoc();

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }
  //전체글 개수 확인
  $pagesql = "SELECT COUNT(*) AS cnt FROM qna";
  $page_result = $mysqli->query($pagesql); 
  $page_row = $page_result->fetch_assoc();
  $row_num = $page_row['cnt'];  //글의 총 개수 57
  var_dump($row_num);

  $list = 10; //페이지당 보여줄 개수
  $block_ct = 5; //페이지네이션 개수

  $block_num = ceil($page/$block_ct);
  $block_start = (($block_num - 1) * $block_ct) + 1; 
  $block_end = $block_start + $block_ct - 1;   
  $total_page = ceil($row_num/$list); //총 페이지 수 7
  $total_block = ceil($total_page/$block_ct); // 7/5   2
  if( $block_end > $total_page) $block_end = $total_page;
  $start_num = ($page-1)*$list;
?>

<!-- 이강산 qna_list 시작 -->
<div class="content">
  <h2 class="pd72 fs-4">Q&A 게시판</h2>
    <form class="d-flex pd48" role="search">
      <input class="form-control form-control-lg me-4" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search">
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
      $sql = "SELECT * FROM qna ORDER BY qid DESC LIMIT $start_num, $list";
      $result = $mysqli->query($sql); 

      while($row = $result->fetch_array(MYSQLI_ASSOC)){
        //var_dump($row);
        
        $post_time = $row['date']; //포스트의 등록일
        $time_now = date('Y-m-d'); //오늘 날짜
        $current_qid = $row['qid']; // 현재 행의 qid

    ?>


    <tr>
      <td class="align-middle"><?= $row['qid']; ?></td>
      <td class="align-middle"><a href="qna_view.php?qid=<?= $current_qid; ?>"><?= $row['qna_title']; ?></a></td>
      <td class="align-middle"><?= $row['username']; ?></td>
      <td class="align-middle"><?= $row['isanswer']; ?></td>
      <td class="align-middle"><?= $row['views']; ?></td>
      <td class="align-middle"><?= date("Y.m.d"); ?></td>
      <td class="align-middle">
        <button type="button" class="btn btn-outline-primary btn-sm qna_list_del" data-qid="<?= $current_qid; ?>">삭제</button>
      </td>
    </tr>

    <?php
      }
    ?> 
    </tbody>
  </table>
  <div class="d-flex align-items-center pd48">
    <nav aria-label="Page navigation example" class="col-11">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item active"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">5</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
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