<?php
$title =  '로그인';
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/header.php';

if (isset($_SESSION['UID'])) {
  echo "<script>
    alert('이미 로그인 하셨습니다.');
    location.href = '/keepcoding/main/index.php';
  </script>";
}

// 로그인 버튼이 클릭된 경우
if (isset($_POST['login'])) {
  // 사용자가 입력한 아이디와 비밀번호 가져오기
  $username = $_POST['username'];
  $userpw = $_POST['userpw'];

  // 여기에서 사용자 아이디와 비밀번호를 검증하고 로그인 절차를 진행합니다.
  // 아래는 간단한 검증 예제입니다.

  // 사용자 아이디가 존재하지 않는 경우
  if (!useridExists($username)) {
      echo "<script>
        alert('존재하지 않는 아이디입니다.');
      </script>";
  } else {
      // 비밀번호 검증 및 로그인 로직을 진행하세요.
      // 비밀번호가 일치하지 않으면 다른 경고 메시지를 표시할 수 있습니다.
      if (!checkPassword($userid, $userpw)) {
          echo "<script>
            alert('비밀번호가 일치하지 않습니다.');
          </script>";
      } else {
          // 로그인 성공 시 로직을 진행하세요.
          // 성공 시 페이지를 리디렉션하거나 세션을 설정할 수 있습니다.
      }
  }
}

// 사용자 데이터 배열 (실제로는 데이터베이스에서 가져와야 합니다)
$users = [
    ['userid' => 'user1', 'userpw' => 'password1'],
    ['userid' => 'user2', 'userpw' => 'password2'],
    // 여기에 더 많은 사용자 데이터를 추가할 수 있습니다.
];

// 사용자 아이디가 존재하는지 확인하는 함수 (변경된 함수 이름)
function useridExists($userid) {
    global $users;
    foreach ($users as $user) {
        if ($user['userid'] === $userid) {
            return true;
        }
    }
    return false;
}

// 사용자 아이디와 비밀번호를 확인하는 함수
function checkPassword($userid, $userpw) { // 변수 이름 변경
    global $users;
    foreach ($users as $user) {
        if ($user['userid'] === $userid && $user['userpw'] === $userpw) { // 변수 이름 변경
            return true;
        }
    }
    return false;
}

?>


  <!-- 이강산 login 시작-->
<section class="content1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 d-flex justify-content-center">
        <div class="login">
          <form action="index.php" class="login_content" method="POST">
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
  var key = getCookie('admin'); 
  if(key!=""){
    $("#userid").val(key); 
  }
  
  if($("#userid").val() != ""){ 
    $("#saveId").attr("checked", true); 
  }
  
  $("#saveId").change(function(){ 
    if($("#saveId").is(":checked")){ 
      setCookie('admin', $("#userid").val(), 7); 
    }else{ 
      deleteCookie('admin');
    }
  });
  
  $("#userid").keyup(function(){ 
    if($("#saveId").is(":checked")){
      setCookie('admin', $("#userid").val(), 7); 
    }
  });
});
</script>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/main/inc/footer.php';
?>