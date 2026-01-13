<?php
require_once __DIR__ . '/../models/perfil.php';
require_once __DIR__ . '/../helpers/sesion.php';

function mostrarUsuario($id){
    $objusuario = new Usuario();
    $usuario = $objusuario->mostrarUsuario($id);

    return $usuario;
}
?>