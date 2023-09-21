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
              <label class="form-check-label" for="infoagree" id="infoagreeLabel">개인정보 수집 및 이용 동의 (필수)</label>
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
  <!-- 개인정보 수집 및 이용 동의 modal 시작 -->
  <div id="myModal" class="modal_create">
    <div class="modal-content">
      <span class="close_modal" id="closeButton">&times;</span>
      <!-- 개인정보 수집 및 이용 동의 내용을 추가 -->
      <h2>개인정보 수집 및 이용 동의</h2>
      <p><span>KEEP CODING 학습사이트</span>에서는 회원 가입 및 학습사이트의 홍보를 위해 귀하의 개인정보를 수집,이용하고자 하오니</p>
      <p>다음의 내용을 충분히 검토하신 후 동의 여부를 결정해 주시기 바랍니다.</p>
      <p>※ 근거: 개인정보 보호법 제15조 및 제22조</p>
      <hr>
      <p><span>1. 개인정보의 수집 및 이용 목적</span> : 학습사이트 이용자 관리 및 학습성과 홍보 게시용</p>
      <hr>
      <p><span>2. 수집하는 개인정보의 항목</span> : 성명, 메일주소, 출신학교, 입학예정 (대)학교</p>
      <p>* 필요 최소한의 항목으로 작성<p>
      <hr>
      <p><span>3. 개인정보의 보유 및 이용 기간</span> : 수집일로부터 1년<p>
      <p>* 필요 최소한의 기간으로 작성<p>
      <hr>
      <p><span>4. 동의를 거부할 권리</span> : 귀하는 위와 같이 개인정보를 수집․이용하는 데 대한 동의를 거부할 권리가 있습니다.</p>
      <p>- 동의를 거부하셔도 그에 따른 불이익은 없습니다. (동의 거부에 따른 불이익이 없는 경우)</p>
      <p>- 동의를 거부하실 경우 학습 사이트에서 에서 제공하는 혜택을 받으실 수 없으니 참고하시기 바랍니다.<p>
      <p>(동의 거부에 따른 불이익이 있는 경우)</p>
      <p>※ 만 14세 미만 아동인 경우 반드시 학부모 등 법적대리인의 동의가 필요함.</p>
      <hr>
      <button id="agreeButton" class="btn-outline-light">동의합니다</button>
    </div>
  </div>
  <!-- 개인정보 수집 및 이용 동의 modal 끝 -->

  <!-- 이강산 signup 끝-->

  <script>
    // 라벨 클릭 시 모달 열기
    $("#infoagreeLabel").click(function() {
      $("#myModal").css("display", "block");
      event.preventDefault(); // 라벨의 기본 동작 방지
    });

    // 모달 닫기 버튼 클릭 시 모달 닫기
    $("#closeButton").click(function() {
      $("#myModal").css("display", "none");
    });

    // "동의합니다" 버튼 클릭 시 모달 닫기
    $("#agreeButton").click(function() {
      $("#infoagree").prop("checked", true);
      $("#myModal").css("display", "none");
      // 여기에서 동의 처리를 할 수 있습니다.
    });

  $('#signup_form button').click(function(e){
    e.preventDefault();
    let userid = $('#userid').val();
    let useremail = $('#useremail').val();
    let infoAgreed = $('#infoagree').prop('checked'); // 개인정보 수집 및 이용 동의 체크 여부를 가져옵니다.
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    // 입력란 중 하나라도 비어있으면 알림 메시지를 띄웁니다.
    if (userid === '' || userpw === '' || userpw_check === '' || useremail === '') {
      alert('회원 정보를 입력하세요.');
      return;
    }

    if (!infoAgreed) {
      alert('개인정보 수집 및 이용 동의를 진행하셔야 회원가입이 가능합니다.');
      return;
    }

    if (!useremail.match(emailRegex)) {
      alert("유효한 이메일 주소를 입력하세요.");
      return; // 폼 전송을 중지합니다.
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