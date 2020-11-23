<?php

require_once('tcpdf/tcpdf.php');
session_start();
require("function/function.php");

$currentOrders = getCurrentOrders($_GET["order_id"]);
$currentUser = getCurrentUser($currentOrders["users_id"]);
$allOrderDetail = getAllOrderDetail($_GET["order_id"]);
$currentPaymentOrder = getCurrentPaymentOrder($_GET["order_id"]);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('บริษัท ซีเอชพัทลุง จำกัด');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------
// set font

//$fontname = $pdf->addTTFfont('fonts/Browa.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont('cordiaupc', '', 12, '', true);


$line_html="";
//PAGE 3 >> PAGE 1
$pdf->AddPage();
$pdf->setPageOrientation ('P', $autopagebreak='', $bottommargin='');
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(true, 0);
// Set some content to print

$total_price = 0;
$total_weight = 0;
foreach($allOrderDetail as $data){
    $sum_price = 0;
    $a++;
    $cPrice = number_format($data['sum_price']);
    $total_price += $data['sum_price'];
    $total_weight += $data['pro_weight'];

$line_html  .= <<<EOD
                <tr>
                    <td align="center" style="border-right-width:0.1px;">{$a}</td>
                    <td style="border-right-width:0.1px;">{$data['pro_number']}</td>
                    <td style="text-align:center;border-right-width:0.1px;">{$data['pro_name']}</td>
                    <td style="text-align:center;border-right-width:0.1px;">{$data['pro_size']}</td>
                    <td style="text-align:center;border-right-width:0.1px;">{$data['pro_weight']}</td>
                    <td style="text-align:center;border-right-width:0.1px;">{$data['amount']}</td> 
                    <td style="text-align:right;border-right-width:0.1px;">{$cPrice}</td>
                </tr>
EOD;
}


if($total_weight >= 1 && $total_weight >= 4){
    $send_price = 110;
}else if($total_weight >= 5 && $total_weight >= 9){
    $send_price = 125;
}else if($total_weight >= 10 && $total_weight >= 14){
    $send_price = 165;
}else if($total_weight >= 15 && $total_weight >= 19){
    $send_price = 215;
}else if($total_weight >= 20 && $total_weight >= 24){
    $send_price = 300;
}else{
    $send_price = 390;
}
                    

//$total_price = $price + 40;
$ythai = date("Y")+543;
$convert_datePrint = date("d/m/").$ythai;
$convert_dateOrder = formatDateFull($currentOrders['date_order']);
$summary = $send_price + $total_price;
$cTotal = number_format($total_price);
$cSummary = number_format($summary);
$convertPrice = convertMoneyToText($cSummary);


$header_html  .= <<<EOD
<div style="text-align:left;margin:0;border:1px solid black;"><b>บริษัท ซีเอชพัทลุง จำกัด</b><br />
ที่อยู่ 102 หมู่ที่ 2 ตำบลเขาเจียก เขต/อำเภอเมืองพัทลุง จังหวัดพัทลุง รหัสไปรษณีย์93000<br/>
โทร: 098-6719738,074-610464<br/>
<div style="text-align:center;margin:0;"><b>ใบสั่งซื้อ</b></div>
<div style="text-align:left;margin:0;"><b style="color:red">เลขที่การสั่งซื้อ :</b>{$_GET["order_id"]}</div>
</div>
                
EOD;

$header_b  .= <<<EOD
    <table border="1" style="width:100%">
        <tr>
            <td><div align="center" >
                    <table>
                    <tr>
                            <td style="width:320px;text-align:left;">รหัสลูกค้า:{$currentUser['cus_id']}</td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td style="width:320px;text-align:left;">ชื่อลูกค้า: {$currentOrders['receive_firstname']} {$currentOrders['receive_lastname']}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width:320px;text-align:left;">ที่อยู่ผู้รับ : </td>
                        </tr>
                        <tr>
                            <td style="width:320px;text-align:left;">{$currentOrders['receive_address']}</td>
                        </tr>
                        
                        
                    </table>
                 </div>
            </td>
            <td><div align="center" >
                    <table>
                        <tr>
                            <td style="width:120px;text-align:left;color:red;">วันที่สั่งซื้อ :</td>
                            <td style="width:160px;text-align:left;">{$convert_dateOrder}</td>
                        </tr>
                        <tr>
                            <td style="width:120px;text-align:left">เวลาที่สั่งซื้อ :</td>
                            <td style="width:160px;text-align:left;">{$currentOrders['time_order']}</td>
                        </tr>
                        <tr>
                            <td style="width:120px;text-align:left">วันที่พิมพ์ :</td>
                            <td style="width:160px;text-align:left;">{$convert_datePrint}</td>
                        </tr>
                        
                    </table>
                 </div>
            </td>
        </tr>
    </table>
EOD;

$body_html  .= <<<EOD
<table style="width:100%;" border="1">
    <tr>
        <td style="width:10%;text-align:center;"><b>ลำดับ</b></td>
        <td style="width:20%;text-align:center;"><b>รหัสสินค้า</b></td>
        <td style="width:20%;text-align:center;"><b>ชื่อสินค้า</b></td>
        <td style="width:10%;text-align:center;"><b>ขนาด</b></td>
        <td style="width:10%;text-align:center;"><b>น้ำหนัก</b></td>
        <td style="width:15%;text-align:center;"><b>จำนวน</b></td>
        <td style="width:15%;text-align:center;"><b>ราคา</b></td>
    </tr>
    {$line_html}
</table>

EOD;



$footer_html2  .= <<<EOD
    <table>
                <tr>
                    <td>
                        <div align="left" border="1">
                           <table>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>ออกโดย </td>
                            </tr>
                            <tr>
                                <td>บริษัท ซีเอชพัทลุง จำกัด</td>
                            </tr>
                            

                           </table>
                        </div>
                    </td>
                    <td>
                        <div align="left" border="1">
                            <table>
                            <tr>
                                <td>ราคารวม</td>
                                <td>{$cTotal}</td>
                                <td>บาท</td>
                            </tr>
                            <tr>
                                <td>ค่าจัดส่ง</td>
                                <td>{$send_price}</td>
                                <td>บาท</td>
                            </tr>
                            <tr>
                                <td>ราคารวมสุทธิ (บาท) </td>
                                <td>{$cSummary}</td>
                                <td>บาท</td>
                            </tr>
                           </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="2" border="1">
                    {$convertPrice}
                    </td>
                </tr>

            </table>

EOD;
$html = <<<EOD
{$header_html}
{$header_b}
{$body_html}
{$footer_html1}
{$footer_html2}
EOD;


// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('รายงาน.pdf', 'I');
?>

<?php die(); ?>
