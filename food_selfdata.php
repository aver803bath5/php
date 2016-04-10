<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>訂食吧-註冊會員</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body background="food_p\back.jpg">
		<center><b>
		<br><br><br>
			<img src='food_p\six.png' width="100px" height="100px"></image>
		<font size="5" color=#FFABAB>
			<br><br>
		<?php 
			include('food_notin.php');
			$id=$_SESSION['id'];
			include('food_mysql_connect.inc.php');
			mysql_select_db("ordering_sys");
			$read="SELECT * FROM user WHERE u_mail= '$id'";
			$sql2=mysql_query($read);
			$result=mysql_fetch_row(mysql_query($read));
			echo "$result[2]";
			echo "<br>";
			echo "<br>";
			echo "<table>";
				echo "<tr>";
			if ($result[8]=='0')
			{
				echo "<td><font size=4 color=#A3A3FF><b>權限：會員";
				echo "<br>";
				echo "<br></td>";
			}
				echo "</tr><tr>";
				echo "<td><font size=4 color=#A3A3FF><b>電話：";
				echo $result[3];
				echo "<br>";
				echo "<br></td>";
				echo "</tr><tr>";
				echo "<td><font size=4 color=#A3A3FF><b>信箱：";
				echo "$result[0]</td>";
				echo "</tr>";
			echo "</table>"
		?>
		<br>
		<a href="food_lobby.php" class="button button-circle button-flat-highlight"><b>返回大廳</a>
		</center>
	</body>
</html>