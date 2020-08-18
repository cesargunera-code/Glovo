const URLP = '../backend/api/productos.php';
let producto;
//los subfijos id es para el indice el objeto y codigo es para el atributo codigo de cada objeto
function mostrarListaImagenes(){
    document.querySelector("#imagenProducto").innerHTML =``;
    let tipo = document.querySelector('#tipoImagen').value;
    if(tipo==1 || tipo ==2 || tipo==3){
        cantidadImg = 10;
    }else{
        cantidadImg=23;
    }
    for(let i=1;i<=cantidadImg;i++){
        let  opcion = document.createElement('option');
        opcion.text = `imagen-${tipo}-${i}`;
        opcion.value = `${tipo}-${i}`
        document.querySelector("#imagenProducto").appendChild(opcion);
    }
}
function crearProducto(){
    producto = $('#formularioProducto').serialize();
    $("#modalProductos").modal('hide');
    $("#modalAgregarProductos").modal('hide');
    axios({
        method :'POST',
        url: URLP,
        responseType: 'json',
        data: producto
    }).then(respuesta=>{
        $("#modalProductos").modal('show');
        verProductos($('#codigoEmpresaP').val());
    }).catch(error=>{
        console.error(error);
    });
}
function verProductos(idEmpresa){
    axios({
        method :'GET',
        url: URLP+`?idEmpresa=${idEmpresa}`,
        responseType: 'json'
    }).then(respuesta=>{
        $("#modalProductos").modal('show');
        let productos = respuesta.data;
        document.querySelector('#codigoEmpresaP').value = idEmpresa;
        document.querySelector('#tablaProductos').innerHTML=``;
        for(let indice in productos){
            document.querySelector('#tablaProductos').innerHTML+=
            `<tr>
                <td>${productos[indice].nombreProducto}</td>
                <td>${productos[indice].descripcion}</td>
                <td>${productos[indice].precio}</td>
                <td>
                    <a class="btn btn-block btn-success" style="cursor:pointer;" onclick="habilitarEdicionP('${indice}')">
                        <i class="zmdi zmdi-refresh zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
                <td>    
                    <a class="btn btn-block btn-danger" style="cursor:pointer;" 
                    onclick="eliminarProducto('${indice}',${productos[indice].codigoEmpresa})">
                        <i class="zmdi zmdi-delete zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
            </tr>`;
        }
    }).catch(error=>{
        console.error(error);
    });
}
function verProducto(idProducto){
    return axios({
        method: 'GET',
        url: URLP+`?idProducto=${idProducto}`,
        responseType: 'json'
    }).then(function(respuesta){
        return respuesta.data});
}
function verProductosXEmpresa(idEmpresa){
    axios({
        method :'GET',
        url: URLP+`?idEmpresa=${idEmpresa}`,
        responseType: 'json'
    }).then(respuesta=>{
        $("#modalProductos").modal('show');
        let productos = respuesta.data;
        console.log(productos);
        document.querySelector('#productos').innerHTML=``;
        document.querySelector('#productos').innerHTML=``;
        //document.querySelector('#tituloEmpresa').innerHTML= empresa.nombreEmpresa;
        for(let indice in productos){
            document.querySelector('#productos').innerHTML+=
                `<div class="card col-4 p-0 m-1" style="max-width:30%!important; display: flex !important;">
                    <img class="card-img-top p-0" height="250px" src="././resource/img/img-productos/${productos[indice].imagen}.jpg">
                    <div class="card-body text-left">
                        <h5 class="card-title">${productos[indice].nombreProducto}</h5>
                            <p class="card-text">${productos[indice].descripcion}</p>
                    </div>
                    <div class="container-fluid align-text-bottom">
                        <hr>
                        <div class="row justify-content-between p-2">
                            <p class="h5 card-text text-left">
                                <small class="text-muted">
                                    Precio: $ ${new Intl.NumberFormat('en-US').format(productos[indice].precio)}
                                </small>
                            </p>
                            <a class="btn btn-c1" onclick="agregarProducto(${productos[indice].codigoProducto})">Agregar</a>
                        </div>
                    </div>
                </div>`;
            }
        });
    }   
function actualizarProducto(idProducto,idEmpresa){
    console.log(idEmpresa);
    console.log(idProducto);
    producto = $('#formularioProducto').serialize();
    $("#modalProductos").modal('hide');
    $("#modalAgregarProductos").modal('hide');
    axios({
        method: 'PUT',
        url: URLP+`?idProducto=${idProducto}`,
        responseType: 'json',
        data: producto
    }).then(respuesta=>{
        console.log(respuesta);
        verProductos(idEmpresa);
        $("#modalProductos").modal('show');
    }).catch(error=>{
        console.error(error)
    });
}

function eliminarProducto(idProducto,idEmpresa){
    axios({
        method: 'DELETE',
        url: URLP+`?idProducto=${idProducto}`
    }).then(respuesta=>{
        verProductos(idEmpresa);
    }).catch(error=>{

    });
}
function habilitarEdicionP(idProducto){
    let datosProducto = verProducto(idProducto);
    $('#idProducto').val(idProducto);
    $("#modalAgregarProductos").modal('show');
    datosProducto.then(datos=>{
        intercalarBotonesP(true);
        document.querySelector('#codigoProducto').value= datos.codigoProducto;
        document.querySelector('#codigoEmpresaP').value= datos.codigoEmpresa;
        document.querySelector('#nombreProducto').value= datos.nombreProducto;
        document.querySelector('#descripcionProducto').value= datos.descripcion;
        document.querySelector('#precioProducto').value= datos.precio;
    })
}
function intercalarBotonesP(x){
    if(x){
        document.querySelector('#tituloProducto').innerHTML='Actualizar Producto';
        document.querySelector('#act-btn-2').style.display= 'block';
        document.querySelector('#cre-btn-2').style.display= 'none';
    }else{
        document.querySelector('#tituloProducto').innerHTML='Agregar Producto';
        document.querySelector('#act-btn-2').style.display= 'none';
        document.querySelector('#cre-btn-2').style.display= 'block';
    }
}
