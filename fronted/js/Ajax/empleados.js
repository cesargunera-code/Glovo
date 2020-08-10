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
                respuesta.data.forEach(function(repartidor,codigoRepartidor){
                    document.querySelector("#tablaRepartidores").innerHTML+=
                    `<tr>
                        <td>${repartidor.nombre}</td>
                        <td>${repartidor.id}</td>
                        <td>${repartidor.correo}</td>
                        <td>${repartidor.celular}</td>
                        <td>${repartidor.contrasena}</td>
                        <td>${repartidor.transporte}</td>
                        <td>${repartidor.zona}</td>
                        <td>${repartidor.sueldo}</td>
                        <td><a class="btn btn-lg btn-success" onclick="habilitarEdicionRep(true,'Repartidor')">
                            <i class="zmdi zmdi-refresh" style="color:white;"></i>
                        </a>
                        </td>
                        <td><a class="btn btn-lg btn-danger">
                            <i class="zmdi zmdi-delete" style="color:white;"></i>
                        </a>
                        </td>
                    </tr>
                    `;
                });
        }).catch((error)=>{
                console.error(error);
        });
}
function crearRepartidor(){
}
function actualizarRepartidor(){

}
function eliminarRepartidor(){

}
function habilitarEdicionRep(){
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
            
            respuesta.data.forEach(function(administrador,codigoAdministrador){
                document.querySelector("#tablaAdministradores").innerHTML+=
                `<tr>
                    <td>${administrador.nombre}</td>
                    <td>${administrador.id}</td>
                    <td>${administrador.correo}</td>
                    <td>${administrador.celular}</td>
                    <td>${administrador.contrasena}</td>
                    <td>${administrador.cargo}</td>
                    <td>${administrador.sueldo}</td>
                    <td><a class="btn btn-lg btn-success" onclick="habilitarEdicionAdm()">
                    <i class="zmdi zmdi-refresh" style="color:white;"></i></a></td>
                    <td><a class="btn btn-lg btn-danger"><i class="zmdi zmdi-delete" style="color:white;"></i></a></td>
                </tr>
                `;
            });
        }).catch((error)=>{
            console.error(error);
        });
}
function crearAdministrador(){
}
function actualizarAdministradores(){

}
function eliminarAdministradores(){

}
function habilitarEdicionAdm(){
    intercalarBotones(true, 'Administrador');
    $('#modalAdministradores').modal('show');
}

function intercalarBotones(x,nombre){
    if(x){
        document.querySelector('#titulo'+nombre).innerHTML='Actualizar '+nombre;
        document.querySelector('.act-btn').style.display= 'block';
        document.querySelector('.cre-btn').style.display= 'none';
    }else{
        document.querySelector('#titulo'+nombre).innerHTML='Agregar '+nombre;
        document.querySelector('.act-btn').style.display= 'none';
        document.querySelector('.cre-btn').style.display= 'block';
    }
}