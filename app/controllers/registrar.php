<?php
require_once __DIR__ . '/../helpers/alert_helper.php';
require_once __DIR__ . '/../models/registrar.php';

//capturamos en ua variable el metodo o solicitud hecha  al servidor
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    
    case 'POST':
        $accion = $_POST['accion'] ?? '';
        if ($accion === 'actualizar') {
            // actualizarUsuario();
        } else {
            registrarUsuario();
        }
        break;

    case 'GET':
        // esta variable captura la accion a realizar
        $accion = $_GET['accion'] ?? '';

        if ($accion === 'eliminar') {
            // esta funcion elimina el proveedor segun su id
            // eliminarUsuario($_GET['id']);
        }

        if (isset($_GET['id'])) {
            // esta funcion llena la tabla con el proveedor segun su id
            // listarUsuarioId($_GET['id']);
        } else {
            // esta funcion llena la tabla con todos los proveedores
            // listarUsuarios();
        }

        break;

    // case 'PUT':

    //     actualizarProveedor();
    //     break;

    // case 'DELETE':
    //     eliminarProveedor();
    //     break;

    default:
        http_response_code(405);
        echo "❌ Método no permitido";
        break;
}

function registrarUsuario(){

    $nombre   =$_POST['nombre'] ?? '';
    $email    =$_POST['email'] ?? '';
    $clave    =$_POST['clave'] ?? '';
    $confirm = $_POST['confirmar_contrasena'] ?? '';

    if (
        empty($nombre) || empty($email) || empty($clave) || empty($confirm)
    ) {
        mostrarSweetAlert('error', 'Campos vacíos', 'Por favor completa todos los campos');
        exit();
    }

    // Validar que las contraseñas coincidan
    if ($clave !== $confirm) {
        mostrarSweetAlert('error', 'Error', 'Las contraseñas no coinciden');
        exit();
    }

    $claveHash = password_hash($clave, PASSWORD_DEFAULT);

    $objUsuario = new Usuario();

    if ($objUsuario->emailUsuarioExiste($email)) {
        mostrarSweetAlert('error', 'Correo duplicado', 'El correo ya existe.');
        exit();
    }

    $data =[
        'nombre'  => $nombre,
        'email'   => $email,
        'clave'   => $claveHash,
    ];

    $resultado = $objUsuario->registrar($data);

    if ($resultado === true) {
        mostrarSweetAlert('success', 'Registro exitoso', 'Proveedor registrado.',  BASE_URL . '/' );
    }else{
        mostrarSweetAlert('error', 'Error al registrar', 'No se pudo registrar el proveedor.');
    }
}