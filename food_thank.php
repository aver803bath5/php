<?php 
	include('food_notin.php');
	
	// print_r($_SESSION);
?>

<html>
	<head>
		<title>訂食吧-謝謝您!</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
	</head>
	<body class="background">
		<br><br>
		<center><b><font size="5" color=#FFA600	>
		謝謝您提供新的餐廳資訊，讓大家有更多選擇。
		<br>
		<font size="5" color=#FFC559>
		Thank you very much！
		<br><br>
		<!-- <?php
			// include('food_mysql_connect.inc.php');
			// $read="SELECT * FROM restaurant WHERE res_name= '$r_name'";
			// $sql=mysql_query($read);
			// $result=mysql_fetch_row($sql);
			// if($result==NULL)
			// {
			// 	mysql_select_db("ordering_sys");
			// 	mysql_query("INSERT INTO restaurant(res_name,res_phone,res_time)VALUES ('$r_name','$r_phone','$r_time')");
			// }
			// else
			// {
			// 	echo "餐廳資訊已存在！<br><br>";
			// }				
		?> -->
		<a href="food_lobby.php" ><button type="button" class="button button-pill button-flat-primary"><b><font color="#FFFFFF">返回大廳</button></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a href="food_updateroom.php" ><button type="button" class="button button-pill button-flat-action"><b><font color="#FFFFFF">繼續新增</button></a>
	
	</body>
</html>
