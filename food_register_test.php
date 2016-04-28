<?php
	date_default_timezone_set("Asia/Taipei");
	error_reporting(E_ALL);
	require("food_connect2.php");//連接數據庫


	$u_mail = stripslashes(trim($_POST['u_mail']));
	$u_pwd = stripslashes(trim($_POST['u_pwd']));
	$u_name = stripslashes(trim($_POST['u_name']));
	$u_phone = stripslashes(trim($_POST['u_phone']));
	// echo "string";

	$query = "SELECT u_mail FROM user where u_mail='$u_mail'";
	mysqli_query($link,$query);

	$num = mysqli_num_rows(mysqli_query($link,$query));
	if($num==1)
	{
	    echo '這個信箱已經註冊過囉！<br />三秒後跳回上一頁';
	    header('refresh:3;url=food_submit_1.php');
	}
	$u_pwd = md5(trim($_POST['u_pwd'])); //加密密碼

	$regtime = time();

	$token = md5($u_name.$u_pwd.$regtime); //創建用於激活識別碼
	$token_exptime = time()+60*60*24;//過期時間為24小時後
	$sql = "INSERT INTO user (u_mail,u_pwd,u_name,u_phone,u_token,u_token_exptime,u_status,u_regtime,u_isroot) VALUES ('$u_mail','$u_pwd','$u_name','$u_phone','$token','$token_exptime',0,'$regtime',0)";

	//寄信囉～
	if(mysqli_query($link,$sql))
	{
		include("./food_mail/food_phpmailer.php"); //匯入PHPMailer類別
		include("./food_mail/food_smtp.php");

		date_default_timezone_set('Asia/Taipei');
		$mail = new PHPMailer();                        // 建立新物件
		// $mail->SMTPDebug=2;
	    $mail->IsSMTP();                                // 設定使用SMTP方式寄信
	    $mail->SMTPAuth = true;                         // 設定SMTP需要驗證

	    $mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線
        $mail->Host = gethostbyname("smtp.gmail.com");                 // Gmail的SMTP主機
	    // $mail->Host = "smtp.gmail.com";                 // Gmail的SMTP主機
	    $mail->Port = 465;                              // Gmail的SMTP主機的port為465
	    $mail->CharSet = "utf-8";                       // 設定郵件編碼
	    $mail->Encoding = "base64";
	    $mail->WordWrap = 50;                           // 每50個字元自動斷行

	    $mail->Username = "aver803bath261@gmail.com";     // 設定驗證帳號
	    $mail->Password = "(Water0dragon)123";              // 設定驗證密碼

	    $mail->From = "aver803bath261@gmail.com";         // 設定寄件者信箱
	    $mail->FromName = "訂食吧";                 // 設定寄件者姓名

	    $mail->Subject = "吧友啟動";                     // 設定郵件標題

	    $mail->IsHTML(true);                            // 設定郵件內容為HTML

		//	multiple recipients
		$receiver  = $u_mail; //send to
		$mail->AddAddress($u_mail,"吧友");

		// message
		$message = "親愛的訂食吧吧友".$u_name."：<br/>感謝您在我站註冊了新帳號。<br/>請點擊鏈接啟動您的帳號。<br/>
	    <a href='http://139.59.224.238/food_submit_3.php?verify=".$token."' target=
		'_blank'>'http://139.59.224.238/food_submit_3.php?verify=".$token."</a><br/>
	    如果以上鏈接無法點擊，請將它複製到你的瀏覽器地址欄中進入訪問，該鏈接24小時內有效。";
	    $mail->Body = $message;



		if($mail->Send()){
		        header('Location:food_submit_2.php');
		    }else{
		        $msg = "你用壞了～";
		        echo $msg;
		    }
		}
		// @$mail->ClearAddresses();
?>
