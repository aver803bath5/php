<?php include('food_notin.php');?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html>
	<head>
		<title>訂食吧-上傳新餐廳資訊</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body class="background">
		<br><br>
		<center><b><font size="5" color=#00E000	>
		<img src="food_p\8.png" width="100px"></image>
		<br><br>
		<div class="input-group2">
		<form name="order" method="post" action="food_upload_test.php" id="myform" enctype="multipart/form-data">
		<input class="form-control" placeholder="餐廳名稱" type="text" size=1 name="r_name" required>
		<input class="form-control" placeholder="餐廳聯絡電話" type="text" size=2 name="r_phone" required>
		<input class="form-control" placeholder="餐廳營業時段" type="text" size=2 name="r_time" required><br/>
		<button type="reset" class="button button-rounded button-flat-caution"><b>清除資料</button>
		<!-- <img src="food_p\19.jpg" width="9%" ></image> -->
		<br>
		<font size="5" color=#0044BB><br><br>
		選擇菜單圖檔上傳
		    <font size="2" color=#0044BB>
		    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
		    <input type="file" name="files[]" multiple/>
		<br><br>
		<center>
		<a href="food_lobby.php" ><button type="button" class="button button-rounded button-flat-highlight"><b><font color="#FFFFFF">返回大廳</button>
	    &nbsp;&nbsp;
	    <button type="submit" class="button button-rounded button-flat-action"><b>確定建立</button></a>	
		</center>
		</form>	
		
		
		<script type="text/javascript">
			function myFunction() {
			    document.getElementById("order").submit();
			}
		</script>
	</body>
</html>