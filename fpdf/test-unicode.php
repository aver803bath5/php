<?php
require('chinese-unicode.php');
ini_set("session.auto_start", 0);
ob_start();
$pdf=new PDF_Unicode();
$pdf->AddUniCNShwFont('Uni');

//initialize document
$pdf->AliasNbPages();

$pdf->SetHeaderData('','','Test','Test page string');
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(5);
$pdf->setPrintFooter(true);
$pdf->setPrintHeader(true);
$pdf->setHeaderFont(Array('Uni', 'BI', 12));
$pdf->setFooterFont(Array('Uni', '', 8));

$pdf->AddPage();

$pdf->Ln(10);
$pdf->SetFont('Uni','',8);

$htmlcontent = "<table border=\"0\"><tr><td width=\"150\"><img src=\"http://www.studiocity-macau.com/uploads/images/SC/Entertainment/Batman/batman_share.jpg\" width=\"150\" height=\"109\" />&nbsp;</td>
<td width=\"400\"><a href=\"123123\">學生 123123 </a>123132</td></tr></table><br><br><br><br><br><br><br><br>
<table border=\"1\"><tr><td width=\"500\">123123123123</td></tr></table>";
$pdf->writeHTML($htmlcontent, true, 0);
$pdf->Output('UPLOAD/test.pdf','F');
ob_end_flush(); 

?>
