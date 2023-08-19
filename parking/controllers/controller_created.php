<?php
include('../../app/config.php');

$no_space = $_GET['no_space'];
$enable_space = $_GET['enable_space'];
$observation = $_GET['observation'];

$sentence = $pdo->prepare("INSERT INTO mappings 
(no_space, enable_space, observation) 
VALUES (:no_space, :enable_space, :observation)");

$sentence->bindParam('no_space', $no_space);
$sentence->bindParam('enable_space', $enable_space);
$sentence->bindParam('observation', $observation);


if($sentence->execute()){
    echo "Registro guardado con éxito";
    ?>
    <script>location.href = "../parking.php"</script>
    <?php
    session_start();
    $_SESSION['msm'] = "¡Felicidades! Tu registro se ha completado con éxito.";
}else{
    session_start();
    $_SESSION['error'] = "Lo sentimos, ha habido un error al intentar guardar tu registro.";
}

?>

