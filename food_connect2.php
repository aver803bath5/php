<?php
$host="127.0.0.1";
$db_user="";//用戶名
$db_pass="";//密碼
$db_name="ordering_sys";//數據庫
$timezone="Asia/Taipei";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
//  mysqli_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //台灣時間
?>
