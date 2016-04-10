<html>
	<head>
		<title>訂食吧-登入</title>
	</head>
	<body>
		<center><b><font size=4 color=#FFC559>

		<?php
			session_start();
			//連接資料庫
			//只要此頁面上有用到連接MySQL就要include它
			include("food_mysql_connect.inc.php");
			$id = $_POST['u_account'];
			$pwd = $_POST['u_pwd'];
			//搜尋資料庫資料
			$sql = "SELECT * FROM user WHERE u_mail='$id'";
			$result = mysql_query($sql);
			$row = @mysql_fetch_row($result);
			//判斷帳號與密碼是否為空白
			//以及MySQL資料庫裡是否有這個會員
			if($row[0] == $id && $row[1] == $pwd)
			{
				$_SESSION['id'] = $id;
				$_SESSION['u_name'] =$row[2];
				$_SESSION['u_phone'] =$row[3];
       		 	header('Location:food_lobby.php');
			}
      		else
      		{
       		 	header("Refresh:3; url=food_register.php");
				$say = "登入失敗，三秒後跳回登入畫面.<BR>\n<a href='food_register.php'>不想等待請按此</a>"; 
				echo $say;
			}
		?>
	</body>
</html>