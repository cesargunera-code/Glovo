<?php
use function GuzzleHttp\json_decode;
header("Content-Type: application/json");
include_once('../class/class-pedidos.php');
include_once('../class/class-database.php');
$db = new Database();
$cnn = $db->getDB();
switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        
    break;
    case 'GET':
        
    break;
    case 'PUT':
        
    break;
    case 'DELETE':
        
    break;
}
?>