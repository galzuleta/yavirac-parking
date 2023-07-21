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
        $id_customer = $_GET['id'];
        $query_customer = $pdo->prepare("SELECT * FROM customers WHERE id_customer ='$id_customer' AND enable_customer = 1");
        $query_customer->execute();
        $customers = $query_customer->fetchAll(PDO::FETCH_ASSOC);
        foreach($customers as $customer){
            $id_customer = $customer['id_customer'];
            $identification = $customer['identification'];
            $name = $customer['name'];
            $lastname = $customer['lastname'];
            $type_transport = $customer['type_transport'];
            $plate = $customer['plate'];
            $type_customer = $customer['type_customer'];
        }
        ?>

      <center>
        <div class="row">
            <div class="col-md-2">
                <a href="../../customers/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>Regresar</a>
            </div>
            <div class="col-md-10">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                        <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                    </svg> Eliminación del Cliente 
                </h3>
            </div>
        </div>
        
      </center><br>

      <div class="container">
      <center>
        <div class="card mb-3" style="max-width: 950px;">
          <div class="row g-0 align-items-center" >
            <div class="col-md-4">
              <img src="../../public/img/customers.jpg" style="max-width: 200px;" class="img-fluid rounded-start">
            </div>
          <div class="col-md-8">
            <div class="card card-danger">
              <div class="card-header" style="background-color:info">
                <center><h4>¿Estás seguro de eliminar ( <?php echo $name. ' ' .$lastname; ?>)?</h4></center>
              </div>
              <div class="card-body" >
              <div class="form-group">
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Cédula:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="identification" value="<?php echo $identification;?>" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Nombre:</label>
                    <input class="form-control" id="name" type="text" value="<?php echo $name;?>" disabled> 
                </div>

                <div class="col-md-6">
                    <label for="">Apellido:</label>
                    <input class="form-control" id="lastname_customer" type="text" value="<?php echo $lastname;?>" disabled> 
                </div>
            </div><br>

            <div class="row">
                <div class="col-md-6">
                    <label for="">Tipo de Transporte:</label>
                    <select name="" id="type_transport" class="form-control" disabled>
                        <option value="<?php echo $type_transport;?>"><?php echo $type_transport;?></option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="">Tipo de Cliente <span style="color: red"><b>*</b></label>
                    <select name="" id="type_customer" class="form-control" disabled>
                        <option value="<?php echo $type_customer;?>"><?php echo $type_customer;?></option>
                    </select>
                </div>
            </div><hr>
                <div class="form-group">
                  <button type="button"  class="btn btn-danger" id="delete" >Eliminar</button>
                    <a href="<?php echo $URL;?>../customers/" class="btn btn-default">Cancelar</a>
                  </div>
                    <div id="answer"></div>
                  </div>
                </div>
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

<script>
  $('#delete').click(function (){
     var id_customer = '<?php echo $id_customer = $_GET['id']; ?>'

      var url = '../controllers/controller_delete.php';
        $.get(url,{ id_customer:id_customer},function (datos) {
          $('#answer').html(datos);
       });
  });
    
</script>