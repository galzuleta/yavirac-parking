<?php

session_start();
if(isset($_SESSION['usuario_sesion'])) {
    $usuario_sesion = $_SESSION['usuario_sesion'];

    $query_usuario_sesion = $pdo->prepare("SELECT * FROM users WHERE email = :usuario_sesion AND enable_user = '1' ");
    $query_usuario_sesion->bindParam(':usuario_sesion', $usuario_sesion);
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
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage !== 'index.php') {
        echo "Para acceder a esta plataforma debes iniciar sesión";
        // Puedes redirigir al usuario a la página de inicio de sesión
        header('Location: '.$URL.'/login');
    }
}

?>



