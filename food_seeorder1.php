<?php include('food_notin.php');?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>訂食吧-觀看訂單</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
	</head>
	<body background="food_p\back.jpg">
		<br><br>
		<center><b><font size="5" color=#FFA600	>
		<img src="food_p\13.png" width="100px" ></image><br><br>
		<?php
			require('food_connect2.php');
			//列出總清單
			//$show = "SELECT m.m_name, m.m_price,SUM(l.l_amount) total_amount　FROM orders o, line l, meal m, room r　WHERE o.o_id = l.o_id && l.m_id = m.m_id && r.r_id = 1 && o.r_id = r.r_id　GROUP BY m.m_name";
			$res_id=$_SESSION['r_id'];
			$read="SELECT * FROM meal WHERE res_id='$res_id'";
			$readresult=mysqli_query($link, $read);
			$i=1;
			echo "<table>";
			echo "<tr><td><font size='5' color=#7878FF><b>";
			echo "品項　　<br>";
			echo "</td>";
			echo "<td><center><font size='5' color=#7878FF><b>";
			echo "單價　　<br>";
			echo "</td>";
			echo "<td><center><font size='5' color=#7878FF><b>";
			echo "數量　　<br>";
			echo "</td></tr>";
			$totalcost=0;
			$k=1;
			while($result=mysqli_fetch_array($readresult))
			{
				if($_SESSION["m_number"][$i] != NULL)
				{
					if($k%2==0)
					{
						echo "<tr><td><font size='4' color=#FFA600><b>";

					}
					if($k%2==1)
					{
						echo "<tr><td><font size='4' color=#FF5959><b>";
					}
					echo $k.".";
					echo $result[2];
					echo "<td><font size='4' color=#FF5959><b>";
					echo "&nbsp&nbsp&nbsp&nbsp";
					echo $result[3];
					echo "</td>";
					//$num=$_POST['m_number'];
					echo "<td><font size='4' color=#FF5959><b>";
					echo "&nbsp&nbsp&nbsp&nbsp";
					echo $_SESSION["m_number"][$i];
					echo "<br></td></tr>";
					$totalcost=$totalcost+$result[3]*$_SESSION["m_number"][$i];
					$k=$k+1;
				}
				$i=$i+1;
			}
			echo "</table>";
			echo "———————————————————<br>";
			echo "總金額：";
			echo $totalcost;
			echo "元";
		?>
		<br><br>
		<a href="food_room.php" ><button type="button" class="button button-pill button-flat-primary"><b><font color="#FFFFFF">返回房間</button></a>
	</body>
</html>