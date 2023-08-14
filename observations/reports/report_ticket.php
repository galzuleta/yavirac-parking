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
    $address = $setting['address'];
    $phone = $setting['phone'];
    $city = $setting['city'];
    $country = $setting['country'];
}

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Instituto Superior Tecnológico de Turismo y Patrimonio "Yavirac"');
$pdf->setTitle('Reporte de Tickets');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_TITLE = $name_parking;
$PDF_HEADER_STRING = $address.' Telf: '.$phone;
$PDF_HEADER_LOGO_WIDTH = 15;
$PDF_HEADER_LOGO = 'logo.jpg';
// set default header data
$pdf->setHeaderData($PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

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
$pdf->setFont('Helvetica', '', 11);

// add a page
$pdf->AddPage();

// create some HTML content
$html = '
<p style="text-align: center" ><b>Listado de Observaciones</b></p>
<table cellpadding="4" margin-top="20px" overflow"hidden"  border="1px" >
    <tr>
        <td style="background-color: #FF8C00;text-align: center " width="50px" >Nro</td>
        <td style="background-color: #c0c0c0;text-align: center">Cédula</td>
        <td style="background-color: #c0c0c0;text-align: center" >Nombres y Apellidos</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px" >Trasporte</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px">Cliente</td>
        <td style="background-color: #c0c0c0;text-align: center">Placa</td>
        <td style="background-color: #c0c0c0;text-align: center">Cubículo</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px">Fecha ingreso</td>
        <td style="background-color: #c0c0c0;text-align: center">Fecha salida</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px">Observaciones</td>
    </tr>
    ';
    $counter = 0;
    $query_ticket = $pdo->prepare("SELECT * FROM tickets WHERE enable_ticket = '1'");
    $query_ticket->execute();
    $tickets = $query_ticket->fetchAll(PDO::FETCH_ASSOC);
        foreach($tickets as $ticket){
            $id_ticket = $ticket['id_ticket'];
            $identification = $ticket['identification'];
            $name_customer = $ticket['name_customer'];
            $lastname_customer = $ticket['lastname_customer'];
            $type_transport = $ticket['type_transport'];
            $type_customer = $ticket['type_customer'];
            $plate = $ticket['plate'];
            $cubicle = $ticket['cubicle'];
            $entry_date = $ticket['entry_date'];
            $out_date = $ticket['out_date'];
            $observation = $ticket['observation'];
            $counter = $counter + 1;

            $html .='
            <tr >
            <td style="text-align: center" height="30px">'.$counter.'</td>
            <td style="text-align: center">'.$identification.'</td>
            <td>'.$name_customer." ".$lastname_customer.'</td>
            <td style="text-align: center">'.$type_transport.'</td>
            <td style="text-align: center">'.$type_customer.'</td>
            <td style="text-align: center">'.$plate.'</td>
            <td style="text-align: center">'.$cubicle.'</td>
            <td style="text-align: center">'.$entry_date.'</td>
            <td style="text-align: center; ">'.$out_date.'</td>
            <td>'.$observation.'</td>
            </tr>
            ';
        }

    $html.='
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




//Close and output PDF document
$pdf->Output('REPORTE DE TICKETS.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
