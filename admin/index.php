<?php
  $myclass = '<link href="/keepcoding/admin/css/index.css" rel="stylesheet">';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';
  //이번달 총 판매건수

  $sqlA = "SELECT * FROM category WHERE step=2;";
  $resultA = $mysqli->query($sqlA);
  while($rowA = $resultA->fetch_object()){
    $AArr[]=$rowA;
  }

  $totalSaleVolume = 0;

  // 배열의 각 객체를 순회하면서 sale_volume 값을 더함
  foreach ($AArr as $obj) {
    if (isset($obj->sale_volume) && is_numeric($obj->sale_volume)) {
      $totalSaleVolume += intval($obj->sale_volume);
    }
  }

  //대분류별 판매건수

  $sqlB = "SELECT * FROM category WHERE step=1;";
  $resultB = $mysqli->query($sqlB);

  if($resultB->num_rows > 0){
    while($rowB = $resultB->fetch_object()){
      $rowArrB[]=$rowB;
    }
    $namesB = array();
    $volumesB = array();
    foreach($rowArrB as $itemB){
      $nameB = $itemB->name;
      $volumeB = $itemB->sale_volume;
      $namesB[] = $nameB;
      $volumesB[] = $volumeB;
    }
  }

  $jsonNameB = json_encode($namesB);
  $jsonVolumeB = json_encode($volumesB);

  //이번달 총 판매액 계산

  $cleanedArray = array_map(function($item) {
    return str_replace('"', '', $item);
  }, $volumesB);

  $intArray = array_map('intval', $cleanedArray);
  $level1 = $intArray[0] * 10000;
  $level2 = $intArray[1] * 20000;
  $level3 = $intArray[2] * 20000;
  $levelTotal = $level1+$level2+$level3;

  //소분류별 판매건수
  //초급
  $sqlS1 = "SELECT * FROM category WHERE step=3 AND name='초급'";
  $resultS1 = $mysqli->query($sqlS1);

  $totalSaleVolumeS1 = 0;

  if($resultS1->num_rows > 0){
    while($rowS1 = $resultS1->fetch_object()){
      $rowArrS1[]=$rowS1;
  }}

  $volumesS1 = array();

  foreach($rowArrS1 as $itemS1){
    if(isset($itemS1->sale_volume) && is_numeric($itemS1->sale_volume)){
      $totalSaleVolumeS1 += intval($itemS1->sale_volume);
    }
  }

  $level1 = json_encode($totalSaleVolumeS1);

  //소분류별 판매건수
  //중급
  $sqlS2 = "SELECT * FROM category WHERE step=3 AND name='중급'";
  $resultS2 = $mysqli->query($sqlS2);

  $totalSaleVolumeS2 = 0;

  if($resultS2->num_rows > 0){
    while($rowS2 = $resultS2->fetch_object()){
      $rowArrS2[]=$rowS2;
  }}

  $volumesS2 = array();

  foreach($rowArrS2 as $itemS2){
    if(isset($itemS2->sale_volume) && is_numeric($itemS2->sale_volume)){
      $totalSaleVolumeS2 += intval($itemS2->sale_volume);
    }
  }

  $level2 = json_encode($totalSaleVolumeS2);

  //소분류별 판매건수
  //고급
  $sqlS3 = "SELECT * FROM category WHERE step=3 AND name='고급'";
  $resultS3 = $mysqli->query($sqlS3);

  $totalSaleVolumeS3 = 0;

  if($resultS3->num_rows > 0){
    while($rowS3 = $resultS3->fetch_object()){
      $rowArrS3[]=$rowS3;
  }}

  $volumesS3 = array();

  foreach($rowArrS3 as $itemS3){
    if(isset($itemS3->sale_volume) && is_numeric($itemS3->sale_volume)){
      $totalSaleVolumeS3 += intval($itemS3->sale_volume);
    }
  }

  $level3 = json_encode($totalSaleVolumeS3);

  //프론트엔드 - 중분류 판매건수

  $sql = "SELECT * FROM category WHERE step=2 AND pcid=2;";
  $result = $mysqli->query($sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_object()){
      $rowArr[]=$row;
    }
    $names = array();
    $volumes = array();
    foreach($rowArr as $item){
      $name = $item->name;
      $volume = $item->sale_volume;
      $names[] = $name;
      $volumes[] = $volume;
    }

  }

  $jsonName = json_encode($names);
  $jsonVolume = json_encode($volumes);

  //기초강의 - 중분류 판매건수

  $sql2 = "SELECT * FROM category WHERE step=2 AND pcid=1;";
  $result2 = $mysqli->query($sql2);

  if($result2->num_rows > 0){
    while($row2 = $result2->fetch_object()){
      $rowArr2[]=$row2;
    }
    $names2 = array();
    $volumes2 = array();
    foreach($rowArr2 as $item2){
      $name2 = $item2->name;
      $volume2 = $item2->sale_volume;
      $names2[] = $name2;
      $volumes2[] = $volume2;
    }

  }

  $jsonName2 = json_encode($names2);
  $jsonVolume2 = json_encode($volumes2);

  //백엔드 - 중분류 판매건수

  $sql3 = "SELECT * FROM category WHERE step=2 AND pcid=3;";
  $result3 = $mysqli->query($sql3);

  if($result3->num_rows > 0){
    while($row3 = $result3->fetch_object()){
      $rowArr3[]=$row3;
    }
    $names3 = array();
    $volumes3 = array();
    foreach($rowArr3 as $item3){
      $name3 = $item3->name;
      $volume3 = $item3->sale_volume;
      $names3[] = $name3;
      $volumes3[] = $volume3;
    }

  }

  $jsonName3 = json_encode($names3);
  $jsonVolume3 = json_encode($volumes3);

  //쿠폰갯수 조회
  //전체 쿠폰 갯수
  $cQueryA = "SELECT COUNT(*) AS cnt FROM coupons;";
  $cResultA = $mysqli->query($cQueryA);

  if ($cResultA->num_rows > 0) {
    // 결과에서 값을 가져옴
    $rowA = $cResultA->fetch_assoc();
    $cntA = $rowA["cnt"];
  } else {
      $cntA = 0; // 결과가 없을 경우 기본값 설정
  }
  //비활성화 쿠폰 갯수
  $cQuery0 = "SELECT COUNT(*) AS cnt FROM coupons WHERE status=0;";
  $cResult0 = $mysqli->query($cQuery0);

  if ($cResult0->num_rows > 0) {
    // 결과에서 값을 가져옴
    $row0 = $cResult0->fetch_assoc();
    $cnt0 = $row0["cnt"];
  } else {
      $cnt0 = 0; // 결과가 없을 경우 기본값 설정
  }
  //활성화 쿠폰 갯수
  $cQuery1 = "SELECT COUNT(*) AS cnt FROM coupons WHERE status=1;";
  $cResult1 = $mysqli->query($cQuery1);

  if ($cResult1->num_rows > 0) {
    // 결과에서 값을 가져옴
    $row1 = $cResult1->fetch_assoc();
    $cnt1 = $row1["cnt"];
  } else {
      $cnt1 = 0; // 결과가 없을 경우 기본값 설정
  }
  //만료임박 쿠폰 갯수
  $cQueryT = "SELECT COUNT(*) AS cnt FROM coupons WHERE duedate <= DATE_ADD(CURDATE(), INTERVAL 1 MONTH);";
  $cResultT = $mysqli->query($cQueryT);

  if ($cResultT->num_rows > 0) {
    // 결과에서 값을 가져옴
    $rowT = $cResultT->fetch_assoc();
    $cntT = $rowT["cnt"];
  } else {
      $cntT = 0; // 결과가 없을 경우 기본값 설정
  }


?>
<style>
  body{
    background-Color: var(--mc-gray2);
  }
</style>
<!-- 이은서 index 시작-->
<body>
<div class="content">
  <h4 class="pd72 fs-4 fw-bold">홈</h4>
  <h6 class="pd24 fw-bold">이번달 판매 현황</h6>
  <div class="sell_report pd48 row">
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>판매 강좌 수</span>
      <span data-num="0" class="pc2">총 <?= $totalSaleVolume ?> 건</span>
      <i class="bi bi-arrow-up-circle pc2"></i>
    </div>
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>총 판매액</span>
      <span data-num="0" class="pc2"><span class="pc2 number"><?= $levelTotal ?></span> 원</span>
      <i class="bi bi-arrow-up-circle pc2"></i>
    </div>
    <div class="col callout bd-callout d-flex justify-content-between align-items-center">
      <span>직전달 대비 수익율</span>
      <span data-num="0" class="pc2">38 %</span>
      <i class="bi bi-arrow-up-circle pc2"></i>
    </div>
  </div>
  <div class="member row pd48 gap-4">
    <div class="col kcard d-flex align-items-center justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-person pc2" viewBox="0 0 16 16">
        <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
        <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
      </svg>
      <div class="kcard_text">
        <p class="fw-bold mc-gray1 pd10">총 수강생 수</p>
        <p class="fw-bold pc2 d-flex gap-1"><span class="fw-bold pc2 number">113029</span>명</p>
      </div>
    </div>
    <div class="col kcard d-flex align-items-center justify-content-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-award pc2" viewBox="0 0 16 16">
        <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
        <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
      </svg>
      <div class="kcard_text">
        <p class="fw-bold mc-gray1 pd10">완강률</p>
        <p data-num="0" class="fw-bold pc2">92 %</p>
      </div>
    </div>
    <div class="col d-flex flex-column kcard align-items-center justify-content-center">
      <p class="fw-bold">수강생 총 만족도</p>
      <div class="smile_icons d-flex gap-2">
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
        <i class="bi bi-emoji-smile i-fill"></i>
      </div>
    </div>
  </div>
  <div class="row like_report pd48 gap-4">
    <div class="col kcard">
      <h6 class="mc-gray1 text-center">분야별 판매량</h6>
          <div class="chart-container">
            <canvas id="bar-chartB"></canvas>
          </div>
    </div>
    <div class="col kcard">
      <h6 class="mc-gray1 text-center">난이도별 판매량</h6>
          <div class="chart-container">
            <canvas id="bar-chartL"></canvas>
          </div>
    </div>
  </div>
  <div class="row like_report pd48 gap-4">
    <div class="col kcard">
      <h6 class="mc-gray1 text-center">언어별 판매량</h6>
      <div class="charts d-flex justify-content-between">
        <div class="chart d-flex flex-column gap-3">
          <p class="mc-gray1 text-center fw-bold">기초 강의</p>
          <div class="chart-container">
            <canvas id="pie-chart2"></canvas>
          </div>
        </div>
        <div class="chart d-flex flex-column gap-3">
          <p class="mc-gray1 text-center fw-bold">프론트엔드</p>
          <div class="chart-container">
            <canvas id="pie-chart"></canvas>
          </div>
        </div>
        <div class="chart d-flex flex-column gap-3">
          <p class="mc-gray1 text-center fw-bold">백엔드</p>
          <div class="chart-container">
            <canvas id="pie-chart3"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="coupon_report kcard big d-flex align-items-center justify-content-center gap-5">
    <i class="bi bi-ticket-fill pc2"></i>
    <div class="d-flex gap-5">
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">전체 쿠폰 갯수</p>
        <span class="pc2 fw-bold">
          <?= $cntA ?>
          개
        </span>
      </div>
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">활성화 쿠폰 갯수</p>
        <span class="pc2 fw-bold">
          <?= $cnt0 ?>
          개
        </span>
      </div>
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">비활성화 쿠폰 갯수</p>
        <span class="pc2 fw-bold">
        <?= $cnt1 ?>
          개
        </span>
      </div>
      <div class="c_report d-flex gap-4">
        <p class="fw-bold">만료임박 쿠폰 갯수</p>
        <span class="pc2 fw-bold">
          <?= $cntT ?>
          개
        </span>
      </div>
    </div>
  </div>
</div>

<!-- 이은서 index 끝-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  //대분류 차트

  var nameB = <?php echo $jsonNameB; ?>;
  var volumeB = <?php echo $jsonVolumeB; ?>;

  const dataB = {
    labels: nameB,
    datasets: [{
      label: ' 대분류 판매량 기준',
      data: volumeB,
      backgroundColor: [
        '#4E75FF',
        '#9EC5FE',
        '#0AA2C0'
      ],
      borderColor: [
        '#4E75FF',
        '#9EC5FE',
        '#0AA2C0'
      ],
      borderWidth: 1
    }]
  };


const configB = {
  type: 'bar',
  data: dataB,
  options: {
    maintainAspectRatio:false,
    indexAxis:'y',
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
let ctx = document.getElementById('bar-chartB');
const stackedBar = new Chart(ctx, configB);

  //프론트엔드 - 중분류 차트

  var name = <?php echo $jsonName; ?>;
  var volume = <?php echo $jsonVolume; ?>;
  console.log(typeof(volume));
  console.log(volume);
  var names = name.split(',');

  const data = {
  labels: names,
  datasets: [{
    label: ' 판매 건수 기준',
    data: volume,
    backgroundColor: [
      '#4E75FF',
      '#9EC5FE',
      '#0AA2C0'
    ],
    hoverOffset: 4
  }]
  };

const config = {
  type: 'pie',
  data: data,
  options:{
    maintainAspectRatio:false,
  }
};

const myPieChart = new Chart(
  document.getElementById('pie-chart'),
  config
);

  //기초강의 - 중분류 차트
  
  var name2 = <?php echo $jsonName2; ?>;
  var volume2 = <?php echo $jsonVolume2; ?>;
  console.log(typeof(volum2));
  console.log(volume2);


  const data2 = {
  labels: name2,
  datasets: [{
    label: ' 판매 건수 기준',
    data: volume2,
    backgroundColor: [
      '#4E75FF',
      '#9EC5FE',
      '#0AA2C0'
    ],
    hoverOffset: 4
  }]
  };

const config2 = {
  type: 'pie',
  data: data2,
  options:{
    maintainAspectRatio:false,
  }
};

const myPieChart2 = new Chart(
  document.getElementById('pie-chart2'),
  config2
);

  //백엔드 - 중분류 차트
  
  var name3 = <?php echo $jsonName3; ?>;
  var volume3 = <?php echo $jsonVolume3; ?>;
  console.log(typeof(volume3));
  console.log(volume3);


  const data3 = {
  labels: name3,
  datasets: [{
    label: ' 판매 건수 기준',
    data: volume3,
    backgroundColor: [
      '#4E75FF',
      '#9EC5FE',
      '#0AA2C0'
    ],
    hoverOffset: 4
  }]
  };

const config3 = {
  type: 'pie',
  data: data3,
  options:{
    maintainAspectRatio:false,
  }
};

const myPieChart3 = new Chart(
  document.getElementById('pie-chart3'),
  config3
);

//소분류 차트

var level1 = <?php echo $level1; ?>;
var level2 = <?php echo $level2; ?>;
var level3 = <?php echo $level3; ?>;

  const dataL = {
    labels: ['초급','중급','고급'],
    datasets: [{
      label: ' 소분류 판매량 기준',
      data: [level1, level2, level3],
      backgroundColor: [
        '#4E75FF',
        '#9EC5FE',
        '#0AA2C0'
      ],
      borderColor: [
        '#4E75FF',
        '#9EC5FE',
        '#0AA2C0'
      ],
      borderWidth: 1
    }]
  };


const configL = {
  type: 'bar',
  data: dataL,
  options: {
    maintainAspectRatio:false,
    indexAxis:'y',
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
let ctxL = document.getElementById('bar-chartL');
const stackedBarL = new Chart(ctxL, configL);


</script>

<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>