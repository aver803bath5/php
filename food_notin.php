<?php 
	@session_start(); 
	if($_SESSION['id']==null )
	{
		header("Refresh:0; url=food_register.php");
	}
?>