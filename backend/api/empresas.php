<?php
header("Content-Type: application/json");
include_once('../class/class-empresas.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $empresa = new Empresas(
            $_POST['codigoCategoria'],
            $_POST['codigoEmpresa'],
            $_POST['nombreEmpresa'],
            $_POST['direccionEmpresa'],
            $_POST['correoEmpresa'],
            $_POST['telefonoEmpresa']
        );
        $empresa->crearEmpresa($cnn);
    break;
    case 'GET':
        if(isset($_GET['idEmpresa'])){//mostrar empresa en especifico
            Empresas::obtenerEmpresa($cnn,$_GET['idEmpresa']);
        }else{
            if(isset($_GET['idCategoria'])){//mostrar empresas pro categoria
                Empresas::obtenerEmpresasPorCategoria($cnn,$_GET['idCategoria']);
            }else{
                Empresas::obtenerEmpresas($cnn);//mostrar todas las empresas
            }
        }
    break;
    case 'PUT':
        $_PUT = array();
        if(isset($_GET['idEmpresa'])){
            parse_str(file_get_contents("php://input"),$_PUT);
            $empresa = new Empresas(
                $_PUT['codigoCategoria'],
                $_GET['idEmpresa'],
                $_PUT['nombreEmpresa'],
                $_PUT['direccionEmpresa'],
                $_PUT['correoEmpresa'],
                $_PUT['telefonoEmpresa']
            );
            $empresa->actualizarEmpresa($db,$_GET['idEmpresa']);
        }
    break;
    case 'DELETE':
        if(isset($_GET['idEmpresa'])){
            Empresas::eliminarEmpresa($cnn,$_GET['idEmpresa']);
        }   
    break;
}
?>