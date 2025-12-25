<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahorros Ya - Controla tus finanzas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/website/css/styles.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-white/80 backdrop-blur-md shadow-sm z-40">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent">
                    Ahorros Ya
                </span>
            </div>
            <div class="flex gap-3">
                <button onclick="showLoginModal()" class="px-5 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition">
                    Iniciar Sesión
                </button>
                <button onclick="showRegisterModal()" class="px-5 py-2 bg-gradient-to-r from-blue-600 to-green-600 text-white font-medium rounded-lg hover:shadow-lg transition transform hover:scale-105">
                    Registrarse
                </button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                Controla tus <span class="bg-gradient-to-r from-blue-600 to-green-600 bg-clip-text text-transparent">ahorros</span> y <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">gastos</span>
            </h1>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                La forma más inteligente de administrar tu dinero. Ahorra más, gasta mejor y alcanza tus metas financieras.
            </p>
            <button onclick="showRegisterModal()" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-green-600 text-white text-lg font-semibold rounded-xl hover:shadow-2xl transition transform hover:scale-105">
                Comienza Gratis Ahora
            </button>
            
            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 mt-16 max-w-3xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600">100%</div>
                    <div class="text-gray-600 mt-1">Gratis</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">Seguro</div>
                    <div class="text-gray-600 mt-1">Tus datos protegidos</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-600">Fácil</div>
                    <div class="text-gray-600 mt-1">Uso intuitivo</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">
                Todo lo que necesitas para ahorrar
            </h2>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="text-center p-8 rounded-2xl hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Seguimiento Inteligente</h3>
                    <p class="text-gray-600">
                        Visualiza tus gastos e ingresos en tiempo real con gráficos claros y detallados.
                    </p>
                </div>
                
                <div class="text-center p-8 rounded-2xl hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Metas de Ahorro</h3>
                    <p class="text-gray-600">
                        Define objetivos y alcanza tus sueños financieros más rápido de lo que imaginas.
                    </p>
                </div>
                
                <div class="text-center p-8 rounded-2xl hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Datos Seguros</h3>
                    <p class="text-gray-600">
                        Tu información financiera protegida con los más altos estándares de seguridad.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Final -->
    <section class="py-20 px-6 bg-gradient-to-r from-blue-600 to-green-600 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">
                ¿Listo para transformar tus finanzas?
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Únete hoy y comienza tu camino hacia la libertad financiera
            </p>
            <button onclick="showRegisterModal()" class="px-8 py-4 bg-white text-blue-600 text-lg font-semibold rounded-xl hover:shadow-2xl transition transform hover:scale-105">
                Crear Cuenta Gratis
            </button>
        </div>
    </section>


<!-- --------------ESTO ES EL LOGIN POR MEDIO DEL JS HACIENDO COMO ALERTA O ALGO ASI YO ME ENTIENDO-------------------- -->
    <!-- Login Modal -->
    <?php
    include_once __DIR__ . '/../auth/login.php'
    ?>

<!-- lo mismo qe lo de arriba pero esto es el de registrar   -->
    <!-- Register Modal -->
    <?php
    include_once __DIR__ . '/../layouts/registro.php'
    ?>
    <script src="<?= BASE_URL ?>/public/assets/website/js/script.js"></script>
</body>
</html>