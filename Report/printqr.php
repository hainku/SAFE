<?php
require('fpdf184/fpdf.php');
require('phpqrcode/qrlib.php');
require_once'../Class/Product.php';
$p=new Product();
$data=$p->printqr();
$prod=[];
$qrTemp=[];
$pc=0;
while($row=$data->fetch_assoc()){
    $prod[]=$row;
    $result = $prod[$pc]["ProductCode"]; 
    $filename=$prod[$pc]["ProductCode"].".png";
    $qrTemp[] = $filename; 
    QRcode::png($result, $filename, QR_ECLEVEL_L, 5); // save QR as PNG
    $pc++;
}

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Print Qr Code', 0, 1, 'C');
$y = 20;   // starting Y
$col = 1;  // starting column

$pdf->SetFont('Arial', '', 8);
$cnt=1;
$i=0;
//for ($i = 1; $i <= 100; $i++) {
foreach($prod as $prd){
    if($cnt>35){
        $cnt=1;
        $pdf->AddPage();
        $y = 20;   // starting Y
        $col = 1; 
    }
    $name = 'Coke';
    $x = $col * 30;
    $pdf->Image($qrTemp[$i], $x, $y, 30, 30);
    $pdf->setXY($x, $y + 27); 
    $pdf->Cell(30, 5, $name, 0, 0, 'C');
    $col++;
    if ($col > 5) {
        $col = 1;
        $y += 35; 
    }
    $cnt++;
    $i++;
}


$pdf->Output();
foreach($qrTemp as $qr){
    if (file_exists($qr)) {
        unlink($qr);
    }
}


?>
