<?php
	include('food_notin.php'); 
	$m_name=$_POST["m_name"];
	$m_price=$_POST["m_price"];
	include('food_mysql_connect.inc.php');
	mysql_select_db("ordering_sys");
	mysql_query("INSERT INTO meal (res_id,m_name,m_price) VALUES ('4','$m_name','$m_price')");
	header('Location:food_manage_meal.php');
?>