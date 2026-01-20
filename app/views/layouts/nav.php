<?php

require_once __DIR__ . '/../../helpers/sesion.php';
require_once __DIR__ . '/../../controllers/perfil.php';

$id = $_SESSION['user']['id'];

$usuario = mostrarUsuario($id);

?>

<!-- HEADER -->
<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/nav.css">

<nav class="navbar-top">
    <div class="container-fluid">

        <!-- BOTÓN HAMBURGUESA (MÓVIL) -->
        <button class="hamburger-btn" aria-label="Abrir menú">
            <i class="bi bi-list"></i>
        </button>

        <!-- SALUDO / TÍTULO -->
        <div class="navbar-greeting">
            <p class="greeting-text">Buenos días</p>
            <h5 class="greeting-name">
                <span><?= $usuario['nombre'] ?></span>
                <span class="greeting-wave">👋</span>
            </h5>
        </div>

        <!-- ACCIONES DEL HEADER -->
        <div class="header-actions">

            <!-- BÚSQUEDA (DESKTOP) -->
            <div class="search-container d-none d-md-block">
                <i class="bi bi-search search-icon"></i>
                <input
                    type="search"
                    class="search-input"
                    placeholder="Buscar transacciones, categorías..."
                    aria-label="Buscar en el dashboard">
            </div>

            <!-- BOTÓN BÚSQUEDA (MÓVIL) -->
            <button class="action-btn mobile-search-btn d-md-none" aria-label="Buscar">
                <i class="bi bi-search"></i>
            </button>

            <!-- NOTIFICACIONES -->
            <button class="action-btn notification-btn" aria-label="Notificaciones">
                <i class="bi bi-bell-fill"></i>
                <span class="notification-count">3</span>
            </button>

            <!-- AVATAR DE USUARIO CON DROPDOWN -->
            <div class="user-avatar-container">
                <img
                    src="https://i.pravatar.cc/40?img=47"
                    class="user-avatar"
                    alt="Avatar de usuario"
                    role="button"
                    tabindex="0"
                    aria-label="Menú de usuario">
                <span class="status-indicator" title="En línea"></span>

                <!-- DROPDOWN DEL USUARIO -->
                <div class="user-dropdown" role="menu" aria-label="Menú de usuario">

                    <header class="dropdown-header">
                        <div class="dropdown-user-name"><?= htmlspecialchars($usuario['nombre']) ?></div>
                        <div class="dropdown-user-email"><?= htmlspecialchars($usuario['email']) ?></div>
                    </header>

                    <a href="<?= BASE_URL ?>/mi-perfil" class="dropdown-item" role="menuitem">
                        <i class="bi bi-person-circle"></i>
                        <span>Mi Perfil</span>
                    </a>

                    <a href="<?= BASE_URL ?>/configuracion" class="dropdown-item" role="menuitem">
                        <i class="bi bi-gear-fill"></i>
                        <span>Configuración</span>
                    </a>

                    <a href="<?= BASE_URL ?>/billetera" class="dropdown-item" role="menuitem">
                        <i class="bi bi-wallet2"></i>
                        <span>Mi Billetera</span>
                    </a>

                    <div class="dropdown-divider" role="separator"></div>

                    <a href="<?= BASE_URL ?>/ayuda" class="dropdown-item" role="menuitem">
                        <i class="bi bi-question-circle-fill"></i>
                        <span>Centro de Ayuda</span>
                    </a>

                    <div class="dropdown-divider" role="separator"></div>

                    <form action="<?= BASE_URL ?>/cerrar-sesion" method="POST">
                        <button type="submit" class="dropdown-item logout" role="menuitem">
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
<div class="mobile-search">
    <div class="search-container">
        <i class="bi bi-search search-icon"></i>
        <input
            type="search"
            class="search-input"
            placeholder="Buscar..."
            aria-label="Buscar en el dashboard">
    </div>
</div>
<script src="<?= BASE_URL ?>/public/assets/layouts/js/nav.js"></script>