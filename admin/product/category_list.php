<?php
  $title =  '카테고리 관리';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/admin_check.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/category_func.php';
?>
<div class="content">
  <h4 class="pd72 fs-4 fw-bold">카테고리 관리</h4>
  <div class="d-flex justify-content-between gap-5">
    <div class="cate-list d-flex flex-column">
      <h6 class="pd10 fs-6 fw-bold text-center">대분류</h6>
      <ul class="list-group pd72" id="cate1">
        <li id="bigCate" class="list-group-item big d-flex justify-content-between align-items-center" data-step="0" data-cid="0">
          대분류 목록
          <i class="bi bi-chevron-down"></i>
        </li>
        <li>
            <ul class="cateview cate1">
            </ul>
        </li>
      </ul>
      <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#cate1Modal">대분류 등록</button>
    </div>
    <!-- 대분류 -->
    <div class="cate-list d-flex flex-column">
      <h6 class="pd10 fs-6 fw-bold text-center">중분류</h6>
      <ul class="list-group pd72" id="cate2">
        <li class="list-group-item big d-flex justify-content-between align-items-center">
          중분류 목록
          <i class="bi bi-chevron-down"></i>
        </li>
        <li>
          <ul class="cateview cate2">
          </ul>
        </li>
      </ul>
      <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#cate2Modal">중분류 등록</button>
    </div>
    <!-- 중분류 -->
    <div class="cate-list d-flex flex-column">
      <h6 class="pd10 fs-6 fw-bold text-center">소분류</h6>
      <ul class="list-group pd72" id="cate3">
        <li class="selected_cate list-group-item big d-flex justify-content-between align-items-center">
          소분류 목록
          <i class="bi bi-chevron-down"></i>
        </li>
        <li>
          <ul class="cateview cate3">
          </ul>
        </li>
      </ul>
      <button type="button" class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#cate3Modal">소분류 등록</button>
    </div>
    <!-- 소분류 -->
  </div>
</div>
    

<!-- Modal 1 -->
<div class="madeCate modal fade" id="cate1Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5">대분류 등록</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="text" class="form-control big" name="name1" id="name1" placeholder="대분류명">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary" data-step="1">등록</button>
      </div>
    </div>
  </div>
</div> <!-- //Modal 1 -->
    <!-- Modal 2 -->
<div class="madeCate modal fade" id="cate2Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5">중분류 등록</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column gap-4">
        <select class="form-select big" aria-label="Default select example" id="pcid2">
          <option selected disabled>대분류</option>
          <?php
            foreach($cate1 as $c1){
          ?>
          <option value="<?= $c1 -> cid ?>"><?= $c1 -> name ?></option>
          <?php
            }
          ?>
        </select>       
        <input type="hidden" class="form-control big" name="pcate2" id="pcate2" value="">
        <input type="text" class="form-control big" name="name2" id="name2" placeholder="중분류명">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary" data-step="2">등록</button>
      </div>
    </div>
  </div>
</div> <!-- //Modal 2 -->

<!-- Modal 3 -->
<div class="madeCate modal fade" id="cate3Modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5">소분류 등록</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column gap-4">
        <select class="form-select big" aria-label="Default select example" id="pcid1-1">
        <option selected disabled>대분류</option>
          <?php
            foreach($cate1 as $c1){
          ?>
          <option value="<?= $c1 -> cid ?>"><?= $c1 -> name ?></option>
          <?php
            }
          ?>
        </select>
        <select class="form-select big" aria-label="Default select example" id="pcid3">
          <option selected disabled id="second">대분류를 먼저 선택하세요</option>
        </select>
        <div class="row">
          <input type="hidden" class="form-control big" name="pcate3" id="pcate3">
          <input type="text" class="form-control big" name="name3" id="name3" placeholder="소분류명">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary" data-step="3">등록</button>
      </div>
    </div>
  </div>
</div> <!-- //Modal 3 -->

<!-- Edit Modal -->
<div class="editCate modal fade" id="cateEditModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fs-5">카테고리 수정</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <input type="text" class="form-control big" name="editName" id="editName" placeholder="수정할 카테고리명 입력">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            <button type="submit" class="btn btn-primary" id="edit">수정</button>
          </div>
        </div>
      </div>
</div> 
<!-- //Modal 1 -->

<!-- 이은서 category_list 끝-->
<!-- script -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="/keepcoding/admin/js/makeoption.js"></script>
<script>

  function make_cate(which){
    let thisStep = Number(which.attr('data-step'));
    let nextStep = thisStep + 1;
    view_cate(which, $(`.cate${nextStep}`));
  }

  //대분류 ul을 클릭하면 대분류 li 생성
  let cate1 = $('#bigCate');

  cate1.click(function(){
    make_cate($(this));
  });

  $(document).on('click', '.cateview.cate1 li', function(){
    $('.cateview.cate3').empty();
    changeColor($(this), $('.cateview.cate1 li'));
  });
  $(document).on('click', '.cateview.cate2 li', function(){
    changeColor($(this), $('.cateview.cate2 li'));
  });
  $(document).on('click', '.cateview.cate3 li', function(){
    changeColor($(this), $('.cateview.cate3 li'));
  });

  function changeColor(target, all){
    all.css({backgroundColor: '#fff'});
    all.removeClass('selected');
    target.css({backgroundColor: 'rgba(190,204,255,.7)'});
    target.addClass('selected');
  }
  
  //카테고리 li를 클릭하면 하위 분류 li 생성
  $(document).on('click', '.cateview li', function(){
    if(Number($(this).attr('data-step')) < 3){
      make_cate($(this));
    }
  });

  function view_cate(evt, target){
    let cid = evt.attr('data-cid');
    let step = evt.attr('data-step');
    let data = {
      cid: cid,
      step: step
    }

    $.ajax({
      async: false,
      type: 'POST',
      data: data,
      url: "view_cate.php",
      dataType: 'html',
      error: function(error){
        console.log('Error:', error);
      },
      success: function(result){
        target.html(result);
      }
    });
  }

  //카테고리 등록

  let submitBtn = $('.madeCate button[type="submit"]');

  $('#pcid2').change(function(){
    $('#pcate2').val($(this).val());
  });

  $('#pcid1-1').change(function(){
    $('#second').text('중분류');
  });
  

  $('#pcid3').change(function(){
    $('#pcate3').val($(this).val());
  });

  submitBtn.click(function(){
    let step = $(this).attr('data-step');
    save_category(step);
  })

  function save_category(step){
    let name = $(`#name${step}`).val();
    let pcid = $(`#pcate${step}`).val();
    let modalCloseBtn = $(`#cate${step}Modal .btn-close`);

    if(step > 1 && !pcid){
      alert('대분류를 먼저 선택하세요');
      return;
    }
    if(!name){
      alert('카테고리명을 입력하세요');
      return;
    }
    let data = {
      name: name,
      pcid: pcid,
      step: step
    }

    $.ajax({
      async: false,
      type: 'POST',
      data: data,
      url: "save_category.php",
      dataType: 'json',
      error: function(error){
        console.log('Error:', error);
      },
      success: function(rdata){
        if(rdata.result == 1){
          alert('카테고리 등록 성공.');
          location.reload();
        }else if(rdata.result == -1){
          alert('카테고리명이 이미 사용중입니다.');
          location.reload();
        }else {
          alert('카테고리 등록 실패');
        }
      }
    });
  };

  //카테고리 삭제

  $(document).on('click', '.delete_btn', function(e){
    e.preventDefault();
    let cateCid = $(this).closest('li').attr('data-cid');
    let data = {
      cid : cateCid
    }
    if(confirm('해당 카테고리를 삭제하시겠습니까?')){
      $.ajax({
        async: false,
        type: 'POST',
        data: data,
        url: "delete_category.php",
        dataType: 'json',
        error: function(error){
          console.log('Error:', error);
        },
        success: function(rdata){
          if(rdata.result == 1){
            alert('카테고리 삭제 성공');
            location.reload();
          }else{
            alert('카테고리 삭제 실패');
            location.reload();
        }
      }});
    }else{
      alert('카테고리 삭제 취소');
    }
  });

  //카테고리 수정

  let editSubmitBtn = $('#edit');

  $(document).on('click', '.edit_btn', function(e){
    e.preventDefault();
    let cateCid = $(this).closest('li').attr('data-cid');
    editSubmitBtn.click(function(){
      let reName = $('#editName').val();
      let data = {
        cid : cateCid,
        name : reName
      }
      $.ajax({
        async: false,
        type: 'POST',
        data: data,
        url: "edit_category.php",
        dataType: 'json',
        error: function(error){
          console.log('Error:', error);
        },
        success: function(rdata){
          if(rdata.result == 1){
            alert('카테고리명 수정 성공');
            location.reload();
          }else{
            alert('카테고리명 수정 실패');
            location.reload();
          }
        }
      });
    });
  });

  //카테고리 선택시 alert

  let item;
  let item1;
  let item2;
  let item3;

  function findCate(num) {
    item1 = $(document).find('.cateview.cate1 li');
    item2 = $(document).find('.cateview.cate2 li');
    item3 = $(document).find('.cateview.cate3 li');
    item = $(document).find(`.cateview.cate${num} li`);
  }
  
  $('#cate2').click(function(){
    itemCheck('대분류를 먼저 선택해주세요.', 1);//선택된 대분류가 있는지 체크
    if(item1.hasClass('selected')){ //선택된 대분류가 있을때
      findCate(1);
      if(item2.length < 1){ //해당 대분류를 통해 생성된 중분류가 없을때
        alert('해당 대분류에는 중분류가 없습니다.');
      }
    }
  });

  $(document).on('click', '#cate3', function(e){
    itemCheck('대분류와 중분류를 먼저 선택해주세요.', 1); //선택된 대분류가 있는지 체크, 없을때
    if(item1.hasClass('selected')){ //선택된 대분류가 있을때
      itemCheck('중분류를 먼저 선택해주세요.', 2); //선택된 중분류가 없을때

      findCate(1);
      if(item2.hasClass('selected')){//선택된 중분류가 있을때
        if(item3.length < 1){ //해당 중분류를 통해 생성된 소분류가 없을때
        alert('해당 중분류에는 소분류가 없습니다.');
        }
      }
    }
  });

  function itemCheck(msg, num) {
    findCate(num);
    if(!item.hasClass('selected')){
      alert(msg);
    }
    findCate(num);
  }

</script>
<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/footer.php';
?>

