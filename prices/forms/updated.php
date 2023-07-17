<?php
include('../../app/config.php');
include('../../layout/admin/data_user_session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include('../../layout/admin/navbar.php'); ?>

  <div class="content-wrapper">
    <br>
    <div class="container">
        <?php
        $id_get = $_GET['id'];
        $query_user = $pdo->prepare("SELECT * FROM users WHERE id ='$id_get' AND enable_user = 1");
        $query_user->execute();
        $usuarios = $query_user->fetchAll(PDO::FETCH_ASSOC);
        foreach($usuarios as $usuario){
            $id = $usuario['id'];
            $name = $usuario['name'];
            $lastname = $usuario['lastname'];
            $email = $usuario['email'];
            $password_user = $usuario['password_user'];
            $enable_user = $usuario['enable_user'];
        }
        ?>
      <center>
        <div class="row">
          <div class="col-md-2">
            <a href="../../users/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
              </svg>Regresar</a>
          </div>
          <div class="col-md-10">
          <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
              <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg> Actualización de Tarifas
            </h3>
          </div>
        </div>
      </center><br>

      <div class="container">
      <center>
        <div class="card mb-3" style="max-width: 950px;">
          <div class="row g-0 align-items-center" >
            <div class="col-md-4">
              <img src="../../public/img/users.png" class="img-fluid rounded-start">
            </div>
          <div class="col-md-8">
            <div class="card card-success">
              <div class="card-header" style="background-color:info">
                <center><h4> Llene los datos cuidadosamente</h4></center>
              </div>
                <?php
                     $id_price_get = $_GET['id'];
                    $query_price = $pdo->prepare("SELECT * FROM prices WHERE id_price = '$id_price_get' AND enable_price = '1'  ");
                    $query_price->execute();
                    $data_prices = $query_price->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data_prices as $data_price){
                        $id_price = $data_price['id_price'];
                        $amount = $data_price['amount'];
                        $detail = $data_price['detail'];
                        $price = $data_price['price'];
                    }
                ?>

              <div class="card-body" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cantidad <span style="color: red"><b>*</b></span></label>
                            <input type="number" id="amount" value="<?php echo $amount;?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Detalle</label>
                            <select name="" id="detail" class="form-control">
                                <?php
                                    if($detalle == "HORAS"){ ?>
                                        <option value="HORAS">HORAS</option>
                                        <option value="DIAS">DIAS</option>
                                    <?php
                                    }else{ ?>
                                        <option value="DIAS">DIAS</option>
                                        <option value="HORAS">HORAS</option>
                                    <?php
                                        }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Precio <span style="color: red"><b>*</b></span></label>
                            <input type="number" step="0.01" value="<?php echo $price;?>" id="price" class="form-control">
                        </div>
                    </div>
                </div>
                    <hr> 
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <a href="index.php" class="btn btn-default">Cancelar</a>
                            <button class="btn btn-success" id="update_price">Actualizar precio</button>
                        </div>
                    </div>

                    <script>
                        $('#btn_actualizar_precio').click(function () {
                            var amount = $('#amount').val();
                            var detail = $('#detail').val();
                            var price = $('#price').val();
                            var id_price = <?php echo $id_price_get;?>;

                            if(amount == ""){
                                alert("Debe de llenar el campo cantidad...");
                                $('#amount').focus();
                            }else if(price == ""){
                                alert("Debe de llenar el campo precio...");
                                $('#price').focus();
                            }else {
                                var url = '../controllers/controller_updated.php';
                                $.get(url,{amount:amount, detail:detail, price:price,id_price:id_price},function (datos) {
                                $('#answer').html(datos);
                                });
                            }

                        });
                    </script>
                </div>
                <div id="answer"></div>
            </div>
          </div>
        </div>
        </center>
      </div>
    </div>
  </div>
  
<?php include('../../layout/admin/footer.php'); ?>
</div>
<?php include('../../layout/admin/script.php'); ?>
</body>
</html>

