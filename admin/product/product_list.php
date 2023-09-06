
<?php
  $title = '강좌 목록';

  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/category_func.php';


//SQL 쿼리를 통해 데이터를 조회
$sql = "SELECT * FROM products where 1=1";
$order = " order by pid desc";//최근순 정렬


$cates1 = $_GET['cate1'] ?? '';
$cate2 = $_GET['cate2'] ?? '';
$cate3 = $_GET['cate3'] ?? '';
$search_keyword = $_GET['search_keyword'] ?? '';
$search_where = '';
$cate = '';

$cates = $cates1.$cate2.$cate3;


// 카테고리 검색

if($search_keyword){
$search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
//제목과 내용에 키워드가 포함된 상품 조회
}
if($cates){
$search_where .= " and cate like '{$cates}%'"; //조건
}
$sql .= $search_where;//쿼리조합

// var_dump($query);



//페이지네이션

  $pagenationTarget = 'products';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/pagenation.php';
      
  $limit = " limit $startLimit, $endLimit";
  // $limit = " limit 0, 10";
  $query = $sql.$order.$limit;


  // select * from 테이블이름 where 검색조건1 and 검색조건2 and 검색조건3 order by pid desc limit (페이지번호-1) * 10, 10; 
  $result = $mysqli -> query($query);
  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }

  ?>


  <!-- 박민용 product_list 시작 -->

  <div class="content mcbg-white">
    <h2 class="fs-4 pd72">강좌 관리</h2>

    <!-- product_list_sec1 강의리스트 카테고리 -->


    <div class="product_list_sec1 row pd48 gap-3">
        <div class="col p-0">
        <select class="form-select form-select-lg"  aria-label="Default select example" id="cate1" name="cate1">
          <option selected value="0" disabled>대분류</option>
          <?php
          foreach($cate1 as $c){            
        ?>
          <option value="<?php echo $c->cid ?>" data-step="<?php echo $c->step ?>"><?php echo $c->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col p-0">
      <select class="form-select form-select-lg" aria-label="Default select example" id="cate2" name="cate2">
          <option selected  value="0" disabled>중분류</option>
        
        </select>
      </div>
      <div class="col p-0">
      <select class="form-select form-select-lg" aria-label="Default select example" id="cate3" name="cate3">
          <option selected  value="0" disabled>소분류</option>
          
        </select>
      </div>
    </div>

  </form>


    </nav>

    <!-- product_list_sec2 검색단 -->

    <form class="product_list_sec2 d-flex pd48 gap-3 " id="search_form">
      <input type="hidden" name="step" id="step">
      <input type="hidden" name="cate_name" id="cate_name">
      <input class="form-control me-2" type="search" placeholder="강좌명으로 검색하기" name="search_keyword" id="search_keyword" aria-label="Search">
      
      <button class="btn btn-outline-primary btn col-sm-1" type="submit">강좌검색 </button>
    </form>
<?php




?>
    <!-- product_list_sec3 강좌내용 테이블 -->


    <table class=" product_list_sec3 table pd48">
      <thead>
        <tr>
          <th scope="col" class="fw-bold col-4">강좌명</th>
          <th scope="col" class="fw-bold col-1.5">상태</th>
          <th scope="col" class="fw-bold col-3">카테고리</th>
          <th scope="col" class="fw-bold col-1.5">가격</th>
          <th scope="col" class="fw-bold col-1">수정</th>
          <th scope="col" class="fw-bold col-1">삭제</th>
        </tr>
      </thead>
      <tbody>

    <?php

            if(isset($rsc)){
              foreach($rsc as $item){      
 
            ?>


        <tr scope="row">

          <th> <a href="product_view.php?pid=<?php echo $item->pid ?>"><?php echo $item->name ?></a></th>
          
          <td ><?php 
          if($item -> status == 0){
            echo '판매중';
          } else if ($item -> status == 1){
            echo '판매중지';
          } 
          ?></td>

          <td><?php 
          
          
          // $cids = explode('/', $item->cate);
          // $conditions = implode(' OR ', array_map(function ($cid) {
          //   return "cid = " . (int)$cid;
          //   }, $cids));
          // $query = "SELECT `name` FROM category WHERE $conditions ORDER BY step ASC";


          $cids = (explode('/', $item-> cate ));
          $query = "select `name` from category where cid=".$cids[0]." or cid=".$cids[1]." or cid=".$cids[2]." order by step asc"; //step이 1~3 오름차순
          $names = array();

          $result = $mysqli->query($query);
          if (!$result) {
            echo "쿼리 실행 오류: " . $mysqli->error;
          } else {
            // 나머지 코드
          
          while($row = $result->fetch_object())
          {
            $names[]= $row->name;
          }
    
          echo implode('>',$names);
        }
          ?></td>

          <td><?php echo '₩' . number_format($item->price); ?></td>
      
          <td><a href="product_change.php?pid=<?php echo $item->pid ?>" class="btn btn-outline-primary">수정</a></td>
          <td><a href="product_del.php?pid=<?php echo $item->pid ?>"  class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <?php
            }
          }   
        ?>

        <div>

        </div>

      </tbody>
    </table>


    <!-- product_list_pagenation 페이지네이션 -->

    <div class="d-flex justify-content-between align-items-center">

    <ul id="pagenation" class="pagination mx-auto" aria-label="Page navigation example">
    <?php
    if ($pageNumber > 1) {
        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"?pageNumber=1\">이전</a></li>";
        if ($block_num > 1) {
            $prev = ($block_num - 2) * $block_ct + 1;
            echo "<li class=\"page-item\"><a href='?pageNumber=$prev' class=\"page-link\">이전</a></li>";
        }
    } else {
        echo "<li class=\"page-item disabled\"><span class=\"page-link\">이전</span></li>";
  
    }

    for ($i = $block_start; $i <= $block_end; $i++) {
        if ($pageNumber == $i) {
            echo "<li class=\"page-item active\" aria-current=\"page\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
        } else {
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$i\" class=\"page-link\">$i</a></li>";
        }
    }

    if ($pageNumber < $total_page) {
        if ($total_block > $block_num) {
            $next = $block_num * $block_ct + 1;
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$next\" class=\"page-link\">다음</a></li>";
        }
        echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\">다음</a></li>";
    } else {
        echo "<li class=\"page-item disabled\"><span class=\"page-link\">다음</span></li>";
        

    }
    ?>
</ul>

      <!-- 강의등록 -->

      <td><a href="/keepcoding/admin/product/product_up.php" class="btn btn-primary">등록</a></td>
    </div>

 
<script> 
$("#cate1").on("change", function () {
  console.log("click");
  makeOption($(this), 2, $("#cate2"));
}); //cate1 change

$("#cate2").on("change", function () {
  makeOption($(this), 3, $("#cate3"));
}); //cate2 change


function makeOption(evt, step, target) {
  let cid = evt.val();
  console.log(cid);


  $.ajax({
    async: false, //sucess의 결과 나오면 이후 작업 수행
    type: "_GET", //변수명cate1의 값을 전달할 방식 post
    url: "printOption.php?cate=" + cid + "&step=" + step,
    dataType: "html", //success성공후 printOption.php가 반환하는 데이터의 형식  <option></option>
    success: function (result) {
      console.log(result);
      target.html(result);
    },
  }); //ajax
}


$('#search_form').submit(function(){
  let cateOps = $('.product_list_sec1 option:selected:not([disabled])');

  $(cateOps).each(function(){
    let item = $(this); 

      let catename = item.text();
    let step = item.attr('data-step');

      $('#step').val(step);
    $('#cate_name').val(catename);


  });
});

</script>

    <!-- 박민용 product_list 끝 -->

<!-- <script src="/keepcoding/admin/js/makeoption.js"> </script> -->


<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>