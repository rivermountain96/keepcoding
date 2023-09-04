
<?php
  $title = '제품 목록';

  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/category_func.php';


//SQL 쿼리를 통해 데이터를 조회
$sql = "SELECT * FROM products where 1=1";
$order = " order by pid desc";//최근순 정렬


  $cates1 = $_GET['cate1'] ?? '';
  $cate2 = $_GET['cate2'] ?? '';
  $cate3 = $_GET['cate3'] ?? '';
  $search_keyword = $_GET['search_keyword'] ?? '';
  $result = $mysqli->query($sql);
  $cates = $cates1.$cate2.$cate3;
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }

  $search_where = '';
  $cate = '';
  $sql .= $search_where;

// 카테고리 검색

if($search_keyword){
  $search_where .= " and (name like '%{$search_keyword}%' or content like '%{$search_keyword}%')";
  //제목과 내용에 키워드가 포함된 상품 조회
}
if($cates){
  $search_where .= " and cate like '{$cate}%'";
}


//페이지네이션

  $pagenationTarget = 'products';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/pagenation.php';
      
  $limit = " limit $startLimit, $endLimit";
  // $limit = " limit 0, 10";
  $query = $sql.$order.$limit;
var_dump($query);
  $result = $mysqli -> query($query);
  

  
  while($rs = $result -> fetch_object()){
    $rsc[] = $rs;
  }
  ?>

  <!-- 박민용 product_list 시작 -->

  <div class="  content mcbg-white">
    <h2 class=" h4 pd72">강의 리스트</h2>

    <!-- product_list_sec1 강의리스트 카테고리 -->



    <form action="" class="mt-5 pd48" id="search_form">
    <div class="row">
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>
          <?php
          foreach($cate1 as $c){            
        ?>
          <option value="<?php echo $c->cid ?>"><?php echo $c->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
          <option selected disabled>중분류</option>
         
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
          
        </select>
      </div>
    </div>

  </form>


    <!-- <div class=" product_list_sec1 row pd48">
      <div class="col">
        <select class="form-select" aria-label="Default select example" id="cate1" name="cate1">
          <option selected disabled>대분류</option>

          <option>기초강의</option>
          <option>프론트엔드</option>
          <option>백엔드</option>

        </select>
      </div>

      <div class="col">
        <select class="form-select" aria-label="Default select example" id="cate2" name="cate2">
          <option selected disabled>중분류</option>
          <option>HTML</option>
          <option>CSS</option>
          <option>Node.js</option>
          <option>React</option>
          <option>jquery</option>
          <option>JavaScript</option>
          <option>Java</option>
          <option>Python</option>
          <option>C++</option>
          <option>Spring</option>
          <option>PHP</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-select" aria-label="Default select example" id="cate3" name="cate3">
          <option selected disabled>소분류</option>
          <option>초급</option>
          <option>중급</option>
          <option>고급</option>
        </select>
      </div>
    </div> -->
    </nav>

    <!-- product_list_sec2 검색단 -->

    <form class="product_list_sec2 d-flex pd48 " id="search_form">
      <input class="form-control me-2" type="search" placeholder="강좌명으로 검색하기" name="search_keyword" id="search_keyword" aria-label="Search">
      <button class="btn btn-outline-primary btn-sm col-sm-1" type="submit">강좌검색 </button>
    </form>


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

        <tr>
          <th scope="row"> <a href="product_view.php?pid=<?php echo $item->pid ?>"><?php echo $item->name ?></a></th>
          <td><?php 
          if($item -> status == 1){
            echo '판매중';
          } else if ($item -> status == 2){
            echo '판매중지';
          } 
          ?></td>
          <td><?php echo $item->cate ?></td>

          
          <td><?php echo '₩' . number_format($item->price); ?></td>
      
          <td><a href="product_change.php?pid=<?php echo $item->pid ?>" class="btn btn-outline-primary">수정</a></td>
          <td><a href="product_del.php?pid=<?php echo $item->pid ?>"  class="btn btn-outline-primary">삭제</a></td>
        </tr>

        <?php
          }
        } else {
      ?>
  <tr>
          <td colspan="10"> </td>
        </tr>
        <?php
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
            echo "<li class=\"page-item\"><a href=\"?pageNumber=$total_page\" class=\"page-link\"></a></li>";
          }
        ?>           
      </ul>

      <!-- 강의등록 -->

      <td><a href="/keepcoding/admin/product/product_up.php" class="btn btn-primary">등록</a></td>
    </div>


    <!-- 박민용 product_list 끝 -->



<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>



