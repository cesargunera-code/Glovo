const URLC = '../backend/api/clientes.php';
//registramos el cliente, solo con su email y contrasena
function registrarCliente() {
    let cliente = $('#formularioCliente').serialize();
    $('#modalRegistrarse').modal('hide');
    axios({
        method: 'POST',
        url: URLC,
        reponseType: 'json',
        data: cliente
    }).then(respuesta => {
        console.log(respuesta);
        limpiar_formulario('#formularioCliente .form-group input');
    }).catch(error => {
        console.error(error);
    });
    
}
//obtenemos todos los clientes para visualizarlos en una tabla solo para administradores
function verClientes() {
    $('#tablaClientes').hide();
    $('#restClientes').show();
    document.querySelector("#tablaClientes").innerHTML = ``;
    axios({
        method: 'GET',
        url: URLC,
        reponseType: 'json'
    }).then((respuesta) => {
        console.log(respuesta);
        let clientes = respuesta.data;
        for (let indice in clientes) {
            document.querySelector("#tablaClientes").innerHTML +=
                `<tr>
                <td>${clientes[indice].nombre}</td>
                <td>${clientes[indice].correo}</td>
                <td>${clientes[indice].id}</td>
                <td>${clientes[indice].celular}</td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-card"></i></a></td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-pin"></i></a></td>
                <td><a class="btn btn-lg btn-danger" onclick="eliminarCliente('${indice}')">
                <i class="zmdi zmdi-delete" style="color:white;"></i></a></td>
            </tr>`;
        }
        $('#tablaClientes').show();
        $('#restClientes').hide();
    }).catch((error) => {
        console.log(error);
    });
}
//recordatorio personal: la mando a llamar en validacionDePermisos
function verCliente() {
    tippy('#perfil', {
        trigger: 'click',
        allowHTML: true,
        interactive: true,
        maxWidth: 500,
        theme: 'white2',
        onCreate(VentanaDatos) {
            VentanaDatos.setContent('Cargando...');
            VentanaDatos.EnProceso = false;
            VentanaDatos.Error = null;
        },
        onShow(VentanaDatos) {
            if (VentanaDatos.EnProceso || VentanaDatos.Error) {
                return;
            }
            VentanaDatos.EnProceso = true;
            axios({
                method: 'GET',
                url: 'http://localhost/Glovo-chepia/backend/api/clientes.php',
                responseType:'json'
            })
                .then((response) => {
                    console.log(response);
                    let datosUsuario = response.data;
                    console.log(datosUsuario);
                    let html = ``;
                    for(let indice in datosUsuario){
                        html =
                        `<form class="container" id="formularioCliente">
                            <label class="h5 text-muted">PERFIL</label>
                            <hr>
                            <div class="form-row justify-content-between">
                                <label for="nombreCliente" class="h6 text-muted pb-3">Nombre: </label>
                                <input id="nombreCliente" name="nombreCliente" type="text" class="form-control mb-3 ml-2"
                                value="${datosUsuario[indice].nombre}">
                            </div>
                            <div class="form-row justify-content-between">
                                <label class="h6 text-muted pb-3" for="correoCliente">Correo: </label>
                                <input id="correoCliente" name="correoCliente" type="text" class="form-control mb-3 ml-2"
                            value="${datosUsuario[indice].correo}">
                            </div>
                            <div class="form-row justify-content-between">
                                <label class="h6 text-muted pb-3" for="identidadCliente">Identidad: </label>
                                <input id="identidadCliente" name="identidadCliente" type="text" class="form-control mb-3 ml-2"
                                value="${datosUsuario[indice].id}">
                            </div>
                            <div class="form-row justify-content-between">
                                <label class="h6 text-muted pb-3" for="celularCliente">Celular: </label>
                                <input id="celularCliente" name="celularCliente" type="text" class="form-control mb-3 ml-2"
                                value="${datosUsuario[indice].celular}">
                            </div>
                            <hr>
                            <a id="actCli"class="btn btn-c1" 
                            onclick="actualizarCliente()">
                            Actualizar
                            </a>
                            <a id="restCli" class="btn btn-c1 px-5" style="color:white;display:none;">
                            <i  class="zmdi zmdi-replay zmdi-hc-spin-reverse"></i>
                            </a>
                        </form>`;
                    }
                    VentanaDatos.setContent(html);
                }).catch((error) => {
                    VentanaDatos.Error = error;
                    VentanaDatos.setContent(`Peticion Fallida ${error}`);
                })
                .finally(() => {
                    VentanaDatos.EnProceso = false;
                });
        },
        onHidden(VentanaDatos) {
            VentanaDatos.setContent('Cargando...');
            VentanaDatos._src = null;
            VentanaDatos._error = null;
        }
    });
}
//actualizamos datos del cliente, menos su contrasena
function actualizarCliente() {
    $('#actCli').hide();
    $('#restCli').show();
    let cliente = $('#formularioCliente').serialize();
    axios({
        method: 'PUT',
        url: URLC,
        reponseType: 'json',
        data:cliente
    }).then(function(respuesta){
        $('#actCli').show();
        $('#restCli').hide();
        Swal.fire(
            'Actualizado',
            '',
            'success');
    }
    ).catch(function(error){
        
        console.error(error);
    }
    );
}
//elimianmos el usuario-cliente, esta funcion solo esta disponible para administradores
function eliminarCliente(idCliente) {
    Swal.fire({
        title: 'Estas Seguro?',
        text: "Esta Accion Sera Irreversible",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si, borralo',
        cancelButtonText: 'no'
        }).then(respuesta=> {
            if(respuesta.value){
                axios({
                    method: 'DELETE',
                    url: URLC+`?idCliente=${idCliente}`,
                    responseType: 'JSON'
                }).then(function(respuesta){
                    verClientes();
                });
            }
        });
    
}
