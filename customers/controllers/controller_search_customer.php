<?php 
include('../../app/config.php');

$plate = $_GET['plate'];
$id_map = $_GET['id_map'];
$plate = strtoupper($plate);

$id_customer = '';
$name_customer = '';
$lastname_customer = '';
$identification = '';
$type_transport = '';
$type_customer = '';


$query_search = $pdo->prepare("SELECT * FROM customers WHERE enable_customer = '1' and plate = '$plate' ");
    $query_search->execute();
    $searchs = $query_search->fetchAll(PDO::FETCH_ASSOC);
        foreach($searchs as $search){
            $id_customer = $search['id_customer'];
            $identification = $search['identification'];
            $name_customer = $search['name'];
            $lastname_customer = $search['lastname'];
            $type_transport = $search['type_transport'];
            $type_customer = $search['type_customer'];
        }

    if($name_customer == ""){
        ?>
        

        <?php
        ?>
        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Cédula <span style="color: red"><b>*</b></label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="identification<?php echo $id_map;?>" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Nombre <span style="color: red"><b>*</b></label>
                <input type="text" class="form-control" id="name_customer<?php echo $id_map;?>"   >
            </div>

            <div class="col-md-6">
                <label for="">Apellido <span style="color: red"><b>*</b></label>
                <input type="text" class="form-control" id="lastname_customer<?php echo $id_map;?>" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Tipo de Transporte <span style="color: red"><b>*</b></label>
                <select name="" id="type_transport<?php echo $id_map;?>" class="form-control">
                    <option value="AUTOMOVIL">AUTOMOVIL</option>
                    <option value="MOTOCICLETA">MOTOCICLETA</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="">Tipo de Cliente <span style="color: red"><b>*</b></label>
                <select name="" id="type_customer<?php echo $id_map;?>" class="form-control">
                    <option value="ESTUDIANTE">ESTUDIANTE</option>
                    <option value="DOCENTE">DOCENTE</option>
                    <option value="VISITANTE">VISITANTE</option>
                </select>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <div class="form-group">
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label">Cédula:</label>
                <div class="col-sm-10">
                <input type="text" disabled class="form-control" id="identification<?php echo $id_map;?>" value="<?php echo $identification;?>" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Nombre:</label>
                <input type="text" disabled class="form-control" id="name_customer<?php echo $id_map;?>" value="<?php echo $name_customer;?>" >
            </div>

            <div class="col-md-6">
                <label for="">Apellido:</label>
                <input type="text" disabled class="form-control" id="lastname_customer<?php echo $id_map;?>" value="<?php echo $lastname_customer;?>" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="">Tipo de Transporte:</label>
                <select name="" disabled id="type_transport<?php echo $id_map;?>" class="form-control">
                    <option value="<?php echo $type_transport;?>"><?php echo $type_transport;?></option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="">Tipo de Cliente:</label>
                <select name="" disabled id="type_customer<?php echo $id_map;?>" class="form-control">
                    <option value="<?php echo $type_customer;?>"><?php echo $type_customer;?></option>
                </select>
                </div>
        </div>
        <?php
    }
    //BUSCAR LA PLACA EN LA TABLA TICKET
    $counter_ticket = 0;
    $query_ticket = $pdo->prepare("SELECT * FROM tickets 
                                   WHERE plate='$plate' AND ticket_status='OCUPADO' and enable_ticket = '1'");
    $query_ticket->execute();
    $tickets = $query_ticket->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tickets as $ticket){
        $counter_ticket = $counter_ticket + 1;
    }if($counter_ticket == "0"){
        ?>
        <br>
        <div id="alerta" class="alert alert-success d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <div class="text-center mx-auto">
            Agregalo para completar el proceso
            </div>
        </div>
        <script>
            $('#register_ticket<?php echo $id_map;?>').removeAttr('disabled');

            setTimeout(function() {
                var alerta = document.getElementById("alerta");
                alerta.remove();
            }, 3000);
        </script>
        <?php
    }else{
        ?>
        <br>
        <div id="alerta2" class="alert alert-warning d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708z"/>
            </svg>
                <div class="text-center mx-auto">
                    Ya se encuentra el Vehículo dentro del parqueadero
                </div>
        </div>
            <script>
                $('#register_ticket<?php echo $id_map;?>').attr('disabled','disabled');

                setTimeout(function() {
                var alerta2 = document.getElementById("alerta2");
                alerta2.remove();
                }, 3000);
            </script>
        <?php
        
    }
    
?>