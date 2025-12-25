<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet - Ahorros Ya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/dashboard/css/wallet.css">
</head>

<body>

    <!-- BOTÓN MENÚ MÓVIL -->
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Abrir menú">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- OVERLAY MÓVIL -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <?php
    include_once __DIR__ . '/../layouts/sidebar.php'
    ?>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <!-- HEADER -->
        <nav class="navbar navbar-top px-4">
            <div class="container-fluid">
                <div>
                    <h5 class="mb-0 text-white">Mi Wallet 💳</h5>
                    <small class="text-muted">Gestiona tus cuentas y tarjetas</small>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg"></i> Agregar Cuenta
                    </button>
                    <div class="position-relative d-none d-md-block">
                        <i class="bi bi-search position-absolute top-50 translate-middle-y ms-3 text-muted"></i>
                        <input
                            type="search"
                            class="search-input ps-5"
                            placeholder="Buscar..."
                            aria-label="Buscar en el wallet">
                    </div>
                    <img
                        src="https://i.pravatar.cc/40?img=47"
                        class="user-avatar"
                        alt="Avatar de usuario"
                        role="button"
                        tabindex="0">
                </div>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid p-4">

            <!-- BALANCE TOTAL -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card total-balance-card">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <small class="text-muted d-block mb-2">Balance Total Disponible</small>
                                    <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #818cf8, #f472b6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                        $857,850.00
                                    </h1>
                                    <div class="d-flex gap-4 flex-wrap">
                                        <div>
                                            <small class="text-muted d-block">Ingresos del Mes</small>
                                            <strong class="text-success">+$198,110</strong>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Gastos del Mes</small>
                                            <strong class="text-danger">-$145,280</strong>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block">Ahorrado</small>
                                            <strong class="text-info">$52,830</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                    <button class="btn btn-primary me-2">
                                        <i class="bi bi-arrow-down-circle"></i> Depositar
                                    </button>
                                    <button class="btn btn-outline-light">
                                        <i class="bi bi-arrow-up-circle"></i> Retirar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TARJETAS -->
            <div class="row g-4 mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Mis Tarjetas</h5>
                        <button class="btn btn-sm btn-outline-light">
                            <i class="bi bi-plus-lg"></i> Nueva Tarjeta
                        </button>
                    </div>
                </div>

                <!-- Tarjeta 1 - Visa -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="credit-card visa">
                        <div class="card-header-section">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <small class="text-white-50">Balance</small>
                                    <h4 class="text-white mb-0">$45,230.00</h4>
                                </div>
                                <i class="bi bi-credit-card-2-front fs-3 text-white-50"></i>
                            </div>
                        </div>
                        <div class="card-number mt-4">
                            <span class="text-white fw-bold">**** **** **** 4829</span>
                        </div>
                        <div class="card-footer-section mt-4">
                            <div class="row">
                                <div class="col">
                                    <small class="text-white-50 d-block">Titular</small>
                                    <strong class="text-white">YAIR GONZALEZ</strong>
                                </div>
                                <div class="col text-end">
                                    <small class="text-white-50 d-block">Vence</small>
                                    <strong class="text-white">12/26</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-brand">
                            <span class="text-white fw-bold">VISA</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2 - Mastercard -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="credit-card mastercard">
                        <div class="card-header-section">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <small class="text-white-50">Balance</small>
                                    <h4 class="text-white mb-0">$28,500.00</h4>
                                </div>
                                <i class="bi bi-credit-card-2-front fs-3 text-white-50"></i>
                            </div>
                        </div>
                        <div class="card-number mt-4">
                            <span class="text-white fw-bold">**** **** **** 7392</span>
                        </div>
                        <div class="card-footer-section mt-4">
                            <div class="row">
                                <div class="col">
                                    <small class="text-white-50 d-block">Titular</small>
                                    <strong class="text-white">YAIR GONZALEZ</strong>
                                </div>
                                <div class="col text-end">
                                    <small class="text-white-50 d-block">Vence</small>
                                    <strong class="text-white">08/27</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-brand">
                            <span class="text-white fw-bold">MASTERCARD</span>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3 - American Express -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="credit-card amex">
                        <div class="card-header-section">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <small class="text-white-50">Balance</small>
                                    <h4 class="text-white mb-0">$12,800.00</h4>
                                </div>
                                <i class="bi bi-credit-card-2-front fs-3 text-white-50"></i>
                            </div>
                        </div>
                        <div class="card-number mt-4">
                            <span class="text-white fw-bold">**** **** **** 5614</span>
                        </div>
                        <div class="card-footer-section mt-4">
                            <div class="row">
                                <div class="col">
                                    <small class="text-white-50 d-block">Titular</small>
                                    <strong class="text-white">YAIR GONZALEZ</strong>
                                </div>
                                <div class="col text-end">
                                    <small class="text-white-50 d-block">Vence</small>
                                    <strong class="text-white">03/25</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-brand">
                            <span class="text-white fw-bold">AMEX</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CUENTAS BANCARIAS Y TRANSACCIONES RECIENTES -->
            <div class="row g-4">

                <!-- CUENTAS BANCARIAS -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0">Cuentas Bancarias</h6>
                                <button class="btn btn-sm btn-outline-light">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>

                            <div class="bank-account-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bank-icon">
                                        <i class="bi bi-bank2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">Banco Nacional</div>
                                        <small class="text-muted">Cuenta Corriente •••• 4521</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$485,230.00</div>
                                        <small class="text-success">Principal</small>
                                    </div>
                                </div>
                            </div>

                            <div class="bank-account-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bank-icon" style="background: rgba(52, 211, 153, 0.1);">
                                        <i class="bi bi-bank2" style="color: #34d399;"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">Banco Internacional</div>
                                        <small class="text-muted">Cuenta Ahorros •••• 8932</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$285,120.00</div>
                                        <small class="text-muted">Secundaria</small>
                                    </div>
                                </div>
                            </div>

                            <div class="bank-account-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bank-icon" style="background: rgba(251, 191, 36, 0.1);">
                                        <i class="bi bi-bank2" style="color: #fbbf24;"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="fw-medium">Banco Digital</div>
                                        <small class="text-muted">Cuenta Nómina •••• 2187</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$87,500.00</div>
                                        <small class="text-muted">Nómina</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- TRANSACCIONES RECIENTES -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="fw-bold mb-0">Transacciones Recientes</h6>
                                <a href="#" class="text-decoration-none small text-muted">Ver todas</a>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="trans-icon bg-success bg-opacity-10">
                                            <i class="bi bi-arrow-down-circle-fill text-success"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Depósito - Salario</div>
                                            <small class="text-muted">Hoy, 09:00 AM</small>
                                        </div>
                                    </div>
                                    <span class="text-success fw-bold">+$5,000.00</span>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="trans-icon bg-danger bg-opacity-10">
                                            <i class="bi bi-cart-fill text-danger"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Supermercado XYZ</div>
                                            <small class="text-muted">Hoy, 10:30 AM</small>
                                        </div>
                                    </div>
                                    <span class="text-danger fw-bold">-$1,234.50</span>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="trans-icon bg-warning bg-opacity-10">
                                            <i class="bi bi-fuel-pump-fill text-warning"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Gasolina Shell</div>
                                            <small class="text-muted">Ayer, 07:15 PM</small>
                                        </div>
                                    </div>
                                    <span class="text-danger fw-bold">-$850.00</span>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="trans-icon bg-info bg-opacity-10">
                                            <i class="bi bi-tv-fill text-info"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Netflix Suscripción</div>
                                            <small class="text-muted">Hace 2 días</small>
                                        </div>
                                    </div>
                                    <span class="text-danger fw-bold">-$50.00</span>
                                </div>
                            </div>

                            <div class="transaction-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="trans-icon bg-primary bg-opacity-10">
                                            <i class="bi bi-arrow-left-right text-primary"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Transferencia a María</div>
                                            <small class="text-muted">Hace 3 días</small>
                                        </div>
                                    </div>
                                    <span class="text-danger fw-bold">-$2,500.00</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- ESTADÍSTICAS Y LÍMITES -->
            <div class="row g-4 mt-2">

                <!-- LÍMITES DE GASTOS -->
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Límites de Gasto Mensuales</h6>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Compras</span>
                                    <span class="text-muted">$3,200 / $5,000</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: 64%" role="progressbar"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Entretenimiento</span>
                                    <span class="text-muted">$1,800 / $2,000</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-warning" style="width: 90%" role="progressbar"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Transporte</span>
                                    <span class="text-muted">$850 / $1,500</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" style="width: 57%" role="progressbar"></div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Restaurantes</span>
                                    <span class="text-muted">$450 / $1,000</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-info" style="width: 45%" role="progressbar"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- ACCIONES RÁPIDAS -->
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Acciones Rápidas</h6>

                            <div class="row g-3">
                                <div class="col-6">
                                    <button class="btn btn-outline-light w-100 py-3">
                                        <i class="bi bi-arrow-down-up fs-3 d-block mb-2"></i>
                                        <span>Transferir</span>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-light w-100 py-3">
                                        <i class="bi bi-phone fs-3 d-block mb-2"></i>
                                        <span>Recargar</span>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-light w-100 py-3">
                                        <i class="bi bi-receipt fs-3 d-block mb-2"></i>
                                        <span>Pagar Servicio</span>
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-light w-100 py-3">
                                        <i class="bi bi-qr-code fs-3 d-block mb-2"></i>
                                        <span>Código QR</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/dashboard/js/wallet.js"></script>
</body>

</html>