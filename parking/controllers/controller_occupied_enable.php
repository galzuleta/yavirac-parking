<?php

include('../../app/config.php');

$cubicle = $_GET['cubicle'];
$enable_space = "OCUPADO";


date_default_timezone_set("America/Guayaquil");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE mappings SET enable_space=:enable_space, updated_mapping=:updated_mapping WHERE id_map=:id_map ");

$sentence->bindParam('enable_space', $enable_space);
$sentence->bindParam('updated_mapping', $update_time);
$sentence->bindParam('id_map', $cubicle);


if($sentence->execute()){
    session_start();
    $_SESSION['msm'] = "¡Actualización exitosa!";
    
}else{
    session_start();
    $_SESSION['error'] = "Ocurrió un problema al intentar guardar los cambios";
}
?>