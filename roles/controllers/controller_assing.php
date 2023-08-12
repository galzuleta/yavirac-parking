<?php

include('../../app/config.php');

$role = $_POST['role'];
$id_user = $_POST['id_user'];

date_default_timezone_set("America/Guayaquil");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE users SET
role = :role,  updated_user=:updated_user WHERE id=:id ");

$sentence->bindParam('role', $role);
$sentence->bindParam('updated_user', $update_time);
$sentence->bindParam('id', $id_user);


if($sentence->execute()){
    echo "Se Asigno el Rol Correctamente";
    ?>
    <script>location.href = "../../users/user.php"</script>
    <?php
}else{
    echo "Error al Asignar el Rol al Usuario";
}
?>

