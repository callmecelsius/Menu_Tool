<?php

use setasign\Fpdi\Fpdi;
require_once('../fpdf/fpdf.php');
require_once('../fpdi/src/autoload.php');
$pdf = new Fpdi('L', 'in', array(60, 35.56));
$pdf->setSourceFile('../pdfs/01_Pandan2022-2.pdf');
// now write some text above the imported page
$pdf->AddFont('Love', '', 'Love.php');
$pdf->SetTextColor(255, 255, 255);


$pdf->AddPage();
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 0, 0, 60, 35.56, false);
createPage($pdf, array(15.5, 8.48), .965, 69, $banh, $snacks);
createPage($pdf, array(16.74, 20.35), 1.16, 69, $snacks, $slim);

// $pdf->AddPage();
// $tplIdx = $pdf->importPage(2);
// $pdf->useTemplate($tplIdx, 0, 0, 20, 35.56, false);
createPage($pdf, array(20+15, 13.85), 1.35, 69, $slim, $entree);
createPage($pdf, array(20+15.7, 22.8), 3.88, 69, $entree, $dessert - 1);
createPage($pdf, array(20+18.25, 29.25), 3.88, 45, $dessert - 1, $dessert);
createPage($pdf, array(20+18.25, 33.2), 3.88, 45, $dessert - 1, $dessert);

// $pdf->AddPage();
// $tplIdx = $pdf->importPage(3);
// $pdf->useTemplate($tplIdx, 0, 0, 20, 35.56, false);
createPage($pdf, array(40+13.7, 14.8), 1.16, 69, $dessert, $dessert_drink);
createPage($pdf, array(40+15, 23.6), 2, 69, $dessert_drink, $frozen);
$pdf->SetTextColor(0, 0, 0);
$pdf->AddPage();
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 0, 0, 60, 35.56, false);
createPage($pdf, array(.76, 19.35), 2, 78, $frozen, $frozen + 1);
createPage($pdf, array(17.2, 22.9), 2, 78, $frozen + 1, $frozen + 2);
$pdf->SetTextColor(255, 255, 255);
createPage($pdf, array(6.8, 30.9), 1, 72, $frozen + 2, $frozen + 6);
createPage($pdf, array(10.5, 31), 1, 72, $frozen + 6, $frozen + 9);

// $pdf->AddPage();
// $tplIdx = $pdf->importPage(5);
// $pdf->useTemplate($tplIdx, 0, 0, 20, 35.56, false);
$pdf->SetTextColor(0, 0, 0);
createPage($pdf, array(20+8.9, 28.1), 1, 78, $fusion + 1, $milk);
createPage($pdf, array(20+7.8, 17.65), 1, 78, $fusion, $milk - 1);
createPage($pdf, array(20+8.16, 1.6), 1, 108, $milk, $milk + 1);
createPage($pdf, array(20+7.87, 13.05), 1, 52, $milk + 3, $milk + 4);
createPage($pdf, array(20+17.85, 11.05), .965, 52, $milk + 1, $milk + 3);
createPage($pdf, array(20+17.85, 13.05), .965, 52, $milk + 4, $milk + 5);
createPage($pdf, array(20+17.85, 13.05), .965, 52, $milk + 4, $four);
$pdf->SetTextColor(255, 255, 255);
// $pdf->AddPage();
// $tplIdx = $pdf->importPage(6);
// $pdf->useTemplate($tplIdx, 0, 0, 20, 35.56, false);
createPage($pdf, array(40+14.857, 13.9), 1.005, 69, $four, $coffee);
createPage($pdf, array(40+14.857, 25.2), 1.005, 69, $coffee, $topping);
$pdf->SetTextColor(0, 0, 0);
createPage($pdf, array(40+2.5, 34.5), 1.005, 55, $topping, $topping + 1);
createPage($pdf, array(40+10.8, 34.5), 1.005, 55, $topping + 1, $topping + 2);
createPage($pdf, array(40+16, 32.05), 1.005, 55, $topping + 1, $topping + 2);
createPage($pdf, array(40+16, 34.1), 1.005, 55, $topping + 3, $topping + 4);

$pdf->Output('F', '../exports/WebMenu2022.pdf');

?>