let empleado,administrador;
const URLR = '../backend/api/repartidores.php';
const URLA = '../backend/api/administradores.php';
//CRUD REPARTIDORES

//obtener todos los repartidores
function verRepartidores(){
    $('#tablaRepartidores').hide();
    $('#restRepartidores').show();
    document.querySelector("#tablaRepartidores").innerHTML=``;
    document.querySelector("#migasEmpleados").innerHTML=``;
    document.querySelector("#migasEmpleados").innerHTML=`Repartidores`;
        axios({
            method: 'GET',
            url: URLR,
            reponseType: 'json'
        }).then((respuesta)=>{
                let repartidor = respuesta.data;
                console.log(repartidor);
                for(let indice in repartidor){
                    document.querySelector("#tablaRepartidores").innerHTML+=
                    `<tr>
                    <td>${repartidor[indice].nombre}</td>
                    <td>${repartidor[indice].correo}</td>
                    <td>${repartidor[indice].id}</td>
                    <td>${repartidor[indice].celular}</td>
                    <td>${repartidor[indice].direccion}</td>
                    <td>${repartidor[indice].transporte}</td>
                    <td>${repartidor[indice].zona}</td>
                    <td>${repartidor[indice].sueldo}</td>
                    <td><a class="btn btn-lg btn-success" onclick="habilitarEdicionRep('${indice}')">
                        <i id="actRep${indice}" class="zmdi zmdi-refresh" style="color:white;"></i>

                        <i id="restActRep${indice}" 
                        class="zmdi zmdi-replay zmdi-hc-spin-reverse" 
                        style="color:white;display:none;">
                        </i>
                    </a>
                    </td>
                    <td><a class="btn btn-lg btn-danger" onclick="eliminarRepartidor('${indice}')">
                        <i class="zmdi zmdi-delete" style="color:white;"></i>
                    </a>
                    </td>
                </tr>
                `;
                }
                $('#tablaRepartidores').show();
                $('#restRepartidores').hide();
        }).catch((error)=>{
                console.error(error);
        });
}

//obtener un repartidor en especifico por su id
function verRepartidor(idRepartidor){
        return axios({
            method: 'GET',
            url: URLR+`?idRepartidor=${idRepartidor}`,
            reponseType: 'json'
        }).then((respuesta)=>{
            $('#actRep'+idRepartidor).hide()
            $('#restActRep'+idRepartidor).show();
            return respuesta.data;
        }).catch((error)=>{
                console.error(error);
        });
}

//creamos un nuevo administrador
function crearRepartidor(){
    empleado = $('#formularioRepartidor').serialize();
    $('#modalRepartidores').modal('hide');
    axios({
        method: 'POST',
        url: URLR,  
        reponseType: 'json',
        data: empleado
    }).then(respuesta=>{
        verRepartidores();
        limpiarFormularioEmp('#formularioRepartidor .form-group input');
    }).catch(error=>console.error(error));
    
}

//actualizamos los datos del repartidor
function actualizarRepartidor(idRepartidor){
    repartidor= $('#formularioRepartidor').serialize();
    $('#modalRepartidores').modal('hide');
    axios({
        method: 'PUT',
        url: URLR+`?idRepartidor=${idRepartidor}`,
        reponseType: 'json',
        data:repartidor
    }).then(function(respuesta){
        Swal.fire(
            'Actualizado!',
            respuesta.data.mensaje,
            'success'
        ).then(respuesta=>{
            verRepartidores();
            limpiarFormularioEmp('#formularioRepartidor .form-group input');
        });
    }).catch(function(error){
        console.error(error)
    }
    );
}

//eliminamos el repartidor
function eliminarRepartidor(idRepartidor){
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
                    url: URLR+`?idRepartidor=${idRepartidor}`,
                    reponseType: 'json'
                }).then(function(respuesta){
                    console.log(respuesta);
                    verRepartidores();
                }
                ).catch(function(error){
                    console.error(error);
                }
                );
            }
        });
}

//abrimos el modal de repartidores, obtenemos los datos del repartidor
//y los colocamos en el modal para editarlos
function habilitarEdicionRep(idRepartidor){
    $('#actRep'+idRepartidor).hide()
    $('#restActRep'+idRepartidor).show();
    $('#idRepartidor').val(idRepartidor);
    let datosRepartidor = verRepartidor(idRepartidor);
    
    console.log(datosRepartidor)
    datosRepartidor.then((datos)=>{
        $('#actRep'+idRepartidor).show();
        $('#restActRep'+idRepartidor).hide();
        document.querySelector('#codigoRepartidor').value = datos.codigoRepartidor;
        document.querySelector('#nombreRepartidor').value = datos.nombre;
        document.querySelector('#passwordRepartidor').value = datos.password;
        document.querySelector('#identidadRepartidor').value = datos.id;
        document.querySelector('#correoRepartidor').value = datos.correo;
        document.querySelector('#celularRepartidor').value = datos.celular;
        document.querySelector('#direccionRepartidor').value = datos.direccion;
        document.querySelector('#transporteRepartidor').value = datos.transporte;
        document.querySelector('#zonaRepartidor').value = datos.zona;
        document.querySelector('#sueldoRepartidor').value = datos.sueldo;
        $('#modalRepartidores').modal('show');
    });
    intercalarBotones(true, 'Repartidor');
    
}

//CRUD ADMINISTRADORES

//obtenemos todos los administradores
function verAdministradores(){
    $('#tablaAdministradores').hide();
    $('#restAdministradores').show();
    document.querySelector("#tablaAdministradores").innerHTML=``;
    document.querySelector("#migasEmpleados").innerHTML=``;
    document.querySelector("#migasEmpleados").innerHTML=`Administradores`;
    axios({
        method: 'GET',
        url: URLA,
        reponseType: 'json'
    }).then((respuesta)=>{
            let administrador = respuesta.data;
            for(let indice in administrador){
                document.querySelector("#tablaAdministradores").innerHTML+=
                `<tr>
                    <td>${administrador[indice].nombre}</td>
                    <td>${administrador[indice].correo}</td>    
                    <td>${administrador[indice].id}</td>
                    <td>${administrador[indice].celular}</td>
                    <td>${administrador[indice].direccion}</td>
                    <td>${administrador[indice].cargo}</td>
                    <td>${administrador[indice].sueldo}</td>
                    <td>
                        <a class="btn btn-lg btn-success" onclick="habilitarEdicionAdm('${indice}')">
                        <i id="actAdm${indice}" class="zmdi zmdi-refresh" style="color:white;"></i>

                        <i id="restActAdm${indice}" 
                        class="zmdi zmdi-replay zmdi-hc-spin-reverse" 
                        style="color:white;display:none;">
                        </i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-lg btn-danger" onclick="eliminarAdministrador('${indice}')">
                            <i class="zmdi zmdi-delete" style="color:white;"></i>
                        </a>
                    </td>
                </tr>
                `;
            }
            $('#tablaAdministradores').show();
            $('#restAdministradores').hide();
        }).catch((error)=>{
            console.error(error);
        });
}

//obtenemos un administrador en especifico
function verAdministrador(idAdministrador){
    return axios({
        method: 'GET',
        url: URLA+`?idAdministrador=${idAdministrador}`,
        reponseType: 'json'
    }).then((respuesta)=>{
        console.log(respuesta);
        return respuesta.data;
    }).catch((error)=>{
            console.error(error);
    });
}

//creamos un nuevo administrador
function crearAdministrador(){
    administrador = $('#formularioAdmi').serialize();
    $('#modalAdministradores').modal('hide');
    axios({
        method: 'POST',
        url: URLA,
        reponseType: 'json',
        data: administrador
    }).then(respuesta=>{
        verAdministradores();
        limpiarFormularioEmp('#formularioAdmi .form-group input');
    }).catch(error=>console.error(error));
}

//actualizarmos administrador
function actualizarAdministrador(idAdministrador){
    administrador= $('#formularioAdmi').serialize();
    $('#modalAdministradores').modal('hide');
    console.log(administrador);
    axios({
        method: 'PUT',
        url: URLA+`?idAdministrador=${idAdministrador}`,
        reponseType: 'json',
        data: administrador
    }).then(function(respuesta){
            Swal.fire(
                'Actualizado!',
                respuesta.data.mensaje,
                'success'
            ).then(respuesta=>{
                verAdministradores()
                limpiarFormularioEmp('#formularioAdmi .form-group input');
            });
        }).catch(function(error){
            console.error(error);
        }); 
    }

//eliminamos un administrador en especifico
function eliminarAdministrador(idAdministrador){
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
                    url: URLA+`?idAdministrador=${idAdministrador}`,
                    reponseType: 'json'
                }).then(function(respuesta){
                    verAdministradores();
                }).catch(function(error){
                    console.error(error);
                });
            }
        });
}

//obtenemos los datos el administrador y abrimos el modal para mostrar sus datos y editarlos
function habilitarEdicionAdm(idAdministrador){
    $('#actAdm'+idAdministrador).hide();
    $('#restActAdm'+idAdministrador).show();
    $('#idAdministrador').val(idAdministrador);
    let datosAdministrador = verAdministrador(idAdministrador);
    console.log(datosAdministrador);
    datosAdministrador.then((datos)=>{
        $('#actAdm'+idAdministrador).show();
        $('#restActAdm'+idAdministrador).hide();
        document.querySelector('#codigoAdministrador').value= datos.codigoAdministrador;
        document.querySelector('#nombreAdministrador').value= datos.nombre;
        document.querySelector('#passwordAdministrador').value= datos.password;
        document.querySelector('#identidadAdministrador').value= datos.id;
        document.querySelector('#correoAdministrador').value= datos.correo;
        document.querySelector('#celularAdministrador').value= datos.celular;
        document.querySelector('#direccionAdministrador').value= datos.direccion;
        document.querySelector('#cargoAdministrador').value= datos.cargo;
        document.querySelector('#sueldoAdministrador').value= datos.sueldo;
        $('#modalAdministradores').modal('show');
    });
    intercalarBotones(true, 'Administrador');
}


function intercalarBotones(x,nombre){
    if(x){
        document.querySelector('#titulo'+nombre).innerHTML='Actualizar '+nombre;
        document.querySelector('.act-btn').style.display= 'block';
        document.querySelector('.cre-btn').style.display= 'none';
        document.querySelector('.act-btn2').style.display= 'block';
        document.querySelector('.cre-btn2').style.display= 'none';
        $('#contraR').hide();
        $('#contraA').hide();
    }else{
        document.querySelector('#titulo'+nombre).innerHTML='Agregar '+nombre;
        document.querySelector('.act-btn').style.display= 'none';
        document.querySelector('.cre-btn').style.display= 'block';
        document.querySelector('.act-btn2').style.display= 'none';
        document.querySelector('.cre-btn2').style.display= 'block';
        $('#contraR').show();
        $('#contraA').show();
    }
}
function limpiarFormularioEmp(input){
    Array.from(document.querySelectorAll(input)).forEach(
        (input) => (input.value = "")
    );
}