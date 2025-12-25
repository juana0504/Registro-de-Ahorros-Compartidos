<?php
require_once __DIR__ . '/../helpers/alert_helper.php';
require_once __DIR__ . '/../models/login.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $clave = $_POST['contrasena'] ?? '';

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
        'id' => $resultado['id_usuario'],
        'nombre' => $resultado['nombre'],
    ];

    $rendirectUrl = 'registrar_gastos/login.php';
    $mensaje = 'Usuario inexistente. Redirigiendo al inicio de sesión...';
    mostrarSweetAlert(
        'success',
        'Ingreso erroneo',
        $mensaje,
        $redirectUrl
    );

    $redirectUrl2 = '/registro_gastos/dashboard';
    $mensaje2 = 'Bienvenido ' . $resultado['nombre'] . ', has iniciado sesión correctamente.';

    mostrarSweetAlert(
        'success',
        'Ingreso exitoso',
        $mensaje2,
        $redirectUrl2
    );

    exit;
}else{
    http_response_code(405);
    echo "Metodo no permitido";
    exit();
}
