<?php
	include('food_notin.php');
	require('food_connect2.php');
    	$sql = "SELECT * FROM restaurant WHERE res_id='$res_id'";
    	$result=mysqli_query($link, $sql);
    	$row=mysqli_fetch_array($result);
    	$rname=$row[1];
    	$res_id=$_SESSION['r_id'];
	$read="SELECT * FROM meal WHERE res_id='$res_id'";
	$readresult=mysqli_query($link, $read);
	// Remember to copy msjh.ttf to [path to tFPDF]/font/unifont/ directory
	//  Initialize tFPDF
	require('./fpdf/chinese-unicode.php');
	$pdf = new PDF_Unicode();
	$pdf->AddUniCNShwFont('Uni');

	$pdf->AddPage();

	//  Add a Unicode font like MSJH
	// $pdf->AddFont('MSJH','','msjh.ttf',true);
	// $pdf->SetFont('MSJH','',32);
	$pdf->SetFont('Uni','',32);
	//  Output Chinese string to PDF
	$pdf->Cell(40,10,'訂食吧訂單');//畫儲存格Cell(寬度, 高度, 內容)

	$pdf->Ln(15);//換行
	$nowTime=new DateTime("now",new DateTimeZone('Asia/Taipei'));#設定時間變數=台北時間
	$reallytime=$nowTime->format("Y年m月d日，星期：D 時間：H:i:s");
	$pdf->SetFont('Uni','',20);
	$pdf->Cell(35,5,'餐廳名稱:');
	$pdf->Cell(20,5,$rname);
	$pdf->Ln(10);
	$pdf->Cell(35,10,'訂餐時間:');
	$pdf->Cell(20,10,$reallytime);
	$pdf->Ln(10);
	$pdf->Cell(25,10,'訂餐人:');
	$pdf->Cell(40,10,$_SESSION["u_name"]);
	$pdf->Cell(40,10,'訂餐人電話:');
	$pdf->Cell(20,10,$_SESSION["u_phone"]);
	$pdf->Ln(16);
	$pdf->SetDrawColor(204, 204, 204);//線段顏色
	$pdf->SetLineWidth(0.4);//線段寬
	$pdf->Line(10, 60, 200, 60);//畫線
	// $pdf->SetFont('MSJH','',14);
	$pdf->SetFont('Uni','',14);
	$pdf->Ln(3);
	//$pdf->Cell(8,10,"No");
	$pdf->Cell(120,10,"品名");
	$pdf->Cell(30,10,"單價");
	$pdf->Cell(15,10,"數量");
	$pdf->Ln();
	$i = 1;
	$totalcost=0;
	while($row=mysqli_fetch_array($readresult)){
		if($_SESSION["m_number"][$i] != NULL)
		{
			$pdf->Cell(120,10,$row[2]);
			$pdf->Cell(30,10,$row[3]);
			$pdf->Cell(15,10,$_SESSION["m_number"][$i]);
			$pdf->Ln();
			$totalcost=$totalcost+$row[3]*$_SESSION["m_number"][$i];
		}
		$i += 1;
	}
	$pdf->Ln(3);
	//頁尾
	// $pdf->SetFont('MSJH','',16);
	$pdf->SetFont('Uni','',16);
	$pdf->Cell(25,10,"總金額：");
	$pdf->Cell(20,10,"$totalcost");
	$pdf->Cell(15,10,"元");

	$pdf->SetY(266);//顯示位置
	// $pdf->SetFont('Arial','I',8);//字型樣式
	$pdf->Cell(0,10,$pdf->PageNo(),0,0,'C');//頁碼
	// Output PDF document
	$filename="orderbar".$nowTime->format("YmdDHis").".pdf";
	$pdf->output($filename,"F");

	//$pdf->Output();
?>