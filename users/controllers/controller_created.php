<?php

include('../../app/config.php');

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
    echo "Registro guardado";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo guardar el registro";
}
?>