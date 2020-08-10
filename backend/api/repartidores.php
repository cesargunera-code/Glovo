<?php
header("Content-Type: application/json");
include_once('../class/class-repartidores.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $repartidor = new Repartidores(
            $_POST['codigoRepartidor'],
            $_POST['nombre'],
            $_POST['id'],
            $_POST['correo'],
            $_POST['celular'],
            $_POST['targeta'],
            $_POST['cargo'],
            $_POST['sueldo']
        );
        $repartidor->crearRepartidor($cnn);
    break;
    case 'GET':
        if(isset($_GET['idRepartidor'])){
            Repartidores::obtenerRepartidor($cnn,$_GET['idRepartidor']);
        }else{
            Repartidores::obtenerRepartidores($cnn);
        }
    break;
    case 'PUT':
        if(isset($_GET['idRepartidor'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $Repartidor = new Repartidores(
            $_GET['codigoRepartidor'],
            $_PUT['nombre'],
            $_PUT['id'],
            $_PUT['correo'],
            $_PUT['celular'],
            $_PUT['targeta'],
            $_POST['cargo'],
            $_POST['sueldo']
        );
        $Repartidor->actualizarRepartidor($cnn,$_GET['idRepartidor']);
    break;
    case 'DELETE':
        Repartidores::eliminarRepartidor($cnn,$_GET['idRepartidor']);
    break;
}
?>