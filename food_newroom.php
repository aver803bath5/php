<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>訂食吧-建立新房間</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body class="background">
		<?php 
		include('food_notin.php');?>
		<center><br><br><b>
		<img src="food_p\7.png" width="100px" ></image>
		<font size="4" color=#A3A3FF>
		<br><br>
		<div class="input-group2">
		<form action="food_session.php" method="post" name='order'>
		<input class="form-control" placeholder="輸入房間名稱" type="text" size=1 name="r_name" required>
		<input class="form-control" placeholder="設定取餐地點" type="text" size=2 name="r_place" required>
		<input class="form-control" placeholder="訂餐截止時間" type="text" size=2 name="r_time" required></div>
		<!-- 設定取餐地點：<input type="text" size=15 name="r_place" required>
		訂餐截止時間：<input type="text" size=15 name="r_time" required> -->
		<br>
		<font size="5" color=#FFA600>
		◆◆ 請選擇餐廳 ◆◆
		<br>
		<select name="restaurant" size="1" >
		<option value="夫芙無國界料理店">夫芙無國界料理店</option>
		</select>
		
		<br><br>
		<!-- <a href="food_lobby.php" class='button button-rounded button-flat-caution'><b>返回大廳</a> -->
		<a href="food_lobby.php" ><button type="button" class="button button-pill button-flat-primary"><b><font color="#FFFFFF">返回大廳</button></a>
		<!-- <input type ="button" class="button button-pill button-flat-primary" onclick="javascript:location.href='food_lobby.php'" value="返回大廳"></input> -->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<!-- <input type="image" img src="food_p\9.jpg" width="9%" onclick="document.order.submit()" /> -->

		<button type="submit" class="button button-pill button-flat-primary"><b>確定建立</button>

		</form>
	</body>
</html>