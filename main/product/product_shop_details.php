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
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="insert btn btn-lg btn-primary fs-6 h6" data-pid="<?= $item->pid; ?>">장바구니 담기</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title fs-5" id="exampleModalLabel">장바구니 담기</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                <div class="modal-svg d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M50 7.8125C50 7.3981 49.8354 7.00067 49.5424 6.70765C49.2493 6.41462 48.8519 6.25 48.4375 6.25H43.75C43.4015 6.2501 43.063 6.36672 42.7883 6.58133C42.5137 6.79593 42.3187 7.0962 42.2344 7.43437L40.9688 12.5H4.6875C4.45016 12.5001 4.21596 12.5542 4.00266 12.6583C3.78936 12.7624 3.60259 12.9137 3.4565 13.1007C3.31041 13.2878 3.20885 13.5057 3.15954 13.7378C3.11022 13.97 3.11444 14.2103 3.17188 14.4406L7.85938 33.1906C7.94372 33.5288 8.13871 33.8291 8.41334 34.0437C8.68797 34.2583 9.02647 34.3749 9.375 34.375H37.5C37.8485 34.3749 38.187 34.2583 38.4617 34.0437C38.7363 33.8291 38.9313 33.5288 39.0156 33.1906L44.9688 9.375H48.4375C48.8519 9.375 49.2493 9.21038 49.5424 8.91735C49.8354 8.62433 50 8.2269 50 7.8125ZM40.1875 15.625L38.625 21.875H34.375V15.625H40.1875ZM31.25 15.625V21.875H25V15.625H31.25ZM21.875 15.625V21.875H15.625V15.625H21.875ZM12.5 15.625V21.875H8.25L6.6875 15.625H12.5ZM9.03125 25H12.5V31.25H10.5938L9.03125 25ZM15.625 25H21.875V31.25H15.625V25ZM25 25H31.25V31.25H25V25ZM34.375 25H37.8438L36.2813 31.25H34.375V25ZM34.375 40.625C35.2038 40.625 35.9987 40.9542 36.5847 41.5403C37.1708 42.1263 37.5 42.9212 37.5 43.75C37.5 44.5788 37.1708 45.3737 36.5847 45.9597C35.9987 46.5458 35.2038 46.875 34.375 46.875C33.5462 46.875 32.7513 46.5458 32.1653 45.9597C31.5792 45.3737 31.25 44.5788 31.25 43.75C31.25 42.9212 31.5792 42.1263 32.1653 41.5403C32.7513 40.9542 33.5462 40.625 34.375 40.625ZM40.625 43.75C40.625 42.0924 39.9665 40.5027 38.7944 39.3306C37.6223 38.1585 36.0326 37.5 34.375 37.5C32.7174 37.5 31.1277 38.1585 29.9556 39.3306C28.7835 40.5027 28.125 42.0924 28.125 43.75C28.125 45.4076 28.7835 46.9973 29.9556 48.1694C31.1277 49.3415 32.7174 50 34.375 50C36.0326 50 37.6223 49.3415 38.7944 48.1694C39.9665 46.9973 40.625 45.4076 40.625 43.75ZM12.5 40.625C13.3288 40.625 14.1237 40.9542 14.7097 41.5403C15.2958 42.1263 15.625 42.9212 15.625 43.75C15.625 44.5788 15.2958 45.3737 14.7097 45.9597C14.1237 46.5458 13.3288 46.875 12.5 46.875C11.6712 46.875 10.8763 46.5458 10.2903 45.9597C9.70424 45.3737 9.375 44.5788 9.375 43.75C9.375 42.9212 9.70424 42.1263 10.2903 41.5403C10.8763 40.9542 11.6712 40.625 12.5 40.625ZM18.75 43.75C18.75 42.0924 18.0915 40.5027 16.9194 39.3306C15.7473 38.1585 14.1576 37.5 12.5 37.5C10.8424 37.5 9.25269 38.1585 8.08059 39.3306C6.90848 40.5027 6.25 42.0924 6.25 43.75C6.25 45.4076 6.90848 46.9973 8.08059 48.1694C9.25269 49.3415 10.8424 50 12.5 50C14.1576 50 15.7473 49.3415 16.9194 48.1694C18.0915 46.9973 18.75 45.4076 18.75 43.75Z" fill="#343A40"/>
                  </svg>
                </div>
                <span class="modal-body-tt">장바구니에 강의가 정상적으로 담겼습니다</span>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-secondary fw-semibold" data-bs-dismiss="modal" onclick="location.href='/keepcoding/main/cart/cart.php';">장바구니 이동</button>
                <button class="btn btn-primary fw-semibold" onclick="location.href='/keepcoding/main/product/product_shop_list.php';">강의 계속 탐색하기</button>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>

    

  
    <div class="pshop_details_03">
      <?= $item->content ?>
    </div>

    <div class="d-flex justify-content-end pshop_details_04">
      <button class="btn btn-primary fs-6 h6" onclick="location.href='/keepcoding/main/product/product_shop_list.php';">강의탐색으로 돌아가기</button>
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
        </div>
    <?php
        }}
    ?>
  </section>
  <script>
    // 장바구니 담기
     $('.insert').click(function(e){ 
          e.preventDefault();
          let pid = '<?php echo $pid; ?>';

          let data = {
          pid : pid
        }

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
                          // alert('장바구니에 추가되었습니다.');
                      } else{
                          alert('장바구니 담기 실패');
                      }
                  }
              });

      });
  </script>
  <?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
  ?>
