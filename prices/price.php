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
          <a href="<?php echo $URL;?>/prices/forms/created.php" class="btn btn-secondary mr-2 ml-4" tabindex="-1" role="button" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
              Nuevo
            </button>
          </a>
          <h4 class="mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
              <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
            </svg>
                TARIFAS
          </h4>
        </div>
        <div class="col-6 text-right">
          <a class="btn btn-outline-danger mr-4" href="reports/report_price.php" title="Generar reporte" >
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
        <div class="card-body" style="display: block;">
          <script>
                  $(document).ready(function() {
                    $('#table_id').DataTable( {
                      "pageLength": 10,
                      "language": {
                      "emptyTable": "No hay Tarifas",
                      "info": " Total de Tarifas: _TOTAL_ ",
                      "infoEmpty": "Mostrando 0  Tarifas ",
                      "infoFiltered": "(Filtrado de _MAX_  Tarifas)",
                      "infoPostFix": "",
                      "thousands": ",",
                      "lengthMenu": "Mostrar _MENU_ Tarifas",
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
          <table id="table_id" class="table table-bordered table-sm table-striped">
          <thead>
            <th></th>
            <th><center>Nro</center></th>
            <th><center>Cantidad</center></th>
            <th><center>Detalle</center></th>
            <th><center>Precio</center></th>
            <th><center>Tipo Transporte</center></th>
            <th><center>Acción</center></th>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            $query_price = $pdo->prepare("SELECT * FROM prices WHERE enable_price = '1'  ORDER BY id_price DESC");
            $query_price->execute();
            $prices = $query_price->fetchAll(PDO::FETCH_ASSOC);
            foreach($prices as $price){
              $id_price = $price['id_price'];
              $amount = $price['amount'];
              $price_amount = $price['price'];
              $detail = $price['detail'];
              $type_transport = $price['type_transport'];
              $counter = $counter + 1;
              ?>
                <tr>
                <td>
                    <center>
                      <a title="Actualizar" href="forms/updated.php?id=<?php echo $id_price; ?>" class="btn btn-success">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                      </a>
                    </center>
                  </td>
                  <td><center><?php echo $counter;?></center></td>
                  <td><center><?php echo $amount;?></center></td>
                  <td><?php echo $detail;?></td>
                  <td><?php echo $price_amount;?></td>
                  <td><?php echo $type_transport;?></td>
                  <td>
                    <center>
                      <a title="Eliminar" href="forms/delete.php?id=<?php echo $id_price; ?>" class="btn btn-danger">
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
          <tbody>
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


