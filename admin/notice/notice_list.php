<?php
  $title =  '공지 사항';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>

<!-- 최성희 notice_list 시작 -->
<div class="content">
  <h2 class="pd72 fs-4">공지 사항</h2>
    <form class="d-flex pd48" role="search">
      <input class="form-control form-control-lg me-4" name="search_keyword" id="search_keyword" type="search" placeholder="제목 및 내용 검색하기" aria-label="Search">
      <button class="btn btn-outline-primary nowrap col-1" type="submit">검색</button>
    </form>
  <table class="table notice_list_table">
    <thead>
      <tr class="fw-bold">
        <th class="col-1">No.</th>
        <th class="col-5">제목</th>
        <th class="col-1">작성자</th>
        <th class="col-1">조회</th>
        <th class="col-2">작성일</th>
        <th class="col-1">삭제</th>
      </tr>
    </thead>
    <tbody>
      <!-- notice_list_tr 시작 -->
      <?php
        if(isset($rsc)){
          foreach($rsc as $item){            
      ?>

      <tr>
        <td class="align-middle listIdx"><?= $item -> idx; ?></td>
        <td class="align-middle"><a href="/keepcoding/admin/notice/notice_view.php?idx=<?= $item-> idx; ?>"><?= $item -> title; ?></a></td>
        <td class="align-middle"><?= $item -> name; ?></td>        
        <td class="align-middle"><?= $item -> hit; ?> </td>
     

        <td class="align-middle">
        <?php $date = str_replace('-', '.', $item -> regdate ); 
        echo $date;
        ?>

        </td>
        
        <td class="align-middle">
          <a href="/keepcoding/admin/notice/notice_del.php?idx=<?= $item-> idx?>" id="delete" class="btn btn-outline-primary btn-sm">삭제</a>
        </td>
      </tr>
      <?php
        } 
      } 
      ?>  

    </tbody>
  </table>
  <div class="d-flex align-items-center pd48">
    <nav aria-label="Page navigation example" class="col-11">
      <ul class="pagination justify-content-center">
      <?php
        if($pageNumber>1){                   
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1\">&lt;&lt;</a></li>";
            if($block_num > 1){
                $prev = ($block_num - 2) * $block_ct + 1;
                echo "<li class=\"page-item\"><a href='?pageNumber=$prev' class=\"page-link\">이전</a></li>";
            }
        }
        for($i=$block_start;$i<=$block_end;$i++){
          if($pageNumber == $i){
              echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }else{
              echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
          }
        }
        if($pageNumber<$total_page){
          if($total_block > $block_num){
              $next = $block_num * $block_ct + 1;
              echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\">다음</a></li>";
          }
          echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\">&gt;&gt;</a></li>";
        }
      ?>           
      </ul>
    </nav>
    <a href="notice_up.php" class="btn btn-primary col-1">공지등록</a>
 
  </div>
  
<div>
<!-- 최성희 notice_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>
