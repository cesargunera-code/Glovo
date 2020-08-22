<?php
header("Content-Type: application/json");
include_once('../class/class-clientes.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $cliente = new Clientes(
            'pendiente',
            $_POST['emailCliente'],
            $_POST['passwordCliente'],
            'pendiente',
            'pendiente',
            'pendiente'
        );
        $cliente->registrarCliente($cnn);
    break;
    case 'GET':
        if(isset($_GET['idCliente'])){
            Clientes::obtenerCliente($cnn,$_GET['idCliente']);
        }else{
            if(isset($_COOKIE['key']) and $_COOKIE['tipoUsuario']=='Cliente'){
                Clientes::obtenerCliente($cnn,$_COOKIE['key']);
            }else{
                Clientes::obtenerClientes($cnn);
            }
        }
    break;
    case 'PUT':
        if(isset($_COOKIE['key'])){
            parse_str(file_get_contents("php://input"),$_PUT);
        }
        $cliente = new Clientes(
            $_PUT['nombreCliente'],
            $_PUT['correoCliente'],
            '',
            $_PUT['identidadCliente'],
            $_PUT['celularCliente'],
            ''
        );
        $cliente->actualizarCliente($cnn,$_COOKIE['key']);
    break;
    case 'DELETE':
        Clientes::eliminarCliente($cnn,$_GET['idCliente']);
    break;
}
?>