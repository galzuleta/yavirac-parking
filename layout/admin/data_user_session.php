<?php

session_start();
if(isset($_SESSION['usuario_sesion'])) {
    $usuario_sesion = $_SESSION['usuario_sesion'];

    $query_usuario_sesion = $pdo->prepare("SELECT * FROM users WHERE email ='$usuario_sesion' AND enable_user = '1' ");
    $query_usuario_sesion->execute();
    $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach($usuarios_sesions as $usuarios_sesion){
        $id_user_sesion = $usuarios_sesion['id'];
        $name_sesion = $usuarios_sesion['name'];
        $lastname_sesion = $usuarios_sesion['lastname'];
        $email_sesion = $usuarios_sesion['email'];
        $role_sesion = $usuarios_sesion['role'];

    }
} else {
   //echo "para ingresar debe iniciar sesion";
}

?>


