//Boton cnacelar de usuario
$('#btn_cancelar').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../../users/user.php";
        }
    });
});

//Boton cnacelar de asignar rol
$('#cancelar').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../users/user.php";
        }
    });
});

//boton cancelar configuraciones
$('#cancelar_setting').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../../settings/setting.php";
        }
    });
});

//boton cancelar parqueo
$('#cancelar_parking').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../../parking/parking.php";
        }
    });
});

//boton cancelar clientes
$('#cancelar_customer').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../../customers/customer.php";
        }
    });
});

//boton cancelar tarifas
$('#cancelar_prices').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../../prices/price.php";
        }
    });
});

//boton cnacelar observaciones
$('#cancelar_o').click(function(){
    Swal.fire({
        title: '¿Estás seguro de cancelar el registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cancelar',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
            window.location.href = "../observations/observation.php";
        }
    });
});