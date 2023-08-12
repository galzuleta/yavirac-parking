<?php

include('../../app/config.php');

$id_map = $_GET['id_map'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d H:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE mappings SET enable_mapping=:enable_mapping, eliminated_mapping=:eliminated_mapping WHERE id_map=:id_map ");

$sentence->bindParam('enable_mapping', $enable_inactive);
$sentence->bindParam('eliminated_mapping', $eliminated_time);
$sentence->bindParam('id_map', $id_map);


if($sentence->execute()){
    echo "Registro Inactivo";
    ?>
    <script>location.href = "../parking.php"</script>
    <?php
}else{
    echo "No se pudo Inactivar el Registro";
}
?>