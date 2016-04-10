<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>
			訂食吧-夫芙無國界料理店品項新增
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
		<font size="4.5" color=#4F4FFF>
		<?php
			include('food_notin.php');
			$m_id=$_GET["m_id"];
			include('food_mysql_connect.inc.php');
			mysql_select_db("ordering_sys");
			$read="SELECT *FROM meal WHERE m_id=".$m_id;
			$readresult=mysql_query($read);
			$result=mysql_fetch_array($readresult);
			echo "<form action='food_manage_update2.php' method='post' name='update' id='update'>";
			echo "<input type='hidden' name='m_id' value='".$result[0]."'>";
			echo "品項：<input type='text' size=15 name='m_name' value='".$result[2]."'>";
			echo "&nbsp&nbsp&nbsp&nbsp";
			echo "單價：<input type='text' size=5 name='m_price' value='".$result[3]."'><br><br>";
			echo "<button type='reset'class='button button-rounded button-flat-caution'><b>清除資料</button></a>";
			echo "&nbsp&nbsp&nbsp&nbsp";
			echo "<button type='submit'class='button button-rounded button-flat-action'><b>更新資料</button></a>";

		?>
		<script type="text/javascript">
			function formReset(){
  				document.getElementById("update").reset();
  			}
		</script>
	</body>
</html>