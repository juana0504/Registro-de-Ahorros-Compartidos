<?php
/**
 * Navbar Top - Dashboard
 * Versión mejorada con mejores prácticas de seguridad, accesibilidad y UX
 */

require_once __DIR__ . '/../../helpers/sesion.php';
require_once __DIR__ . '/../../controllers/perfil.php';

// Obtener datos del usuario
$id = $_SESSION['user']['id'];
$usuario = mostrarUsuario($id);

// Saludo dinámico basado en la hora
$hora = (int)date('H');
if ($hora >= 5 && $hora < 12) {
    $saludo = 'Buenos días';
    $saludoIcon = '☀️';
} elseif ($hora >= 12 && $hora < 19) {
    $saludo = 'Buenas tardes';
    $saludoIcon = '🌤️';
} else {
    $saludo = 'Buenas noches';
    $saludoIcon = '🌙';
}

// Avatar del usuario con fallback
$nombreUsuario = htmlspecialchars($usuario['nombre'] ?? '');
$emailUsuario = htmlspecialchars($usuario['email'] ?? '');



// Contar notificaciones sin leer (implementa esta función en tu controlador)
// $notificaciones = contarNotificacionesNoLeidas($id);
$notificaciones = 3; // Temporal - reemplazar con función real

// Generar token CSRF si no existe
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrfToken = $_SESSION['csrf_token'];

// Estado de sesión del usuario
$estadoOnline = true; // Puedes implementar lógica de actividad real
?>

<!-- ESTILOS DEL NAVBAR -->
<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/nav.css">

<!-- NAVBAR PRINCIPAL -->
<nav class="navbar-top" role="navigation" aria-label="Navegación principal">
    <div class="container-fluid">

        <!-- BOTÓN HAMBURGUESA (MÓVIL) -->
        <button 
            class="hamburger-btn" 
            type="button"
            aria-label="Abrir menú de navegación"
            aria-expanded="false"
            aria-controls="sidebar">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

        <!-- SALUDO DINÁMICO / TÍTULO -->
        <div class="navbar-greeting">
            <p class="greeting-text">
                <span class="greeting-icon" aria-hidden="true"><?= $saludoIcon ?></span>
                <?= $saludo ?>
            </p>
            <h1 class="greeting-name">
                <span class="user-name"><?= $nombreUsuario ?></span>
                <span class="greeting-wave" aria-hidden="true">👋</span>
            </h1>
        </div>

        <!-- ACCIONES DEL HEADER -->
        <div class="header-actions">

            <!-- BÚSQUEDA (DESKTOP) -->
            <form 
                action="<?= BASE_URL ?>/buscar" 
                method="GET" 
                class="search-form d-none d-md-flex"
                role="search">
                <div class="search-container">
                    <i class="bi bi-search search-icon" aria-hidden="true"></i>
                    <input
                        type="search"
                        name="q"
                        class="search-input"
                        placeholder="Buscar transacciones, categorías..."
                        aria-label="Buscar en el dashboard"
                        autocomplete="off"
                        maxlength="100">
                    <button 
                        type="button" 
                        class="search-clear" 
                        aria-label="Limpiar búsqueda"
                        style="display: none;">
                        <i class="bi bi-x-circle-fill"></i>
                    </button>
                </div>
            </form>

            <!-- BOTÓN BÚSQUEDA (MÓVIL) -->
            <button 
                class="action-btn mobile-search-btn d-md-none" 
                type="button"
                aria-label="Abrir búsqueda"
                aria-expanded="false"
                aria-controls="mobile-search">
                <i class="bi bi-search"></i>
            </button>

            <!-- NOTIFICACIONES -->
            <div class="notification-wrapper">
                <button 
                    class="action-btn notification-btn" 
                    type="button"
                    aria-label="<?= $notificaciones > 0 ? $notificaciones . ' notificaciones sin leer' : 'Sin notificaciones' ?>"
                    aria-expanded="false"
                    aria-haspopup="menu">
                    <i class="bi bi-bell-fill"></i>
                    <?php if ($notificaciones > 0): ?>
                        <span class="notification-badge" aria-hidden="true">
                            <?= $notificaciones > 99 ? '99+' : $notificaciones ?>
                        </span>
                    <?php endif; ?>
                </button>

                <!-- DROPDOWN DE NOTIFICACIONES -->
                <div class="notification-dropdown" role="menu" aria-label="Notificaciones">
                    <div class="dropdown-header">
                        <h6 class="dropdown-title">Notificaciones</h6>
                        <?php if ($notificaciones > 0): ?>
                            <button class="mark-read-btn" type="button">
                                Marcar todas como leídas
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="notification-list">
                        <?php if ($notificaciones > 0): ?>
                            <!-- Ejemplo de notificación - Reemplazar con datos reales -->
                            <a href="<?= BASE_URL ?>/notificacion/1" class="notification-item unread" role="menuitem">
                                <div class="notification-icon success">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <p class="notification-title">Pago recibido</p>
                                    <p class="notification-text">Se ha registrado un pago de $500.00</p>
                                    <span class="notification-time">Hace 5 minutos</span>
                                </div>
                            </a>

                            <a href="<?= BASE_URL ?>/notificacion/2" class="notification-item" role="menuitem">
                                <div class="notification-icon warning">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <p class="notification-title">Límite de presupuesto</p>
                                    <p class="notification-text">Has alcanzado el 80% del presupuesto mensual</p>
                                    <span class="notification-time">Hace 2 horas</span>
                                </div>
                            </a>

                            <a href="<?= BASE_URL ?>/notificacion/3" class="notification-item" role="menuitem">
                                <div class="notification-icon info">
                                    <i class="bi bi-info-circle-fill"></i>
                                </div>
                                <div class="notification-content">
                                    <p class="notification-title">Nueva función disponible</p>
                                    <p class="notification-text">Ahora puedes exportar reportes a Excel</p>
                                    <span class="notification-time">Ayer</span>
                                </div>
                            </a>
                        <?php else: ?>
                            <div class="notification-empty">
                                <i class="bi bi-bell-slash"></i>
                                <p>No tienes notificaciones</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($notificaciones > 0): ?>
                        <div class="dropdown-footer">
                            <a href="<?= BASE_URL ?>/notificaciones" class="view-all-link">
                                Ver todas las notificaciones
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- MENÚ DE USUARIO -->
            <div class="user-menu-wrapper">
                <button 
                    class="user-avatar-btn" 
                    type="button"
                    aria-label="Menú de usuario"
                    aria-expanded="false"
                    aria-haspopup="menu">
                    <img
                        src="<?= $avatarUrl ?>"
                        class="user-avatar"
                        alt="Avatar de <?= $nombreUsuario ?>"
                        onerror="this.src='https://ui-avatars.com/api/?name=Usuario&size=40&background=94a3b8&color=ffffff'">
                    <span 
                        class="status-indicator <?= $estadoOnline ? 'status-online' : 'status-offline' ?>" 
                        title="<?= $estadoOnline ? 'En línea' : 'Desconectado' ?>"
                        aria-label="Estado: <?= $estadoOnline ? 'En línea' : 'Desconectado' ?>">
                    </span>
                </button>

                <!-- DROPDOWN DEL USUARIO -->
                <div class="user-dropdown" role="menu" aria-label="Menú de usuario">

                    <!-- HEADER CON INFO DEL USUARIO -->
                    <header class="dropdown-header">
                        <img
                            src="<?= $avatarUrl ?>"
                            class="dropdown-avatar"
                            alt="Avatar de <?= $nombreUsuario ?>"
                            onerror="this.src='https://ui-avatars.com/api/?name=Usuario&size=48&background=94a3b8&color=ffffff'">
                        <div class="dropdown-user-info">
                            <div class="dropdown-user-name"><?= $nombreUsuario ?></div>
                            <div class="dropdown-user-email"><?= $emailUsuario ?></div>
                        </div>
                    </header>

                    <div class="dropdown-divider" role="separator"></div>

                    <!-- SECCIÓN: MI CUENTA -->
                    <div class="dropdown-section">
                        <div class="dropdown-section-label">Mi Cuenta</div>
                        
                        <a href="<?= BASE_URL ?>/mi-perfil" class="dropdown-item" role="menuitem">
                            <i class="bi bi-person-circle"></i>
                            <span>Mi Perfil</span>
                            <i class="bi bi-chevron-right item-arrow"></i>
                        </a>

                        <a href="<?= BASE_URL ?>/configuracion" class="dropdown-item" role="menuitem">
                            <i class="bi bi-gear-fill"></i>
                            <span>Configuración</span>
                            <i class="bi bi-chevron-right item-arrow"></i>
                        </a>

                        <a href="<?= BASE_URL ?>/billetera" class="dropdown-item" role="menuitem">
                            <i class="bi bi-wallet2"></i>
                            <span>Mi Billetera</span>
                            <span class="item-badge">$2,450.00</span>
                        </a>
                    </div>

                    <div class="dropdown-divider" role="separator"></div>

                    <!-- SECCIÓN: RECURSOS -->
                    <div class="dropdown-section">
                        <div class="dropdown-section-label">Recursos</div>
                        
                        <a href="<?= BASE_URL ?>/ayuda" class="dropdown-item" role="menuitem">
                            <i class="bi bi-question-circle-fill"></i>
                            <span>Centro de Ayuda</span>
                        </a>

                        <a href="<?= BASE_URL ?>/soporte" class="dropdown-item" role="menuitem">
                            <i class="bi bi-headset"></i>
                            <span>Contactar Soporte</span>
                        </a>

                        <button type="button" class="dropdown-item" role="menuitem" onclick="toggleDarkMode()">
                            <i class="bi bi-moon-stars-fill"></i>
                            <span>Modo Oscuro</span>
                            <div class="toggle-switch">
                                <input type="checkbox" id="darkModeToggle" class="toggle-input">
                                <label for="darkModeToggle" class="toggle-label"></label>
                            </div>
                        </button>
                    </div>

                    <div class="dropdown-divider" role="separator"></div>

                    <!-- CERRAR SESIÓN -->
                    <form action="<?= BASE_URL ?>/cerrar-sesion" method="POST" class="logout-form">
                        <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>">
                        <button type="submit" class="dropdown-item logout-btn" role="menuitem">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Cerrar Sesión</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>

<!-- BÚSQUEDA MÓVIL (EXPANDIBLE) -->
<div class="mobile-search" id="mobile-search" aria-hidden="true">
    <form action="<?= BASE_URL ?>/buscar" method="GET" class="search-form" role="search">
        <div class="search-container">
            <i class="bi bi-search search-icon" aria-hidden="true"></i>
            <input
                type="search"
                name="q"
                class="search-input"
                placeholder="Buscar transacciones, categorías..."
                aria-label="Buscar en el dashboard"
                autocomplete="off"
                maxlength="100">
            <button 
                type="button" 
                class="search-close" 
                aria-label="Cerrar búsqueda">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </form>
</div>

<!-- OVERLAY PARA CERRAR DROPDOWNS -->
<div class="dropdown-overlay" aria-hidden="true"></div>

<!-- SCRIPTS DEL NAVBAR -->
<script src="<?= BASE_URL ?>/public/assets/layouts/js/nav.js"></script>

<script>
// Confirmación antes de cerrar sesión
document.querySelector('.logout-form')?.addEventListener('submit', function(e) {
    if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        e.preventDefault();
    }
});

// Limpiar campo de búsqueda
document.querySelectorAll('.search-input').forEach(input => {
    input.addEventListener('input', function() {
        const clearBtn = this.parentElement.querySelector('.search-clear');
        if (clearBtn) {
            clearBtn.style.display = this.value ? 'flex' : 'none';
        }
    });
});

document.querySelectorAll('.search-clear').forEach(btn => {
    btn.addEventListener('click', function() {
        const input = this.parentElement.querySelector('.search-input');
        if (input) {
            input.value = '';
            input.focus();
            this.style.display = 'none';
        }
    });
});

// Toggle Dark Mode (implementa según tu sistema)
function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    const isDark = document.body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');
    document.getElementById('darkModeToggle').checked = isDark;
}

// Cargar preferencia de tema
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    document.getElementById('darkModeToggle').checked = true;
}
</script>