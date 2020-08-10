<?php
header("Content-Type: application/json");
include_once('../class/class-clientes.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $cliente = new Clientes(
            $_POST['codigoCliente'],
            $_POST['nombre'],
            $_POST['id'],
            $_POST['correo'],
            $_POST['celular'],
            $_POST['targeta']
        );
        $cliente->crearCliente($cnn);
    break;
    case 'GET':
        if(isset($_GET['idCliente'])){
            Clientes::obtenerCliente($cnn,$_GET['idCliente']);
        }else{
            Clientes::obtenerClientes($cnn);
        }
    break;
    case 'PUT':
        if(isset($_GET['idCliente'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $cliente = new Clientes(
            $_GET['codigoCliente'],
            $_PUT['nombre'],
            $_PUT['id'],
            $_PUT['correo'],
            $_PUT['celular'],
            $_PUT['targeta']
        );
        $cliente->actualizarCliente($cnn,$_GET['idCliente']);
    break;
    case 'DELETE':
        Clientes::eliminarCliente($cnn,$_GET['idCliente']);
    break;
}
?>