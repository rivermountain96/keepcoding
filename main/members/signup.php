<?php
$title =  '회원가입';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

if(isset($_SESSION['UID'])){

    echo "<script>
      alert('이미 로그인 하셨습니다.');
      location.href = '/keepcoding/main/index.php';
    </script>";
  
}
?>

  <!-- 이강산 signup 시작-->
  <section class="content1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="login login_signup">
          <h2>회원가입</h2>
          <form action="signup_ok.php" class="login_content" method="POST" id="signup_form">
            <div class="login_id signup_id row">
              <input type="text" name="userid" id="userid" placeholder="ID" required>
            </div>
      
            <div class="login_pw row">
              <input type="password" name="userpw" id="userpw" placeholder="PASSWORD" required>
            </div>

            <div class="login_pw row">
              <input type="password" name="userpw_check" id="userpw_check" placeholder="CONFIRM PASSWORD" required>
            </div>
      
            <div class="login_email row">
              <input type="email" name="useremail" id="useremail" placeholder="EMAIL" required>
            </div>

            <div class="login_ir sigup_info_agree d-flex justify-content-center">
              <input class="form-check-input" type="checkbox" name="infoagree" id="infoagree">
              <label class="form-check-label" for="infoagree">개인정보 수집 및 이용 동의 (필수)</label>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">sign up</button>
            </div>
          </form>
          <div class="sign_content">
            <p>이미 가입된 계정이 있으신가요? <a href="/keepcoding/main/login.php">로그인하기</a></p>
          </div>
        </div>
      </div>
    </div>  
  </section>
  <!-- 이강산 signup 끝-->

  <script>
  $('#signup_form button').click(function(e){
    e.preventDefault();
    let userid = $('#userid').val();
    let useremail = $('#useremail').val();
    let infoAgreed = $('#infoagree').prop('checked'); // 개인정보 수집 및 이용 동의 체크 여부를 가져옵니다.

    // 입력란 중 하나라도 비어있으면 알림 메시지를 띄웁니다.
    if (userid === '' || userpw === '' || userpw_check === '' || useremail === '') {
      alert('회원 정보를 입력하세요.');
      return;
    }

    if (!infoAgreed) {
      alert('개인정보 수집 및 이용 동의를 진행하셔야 회원가입이 가능합니다.');
      return;
    }

    let data = {
      userid: userid,
      useremail: useremail
    }
    $.ajax({
      async:false,
      type:'post',
      url:'signup_validate.php',
      data:data,
      dataType:'json',
      error:function(error){
        console.log(error);
      },
      success:function(returned_data){
        if(returned_data.cnt > 0){
          alert('입력한 아이디 또는 이메일은 이미 가입된 정보입니다.');
          return false;
        } else{
          $('#signup_form').submit();
        }
      }
    });
  });
</script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>