<?php
require('fpdf184/fpdf.php');
require('phpqrcode/qrlib.php');
require_once'../Class/Product.php';
$p=new Product();
$data=$p->displayproducts();


$pdf = new FPDF();
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',90,18,10);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'SAFE', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'Product List', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 5,'#', 1, 0, 'C');
$pdf->Cell(35, 5,'Product ID', 1, 0, 'L');
$pdf->Cell(105, 5, 'Product Name', 1, 0, 'L');
$pdf->Cell(15, 5, 'Price', 1, 1, 'R');
$c=1;
$pdf->SetFont('Arial', '', 10);
while($row=$data->fetch_assoc()){
    $pdf->Cell(10, 5,$c, 1, 0, 'C');
    $pdf->Cell(35, 5, $row['ProductID'], 1, 0, 'L');
    $pdf->Cell(105, 5, $row['ProductName'], 1, 0, 'L');
    $pdf->Cell(15, 5, number_format($row['Price'],2), 1, 1, 'R');
    $c++;
}

$pdf->Output();
?>