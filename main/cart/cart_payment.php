<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/dbcon.php';

$userid = $_POST['userid'];
$ucid = $_POST['ucid'];

$csql = "DELETE FROM cart WHERE userid='{$userid}'";
$cresult = $mysqli -> query($csql);

if($ucid != ''){
    $ucsql = "UPDATE user_coupons SET status = '-1' WHERE ucid = {$ucid}";
    $ucresult = $mysqli -> query($ucsql);
    if($cresult && $ucresult){
        $data = array('result' => 'ok');
    } else {
        $data = array('result' => 'fail');
    }
} else {
    if ($cresult){
        $data = array('result' => 'ok');
    }else {
        $data = array('result' => 'fail');
    }
}

echo json_encode($data);

?>