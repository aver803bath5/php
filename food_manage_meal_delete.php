<?php
	include('food_notin.php');
	$m_id=$_GET["m_id"];
	include('food_mysql_connect.inc.php');
	mysql_select_db("ordering_sys");
	$del="DELETE FROM meal WHERE m_id=".$m_id;
	mysql_query($del);
	header('Location:food_manage_meal.php');
?>