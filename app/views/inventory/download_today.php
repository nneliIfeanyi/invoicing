<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once APPROOT . '/views/TCPDF-main/tcpdf.php'; 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
//$pdf->setAuthor('Nicola Asuni');
//$pdf->setTitle('TCPDF Example 006');
//$pdf->setSubject('TCPDF Tutorial');
//$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Inventory', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
  require_once(dirname(__FILE__).'/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// Print a table

// add a page
$pdf->AddPage();
$date = $_POST['date'].' '.$_POST['month'].' '.$_POST['year'];

$html = '<h3 style="text-align:center">Sales Record for '.$date.'</h3>
<table cellspacing="5" cellpadding="5">
  <tr>
    <th bgcolor="#cccccc" width="10%">Qty</th>
    <th bgcolor="#cccccc" width="50%">Description of goods</th>
    <th bgcolor="#cccccc" width="15%">Rate</th>
    <th bgcolor="#cccccc" width="25%">Amount</th>
  </tr>
';

if(!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME))
{
  die("failed to connect");
}
$biz_id = $_SESSION['user_id'];
$t_date = $_POST['date'];// date('D jS');
$t_month = $_POST['month'];
$t_year = $_POST['year'];
$sql = "SELECT * FROM transactions WHERE biz_id = '$biz_id' AND t_date = '$t_date' AND t_month = '$t_month' AND t_year = '$t_year'";
$query = mysqli_query($conn, $sql);

$sql = "SELECT SUM(t_total) AS sales_total FROM customers WHERE biz_id = '$biz_id' AND t_date = '$t_date' AND t_month = '$t_month' AND t_year = '$t_year'";
$query2 = mysqli_query($conn, $sql);
$result2 = mysqli_fetch_assoc($query2);

$sql = "SELECT SUM(paid) AS sales_paid FROM customers WHERE biz_id = '$biz_id' AND t_date = '$t_date' AND t_month = '$t_month' AND t_year = '$t_year'";
$query3 = mysqli_query($conn, $sql);
$result3 = mysqli_fetch_assoc($query3);

while ($result = mysqli_fetch_array($query)) {
$html .= '
  <tr>
    <td>'.$result['qty'].'</td>
    <td>'.$result['dsc'].'</td>
    <td>'.$result['rate'].'</td>
    <td>'.$result['amount'].'</td>
  </tr>';
}

$html .= '
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Print some HTML Cells
$credit = $result2['sales_total'] - $result3['sales_paid'];
$html = '<h3 color="green"><span>Total Sales: N'.put_coma($result2['sales_total']).'</span></h3>';
$html2 = '<h3 color="green"><span>Total Credit: N'.put_coma($credit).'</span></h3>';

$html3 = '<h3 color="green"><span>Cash At Hand: N'.put_coma($result3['sales_paid']).'</span></h3>'; 
         

$pdf->setFillColor(255,255,0);

$pdf->writeHTMLCell(0, 0, '', '', $html, '', 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 4, '', '', $html2, '', 1, 0, true, 'R', true);
$pdf->writeHTMLCell(0, 0, '', '', $html3, '', 1, 0, true, 'R', true);


// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
