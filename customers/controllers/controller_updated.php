<?php
include('../../app/config.php');

$identification = $_GET['identification'];
$name = $_GET['name'];
$lastname = $_GET['lastname'];
$type_transport = $_GET['type_transport'];
$plate = $_GET['plate'];
$type_customer = $_GET['type_customer'];
$id_customer = $_GET['id_customer'];

date_default_timezone_set("America/GUAYAQUIL");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE customers SET
identification=:identification, name=:name, lastname=:lastname, type_transport=:type_transport, 
plate=:plate, type_customer=:type_customer, updated_customer=:updated_customer WHERE id_customer=:id_customer");

$sentence->bindParam(':identification', $identification);
$sentence->bindParam(':name', $name);
$sentence->bindParam(':lastname', $lastname);
$sentence->bindParam(':type_transport', $type_transport);
$sentence->bindParam(':plate', $plate);
$sentence->bindParam(':type_customer', $type_customer);
$sentence->bindParam(':updated_customer', $update_time);
$sentence->bindParam(':id_customer', $id_customer);

if ($sentence->execute()) {
    echo "Registro Actualizado";
    ?>
    <script>location.href = "../customer.php"</script>
    <?php
} else {
    echo "No se pudo Actualizar el Registro";
}
?>
