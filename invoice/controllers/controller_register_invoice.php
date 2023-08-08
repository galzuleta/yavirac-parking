<?php
include('../../app/config.php');
include('../literal/amount_literal.php');

date_default_timezone_set("America/GUAYAQUIL");
$dateHour = date("Y-m-d h:i:s");
$day = date("d");
$month = date("m");
if ($month == "1") $month = "Enero";
if ($month == "2") $month = "Febrero";
if ($month == "3") $month = "Marzo";
if ($month == "4") $month = "Abril";
if ($month == "5") $month = "Mayo";
if ($month == "6") $month = "Junio";
if ($month == "7") $month = "Julio";
if ($month == "8") $month = "Agosto";
if ($month == "9") $month = "Septiembre";
if ($month == "10") $month = "Octubre";
if ($month == "11") $month = "Noviembre";
if ($month == "12") $month = "Diciembre";
$year = date("Y");

$id_setting = isset($_GET['id_setting']) ? $_GET['id_setting'] : null;
$no_invoice = isset($_GET['no_invoice']) ? $_GET['no_invoice'] : null;
$id_customer = isset($_GET['id_customer']) ? $_GET['id_customer'] : null;

// recuperar la ciudad
$query_data = $pdo->prepare("SELECT * FROM settings WHERE id_setting = '$id_setting' AND  enable_setting = '1' ");
$query_data->execute();
$datas = $query_data->fetchAll(PDO::FETCH_ASSOC);
foreach ($datas as $data) {
    $city = $data['city'];
}
$date_invoice = $city . ", " . $day . " de " . $month . " del " . $year;

$date_issue = isset($_GET['date_issue']) ? $_GET['date_issue'] : null;
$time_issue = isset($_GET['time_issue']) ? $_GET['time_issue'] : null;
$date_out = isset($_GET['date_out']) ? $_GET['date_out'] : null;
$time_out = date('H:i');

/// Calcula diferencia entre el tiempo de entrada y salida
$date_time_issue = $date_issue." ".$time_issue;
$date_time_out = $date_out." ".$time_out;

$date_time_issue = new DateTime($date_time_issue);
$date_time_out = new DateTime($date_time_out);
$diff = $date_time_issue->diff($date_time_out);

$diff->days."dias con".$diff->h."horas";


//calcula los dias en el parquep
$data = new DateTime($date_issue);
$data2 = new DateTime($date_out);
$date_calculator = $data->diff($data2);
$date_calculator->days . ' días ';
$days_difference = $date_calculator->days;

$time_used = (" ".$days_difference." día/s");

$cubicle = $_GET['cubicle'];
$detail = "Servicio de parqueo de ". $days_difference." día/s";
$type_transport = $_GET['type_transport'];

// Consulta en la tabla customers para type_transport
$query_customer = $pdo->prepare("SELECT * FROM customers WHERE id_customer='$id_customer' AND type_transport = :type_transport AND enable_customer = '1'");
$query_customer->bindParam(':type_transport', $type_transport, PDO::PARAM_STR);
$query_customer->execute();
$customers = $query_customer->fetchAll(PDO::FETCH_ASSOC);

foreach ($customers as $customer) {
    $id_customer = $customer['id_customer'];
    $name = $customer['name'];
    $lastname = $customer['lastname'];
    $identification = $customer['identification'];
    $plate = $customer['plate'];
    $type_customer = $customer['type_customer'];
}


// Consulta en la tabla precios en horas
$query_price_hour = $pdo->prepare("SELECT * FROM prices WHERE amount = '$diff->h' AND detail = 'HORAS' AND enable_price = '1' ");
$query_price_hour->execute();
$prices = $query_price_hour->fetchAll(PDO::FETCH_ASSOC);

$price_hour = null;
foreach ($prices as $price) {
    $price_hour = $price['price'];
    break; // Detenemos el bucle después de encontrar el primer precio coincidente (igual cantidad de horas).
}

// Ahora, obtenemos el precio específico para el type_transport (si está disponible)
$query_specific_price_hour = $pdo->prepare("SELECT * FROM prices WHERE amount = :hour_calculator AND type_transport = :type_transport AND detail = 'HORAS' AND enable_price = '1'");
$query_specific_price_hour->bindParam(':hour_calculator', $hour_calculator, PDO::PARAM_INT);
$query_specific_price_hour->bindParam(':type_transport', $type_transport, PDO::PARAM_STR);
$query_specific_price_hour->execute();
$specific_price_hour = $query_specific_price_hour->fetch(PDO::FETCH_ASSOC);

if ($specific_price_hour) {
    $price_hour = $specific_price_hour['price'];
}

//calcula el precio en dias
$query_price = $pdo->prepare("SELECT * FROM prices WHERE amount <= :days_difference AND detail = 'DIAS' AND enable_price = '1' ORDER BY amount DESC");
$query_price->bindParam(':days_difference', $days_difference, PDO::PARAM_INT);
$query_price->execute();
$prices = $query_price->fetchAll(PDO::FETCH_ASSOC);

$price_day = null;
foreach ($prices as $price) {
    $price_day = $price['price'];
    break; // Detenemos el bucle después de encontrar el primer precio coincidente (mayor cantidad de días).
}

// Ahora, obtenemos el precio específico para el type_transport (si está disponible)
$query_specific_price = $pdo->prepare("SELECT * FROM prices WHERE amount = :days_difference AND type_transport = :type_transport AND detail = 'DIAS' AND enable_price = '1'");
$query_specific_price->bindParam(':days_difference', $days_difference, PDO::PARAM_INT);
$query_specific_price->bindParam(':type_transport', $type_transport, PDO::PARAM_STR);
$query_specific_price->execute();
$specific_price = $query_specific_price->fetch(PDO::FETCH_ASSOC);

if ($specific_price) {
   $price_day = $specific_price['price'];
}

$price = 0;
if ($price_hour !== null && $price_day === null) {
    $price = $price_hour; // Si hay precio para horas pero no para días
} elseif ($price_hour === null && $price_day !== null) {
    $price = $price_day; // Si hay precio para días pero no para horas
}else {
    $price = 0;
}

$price; 
$total = ($price);
$amount_total = ($total);
$amount_literal = numtoletras($amount_total);
$user_session = $_GET['user_session'];
$qr = 'Emisión de Factura por el sistema YAVI-PARKING
       El/La cliente ' .$name. " ".$lastname.' ('.$type_customer.') con C.I. ' .$identification. ' su tipo de vehículo '.$type_transport.' 
       y número de placa '.$plate.' ingreso el día ' .$date_issue. ' a las '.$time_issue.' y sale el día ' .$date_out. ' 
       Emitido por el Instituto Superior Tecnológico de Turísmo y Patrimonio "YAVIRAC" 
';


$sentence = $pdo->prepare("INSERT INTO invoices 
(id_setting, no_invoice, id_customer, type_transport, date_invoice, date_issue, time_issue, date_out, time_out, time_used, cubicle, detail, price, total, amount_total, amount_literal, user_session, qr) 
VALUES (:id_setting, :no_invoice, :id_customer, :type_transport, :date_invoice, :date_issue, :time_issue, :date_out, :time_out, :time_used, :cubicle, :detail, :price, :total, :amount_total, :amount_literal, :user_session, :qr)");

    $sentence->bindParam(':id_setting', $id_setting);
    $sentence->bindParam(':no_invoice', $no_invoice);
    $sentence->bindParam(':id_customer', $id_customer);
    $sentence->bindParam(':type_transport', $type_transport);
    $sentence->bindParam(':date_invoice', $date_invoice);
    $sentence->bindParam(':date_issue', $date_issue);
    $sentence->bindParam(':time_issue', $time_issue);
    $sentence->bindParam(':date_out', $date_out);
    $sentence->bindParam(':time_out', $time_out);
    $sentence->bindParam(':time_used', $time_used);
    $sentence->bindParam(':cubicle', $cubicle);
    $sentence->bindParam(':detail', $detail);
    $sentence->bindParam(':price', $price);
    $sentence->bindParam(':total', $total);
    $sentence->bindParam(':amount_total', $amount_total);
    $sentence->bindParam(':amount_literal', $amount_literal);
    $sentence->bindParam(':user_session', $user_session);
    $sentence->bindParam(':qr', $qr);


    if ($sentence->execute()) {
        echo 'Se genero exitosamente';

        $enable_space_mapping = "LIBRE";

        date_default_timezone_set("America/GUAYAQUIL");
        $update_time = date("Y-m-d H:i:s");

        $sentence = $pdo->prepare("UPDATE mappings SET
        enable_space=:enable_space, updated_mapping=:updated_mapping WHERE no_space=:no_space");

        $sentence->bindParam(':enable_space', $enable_space_mapping);
        $sentence->bindParam(':updated_mapping', $update_time);
        $sentence->bindParam(':no_space', $cubicle);
        $sentence->execute();


        $ticket_status_invoice = "FACTURADO";
        date_default_timezone_set("America/GUAYAQUIL");
        $update_time = date("Y-m-d H:i:s");

        $sentence_ticket = $pdo->prepare("UPDATE tickets SET
        ticket_status=:ticket_status, updated_ticket=:updated_ticket WHERE cubicle=:cubicle");

        $sentence_ticket->bindParam(':ticket_status', $ticket_status_invoice);
        $sentence_ticket->bindParam(':updated_ticket', $update_time);
        $sentence_ticket->bindParam(':cubicle', $cubicle);
        $sentence_ticket->execute();

        ?>
        <script>location.href = "invoice/reports/generate_invoice.php";</script>
        <?php
    } else {
        echo 'Error al registrar en la base de datos';
    }
                                                 
?>