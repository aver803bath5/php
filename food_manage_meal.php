<?php include('food_notin.php'); ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>
			訂食吧-夫芙無國界料理店菜單編輯
		</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body class="background">
		<center><b>
		<font size="4" color=#00A800>
		◆◆ 夫芙無國界料理店 ◆◆
		<br><br>
		<font size="4.5" color=#0000FF>
		<a href="food_manage_meal_add.php" ><button type="button" class="button button-rounded button-flat-primary"><b><font color="#FFFFFF">新增品項</button></a>
		<font size="4" color=#171717><b>
		<br><br>
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
			echo "單價　<br>";
			echo "</td></tr>";
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
				echo $result[2];
				echo "</td><td><font size='4' color=#FF5959><b>";
				echo "&nbsp&nbsp&nbsp&nbsp";
				echo $result[3];
				echo "</td>";
				echo "<td><a href='food_manage_meal_update.php?m_id=".$result[0]."'><button type='button' class='button button-rounded button-flat-action'><b>New</button></a></td>";
				echo "<td><a href='food_manage_meal_delete.php?m_id=".$result[0]."'><button type='button'class='button button-rounded button-flat-caution'><b>X</button></a></td>";
				echo "</tr>";
				$i=$i+1;
			}
			echo "</table>";
		?>
		<br><a href="food_manage_lobby.php" ><button type="button" class="button button-rounded button-flat-caution"><b><font color="#FFFFFF">返回大廳
		</button></a>
	</body>
</html>