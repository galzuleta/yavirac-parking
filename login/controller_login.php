<?php
include('../app/config.php');

session_start();

$usuario_user = $_POST['usuario'];
$password_user = $_POST['password_user'];

//echo $usuario," - ", $password_user;
$email_table = ''; $password_table = '';

$query_login = $pdo->prepare("SELECT * FROM users WHERE email = '$usuario_user' AND password_user = '$password_user' AND enable_user = 1");
$query_login->execute();
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios as $usuario){
    $email_table = $usuario['email'];
    $password_table = $usuario['password_user'];
}

if(($usuario_user == $email_table) && ($password_user == $password_table)){
    ?>
    <div class="alert alert-success" role="alert">
        Usuario Correcto :)
    </div>
    <script>location.href = "dashboard.php"; </script>
    <?php
    $_SESSION['usuario_sesion'] = $email_table;
}else{
    ?>
    <div class="alert alert-danger" role="alert">
        Usuario Incorrecto, vuelva a intentar :(
    </div>
    <script>$('#password').val(""); $('#password').focus(); </script>
    <?php
}
?>



