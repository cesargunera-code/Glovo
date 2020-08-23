//realiza el login
$('#btn-login').click(function () {
    $('#formularioLogin').hide();
    $('#restLogin').show();
    let datosLogin = $('#formularioLogin').serialize();
    console.log(datosLogin);
    axios({
        method: 'POST',
        url: '../backend/api/login.php?accion=login',
        data: datosLogin,
        reponseType: 'JSON'
    }).then(function (respuesta) {
        $('#formularioLogin').show();
        $('#restLogin').hide();
        if (respuesta.data.valido) {
            $('#modalInicioSesion').modal('hide');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Bienvenido',
                showConfirmButton: false,
                timer: 1500
              });
            window.location.href = "index.php";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Las credenciales estan incorrectas',
            }).then(limpiarFormulario('#formularioLogin .form-group input'));
            
        }
    }).catch(function (error) {
        console.error(error);
    })
});
//cierra sesion
function logout() {
    axios({
        method: 'POST',
        url: '../backend/api/login.php?accion=logout',
        reponseType: 'JSON'
    }).then(function (respuesta) {
        window.location.href = "login.php";
    }).catch(function (error) {
        console.error(error);
    });
}
//verificamos los privilegios de cada usuario para asi mostrar la pantalla con los accesos correspondientes a este
function verificarPrivilegios(){
    axios({
        method: 'POST',
        url: '../backend/api/login.php?accion=privilegios',
        responseType: 'JSON'
    }).then(function (res) {
        privilegio = res.data;
        document.querySelector('#form-navegacion').innerHTML = '';
        if (privilegio == 1) {
            document.querySelector('#form-navegacion').innerHTML =
                `<a class="btn btn-c3 btn-radius mx-1 my-0 py-0" href="#">
                <i class="zmdi zmdi-account-circle zmdi-hc-3x" id="perfil" onclick="//verCliente()"></i>
            </a>
            <a class="btn btn-c3 btn-radius mx-1 my-0 py-0" href="#">
                <i class="zmdi zmdi-format-list-bulleted zmdi-hc-3x" id="ordenes" onclick="//verOrdenes()"></i>
            </a>`;
        } else {
            if (privilegio == 2) {
                document.querySelector('#form-navegacion').innerHTML =
                    `<a class="btn btn-c3 btn-radius mx-1 my-0 py-0" href="#">
                    ver Ordenes
                </a>`;
            } else {
                document.querySelector('#form-navegacion').innerHTML =
                    `<a class="btn btn-c2 btn-radius my-2 mx-1 py-2 px-3 shadow" href="clientes.php">
                    Clientes
                </a>
                <a class="btn btn-c2 btn-radius my-2 mx-1 py-2 px-3 shadow" href="socios.php">
                    Socios
                </a>
                <a class="btn btn-c2 btn-radius my-2 mx-1 py-2 px-3 shadow" href="empleados.php">
                    Empleados
                </a>`;
            }
        }
        document.querySelector('#form-navegacion').innerHTML +=
            `<a class="btn btn-light btn-radius my-2 mx-1 py-2 px-3 shadow" onclick="logout()">
            Cerrar Sesion
        </a>`;
        verCliente();   
        verOrdenes();
    });
}
verificarPrivilegios();

function limpiarFormulario(input){
    Array.from(document.querySelectorAll(input)).forEach(
        (input) => (input.value = "")
    );
}