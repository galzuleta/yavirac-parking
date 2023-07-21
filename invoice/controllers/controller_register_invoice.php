<?php
include('../../app/config.php');

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

//calcula el tiempo de horas parqueo
$c_hour_issue = strtotime($time_issue);
$c_hour_out = strtotime($time_out);
$diferent_hour = ($c_hour_out - $c_hour_issue) / 3600;
$hour_calculator = ((int) $diferent_hour);
$diferent_minutes = ($c_hour_out - $c_hour_issue) / 60;
$calculator = $hour_calculator * 60;
$minute_calculator = ((int) $diferent_minutes - $calculator);
$time_used = $hour_calculator . " horas con " . $minute_calculator . " minutos";

//calcula los dias en el parquep
$data = new DateTime($date_issue);
$data2 = new DateTime($date_out);
$date_calculator = $data->diff($data2);
$date_calculator->days . ' días ';
$days_difference = $date_calculator->days;

$cubicle = isset($_GET['cubicle']) ? $_GET['cubicle'] : null;

$detail = "Servicio de parqueo de " . $time_used;


echo $type_transport = $_GET['type_transport'];

// Consulta en la tabla customers para type_transport
$query_customer = $pdo->prepare("SELECT * FROM customers WHERE type_transport = :type_transport AND enable_customer = '1'");
$query_customer->bindParam(':type_transport', $type_transport, PDO::PARAM_STR);
$query_customer->execute();
$customers = $query_customer->fetchAll(PDO::FETCH_ASSOC);

foreach ($customers as $customer) {
    $id_customer = $customer['id_customer'];
}


// Consulta en la tabla prices
$query_price = $pdo->prepare("SELECT * FROM prices WHERE amount = :hour_calculator AND detail = 'HORAS' AND enable_price = '1'");
$query_price->bindParam(':hour_calculator', $hour_calculator, PDO::PARAM_INT); 
$query_price->execute();
$prices = $query_price->fetchAll(PDO::FETCH_ASSOC);

$price_hour = null;
foreach ($prices as $price) {
    $price_hour = $price['price'];
}

//calcula el precio en dias
$query_price_day = $pdo->prepare("SELECT * FROM prices WHERE amount = '$days_difference' AND detail = 'DIAS' AND enable_price = '1' ");
$query_price_day->execute();
$prices_days = $query_price_day->fetchAll(PDO::FETCH_ASSOC);
$price_day = null;
foreach ($prices_days as $price_day) {
    $price_day = $price_day['price'];
}

$price = 0;
if ($price_hour !== null && $price_day === null) {
    $price = $price_hour; // Si hay precio para horas pero no para días
} elseif ($price_hour === null && $price_day !== null) {
    $price = $price_day; // Si hay precio para días pero no para horas
}else {
    $price = 0;
}

echo $price; // Muestra el precio calculado



/*

$total = $_GET['total'];
$amount_total = $_GET['amount_total'];
$amount_literal = $_GET['amount_literal'];

$user_session = $_GET['user_session'];

$qr = $_GET['qr'];


$sentence = $pdo->prepare("INSERT INTO invoices 
(id_setting, no_invoice, id_customer, date_invoice, date_issue, time_issue, date_out, time_out, time_used, cubicle, detail, price, total, amount_total, amount_literal, user_session, qr) 
VALUES (:id_setting, :no_invoice, :id_customer, :date_invoice, :date_issue, :time_issue, :date_out, :time_out, :time_used, :cubicle, :detail, :price, :total, :amount_total, :amount_literal, :user_session, :qr)");

    $sentence->bindParam(':id_setting', $id_setting);
    $sentence->bindParam(':no_invoice', $no_invoice);
    $sentence->bindParam(':id_customer', $id_customer);
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


    /*if ($sentence->execute()) {
        echo 'success';
    } else {
        echo 'Error al registrar en la base de datos';
    }*/
    
                                                            
?>