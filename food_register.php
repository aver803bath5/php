<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<title>訂食吧-登入畫面</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" /> -->
	</head>
	<body background="food_p\back.jpg">
		<div id="header">
		<marquee direction="right" height="100" scrollamount="5" behavior="alternate">歡迎使用【訂食吧】訂餐系統
		</marquee>
		</div>

		<center><b>
		
		<img src="food_p\1.png"  width="300px" height="250px"></image>
		<form name="order" method="post" action="food_connect.php" id="myform">
			<br><font size="4.5" color=#D18800>
			信箱：<input type="email" size=10 name="u_account" />
			<br><br>
			密碼：<input type="password" size=10 name="u_pwd" required/>
			<br><br>
			<button type="reset" class="button button-rounded button-flat-caution"><b>Clear</button>
			&nbsp;&nbsp;
			<button type="submit" class="button button-rounded button-flat-primary"><b>　Log In　</button>
			<br><br>
			<a href="food_submit_1.php" ><button type="button" class="button button-rounded button-flat-action"><b><font color="#FFFFFF">　　　 　 Submit　  　　　</button></a><br><br>
		</form>
			
		<a href='food_manage_login.php'>
		管理者登入<br></a>
		</center>
		<script type="text/javascript">
			function formReset(){
  				document.getElementById("myform").reset();
  			}
		</script>
	</body>
</html>
