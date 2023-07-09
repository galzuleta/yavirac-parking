<?php
include('../../app/config.php');

$name = $_GET['name_customer'];
$lastname = $_GET['lastname_customer'];
$identification = $_GET['identification'];
$plate = $_GET['plate'];
$plate = strtoupper($plate);
$type_transport = $_GET['type_transport'];
$type_customer = $_GET['type_customer'];

$sentence = $pdo->prepare("INSERT INTO customers 
                        (name, lastname, identification, type_transport, type_customer, plate) 
                        VALUES (:name, :lastname, :identification, :type_transport, :type_customer, :plate)");

$sentence->bindParam('name', $name);
$sentence->bindParam('lastname', $lastname);
$sentence->bindParam('identification', $identification);
$sentence->bindParam('type_transport', $type_transport);
$sentence->bindParam('type_customer', $type_customer);
$sentence->bindParam('plate', $plate);


if($sentence->execute()){
    echo "Registro guardado";
    ?>

    <?php 
}else{
    echo "No se pudo guardar el registro";
}
?>
