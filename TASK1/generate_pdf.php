<?php

use Fpdf\Fpdf;

require '../vendor/autoload.php';

$pdf = new Fpdf();
$pdf->AddPage();
$pdf->Rect(5, 5, 200, 287);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Fullname:', 0, 0, 'L', false, '');
$pdf->Cell(100, 10, $name, 0, 0, 'L', false, '');
$pdf->Image($image, 150, 10, 50, 35, '', '');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 10, 'Subjects', 1, 0, 'C', false, '');
$pdf->Cell(50, 10, 'Score', 1, 0, 'C', false, '');
$pdf->Ln();
foreach ($score as $subject) {
  $i = explode('|', $subject);
  $pdf->Cell(50, 10, $i[0], 1, 0, 'C', false, '');
  $pdf->Cell(50, 10, $i[1], 1, 0, 'C', false, '');
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50, 10, 'Phone Number:', 0, 0, 'L', false, '');
$pdf->Cell(50, 10, $phone, 0, 0, 'L', false, '');
$pdf->Ln();
$pdf->Cell(50, 10, 'Email Id:', 0, 0, 'L', false, '');
$pdf->Cell(50, 10, $email, 0, 0, 'L', false, '');

$pdf->Output('F', './pdfs/' . $email . '.pdf');
ob_clean();
$pdf->Output('D', $name . '.pdf');
