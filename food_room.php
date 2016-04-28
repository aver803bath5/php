<?php
include('food_notin.php');
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>訂食吧-房間</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body background="food_p\back.jpg">
		<br>

		<center><b><font size="6" color=#4F4FFF>
		<div class="header">
		<?php
			require('food_connect2.php');
			echo "◆◆ ".$_SESSION['r_name']." ◆◆";
			$res_id=$_SESSION['r_id'];
			$sql = "SELECT * FROM restaurant WHERE res_id='$res_id'";
    			$result=mysqli_query($link, $sql);
    			$row=mysqli_fetch_array($result);
    			$rname=$row[1];
		?></div>
		<?php
		echo "<font size='5' color=#828282>";
		echo "<table bgcolor='#FFC8B4'>";
		echo "<tr><td><font size='5' color=#828282><b>餐廳名稱：".$rname."</td></tr><br>";
		echo "<tr><td><font size='5' color=#828282><b>餐廳聯絡電話：".$row[2]."</td></tr><br>";
		echo "<tr><td><font size='5' color=#828282><b>餐廳營業時段： ".$row[3]."</td></tr><br>";
		echo "<tr><td><font size='5' color=#828282><b>取餐地點：";
		  ?>
		<?php echo $_SESSION['r_place']; ?>
		</td></tr><br>
		<tr><td><font size="5" color=#828282><b>訂餐截止時間：
		<?php echo $_SESSION['r_time']; ?>
		</td></tr><br>
		</table>
		<br><br>
		<a href="food_order.php">
		<img src="food_p\12.png" width="140px"></image></a>
		&nbsp;
		<a href="food_seeorder1.php">
		<img src="food_p\13.png" width="140px"></image></a>
		<br/><br/>
		<a href="food_sendorder.php">
		<img src="food_p\14.png" width="140px"></image></a>
		&nbsp;
		<a href="food_sendfile.php">
		<img src="food_p\15.png" width="140px"></image></a>
		<br><br>
		<a href="food_lobby.php">
		<img src="food_p\16.png" width="140px"></image></a>
		&nbsp;

		<img src="food_p\17.png" width="140px"></image>
	</body>
</html>