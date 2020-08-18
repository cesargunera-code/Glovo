const URLC = '../backend/api/clientes.php';

function registrarCliente(){
    let cliente = $('#formularioCliente').serialize();
    $('#modalRegistrarse').modal('hide');
    axios({
        method: 'POST',
        url: URLC,
        reponseType: 'json',
        data: cliente
    }).then(respuesta=>{
        console.log(respuesta);
    }).catch(error=>{
        console.error(error);
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
        let clientes = respuesta.data;
        for(let indice in clientes){
            document.querySelector("#tablaClientes").innerHTML+=
            `<tr>
                <td>${clientes[indice].nombre}</td>
                <td>${clientes[indice].correo}</td>
                <td>${clientes[indice].password}</td>
                <td>${clientes[indice].id}</td>
                <td>${clientes[indice].celular}</td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-card"></i></a></td>
                <td><a class="btn btn-lg btn-c1"><i class="zmdi zmdi-pin"></i></a></td>
                <td><a class="btn btn-lg btn-success"><i class="zmdi zmdi-refresh" style="color:white;"></i></a></td>
                <td><a class="btn btn-lg btn-danger"><i class="zmdi zmdi-delete" style="color:white;"></i></a></td>
            </tr>`;
        }
    }).catch((error)=>{
        console.log(error);
    });
}
function verCliente(idCliente){

}
function actualizarCliente(){

}
function eliminarCliente(){

}
