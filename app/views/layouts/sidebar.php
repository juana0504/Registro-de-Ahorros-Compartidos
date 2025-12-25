<aside class="sidebar" id="sidebar">
    <div class="d-flex flex-column h-100">
        <!-- LOGO -->
        <div class="p-3 border-bottom border-secondary border-opacity-10">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-piggy-bank-fill fs-3 text-gradient"></i>
                <span class="fw-bold fs-5">Ahorros Ya</span>
            </div>
        </div>

        <!-- NAVEGACIÓN -->
        <nav class="flex-grow-1 p-3">
            <div class="d-flex flex-column gap-1">
                <a class="nav-link active" href="<?= BASE_URL ?>/inicio" data-page="dashboard">
                    <i class="bi bi-house-fill"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" href="<?= BASE_URL ?>/billetera" data-page="wallet">
                    <i class="bi bi-wallet2"></i>
                    <span>Wallet</span>
                </a>
                <a class="nav-link" href="<?= BASE_URL ?>/transacciones" data-page="transactions">
                    <br>
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Transacciones</span>
                </a>
                <a class="nav-link" href="#" data-page="messages">
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Mensajes</span>
                </a>
                <a class="nav-link" href="#" data-page="settings">
                    <i class="bi bi-gear-fill"></i>
                    <span>Configuración</span>
                </a>
                <a class="nav-link position-relative" href="#" data-page="notifications">
                    <i class="bi bi-bell-fill"></i>
                    <span>Notificaciones</span>
                    <span
                        class="badge badge-notification position-absolute top-50 end-0 translate-middle-y me-3">3</span>
                </a>
            </div>
        </nav>

        <!-- FOOTER -->
        <div class="p-3 border-top border-secondary border-opacity-10">
            <a class="nav-link text-danger" href="/app/views/website/index.html" onclick="return confirm('¿Seguro que deseas cerrar sesión?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
            </a>
        </div>
    </div>
</aside>