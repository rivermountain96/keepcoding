<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
?>
<!-- 이은서 index 시작-->
<div class="content index">
  <h4 class="pd72">홈</h4>
  <h6 class="pd10">이번달 판매 현황</h6>
  <div class="sell_report pd48 row">
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>판매 강좌 수</span>
      <span data-num="0" class="pc">0 건</span>
      <i class="bi bi-arrow-up-circle pc"></i>
    </div>
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>총 판매액</span>
      <span data-num="0" class="pc">0 만원</span>
      <i class="bi bi-arrow-up-circle pc"></i>
    </div>
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>직전달 대비 수익율</span>
      <span data-num="0" class="pc">0 %</span>
      <i class="bi bi-arrow-up-circle pc"></i>
    </div>
  </div>
  <div class="member row pd48 gap-4">
    <div class="col kcard d-flex align-items-center justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="37.5" height="50" fill="currentColor" class="bi bi-file-person pc" viewBox="0 0 16 16">
        <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
        <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>
      <div calss="kcard_text">
        <p class="fw-bold mc-gray1 pd10">총 수강생 수</p>
        <p data-num="0" class="fw-bold pc">0 명</p>
      </div>
    </div>
    <div class="col kcard d-flex align-items-center justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="35.66" height="50" fill="currentColor" class="bi bi-award pc" viewBox="0 0 16 16">
        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
      </svg>
      <div calss="kcard_text">
        <p class="fw-bold mc-gray1 pd10">완강률</p>
        <p data-num="0" class="fw-bold pc">0 %</p>
      </div>
    </div>
  </div>
  <div class="row like_report pd48 gap-4">
    <div class="col kcard align-items-center">
      <h6 class="mc-gray1">대분류별 인기도</h6>
      <div class="d-flex ratebar front">
        <span class="fw-bold pc">front</span>
        <div class="rate" data-num="45">
          <div class="bar"></div>
        </div>
      </div>
      <div class="d-flex ratebar back">
        <span class="fw-bold mc-gray3">back</span>
        <div class="rate" data-num="45">
          <div class="bar"></div>
        </div>
      </div>
    </div>
    <div class="col d-flex flex-column kcard align-items-center justify-content-center">
      <p class="fw-bold">수강생 총 만족도</p>
      <div class="smile_icons d-flex gap-2">
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-empty"></i>
      </div>
      
      
    </div>
  </div>
  <div class="coupon_report kcard big d-flex align-items-center justify-content-center gap-5">
    <i class="bi bi-ticket-fill pc"></i>
    <div class="d-flex gap-5">
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">활성화 쿠폰 갯수</p>
        <span class="pc fw-bold">0개</span>
      </div>
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">비활성화 쿠폰 갯수</p>
        <span class="pc fw-bold">0개</span>
      </div>
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">만료임박 쿠폰 갯수</p>
        <span class="pc fw-bold">0개</span>
      </div>
    </div>
  </div>
  
</div>
<!-- 이은서 index 끝-->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>