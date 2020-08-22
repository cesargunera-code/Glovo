<?php 
    require_once('../backend/class/class-login.php');
    require_once('../backend/class/class-database.php');
    $database = new Database();
    $db = $database->getDB();
    if(!Login::verificarAutentificacion($db) or $_COOKIE['tipoUsuario']!='Administradores'){
        header("Location: error.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Socios</title>
</head>

<body class="container-fluid p-0">
    <nav class="navbar justify-content-between mt-4">
        <a class="navbar-brand top" style="color: white;">
            <img src="resource/icons/glovo-logo-2.svg" class="img-fluid" width="130px">
        </a>
    </nav>
    <hr>
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link active" id="tab-cliente" data-toggle="tab" href="#cliente" role="tab"
                aria-controls="cliente" aria-selected="true"><img class="img-fluid" width="10%"
                    src="resource/icons/socios.svg"></a>
        </li>
    </ul>
    <hr>
    <main>
        <div class="container tab-content">
            <div class="row">
                <div class="col">
                    <nav class="navbar" aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: transparent;">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active"><a>Socios</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col">
                    <div class="tab-pane active" id="cliente" role="tabpanel" aria-labelledby="tab-cliente">
                        <div class="container mb-3">
                            <div class="row">
                                <div class="col-1 mx-0">
                                    <a class="btn btn-block btn-c1" data-toggle="modal"
                                        data-target="#modalAgregarEmpresa" onclick="intercalarBotones(false);">
                                        <i class="zmdi zmdi-plus"></i>
                                    </a>
                                </div>
                                <div class="col-11 mx-0">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Productos</th>
                                    <th scope="col">Actualizar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tablaEmpresas">

                            </tbody>
                        </table>
                        <div class="row justify-content-center" id="restEmpresas">
                            <button class="btn btn-default btn-lg">
                                <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <div class="modal fade" id="modalAgregarEmpresa" tabindex="-1" role="dialog"    
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header color-blue">
                    <h5 class="modal-title" id="tituloEmpresa">Agregar Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idEmpresa">
                    <form id="formularioEmpresa">
                        <input type="hidden" name="codigoEmpresa" id="codigoEmpresa">
                        <div class="form-group">
                            <label for="categoriaEmpresa">Categoria</label>
                            <select name="codigoCategoria" id="categoriaEmpresa" class="form-control">
                                <option value="1">Farmacias</option>
                                <option value="2">Tiendas</option>
                                <option value="3">Super</option>
                                <option value="4">Restaurantes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombreEmpresa">Nombre:</label>
                            <input name="nombreEmpresa" id="nombreEmpresa" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="correoEmpresa">Correo</label>
                            <input name="correoEmpresa" id="correoEmpresa" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccionEmpresa">Direccion</label>
                            <input name="direccionEmpresa" id="direccionEmpresa" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefonoEmpresa">Telefono</label>
                            <input name="telefonoEmpresa" id="telefonoEmpresa" type="text" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="cre-btn" type="button" class="btn btn-c1" onclick="crearEmpresa()">Agregar</button>
                    <button id="act-btn" type="button" class="btn btn-c1"
                        onclick="actualizarEmpresa($('#idEmpresa').val())">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header color-blue">
                    <h5 class="modal-title" id="exampleModalLongTitle">PRODUCTOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-2 mx-0">
                                <a class="btn btn-block btn-c1" data-toggle="modal" data-target="#modalAgregarProductos" 
                                onclick="intercalarBotonesP(false)">
                                    <i class="zmdi zmdi-plus"></i>
                                </a>
                            </div>
                            <div class="col-10 mx-0">
                                <input type="text" class="form-control" placeholder="Buscar">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col">
                                <table class="table table-hover text-center mx-0 px-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Actualizar</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tablaProductos">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="modalAgregarProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header color-blue">
                    <h5 class="modal-title" id="tituloProducto">agregar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--indice del objeto-->
                    <input type="hidden" name="idProducto" id="idProducto"> 
                    <form class="mx-0" id="formularioProducto">
                        <input type="hidden" name="codigoProducto" id="codigoProducto">
                        <input type="hidden" name="codigoEmpresa" id="codigoEmpresaP"> 
                        <div class="form-row justify-content-center mb-2">
                            <div class="col-6">
                                <label for="tipoImagen"> Tipo Imagen:</label>
                                <select class="form-control name="tipoImagen" id="tipoImagen" onchange="mostrarListaImagenes()">
                                    <option value="4">Comida</option>
                                    <option value="1">Farmacia</option>
                                    <option value="2">Tienda</option>
                                    <option value="3">Super</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="imagenProducto">Imagen:</label>
                                <select class="form-control" name="imagenProducto" id="imagenProducto">

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                                <label for="nombreProducto">Nombre Del Producto:</label>
                                <input name="nombreProducto" type="text" class="form-control" id="nombreProducto"
                                    placeholder="Nombre" required>
                        </div>
                        <div class="form-row">
                                <label for="precioProducto">Precio:</label>
                                <input name="precioProducto" type="text" class="form-control" id="precioProducto"
                                    placeholder="Precio" required>
                        </div>
                        <div class="form-row mx-0">
                                <label for="descripcionProducto">Descripcion:</label>
                                <textarea name="descripcionProducto" type="text" class="form-control" id="descripcionProducto"
                                    placeholder="Descripcion" required rows="5"></textarea>
                        </div>
                    </form> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="cre-btn-2" type="button" class="btn btn-c1" onclick="crearProducto()"
                    data-focus="modal" data-target="#modalProductos">Agregar</button>
                    <button id="act-btn-2" type="button" class="btn btn-c1" 
                    onclick="actualizarProducto($('#idProducto').val(),$('#codigoEmpresaP').val())">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark" style="color: white;"></footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="js/controladores/empresas.js"></script>
    <script src="js/controladores/productos.js"></script>
    <script src="js/implementos.js"></script>
    <script src="js/controladores/validacion.js"></script>
    <script type="text/javascript">verEmpresas(); mostrarListaImagenes()</script>
</body>

</html>