<?php
    include ('../class/class-login.php');
    include ('../class/class-database.php');
    $db = new Database();
    if(isset($_GET['accion'])){
        if($_GET['accion']=='login'){
            $login = new  Login($_POST['tipoUsuario'],$_POST['email'],$_POST['password'],$db->getDB());
        }
        if($_GET['accion']=='autentificar'){
            Login::verificarAutentificacion($db->getDB());
        }
        if($_GET['accion']=='privilegios'){
            Login::otorgarPrivilegios($db->getDB());
        }
        if($_GET['accion']=='logout'){
            Login::logout();
        }
    }
    
    
    