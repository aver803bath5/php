<html>
	<head>
		<title>訂食吧-註冊會員</title>
	</head>
	<body>
		<center><b>
		<br>
		<br>
		<br>
			<img src="food_p\1.jpg"
			width="25%" height="25%"></image>
		<br>
		
			<font size="5" color=#A3A3FF>
			註冊帳號　 
			<img src="food_p\5.jpg"
			width="3%" height="5%"></image>
			<font size="5" color=#A3A3FF>
			　信箱認證　 
			<img src="food_p\5.jpg"
			width="3%" height="5%"></image>
			<font size="5" color=#FF5959>
			　 註冊成功　　
		<br>
		<br>
		<font size="5" color=#000000>
		3.註冊成功
		<br>
		<br>
		<?php
			include("food_connect2.php");
			error_reporting(E_ALL);
			$verify = stripslashes(trim($_GET['verify']));
			$nowtime = time();

			$query ="SELECT u_mail,u_token_exptime FROM user WHERE u_status='0' AND u_token='$verify'";
			$result=mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if($row)
			{
				if($nowtime>$row['u_token_exptime'])
				{ //30min
					$msg = '您的激活有效期已過，請登錄您的帳號重新發送激活郵件.';
				}
				else
				{
					$row=$row['u_mail'];
					$update="UPDATE user SET u_status=1 WHERE u_mail='$row'";
					mysqli_query($link,$update);
					// mysql_query("UPDATE user SET u_status=1 WHERE u_mail=".$row['u_mail']");
					if(mysqli_affected_rows($link)!=1) die(0);
					$msg = '恭喜您！您已正式成為會員。！';
				}
			}else{
				$msg = 'error.';	
			}

			echo $msg;
			?>
			<br><br>
			<a href="food_register.php">
			<img src="food_p\21.png"  width="150px"></image></a>
		</center>
	</body>
</html>