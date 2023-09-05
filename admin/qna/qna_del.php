<?php
  include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

  $qid = $_GET['qid'];
  $sql = "DELETE FROM qna WHERE qid='{$qid}'";

  if ($mysqli->query($sql) === TRUE) {
      echo "<script>
      alert('게시글 삭제완료.');
      location.href='qna_list.php';</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $mysqli->error;
  }

?>