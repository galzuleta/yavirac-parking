<?php
require_once('../../app/templates/TCPDF/tcpdf.php');
include('../../app/config.php');

//cargar el encabezado
$query_setting = $pdo->prepare("SELECT * FROM settings WHERE enable_setting = '1'");
$query_setting->execute();
$settings = $query_setting->fetchAll(PDO::FETCH_ASSOC);
foreach($settings as $setting){
    $id_setting = $setting['id_setting'];
    $name_parking = $setting['name_parking'];
    $entity_activity = $setting['entity_activity'];
    $address = $setting['address'];
    $zone = $setting['zone'];
    $phone = $setting['phone'];
    $city = $setting['city'];
    $country = $setting['country'];
}

//sacar informacion del ticket
$query_customer = $pdo->prepare("SELECT * FROM customers WHERE enable_customer = '1'");
$query_customer->execute();
$customers = $query_customer->fetchAll(PDO::FETCH_ASSOC);

$query_invoice = $pdo->prepare("SELECT * FROM invoices WHERE enable_invoice = '1'");
$query_invoice->execute();
$invoices = $query_invoice->fetchAll(PDO::FETCH_ASSOC);

foreach ($invoices as $invoice) {
    $id_customer_invoice = $invoice['id_customer'];

    foreach ($customers as $customer) {
        $id_customer = $customer['id_customer'];

        if ($id_customer_invoice === $id_customer) {
            $name = $customer['name'];
            $lastname = $customer['lastname'];
            $identification = $customer['identification'];

            $id_invoice = $invoice['id_invoice'];
            $id_setting = $invoice['id_setting'];
            $no_invoice = $invoice['no_invoice'];

            $date_invoice = $invoice['date_invoice'];
            $date_issue = $invoice['date_issue'];
            $time_issue = $invoice['time_issue'];
            $date_out = $invoice['date_out'];
            $time_out = $invoice['time_out'];
            $time_used = $invoice['time_used'];
            $cubicle = $invoice['cubicle'];
            $detail = $invoice['detail'];
            $price = $invoice['price'];
            $total = $invoice['total'];
            $amount_total = $invoice['amount_total'];
            $amount_literal = $invoice['amount_literal'];
            $type_transport = $invoice['type_transport'];
            $user_session = $invoice['user_session'];
            $qr = $invoice['qr'];


        }
    }
}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,180), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Instituto Superior Tecnológico de Turismo y Patrimonio "Yavirac"');
$pdf->setTitle('Imprimir Factura');
$pdf->setSubject('');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(left:5, top:5, right:5);

// set auto page breaks
$pdf->setAutoPageBreak(false, margin:5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// set font
$pdf->setFont('Helvetica', '', 7);

// add a page
$pdf->AddPage();

$html = '

<div style="">
    <p style="text-align: center">
        <b>'.$name_parking.'</b> <br>
        '.$entity_activity.'  <br>
        '.$address.'  <br>
        <b>ZONA:</b> '.$zone.'   <br>
        <b>TELEFONO:</b> '.$phone.'  <br>
        '.$city.' - '.$country.' <br>
        --------------------------------------------------------------------------------
        <b>FACTURA Nro.</b>'.$no_invoice.' <br>
        --------------------------------------------------------------------------------
        <div style="text-align: left">
            <b>INFORMACIÓN</b><br>
            <b>Señor/Srta:</b> '.$id_customer_invoice.' '.$name.' '.$lastname.' <br>
            <b>Cédula:</b> '.$identification.' <br>
            <b>Fecha de emisión:</b> '.$date_invoice.'<br>
            --------------------------------------------------------------------------------<br>
            <b>De:</b> '.$date_issue.'<b> Hora:</b> '.$time_issue.'<br>
            <b>A:</b> '.$date_out.'<b>  Hora:</b> '.$time_out.'<br>
            <b>Tiempo:</b><b>'.$time_used.'<br><br>

            <table border="1" cellpadding="3">
                <tr>
                    <td style="text-align:center" width="125px"><b>Detalle</b></td>
                    <td style="text-align:center" width="55px"><b>Precio</b></td>
                    <td style="text-align:center" width="55px"><b>Total</b></td>
                </tr>
                <tr>
                    <td>'.$detail.'</td>
                    <td style="text-align:center">$ '.$price.' </td>
                    <td style="text-align:center">$ '.$total.' </td>
                </tr>
            </table>
            <p style="text-align:right">
                <b>Monto Total:</b> '.$amount_total.'
            </p>
            <p><b>Son:</b> '.$amount_literal.' </p>

            --------------------------------------------------------------------------------<br>
            <b>USUARIO:</b> '.$user_session.' <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <p style="text-align:center"><b>GRACIAS POR SU PREFERENCIA</b></p>
        </div>
    </p>
</div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$style = array(
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$pdf->write2DBarcode( $qr, 'QRCODE,M', 8, 103, 80, 80, $style, 'N');



//Close and output PDF document
$pdf->Output("GENERAR FACTURA'.$identification.'.pdf", 'I');

//============================================================+
// END OF FILE
//============================================================+
