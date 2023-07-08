<?php

include('../../app/config.php');

$name = $_GET['name'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];

date_default_timezone_set("America/Guayaquil");
$update_time = date("Y-m-d H:i:s");

$sentence = $pdo->prepare("UPDATE users SET
name = :name, lastname = :lastname, email = :email, 
password_user=:password_user, updated_user=:updated_user WHERE id=:id ");

$sentence->bindParam('name', $name);
$sentence->bindParam('lastname', $lastname);
$sentence->bindParam('email', $email);
$sentence->bindParam('password_user', $password_user);
$sentence->bindParam('updated_user', $update_time);
$sentence->bindParam('id', $id_user);


if($sentence->execute()){
    echo "Registro Actualizado";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo Actualizar el Registro";
}
?>