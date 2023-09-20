<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';
  
  $sql = "SELECT * FROM products WHERE 1=1 LIMIT 0, 4";
  $result = $mysqli -> query($sql);
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
?>

  <!-- section 시작 -->
    <!-- main_section01_search 시작 -->
    <section class="container main_section01_search" >
      <h2 class="d-flex justify-content-center" >킵코딩 강의를 <span>검색</span>하세요</h2>
      <div class="d-flex justify-content-center">
        <form action="#" class="search_own" role="search" method="GET">
          <input class="search_input" type="search" aria-label="Search" placeholder="프론트엔드">
          <button class="search_btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg></button>
        </form>
      </div>
      <div class="d-flex flex-column">
        <ul class="main_middlec_icon d-flex justify-content-center gap-5">
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_html.png" alt="HTML">HTML</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_css.png" alt="CSS">CSS</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_js.png" alt="JS">JS</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_react.png" alt="React">React</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_java.png" alt="Java">Java</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_jquery.png" alt="jQuery">jQuery</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_spring.png" alt="Spring">Spring</a></li>
          <li><a href="product/product_shop_list.php"><img width="50" height="50" src="../main/img/main_python.png" alt="Python">Python</a></li>
        </ul>
      </div>
    </section>
    <!-- main_section01_search 끝 -->

    <!-- main_section02_starter 시작 -->
    <section class="container main_section02_starter">
      <h2 class="h4 "><a href="product/product_shop_list.php">왕초보를 위한 기초강의 > </a></h2>
      <p><span>HTML & CSS 완전 정복</span></p>
      <!-- example 시작 -->
      <div class="d-flex justify-content-between gap-3">
      <?php
        foreach($rsc as $item){
          $type = $item->level;
          $cate = ""; // 초기값 설정

          // cate 값에 따라 카테고리 설정
          if (strpos($item->cate, '1/') === 0) {
            $cate = 'HTML/CSS';
          } elseif (strpos($item->cate, '2/') === 0) {
            $cate = '프론트엔드';
          } elseif (strpos($item->cate, '3/') === 0) {
            $cate = '백엔드';
          }
          if($type != '숏강의'){ // 일반강의라면
            if($item->price == 0){
              $price = '무료 강의';
            } else {
              $price = '￦ '.$item->price;
            }
          }
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
              <a href="#" class="btn btn-primary fs-10 mt-2"><?= $cate;?></a>
              <a href="#" class="btn btn-primary fs-10 mt-2"><?= $price;?></a>
            </div>
        </div>
        <?php
          }
        ?> 
    </section>
    <!-- main_section02_starter 끝 -->

    <!-- main_section03_shorts 시작 -->
    <section class="container main_section03_shorts">
      <h2 class="h4"><a href="product/product_shop_list.php">3분 이내로 배우는 숏강의 > </a></h2>
      <p><span>강의는 짧고 배움은 길게!</span></p>
    <div class="d-flex justify-content-between gap-3">
      <div class="card sec3 mb-3" style="width: 19.5rem;" data-bs-theme="dark">
        <div class="card-body big-pd">
          <p class="card-title fs-5 fw-bold lh-sm nowrap mb-4">가방끈이 기시네요?
          <br>어머! 숏강의 들었을 뿐인걸요?
          </p>
          <p class="card-text fs-6 mb-4">꼭 필요한 내용만 전달!<br>지루하지 않게 끝까지 몰입 가능!</p>
          <a href="../main/product/product_shop_details_shorts.php" class="btn btn-light br-10 fs-12 pc2 w-100 big-pd d-flex align-items-center justify-content-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z"/>
            </svg>
            <span class="fw-medium mc-gray3">객체 지향 프로그래밍 이해하기</span>
            <span>01:00</span>
          </a>
          <a href="../main/product/product_shop_details_shorts.php" class="btn btn-light br-10 fs-12 pc2 w-100 big-pd d-flex align-items-center justify-content-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M5.795 12.456A.5.5 0 0 1 5.5 12V4a.5.5 0 0 1 .832-.374l4.5 4a.5.5 0 0 1 0 .748l-4.5 4a.5.5 0 0 1-.537.082z"/>
            </svg>
            <span class="fw-medium mc-gray3">React Styled components</span>
            <span>00:30</span>
          </a>
          
        </div>
      </div>
      <div class="card sec3 mb-3" style="width: 19.5rem;" data-bs-theme="dark">
        <div class="card-body big-pd d-flex flex-column justify-content-between">
          <p class="card-title fs-5 fw-bold lh-sm nowrap mb-4">최적화된 학습 방법
          </p>
          <p class="card-text fs-6 mb-4">단조로운 영상 위주의 강의는 놉!<br>재밌고 능동적으로 배우기</p>
          <img src="../main/img/Group576.svg" alt="computer img" class="computerImg align-self-end">
        </div>
      </div>
      <div>
        <iframe width="648" height="413" src="https://www.youtube.com/embed/4BUwV1DcHZA?mute=1" title="streamlit #shorts" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
                <img src="#" alt="#" class="result_img">
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
                <a href="./common.php" class="btn btn-outline-light fs-14 mt-4">나에게 맞는 강의 찾으러 가기</a>
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
            <a href="#" class="btn btn-primary fw-semibold br-20">
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
            <a href="#" class="btn btn-primary fw-semibold br-20">
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
            <a href="#" class="btn btn-primary fw-semibold br-20">
              <span>개발 정보 게시판</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
              <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557z"/>
            </svg></a>
          </div>
        </div>
      </div>
    </section>
    <!-- main_section05_etc 끝 -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>
