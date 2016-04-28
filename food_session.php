<?php
	include('food_notin.php');
	$_SESSION['r_name']=$_POST["r_name"];
	$_SESSION['r_place']=$_POST["r_place"];
	$_SESSION['r_time']=$_POST["r_time"];
	$_SESSION['r_id']=$_POST['r_id'];
	$r_name=$_SESSION['r_name'];
	$r_place=$_SESSION['r_place'];

	date_default_timezone_set("Asia/Taipei");
	$nowTime=date('ymdHis');

	require("food_connect2.php");
	mysqli_set_charset ($link,'utf8');
	$query1="INSERT INTO room(r_name,r_place,r_start)VALUES('$r_name','$r_place','$nowTime')";
	mysqli_query($link,$query1);
	$sql="SELECT * FROM room WHERE r_start='$nowTime' ";

	$result=mysqli_query($link,$sql);
	$rows=mysqli_fetch_array($result);
	if($_POST["r_name"]==NULL || $_POST["r_place"]==NULL || $_POST["r_time"]==NULL)
	{
		header('Location:food_newroom.php');
	}
	else
	{
		header('Location:food_room.php');
	}
?>