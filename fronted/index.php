<?php
    require_once('../backend/class/class-login.php');
    require_once('../backend/class/class-database.php');
    $database = new Database();
    $db = $database->getDB();
    if(!Login::verificarAutentificacion($db)){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
    <title>Glovo</title>
</head>
<body>
    <nav class="navbar color-yellow justify-content-between">
        <a class="navbar-brand top" style="color: white;">
            <i class="zmdi zmdi-search zmdi-hc-2x"></i>
            <span class="align-top">¿Que Necesitas?</span>
        </a>
        <div class="form-inline font-1" id="form-navegacion">
        </div>
    </nav>
    <main class="container-fluid p-0 m-0 text-center" background-color: #FFC244>
        <section class="jumbotron m-0  font-1" style="background-color: #FFC244; height: 560px;">
            <img class="img-fluid mb-5" src="resource/icons/glovo-logo.svg">
            <article class="display-4 font-1" style="color:white;" id="title">
                Lo que sea en <span style="color:#00A082;">Tegucigalpa</span><br>
                <small>entrega en unos minutos</small>
            </article>
            <div class="row justify-content-center">
            <div class="container">
                <div class="row justify-content-center" id="menuCategoria">
                    <a class="btn btn-light rounded-circle mx-1 mt-5 px-4 shadow" onclick="verEmpresasXCategoria(4)">
                        <img class="img-fluid" src="resource/img/img-categorias/comida.webp" width="60">
                        <p>Comidas</p>
                    </a>
                    <a class="btn btn-light rounded-circle mx-1 mt-5 px-4 shadow" onclick="verEmpresasXCategoria(3)">
                        <img class="img-fluid" src="resource/img/img-categorias/supermercados.webp" width="60">
                        <p>Super</p>
                    </a>
                    <a class="btn btn-light rounded-circle mx-1 mt-5 px-4 shadow" onclick="verEmpresasXCategoria(2)">
                        <img class="img-fluid" src="resource/img/img-categorias/variedades.webp" width="60">
                        <p>Tiendas</p>
                    </a>
                    <a class="btn btn-light rounded-circle mx-1 mt-5 px-4 shadow" onclick="verEmpresasXCategoria(1)">
                        <img class="img-fluid" src="resource/img/img-categorias/farmacias.webp" width="60">
                        <p>Farmacias</p>
                    </a>
                    <a class="btn btn-light rounded-circle mx-1 mt-5 px-4 shadow" href="express.html">
                        <img class="img-fluid" src="resource/img/img-categorias/domicilios.webp" width="60">
                        <p>Express</p>
                    </a>
                </div>
                <div class="row justify-content-center mt-3" id="restCategoria" style="display: none;">
                    <button class="btn btn-default btn-lg">
                        <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x"
                        style="color:#2abb9b"></i>
                    </button>
                </div>
            </div>
            <div class="container mt-3" id="restCategoria" >
                
            </div>

            </div>
        </section>
        <section class="container-fluid bg-light">
            <div class="row h2 justify-content-center pt-5 pb-0 mb-0">
                <article class="h2 mt-5">
                    Las Ultimas Tendencias En Tu Ciudad
                    <br>
                    <h6 class="text-muted">
                        descubre las tiendas mas famosas y dinos que te llevamos a casa
                    </h6>
                </article>
            </div>
            <div class="row justify-content-center mt-0 mb-5">
                <button class="btn btn-c2" onclick="trasladarScroll(100,0);$('#empresas').empty();"><i class="zmdi zmdi-undo"></i> Volver</button>
            </div>
            <div class="row justify-content-center font-1" id="empresas">
            </div>
        </section>
        <aside class="container-fluid" style="background-color: white;">
            <div class="row" id="app-background">
                <div class="container">
                    <div class="row justify-content-center">
                    <img class="img-fluid" src="resource/img/img-varios/phone.webp" alt="" srcset="">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col">
                            <p class="display-2">Descarga Nuestra App</p>
                            <a><img src="resource/icons/download-apple-store.svg" alt="" srcset=""></a>
                            <a><img src="resource/icons/download-playstore.svg" alt="" srcset=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-10 display-4 text-left">¡Creamos Glovo Juntos!</div>
                <div class="col-10">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="resource/img/img-varios/img-card-1.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Establecimientos asociados</h5>
                                <p class="card-text">Impulsa tu negocio colaborando con nosotros y beneficiate de nuestras herramientas, 
                                    nuestra tecnologia y nuestra base de clientes para tener la ciudad entera a tus pies.</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-c1 btn-radius">Reparte Con Nosotros</button>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="resource/img/img-varios/img-card-2.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Repartidores</h5>
                                <p class="card-text">Se tu propio jefe. Flexibilidad de horarios, ingresos competitivos 
                                    y la oportunidad de conocer tu ciudad repartiendo al aire libre. 
                                    Apuntate y en menos de 24h colabora con nosotros.</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-c1 btn-radius">Colabora Con Nosotros</button>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="resource/img/img-varios/img-card-3.webp" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Establecimientos asociados</h5>
                                <p class="card-text">Creamos un nuevo estilo en un ambito muy competitivo. 
                                    Esto requiere una gran iniciativa, mucho corazon y trabajo equipo. Preparado/a para dar el salto?</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-c1 btn-radius">Unete A Nosotros</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="modal fade bd-example-modal-lg" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  color-blue">
                        <h3 class="title" id="tituloEmpresa ">Productos</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row justify-content-center" id="productos">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>        
        <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="title" id="tituloProducto"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioOrden">
                            <div class="row">
                                <input type="hidden" name="codigoProducto" id="codigoProducto">
                                <div class="col-5  font-1">
                                    <label for="cantidad">Ingrese la cantidad:</label>
                                </div>
                                <div class="col-7">
                                    <input class="form-control" type="text" name="cantidad" id="cantidad" placeholder="cantidad">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-c1 btn-radius" onclick="agregarALaOrden()">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container-fluid px-5 pt-5 bg-dark mt-5" style="color: white;">
    </footer>
    <script src="js/axios.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <script src="js/controladores/clientes.js"></script>
    <script src="js/controladores/ordenes.js"></script>
    <script src="js/implementos.js"></script>
    <script src="js/controladores/empresas.js"></script>
    <script src="js/controladores/productos.js"></script>
    <script src="js/controladores/login.js"></script>
    <script type="text/javascript">
        window.scroll({
            top: 0,
            left: 100,
            behavior: 'smooth'
        });
    </script>
</body>
</html>