<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ahorros Ya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/layouts/css/header.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/dashboard/css/dashboard.css">
</head>

<body>

    <!-- BOTÓN MENÚ MÓVIL -->
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Abrir menú">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- OVERLAY MÓVIL -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>

    <!-- HEADER -->
    <?php include_once __DIR__ . '/../layouts/nav.php'; ?>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        
        <!-- CONTENT -->
        <div class="container-fluid">
            <div class="row g-4">

                <!-- BALANCE TOTAL -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h6 class="mb-0">BALANCE TOTAL</h6>
                                <i class="bi bi-three-dots-vertical" role="button"></i>
                            </div>
                            <div class="balance-amount mb-3">$857,850</div>
                            <div class="d-flex align-items-center gap-2 text-success">
                                <i class="bi bi-arrow-up-circle-fill"></i>
                                <small>+12.5% este mes</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- INGRESOS -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h6 class="mb-0">INGRESOS</h6>
                                <i class="bi bi-three-dots-vertical" role="button"></i>
                            </div>
                            <h3 class="text-success mb-3">+$198,110</h3>
                            <div class="d-flex align-items-center gap-2 text-success">
                                <i class="bi bi-arrow-up-circle-fill"></i>
                                <small>+8.2% vs mes anterior</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GASTOS -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h6 class="mb-0">GASTOS</h6>
                                <i class="bi bi-three-dots-vertical" role="button"></i>
                            </div>
                            <h3 class="text-danger mb-3">-$145,280</h3>
                            <div class="d-flex align-items-center gap-2 text-danger">
                                <i class="bi bi-arrow-down-circle-fill"></i>
                                <small>+5.1% vs mes anterior</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AHORROS -->
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h6 class="mb-0">AHORROS</h6>
                                <i class="bi bi-three-dots-vertical" role="button"></i>
                            </div>
                            <h3 class="text-info mb-3">+$52,830</h3>
                            <div class="d-flex align-items-center gap-2 text-info">
                                <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                <small>27% de tus ingresos</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TRANSACCIONES -->
                <div class="col-12 col-lg-8 col-xl-9">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0">Transacciones Recientes</h6>
                                <a href="#" class="text-decoration-none small">Ver todas <i class="bi bi-arrow-right"></i></a>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <!-- Transacción 1 -->
                                <div class="transaction-item">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-primary bg-opacity-10 rounded">
                                            <i class="bi bi-cart" style="font-size: 1.25rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="fw-medium">Supermercado</div>
                                                    <small class="text-muted">Hoy, 10:30 AM</small>
                                                </div>
                                                <span class="text-danger fw-bold">-$1,234</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transacción 2 -->
                                <div class="transaction-item">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-success bg-opacity-10 rounded">
                                            <i class="bi bi-currency-dollar" style="font-size: 1.25rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="fw-medium">Salario</div>
                                                    <small class="text-muted">Ayer, 9:00 AM</small>
                                                </div>
                                                <span class="text-success fw-bold">+$5,000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transacción 3 -->
                                <div class="transaction-item">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-danger bg-opacity-10 rounded">
                                            <i class="bi bi-tv" style="font-size: 1.25rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="fw-medium">Netflix</div>
                                                    <small class="text-muted">Hace 2 días</small>
                                                </div>
                                                <span class="text-danger fw-bold">-$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Transacción 4 -->
                                <div class="transaction-item">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-warning bg-opacity-10 rounded">
                                            <i class="bi bi-heart-pulse" style="font-size: 1.25rem;"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <div class="fw-medium">Salud</div>
                                                    <small class="text-muted">Hace 3 días</small>
                                                </div>
                                                <span class="text-danger fw-bold">-$850</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CATEGORÍAS -->
                <div class="col-12 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0">Gastos por Categoría</h6>
                                <a href="#" class="text-decoration-none small">Ver más</a>
                            </div>
                            
                            <div class="d-flex justify-content-center mb-4">
                                <canvas id="pieChart"></canvas>
                            </div>
                            
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="badge" style="background: #818cf8; width: 10px; height: 10px; padding: 0;"></span>
                                        <small>Comida</small>
                                    </span>
                                    <small class="fw-medium">35%</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="badge" style="background: #f472b6; width: 10px; height: 10px; padding: 0;"></span>
                                        <small>Transporte</small>
                                    </span>
                                    <small class="fw-medium">20%</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="badge" style="background: #fbbf24; width: 10px; height: 10px; padding: 0;"></span>
                                        <small>Entretenimiento</small>
                                    </span>
                                    <small class="fw-medium">15%</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="badge" style="background: #34d399; width: 10px; height: 10px; padding: 0;"></span>
                                        <small>Servicios</small>
                                    </span>
                                    <small class="fw-medium">18%</small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="d-flex align-items-center gap-2">
                                        <span class="badge" style="background: #60a5fa; width: 10px; height: 10px; padding: 0;"></span>
                                        <small>Otros</small>
                                    </span>
                                    <small class="fw-medium">12%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- INVERSIONES -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0">Mis Inversiones</h6>
                                <a href="#" class="text-decoration-none small">Ver detalles</a>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">Criptomonedas</div>
                                        <small class="text-muted">Bitcoin, Ethereum</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$12,500</div>
                                        <small class="text-success">+45%</small>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width:45%; background: #818cf8;" role="progressbar"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">Acciones</div>
                                        <small class="text-muted">Tech & Healthcare</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$8,300</div>
                                        <small class="text-success">+30%</small>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width:30%; background: #34d399;" role="progressbar"></div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">Fondos de Inversión</div>
                                        <small class="text-muted">Fondos mixtos</small>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold">$5,200</div>
                                        <small class="text-warning">+25%</small>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width:25%; background: #fbbf24;" role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- METAS DE AHORRO -->
                <div class="col-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h6 class="mb-0">Metas de Ahorro</h6>
                                <button class="btn btn-sm btn-primary">
                                    <i class="bi bi-plus-lg"></i> Nueva meta
                                </button>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">
                                            <i class="bi bi-house-fill text-success"></i> Casa Nueva
                                        </div>
                                        <small class="text-muted">$45,000 de $100,000</small>
                                    </div>
                                    <span class="fw-bold text-success">45%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:45%" role="progressbar"></div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">
                                            <i class="bi bi-car-front-fill text-info"></i> Auto Nuevo
                                        </div>
                                        <small class="text-muted">$18,000 de $30,000</small>
                                    </div>
                                    <span class="fw-bold text-info">60%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" style="width:60%" role="progressbar"></div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <div class="fw-medium">
                                            <i class="bi bi-airplane-engines-fill text-warning"></i> Vacaciones
                                        </div>
                                        <small class="text-muted">$3,500 de $5,000</small>
                                    </div>
                                    <span class="fw-bold text-warning">70%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:70%" role="progressbar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/layouts/js/sidebar.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/layouts/js/header.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/dashboard/js/dashboard.js"></script>
</body>

</html>