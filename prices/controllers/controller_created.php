<?php
include('../../app/config.php');

$amount = $_GET['amount'];
$detail = $_GET['detail'];
$price = $_GET['price'];

$sentence = $pdo->prepare("INSERT INTO prices (amount, detail, price) VALUES (:amount, :detail, :price)");

$sentence->bindParam('amount', $amount);
$sentence->bindParam('detail', $detail);
$sentence->bindParam('price', $price);


if($sentence->execute()){
    echo "Registro guardado con éxito";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo guardar el registro";
}
?>