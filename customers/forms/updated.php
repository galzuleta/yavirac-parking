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
            <a href="../customer.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
              </svg>Regresar</a>
          </div>
          <div class="col-md-10">
          <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
              <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg> Actualización del Cliente
            </h3>
          </div>
        </div>
      </center><br>

      <div class="container">
      <center>
        <div class="card mb-3" style="max-width: 950px;">
          <div class="row g-0 align-items-center" >
            <div class="col-md-4">
              <img src="../../public/img/customers.jpg" class="img-fluid rounded-start">
            </div>
          <div class="col-md-8">
            <div class="card card-success">
              <div class="card-header" style="background-color:info">
                <center><h4><?php echo $name. ' ' .$lastname; ?></h4></center>
              </div>
              <div class="card-body" >
              <div class="form-group">
                
              <div class="row">
                <div class="col-md-8">
                  <label for="name">Cédula:</label>
                  <input class="form-control" id="identification" type="text" value="<?php echo $identification;?>">
                </div>

                <div class="col-md-4">
                    <label for="email">Placa:</label>
                    <input class="form-control" id="plate" type="email" value="<?php echo $plate;?>" >
                </div>
              </div><br>

                <div class="row">
                  <div class="col-md-6">
                    <label for="name">Nombres:</label>
                    <input class="form-control" id="name" type="text" value="<?php echo $name;?>">
                  </div>
                 
                  <div class="col-md-6">
                    <label for="lastname">Apellidos:</label>
                    <input class="form-control" id="lastname" type="text" value="<?php echo $lastname;?>" >
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-md-6">
                      <label for="">Tipo de Transporte:</label>
                        <select name="" id="type_transport" class="form-control">
                          <?php
                            if($type_transport == "MOTOCICLETA"){ ?>
                              <option value="MOTOCICLETA">MOTOCICLETA</option>
                              <option value="AUTOMOVIL">AUTOMOVIL</option>
                              <?php
                            }else{ ?>
                              <option value="AUTOMOVIL">AUTOMOVIL</option>
                              <option value="MOTOCICLETA">MOTOCICLETA</option>
                              <?php
                            }
                          ?>
                        </select>
                  </div>

                  <div class="col-md-6">
                      <label for="">Tipo de Cliente:</label>
                      <select name="" id="type_customer" class="form-control">
                        <?php
                          if($type_transport == "ESTUDIANTE"){ ?>
                            <option value="ESTUDIANTE">ESTUDIANTE</option>
                            <option value="DOCENTE">DOCENTE</option>
                            <option value="VISITANTE">VISITANTE</option>
                            <?php
                          }else if($type_transport == "ESTUDIANTE"){ ?>
                            <option value="ESTUDIANTE">ESTUDIANTE</option>
                            <option value="DOCENTE">DOCENTE</option>
                            <option value="VISITANTE">VISITANTE</option>
                            <?php
                          }else{ ?>
                            <option value="DOCENTE">DOCENTE</option>
                            <option value="ESTUDIANTE">ESTUDIANTE</option>
                            <option value="VISITANTE">VISITANTE</option>
                            <?php
                          }
                        ?>
                      </select>
                  </div>
              </div>
              </div><br>

                <div class="form-group">
                  <button type="button"  class="btn btn-success" id="updated" >Actualizar</button>
                    <a id="cancelar_customer" class="btn btn-danger">Cancelar</a>
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

<script src="../../alert.js" ></script>
<script>
  $('#updated').click(function (){
    var identification = $('#identification').val();
    var name = $('#name').val();
    var lastname = $('#lastname').val();
    var type_transport = $('#type_transport').val();
    var plate = $('#plate').val();
    var type_customer = $('#type_customer').val();
    var id_customer = '<?php echo $id_customer = $_GET['id']; ?>'

    if(identification == ""){
      setTimeout(function() {
        var nameField = document.getElementById("identification");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Cédula',
            showConfirmButton: false
          });
        }
      });
      $('#identification').focus();
    }
    else if(name == ""){
      setTimeout(function() {
        var nameField = document.getElementById("name");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Nombres',
            showConfirmButton: false
          });
        }
      });
      $('#name').focus();
    }else if(lastname == ""){
      setTimeout(function() {
        var nameField = document.getElementById("lastname");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Apellidos',
            showConfirmButton: false
          });
        }
      });
      $('#lastname').focus();
    }else if(plate == ""){
      setTimeout(function() {
        var nameField = document.getElementById("plate");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Placa',
            showConfirmButton: false
          });
        }
      });
      $('#plate').focus();
    }
    else{
      var url = '../controllers/controller_updated.php';
        $.get(url,{identification:identification, name:name, lastname:lastname, type_transport:type_transport, plate: plate, 
            type_customer:type_customer ,id_customer:id_customer},function (datos) {
          $('#answer').html(datos);
      } );
    }
  });
    
</script>