<?php
	session_start();
	$_SESSION["m_number"]=$_POST["m_number"];
	header('Location:food_seeorder1.php');
?>