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


    // Esto es la cosa de los enrutamientos, si no encuentra ninguna de las rutas anteriores
    case '/inicio':
        require BASE_PATH . '/app/views/dashboard/inicio.php';
    break;

    case '/billetera':
        require BASE_PATH . '/app/views/dashboard/wallet.php';
    break;

    case '/transacciones':
        require BASE_PATH . '/app/views/dashboard/transacciones.php';
    break;

    default:
        // Página no encontrada
        http_response_code(404);
        echo "404 - Página no encontrada";
}
