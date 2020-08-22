
//GRUD EMPRESAS 
let empresa;
const URLE = '../backend/api/empresas.php';

//Agregar Empresa
function crearEmpresa(){
    empresa = $('#formularioEmpresa').serialize();
    $('#modalAgregarEmpresa').modal('hide');
    axios({
        method: 'POST',
        url: URLE,
        reponseType: 'json',
        data: empresa
    }).then(respuesta=>{
        console.log(respuesta);
        verEmpresas();
    }).catch(error=>{
        console.error(error);
    });
}

//Visualizar Empresa(s)
function verEmpresas(){
    $('#tablaEmpresas').hide();
    $('#restEmpresas').show();
    axios({
        method: 'GET',
        url: URLE,
        reponseType: 'json'
    }).then(function(respuesta){
        console.log(respuesta);
        document.querySelector("#tablaEmpresas").innerHTML=``;
        empresas = respuesta.data;
        for(let indice in empresas){
            document.querySelector("#tablaEmpresas").innerHTML+=
            `<tr>
                <td>${empresas[indice].nombreEmpresa}</td>
                <td>${empresas[indice].direccion}</td>
                <td>${empresas[indice].telefono}</td>
                <td>${empresas[indice].correo}</td>
                <td>
                    <a class="btn btn-block btn-c1" style="cursor:pointer;" onclick="verProductos('${empresas[indice].codigoEmpresa}')">
                        <i id="pro${empresas[indice].codigoEmpresa}" 
                        class="zmdi zmdi-archive zmdi-hc-lg" 
                        style="color:white;">
                        </i>

                        <i id="restPro${empresas[indice].codigoEmpresa}" 
                        class="zmdi zmdi-replay zmdi-hc-spin-reverse" 
                        style="color:white;display:none;">
                        </i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-block btn-success" style="cursor:pointer;" onclick="habilitarEdicion('${indice}')">
                        <i id="act${indice}" class="zmdi zmdi-refresh zmdi-hc-lg" 
                        style="color:white;"></i>
                        
                        <i id="restAct${indice}" class="zmdi zmdi-replay zmdi-hc-spin-reverse"
                        style="color:white;display:none;"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-block btn-danger" style="cursor:pointer;" onclick="eliminarEmpresa('${indice}')">
                        <i class="zmdi zmdi-delete zmdi-hc-lg" style="color:white;"></i>
                    </a>
                </td>
            </tr>`;
        }
        $('#tablaEmpresas').show();
        $('#restEmpresas').hide();
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}
//obtener Empresa en especifico el id en este caso se obtiene de un hidden en html
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
//obtener empresas divididas por categorias
function verEmpresasXCategoria(codigoCategoria){
    $('#menuCategoria').hide();
    $('#restCategoria').show();
    $('#empresas').empty();
    axios({
        method: 'GET',
        url: URLE+`?idCategoria=${codigoCategoria}`,
        reponseType: 'json'
    }).then(function(respuesta){
        document.querySelector("#empresas").innerHTML=``;
        trasladarScroll(0,650);
        empresas = respuesta.data;
        console.log(respuesta.data);
        for(let indice in empresas){
            document.querySelector("#empresas").innerHTML+=
            `<div class="col-3 mx-3 mb-5 rounded p-0""
            onclick="verProductosXEmpresa(${empresas[indice].codigoEmpresa})">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" style="cursor:pointer;" src="././resource/img/comida-img-2.webp" alt="Card image cap">
                    <div class="card-body pb-0">
                        <h5 class="card-title font-1">${empresas[indice].nombreEmpresa}</h5>
                    </div>
                </div>
            </div>`;
        }
        $('#menuCategoria').show();
        $('#restCategoria').hide();
    }
    ).catch(function(error){
        console.log(error);
    }
    );
}

//Actualizar Empresa
function actualizarEmpresa(idEmpresa){
    empresa = $('#formularioEmpresa').serialize();
    $('#modalAgregarEmpresa').modal('hide');
    axios({
        method: 'PUT',
        url: URLE+`?idEmpresa=${idEmpresa}`,
        reponseType: 'json',
        data:empresa
    }).then(function(respuesta){
        Swal.fire(
            'Actualizado!',
            respuesta.data.mensaje,
            'success'
        ).then(respuesta=>verEmpresas());
    }
    ).catch(function(error){
        console.error(error)
    }
    );
}

//Eliminar Empresa
function eliminarEmpresa(idEmpresa){
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
                    url: URLE+`?idEmpresa=${idEmpresa}`,
                    reponseType: 'json'
                }).then(function(respuesta){
                    verEmpresas();
                }).catch(function(error){
                console.error(error);
                });
            }
        });
    }

//Otras Funciones

//obtiene datos de la empresa para modificarlos
function habilitarEdicion(idEmpresa){
    $('#idEmpresa').val(idEmpresa);
    $('#act'+idEmpresa).hide();
    $('#restAct'+idEmpresa).show();
    let datosEmpresa = verEmpresa(idEmpresa);  
    console.log(datosEmpresa); 
    intercalarBotones(true);
    datosEmpresa.then((datos)=>{
        //resting
        $('#act'+idEmpresa).show();
        $('#restAct'+idEmpresa).hide();
        document.querySelector('#codigoEmpresa').value = datos.codigoEmpresa;
        document.querySelector('#categoriaEmpresa').value = datos.codigoCategoria;
        document.querySelector('#nombreEmpresa').value = datos.nombreEmpresa;
        document.querySelector('#direccionEmpresa').value = datos.direccion;
        document.querySelector('#correoEmpresa').value = datos.correo;
        document.querySelector('#telefonoEmpresa').value = datos.telefono;
        $('#modalAgregarEmpresa').modal('show');
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