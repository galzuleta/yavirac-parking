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
      <center>
        <div class="row">
          <div class="col-md-2">
            <a href="../../prices/">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
              </svg>Regresar</a>
          </div>
          <div class="col-md-10">
          <h3>
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
            </svg> Agregar Tarifas
          </h3>
          </div>
        </div>
      </center><br>
      <center>
        <div class="container ">
            <div class="card mb-3" style="max-width: 950px;">
              <div class="row g-0 align-items-center">
                <div class="col-md-4">
                  <img src="../../public/img/tarifas.png"  style="max-width: 150px;"  class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                  <div class="card card-info">
                    <div class="card-header" style="background-color:info">
                      <center><h4>Formulario</h4></center>
                    </div>
                    <div class="card-body " >
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Cantidad<span style="color: red"><b>*</b></label>
                            <input class="form-control" id="amount" type="text">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Detalle<span style="color: red"><b>*</b></label>
                            <select name="" id="detail" class="form-control">
                              <option value="HORAS">HORAS</option>
                              <option value="DIAS">DIAS</option>
                          </select>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Precio<span style="color: red"><b>*</b></label>
                            <input class="form-control" id="price" type="number" step="0.01">
                          </div>
                        </div>
                      </div><br>
                      <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Tipo Transporte<span style="color: red"><b>*</b></label>
                            <select name="" id="type_transport" class="form-control">
                            <option value="AUTOMOVIL">AUTOMOVIL</option>
                            <option value="MOTOCICLETA">MOTOCICLETA</option>
                        </select>
                          </div>
                        </div>
                        
                    </div>
                    <hr> 
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                        <button type="button"  class="btn btn-info" id="save" >Guardar</button>
                        <a href="<?php echo $URL;?>../prices/" class="btn btn-default">Cancelar</a>
                      </div>
                      <div id="answer"></div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
        </div>
      </center>
    </div>
  </div>
  
<?php include('../../layout/admin/footer.php'); ?>
</div>
<?php include('../../layout/admin/script.php'); ?>
</body>
</html>

<script>
  $('#save').click(function (){
    var amount = $('#amount').val();
    var detail = $('#detail').val();
    var price = $('#price').val();
    var type_transport = $('#type_transport').val();

    if(amount == ""){
      alert('Debe de llenar el campo Cantidad');
      $('#name').focus();
    }
    else if(price == ""){
      alert('Debe de llenar el campo Precio');
      $('#price').focus();
    }
    else{
      var url = '../controllers/controller_created.php';
        $.get(url,{amount:amount, detail:detail, price:price, type_transport:type_transport},function (datos) {
          $('#answer').html(datos);
      } );
    }
  });
    
</script>