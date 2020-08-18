
function agregarProducto(idProducto){
    $('#modalAgregarProducto').modal('show');
}

/*
PedidosPendientes = [
    {
        codigoPedido:1,
        codigoUsuario:1,
        codigoProducto:1,
        cantidad:3,
        total: 100
    },
    {
        codigoPedido:2,
        codigoUsuario:1,
        codigoProducto:3,
        cantidad:5,
        total: 1000
    },
    {
        codigoPedido:3,
        codigoUsuario:1,
        codigoProducto:5,
        cantidad:1,
        total: 120
    }
]
Ordenes = [
    {
        codigoUsuario:1,
        codigoRepartidor:3,
        productos: [
            {
                codigoProducto:1,
                cantidad:3
            },
            {
                codigoProducto:3,
                cantidad:5
            },
            {
                codigoProducto:5,
                cantidad:1
            }

        ],
        total = 20000
    }
]

*/