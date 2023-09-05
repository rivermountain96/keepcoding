<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

  $sql = "SELECT * FROM qna";
  $result = $mysqli -> query($sql);

?>

<!-- 최성희 qna_list 시작 -->
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
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">50</td>
        <td class="align-middle"><a href="qna_view.html">안녕하세요. aws관련 질문 드립니다.</a></td>
        <td class="align-middle">roja1212</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">12</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      
      
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
<!-- 최성희 qna_list 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>