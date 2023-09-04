<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
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
        <td class="align-middle"><a href="qna_view.php">안녕하세요. aws관련 질문 드립니다.</a></td>
        <td class="align-middle">roja1212</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">12</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">49</td>
        <td class="align-middle"><a href="qna_view.php">왜 틀렸는지 모르겠습니다 ㅠ</a></td>
        <td class="align-middle">talia11</td>
        <td class="align-middle">미완료</td>
        <td class="align-middle">15</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">48</td>
        <td class="align-middle"><a href="qna_view.php">패키지 구조에 대해서 궁금합니다!</a></td>
        <td class="align-middle">ruby11</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">11</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">47</td>
        <td class="align-middle"><a href="qna_view.php">알고리즘 교안 68p 질문</a></td>
        <td class="align-middle">robin07</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">32</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">46</td>
        <td class="align-middle"><a href="qna_view.php">github에 해당 레포를 찾을 수가 없어요.</a></td>
        <td class="align-middle">sora2</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">21</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">45</td>
        <td class="align-middle"><a href="qna_view.php">커밋 메시지가 잘 이해 안됩니다</a></td>
        <td class="align-middle">trudy03</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">13</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">44</td>
        <td class="align-middle"><a href="qna_view.php">스타일콤포넌트 스크립트의 색상</a></td>
        <td class="align-middle">sean14</td>
        <td class="align-middle">미완료</td>
        <td class="align-middle">12</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">43</td>
        <td class="align-middle"><a href="qna_view.php">강의 정리된 자료</a></td>
        <td class="align-middle">richard0101</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">17</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">42</td>
        <td class="align-middle"><a href="qna_view.php">DevTools라고 옆에 결과 확인하는거 어떻게 하나요?</a></td>
        <td class="align-middle">sasha77</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">24</td>
        <td class="align-middle">2023.09.09</td>
        <td class="align-middle">
          <button type="button" class="btn btn-outline-primary btn-sm">삭제</button>
        </td>
      </tr>
      <!-- qna_list_tr 끝 -->
      <!-- qna_list_tr 시작 -->
      <tr>
        <td class="align-middle">41</td>
        <td class="align-middle"><a href="qna_view.php">section04 - 각각의 객체에 개별 애니메이션 적용하기</a></td>
        <td class="align-middle">remy001</td>
        <td class="align-middle">완료</td>
        <td class="align-middle">31</td>
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