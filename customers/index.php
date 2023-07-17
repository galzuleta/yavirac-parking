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
    <div class="container">
      <div class="row m-4">
        <a href="<?php echo $URL;?>" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
            Nuevo
          </button>
        </a>
        <div class="text-sm ml-8">
            <ul>
              <center><h4>
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-file-earmark-person-fill" viewBox="0 0 16 16">
              <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z"/>
              </svg>
                CLIENTES</h4>
              </center>
            </ul>
        </div>
      </div>
      <div class="card card-outline card-info">
        <table class="table table-bordered table-sm table-striped">
          <th></th>
          <th><center>Cédula</center></th>
          <th><center>Nombres</center></th>
          <th><center>Apellidos</center></th>
          <th><center>Tipo Transporte</center></th>
          <th><center>Placa</center></th>
          <th><center>Tipo Cliente</center></th>

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
                    <a href="forms/updated.php?id=<?php echo $id_customer; ?>" class="btn btn-success">
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
                    <a href="forms/delete.php?id=<?php echo $id_customer; ?>" class="btn btn-danger">
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
        </table>
      </div>  
    </div>
  </div>

  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/script.php'); ?>

</body>
</html>
