<!-- <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd"> -->
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<title>訂食吧-管理者登入</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	<body background="food_p\back.jpg">
		<div id="header">
		<marquee direction="right" height="100" scrollamount="5" behavior="alternate">
		【訂食吧】管理者登入頁面
		</marquee>
		</div>

		<center style="width: 800px ; margin: 0 auto"><b>
		<font size="5.5" color=#00A8A8>
		-管理者登入-<br>
		<img src="food_p\1.png"  width="300px" height="250px"></image>
		<form name="order" method="post" action="food_connect_manage.php" id="myform">
			<br><font size="4.5" color=#D18800>
			信箱：<input type="email" size=10 name="u_account" />
			<br><br>
			密碼：<input type="password" size=10 name="u_pwd" required/>
			<br><br>
			<button type="reset" class="button button-rounded button-flat-caution"><b>Clear</button>
			&nbsp;&nbsp;
			<button type="submit" class="button button-rounded button-flat-primary"><b>　Log In　</button>
			<br><br>
		</form>
		<a href='food_register.php'>
		-回到登入畫面-<br></a>
		</center>
		<script type="text/javascript">
			function formReset(){
  				document.getElementById("myform").reset();
  			}
		</script>
	</body>
</html>