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
$pdf->setTitle('Reporte de Espacios en el Parqueadero');
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
<p style="text-align: center" ><b>Listado de Espacios en el Parqueadero</b></p>
<table cellpadding="4" margin-top="20px" overflow"hidden"  border="1px" >
    <tr>
        <td style="background-color: #FF8C00;text-align: center " width="80px" >Nro Espacio</td>
        <td style="background-color: #c0c0c0;text-align: center">Estado de Inicio</td>
        <td style="background-color: #c0c0c0;text-align: center">Observaciones</td>
    </tr>
    ';
        $counter = 0;
        $query_mapping = $pdo->prepare("SELECT * FROM mappings WHERE enable_mapping = '1' ORDER BY id_map DESC");
        $query_mapping->execute();
        $mappings = $query_mapping->fetchAll(PDO::FETCH_ASSOC);
        foreach($mappings as $mapping){
          $id_map = $mapping['id_map'];
          $no_space = $mapping['no_space'];
          $enable_space = $mapping['enable_space'];
          $observation = $mapping['observation'];
          $counter = $counter + 1;

            $html .='
            <tr >
            <td style="text-align: center" height="30px">'.$counter.'</td>
            <td>'.$enable_space.'</td>
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
$pdf->Output('REPORTE DE ESPACIOS EN EL PARQUEADERO.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
