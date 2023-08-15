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
          <h4 class="mb-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z"/>
        </svg>
            OBSERVACIONES
          </h4>
        </div>
        <div class="col-6 text-right">
          <a href="reports/report_ticket.php" class="btn btn-outline-danger mr-4" >
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
          </svg></a>
        </div>
      </div><br>

      <div class="card card-outline card-info">

          <div class="card-body" style="display: block;">
            <script>
                $(document).ready(function() {
                  $('#table_id').DataTable( {
                    "pageLength": 10,
                    "language": {
                    "emptyTable": "No hay información",
                    "info": " Total de Tickets: _TOTAL_ ",
                    "infoEmpty": "Mostrando 0  Tickets ",
                    "infoFiltered": "(Filtrado de _MAX_  Tickets)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Tickets",
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
                <th><center>Nro</center></th>
                <th><center>Cédula</center></th>
                <th><center>Nombres y Apellidos</center></th>
                <th><center>Transporte</center></th>
                <th><center>Placa</center></th>
                <th><center>Cubículo</center></th>
                <th><center>Fecha entrada</center></th>
                <th><center>Fecha salida</center></th>
                <th><center>Observaciones</center></th>
                </thead>
                <tbody>
                <?php
                $counter = 0;
                $query_ticket = $pdo->prepare("SELECT * FROM tickets WHERE enable_ticket = '1' ORDER BY id_ticket DESC");
                $query_ticket->execute();
                $tickets = $query_ticket->fetchAll(PDO::FETCH_ASSOC);
                foreach($tickets as $ticket){
                    $id = $ticket['id_ticket'];
                    $identification = $ticket['identification'];
                    $name_customer = $ticket['name_customer'];
                    $lastname_customer = $ticket['lastname_customer'];
                    $type_transport = $ticket['type_transport'];
                    $plate = $ticket['plate'];
                    $cubicle = $ticket['cubicle'];
                    $entry_date = $ticket['entry_date'];
                    $out_date = $ticket['out_date'];
                    $observation = $ticket['observation'];

                    $counter = $counter + 1;
                    ?>
                    <tr>
                        <td><center><?php echo $counter;?></center></td>
                        <td><?php echo $identification;?></td>
                        <td><?php echo $name_customer.' '.$lastname_customer;?></td>
                        <td><?php echo $type_transport;?></td>
                        <td><?php echo $plate;?></td>
                        <td><?php echo $cubicle;?></td>
                        <td><?php echo $entry_date;?></td>
                        <td><?php echo $out_date;?></td>
                        <td> <?php echo $observation;?>
                            <!-- Button trigger modal -->
                            <div class="d-flex justify-content-end">
                                <a type="button" class="btn btn-success" title="Describir observaciones" data-toggle="modal" data-target="#modalRoles<?php echo $id;?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill" viewBox="0 0 16 16">
                                        <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z"/>
                                        <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z"/>
                                    </svg>
                                </a>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="modalRoles<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modalRolesLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content " style="background-color:rgb(245,245,245);">
                                        <form action="../observations/controllers/controller_partial.php" method="post">
                                            <div class="modal-header" style="background-color:rgb(40, 180, 99);">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                </svg>
                                                Información de (<?php echo $name_customer. ' ' .$lastname_customer; ?>)</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="observation" class="col-form-label">Observaciones:</label>
                                                    <textarea name="observation" id="observation" class="form-control" rows="5"><?php echo $observation; ?></textarea>
                                                </div>
                                                <input type="hidden" name="id_ticket" value="<?php echo $id; ?>">
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submitSave" class="btn btn-success">Guardar</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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