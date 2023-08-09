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
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Instituto Superior Tecnológico de Turismo y Patrimonio "Yavirac"');
$pdf->setTitle('Reporte de Clientes');
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
<p style="text-align: center" ><b>Listado de Clientes</b></p>
<table cellpadding="4" margin-top="20px" overflow"hidden"  border="1px" >
    <tr>
        <td style="background-color: #FF8C00;text-align: center " width="70px" >Nro</td>
        <td style="background-color: #c0c0c0;text-align: center">Cédula</td>
        <td style="background-color: #c0c0c0;text-align: center">Nombres</td>
        <td style="background-color: #c0c0c0;text-align: center">Apellidos</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px" >Tipo Transporte</td>
        <td style="background-color: #c0c0c0;text-align: center">Placa Vehículo</td>
        <td style="background-color: #c0c0c0;text-align: center" width="110px" >Tipo Cliente</td>
    </tr>
    ';
    $counter = 0;
    $query_customer = $pdo->prepare("SELECT * FROM customers WHERE enable_customer = '1'  ORDER BY id_customer DESC");
    $query_customer->execute();
    $customers = $query_customer->fetchAll(PDO::FETCH_ASSOC);
    foreach($customers as $customer){
      $id_customer = $customer['id_customer'];
      $identification = $customer['identification'];
      $name = $customer['name'];
      $lastname = $customer['lastname'];
      $type_transport = $customer['type_transport'];
      $plate = $customer['plate'];
      $type_customer = $customer['type_customer'];
      $counter = $counter + 1;

            $html .='
            <tr >
            <td style="text-align: center" height="30px">'.$counter.'</td>
            <td>'.$identification.'</td>
            <td>'.$name.'</td>
            <td>'.$lastname.'</td>
            <td >'.$type_transport.'</td>
            <td>'.$plate.'</td>
            <td>'.$type_customer.'</td>
            </tr>
            ';
        }

    $html.='
</table>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');




//Close and output PDF document
$pdf->Output('REPORTE DE CLIENTES.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
