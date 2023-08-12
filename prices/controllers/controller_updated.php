<?php

include('../../app/config.php');

$amount = $_GET['amount'];
$detail = $_GET['detail'];
$price = $_GET['price'];
$type_transport = $_GET['type_transport'];
$id_price = $_GET['id_price'];

date_default_timezone_set("America/GUAYAQUIL");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE prices SET
amount = :amount, detail = :detail, price = :price, type_transport = :type_transport,
updated_price=:updated_price WHERE id_price=:id_price ");

$sentence->bindParam('amount', $amount);
$sentence->bindParam('detail', $detail);
$sentence->bindParam('price', $price);
$sentence->bindParam('type_transport', $type_transport);
$sentence->bindParam('updated_price', $update_time);
$sentence->bindParam('id_price', $id_price);

if($sentence->execute()){
    echo "Registro Actualizado";
    ?>
    <script>location.href = "../price.php"</script>
    <?php
}else{
    echo "No se pudo Actualizar el Registro";
}
?>