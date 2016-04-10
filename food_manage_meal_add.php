<?php include('food_notin.php'); ?>
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
		<form action="food_manage_add2.php" method="post" name="add" id="add">
		品項：<input type="text" size=15 name="m_name">
		單價：<input type="text" size=5 name="m_price"><br><br>
		<button type="reset" class="button button-rounded button-flat-caution"><b>清除資料</button>
			&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button type="submit" class="button button-rounded button-flat-action"><b>確定建立</button><br/><br/>
		<a href="food_manage_meal.php" ><button type="button" class="button button-rounded button-flat-highlight"><b><font color="#FFFFFF">返回</button></a>
		</form>
		<script type="text/javascript">
			function formReset(){
  				document.getElementById("add").reset();
  			}
		</script>
	</body>
</html>