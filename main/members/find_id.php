<?php
session_start();
$title =  'ID 찾기';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

$foundId = $_SESSION['foundId'];
$notFoundMessage = $_SESSION['notFoundMessage'];
?>


<!-- 이강산 아이디찾기 시작-->
<section class="content1">
  <h2 class="hidden">ID찾기</h2>
  <div class="container mt-5">
		<h2 class="text-center mb-4">회원정보 조회</h2>
		<div class="row justify-content-center find_id_form">
			<div class="col-md-6">
				<form action="find_id_process.php" method="POST">
					<div class="mb-3">
						<label for="email" class="form-label fw-bold">이메일 주소를 이용하여 ID 조회</label>
						<input type="email" class="form-control form-control-lg" id="useremail" name="useremail" placeholder="EMAIL" required>
					</div>
					<div class="mb-3">
						<label for="foundId" class="form-label fw-bold">조회 ID</label>
						<input type="text" class="form-control form-control-lg" id="foundId" name="foundId" value="<?php echo $foundId; ?>" readonly>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-lg find_id_form-btn">조회</button>
					</div>
				</form>
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