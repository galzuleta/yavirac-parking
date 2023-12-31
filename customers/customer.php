<?php
include('../app/config.php');
include('../layout/admin/data_user_session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <?php include('../layout/admin/navbar.php'); ?>

  <div class="content-wrapper">
    <div class="container"> <br>
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h4 class="mb-0 ml-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z"/>
              </svg>
                CLIENTES
            </h4>
          </div>
          <div class="col-6 text-right">
            <a class="btn btn-outline-danger mr-4" href="reports/report_customer.php" title="Generar Reporte"  >
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
            </svg></a>
          </div>
        </div><br>

        <?php 
            if (isset($_SESSION['msm'] )){
              $answer = $_SESSION['msm']; ?>
            <script>
              Swal.fire(
                '<?php echo $answer?>!',
                '',
                'success'
              )
            </script>
            <?php
              unset($_SESSION['msm']);
            }
            else if (isset($_SESSION['error'] )){
              $answer_e = $_SESSION['error']; ?>
            <script>
              Swal.fire({
                icon: 'error',
                title: 'Error...',
                '<?php echo $answer_e?>!',
              })
            </script>
            <?php
              unset($_SESSION['msm']);
            }
          ?>
        
      <div class="card card-outline card-info">
        <div class="card-body" >
        <script>
              $(document).ready(function() {
                $('#table_id').DataTable( {
                  "pageLength": 10,
                  "language": {
                  "emptyTable": "No hay información",
                  "info": " Total de Usuarios: _TOTAL_ ",
                  "infoEmpty": "Mostrando 0  Usuarios ",
                  "infoFiltered": "(Filtrado de _MAX_ Usuarios)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Usuarios",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscar:", 
                  "zeroRecords": "Sin resultados encontrados ",
                  "paginate": {
                      "first": "Primero",
                      "last": "Ultimo",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  }
                }
              });
            } );
          </script>
        <table id="table_id"  class="table table-hover table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th></th>
              <th><center>Cédula</center></th>
              <th><center>Nombres</center></th>
              <th><center>Apellidos</center></th>
              <th><center>Tipo Transporte</center></th>
              <th><center>Placa</center></th>
              <th><center>Tipo Cliente</center></th>
              <th>Acción</th>
            </tr>
          </thead>
        <tbody>
            <?php
              $counter = 0;
              $query_customer = $pdo->prepare("SELECT * FROM customers WHERE enable_customer = '1'  ORDER BY id_customer DESC");
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
                $counter = $counter + 1;
                ?>
                  <tr>
                  <td>
                      <center>
                        <a href="forms/updated.php?id=<?php echo $id_customer; ?>" title="Editar" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </a>
                      </center>
                  </td>
                    <td><?php echo $identification;?></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $lastname;?></td>
                    <td><?php echo $type_transport;?></td>
                    <td><?php echo $plate;?></td>
                    <td><?php echo $type_customer;?></td>
                    <td>
                      <center>
                        <a href="forms/deleted.php?id=<?php echo $id_customer; ?>" title="Eliminar" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                        </a>
                    </td>
                  </tr>
                <?php
              
              }
            ?>
        </tbody>
        </table>
        </div>   
      </div>  
    </div>
  </div>

  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/script.php'); ?>

</body>
</html>
