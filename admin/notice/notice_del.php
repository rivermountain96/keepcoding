<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php');

$bno = $_GET['idx'];
?>

<script>
if(confirm('삭제하시겠습니까?')){

<?php
$sql = "DELETE FROM notice WHERE idx='{$bno}'";
if ($mysqli->query($sql) === TRUE){
?>
    alert ('삭제 완료');
    location.href='/keepcoding/admin/notice/notice_list.php';
<?php
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>

} else {

        alert('취소되었습니다');
        location.href='/keepcoding/admin/notice/notice_list.php';
}
</script>