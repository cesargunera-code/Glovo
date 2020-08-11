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
            $_POST['nombreRepartidor'],
            $_POST['identidadRepartidor'],
            $_POST['correoRepartidor'],
            $_POST['direccionRepartidor'],
            $_POST['celularRepartidor'],
            $_POST['zonaRepartidor'],
            $_POST['transporteRepartidor'],
            $_POST['sueldoRepartidor']
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
        $_PUT = array();
        if(isset($_GET['idRepartidor'])){
            parse_str(file_get_contents("php://input"),$_PUT);
            $repartidor = new Repartidores(
                $_PUT['codigoRepartidor'],
                $_PUT['nombreRepartidor'],
                $_PUT['identidadRepartidor'],
                $_PUT['correoRepartidor'],
                $_PUT['direccionRepartidor'],
                $_PUT['celularRepartidor'],
                $_PUT['zonaRepartidor'],
                $_PUT['transporteRepartidor'],
                $_PUT['sueldoRepartidor']
            );
            $repartidor->actualizarRepartidor($cnn,$_GET['idRepartidor']);
        }
    break;
    case 'DELETE':
        Repartidores::eliminarRepartidor($cnn,$_GET['idRepartidor']);
    break;
}
?>