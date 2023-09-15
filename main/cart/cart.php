<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/keepcoding/admin/inc/header.php';

$Where = '';
if(isset($_SESSION['UID'])){
    $where = "c.userid = '{$_SESSION['UID']}'";
} else {
    $where = "c.ssid = '".session_id()."'";
}

$sql = "SELECT p.thumbnail, p.name, p.price, c.cartid, c.total
from products p
join cart c
on p.pid = c.pid
where $where";

$result = $mysqli -> query($sql);
while($rs = $result -> fetch_object()){
    $rsArr[] = $rs;
}

$sql2 = "SELECT uc.ucid, c.coupon_name, c,coupon_price
from user_coupons uc
join coupons c
on c.cid = uc.couponid
where c.status = and uc.status = and uc.duedate >= now() and un.userid='".$_SESSION['UID']."'";

$result2 = $mysqli -> query($sql2);
while($cp2 = $result2 -> fetch_object()){
    $cps[] = $cp2;
}


?>