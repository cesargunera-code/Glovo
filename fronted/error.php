<?php 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <a class="btn btn-c1 btn-radius my-2 mx-1 py-2 px-3 shadow" data-toggle="modal"
                    data-target="#modalRegistrarse">
                    Registrarse
                </a>
                <a class="btn btn-light btn-radius my-2 mx-1 p-2 shadow" data-toggle="modal"
                data-target="#modalInicioSesion">
                    Iniciar sesion
                </a>
            </div>
        </div>
    </nav>
    <main class="container-fluid p-0 m-0 text-center" background-color: #FFC244>
        <section class="jumbotron m-0  font-1" style="background-color: #FFC244; height: 560px;">
            <!--img class="img-fluid mb-5" src="resource/icons/glovo-logo.svg"-->
            <article class="h1 font-1" style="color:white;" id="title">
                <h1 class="display-1">401</h1><span style="color:#00A082;">Acceso No Autorizado</span>
            </article>
        </section>
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
                                    <input name="emailCliente" id="emailCliente" type="email" class="form-control" placeholder="e-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label p-0">
                                    <i class="zmdi zmdi-lock zmdi-hc-2x" style="color: gray;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input name="passwordCliente" type="password" class="form-control" id="passwordCliente" placeholder="password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-c1 btn-radius" onclick="registrarCliente()">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalInicioSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="title" id="exampleModalLongTitle">Inicio De Sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">
                                    <i class="zmdi zmdi-email zmdi-hc-2x" style="color: black;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="e-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">
                                    <i class="zmdi zmdi-lock zmdi-hc-2x" style="color: black;"></i>
                                </label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="passwordI" placeholder="password">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-radius" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-c1 btn-radius">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>