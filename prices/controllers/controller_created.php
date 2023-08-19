<?php
include('../../app/config.php');

$amount = $_GET['amount'];
$detail = $_GET['detail'];
$price = $_GET['price'];
$type_transport = $_GET['type_transport'];

$sentence = $pdo->prepare("INSERT INTO prices (amount, detail, price, type_transport) 
VALUES (:amount, :detail, :price, :type_transport)");

$sentence->bindParam('amount', $amount);
$sentence->bindParam('detail', $detail);
$sentence->bindParam('price', $price);
$sentence->bindParam('type_transport', $type_transport);

if($sentence->execute()){
    echo "Registro guardado con éxito";
    ?>
    <script>location.href = "../price.php"</script>
    <?php
    session_start();
    $_SESSION['msm'] = "¡Felicidades! Tu registro se ha completado con éxito.";
}else{
    session_start();
    $_SESSION['error'] = "Lo sentimos, ha habido un error al intentar guardar tu registro.";
}
?>