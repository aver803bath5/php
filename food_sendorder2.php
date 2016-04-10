<?php
	include('food_notin.php'); 
	include('food_mysql_connect.inc.php');//連接數據庫 
	mysql_select_db("ordering_sys");
	$nowTime=date('ymdHis');
	$id=$_SESSION['id'];
	$r_id=$_SESSION['r_id'];
	$query1="INSERT INTO orders(u_mail,r_id,o_date,o_ispaid)VALUES('$id','$r_id','$nowTime','0')";
	
	mysql_query($query1);
	$read="SELECT * FROM meal";
	$readresult=mysql_query($read);
	$i=1;
	//$totalcost=0;
	while($result2=mysql_fetch_row($readresult))
	{
		$num=$_SESSION["m_number"][$i];
		if($num!=NULL)
		{
			$m_id=$result2[0];
			$query2="INSERT INTO lines2(m_id,o_date,l_amount)VALUES('$m_id','$nowTime','$num')";
			mysql_query($query2);
			//$totalcost=$totalcost+$result[3]*$num;
		}
		$i=$i+1;
	}

	//寄信囉～
	require_once("food_generatepdf.php");
	include("./food_mail/food_phpmailer.php"); //匯入PHPMailer類別 
    include("./food_mail/food_smtp.php");

    date_default_timezone_set('Asia/Taipei');
    $mail = new PHPMailer();                        // 建立新物件        
    // $mail->SMTPDebug=2;
    $mail->IsSMTP();                                // 設定使用SMTP方式寄信        
    $mail->SMTPAuth = true;                         // 設定SMTP需要驗證

    $mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
    $mail->Host = gethostbyname("smtp.gmail.com");                 // Gmail的SMTP主機        
    $mail->Port = 465;                              // Gmail的SMTP主機的port為465      
    $mail->CharSet = "utf-8";                       // 設定郵件編碼   
    $mail->Encoding = "base64";
    $mail->WordWrap = 50;                           // 每50個字元自動斷行
          
    $mail->Username = "aver803bath261@gmail.com";     // 設定驗證帳號        
    $mail->Password = "(Water0dragon)123";              // 設定驗證密碼        
          
    $mail->From = "aver803bath261@gmail.com";         // 設定寄件者信箱        
    $mail->FromName = "訂食吧";                 // 設定寄件者姓名        
          
    $mail->Subject = "新訂單";                     // 設定郵件標題        
      
    $mail->IsHTML(true);                            // 設定郵件內容為HTML 

    //  multiple recipients
    $mail->AddAddress("aver803bath261@gmail.com","訂食吧");//未來是店家的信箱

    // message
    $message = "老闆您好，訂食吧的菜單來囉～";
	$mail->Body = $message;
	$mail->AddAttachment($filename);
	if($mail->Send()){
		unlink($filename);
	} else{
		echo "信件未寄出，請再寄一次";
		unlink($filename);
		exit();
	}
?>
<html>
	<head>
		<title>訂食吧-成功送出訂單</title>
		<meta charset="utf-8">
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body background="food_p\back.jpg">
		<br><br>
		<center><b><font size="8" color=#4F4FFF>
		成功送出訂單
		<br><br><font size="5" color=#FF3333>
		3秒後跳轉訂餐大廳
		<?php
			header('refresh:3;url="food_lobby.php"');
			unset($_SESSION['r_name']);
			unset($_SESSION['r_place']);
			unset($_SESSION['r_time']);
			unset($_SESSION['r_id']);
			unset($_SESSION['m_number']);
			unset($_SESSION['o_id']);
		?>