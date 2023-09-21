<?php
  $title =  '강의 상세보기';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

  $pid = $_GET['pid'];
  
  $sql = "SELECT * FROM products WHERE pid=$pid";
  $result = $mysqli->query($sql);
  while($rs = $result->fetch_object()){
    $rsc[] = $rs;
  }
?>
  <section class="container">
    <h2 class="h4 pshop_details_title">상세보기</h2>
    <?php
      foreach($rsc as $item){
        $type = $item->level;
        if($type != '숏강의'){ // 일반강의라면

          $cate = $item->cate;
          $cateNum = explode('/', $cate);
          $bigCate = $cateNum[0]; // 대분류
          $midCate = $cateNum[1]; // 중분류
          $smCate = $item->level; // 소분류

          $sql2 = "SELECT name FROM category WHERE cid=$bigCate";
          $result2 = $mysqli->query($sql2);
          while($rs2 = $result2->fetch_object()){
            $rsc2[] = $rs2;
          }

          foreach($rsc2 as $item2){
            $bcn = $item2->name;
          }

          $sql3 = "SELECT name FROM category WHERE cid=$midCate";
          $result3 = $mysqli->query($sql3);
          while($rs3 = $result3->fetch_object()){
            $rsc3[] = $rs3;
          }

          foreach($rsc3 as $item3){
            $mcn = $item3->name;
          }
    ?>
      <div class="pshop_details_01 d-flex gap-5">
        <img src="<?= $item-> thumbnail ?>" alt="<?= $item-> name?>" class="shadow-sm">
        <div class="col pshop_details_text">
          <img class="cate_icon" src="/keepcoding/main/img/main_<?= $mcn ?>.png" alt="">
          <h3 class="h4"><?= $item-> name?></h3>
          <p class="mc-gray4">
            <?= $bcn.'>'.$mcn.'>'.$smCate ?>
          </p>
          <p class="pshop_details_01_contetn"><?= $item-> product_intro ?></p>
          <p class="h4 d-flex justify-content-end pshop_details_price gap-2">

          </p>
        </div>
      </div>

    <div class="pshop_details_02 d-flex justify-content-between">
      <div class="d-flex gap-2">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 21C10.5 21 9 21 9 19.5C9 18 10.5 13.5 16.5 13.5C22.5 13.5 24 18 24 19.5C24 21 22.5 21 22.5 21H10.5ZM16.5 12C17.6935 12 18.8381 11.5259 19.682 10.682C20.5259 9.83807 21 8.69347 21 7.5C21 6.30653 20.5259 5.16193 19.682 4.31802C18.8381 3.47411 17.6935 3 16.5 3C15.3065 3 14.1619 3.47411 13.318 4.31802C12.4741 5.16193 12 6.30653 12 7.5C12 8.69347 12.4741 9.83807 13.318 10.682C14.1619 11.5259 15.3065 12 16.5 12ZM7.824 21C7.60163 20.5317 7.49074 20.0183 7.5 19.5C7.5 17.4675 8.52 15.375 10.404 13.92C9.46364 13.6303 8.48392 13.4886 7.5 13.5C1.5 13.5 0 18 0 19.5C0 21 1.5 21 1.5 21H7.824ZM6.75 12C7.74456 12 8.69839 11.6049 9.40165 10.9017C10.1049 10.1984 10.5 9.24456 10.5 8.25C10.5 7.25544 10.1049 6.30161 9.40165 5.59835C8.69839 4.89509 7.74456 4.5 6.75 4.5C5.75544 4.5 4.80161 4.89509 4.09835 5.59835C3.39509 6.30161 3 7.25544 3 8.25C3 9.24456 3.39509 10.1984 4.09835 10.9017C4.80161 11.6049 5.75544 12 6.75 12Z" fill="#212529"/>
        </svg>
        <p><?= $item -> sale_cnt ?></p>
      </div>
      <div class="d-flex justify-content-between p-0">
        <p class="h4 pshop_details_02_price">
          <?php
            if($item->price == 0){
              $price = '무료 강의';
              $echo = $price;
            }else{
              $price = $item->price;
              $echo = "<span>￦</span><span class=\"number\">$price</span>";
            }
            echo $echo;
          ?>
        </p>
        <button class="insert btn btn-lg btn-primary fs-6 h6" data-pid="<?= $item->pid; ?>">장바구니 담기</button>
      </div>
    </div>

    <div class="pshop_details_03">
      <?= $item->content ?>
    </div>
    <?php
        }else{ //숏강의라면
    ?>
        <div class="pshop_details_01 d-flex gap-5">
          <iframe width="647" height="406" class="shadow" src="<?= $item -> video_url ?>" title="streamlit #shorts" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          <!-- <img src="../img/example08.png" alt="" > -->
          <div class="col pshop_details_text">
            <img class="cate_icon" src="/keepcoding/main/img/shorts_shortsicon.png" alt="">
            <h3 class="h4">[SHORTS] <?= $item -> name ?></h3>
            <p class="mc-gray4"><?= $item -> level ?></p>
          </div>
        </div>
        <div class="pshop_details_02 pshop_details_02_shorts d-flex justify-content-between">
          <div class="d-flex gap-2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 21C10.5 21 9 21 9 19.5C9 18 10.5 13.5 16.5 13.5C22.5 13.5 24 18 24 19.5C24 21 22.5 21 22.5 21H10.5ZM16.5 12C17.6935 12 18.8381 11.5259 19.682 10.682C20.5259 9.83807 21 8.69347 21 7.5C21 6.30653 20.5259 5.16193 19.682 4.31802C18.8381 3.47411 17.6935 3 16.5 3C15.3065 3 14.1619 3.47411 13.318 4.31802C12.4741 5.16193 12 6.30653 12 7.5C12 8.69347 12.4741 9.83807 13.318 10.682C14.1619 11.5259 15.3065 12 16.5 12ZM7.824 21C7.60163 20.5317 7.49074 20.0183 7.5 19.5C7.5 17.4675 8.52 15.375 10.404 13.92C9.46364 13.6303 8.48392 13.4886 7.5 13.5C1.5 13.5 0 18 0 19.5C0 21 1.5 21 1.5 21H7.824ZM6.75 12C7.74456 12 8.69839 11.6049 9.40165 10.9017C10.1049 10.1984 10.5 9.24456 10.5 8.25C10.5 7.25544 10.1049 6.30161 9.40165 5.59835C8.69839 4.89509 7.74456 4.5 6.75 4.5C5.75544 4.5 4.80161 4.89509 4.09835 5.59835C3.39509 6.30161 3 7.25544 3 8.25C3 9.24456 3.39509 10.1984 4.09835 10.9017C4.80161 11.6049 5.75544 12 6.75 12Z" fill="#212529"/>
            </svg>
            <p><?= $item -> sale_cnt ?></p>
          </div>
          <button class="btn btn-primary fs-6 h6" onclick="location.href='/keepcoding/main/product/product_shop_list.php';">강의탐색으로 돌아가기</button>
          <!-- <button class="btn btn-lg btn-primary fs-6 h6 disabled">숏강의는 결제없이 바로 무료수강</button> -->
        </div>
    <?php
        }}
    ?>
  </section>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
  ?>
  <script>
    // 장바구니 담기
     $('.insert').click(function(e){ 
          e.preventDefault();
          let pid = '<?php echo $pid; ?>';

          let data = {
          pid : pid
        }

        // console.log(data);

        $.ajax({
                  async:false,
                  type:'post',
                  url:'product_cart_insert.php',
                  data: data,
                  dataType:'json',
                  error:function(error){
                      console.log(error);
                  },
                  success:function(data){
                      if(data.result == 'ok'){
                          alert('장바구니에 추가되었습니다.');
                      } else{
                          alert('장바구니 담기 실패');
                      }
                  }
              });

      });
  </script>
