<?php
$host="127.0.0.1";
$db_user="root";//用戶名
$db_pass="xu3ru04bjo4";//密碼
$db_name="ordering_sys";//數據庫
$timezone="Asia/Taipei";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
mysqli_set_charset($link, "utf8");
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //台灣時間
?>
