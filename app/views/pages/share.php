<?php

require_once APPROOT . '/views/TCPDF-main/tcpdf.php'; 
  define('ID', $data['t_id']);
  define('BIZNAME', $data['user']->bizname);
  define('BIZADDRESS', $data['user']->bizaddress);
  define('BIZHOTLINE', $data['user']->bizphone);
  define('BIZID', $data['user']->id);
  define('BIZDSC', $data['user']->biz_dsc);
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
      public $conn;
      public $t_id;
      public $user_name;
      public $user_phone;
      public $user_address;
    //Page header
    public function Header() {
        $user_name = BIZNAME;
        $user_phone = BIZHOTLINE;
        $user_address = BIZADDRESS;
        $user_dsc = BIZDSC;
        if(!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME))
        {
          die("failed to connect");
        }
        $this->SetTextColor(10, 113, 11);
        $this->SetFont('helvetica', 'B', 20);
        $this->cell(190, 2, "$user_name", 0, 1, "L");

        $this->Ln(1);
        $this->SetTextColor(10, 10, 11);
        $this->SetFont('helvetica', 'N', 12);
        $this->cell(190, 2, "$user_dsc", 0, 1, "L");
        $this->Ln(1);
        $this->SetFont('helvetica', 'N', 12);
        $this->cell(190, 3, "Address: $user_address", 0, 1, "L");


        $this->SetFont('helvetica', 'B', 15);
        $this->cell(190, 2, "Hotline: $user_phone", 0, 1, "R");
        $this->SetTextColor(28, 81, 5);
        $this->cell(86, 0, '-------------------------------------------------------------------------------------------------------------', 0, '', '', '');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 14);
        // Page number
        $this->Cell(0, 10, 'Thanksfor your patronage, pls call again!', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        //$this->SetY(-20);
        // Set font
        //$this->SetFont('helvetica', 'B', 8);
        //$this->cell(0, 0, "__________________________________", 0, 1, "C");

    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Stanvic Concepts');
$pdf->SetTitle(BIZNAME.' '.'Sales Invoice');
$pdf->SetSubject('Sales Invoice');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'B', 12);

// add a page
$pdf->AddPage();
if(!$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME))
{
  die("failed to connect");
}
$t_id = ID;
$biz_id = BIZID;
$sql = "SELECT * FROM invoicing WHERE biz_id = '$biz_id' AND t_id = '$t_id' ";
$query = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM invoicing WHERE biz_id = '$biz_id' AND t_id = '$t_id' ";
$query2 = mysqli_query($conn, $sql2);
$result = mysqli_fetch_assoc($query2);
$customer_name = $result['customer_name'];
$customer_phone = $result['customer_phone'];
$customer_address = $result['customer_address'];
$paid = $result['paid'];
$date = $result['c_date'].' '.$result['c_month'].' '.$result['c_year'];
$time = $result['c_time'];
$sum = 0;

  $pdf->Ln(21);
  $pdf->SetFont('times', 'N', '12');
  $pdf->SetTextColor(01,19,20);
  $pdf->Cell(34, 5, "Customer name:", 0, 0, "L");
  $pdf->SetFont('helvetica', 'B', '14');
  $pdf->Cell(30, 4, "$customer_name", 0, 0, "L");

  $pdf->Ln(6);
  $pdf->SetFont('times', 'N', '12');
  $pdf->Cell(35, 5, "Customer phone:", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('helvetica', 'B', '14');
  $pdf->Cell(30, 4, "$customer_phone", 0, 0, "L");

  $pdf->Ln(6);
  $pdf->SetFont('times', 'N', '12');
  $pdf->Cell(35, 5, "Customer address:", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('helvetica', 'B', '14');
  $pdf->Cell(30, 4, "$customer_address", 0, 0, "L");

  $pdf->Ln(6);
  $pdf->SetFont('times', 'N', '12');
  $pdf->Cell(34, 4, "Transaction date:", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('times', 'B', '15');
  $pdf->Cell(20, 4, "$date", 0, 0, "L");
  
  
$pdf->Ln(18);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('times', 'N', '15');
$pdf->Cell(18, 7, 'Qty', 1, 0, 'C', 1);
$pdf->Cell(95, 7, 'Description', 1, 0, 'L', 1);
$pdf->Cell(30, 7, 'Rate', 1, 0, 'L', 1);
$pdf->Cell(55, 7, 'Amount', 1, 0, 'L', 1);
$pdf->Ln(3);
while ($result = mysqli_fetch_array($query)) {
  $qty = $result['qty'];
  $dsc = $result['dsc'];
  $rate = $result['rate'];
  if (!empty($qty) && !empty($rate)) {
    $amt = $qty * $rate;
    $total = $sum += $amt;
  }else{
    $amt = '';
  }

  if (strlen($qty) == 1) {
    $qty = '0'.$qty;
  }
  

 // $balance = $total - $paid;

  $pdf->Ln(9); //this will reduce the line height of each subject
  $pdf->SetTextColor(10, 13,11);
  $pdf->SetFont('helvetica', 'N', '12');
  $pdf->Cell(18, 10, $qty, 0, 0, "C");
  $pdf->Cell(95, 10, $dsc, 0, 0, "L");
  $pdf->Cell(30, 10, $rate, 0, 0, "L");
  $pdf->Cell(55, 10, $amt, 0, 0, "L");
}

$pdf->Ln(14);
$pdf->SetTextColor(10, 93, 11);
$pdf->SetFont('helvetica', 'B', '15');
$pdf->Cell(18, 4, '', 0, 0, "R");
$pdf->Cell(95, 4, 'Total:', 0, 0, "R");
$pdf->Cell(30, 4, '', 0, 0, "R");
$pdf->Cell(55, 4, 'N'.put_coma($total), 0, 0, "L");


if (!empty($paid)) {
  $pdf->Ln(8);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('helvetica', 'B', '15');
  $pdf->Cell(18, 4, '', 0, 0, "R");
  $pdf->Cell(95, 4, 'Paid:', 0, 0, "R");
  $pdf->Cell(30, 4, '', 0, 0, "R");
  $pdf->Cell(55, 4, 'N'.put_coma($paid), 0, 0, "L");


  $pdf->Ln(8);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('helvetica', 'B', '15');
  $pdf->Cell(18, 4, '', 0, 0, "R");
  $pdf->Cell(95, 4, 'Balance:', 0, 0, "R");
  $pdf->Cell(30, 4, '', 0, 0, "R");
  $pdf->Cell(55, 4, 'N'.put_coma($total - $paid), 0, 0, "L");
}else{
  $pdf->Ln(8);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('helvetica', 'B', '15');
  $pdf->Cell(18, 4, '', 0, 0, "R");
  $pdf->Cell(95, 4, 'Paid:', 0, 0, "R");
  $pdf->Cell(30, 4, '', 0, 0, "R");
  $pdf->Cell(55, 4, 'N0.00', 0, 0, "L");


  $pdf->Ln(8);
  $pdf->SetTextColor(255, 10, 17);
  $pdf->SetFont('helvetica', 'B', '15');
  $pdf->Cell(18, 4, '', 0, 0, "R");
  $pdf->Cell(95, 4, 'Balance:', 0, 0, "R");
  $pdf->Cell(30, 4, '', 0, 0, "R");
  $pdf->Cell(55, 4, '-N'.put_coma($total), 0, 0, "L");
}

$pdf->Ln(10);
$pdf->SetTextColor(28, 81, 5);
$pdf->cell(86, 0, '_________________________________________________________________________________________', 0, '', '', '');
// set some text to print
$today_date = date('F d, Y');
$time = date('h:ia');
$txt = <<<EOD

This invoice was generated on $today_date at exactlty $time
EOD;

// print a block of text using Write()
//$pdf->Ln(16);
$pdf->SetTextColor(28, 11, 5);
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$d = date("d s");
$pdf->Output($customer_name.'_'.$d.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



