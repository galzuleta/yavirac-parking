<?php

include('../../app/config.php');

$id_setting = $_GET['id_setting'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d H:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE settings SET enable_setting=:enable_setting, eliminated_setting=:eliminated_setting WHERE id_setting=:id_setting ");

$sentence->bindParam('enable_setting', $enable_inactive);
$sentence->bindParam('eliminated_setting', $eliminated_time);
$sentence->bindParam('id_setting', $id_setting);


if($sentence->execute()){
    echo "Registro Inactivo";
    ?>
    <script>location.href = "../setting.php"</script>
    <?php
}else{
    echo "No se pudo Inactivar el Registro";
}
?>