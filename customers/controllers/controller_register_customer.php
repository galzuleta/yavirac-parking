<?php
include('../../app/config.php');

$name = $_GET['name_customer'];
$lastname = $_GET['lastname_customer'];
$identification = $_GET['identification'];
$plate = $_GET['plate'];
$plate = strtoupper($plate);
$type_transport = $_GET['type_transport'];
$type_customer = $_GET['type_customer'];

//buscar si existen clientes repetidos
$counter_customer = 0;
$query_customer = $pdo->prepare("SELECT * FROM customers WHERE plate = '$plate' AND enable_customer = '1' ");
$query_customer->execute();
$data_customers = $query_cuestomer ->fetchAll(PDO::FETCH_ASSOC);
foreach($data_customers as $data_customer ){
    $counter_customer = $counter_customer + 1;
}
if($counter_customer == "0"){
    echo "no existe ningun registro igual";
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
}
else{
    echo "este cliente ya esta registrado";
}



?>
