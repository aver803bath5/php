<?php
	include('food_notin.php');
	$m_id=$_POST["m_id"];
	$m_name=$_POST["m_name"];
	$m_price=$_POST["m_price"];
	include('food_mysql_connect.inc.php');
	mysql_select_db("ordering_sys");
	$update="UPDATE meal SET m_name='$m_name' ,m_price='$m_price' WHERE m_id=".$m_id;
	mysql_query($update);
	header('Location:food_manage_meal.php');
?>