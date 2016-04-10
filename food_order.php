<?php 
include('food_notin.php');
?>
<!-- <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd"> -->
<html>
	<head>
		<title>訂食吧-點餐作業</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body background="food_p\back.jpg">
		<br><br>
		<center><b><font size="5" color=#7878FF	>
		<img src="food_p\12.png" width="100px" ></image>
		<br><br>
		◇◇ 選擇餐點 ◇◇<br><br>
		<?php
			include('food_mysql_connect.inc.php');
			mysql_select_db("ordering_sys");
			$read="SELECT * FROM meal";
			$readresult=mysql_query($read);
			$i=1;
			echo "<table>";
			echo "<tr><td><font size='5' color=#7878FF><b>";
			echo "品項<br>";
			echo "</td>";
			echo "<td><center><font size='5' color=#7878FF><b>";
			echo "單價　　　　<br>";
			echo "</td>";
			echo "<td><center><font size='5' color=#7878FF><b>";
			echo "數量　　<br>";
			
			echo "</td></tr>";
			echo "<form action='food_session_num.php' method='post' name='order'>";
			while($result=mysql_fetch_row($readresult))
			{
				if($i%2==0)
				{
					echo "<tr><td><font size='4' color=#FFA600><b>";

				}
				if($i%2==1)
				{
					echo "<tr><td><font size='4' color=#FF5959><b>";
				}
				echo $i.".";
				echo $result[2]."　　";
				echo "<td><font size='4' color=#FF5959><b>";
				echo "&nbsp&nbsp&nbsp&nbsp";
				echo $result[3];
				echo "</td>";
				$num=$_SESSION["m_number"][$i];
				echo "<td><input type=text size=4 name='m_number[$i]' value='$num'>";
				echo "<br></td></tr>";	
				$i=$i+1;
			}
			
			echo "</table>";
		?>
		<br>
		<a href="food_room.php" ><button type="button" class="button button-pill button-flat-primary"><b><font color="#FFFFFF">返回房間</button></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" class="button button-pill button-flat-primary"><b>確定建立</button></form>
	</body>
</html>