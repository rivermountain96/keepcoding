<?php
$title =  '로그인';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

?>


  <!-- 이강산 login 시작-->
<section class="content1">
  <h2 class="hidden">login</h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex justify-content-center">
        <div class="login">
          <form action="login_ok.php" class="login_content" method="POST">
            <div class="login_id form-group">
              <input type="text" name="userid" id="userid" class="form-control" placeholder="ID" required>
            </div>

            <div class="login_pw form-group">
              <input type="password" name="userpw" id="userpw" class="form-control" placeholder="PASSWORD" required>
              <a href="/keepcoding/main/members/find_id.php" class="fw-medium">Forgot password?</a>
            </div>

            <div class="login_ir d-flex justify-content-end">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="checkId" id="saveId">
                <label class="form-check-label" for="saveId">ID 저장</label>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">Login</button>
            </div>
          </form>
          <div class="sign_content">
            <p>아직 회원이 아니신가요? <a href="/keepcoding/main/members/signup.php">회원가입하기</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- 이강산 login 끝-->

<script>
$(document).ready(function(){
  var key = getCookie('visiter'); 
  if(key!=""){
    $("#userid").val(key); 
  }
  
  if($("#userid").val() != ""){ 
    $("#saveId").attr("checked", true); 
  }
  
  $("#saveId").change(function(){ 
    if($("#saveId").is(":checked")){ 
      setCookie('visiter', $("#userid").val(), 7); 
    }else{ 
      deleteCookie('visiter');
    }
  });
  
  $("#userid").keyup(function(){ 
    if($("#saveId").is(":checked")){
      setCookie('visiter', $("#userid").val(), 7); 
    }
  });
});
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>