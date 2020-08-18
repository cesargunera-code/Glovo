<?php
    require_once('../backend/class/class-usuarios.php');
    require_once('../backend/class/class-database.php');
    $database = new Database();
    $db = $database->getDB();
    if(!Usuarios::verificarAutentificacion($db)){
        header("Location: error.php");
    }
?>