<?php
require_once __DIR__ . '/../../helpers/sesion.php';
?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - Ahorros Ya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/dashboard/css/perfil.css">
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
        <div class="area-contenido">
            <div class="container-fluid py-4">

                <!-- HEADER -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="mb-1"><i class="bi bi-person-circle text-primary me-2"></i>Mi Perfil</h2>
                        <p class="text-muted mb-0">Información personal y gestión financiera</p>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarPerfil">
                        <i class="bi bi-pencil-square me-2"></i>Editar Perfil
                    </button>
                </div>

                <!-- INFORMACIÓN DEL USUARIO -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-2 text-center mb-3 mb-md-0">
                                <img src="https://via.placeholder.com/150" alt="Usuario" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-camera"></i> Cambiar Foto
                                </button>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-person me-1"></i>Nombre Completo</label>
                                        <p class="fw-bold mb-0">Juan Carlos Pérez García</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-envelope me-1"></i>Correo Electrónico</label>
                                        <p class="fw-bold mb-0">juan.perez@email.com</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-telephone me-1"></i>Teléfono</label>
                                        <p class="fw-bold mb-0">+57 300 123 4567</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-calendar me-1"></i>Fecha de Nacimiento</label>
                                        <p class="fw-bold mb-0">15 de Marzo, 1990</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-geo-alt me-1"></i>Dirección</label>
                                        <p class="fw-bold mb-0">Calle 123 #45-67, Bogotá, Colombia</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-credit-card me-1"></i>Identificación</label>
                                        <p class="fw-bold mb-0">CC 1.234.567.890</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-briefcase me-1"></i>Ocupación</label>
                                        <p class="fw-bold mb-0">Ingeniero de Software</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="text-muted small"><i class="bi bi-calendar-check me-1"></i>Miembro Desde</label>
                                        <p class="fw-bold mb-0">Enero 2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABS DE NAVEGACIÓN -->
                <ul class="nav nav-tabs mb-4" id="perfilTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="resumen-tab" data-bs-toggle="tab" data-bs-target="#resumen" type="button">
                            <i class="bi bi-graph-up me-2"></i>Resumen Financiero
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="transacciones-tab" data-bs-toggle="tab" data-bs-target="#transacciones" type="button">
                            <i class="bi bi-list-ul me-2"></i>Transacciones
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="metas-tab" data-bs-toggle="tab" data-bs-target="#metas" type="button">
                            <i class="bi bi-trophy me-2"></i>Metas de Ahorro
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="presupuesto-tab" data-bs-toggle="tab" data-bs-target="#presupuesto" type="button">
                            <i class="bi bi-calculator me-2"></i>Presupuesto
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seguridad-tab" data-bs-toggle="tab" data-bs-target="#seguridad" type="button">
                            <i class="bi bi-shield-lock me-2"></i>Seguridad
                        </button>
                    </li>
                </ul>

                <!-- CONTENIDO DE TABS -->
                <div class="tab-content" id="perfilTabsContent">

                    <!-- TAB RESUMEN FINANCIERO -->
                    <div class="tab-pane fade show active" id="resumen" role="tabpanel">

                        <!-- TARJETAS DE RESUMEN -->
                        <div class="row mb-4">
                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm border-0 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1 opacity-75">Balance Total</p>
                                                <h3 class="mb-0">$12,450.00</h3>
                                            </div>
                                            <i class="bi bi-piggy-bank" style="font-size: 2.5rem; opacity: 0.6;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm border-0 bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1 opacity-75">Ingresos del Mes</p>
                                                <h3 class="mb-0">$5,200.00</h3>
                                            </div>
                                            <i class="bi bi-arrow-down-circle" style="font-size: 2.5rem; opacity: 0.6;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm border-0 bg-danger text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1 opacity-75">Gastos del Mes</p>
                                                <h3 class="mb-0">$3,750.00</h3>
                                            </div>
                                            <i class="bi bi-arrow-up-circle" style="font-size: 2.5rem; opacity: 0.6;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <div class="card shadow-sm border-0 bg-info text-white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="mb-1 opacity-75">Ahorrado este Mes</p>
                                                <h3 class="mb-0">$1,450.00</h3>
                                            </div>
                                            <i class="bi bi-graph-up-arrow" style="font-size: 2.5rem; opacity: 0.6;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <!-- GRÁFICO DE INGRESOS VS GASTOS -->
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0"><i class="bi bi-bar-chart-line me-2 text-primary"></i>Ingresos vs Gastos (Últimos 6 meses)</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chartIngresosGastos" style="max-height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- DISTRIBUCIÓN DE GASTOS -->
                                <div class="card shadow-sm mb-4">
                                    <div class="card-header bg-white">
                                        <h5 class="mb-0"><i class="bi bi-pie-chart me-2 text-warning"></i>Distribución de Gastos</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chartGastos" style="max-height: 250px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB TRANSACCIONES -->
                    <div class="tab-pane fade" id="transacciones" role="tabpanel">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-funnel"></i> Filtrar
                                </button>
                                <button class="btn btn-outline-secondary btn-sm ms-2">
                                    <i class="bi bi-download"></i> Exportar
                                </button>
                            </div>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevaTransaccion">
                                <i class="bi bi-plus-circle me-2"></i>Nueva Transacción
                            </button>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Descripción</th>
                                                <th>Categoría</th>
                                                <th class="text-end">Monto</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>16/01/2025</td>
                                                <td>Salario Enero</td>
                                                <td><span class="badge bg-success">Ingreso</span></td>
                                                <td class="text-end text-success fw-bold">+$5,200.00</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>14/01/2025</td>
                                                <td>Supermercado</td>
                                                <td><span class="badge bg-danger">Gasto</span></td>
                                                <td class="text-end text-danger fw-bold">-$230.50</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12/01/2025</td>
                                                <td>Pago de Renta</td>
                                                <td><span class="badge bg-danger">Gasto</span></td>
                                                <td class="text-end text-danger fw-bold">-$800.00</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10/01/2025</td>
                                                <td>Servicios (Luz, Agua, Internet)</td>
                                                <td><span class="badge bg-danger">Gasto</span></td>
                                                <td class="text-end text-danger fw-bold">-$150.00</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>08/01/2025</td>
                                                <td>Ahorro para Vacaciones</td>
                                                <td><span class="badge bg-primary">Ahorro</span></td>
                                                <td class="text-end text-primary fw-bold">-$500.00</td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-outline-secondary">Ver Más Transacciones</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- TAB METAS DE AHORRO -->
                    <div class="tab-pane fade" id="metas" role="tabpanel">

                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNuevaMeta">
                                <i class="bi bi-plus-circle me-2"></i>Nueva Meta
                            </button>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-body">

                                <!-- Meta 1 -->
                                <div class="mb-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="mb-0"><i class="bi bi-airplane me-2 text-primary"></i>Vacaciones 2025</h5>
                                        <span class="badge bg-primary fs-6">$2,500 / $5,000</span>
                                    </div>
                                    <div class="progress mb-2" style="height: 30px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;">
                                            50% completado
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Fecha objetivo: Julio 2025</small>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success me-1">
                                                <i class="bi bi-plus-circle"></i> Agregar
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta 2 -->
                                <div class="mb-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="mb-0"><i class="bi bi-shield-check me-2 text-success"></i>Fondo de Emergencia</h5>
                                        <span class="badge bg-success fs-6">$7,200 / $10,000</span>
                                    </div>
                                    <div class="progress mb-2" style="height: 30px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 72%;">
                                            72% completado
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Fecha objetivo: Diciembre 2025</small>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success me-1">
                                                <i class="bi bi-plus-circle"></i> Agregar
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Meta 3 -->
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="mb-0"><i class="bi bi-laptop me-2 text-warning"></i>Laptop Nueva</h5>
                                        <span class="badge bg-warning text-dark fs-6">$450 / $1,500</span>
                                    </div>
                                    <div class="progress mb-2" style="height: 30px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;">
                                            30% completado
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Fecha objetivo: Marzo 2025</small>
                                        <div>
                                            <button class="btn btn-sm btn-outline-success me-1">
                                                <i class="bi bi-plus-circle"></i> Agregar
                                            </button>
                                            <button class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- TAB PRESUPUESTO -->
                    <div class="tab-pane fade" id="presupuesto" role="tabpanel">

                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditarPresupuesto">
                                <i class="bi bi-pencil-square me-2"></i>Editar Presupuesto
                            </button>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-body">

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="card border-primary">
                                            <div class="card-body">
                                                <h4 class="text-primary">Presupuesto Total</h4>
                                                <h2 class="mb-0">$2,250.00</h2>
                                                <small class="text-muted">Mensual</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card border-danger">
                                            <div class="card-body">
                                                <h4 class="text-danger">Gastado</h4>
                                                <h2 class="mb-0">$1,490.00</h2>
                                                <small class="text-muted">66% del presupuesto</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3">Categorías de Presupuesto</h5>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-house-door me-2"></i><strong>Vivienda</strong></span>
                                        <span class="fw-bold">$950 / $1,000</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-warning" style="width: 95%;"></div>
                                    </div>
                                    <small class="text-muted">95% utilizado</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-cart me-2"></i><strong>Alimentación</strong></span>
                                        <span class="fw-bold">$230 / $500</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" style="width: 46%;"></div>
                                    </div>
                                    <small class="text-muted">46% utilizado</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-fuel-pump me-2"></i><strong>Transporte</strong></span>
                                        <span class="fw-bold">$65 / $200</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" style="width: 32%;"></div>
                                    </div>
                                    <small class="text-muted">32% utilizado</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-cup-hot me-2"></i><strong>Entretenimiento</strong></span>
                                        <span class="fw-bold">$120 / $300</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" style="width: 40%;"></div>
                                    </div>
                                    <small class="text-muted">40% utilizado</small>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-heart-pulse me-2"></i><strong>Salud</strong></span>
                                        <span class="fw-bold">$80 / $150</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" style="width: 53%;"></div>
                                    </div>
                                    <small class="text-muted">53% utilizado</small>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span><i class="bi bi-three-dots me-2"></i><strong>Otros</strong></span>
                                        <span class="fw-bold">$45 / $100</span>
                                    </div>
                                    <div class="progress" style="height: 12px;">
                                        <div class="progress-bar bg-success" style="width: 45%;"></div>
                                    </div>
                                    <small class="text-muted">45% utilizado</small>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- TAB SEGURIDAD -->
                    <div class="tab-pane fade" id="seguridad" role="tabpanel">

                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="bi bi-key me-2 text-warning"></i>Cambiar Contraseña</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contraseña Actual</label>
                                                <input type="password" class="form-control" placeholder="••••••••">
                                            </div>
                                            <button type="submit" class="btn btn-warning">
                                                <i class="bi bi-shield-check me-2"></i>Actualizar Contraseña
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="alert alert-info">
                                                <h6><i class="bi bi-info-circle me-2"></i>Requisitos de contraseña:</h6>
                                                <ul class="mb-0">
                                                    <li>Mínimo 8 caracteres</li>
                                                    <li>Al menos una mayúscula</li>
                                                    <li>Al menos un número</li>
                                                    <li>Al menos un carácter especial</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card shadow-sm">
                            <div class="card-header bg-white">
                                <h5 class="mb-0"><i class="bi bi-shield-lock me-2 text-danger"></i>Autenticación de Dos Factores</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Autenticación de Dos Factores (2FA)</h6>
                                        <p class="text-muted mb-0">Agrega una capa adicional de seguridad a tu cuenta</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" style="width: 3em; height: 1.5em;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Fin contenido de tabs -->

            </div>
        </div>

    </main>

    <!-- MODALES -->

    <!-- MODAL EDITAR PERFIL -->
    <div class="modal fade" id="modalEditarPerfil" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-circle me-2"></i>Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarPerfil">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" value="Juan Carlos Pérez García">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" value="juan.perez@email.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" value="+57 300 123 4567">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" value="1990-03-15">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Dirección</label>
                                <input type="text" class="form-control" value="Calle 123 #45-67, Bogotá, Colombia">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Identificación</label>
                                <input type="text" class="form-control" value="1234567890">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ocupación</label>
                                <input type="text" class="form-control" value="Ingeniero de Software">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL NUEVA TRANSACCIÓN -->
    <div class="modal fade" id="modalNuevaTransaccion" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus-circle me-2"></i>Nueva Transacción</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select class="form-select">
                                <option value="ingreso">Ingreso</option>
                                <option value="gasto">Gasto</option>
                                <option value="ahorro">Ahorro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" placeholder="Ej: Salario, Supermercado, etc.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select class="form-select">
                                <option>Vivienda</option>
                                <option>Alimentación</option>
                                <option>Transporte</option>
                                <option>Entretenimiento</option>
                                <option>Salud</option>
                                <option>Salario</option>
                                <option>Otros</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Monto</label>
                            <input type="number" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" value="2025-01-16">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL NUEVA META -->
    <div class="modal fade" id="modalNuevaMeta" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-trophy me-2"></i>Nueva Meta de Ahorro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Meta</label>
                            <input type="text" class="form-control" placeholder="Ej: Vacaciones, Auto, etc.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Monto Objetivo</label>
                            <input type="number" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Monto Actual</label>
                            <input type="number" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha Objetivo</label>
                            <input type="date" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Crear Meta</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR PRESUPUESTO -->
    <div class="modal fade" id="modalEditarPresupuesto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-calculator me-2"></i>Editar Presupuesto Mensual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Vivienda</label>
                            <input type="number" class="form-control" value="1000" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alimentación</label>
                            <input type="number" class="form-control" value="500" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Transporte</label>
                            <input type="number" class="form-control" value="200" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Entretenimiento</label>
                            <input type="number" class="form-control" value="300" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salud</label>
                            <input type="number" class="form-control" value="150" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Otros</label>
                            <input type="number" class="form-control" value="100" step="0.01">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Presupuesto</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js Scripts -->
    <script>
        // Gráfico de distribución de gastos
        const ctxGastos = document.getElementById('chartGastos');
        if (ctxGastos) {
            new Chart(ctxGastos, {
                type: 'doughnut',
                data: {
                    labels: ['Vivienda', 'Alimentación', 'Transporte', 'Entretenimiento', 'Salud', 'Otros'],
                    datasets: [{
                        data: [950, 230, 65, 120, 80, 45],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 10,
                                font: {
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        }

        // Gráfico de Ingresos vs Gastos
        const ctxIngresosGastos = document.getElementById('chartIngresosGastos');
        if (ctxIngresosGastos) {
            new Chart(ctxIngresosGastos, {
                type: 'bar',
                data: {
                    labels: ['Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre', 'Enero'],
                    datasets: [{
                        label: 'Ingresos',
                        data: [5200, 5200, 5500, 5200, 5200, 5200],
                        backgroundColor: '#28a745',
                        borderColor: '#28a745',
                        borderWidth: 1
                    }, {
                        label: 'Gastos',
                        data: [3800, 3500, 4200, 3900, 3600, 3750],
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>