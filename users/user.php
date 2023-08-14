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
          <div class="col-6 d-flex align-items-center ">
            <a href="<?php echo $URL;?>/users/forms/created.php" class="btn btn-secondary mr-2 ml-4" tabindex="-1" role="button" aria-disabled="true">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
                Nuevo
              </button>
            </a>
            <h4 class="mb-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
              </svg>
                USUARIOS
            </h4>
          </div>
          <div class="col-6 text-right">
              <a class="btn btn-outline-danger mr-4" href="reports/report_user.php" title="Generar reporte de usuarios">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                  </svg>
              </a>
          </div>

        </div><br>
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
              <th></th>
              <th><center>Nro</center></th>
              <th><center>Nombres</center></th>
              <th><center>Apellidos</center></th>
              <th><center>Correo Electrónico</center></th>
              <th><center>Rol</center></th>
              <th><center>Acción</center></th>
            </thead>
            
            <tbody>
            <?php
              $counter = 0;
              $query_user = $pdo->prepare("SELECT * FROM users WHERE enable_user = '1'  ORDER BY id DESC");
              $query_user->execute();
              $usuarios = $query_user->fetchAll(PDO::FETCH_ASSOC);
              foreach($usuarios as $usuario){
                $id = $usuario['id'];
                $name = $usuario['name'];
                $lastname = $usuario['lastname'];
                $email = $usuario['email'];
                $role = $usuario['role'];
                $counter = $counter + 1;
                ?>
                  <tr>
                  <td>
                      <center>
                        <a href="forms/updated.php?id=<?php echo $id; ?>"  title="Editar Usuario" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </a>
                      </center>
                    </td>
                    <td><center><?php echo $counter;?></center></td>
                    <td><?php echo $name;?></td>
                    <td><?php echo $lastname;?></td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $role;?></td>
                    <td>
                      <center>
                        <a href="forms/delete.php?id=<?php echo $id; ?>"  title="Eliminar Usuario" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                        </a>
                          
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary"  title="Asignar Rol" data-toggle="modal" data-target="#modalRoles<?php echo $id;?>">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                          </svg>
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modalRoles<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modalRolesLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content " style="background-color:rgb(245,245,245);">
                                    <form action="../roles/controllers/controller_assing.php" method="post">
                                        <div class="modal-header" style="background-color:rgb(30, 144, 255);">
                                            <h5 class="modal-title" id="modalRolesLabel">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                            </svg>
                                            ASIGNAR ROL A (<?php echo $name. ' ' .$lastname; ?>) </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col">
                                              <div class="form-group">
                                                <div class="mb-3 row">
                                                  <label for="" class="col-sm-2 col-form-label">Nombre:</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" value="<?php echo $name;?>" disabled >
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="mb-3 row">
                                                  <label for="" class="col-sm-2 col-form-label">Apellido:</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $lastname;?>" disabled>
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="mb-3 row">
                                                  <label for="" class="col-sm-4 col-form-label">Correo Electrónico:</label>
                                                    <div class="col-sm-8">
                                                    <input type="email" name="email" class="form-control" value="<?php echo $email;?>" disabled>
                                                    <input class="form-control" type="text" name="id_user" value="<?php echo $id;?>" hidden>
                                                </div>
                                              </div>
                                            
                                              <div class="form-group">
                                                <div class="mb-3 row">
                                                  <label for=""  class="col-sm-2 col-form-label" >Rol:</label>
                                                    <div class="col-sm-10">
                                                      <select name="role" id="" class="form-control"   >
                                                        <?php
                                                          $query_role = $pdo->prepare("SELECT * FROM roles WHERE enable_role = '1'");
                                                          $query_role->execute();
                                                          $roles = $query_role->fetchAll(PDO::FETCH_ASSOC);
                                                          foreach($roles as $role){
                                                            $id_role = $role['id_role'];
                                                            $name = $role['name'];
                                                        ?>
                                                        <option value="<?php echo $name;?>" ><?php echo $name;?></option>
                                                        <?php    
                                                          }
                                                        ?>                               
                                                      </select>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="submitSave" class="btn btn-primary">Asignar Rol</button>
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


