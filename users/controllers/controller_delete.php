<?php

include('../../app/config.php');

$id_user = $_GET['id_user'];

date_default_timezone_set("America/Guayaquil");
$eliminated_time = date("Y-m-d H:i:s");

$enable_inactive = "0";

$sentence = $pdo->prepare("UPDATE users SET enable_user=:enable_user, eliminated_user=:eliminated_user WHERE id=:id ");

$sentence->bindParam('enable_user', $enable_inactive);
$sentence->bindParam('eliminated_user', $eliminated_time);
$sentence->bindParam('id', $id_user);


if($sentence->execute()){
    echo "Registro Inactivo";
    ?>
    <script>location.href = "../user.php"</script>
    <?php
    session_start();
    $_SESSION['msm'] = "Se elimino exitosamente";
}else{
    session_start();
    $_SESSION['error'] = "Lamentablemente, no ha sido posible eliminar el registro en este momento. ";
}
?>