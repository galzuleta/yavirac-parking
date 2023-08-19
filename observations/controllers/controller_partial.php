<?php
include('../../app/config.php');

if(isset($_POST['submitSave'])) {
    $observation = $_POST['observation'];
    $id = $_POST['id_ticket'];

    date_default_timezone_set("America/Guayaquil");
    $update_time = date("Y-m-d H:i:s");

    $sentence = $pdo->prepare("UPDATE tickets SET observation = :observation, updated_ticket = :updated_ticket WHERE id_ticket = :id_ticket");

    $sentence->bindParam(':observation', $observation);
    $sentence->bindParam(':updated_ticket', $update_time);
    $sentence->bindParam(':id_ticket', $id);

    if($sentence->execute()) {
        session_start();
        $_SESSION['msm'] = "¡Actualización exitosa!";
        ?>
        <script>location.href = "../../observations/observation.php"</script>
        <?php
    } else {
        session_start();
        $_SESSION['error'] = "Ocurrió un problema al intentar guardar los cambios";
    }
}
?>
