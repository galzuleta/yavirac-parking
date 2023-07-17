<?php
include('../../app/config.php');

$name = $_GET['name'];

$sentence = $pdo->prepare("INSERT INTO roles (name) VALUES (:name)");

$sentence->bindParam('name', $name);

if($sentence->execute()){
    echo "Registro guardado con éxito";
    ?>
    <script>location.href = "../index.php"</script>
    <?php
}else{
    echo "No se pudo guardar el registro";
}
?>