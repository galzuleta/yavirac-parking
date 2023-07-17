<?php
include('app/config.php');
include('layout/admin/data_user_session.php');

//recuperar el id de la informacion
$query_setting = $pdo->prepare("SELECT * FROM settings WHERE enable_setting = '1'");
$query_setting->execute();
$settings = $query_setting->fetchAll(PDO::FETCH_ASSOC);
foreach($settings as $setting){
    $id_setting = $setting['id_setting'];
}

//recuperar el numero de la factura
$counter_no_invoice = 0;
$query_invoice = $pdo->prepare("SELECT * FROM invoices WHERE enable_invoice = '1'");
$query_invoice->execute();
$invoices = $query_invoice->fetchAll(PDO::FETCH_ASSOC);
foreach($invoices as $invoice){
    $counter_no_invoice = $counter_no_invoice + 1;
}
$counter_no_invoice = $counter_no_invoice + 1;

?>
    
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <?php include('layout/admin/head.php'); ?>
        </head>
        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                <?php include('layout/admin/navbar.php'); ?>

                <div class="content-wrapper"><br>
                    <div class="container" style="max-width: 950px;">
                    <center> <h2>BIENVENIDO AL SISTEMA YAVI PARKING</h2> </center><br>
                    <div class="card card-outline card-info">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                    $query_mapping = $pdo->prepare("SELECT * FROM mappings WHERE enable_mapping = '1'");
                                    $query_mapping->execute();
                                    $mappings = $query_mapping->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($mappings as $mapping){
                                      $id_map = $mapping['id_map'];
                                      $no_space = $mapping['no_space'];
                                      $enable_space = $mapping['enable_space'];
                                        if($enable_space == "LIBRE"){?>
                                            <div class="col">
                                                <center>
                                                    <b><font face="Alex Brush" size="4"><?php echo $no_space;?></font></b>
                                                    <h2></h2>
                                                    <!-- Button trigger modal -->
                                                    <button class="btn btn-success" style="width:100%; height:120px" data-toggle="modal" data-target="#modalMapping<?php echo $id_map;?>">
                                                        <p><?php echo $enable_space ?></p>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalMapping<?php echo $id_map;?>" tabindex="-1" role="dialog" aria-labelledby="modalRolesLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content" style="background-color:rgb(245,245,245);">
                                                                <form action="" method="post">
                                                                    <div class="modal-header" style="background-color:rgb(0,151,167);">
                                                                        <h5 class="modal-title" id="modalRolesLabel">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                                                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                                                                        </svg>
                                                                            Asignar Espacio en el Parqueadero</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                    <div class="modal-body" >
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="" class="col-sm-2 col-form-label">Placa <span style="color: red"><b>*</b></label>
                                                                                        <div class="col-sm-7">
                                                                                            <input type="text" style="text-transform:uppercase" class="form-control" id="plate_search<?php echo $id_map;?>" >
                                                                                        </div>
                                                                                        <div class="col-sm-3">
                                                                                            <button type="button" class="btn btn-info" id="search_customer<?php echo $id_map;?>">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                                                                                    <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                                                                                                    <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                                                                                                </svg>Buscar
                                                                                            </button> 
                                                                                            <script>
                                                                                                $('#search_customer<?php echo $id_map;?>').click(function () {
                                                                                                    var plate = $('#plate_search<?php echo $id_map;?>').val();
                                                                                                    var id_map = "<?php echo $id_map;?>";

                                                                                                    if(plate == ""){
                                                                                                        alert('Debe de llenar el campo Placa');
                                                                                                        $('#plate_search<?php echo $id_map;?>').focus();
                                                                                                    }else{
                                                                                                        var url = 'customers/controllers/controller_search_customer.php';
                                                                                                        $.get(url,{plate:plate, id_map:id_map},function (datos) {
                                                                                                            $('#answer_search<?php echo $id_map;?>').html(datos);
                                                                                                        });
                                                                                                    }
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                    </div><hr>
                                                                                </div>
                                                                                <div id="answer_search<?php echo $id_map;?>">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="" class="col-sm-3 col-form-label">Hora Ingreso:</label>
                                                                                        <div class="col-sm-9">
                                                                                            <?php date_default_timezone_set("America/Guayaquil");
                                                                                                $date_time = date("Y-m-d h:i:s");
                                                                                                $hour = date('H');
                                                                                                $minute = date('i');
                                                                                                $second = date('s');
                                                                                                ?>
                                                                                            <input type="time" id="entry_time<?php echo $id_map;?>" class="form-control" id="" value="<?php echo $hour.":".$minute.":".$second;?>" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="" class="col-sm-3 col-form-label">Cubículo:</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input disabled type="text" class="form-control" id="cubicle<?php echo $id_map;?>" value="<?php echo $no_space;?>" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="">Fecha Ingreso:</label>
                                                                                        <?php date_default_timezone_set("America/Guayaquil");
                                                                                            $date_time = date("Y-m-d h:i:s");
                                                                                            $day = date('d');
                                                                                            $month = date('m');
                                                                                            $year = date('Y');
                                                                                            ?>
                                                                                        <input type="date" id="entry_date<?php echo $id_map;?>" class="form-control" id="" value="<?php echo $year."-".$month."-".$day;?>" >
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <label for="">Fecha Salida:</label>
                                                                                        <?php date_default_timezone_set("America/Guayaquil");
                                                                                            $date_time = date("Y-m-d h:i:s");
                                                                                            $day = date('d');
                                                                                            $month = date('m');
                                                                                            $year = date('Y');
                                                                                            ?>
                                                                                        <input type="date" id="out_date<?php echo $id_map;?>" class="form-control" id="" value="<?php echo $year."-".$month."-".$day;?>" >
                                                                                    </div>
                                                                                </div><br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" id="register_ticket<?php echo $id_map;?>" class="btn btn-primary">Imprimir Ticket</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        <script>
                                                                            $('#register_ticket<?php echo $id_map;?>').click(function (){
                                                                                
                                                                                var plate = $('#plate_search<?php echo $id_map;?>').val();
                                                                                var identification = $('#identification<?php echo $id_map;?>').val();
                                                                                var name_customer = $('#name_customer<?php echo $id_map;?>').val();
                                                                                var lastname_customer = $('#lastname_customer<?php echo $id_map;?>').val();
                                                                                var type_transport = $('#type_transport<?php echo $id_map;?>').val();
                                                                                var type_customer = $('#type_customer<?php echo $id_map;?>').val();
                                                                                var entry_date = $('#entry_date<?php echo $id_map;?>').val();
                                                                                var entry_time = $('#entry_time<?php echo $id_map;?>').val();
                                                                                var out_date = $('#out_date<?php echo $id_map;?>').val();
                                                                                var cubicle = $('#cubicle<?php echo $id_map;?>').val();
                                                                                var user_session = "<?php echo $usuario_sesion; ?>";


                                                                                if (plate == ""){
                                                                                    alert('Debe de llenar el campo Placa');
                                                                                    $('#plate_search<?php echo $id_map;?>').focus();
                                                                                }
                                                                                else if (identification == ""){
                                                                                    alert('Debe de llenar el campo Cédula');
                                                                                    $('#identification<?php echo $id_map;?>').focus();
                                                                                }
                                                                                else if (name_customer == ""){
                                                                                    alert('Debe de llenar el campo Nombre');
                                                                                    $('#name_customer<?php echo $id_map;?>').focus();
                                                                                }
                                                                                else if (lastname_customer == ""){
                                                                                    alert('Debe de llenar el campo Apellido');
                                                                                    $('#lastname_customer<?php echo $id_map;?>').focus();
                                                                                }
                                                                                else{

                                                                                    var url = 'parking/controllers/controller_occupied_enable.php';
                                                                                    $.get (url, { cubicle:cubicle}, function(datos){
                                                                                            $('#answer').html(datos);
                                                                                    });

                                                                                    var url_2 = 'tickets/controllers/controller_register_ticket.php';
                                                                                    $.get (url_2, {plate:plate, name_customer:name_customer, lastname_customer:lastname_customer, identification:identification, type_customer:type_customer, 
                                                                                        type_transport:type_transport, entry_date:entry_date, entry_time:entry_time, out_date:out_date, cubicle:cubicle, user_session:user_session}, function(datos){
                                                                                            $('#answer').html(datos);
                                                                                    });

                                                                                    var url_3 = 'customers/controllers/controller_register_customer.php';
                                                                                    $.get (url_3, {plate:plate, name_customer:name_customer, lastname_customer:lastname_customer, identification:identification, type_customer:type_customer, 
                                                                                        type_transport:type_transport}, function(datos){
                                                                                            $('#answer').html(datos);
                                                                                    })
                                                                                }

                                                                            });
                                                                        </script>
                                                                    </div>
                                                                    <div id="answer"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>
                                            <?php 
                                        }
                                        if($enable_space == "OCUPADO"){?>
                                            <div class="col">
                                                <center>
                                                    <b><font face="Alex Brush" size="4"><?php echo $no_space;?></font></b>
                                                    <h2></h2>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" id="occupied<?php echo $id_map;?>" class="btn btn-info" data-toggle="modal" data-target="#exampleModal<?php echo $id_map;?>">
                                                        <img src="<?php echo $URL;?>/public/img/auto.png" width="50px" alt="">
                                                    </button>

                                                    <?php
                                                        $query_ticket = $pdo->prepare("SELECT * FROM tickets WHERE cubicle = '$no_space' AND  enable_ticket = '1' ");
                                                        $query_ticket->execute();
                                                        $tickets = $query_ticket->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($tickets as $ticket){
                                                            $id_ticket = $ticket['id_ticket'];
                                                            $plate = $ticket['plate'];
                                                            $name_customer = $ticket['name_customer'];
                                                            $lastname_customer = $ticket['lastname_customer'];
                                                            $identification = $ticket['identification'];
                                                            $cubicle = $ticket['cubicle'];
                                                            $entry_date = $ticket['entry_date'];
                                                            $entry_time = $ticket['entry_time'];
                                                            $out_date = $ticket['out_date'];
                                                            $user_session = $ticket['user_session'];
                                                        }
                                                    ?>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?php echo $id_map;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content" style="background-color:rgb(245, 245, 245);">
                                                        <div class="modal-header" style="background-color:rgb(255, 112, 67);">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                            </svg>
                                                                Información</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <div class="mb-3 row">
                                                                        <label for="" class="col-sm-3 col-form-label">Placa:</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" style="text-transform: uppercase" class="form-control" value="<?php echo $plate;?>" id="plate<?php echo $id_map;?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Nombre:</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" disabled style="text-transform:uppercase" class="form-control" id="name_customer<?php echo $id_map;?>" value="<?php echo $name_customer;?>"  >
                                                                            </div>        
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Apellido:</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" disabled style="text-transform:uppercase" class="form-control" id="lastname_customer<?php echo $id_map;?>" value="<?php echo $lastname_customer;?>" >
                                                                            </div>      
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Hora Ingreso:</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" disabled id="entry_time<?php echo $id_map;?>" class="form-control" value="<?php echo $entry_time; ?>" >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="mb-3 row">
                                                                            <label for="" class="col-sm-3 col-form-label">Cubículo:</label>
                                                                            <div class="col-sm-9">
                                                                                <input disabled type="text" class="form-control" id="cubicle<?php echo $id_map;?>" value="<?php echo $no_space;?>" >
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label for="">Fecha Ingreso:</label>
                                                                            <input type="text" disabled id="entry_date<?php echo $id_map;?>" class="form-control" value="<?php echo $entry_date; ?>" >
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <label for="">Fecha Salida:</label>
                                                                            <input type="text" disabled id="out_date<?php echo $id_map;?>" class="form-control" value="<?php echo $out_date; ?>" >
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <a href="tickets/forms/reprint_ticket.php?id=<?php echo $id_ticket;?>" class="btn btn-info">Re-Imprimir</a>
                                                            <a href="tickets/controllers/controller_void_ticket.php?id=<?php echo $id_ticket;?>&&cubicle=<?php echo $cubicle;?>" class="btn btn-danger">Anular Ticket</a>
                                                            <button type="button" class="btn btn-success" id="invoice<?php echo $id_map;?>">Facturar</button>
                                                            
                                                            <?php
                                                                //Recupera id del cliente
                                                                $query_data_customer = $pdo->prepare("SELECT * FROM customers WHERE plate = '$plate' AND  enable_customer = '1' ");
                                                                $query_data_customer->execute();
                                                                $data_customers = $query_data_customer->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach($data_customers as $data_customer){
                                                                    $id_customer_invoice = $data_customer['id_customer'];
                                                                
                                                                }
                                                            ?>

                                                            <script>
                                                                $('#invoice<?php echo $id_map;?>').click(function(){
                                                                    var id_setting = "<?php echo $id_setting;?>";
                                                                    var no_invoice =  "<?php echo $counter_no_invoice?>";
                                                                    var id_customer =  "<?php echo $id_customer_invoice?>";
                                                                    var date_issue =  "<?php echo $entry_date?>";
                                                                    var time_issue =  "<?php echo $entry_time?>";
                                                                    var date_out = "<?php echo $out_date?>";
                                                                    var cubicle_invoice = "<?php echo $cubicle?>";
                                                                    var user_session = "<?php echo $user_session?>";

                                                                    var url_4 = 'invoice/controllers/controller_register_invoice.php';
                                                                        $.get (url_4, {id_setting:id_setting, no_invoice:no_invoice, id_customer:id_customer, date_issue:date_issue, 
                                                                            time_issue:time_issue, date_out:date_out, cubicle_invoice:cubicle_invoice, user_session:user_session}, function(datos){
                                                                        $('#answer_invoice<?php echo $id_map;?>').html(datos);
                                                                    })
                                                                    
                                                                })
                                                            </script>
                                                        </div>
                                                        <div id="answer_invoice<?php echo $id_map;?>"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <p><?php echo $enable_space ?></p>
                                                </center>
                                            </div>
                                            <?php 
                                        }
                                ?>
                                <?php      
                                    }
                                ?>
                            </div>
                        </div>
                    </div>  
                    </div>
                </div>
                <?php include('layout/admin/footer.php'); ?>
                </div>
                <?php include('layout/admin/script.php'); ?>
            </body>
    </html>
