<?php

include('../../app/config.php');

$id_ticket = $_GET['id'];
$cubicle = $_GET['cubicle'];

$enable_inactive = "0";
$ticket_status_void = "ANULADO";

date_default_timezone_set("America/Guayaquil");
$date_time = date("Y-m-d h:i:s");

$sentence = $pdo->prepare("UPDATE tickets SET 
enable_ticket=:enable_ticket, 
ticket_status=:ticket_status,
eliminated_ticket=:eliminated_ticket 
WHERE id_ticket=:id_ticket ");

$sentence->bindParam('enable_ticket', $enable_inactive);
$sentence->bindParam('ticket_status', $ticket_status_void);
$sentence->bindParam('eliminated_ticket', $date_time);
$sentence->bindParam('id_ticket', $id_ticket);


if($sentence->execute()){

    //actualizando el estado del cubiculo
    $enabla_space = "LIBRE";

    $sentence2 = $pdo->prepare("UPDATE mappings SET 
    enable_space=:enable_space, 
    updated_mapping=:updated_mapping 
    WHERE no_space=:no_space ");

    $sentence2->bindParam('enable_space', $enabla_space);
    $sentence2->bindParam('updated_mapping', $date_time);
    $sentence2->bindParam('no_space', $cubicle);

    if($sentence2->execute()){
        echo "Se actualizo el estado a Libre";
        ?>
            <script>location.href = "../../dashboard.php"</script>
        <?php
    }else{
        echo "Error al Anular";
    }

}else{
    echo "No se pudo Inactivar el Registro";
}
?>