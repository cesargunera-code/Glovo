<?php
use function GuzzleHttp\json_decode;
header("Content-Type: application/json");
include_once('../class/class-ordenes.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $orden = new Ordenes(
            $_COOKIE['key'],
            $_POST['codigoProducto'],
            $_POST['cantidad'],
            false,
            false
            );
        $orden->crearOrden($cnn);
    break;
    case 'GET':
        if(isset($_COOKIE['key'])){
            Ordenes::obtenerOrdenes($_COOKIE['key'],$cnn);
        }
    break;
    case 'PUT':
        
    break;
    case 'DELETE':
        Ordenes::eliminarOrden($_POST['idOrden'],$cnn);
    break;
}
?>