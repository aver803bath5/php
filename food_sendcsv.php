<?php
	include('food_notin.php');
	require('food_connect2.php');
	$nowTime=new DateTime("now",new DateTimeZone('Asia/Taipei'));#設定時間變數=台北時間
	$reallytime=$nowTime->format("Y年m月d日，星期：D 時間：H:i:s");
	$res_id=$_SESSION['r_id'];
	$read="SELECT * FROM meal WHERE res_id='$res_id'";
   	 $readresult = mysqli_query($link,$read);
    	$sql = "SELECT * FROM restaurant WHERE res_id='$res_id'";
    	$result=mysqli_query($link, $sql);
    	$row1=mysqli_fetch_array($result);
    	$rname=$row1[1];
	$filename = "訂食吧訂單-".$rname."(".$reallytime.").csv";
	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment;filename=$filename");
	header("Expires: 0");
	header("Pragma: public");
	$content .="~訂食吧訂單~,\n";
	$content .="餐廳名稱:,";
	$content .=$rname.",\n";


	$content .="訂餐時間,:".$reallytime.",\n";

	$content .="訂餐人,:".$_SESSION["u_name"].",\n";
	$content .="訂餐人電話,:".$_SESSION["u_phone"].",\n";
	$content .="品項,單價,數量,\n";
	$i=1;
	$totalcost=0;
	while($row=mysqli_fetch_array($readresult))
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