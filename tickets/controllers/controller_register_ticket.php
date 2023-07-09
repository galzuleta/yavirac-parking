<?php

include('../../app/config.php');

$plate = $_GET['plate'];
$plate = strtoupper($plate);
$name_customer = $_GET['name_customer'];
$lastname_customer = $_GET['lastname_customer'];
$identification = $_GET['identification'];
$type_transport = $_GET['type_transport'];
$type_customer = $_GET['type_customer'];
$cubicle = $_GET['cubicle'];
$entry_date = $_GET['entry_date'];
$entry_time = $_GET['entry_time'];
$user_session = $_GET['user_session'];


$sentence = $pdo->prepare("INSERT INTO tickets 
                        (plate, name_customer, lastname_customer, identification, type_transport, type_customer, cubicle, entry_date, entry_time, user_session) 
                        VALUES (:plate,:name_customer, :lastname_customer, :identification, :type_transport, :type_customer, :cubicle, :entry_date, :entry_time, :user_session)");

$sentence->bindParam('plate', $plate);
$sentence->bindParam('name_customer', $name_customer);
$sentence->bindParam('lastname_customer', $lastname_customer);
$sentence->bindParam('identification', $identification);
$sentence->bindParam('type_transport', $type_transport);
$sentence->bindParam('type_customer', $type_customer);
$sentence->bindParam('cubicle', $cubicle);
$sentence->bindParam('entry_date', $entry_date);
$sentence->bindParam('entry_time', $entry_time);
$sentence->bindParam('user_session', $user_session);


if($sentence->execute()){
    echo "Registro guardado";
    ?>
    <script>
        location.href = " tickets/reports/generate_ticket.php";
    </script>
    <?php 
}else{
    echo "No se pudo guardar el registro";
}
?>

