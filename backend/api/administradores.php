<?php
header("Content-Type: application/json");
include_once('../class/class-administradores.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $administrador = new Administradores(
            $_POST['codigoAdministrador'],
            $_POST['nombre'],
            $_POST['id'],
            $_POST['correo'],
            $_POST['celular'],
            $_POST['targeta'],
            $_POST['cargo'],
            $_POST['sueldo']
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
        if(isset($_GET['idAdministrador'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $Administrador = new Administradores(
            $_GET['codigoAdministrador'],
            $_PUT['nombre'],
            $_PUT['id'],
            $_PUT['correo'],
            $_PUT['celular'],
            $_PUT['targeta'],
            $_POST['cargo'],
            $_POST['sueldo']
        );
        $Administrador->actualizarAdministrador($cnn,$_GET['idAdministrador']);
    break;
    case 'DELETE':
        Administradores::eliminarAdministrador($cnn,$_GET['idAdministrador']);
    break;
}
?>