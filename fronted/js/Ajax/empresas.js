    //GRUD EMPRESAS 
let empresa = {};
const URLE = '../backend/api/empresas.php';

//Agregar Empresa
function crearEmpresa(){
    obtenerDatosEmpresa();
    axios({
        method: 'POST',
        url: URLE,
        reponseType: 'json',
        data: empresa
    }).then(respuesta=>{console.log(respuesta)}).catch(error=>console.error(error));
}

//Visualizar Empresa(s)
function verEmpresas(){
    axios({
        method: 'GET',
        url: URLE,
        reponseType: 'json'
    }).then(function(respuesta){
        console.log(respuesta);
        document.querySelector("#tablaSocios").innerHTML=``;
        respuesta.data.forEach(function(empresa,codigoEmpresa){
            document.querySelector("#tablaSocios").innerHTML+=
            `<tr>
                <td>${empresa.nombreEmpresa}</td>
                <td>${empresa.direccion}</td>
                <td>${empresa.telefono}</td>
                <td>${empresa.correo}</td>
                <td>${empresa.contacto}</td>
                <td>
                    <a class="btn btn-block btn-c1" style="cursor:pointer;" onclick="verProductosXEmpresa(${codigoEmpresa})">
                        <i class="zmdi zmdi-archive zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-block btn-success" style="cursor:pointer;" onclick="habilitarEdicion(${codigoEmpresa})">
                        <i class="zmdi zmdi-refresh zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-block btn-danger" style="cursor:pointer;" onlick="eliminarEmpresa(${codigoEmpresa})">
                        <i class="zmdi zmdi-delete zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
            </tr>`;
        });
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}

function verEmpresa(idEmpresa){
    return axios({
        method: 'GET',
        url: URLE+`?idEmpresa=${idEmpresa}`,
        reponseType: 'json'}
        ).then(function(respuesta){
            return respuesta.data;
        }).catch(function(error){
            console.error(error);
        });
}

function verEmpresasXCategoria(codigoCategoria){
    trasladarScroll(0,650);
    axios({
        method: 'GET',
        url: URLE+`?idCategoria=${codigoCategoria}`,
        reponseType: 'json'
    }).then(function(respuesta){
        console.log(respuesta);
        document.querySelector("#empresas").innerHTML=``;
        respuesta.data.forEach(function(empresa,codigoEmpresa){
            document.querySelector("#empresas").innerHTML+=
            `<div class="col-3 mx-3 mb-5 rounded p-0" height: "200px; onclick="verProductosXEmpresa(${codigoCategoria},${codigoEmpresa})">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="cursor:pointer;" src="${empresa.imagen}" alt="Card image cap">
                    <div class="card-body pb-0">
                        <h5 class="card-title">${empresa.nombreEmpresa}</h5>
                    </div>
                </div>
            </div>`;
        });
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}

function verProductosXEmpresa(codigoCategoria,codigoEmpresa){
    $("#modalProductos").modal('show');
    let empresa = categorias[codigoCategoria].empresas[codigoEmpresa];
    document.querySelector('#productos').innerHTML=``;
    document.querySelector('#tituloEmpresa').innerHTML= empresa.nombreEmpresa;
    empresa.productos.forEach(function(producto,codigoProducto){
        document.querySelector('#productos').innerHTML+=
        `<div class="card col-4 p-0 m-1" style="max-width:30%!important;">
            <img class="card-img-top" height="250px" src="${producto.imagen}">
            <div class="card-body text-left">
                <h5 class="card-title">${producto.nombreProducto}</h5>
                    <p class="font-1">
                        ${producto.descripcion}
                    </p>
                    <hr>
                    <p class="card-text">
                        <small class="text-muted">
                            $${producto.precio}
                        </small>
                    </p>
            </div>
        </div>`;
    });
}
//Actualizar Empresa
function actualizarEmpresa(idEmpresa){
    obtenerDatosEmpresa();
    axios({
        method: 'PUT',
        url: URLE+`?idEmpresa=${idEmpresa}`,
        reponseType: 'json',
        data:empresa
    }).then(function(respuesta){
        console.log(respuesta);
        verEmpresa();
    }
    ).catch(function(error){
        console.error(error)
    }
    );
}

//Eliminar Empresa
function eliminarEmpresa(idEmpresa){
    axios({
        method: 'DELETE',
        url: URLE+`?idEmpresa=${idEmpresa}`,
        reponseType: 'json'
    }).then(function(){

    }
    ).catch(function(){

    }
    );
}

//Otras Funciones
function habilitarEdicion(idEmpresa){
    $('#modalAgregarEmpresa').modal('show');
    let datosEmpresa = verEmpresa(idEmpresa);
    intercalarBotones(true);
    datosEmpresa.then((datos)=>{
        document.querySelector('#categoriaEmpresa').value = datos.codigoCategoria;
        document.querySelector('#codigoEmpresa').value = datos.codigoEmpresa;
        document.querySelector('#nombreEmpresa').value = datos.nombreEmpresa;
        document.querySelector('#direccionEmpresa').value = datos.direccion;
        document.querySelector('#correoEmpresa').value = datos.correo;
        document.querySelector('#telefonoEmpresa').value = datos.telefono;
    });

}
function intercalarBotones(x){
    if(x){
        document.querySelector('#tituloEmpresa').innerHTML='Actualizar Empresa';
        document.querySelector('#act-btn').style.display= 'block';
        document.querySelector('#cre-btn').style.display= 'none';
    }else{
        document.querySelector('#tituloEmpresa').innerHTML='Agregar Empresa';
        document.querySelector('#act-btn').style.display= 'none';
        document.querySelector('#cre-btn').style.display= 'block';
    }
}
function obtenerDatosEmpresa(){
    empresa={
        codigoCategoria : document.querySelector('#categoriaEmpresa').value,
        codigoEmpresa : document.querySelector('#codigoEmpresa').value,
        nombreEmpresa : document.querySelector('#nombreEmpresa').value,
        direccionEmpresa : document.querySelector('#direccionEmpresa').value,
        correoEmpresa : document.querySelector('#correoEmpresa').value,
        telefonoEmpresa : document.querySelector('#telefonoEmpresa').value,
    };
}