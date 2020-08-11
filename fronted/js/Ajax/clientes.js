const URLC = '../backend/api/clientes.php';

function crearCliente(){
    let cliente = $('#formularioCliente').serialize();
    axios({
        method: 'POST',
        url: URLC,
        reponseType: 'json',
        data: cliente
    }).then(respuesta=>{
        console.log(respuesta);
    }).catch(error=>{
        console.error(error());
    });
}
function verClientes(){
    document.querySelector("#tablaClientes").innerHTML=``;
    axios({
        method: 'GET',
        url: URLC,
        reponseType: 'json'
    }).then((respuesta)=>{
        console.log(respuesta);
        respuesta.data.forEach(function(cliente,codigoCliente){
            document.querySelector("#tablaClientes").innerHTML+=
            `<tr>
                <td>${cliente.nombre}</td>
                <td>${cliente.id}</td>
                <td>${cliente.correo}</td>
                <td>${cliente.celular}</td>
                <td>${cliente.contrasena}</td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-card"></i></a></td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-pin"></i></a></td>
                <td><a class="btn btn-lg btn-success"><i class="zmdi zmdi-refresh" style="color:white;"></i></a></td>
                <td><a class="btn btn-lg btn-danger"><i class="zmdi zmdi-delete" style="color:white;"></i></a></td>
            </tr>`;
        });
    }).catch((error)=>{
        console.log(error);
    });
}
function actualizarCliente(){

}
function eliminarCliente(){

}