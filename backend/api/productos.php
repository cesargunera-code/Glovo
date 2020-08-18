<?php
header("Content-Type: application/json");
include_once('../class/class-productos.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $producto = new Productos(
            'null',
            $_POST['codigoEmpresa'],
            $_POST['nombreProducto'],
            $_POST['descripcionProducto'],
            $_POST['imagenProducto'],
            $_POST['precioProducto']
        );
        $producto->crearProducto($cnn);
    break;
    case 'GET':
        if(isset($_GET['idProducto'])){
            Productos::obtenerProducto($cnn,$_GET['idProducto']);
        }else{
            if(isset($_GET['idEmpresa'])){  
                Productos::obtenerProductosXEmpresa($cnn,$_GET['idEmpresa']);
            }else{
                Productos::obtenerProductos($cnn);
            }
        }
    break;
    case 'PUT':
        if(isset($_GET['idProducto'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $producto = new Productos(
            $_PUT['codigoProducto'],
            $_PUT['codigoEmpresa'],
            $_PUT['nombreProducto'],
            $_PUT['descripcionProducto'],
            $_PUT['imagenProducto'],
            $_PUT['precioProducto']
        );
        $producto->actualizarProducto($cnn,$_GET['idProducto']);
    break;
    case 'DELETE':
        Productos::eliminarProducto($cnn,$_GET['idProducto']);
    break;
}
?>