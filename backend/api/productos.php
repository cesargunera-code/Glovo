<?php
header("Content-Type: application/json");
include_once('../class/class-productos.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $producto = new Productos(
            $_POST['codigoProducto'],
            $_POST['codigoEmpresa'],
            $_POST['nombreProducto'],
            $_POST['descripcion'],
            $_POST['precio']
        );
        $producto->crearProducto($cnn);
    break;
    case 'GET':
        if(isset($_GET['idEmpresa']) && $_GET['idProducto']){
            Productos::obtenerProductoXEmpresa($cnn,$_GET['idEmpresa'],$_GET['idProducto']);
        }else{
            if(isset($_GET['idEmpresa'])){
                Productos::obtenerProductosXEmpresa($cnn,$_GET['idEmpresa']);
            }
        }
    break;
    case 'PUT':
        if(isset($_GET['idProducto'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $producto = new Productos(
            $_GET['idProducto'],
            $_PUT['codigoEmpresa'],
            $_PUT['nombreProducto'],
            $_PUT['descripcion'],
            $_PUT['precio']
        );
        $producto->actualizarProducto($cnn,$_GET['idProducto']);
    break;
    case 'DELETE':
        Productos::eliminarProducto($cnn,$_GET['idEmpresa']);
    break;
}
?>