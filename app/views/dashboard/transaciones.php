<?php
require_once __DIR__ . '/../../helpers/sesion.php';
?>
<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Metas - Ahorros Ya</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/dashboard/css/metas.css">

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
                <h2 class="mb-1">Mis Metas de Ahorro</h2>
                <p class="text-secondary mb-0">Planifica y alcanza tus objetivos financieros</p>
            </div>
            <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addGoalModal">
                <i class="bi bi-plus-lg me-2"></i>Nueva Meta
            </button>
        </div>

        <!-- STATS -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--success);">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success">
                            <i class="bi bi-check-circle"></i>
                        </span>
                    </div>
                    <p class="text-secondary mb-1">Metas Completadas</p>
                    <h3 class="mb-0"><span id="completedGoals">0</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(99, 102, 241, 0.1); color: var(--accent);">
                            <i class="bi bi-bullseye"></i>
                        </div>
                    </div>
                    <p class="text-secondary mb-1">Metas Activas</p>
                    <h3 class="mb-0"><span id="activeGoals">0</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warning);">
                            <i class="bi bi-piggy-bank"></i>
                        </div>
                    </div>
                    <p class="text-secondary mb-1">Total Ahorrado</p>
                    <h3 class="mb-0">$<span id="totalSaved">0</span></h3>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                    </div>
                    <p class="text-secondary mb-1">Progreso Promedio</p>
                    <h3 class="mb-0"><span id="avgProgress">0</span>%</h3>
                </div>
            </div>
        </div>

        <!-- FILTROS -->
        <div class="card-custom mb-3">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control border-start-0" placeholder="Buscar meta..." id="searchGoal">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="all">Todos los estados</option>
                        <option value="active">Activas</option>
                        <option value="completed">Completadas</option>
                        <option value="paused">Pausadas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="categoryFilter">
                        <option value="all">Todas las categorías</option>
                        <option value="Vacaciones">Vacaciones</option>
                        <option value="Auto">Auto</option>
                        <option value="Casa">Casa</option>
                        <option value="Emergencias">Fondo de Emergencias</option>
                        <option value="Educación">Educación</option>
                        <option value="Tecnología">Tecnología</option>
                        <option value="Salud">Salud</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" id="sortFilter">
                        <option value="date">Más recientes</option>
                        <option value="progress">Más progreso</option>
                        <option value="amount">Mayor monto</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- METAS ACTIVAS -->
        <div class="mb-4">
            <h5 class="mb-3">Metas Activas</h5>
            <div class="row g-3" id="activeGoalsContainer">
                <!-- Metas activas desde JS -->
            </div>
        </div>

        <!-- METAS COMPLETADAS -->
        <div class="mb-4">
            <h5 class="mb-3">Metas Completadas</h5>
            <div class="row g-3" id="completedGoalsContainer">
                <!-- Metas completadas desde JS -->
            </div>
        </div>

    </main>

    <!-- MODAL ADD/EDIT META -->
    <div class="modal fade" id="addGoalModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title" id="modalTitle">Nueva Meta de Ahorro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="goalForm">
                        <input type="hidden" id="goalId">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre de la Meta</label>
                            <input type="text" class="form-control" id="goalName" placeholder="Ej: Vacaciones en Europa" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select class="form-select" id="goalCategory" required>
                                <option value="">Seleccionar categoría</option>
                                <option value="Vacaciones">🏖️ Vacaciones</option>
                                <option value="Auto">🚗 Auto</option>
                                <option value="Casa">🏠 Casa</option>
                                <option value="Emergencias">🆘 Fondo de Emergencias</option>
                                <option value="Educación">📚 Educación</option>
                                <option value="Tecnología">💻 Tecnología</option>
                                <option value="Salud">❤️ Salud</option>
                                <option value="Otros">📌 Otros</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Monto Objetivo</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="goalTarget" step="0.01" min="1" placeholder="5000" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ahorro Inicial (opcional)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="goalCurrent" step="0.01" min="0" placeholder="0" value="0">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha Límite</label>
                            <input type="date" class="form-control" id="goalDeadline" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prioridad</label>
                            <select class="form-select" id="goalPriority">
                                <option value="baja">🟢 Baja</option>
                                <option value="media" selected>🟡 Media</option>
                                <option value="alta">🔴 Alta</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción (opcional)</label>
                            <textarea class="form-control" id="goalDescription" rows="2" placeholder="Describe tu meta..."></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary-custom flex-fill">
                                <i class="bi bi-save me-2"></i>Guardar Meta
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DETALLE META -->
    <div class="modal fade" id="detailGoalModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title">Detalle de Meta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="goalDetailContent">
                    <!-- Contenido dinámico desde JS -->
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AGREGAR AHORRO -->
    <div class="modal fade" id="addSavingModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title">Agregar Ahorro</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="savingForm">
                        <input type="hidden" id="savingGoalId">
                        
                        <div class="mb-3">
                            <label class="form-label">Monto a Agregar</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="savingAmount" step="0.01" min="0.01" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="savingDate" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nota (opcional)</label>
                            <textarea class="form-control" id="savingNote" rows="2" placeholder="Describe este ahorro..."></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary-custom flex-fill">
                                <i class="bi bi-plus-circle me-2"></i>Agregar Ahorro
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/dashboard/js/metas.js"></script>

</body>

</html>