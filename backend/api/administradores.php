<?php
header("Content-Type: application/json");
include_once('../class/class-administradores.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $administrador = new Administradores(
            'null',
            $_POST['nombreAdministrador'],
            $_POST['correoAdministrador'],
            $_POST['passwordAdministrador'],
            $_POST['identidadAdministrador'],
            $_POST['direccionAdministrador'],
            $_POST['celularAdministrador'],
            $_POST['cargoAdministrador'],
            $_POST['sueldoAdministrador']
        );
        $administrador->crearAdministrador($cnn);
    break;
    case 'GET':
        if(isset($_GET['idAdministrador'])){
            Administradores::obtenerAdministrador($cnn,$_GET['idAdministrador']);
        }else{
            Administradores::obtenerAdministradores($cnn);
        }
    break;
    case 'PUT':
        $_PUT=array();
        if(isset($_GET['idAdministrador'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $Administrador = new Administradores(
            $_PUT['codigoAdministrador'],
            $_PUT['nombreAdministrador'],
            $_PUT['correoAdministrador'],
            $_PUT['passwordAdministrador'],
            $_PUT['identidadAdministrador'],
            $_PUT['direccionAdministrador'],
            $_PUT['celularAdministrador'],
            $_PUT['cargoAdministrador'],
            $_PUT['sueldoAdministrador']
        );
        $Administrador->actualizarAdministrador($cnn,$_GET['idAdministrador']);
    break;
    case 'DELETE':
        Administradores::eliminarAdministrador($cnn,$_GET['idAdministrador']);
    break;
}
?>