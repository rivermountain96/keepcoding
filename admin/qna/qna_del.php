<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $qid = $_GET['qid'];
  $sql = "DELETE FROM qna WHERE qid='{$qid}'";

  if ($mysqli->query($sql) === TRUE) {
      echo "<script>
      alert('글삭제 완료되었습니다.');
      location.href='qna_list.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

?>