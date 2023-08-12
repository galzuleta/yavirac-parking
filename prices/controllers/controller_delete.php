<?php

include('../../app/config.php');

$id_price = $_GET['id_price'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d h:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE prices SET enable_price=:enable_price, eliminated_price=:eliminated_price 
WHERE id_price=:id_price ");

$sentence->bindParam('enable_price', $enable_inactive);
$sentence->bindParam('eliminated_price', $eliminated_time);
$sentence->bindParam('id_price', $id_price);


if($sentence->execute()){
    ?>
    <script>location.href = "../price.php"</script>
    <?php
}else{
    echo "No se pudo Inactivar el Registro";
}
?>