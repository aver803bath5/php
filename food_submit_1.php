<html>
	<head>
		<meta charset="utf-8">
		<title>訂食吧-註冊會員</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="buttons.css" rel="stylesheet">
		<script type="text/javascript" src="buttons.js"></script>
	</head>
	
	
	<body background="food_p\back.jpg">
		<div id="header">
		<marquee direction="right" height="100" scrollamount="5" behavior="alternate">歡迎使用【定食吧】訂餐系統
		</marquee>
		</div>

		<center><div id="content">
			<img src="food_p\1.png"  width="500px" height="300px"></image><br/>
			<font size="5" color=#FF5959>註冊帳號</font>
			<font size="5" color=#A3A3FF>→</font>
			<font size="5" color=#A3A3FF>信箱認證→
			</font>
			<font size="5" color=#A3A3FF>註冊成功　
			</font>
	
		<br>
		<br>	
		<form name="submit" method="post" action="food_register_test.php">
			<center><div class="input-group">
			<input class="form-control" placeholder="姓名" type="text"  name="u_name" size="1" required>
			<input class="form-control" placeholder="example@gmail.com" type="text" name="u_mail" size="1" required>
			<input class="form-control" placeholder="電話" type="text"  name="u_phone" size="1" required> 
			<input class="form-control" placeholder="密碼" type=password name="u_pwd" value='' size="1" required>
			<input class="form-control" placeholder="確認密碼" type=password name="u_pwdchk" value='' size="1"  required><br/>
			</center>
			
		
		<br/>
		<button type="reset" class="button button-rounded button-flat-caution"><b>清除資料</button> &nbsp&nbsp&nbsp
		<button type="submit" class="button button-rounded button-flat-caution"><b>送出資料</button>
		</form>
		</div>
				
				</form>
				</div>	
				<br/>
				<br/>
				<br/>
				<br/>
				
				<center>
				<div id="footer">
	        	<p class="footer_hr"></p>
	        	<p>
	        		<font-size="20">
	        		發行人：孟繁淳、鄭人瑋、李建叡、劉德圓<br/>
	          		電話：0988888888</font>
	        	</p>
				</center>


		<script language="JavaScript" type="text/JavaScript">
		function check(){
			p1 = document.submit.u_pwd.value;
			p2 = document.submit.u_pwdchk.value;
			if ( p1 == p2 ) { 
				alert("BINGO!!!");
				return true;
			}else {
				alert("兩組密碼不一致");
				return false;
			}
		}
		</script>
	</body>
</html>
