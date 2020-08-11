let empleado,administrador;
const URLR = '../backend/api/repartidores.php';
const URLA = '../backend/api/administradores.php';
//GRUD REPARTIDORES
function verRepartidores(){
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
                    <td>${repartidor[indice].id}</td>
                    <td>${repartidor[indice].correo}</td>
                    <td>${repartidor[indice].celular}</td>
                    <td>${repartidor[indice].direccion}</td>
                    <td>${repartidor[indice].transporte}</td>
                    <td>${repartidor[indice].zona}</td>
                    <td>${repartidor[indice].sueldo}</td>
                    <td><a class="btn btn-lg btn-success" onclick="habilitarEdicionRep('${indice}')">
                        <i class="zmdi zmdi-refresh" style="color:white;"></i>
                    </a>
                    </td>
                    <td><a class="btn btn-lg btn-danger" onclick="eliminarRepartidor('${indice}')">
                        <i class="zmdi zmdi-delete" style="color:white;"></i>
                    </a>
                    </td>
                </tr>
                `;
                }
        }).catch((error)=>{
                console.error(error);
        });
}
function verRepartidor(idRepartidor){
        return axios({
            method: 'GET',
            url: URLR+`?idRepartidor=${idRepartidor}`,
            reponseType: 'json'
        }).then((respuesta)=>{
            return respuesta.data;
        }).catch((error)=>{
                console.error(error);
        });
}
function crearRepartidor(){
    empleado = $('#formularioRepartidor').serialize();
    axios({
        method: 'POST',
        url: URLR,
        reponseType: 'json',
        data: empleado
    }).then(respuesta=>{console.log(respuesta);verRepartidores();$('#modalRepartidor').modal('hide');}).catch(error=>console.error(error));
}
function actualizarRepartidor(idRepartidor){
    repartidor= $('#formularioRepartidor').serialize();
    axios({
        method: 'PUT',
        url: URLR+`?idRepartidor=${idRepartidor}`,
        reponseType: 'json',
        data:repartidor
    }).then(function(respuesta){
        console.log(respuesta);
        verRepartidores();
        $('#modalRepartidores').modal('hide');
    }
    ).catch(function(error){
        console.error(error)
    }
    );
}
function eliminarRepartidor(idRepartidor){
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
function habilitarEdicionRep(idRepartidor){
    $('#idRepartidor').val(idRepartidor);
    let datosRepartidor = verRepartidor(idRepartidor);
    console.log(datosRepartidor)
    datosRepartidor.then((datos)=>{
        document.querySelector('#codigoRepartidor').value = datos.codigoRepartidor;
        document.querySelector('#nombreRepartidor').value = datos.nombre;
        document.querySelector('#identidadRepartidor').value = datos.id;
        document.querySelector('#correoRepartidor').value = datos.correo;
        document.querySelector('#celularRepartidor').value = datos.celular;
        document.querySelector('#direccionRepartidor').value = datos.direccion;
        document.querySelector('#transporteRepartidor').value = datos.transporte;
        document.querySelector('#zonaRepartidor').value = datos.zona;
        document.querySelector('#sueldoRepartidor').value = datos.sueldo;
    });
    intercalarBotones(true, 'Repartidor');
    $('#modalRepartidores').modal('show');
}

//GRUD ADMINISTRADORES
function verAdministradores(){
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
                    <td>${administrador[indice].id}</td>
                    <td>${administrador[indice].correo}</td>
                    <td>${administrador[indice].celular}</td>
                    <td>${administrador[indice].direccion}</td>
                    <td>${administrador[indice].cargo}</td>
                    <td>${administrador[indice].sueldo}</td>
                    <td>
                        <a class="btn btn-lg btn-success" onclick="habilitarEdicionAdm('${indice}')">
                            <i class="zmdi zmdi-refresh" style="color:white;"></i>
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
        }).catch((error)=>{
            console.error(error);
        });
}
function verAdministrador(idAdministrador){
    return axios({
        method: 'GET',
        url: URLA+`?idAdministrador=${idAdministrador}`,
        reponseType: 'json'
    }).then((respuesta)=>{
        return respuesta.data;
    }).catch((error)=>{
            console.error(error);
    });
}
function crearAdministrador(){
    administrador = $('#formularioAdmi').serialize();
    axios({
        method: 'POST',
        url: URLA,
        reponseType: 'json',
        data: administrador
    }).then(respuesta=>{console.log(respuesta);verAdministradores();$('#modalAdministradores').modal('hide');}).catch(error=>console.error(error));
}
function actualizarAdministrador(idAdministrador){
    administrador= $('#formularioAdmi').serialize();
    console.log(administrador);
    axios({
        method: 'PUT',
        url: URLA+`?idAdministrador=${idAdministrador}`,
        reponseType: 'json',
        data: administrador
    }).then(function(respuesta){
        console.log(respuesta);
        verAdministradores();
        $('#modalAdministradores').modal('hide');
    }
    ).catch(function(error){
        console.error(error)
    }
    ); 
}
function eliminarAdministrador(idAdministrador){
    axios({
        method: 'DELETE',
        url: URLA+`?idAdministrador=${idAdministrador}`,
        reponseType: 'json'
    }).then(function(respuesta){
        console.log(respuesta);
        verAdministradores();
    }
    ).catch(function(error){
        console.error(error);
    }
    );
}
function habilitarEdicionAdm(idAdministrador){
    $('#idAdministrador').val(idAdministrador);
    let datosAdministrador = verAdministrador(idAdministrador);
    console.log(datosAdministrador)
    datosAdministrador.then((datos)=>{
        document.querySelector('#codigoAdministrador').value= datos.codigoAdministrador;
        document.querySelector('#nombreAdministrador').value= datos.nombre;
        document.querySelector('#identidadAdministrador').value= datos.id;
        document.querySelector('#correoAdministrador').value= datos.correo;
        document.querySelector('#celularAdministrador').value= datos.celular;
        document.querySelector('#direccionAdministrador').value= datos.direccion;
        document.querySelector('#cargoAdministrador').value= datos.cargo;
        document.querySelector('#sueldoAdministrador').value= datos.sueldo;
    });
    intercalarBotones(true, 'Administrador');
    $('#modalAdministradores').modal('show');
}
function intercalarBotones(x,nombre){
    if(x){
        document.querySelector('#titulo'+nombre).innerHTML='Actualizar '+nombre;
        document.querySelector('.act-btn').style.display= 'block';
        document.querySelector('.cre-btn').style.display= 'none';
        document.querySelector('.act-btn2').style.display= 'block';
        document.querySelector('.cre-btn2').style.display= 'none';
    }else{
        document.querySelector('#titulo'+nombre).innerHTML='Agregar '+nombre;
        document.querySelector('.act-btn').style.display= 'none';
        document.querySelector('.cre-btn').style.display= 'block';
        document.querySelector('.act-btn2').style.display= 'none';
        document.querySelector('.cre-btn2').style.display= 'block';
    }
}