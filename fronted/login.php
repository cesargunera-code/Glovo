
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--frameworks-->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Glovo</title>
</head>

<body>
    <nav class="navbar color-yellow justify-content-between">
        <a>
        </a>
        <div class="form-inline">
            <div class="form-row font-1">
                <a class="btn btn-c1 btn-radius my-2 mx-1 py-2 px-3 shadow" data-toggle="modal" data-target="#modalRegistrarse">
                    Registrarse
                </a>
                <a class="btn btn-light btn-radius my-2 mx-1 p-2 shadow" data-toggle="modal" data-target="#modalInicioSesion">
                    Iniciar sesion
                </a>
            </div>
        </div>
    </nav>
    <main class="container-fluid p-0 m-0 text-center" background-color: #FFC244>
        <section class="jumbotron m-0  font-1" style="background-color: #FFC244; height: 560px;">
            <img class="img-fluid mb-5" src="resource/icons/glovo-logo.svg">
            <article class="display-4 font-1" style="color:white;" id="title">
                Lo que sea en <span style="color:#00A082;">Tegucigalpa</span><br>
                <small>entrega en unos minutos</small>
            </article>

        </section>
        <section class="container-fluid bg-light">
            <div class="row h2 justify-content-center pt-5 pb-0 mb-0">
            </div>
            <div class="row justify-content-center font-1" id="empresas">
            </div>
        </section>
        <aside class="container-fluid" style="background-color: white;">
            <div class="row" id="app-background">
                <img class="img-fluid" src="resource/img/img-varios/phone.webp" alt="" srcset="">
                <div class="container">
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
        <div class="modal fade" id="modalRegistrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="title" id="exampleModalLongTitle">Registrate En Glovo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioCliente">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label p-0">
                                    <i class="zmdi zmdi-email zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input autocomplete="off" name="emailCliente" id="emailCliente" type="email" class="form-control" placeholder="e-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label p-0">
                                    <i class="zmdi zmdi-lock zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10 passwordField">
                                    <input name="passwordCliente" type="password" class="form-control" id="passwordCliente" placeholder="password">
                                    <small id="emailHelp" class="form-text text-muted">La contraseña debe tener al menos 4 caracteres.</small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cerrar</button>
                        <button id="registerButton" type="button" class="btn btn-c1 btn-radius" onclick="registrarCliente()">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalInicioSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="title" id="exampleModalLongTitle">Inicio De Sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioLogin">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2">
                                    <i class="zmdi zmdi-accounts zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="tipoUsuario" id="tipoUsuario">
                                        <option value="Clientes">Cliente</option>
                                        <option value="Repartidores">Repartidor</option>
                                        <option value="Administradores">Administrador</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">
                                    <i class="zmdi zmdi-email zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" placeholder="e-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">
                                    <i class="zmdi zmdi-lock zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="passwordI" placeholder="password">
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-center mt-3" id="restLogin" style="display: none;">
                            <button class="btn btn-default btn-lg">
                                <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x" style="color:#FFC244"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-c1 btn-radius" id="btn-login">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container-fluid px-5 pt-5 bg-dark mt-5" style="color: white;">
    </footer>
    <!--frameworks-->
    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!--controladores-->
    <script src="js/implementos.js"></script>
    <script src="js/controladores/empresas.js"></script>
    <script src="js/controladores/productos.js"></script>
    <script src="js/controladores/clientes.js"></script>
    <script src="js/controladores/ordenes.js"></script>
    <script src="js/controladores/login.js"></script>
    <script src="js/controladores/validacion.js"></script>
    <script type="text/javascript">
        window.scroll({
            top: 0,
            left: 100,
            behavior: 'smooth'
        });
    </script>
</body>

</html>