<?php
  $title = '홈';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';
  
  // 필터링
  $category = $_GET['category'] ?? ''; // 받아올 값

  // 검색
  $search_keyword = $_GET['search_keyword'] ?? ''; // 검색어 가져오기

  $search_where = ''; // 빈 문자열 생성

  $sql = "SELECT * FROM products WHERE 1=1";

  // 검색어가 입력되었을 경우 검색 조건 추가
  if (!empty($search_keyword)) {
    $sql .= " AND (name LIKE '%$search_keyword%' OR description LIKE '%$search_keyword%' OR category LIKE '%$search_keyword%')";
  }

  $sql .= " LIMIT 0, 4";

  $result = $mysqli->query($sql);
  while ($rs = $result->fetch_object()) {
    $rsc[] = $rs;
  }
?>


  <!-- section 시작 -->
    <!-- main_section01_search 시작 -->
    <section class="container main_section01_search">
      <h2 class="d-flex justify-content-center">킵코딩 강의를 <span>검색</span>하세요</h2>
      <div class="d-flex justify-content-center">
        <form action="product/product_shop_list.php" class="search_own" role="search" method="GET">
          <input class="search_input" type="search" name="search_keyword" aria-label="Search" placeholder="React" value="<?= htmlspecialchars($search_keyword) ?>">
          <button class="search_btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
              fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></button>
        </form>
      </div>
      <div class="d-flex flex-column">
        <ul class="main_middlec_icon d-flex justify-content-center gap-5">
          <li><a href="product/product_shop_list.php?search_keyword=html"><img width="50" height="50" src="../main/img/main_html.png"
                alt="HTML">HTML</a></li>
          <!-- 중간 카테고리의 URL을 만들 때 검색어도 함께 전달 -->
          <li><a href="product/product_shop_list.php?search_keyword=css"><img width="50"
                height="50" src="../main/img/main_css.png" alt="CSS">CSS</a></li>
          <li><a href="product/product_shop_list.php?search_keyword=javascript"><img width="50" height="50" src="../main/img/main_js.png"
                alt="JS">JS</a></li>
          <!-- 중간 카테고리의 URL을 만들 때 검색어도 함께 전달 -->
          <li><a href="product/product_shop_list.php?search_keyword=React"><img width="50"
                height="50" src="../main/img/main_react.png" alt="React">React</a></li>
          <li><a href="product/product_shop_list.php?search_keyword=java"><img width="50" height="50" src="../main/img/main_java.png"
                alt="Java">Java</a></li>
          <li><a href="product/product_shop_list.php?search_keyword=jquery"><img width="50" height="50" src="../main/img/main_jquery.png"
                alt="jQuery">jQuery</a></li>
          <li><a href="product/product_shop_list.php?search_keyword=php"><img width="50" height="50" src="../main/img/main_php.png"
                alt="Php">Php</a></li>
          <li><a href="product/product_shop_list.php?search_keyword=python"><img width="50" height="50" src="../main/img/main_python.png"
                alt="Python">Python</a></li>
        </ul>
      </div>
    </section>
    <!-- main_section01_search 끝 -->

    <!-- main_section02_starter 시작 -->
    <section class="container main_section02_starter">
      <h2 class="h4 "><a href="product/product_shop_list.php?category=1">왕초보를 위한 기초강의 > </a></h2>
      <p><span>HTML & CSS 완전 정복</span></p>
      <!-- example 시작 -->
      <div class="d-flex justify-content-between gap-3">
      <?php
        foreach($rsc as $item){
          
          // 중분류 카테고리명 추출
          $cate = $item->cate;
          $cateNum = explode('/', $cate);
          $middleNumber = $cateNum[1]; // 중간 숫자 추출

          $catesql = "SELECT name FROM category WHERE cid=$middleNumber";
          $cateresult = $mysqli->query($catesql);

          $crs = array();

          while($cr = $cateresult -> fetch_object()){
            $crs[] = $cr;
          }
          foreach($crs as $cateName){
            $cateName2 = $cateName->name;
          };

          
        ?>
        <!-- example01 -->
        <div class="card sec2 text-center" data-bs-theme="dark">
          <a href="product/product_shop_details.php">
            <div class="card-img-top-wrap">
              <img src="<?php echo $item->thumbnail;?>" class="card-img-top" alt="<?= $item-> name;?>">
            </div>
          </a>
            <div class="card-body z-3">
              <p class="card-title text-center fw-semibold"><?= $item-> name;?></p>
              <p class="card-text text-center fs-12">코딩 기초 필수! 기본 문법 다지기!</p>
              <a href="#none" class="btn btn-primary fs-10 mt-2"><?= $cateName2;?></a>
              <a href="#none" class="btn btn-primary fs-10 mt-2"><?php
                  if($item->price == 0){
                    echo "무료 강의";
                  }else{
                    echo "₩ <span class=\"number\">$item->price;<span>";
                  }
               ?></a>
            </div>
        </div>
        <?php
          }
        ?> 
    </section>
    <!-- main_section02_starter 끝 -->

    <!-- main_section03_shorts 시작 -->
    <section class="container main_section03_shorts">
      <h2 class="h4"><a href="product/product_shop_list.php?category=48">3분 이내로 배우는 숏강의 > </a></h2>
      <p><span>강의는 짧고 배움은 길게!</span></p>
    <div class="d-flex justify-content-between gap-3">
      <div class="card sec3 mb-3" style="width: 19.5rem;" data-bs-theme="dark">
        <div class="card-body big-pd">
          <p class="card-title fs-5 fw-bold lh-sm nowrap mb-4">가방끈이 기시네요?
          <br>어머! 숏강의 들었을 뿐인걸요?
          </p>
          <p class="card-text fs-6 mb-4">꼭 필요한 내용만 전달!<br>지루하지 않게 끝까지 몰입 가능!</p>
          <a href="/keepcoding/main/product/product_shop_details.php?pid=54" class="card-btn btn btn-light br-10 fs-12 pc2 w-100 big-pd d-flex align-items-center justify-content-between">
            <div class="d-flex gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z"/>
              </svg>
              <span class="fw-medium mc-gray3">1분 CSS - 선택자 게임</span>
            </div>
            <span class="card-time">00:49</span>
          </a>
          <a href="/keepcoding/main/product/product_shop_details.php?pid=50" class="card-btn btn btn-light br-10 fs-12 pc2 w-100 big-pd d-flex align-items-center justify-content-between">
            <div class="d-flex gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z"/>
              </svg>
            </div>
            <span class="fw-medium mc-gray3">React Styled components</span>
            <span class="card-time">00:30</span>
          </a>
          
        </div>
      </div>
      <div class="card sec3 mb-3" style="width: 19.5rem;" data-bs-theme="dark">
        <a href="/keepcoding/main/shorts/shorts.php">
          <div class="card-body big-pd d-flex flex-column justify-content-between">
            <p class="card-title fs-5 fw-bold lh-sm nowrap mb-4">최적화된 학습 방법
            </p>
            <p class="card-text fs-6 mb-4">단조로운 영상 위주의 강의는 놉!<br>재밌고 능동적으로 배우기</p>
            <img src="../main/img/Group576.svg" alt="computer img" class="computerImg align-self-end">
          </div>
        </a>
      </div>
      <div>
        <iframe width="648" height="413" src="https://www.youtube.com/embed/4BUwV1DcHZA?mute=1" title="streamlit #shorts" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
      </div>
    </div>
    </section>
    <!-- main_section03_shorts 끝 -->

    <!-- main_section04_banner 시작 -->
    <section class="container main_section04_banner">
      <div id="banner">
        <div class="banner pcbg d-flex justify-content-between align-items-center">
          <div class="banner-text d-flex flex-column gap-2">
            <button type="button" class="btn btn-dark w-50 mb-2" data-bs-toggle="modal" data-bs-target="#testModal">
              테스트 시작하기
            </button>
            <h4 class="mc-white fw-semibold">나에게 맞는 강의를 못찾겠다면</h4>
            <h3 class="mc-white fw-semibold">숏테스트로 <span class="mc-gray5 fw-bold">1분만에</span> 찾아보세요!</h3>
          </div>
          <img src="../main/img/bannerimg1.png" alt="bannerimg1" class="bannerimg1">
        </div>
      </div>
      <div id="banner2">
        <div class="banner banner2 pcbg d-flex justify-content-between align-items-center">
          <div class="banner-text d-flex flex-column gap-2">
            <p class="btn btn-primary w-50 mb-2">
                <a href="members/signup.php" class="text-white">회원가입 바로가기</a>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 18">
                <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
              </svg>
            </p>
            <h4 class="fw-semibold">신규 가입한 모든 분들께 드리는 혜택</h4>
            <h3 class="fw-semibold">가입 즉시 발급되는<span class="fw-bold">1만원</span> 쿠폰!</h3>
        <!-- </a> -->
          </div>
          <img src="../main/img/bannerimg2.svg" alt="bannerimg2" class="bannerimg2">
        </div>
      </div>
    </section>

    <!-- main_section04 Modal 시작 -->
    <div class="modal fade" id="testModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">1분 숏테스트</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body d-flex align-items-center justify-content-center">
            <div class="test_card shadow text-center d-flex flex-column align-items-center gap-4">
              <h5 class="mc-gray2 fw-semibold test_title">1분만에 적성 찾기</h5>
        
              <div id="start" class="view active flex-column align-items-center gap-4">
                <img src="../main/img/bannerimg1.png" alt="bannerimg1">
                <p class="mc-gray2 text-center fs-14">나에게 맞는 IT 직군은 뭘까?<br>킵코딩 1분 숏테스트로 쉽게 찾아보자!</p>
                <button class="btn btn-light fs-14" id="start_btn">1분 테스트 시작하기</button>
              </div>
        
              <div id="progress" class="view flex-column">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>        
                <p class="question mc-gray1"></p>
                <div class="answer d-flex flex-column">
                </div>
              </div>
        
              <div id="result" class="view flex-column align-items-center gap-4">
                <img src="#none" alt="#none" class="result_img">
                <h5 class="name mc-gray2 fw-semibold">직업 이름</h5>
                <p class="sub mc-gray5 fw-semibold">한줄소개</p>
                <p class="desc mc-gray2 fs-14">설명</p>
                <p class="mc-gray5 fw-bold fs-14">하는일</p>
                <ul class="work mc-gray2 fs-12 text-left d-flex flex-column gap-3">
                  <li>하는일1</li>
                  <li>하는일2</li>
                  <li>하는일3</li>
                  <li>하는일4</li>
                  <li>하는일5</li>
                </ul>
                <button type="button" class="btn btn-outline-light fs-14 mt-4" onclick="js:kakaoShare()">친구에게 공유하기</button>
              </div>
        
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
          </div>
        </div>
      </div>
    </div>
    <!-- main_section04 Modal 끝 -->
    
    <!-- main_section04_banner 끝 -->
    
    <!-- main_section05_etc 시작 -->
    <section class="container main_section05_etc">
      <h2 class="h4 ">NOTICE / COMMUNITY</h2>
      <div class="d-flex justify-content-between gap-3">
        <div class="card sec5 mb-3" style="width: 26.5rem;" data-bs-theme="dark">
          <div class="card-body">
            <p class="card-title fs-5 fw-bold mb-4">공지사항</p>
            <p class="card-text mb-5">킵코딩의 정보와 다양한 소식을 확인하세요</p><br>
            <a href="#none" class="btn btn-primary fw-semibold br-20">
              <span>공지사항 전체보기</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
              <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
            </svg></a>
          </div>
        </div>
        <div class="card sec5 mb-3" style="width: 26.5rem;" data-bs-theme="dark">
          <div class="card-body">
            <p class="card-title fs-5 fw-bold mb-4">Q&A</p>
            <p class="card-text mb-5">강의 또는 사이트에 관한 질문이 있나요?<br>궁금한 부분이 있다면 작성글을 남겨 주세요</p>
            <a href="#none" class="btn btn-primary fw-semibold br-20">
              <span>Q&A 게시판</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
              <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
            </svg></a>
          </div>
        </div>
        <div class="card sec5 mb-3" style="width: 26.5rem;" data-bs-theme="dark">
          <div class="card-body">
            <p class="card-title fs-5 fw-bold mb-4">개발 관련 정보</p>
            <p class="card-text mb-5">개발과 관련된 정보를 회원들과 공유하는 공간</p><br>
            <a href="#none" class="btn btn-primary fw-semibold br-20">
              <span>개발 정보 게시판</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
              <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
            </svg></a>
          </div>
        </div>
      </div>
    </section>
    <!-- main_section05_etc 끝 -->

    <!-- 이강산 DIALOG POPUP 시작 -->
  <dialog class="popup">
    <h2>KEEPCODING LMS 학습사이트(포트폴리오)</h2>
    <p>
      <span>본 사이트는 구직용 포트폴리오 사이트입니다.</span>
    </p>
  
    <hr>
  
    <div class="info">
      <p><span>제작기간</span> : 2023. 09. 09 - 09. 25</p>
      <p><span>특징</span> : html, css, jQuery (Bootstrap, jQuery Library)</p>
      <p>local: Windows, XAMPP(PHP, APACHE, MYSQL) | remote : PHP, LINUX, MYSQL</p>
      <p><span>기획</span> : <a href="#" target="_blank" class="figma"><span class="font_green">발표 자료</span></a>  |  <span>코드</span> : <a href="https://github.com/rivermountain96/keepcoding/tree/main" target="_blank" class="git"><span>깃허브</span><i class="fa-brands fa-github"></i></a></p>
      <p><span>구현 완료 페이지</span> : <a href="http://keepcoding.dothome.co.kr/keepcoding/main/index.php" target="_blank" class="dothome"><span>Keep Coding 페이지</span></a></p>
    </div>
  
    <hr>
  
    <div class="work">
      <p><span>팀원</span> : 정*원, 박*용, 이*산, 이*서, 최*희</p>
      <p><span>기획</span> : 공동 참여</p>
      <p><span>디자인</span> : 정*원, 최*희</p>
      <dl>
        <dt><span>- 퍼블리싱 구현 -</span></dt>
        <dd><span>최*희</span> : 메인(헤더|푸터)/강의탐색/강의상세보기/숏강의/마이페이지</dd>
        <dd><span>이*산|정*원</span> : 로그인/회원가입</dd>
        <dd><span>이*서</span> : common.css/테스트배너/테스트</dd>
        <dt><span>- 백엔드 구현 -</span></dt>
        <dd><span>정*원</span> : 장바구니/고투탑</dd>
        <dd><span>이*산</span> : 로그인/로그아웃/회원가입/메인페이지</dd>
        <dd><span>이*서</span> : 강의탐색/강의상세보기/테스트</dd>
      </dl>
    </div>
  
    <hr>
  
    <div class="close_wrap d-flex justify-content-between">
      <div class="checkbox">
        <input type="checkbox" id="daycheck" class="hidden">
        <label for="daycheck">
          <i class="fa-solid fa-check"></i>
          오늘 하루 안보기
        </label>
      </div>
      <button type="button" id="close">닫기</button>
    </div>
  </dialog>
  <!-- 이강산 DIALOG POPUP 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>
<script src="/keepcoding/main/js/test_data.js"></script>
<script src="/keepcoding/main/js/test.js"></script>