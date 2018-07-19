<?php
require_once 'header_link.php';
$obj = new cls_func();

$ac_no = $_SESSION['account_number'];
$result=$obj->check_balance($ac_no);
$row = $result->fetch_assoc();

$balance = $row['balance'];



  ?>