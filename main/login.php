<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

if(isset($_SESSION['UID'])){

    echo "<script>
      alert('이미 로그인 하셨습니다.');
      location.href = '/keepcoding/main/index.php';
    </script>";
  
}
?>

  <!-- 이강산 login 시작-->
<section class="content1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex justify-content-center">
        <div class="login">
          <form action="index.html" class="login_content" method="POST">
            <div class="login_id form-group">
              <input type="text" name="userid" id="userid" class="form-control" placeholder="ID">
            </div>

            <div class="login_pw form-group">
              <input type="password" name="userpw" id="userpw" class="form-control" placeholder="PASSWORD">
              <a href="#" class="fw-medium">Forgot password?</a>
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
            <p>아직 회원이 아니신가요? <a href="/keepcoding/main/members/signup.html">회원가입하기</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- 이강산 login 끝-->

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>