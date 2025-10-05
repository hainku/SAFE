<?php
require('fpdf184/fpdf.php');
require_once'../Class/User.php';
$u=new User();
$userid=$_GET['userid'];;
$data=$u->showalluserdata($userid);

$name='dela Cruz, Juan';
$bdate='bdate';
$email='email';
$contact='0000';
$address='address';
$un='un';
$pw='pw';
$role='role';
if($row=$data->fetch_assoc()){
    $name=$row['Lastname'].', '.$row['Firstname'];
    $bdate=strtotime($row['Birthdate']);
    $email=$row['Email'];
    $contact=$row['Contact'];
    $address=$row['Address'];
    $un=$row['Username'];
    $pw=$row['Password'];
    $role=$row['Role'];
}
$pdf = new FPDF();
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',80,13,20);
$pdf->SetFont('Times', 'B', 15);
$pdf->Cell(0, 5, 'SAFE', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'User Information', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'Personal Information', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Name:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 5, $name, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Birth date:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 5, date("M. d, Y",$bdate), 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Email:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 5, $email, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Contact No:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 5, $contact, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Address:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, $address, 'B', 1, 'L');


$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'User Credentials', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Username:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 5, $un, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Password:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 5, $pw, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 5, 'Role:', 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 5, $role, 'B', 1, 'L');

$pdf->Output();
?>