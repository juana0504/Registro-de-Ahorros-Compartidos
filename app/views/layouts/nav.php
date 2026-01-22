<?php
// Obtener el ID del usuario desde la sesión
$id = $_SESSION['id_usuario'] ?? '';
// Cargar el modelo de perfil y obtener los datos del usuario
require_once __DIR__ . '/../../controllers/perfil.php';

$usuario = mostrarUsuario($id);

?>

<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/nav.css">

<!-- NAVBAR SUPERIOR -->
<nav class="navbar-superior" role="navigation" aria-label="Navegación principal">
    <!-- Info Veterinaria -->
    <div class="info-veterinaria">
        <i class="bi bi-hospital" aria-hidden="true"></i>
        <span class="nombre-veterinaria"></span>
    </div>

    <!-- Buscador -->
    <div class="navbar-centro">
        <div class="buscador-avanzado" role="search">
            <label for="inputBusqueda" class="sr-only">Buscar</label>
            <i class="bi bi-search icono-buscar" aria-hidden="true"></i>
            <input
                type="search"
                placeholder="Buscar mascotas, citas, servicios..."
                class="input-buscar"
                id="inputBusqueda"
                autocomplete="off"
                aria-label="Buscar mascotas, citas o servicios">
        </div>
    </div>

    <!-- Acciones -->
    <div class="navbar-derecha">
        <!-- Notificaciones -->
        <button 
            class="btn-navbar notificaciones" 
            data-dropdown="notificaciones"
            aria-label="Notificaciones"
            aria-haspopup="true"
            aria-expanded="false">
            <i class="bi bi-bell-fill" aria-hidden="true"></i>
            <span class="badge-notif" id="badgeNotificaciones" aria-label="3 notificaciones sin leer">3</span>
        </button>

        <!-- Dropdown Notificaciones -->
        <div 
            class="dropdown-menu dropdown-notificaciones" 
            id="dropdownNotificaciones"
            role="menu"
            aria-labelledby="notificaciones">
            <div class="dropdown-header">
                <h6>Notificaciones</h6>
                <button class="btn-marcar-leidas" data-action="marcar-leidas">
                    Marcar todas como leídas
                </button>
            </div>
            <div class="dropdown-body" id="listaNotificaciones">
                <!-- Se cargan dinámicamente -->
                <div class="loading-notificaciones">
                    <div class="spinner"></div>
                    <p>Cargando notificaciones...</p>
                </div>
            </div>
            <div class="dropdown-footer">
                <a href="<?= BASE_URL ?>/notificaciones" class="btn-ver-todas">
                    Ver todas las notificaciones
                </a>
            </div>
        </div>

        <!-- Carrito -->
        <button 
            class="btn-navbar tienda" 
            aria-label="Carrito de compras"
            data-action="toggle-carrito">
            <i class="bi bi-cart-fill" aria-hidden="true"></i>
            <span id="contadorCarrito" class="badge-notif" style="display: none;">0</span>
        </button>

        <!-- Carrito Sidebar -->
        <aside 
            id="carritoSidebar" 
            class="carrito-sidebar"
            role="complementary"
            aria-label="Carrito de compras">
            <div class="carrito-header">
                <h3>Mi Carrito</h3>
                <button 
                    data-action="toggle-carrito" 
                    class="cerrar-btn"
                    aria-label="Cerrar carrito">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div id="carritoItems" class="carrito-items">
                <div class="carrito-vacio">
                    <i class="bi bi-cart-x"></i>
                    <p>Tu carrito está vacío</p>
                </div>
            </div>

            <div class="carrito-footer">
                <p>Total: <span id="totalCarrito">$0</span></p>
                <button class="btn-pagar" disabled>Proceder al pago</button>
            </div>
        </aside>

        <!-- Separador -->
        <div class="navbar-separador" role="separator"></div>

        <!-- Perfil usuario -->
        <button 
            class="btn-perfil" 
            data-dropdown="perfil"
            aria-label="Menú de perfil"
            aria-haspopup="true"
            aria-expanded="false">
            <div class="avatar-usuario">
                <img 
                    src="<?= BASE_URL ?>/public/uploads/<?= $usuario['img_perfil'] ?>" 
                    alt="Foto de perfil de <?= $usuario['nombre'] ?>"
                    onerror="this.src='<?= BASE_URL ?>/public/uploads/eje.png'">
            </div>
            <div class="info-usuario">
                <span class="nombre-usuario">
                    <?= $usuario['nombre'] ?>
                </span>
            </div>
            <i class="bi bi-chevron-down flecha-perfil" aria-hidden="true"></i>
        </button>

        <!-- Dropdown Perfil -->
        <div 
            class="dropdown-menu dropdown-perfil" 
            id="dropdownPerfil"
            role="menu">
            <div class="perfil-header">
                <div class="avatar-usuario grande">
                    <img 
                        src="<?= BASE_URL ?>/public/uploads/<?= $usuario['img_perfil'] ?>" 
                        alt="Avatar"
                        onerror="this.src='<?= BASE_URL ?>/public/uploads/eje.png'">
                </div>
                <div>
                    <p class="nombre-completo">
                        <?= $usuario['nombre'] ?>
                    </p>
                    <p class="email-usuario"><?= $usuario['email'] ?></p>
                </div>
            </div>
            
            <div class="dropdown-divider" role="separator"></div>
            
            <a href="<?= BASE_URL ?>/perfil" class="dropdown-item" role="menuitem">
                <i class="bi bi-person-fill" aria-hidden="true"></i>
                <span>Mi Perfil</span>
            </a>
            <a href="<?= BASE_URL ?>/mascotas" class="dropdown-item" role="menuitem">
                <i class="bi bi-heart-pulse-fill" aria-hidden="true"></i>
                <span>Mis Mascotas</span>
            </a>
            <a href="<?= BASE_URL ?>/citas" class="dropdown-item" role="menuitem">
                <i class="bi bi-calendar-check-fill" aria-hidden="true"></i>
                <span>Mis Citas</span>
                </a>

            <div class="dropdown-divider" role="separator"></div>
            <a href="<?= BASE_URL ?>/configuracion" class="dropdown-item" role="menuitem">
                <i class="bi bi-gear-fill" aria-hidden="true"></i>
                <span>Configuración</span>
            </a>
            <button class="dropdown-item" data-modal="soporte" role="menuitem">
                <i class="bi bi-question-circle" aria-hidden="true"></i>
                <span>Soporte</span>
            </button>
            
            <div class="dropdown-divider" role="separator"></div>
            
            <a href="<?= BASE_URL ?>/cerrar-sesion" class="dropdown-item text-danger" role="menuitem">
                <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>
</nav>

<!-- Modal de Soporte -->
<div id="modalSoporte" class="modal-soporte" role="dialog" aria-modal="true" aria-labelledby="tituloSoporte" style="display: none;">
    <div class="modal-contenido">
        <div class="modal-header">
            <div class="modal-icon">
                <i class="bi bi-headset" aria-hidden="true"></i>
            </div>
            <h2 id="tituloSoporte">Centro de Soporte</h2>
            <button class="btn-cerrar" data-modal-close="soporte" aria-label="Cerrar modal">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="modal-body">
            <p class="modal-descripcion">
                ¿Tienes algún problema o sugerencia? Completa el formulario y te responderemos pronto.
            </p>

            <form id="formularioSoporte" novalidate>
                <div class="form-group">
                    <label for="nombreSoporte">
                        <i class="bi bi-person" aria-hidden="true"></i> 
                        Nombre Completo <span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="nombreSoporte"
                        name="nombre"
                        placeholder="Tu nombre"
                        value="<?= $usuario['nombre'] ?>"
                        required
                        aria-required="true">
                    <span class="error-message" role="alert"></span>
                </div>

                <div class="form-group">
                    <label for="emailSoporte">
                        <i class="bi bi-envelope" aria-hidden="true"></i> 
                        Correo Electrónico <span class="required">*</span>
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="emailSoporte"
                        name="email"
                        placeholder="ejemplo@correo.com"
                        value="<?= $usuario['email'] ?>"
                        required
                        aria-required="true">
                    <span class="error-message" role="alert"></span>
                </div>

                <div class="form-group">
                    <label for="tipoProblema">
                        <i class="bi bi-tag" aria-hidden="true"></i> 
                        Tipo de Consulta <span class="required">*</span>
                    </label>
                    <select class="form-control" id="tipoProblema" name="tipo_problema" required aria-required="true">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="tecnico">Problema Técnico</option>
                        <option value="cuenta">Problema con la Cuenta</option>
                        <option value="funcionalidad">Funcionalidad</option>
                        <option value="sugerencia">Sugerencia</option>
                        <option value="otro">Otro</option>
                    </select>
                    <span class="error-message" role="alert"></span>
                </div>

                <div class="form-group">
                    <label for="descripcionProblema">
                        <i class="bi bi-chat-left-text" aria-hidden="true"></i> 
                        Descripción <span class="required">*</span>
                    </label>
                    <textarea
                        class="form-control"
                        id="descripcionProblema"
                        name="descripcion"
                        rows="5"
                        placeholder="Describe tu problema o sugerencia detalladamente..."
                        required
                        aria-required="true"
                        minlength="10"></textarea>
                    <span class="error-message" role="alert"></span>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-cancelar" data-modal-close="soporte">
                        Cancelar
                    </button>
                    <button type="submit" class="btn-enviar">
                        <i class="bi bi-send-fill" aria-hidden="true"></i>
                        <span>Enviar Mensaje</span>
                        <span class="loading-spinner" style="display: none;"></span>
                    </button>
                </div>
            </form>

            <div class="mensaje-exito" style="display: none;" role="alert">
                <i class="bi bi-check-circle-fill"></i>
                <p>¡Mensaje enviado con éxito! Te responderemos pronto.</p>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASE_URL ?>/public/assets/layouts/js/nav.js" defer></script>

<!--  del usuario para JavaScript -->
<script>
    window.usuarioData = {
        id: <?= (int)$id ?>,
        nombre: <?= json_encode($usuario['nombre']) ?>,
        email: <?= json_encode($usuario['email']) ?>
    };
</script>