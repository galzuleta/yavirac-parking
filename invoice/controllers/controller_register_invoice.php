<?php 

include('../../app/config.php');

date_default_timezone_set("America/GUAYAQUIL");
$dateHour = date("Y-m-d h:i:s");
$day = date("d");
$month = date("m");
if($month == "1") $month = "Enero";
if($month == "2") $month = "Febrero";
if($month == "3") $month = "Marzo";
if($month == "4") $month = "Abril";
if($month == "5") $month = "Mayo";
if($month == "6") $month = "Junio";
if($month == "7") $month = "Julio";
if($month == "8") $month = "Agosto";
if($month == "9") $month = "Septiembre";
if($month == "10") $month = "Octubre";
if($month == "11") $month = "Noviembre";
if($month == "12") $month = "Diciembre";
$year = date("Y");


$id_setting = $_GET['id_setting'];
$no_invoice = $_GET['no_invoice'];
$id_customer = $_GET['id_customer'];

// recuperar la ciudad 
$query_data = $pdo->prepare("SELECT * FROM settings WHERE id_setting = '$id_setting' AND  enable_setting = '1' ");
$query_data->execute();
$datas = $query_data->fetchAll(PDO::FETCH_ASSOC);
foreach($datas as $data){
    $city = $data['city'];                                                              
}
$date_invoice = $city.", ".$day." de ".$month." del ".$year;

$date_issue = $_GET['date_issue'];
$time_issue = $_GET['time_issue'];
$date_out = $_GET['date_out'];
$time_out = date('H:i');
//calcula el tiempo de parqueo
$c_hour_issue = strtotime($time_issue);
$c_hour_out = strtotime($time_out);
$diferent_hour = ($c_hour_out - $c_hour_issue)/3600;
$hour_calculator = ((int)$diferent_hour);
$diferent_minutes = ($c_hour_out - $c_hour_issue)/60;
$calculator = $hour_calculator * 60;
$minute_calculator =((int) $diferent_minutes - $calculator);
$time_used = $hour_calculator." horas con ".$minute_calculator." minutos";

$cubicle = $_GET['cubicle'];

$detail = "Servicio de parqueo de ".$time_used;
$price = $_GET['price'];
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