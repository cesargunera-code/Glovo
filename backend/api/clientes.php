<?php
header("Content-Type: application/json");
include_once('../class/class-clientes.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        if(isset($_GET['accion']) && $_GET['accion']=='login'){
            Clientes::login($_POST['tipoUsuario'],$_POST['email'],$_POST['password'],$cnn);
        }else{
            $cliente = new Clientes(
                'pendiente',
                $_POST['emailCliente'],
                $_POST['passwordCliente'],
                'pendiente',
                'pendiente',
                'pendiente'
            );
            $cliente->registrarCliente($cnn);
        }
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
            $_PUT['nombreCliente'],
            $_PUT['emailCliente'],
            $_PUT['passwordCliente'],
            $_PUT['identidadCliente'],
            $_PUT['celularCliente'],
            $_PUT['tarjetaCliente']
        );
        $cliente->actualizarCliente($cnn,$_GET['idCliente']);
    break;
    case 'DELETE':
        Clientes::eliminarCliente($cnn,$_GET['idCliente']);
    break;
}
?>