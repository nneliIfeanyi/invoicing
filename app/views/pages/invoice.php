<?php

require_once APPROOT . '/views/TCPDF-main/tcpdf.php';

if(isset($_POST['generate-invoice'])){ 
  define('ID', $_POST['t_id']);
  define('BIZNAME', $_SESSION['user_name']);
  define('BIZADDRESS', $_SESSION['address']);
  define('BIZHOTLINE', $_SESSION['user_phone']);
  define('BIZID', $_SESSION['user_id']);
  define('BIZDSC', $_SESSION['user_dsc']);
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
        $this->SetFont('helvetica', 'B', 10);
        $this->cell(190, 2, "$user_dsc", 0, 1, "L");
        $this->Ln(1);
        $this->SetFont('helvetica', '', 12);
        $this->cell(190, 3, "Address: $user_address", 0, 1, "R");


        $this->SetFont('helvetica', '', 12);
        $this->cell(190, 2, "Hotline: $user_phone", 0, 1, "R");
        $this->SetTextColor(10, 100, 11);
        $this->cell(86, 0, '__________________________________________________________________________________________________', 0, '', '', '');
        $this->Ln(30);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetY(-20);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        $this->cell(0, 0, "Thanks for your patronage, please call again", 0, 1, "C");

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

  $pdf->Ln(12);
  $pdf->SetFont('times', 'B', '11');
  $pdf->SetTextColor(01,19,20);
  $pdf->Cell(29, 6, "Customer name: ______________________________________", 0, 0, "L");
  $pdf->SetFont('times', 'N', '14');
  $pdf->Cell(50, 4, "$customer_name", 0, 0, "L");

  $pdf->Ln(7);
  $pdf->SetFont('times', 'B', '11');
  $pdf->Cell(30, 6, "Customer phone: ______________________________________", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('times', 'N', '14');
  $pdf->Cell(50, 4, "$customer_phone", 0, 0, "L");

  $pdf->Ln(7);
  $pdf->SetFont('times', 'B', '11');
  $pdf->Cell(32, 6, "Customer address: _______________________________________", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('times', 'N', '14');
  $pdf->Cell(50, 4, "$customer_address", 0, 0, "L");

  $pdf->Ln(7);
  $pdf->SetFont('times', 'N', '10');
  $pdf->Cell(27, 4, "Transaction date:", 0, 0, "L");
  $pdf->SetTextColor(01,19,20);
  $pdf->SetFont('times', 'B', '12');
  $pdf->Cell(20, 4, "$date", 0, 0, "L");
  
  
$pdf->Ln(20);
$pdf->SetFillColor(248, 181, 71);
$pdf->Cell(16, 7, 'qty', 1, 0, 'L', 1);
$pdf->Cell(65, 7, 'Description of goods', 1, 0, 'L', 1);
$pdf->Cell(25, 7, 'Rate', 1, 0, 'L', 1);
$pdf->Cell(45, 7, 'Amount', 1, 0, 'L', 1);
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

 // $balance = $total - $paid;

  $pdf->Ln(7); //this will reduce the line height of each subject
  $pdf->SetTextColor(10, 93,11);
  $pdf->SetFont('times', '', '11');
  $pdf->Cell(16, 4, $qty, 0, 0, "L");
  $pdf->Cell(65, 4, $dsc, 0, 0, "L");
  $pdf->Cell(25, 4, put_coma($rate), 0, 0, "L");
  $pdf->Cell(45, 5, put_coma($amt), 0, 0, "L");
}

$pdf->Ln(20);
$pdf->SetTextColor(10, 93, 11);
$pdf->SetFont('times', 'B', '15');
$pdf->Cell(20, 4, '', 0, 0, "L");
$pdf->Cell(20, 4, '', 0, 0, "L");
$pdf->Cell(20, 4, '', 0, 0, "L");
$pdf->Cell(48, 4, 'Total:', 0, 0, "L");
$pdf->Cell(20, 4, 'N'.put_coma($total), 0, 0, "L");


if (!empty($paid)) {
  $pdf->Ln(7);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('times', 'B', '15');
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(48, 4, 'Paid:', 0, 0, "L");
  $pdf->Cell(20, 4, 'N'.put_coma($paid), 0, 0, "L");


  $pdf->Ln(7);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('times', 'B', '15');
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(48, 4, 'Balance:', 0, 0, "L");
  $pdf->Cell(20, 4, 'N'.put_coma($total - $paid), 0, 0, "L");
}else{
  $pdf->Ln(7);
  $pdf->SetTextColor(10, 93, 11);
  $pdf->SetFont('times', 'B', '15');
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(48, 4, 'Paid:', 0, 0, "L");
  $pdf->Cell(20, 4, 'Nill', 0, 0, "L");


  $pdf->Ln(7);
  $pdf->SetTextColor(255, 10, 17);
  $pdf->SetFont('times', 'B', '15');
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(20, 4, '', 0, 0, "L");
  $pdf->Cell(48, 4, 'Balance:', 0, 0, "L");
  $pdf->Cell(20, 4, '-N'.put_coma($total), 0, 0, "L");
}

$pdf->Ln(6);
$pdf->SetTextColor(248, 181, 71);
$pdf->cell(86, 0, '__________________________________________________________________________________________________', 0, '', '', '');
// set some text to print
$today_date = date('F d, Y');
$time = date('h:ia');
$txt = <<<EOD

This invoice was generated on $today_date at exactlty $time
EOD;

// print a block of text using Write()
//$pdf->Ln(16);
$pdf->SetTextColor(248, 181, 71);
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($customer_name.'_'.$date.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

}


