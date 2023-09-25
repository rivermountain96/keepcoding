<?php
session_start();
$title =  'ID 찾기';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

$foundId = $_SESSION['foundId'];
$notFoundMessage = $_SESSION['notFoundMessage'];
?>


	<!-- 이강산 아이디찾기 시작-->
	<section class="content1">
    <div class="container">
      <div class="row justify-content-center">
        <div class="login login_signup">
          <h2>회원정보 조회</h2>
          <form action="find_id_process.php" method="POST" id="find_id_process_form">
      
            <div class="login_email row">
							<label for="email" class="form-label fw-bold">이메일 입력으로 ID 조회</label>
              <input type="email" name="useremail" id="useremail" placeholder="EMAIL" required>
            </div>

						<div class="login_id signup_id row" id="find_id_label">
							<label for="email" class="form-label fw-bold">조회된 ID</label>
              <input type="text" name="foundId" id="foundId" placeholder="ID" value="<?php echo $foundId; ?>" readonly>
            </div>

            <!-- <div class="login_ir sigup_info_agree d-flex justify-content-center">
              <label class="form-check-label" for="" id="">개인정보 수집 및 이용 동의 (필수)</label>
            </div> -->
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-outline-primary btn-lg text-uppercase fw-bold fs-5">조회하기</button>
            </div>
          </form>
          <div class="sign_content">
            <p>이미 가입된 계정이 있으신가요? <a href="/keepcoding/main/login.php">로그인하기</a></p>
          </div>
        </div>
      </div>
    </div>  
  </section>
	<!-- 이강산 아이디찾기 끝-->

<script>
	// let foundIdInput = $("#foundId");
	// let notFoundMessage = "<?php echo $notFoundMessage; ?>"; // PHP 변수를 JavaScript로 전달

	// if (notFoundMessage === "아이디를 찾을 수 없습니다.") {
  //       foundIdInput.val(notFoundMessage); // notFoundMessage 값을 input 요소에 설정
  //   }
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>