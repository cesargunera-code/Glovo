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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/material-design-iconic-font.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Clientes</title>
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
                    src="resource/icons/user.svg"></a>
        </li>
    </ul>
    <hr>
    <main>
        <div class="container tab-content">
            <div class="row">
                <div class="col">
                    <nav class="navbar" aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: transparent;">
                            <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                            <li class="breadcrumb-item active"><a>Clientes</a></li>
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
                                    <a class="btn btn-block btn-c1"><i class="zmdi zmdi-plus"></i></a>
                                </div>
                                <div class="col-11 mx-0">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Id</th>
                                    <th>Celular</th>                                    
                                    <th>Targetas</th>
                                    <th>Ubicaciones</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tablaClientes">
                            </tbody>
                        </table>
                        <div class="row justify-content-center" id="restClientes">
                            <button class="btn btn-default btn-lg">
                                <i class="zmdi zmdi-replay zmdi-hc-spin-reverse zmdi-hc-5x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark" style="color: white;"></footer>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>w
    <script src="js/main.js"></script>
    <script src="js/implementos.js"></script>
    <script src="js/controladores/clientes.js"></script>
    <script type="text/javascript">verClientes();</script>
</body>

</html>