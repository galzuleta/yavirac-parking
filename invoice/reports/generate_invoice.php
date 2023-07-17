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

//cargar la informacion del ticket
$query_ticket = $pdo->prepare("SELECT * FROM tickets WHERE enable_ticket = '1' ");
$query_ticket->execute();
$tickets = $query_ticket->fetchAll(PDO::FETCH_ASSOC);
foreach($tickets as $ticket){
    $id_ticket = $ticket['id_ticket'];
    $plate = $ticket['plate'];
    $name_customer = $ticket['name_customer'];
    $lastname_customer = $ticket['lastname_customer'];
    $identification = $ticket['identification'];
    $cubicle = $ticket['cubicle'];
    $entry_date = $ticket['entry_date'];
    $entry_time = $ticket['entry_time'];
    $out_date = $ticket['out_date'];
    $user_session = $ticket['user_session'];
}


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(79,160), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Instituto Yavirac');
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
        <b>FACTURA Nro. 00000</b> <br>
        --------------------------------------------------------------------------------
        <div style="text-align: left">
            <b>INFORMACIÓN</b><br>
            <b>Señor/Srta:</b> '.$name_customer.' '.$lastname_customer.' <br>
            <b>Cédula:</b> '.$identification.' <br>
            <b>Fecha de emisión:</b>  <br>
            --------------------------------------------------------------------------------<br>
            <b>De:</b>  <b> Hora:</b>  <br>
            <b>A:</b>  <b>  Hora:</b>  <br>
            <b>Tiempo:</b>  <b>   <br><br>

            <table border="1" cellpadding="2">
                <tr>
                    <td style="text-align:center"><b>Detalle</b></td>
                    <td style="text-align:center"><b>Precio</b></td>
                    <td style="text-align:center"><b>Total</b></td>
                </tr>
                <tr>
                    <td>Servicio de parqueo</td>
                    <td style="text-align:center"> </td>
                    <td style="text-align:center"> </td>
                </tr>
            </table>
            <p style="text-align:right">
                <b>Monto Total:</b>
            </p>
            <p><b>Son:</b> </p>

            --------------------------------------------------------------------------------<br>
            <b>USUARIO:</b> '.$user_session.' <br>
            <p style="text-align:center"><b>GRACIAS POR SU PREFERENCIA</b></p>
        </div>
    </p>
</div>

';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
