<?php

include('../../app/config.php');

$id_customer = $_GET['id_customer'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d h:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE customers SET enable_customer=:enable_customer, eliminated_customer=:eliminated_customer WHERE id_customer=:id_customer ");

$sentence->bindParam('enable_customer', $enable_inactive);
$sentence->bindParam('eliminated_customer', $eliminated_time);
$sentence->bindParam('id_customer', $id_customer);


if($sentence->execute()){
    echo "Registro Inactivo";
    ?>
    <script>location.href = "../customer.php"</script>
    <?php
}else{
    echo "No se pudo Inactivar el Registro";
}
?>