<?php 
	include('food_notin.php');
	include('food_mysql_connect.inc.php');
	$nowTime=new DateTime("now",new DateTimeZone('Asia/Taipei'));#設定時間變數=台北時間
	$reallytime=$nowTime->format("Y年m月d日，星期：D 時間：H:i:s");
	$read = "SELECT * FROM meal";
    $readresult = mysql_query($read);
	$filename = "訂食吧訂單-夫芙無國界料理店(".$reallytime.").csv";
	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment;filename=$filename");
	header("Expires: 0");
	header("Pragma: public");
	$content .="~訂食吧訂單~,\n";
	$content .="餐廳名稱:,";
	$content .="夫芙無國界料理店,\n";
	
	
	$content .="訂餐時間,:".$reallytime.",\n";
	
	$content .="訂餐人,:".$_SESSION["u_name"].",\n";
	$content .="訂餐人電話,:".$_SESSION["u_phone"].",\n";
	$content .="品項,單價,數量,\n";
	$i=1;
	$totalcost=0;
	while($row=mysql_fetch_row($readresult))
	{	
		if($_SESSION["m_number"][$i] != NULL)
		{
			$content .= $row[2].",".$row[3].",".$_SESSION["m_number"][$i]."\n";
			$totalcost=$totalcost+$row[3]*$_SESSION["m_number"][$i];
		}
		
		$i += 1;
	}
	$content .="總金額,".$totalcost.",\n";
	echo mb_convert_encoding($content , "Big5" , "UTF-8");
?>