<?php
include('../../app/config.php');

$name = $_GET['name'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];
$password_user = $_GET['password_user'];
$id_user = $_GET['id_user'];

date_default_timezone_set("America/GUAYAQUIL");
$update_time = date("Y-m-d H:i:s");

// Verificar si el nuevo correo electrónico ya está registrado en la base de datos
$emailCheckQuery = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email AND id != :id");
$emailCheckQuery->bindParam(':email', $email);
$emailCheckQuery->bindParam(':id', $id_user);
$emailCheckQuery->execute();
$emailCount = $emailCheckQuery->fetchColumn();

if ($emailCount > 0) {
    ?>
    <script>
        alert("El correo electrónico ya está registrado. Por favor, elige otro.");
        var emailInput = document.getElementById("email"); // Utilizar ID en lugar de "name"
        emailInput.style.borderColor = "red"; // Marcar de rojo
        emailInput.focus(); // Enfocar el campo de entrada
    </script>
    
    <?php
} else {
    $sentence = $pdo->prepare("UPDATE users SET
    name = :name, lastname = :lastname, email = :email, 
    password_user = :password_user, updated_user = :updated_user WHERE id = :id ");

    $sentence->bindParam(':name', $name);
    $sentence->bindParam(':lastname', $lastname);
    $sentence->bindParam(':email', $email);
    $sentence->bindParam(':password_user', $password_user);
    $sentence->bindParam(':updated_user', $update_time);
    $sentence->bindParam(':id', $id_user);

    if ($sentence->execute()) {
        echo "Registro Actualizado";
        ?>
        <script>location.href = "../user.php"</script>
        <?php
        session_start();
        $_SESSION['msm'] = "¡Actualización exitosa!";
    } else {
        session_start();
        $_SESSION['error'] = "Ocurrió un problema al intentar guardar los cambios";
    }
}
?>
