const URLO = '../backend/api/ordenes.php';
function agregarProducto(idProducto){
    $('#modalAgregarProducto').modal('show');
    $('#codigoProducto').val(idProducto);
}

//agregamos un pedido a la orden del usuario
function agregarALaOrden(){
    let datosOrden = $('#formularioOrden').serialize();
    $('#btnOrd').hide();
    $('#restOrd').show();
    axios({
        method: 'POST',
        url: URLO,
        responseType: 'json',
        data: datosOrden
    }).then((respuesta)=>{
        $('#modalProductos').modal('hide');
        $('#modalAgregarProducto').modal('hide');
        Swal.fire('Pedido Agregado','','success');
        //$('#modalProductos').modal('show');
        console.log(respuesta);
    }).catch(error=>{
        console.error(error);
    })
}

//obtenemos todas las ordenes del usuario para visualizar
function verOrdenes(){
    tippy('#ordenes', {
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
                url: 'http://localhost/Glovo-chepia/backend/api/ordenes.php',
                responseType:'json'
            })
                .then((response) => {
                    console.log(response);
                    ordenes = response.data;
                    let html=`
                    <h5 class="text-muted">Pedidos</h5>
                    <hr>
                    <div class="list-group" style="height:300px;">
                        <div class="overflow-auto">`;
                    let total=0
                    for(let indice in ordenes){
                        html+=
                        `<a href="#" class="list-group-item list-group-item-action flex-column align-items-start pb-1">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">
                                    <strong>x${ordenes[indice].cantidad}</strong>
                                </h6>
                                <h5 class="mb-1">${ordenes[indice].nombreProducto}</h5>
                                <h6>
                                    Total:${ordenes[indice].total}
                                </h6>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p class="pb-0">
                                    ${ordenes[indice].descripcion.substring(0,50)}...
                                </p>
                            </div>
                        </a>`;
                        total+=ordenes[indice].total;
                    }
                    html+= `</div>
                            <div href="#" class="list-group-item 
                                list-group-item-action flex-column align-items-start p-0 mt-1">
                                <div class="row w-100 justify-content-between p-0 m-0">
                                    <div class="col-7 p=0">
                                    <h6 class="mb-0 mt-2">
                                        Total De Pedidos: ${total}
                                    </h6>
                                    </div>
                                    <div class="col-5 p-0">
                                    <a class="btn btn-c1 btn-block">
                                        Procesar Orden
                                    </a>
                                    </div>
                                </div>
                            </div>`
                    VentanaDatos.setContent(html+'</div>');
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
