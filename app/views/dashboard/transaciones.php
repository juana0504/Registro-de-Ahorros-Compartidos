<?php
require_once __DIR__ . '/../../helpers/sesion.php';
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacciones - Ahorros Ya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/dashboard/css/transaciones.css">


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

</head>

<body>

    <button class="btn btn-dark mobile-menu-btn" id="menuBtn">
        <i class="bi bi-list fs-4"></i>
    </button>

    <!-- SIDEBAR -->
    <?php
    include_once __DIR__ . '/../layouts/sidebar.php';
    ?>

    <!-- MAIN -->
    <main class="main-content">

        <?php include_once __DIR__ . '/../layouts/nav.php'; ?>

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Transacciones</h2>
                <p class="text-secondary mb-0">Gestiona tus ingresos y gastos</p>
            </div>
            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="bi bi-plus-lg me-2"></i>Nueva Transacción
            </button>
        </div>

        <!-- STATS -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success);">
                            <i class="bi bi-arrow-up"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success">+12%</span>
                    </div>
                    <p class="text-secondary mb-1">Total Ingresos</p>
                    <h3 class="mb-0">$<span id="totalIncome">5,000</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: var(--danger);">
                            <i class="bi bi-arrow-down"></i>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger">-8%</span>
                    </div>
                    <p class="text-secondary mb-1">Total Gastos</p>
                    <h3 class="mb-0">$<span id="totalExpense">2,800</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(99, 102, 241, 0.1); color: var(--accent);">
                            <i class="bi bi-wallet2"></i>
                        </div>
                    </div>
                    <p class="text-secondary mb-1">Balance</p>
                    <h3 class="mb-0">$<span id="balance">2,200</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning);">
                            <i class="bi bi-graph-up"></i>
                        </div>
                    </div>
                    <p class="text-secondary mb-1">Transacciones</p>
                    <h3 class="mb-0"><span id="totalTransactions">18</span></h3>
                </div>
            </div>
        </div>

        <!-- CHART -->
        <div class="card-custom mb-4">
            <h5 class="mb-3">Flujo de Efectivo</h5>
            <canvas id="chart" height="80"></canvas>
        </div>

        <!-- FILTERS -->
        <div class="card-custom mb-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control border-start-0" placeholder="Buscar transacción..." id="search">
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-select" id="typeFilter">
                        <option value="all">Todos los tipos</option>
                        <option value="income">Ingresos</option>
                        <option value="expense">Gastos</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" id="dateFilter">
                        <option value="all">Todo el tiempo</option>
                        <option value="today">Hoy</option>
                        <option value="week">Esta semana</option>
                        <option value="month">Este mes</option>
                    </select>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn action-btn me-2" id="deleteSelected">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                    <button class="btn action-btn">
                        <i class="bi bi-download"></i> Exportar
                    </button>
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="card-custom">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="50">
                                <input type="checkbox" class="form-check-input" id="selectAll">
                            </th>
                            <th>Concepto</th>
                            <th>Categoría</th>
                            <th>Fecha y Hora</th>
                            <th>Tipo</th>
                            <th class="text-end">Monto</th>
                            <th class="text-end" width="100">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Datos dinámicos desde JS -->
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-secondary">
                <div class="text-secondary">
                    Mostrando <span id="showingCount">1-10</span> de <span id="totalCount">18</span>
                </div>
                <nav>
                    <ul class="pagination pagination-custom mb-0" id="pagination">
                        <!-- Paginación dinámica -->
                    </ul>
                </nav>
            </div>
        </div>

    </main>

    <!-- MODAL ADD/EDIT -->
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title">Nueva Transacción</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="transactionForm">
                        <div class="mb-3">
                            <label class="form-label">Concepto</label>
                            <input type="text" class="form-control" id="concept" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select class="form-select" id="type" required>
                                <option value="income">Ingreso</option>
                                <option value="expense">Gasto</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select class="form-select" id="category" required>
                                <option value="Salario">Salario</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Alimentación">Alimentación</option>
                                <option value="Transporte">Transporte</option>
                                <option value="Entretenimiento">Entretenimiento</option>
                                <option value="Servicios">Servicios</option>
                                <option value="Salud">Salud</option>
                                <option value="Educación">Educación</option>
                                <option value="Otros">Otros</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Monto</label>
                            <input type="number" class="form-control" id="amount" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hora</label>
                            <input type="time" class="form-control" id="time" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Notas (opcional)</label>
                            <textarea class="form-control" id="notes" rows="2"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary-custom flex-fill">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/dashboard/js/transaciones.js"></script>

</body>

</html>