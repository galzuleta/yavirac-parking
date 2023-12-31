<?php

include('../../app/config.php');
include('../../layout/admin/head.php');

$name = $_GET['name'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];

$sentence = $pdo->prepare("INSERT INTO users 
                        (name, lastname, email, password_user) 
                        VALUES (:name, :lastname, :email, :password_user)");

$sentence->bindParam('name', $name);
$sentence->bindParam('lastname', $lastname);
$sentence->bindParam('email', $email);
$sentence->bindParam('password_user', $password_user);

if($sentence->execute()){
    //echo "Registro guardado";
    ?>
    <script>location.href = "../user.php"</script>
    <?php
    session_start();
    $_SESSION['msm'] = "¡Felicidades! Tu registro se ha completado con éxito.";
}else{
    session_start();
    $_SESSION['error'] = "Lo sentimos, ha habido un error al intentar guardar tu registro.";
}
?>