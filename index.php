<?php
//index.php - Router principal en larabel se tiene un archivo por cada carpeta de views

require_once __DIR__ . '/config/config.php';

$requestUri = $_SERVER['REQUEST_URI']; //OBTENER LA URI ACTUAL (por ejemplo: aventura_go/login)

$request = str_replace('/registro_gastos', '', $requestUri); //Quitar el prefijo de la carpeta del proyecto

$request = strtok($request, '?'); //Quitar parametros tipo ?id=123

$request = rtrim($request, '/'); //Quitar la barra final (si existe)

if ($request === '') $request = '/'; //si la ruta queda vacia, se interpreta como "/"

//ENRUTAMIENTO BASICO
switch ($request) {

    // ===================================================================================================
    //                                      RUTAS TURISTA (USUARIO)
    // ===================================================================================================
    case '/':
        require BASE_PATH . '/app/views/website/index.php';
    break;
    case '/iniciar-sesion':
        require BASE_PATH . '/app/controllers/login.php';
    break;
    
    case '/dasboard':
        require BASE_PATH . '/app/views/dasboard/inicio.php';
    break;


}
