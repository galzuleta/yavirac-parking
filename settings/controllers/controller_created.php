<?php
include('../../app/config.php');

$name_parking = $_GET['name_parking'];
$entity_activity = $_GET['entity_activity'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$zone = $_GET['zone'];
$city = $_GET['city'];
$country = $_GET['country'];

$sentence = $pdo->prepare('INSERT INTO settings
(name_parking, entity_activity, phone, address, zone, city, country)
VALUES ( :name_parking, :entity_activity, :phone, :address, :zone, :city, :country)');

$sentence->bindParam(':name_parking',$name_parking);
$sentence->bindParam(':entity_activity',$entity_activity);
$sentence->bindParam(':phone',$phone);
$sentence->bindParam(':address',$address);
$sentence->bindParam(':zone',$zone);
$sentence->bindParam(':city',$city);
$sentence->bindParam(':country',$country);

if($sentence->execute()){
    echo "Registro guardado";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo guardar el registro";
}
?>