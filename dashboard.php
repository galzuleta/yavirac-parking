<?php
include('app/config.php');
include('layout/admin/data_user_session.php');
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
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="" method="post">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalRolesLabel">Asignar Rol</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="staticEmail" class="col-sm-2 col-form-label">Placa:</label>
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

                                                                                                    if(plate == ""){
                                                                                                        alert('Debe de llegar el campo Placa');
                                                                                                        $('#plate_search<?php echo $id_map;?>').focus();
                                                                                                    }else{
                                                                                                        var url = 'customers/controllers/controller_search_customer.php';
                                                                                                        $.get(url,{plate:plate},function (datos) {
                                                                                                            $('#answer_search<?php echo $id_map;?>').html(datos);
                                                                                                        });
                                                                                                    }
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="answer_search<?php echo $id_map;?>">
                                                                                </div>
                                                                                <br>
                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Fecha Ingreso:</label>
                                                                                        <div class="col-sm-9">
                                                                                            <?php date_default_timezone_set("America/Guayaquil");
                                                                                            $date_time = date("Y-m-d h:i:s");
                                                                                            $day = date('d');
                                                                                            $month = date('m');
                                                                                            $year = date('Y');
                                                                                            ?>
                                                                                        <input type="date" id="entry_date<?php echo $id_map;?>" class="form-control" id="" value="<?php echo $year."-".$month."-".$day;?>" >
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Hora Ingreso:</label>
                                                                                        <div class="col-sm-9">
                                                                                            <?php date_default_timezone_set("America/Guayaquil");
                                                                                                $date_time = date("Y-m-d h:i:s");
                                                                                                $hour = date('H');
                                                                                                $minute = date('i');
                                                                                                ?>
                                                                                            <input type="time" id="entry_time<?php echo $id_map;?>" class="form-control" id="" value="<?php echo $hour.":".$minute;?>" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="mb-3 row">
                                                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Cubículo:</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input disabled type="text" class="form-control" id="cubicle<?php echo $id_map;?>" value="<?php echo $no_space;?>" >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" id="register_ticket<?php echo $id_map;?>" class="btn btn-primary">Imprimir Ticket</button>
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        <script>
                                                                            $('#register_ticket<?php echo $id_map;?>').click(function (){
                                                                                var plate = $('#plate_search<?php echo $id_map;?>').val();
                                                                                var identification = $('#identificacion<?php echo $id_map;?>').val();
                                                                                var name = $('#name<?php echo $id_map;?>').val();
                                                                                var lastname = $('#lastname<?php echo $id_map;?>').val();
                                                                                var type_transport = $('#type_transport<?php echo $id_map;?>').val();
                                                                                var type_customer = $('#type_customer<?php echo $id_map;?>').val();
                                                                                var entry_date = $('#entry_date<?php echo $id_map;?>').val();
                                                                                var entry_time = $('#entry_time<?php echo $id_map;?>').val();
                                                                                var cubicle = $('#cubicle<?php echo $id_map;?>').val();

                                                                                if (name == null){
                                                                                }

                                                                            });
                                                                        </script>
                                                                    </div>
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
                                                    <button class="btn btn-info" >
                                                        <img src="<?php echo $URL;?>/public/img/auto.png" width="50px" alt="">
                                                    </button>
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
