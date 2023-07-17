<?php

include('../../app/config.php');

$name_parking = $_GET['name_parking'];
$entity_activity = $_GET['entity_activity'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$zone = $_GET['zone'];
$city = $_GET['city'];
$country = $_GET['country'];
$id_setting = $_GET['id_setting'];

date_default_timezone_set("America/GUAYAQUIL");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE settings SET
name_parking = :name_parking, entity_activity = :entity_activity, 
phone=:phone, address=:address, zone=:zone, city=:city, country=:country,
updated_setting=:updated_setting WHERE id_setting=:id_setting ");

$sentence->bindParam('name_parking', $name_parking);
$sentence->bindParam('entity_activity', $entity_activity);
$sentence->bindParam('phone', $phone);
$sentence->bindParam('address', $address);
$sentence->bindParam('zone', $zone);
$sentence->bindParam('city', $city);
$sentence->bindParam('country', $country);
$sentence->bindParam('updated_setting', $update_time);
$sentence->bindParam('id_setting', $id_setting);

if($sentence->execute()){
    echo "Registro Actualizado";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo Actualizar el Registro";
}
?>