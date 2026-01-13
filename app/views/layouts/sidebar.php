 <!-- SIDEBAR -->
<link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/sidebar.css">

 <aside class="sidebar" id="sidebar">
     <div class="d-flex flex-column h-100">

         <!-- HEADER / LOGO -->
         <div class="sidebar-header">
             <div class="logo-container">
                 <i class="bi bi-piggy-bank-fill logo-icon"></i>
                 <span class="logo-text">Ahorros Ya</span>
             </div>
             <button class="toggle-btn" id="toggleBtn" aria-label="Colapsar sidebar">
                 <i class="bi bi-chevron-left fs-5"></i>
             </button>
         </div>

         <!-- NAVEGACIÓN -->
         <nav class="sidebar-nav">

             <!-- Sección Principal -->
             <div class="nav-section">
                 <div class="nav-section-title">Principal</div>
                 <div class="nav-links">
                     <a class="nav-link active" href="<?= BASE_URL ?>/dashboard" data-tooltip="Dashboard">
                         <i class="bi bi-house-fill"></i>
                         <span>Dashboard</span>
                     </a>
                     <a class="nav-link" href="<?= BASE_URL ?>/billetera" data-tooltip="Wallet">
                         <i class="bi bi-wallet2"></i>
                         <span>Billetera</span>
                     </a>
                     <a class="nav-link" href="<?= BASE_URL ?>/transaciones" data-tooltip="Transacciones">
                         <i class="bi bi-credit-card-fill"></i>
                         <span>Transacciones</span>
                     </a>
                 </div>
             </div>

             <div class="nav-divider"></div>

             <!-- Sección Comunicación -->
             <div class="nav-section">
                 <div class="nav-section-title">Comunicación</div>
                 <div class="nav-links">
                     <a class="nav-link" href="#" data-tooltip="Mensajes">
                         <i class="bi bi-chat-dots-fill"></i>
                         <span>Mensajes</span>
                     </a>
                     <a class="nav-link" href="#" data-tooltip="Notificaciones">
                         <i class="bi bi-bell-fill"></i>
                         <span>Notificaciones</span>
                         <span class="notification-badge">3</span>
                     </a>
                 </div>
             </div>

             <div class="nav-divider"></div>

             <!-- Sección Configuración -->
             <div class="nav-section">
                 <div class="nav-section-title">Sistema</div>
                 <div class="nav-links">
                     <a class="nav-link" href="#" data-tooltip="Configuración">
                         <i class="bi bi-gear-fill"></i>
                         <span>Configuración</span>
                     </a>
                 </div>
             </div>
         </nav>

         <!-- FOOTER -->
         <div class="sidebar-footer">
             <a class="nav-link logout" href="<?= BASE_URL ?>/cerrar-sesion" data-tooltip="Cerrar sesión" onclick="return confirm('¿Seguro que deseas cerrar sesión?')">
                 <i class="bi bi-box-arrow-right"></i>
                 <span>Cerrar sesión</span>
             </a>
         </div>
     </div>
 </aside>

 <!-- OVERLAY MÓVIL -->
 <div class="sidebar-overlay" id="sidebarOverlay"></div>