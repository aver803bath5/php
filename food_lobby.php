
	<head>
		<meta charset="utf-8">
		<title>訂食吧-訂餐大廳</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
	</head>
	<body class="background">
	<div id="header">
			<marquee direction="right" height="20" scrollamount="5" behavior="alternate">歡迎使用【訂食吧】訂餐系統</marquee>
		</div>
		<br>
		<center><b><font size="4" color=#4F4FFF>
		<a href='food_register.php'>
		登出-回到登入畫面<br></a>
		<img src="food_p\1.png" width="400px" height="250px"</image><br/>
		<img src="food_p\eat.png" width="400px" height="250px" align="middle"></image>
		<br><br>

	<div id="footer">
		<?php
		include('food_notin.php');
		$id = $_SESSION['id'];
		//echo "<a href='food_selfdata.php?id=".$id."'>
		//<img src='food_p\six.jpg' width=8% ></image></a>";#連結至update.php並將result[0]之資料以get方法代入no變數
		echo "<a href='food_selfdata.php?id=".$id."' class='button button-circle button-flat-caution'><b>個人資料</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='food_newroom.php' class='button button-circle button-flat-caution'><b>建立新房間</a>";
		echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
		echo "<a href='food_updateroom.php' class='button button-circle button-flat-caution'><b>上傳新餐廳資訊</a>";
		?>
	</body>
	</div>
</html>