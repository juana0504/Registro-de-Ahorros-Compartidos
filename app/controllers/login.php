<?php
require_once __DIR__ . '/../helpers/alert_helper.php';
require_once __DIR__ . '/../models/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $clave = $_POST['clave'] ?? '';

    if (empty($email) || empty($clave)) {
        mostrarSweetAlert('error', 'Campos vacios', 'Por favor completar todos los campos');
        exit();
    }

    $login = new Login();
    $resultado = $login->autenticar($email, $clave);

    if (isset($resultado['error'])) {
        mostrarSweetAlert('error', 'Error de autenticacion', $resultado['error']);
        exit();
    }

    session_start();
    $_SESSION['user'] = [
        'email' => $resultado['id_usuario'],
        'clave' => $resultado['nombre'],
    ];

    mostrarSweetAlert(
        'success',
        'Ingreso exitoso',
        'Bienvenido ' . $resultado['nombre'],
        BASE_URL . '/dashboard'
    );

    exit();

}else{
    http_response_code(405);
    echo "Metodo no permitido";
    exit();
}
