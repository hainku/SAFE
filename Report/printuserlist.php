<?php
require('fpdf184/fpdf.php');
require_once'../Class/User.php';
$u=new User();
$data=$u->showallusers();

$pdf = new FPDF('L', 'mm', array(330.2, 215.9));
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',140,13,20);
$pdf->SetFont('Times', 'B', 15);
$pdf->Cell(0, 5, 'SAFE', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'User Information', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(10, 5, '#', 1, 0, 'C');
$pdf->Cell(60, 5, 'Name', 1, 0, 'L');
$pdf->Cell(120, 5, 'Address', 1, 0, 'L');
$pdf->Cell(40, 5, 'Contact No', 1, 0, 'L');
$pdf->Cell(40, 5, 'Birth Date', 1, 0, 'L');
$pdf->Cell(20, 5, 'Role', 1, 1, 'L');
$pdf->SetFont('Arial', '', 8);
$c=0;
while($row=$data->fetch_assoc()){
    $c++;
    $name=$row['Lastname'].', '.$row['Firstname'].' - '.$row['Middlename'];
    $bdate=strtotime($row['Birthdate']);
    $pdf->Cell(10, 5, $c, 1, 0, 'C');
    $pdf->Cell(60, 5, $name, 1, 0, 'L');
    $pdf->Cell(120, 5, $row['Address'], 1, 0, 'L');
    $pdf->Cell(40, 5, $row['Contact'], 1, 0, 'L');
    $pdf->Cell(40, 5, date("M. d, Y",$bdate), 1, 0, 'L');
    $pdf->Cell(20, 5, $row['Role'], 1, 1, 'L');
}


$pdf->Output();
?>