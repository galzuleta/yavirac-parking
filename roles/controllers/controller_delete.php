<?php

include('../../app/config.php');

$id_role = $_GET['id_role'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d h:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE roles SET enable_role=:enable_role, eliminated_role=:eliminated_role WHERE id_role=:id_role ");

$sentence->bindParam('enable_role', $enable_inactive);
$sentence->bindParam('eliminated_role', $eliminated_time);
$sentence->bindParam('id_role', $id_role);


if($sentence->execute()){
    echo "Registro Inactivo";
    ?>
    <script>location.href = "../role.php"</script>
    <?php
}else{
    echo "No se pudo Inactivar el Registro";
}
?>