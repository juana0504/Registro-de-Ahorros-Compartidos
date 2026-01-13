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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-card: #1e293b;
            --border-color: rgba(148, 163, 184, .1);
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --accent: #818cf8;
        }

        body {
            background: var(--bg-primary);
            color: var(--text-primary)
        }

        .sidebar {
            width: 260px;
            position: fixed;
            height: 100vh;
            background: var(--bg-secondary);
            left: 0;
            top: 0
        }

        .main-content {
            margin-left: 260px
        }

        .mobile-menu-btn {
            display: none
        }

        @media(max-width:768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: .3s
            }

            .sidebar.active {
                transform: translateX(0)
            }

            .main-content {
                margin-left: 0
            }

            .mobile-menu-btn {
                display: block;
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 999
            }
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 1rem
        }

        .transaction-row {
            transition: .2s
        }

        .transaction-row:hover {
            background: rgba(129, 140, 248, .08)
        }
    </style>
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

        <nav class="navbar px-4 border-bottom">
            <div>
                <h5 class="mb-0">Transacciones 📊</h5>
                <small class="text-secondary">Historial financiero</small>
            </div>
        </nav>

        <div class="container-fluid p-4">

            <!-- STATS -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card p-3">Ingresos <h4 class="text-success">$5,000</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">Gastos <h4 class="text-danger">$2,800</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">Transacciones <h4>18</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">Promedio <h4>$155</h4>
                    </div>
                </div>
            </div>

            <!-- CHART -->
            <div class="card mb-4 p-3">
                <h6 class="mb-3">Ingresos vs Gastos</h6>
                <canvas id="chart" height="120"></canvas>
            </div>

            <!-- FILTER -->
            <div class="card mb-3 p-3">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input class="form-control" placeholder="Buscar..." id="search">
                    </div>
                    <div class="col-md-2">
                        <select class="form-select" id="typeFilter">
                            <option value="all">Todos</option>
                            <option value="income">Ingreso</option>
                            <option value="expense">Gasto</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Concepto</th>
                                <th>Tipo</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <tr class="transaction-row" data-type="income">
                                <td><input type="checkbox"></td>
                                <td>Salario</td>
                                <td class="text-success">Ingreso</td>
                                <td class="text-success">+5000</td>
                            </tr>
                            <tr class="transaction-row" data-type="expense">
                                <td><input type="checkbox"></td>
                                <td>Supermercado</td>
                                <td class="text-danger">Gasto</td>
                                <td class="text-danger">-800</td>
                            </tr>
                            <tr class="transaction-row" data-type="expense">
                                <td><input type="checkbox"></td>
                                <td>Netflix</td>
                                <td class="text-danger">Gasto</td>
                                <td class="text-danger">-50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // SIDEBAR
        const menuBtn = document.getElementById("menuBtn");
        const sidebar = document.getElementById("sidebar");
        menuBtn.onclick = () => sidebar.classList.toggle("active");

        // CHART
        new Chart(document.getElementById("chart"), {
            type: "line",
            data: {
                labels: ["Lun", "Mar", "Mié", "Jue", "Vie"],
                datasets: [{
                        label: "Ingresos",
                        data: [500, 800, 1200, 900, 1600],
                        borderColor: "#22c55e"
                    },
                    {
                        label: "Gastos",
                        data: [200, 600, 300, 700, 500],
                        borderColor: "#ef4444"
                    }
                ]
            }
        });

        // FILTER
        const search = document.getElementById("search");
        const typeFilter = document.getElementById("typeFilter");
        const rows = document.querySelectorAll(".transaction-row");

        function filter() {
            rows.forEach(r => {
                const matchText = r.innerText.toLowerCase().includes(search.value.toLowerCase());
                const matchType = typeFilter.value === "all" || r.dataset.type === typeFilter.value;
                r.style.display = matchText && matchType ? "" : "none";
            });
        }

        search.oninput = filter;
        typeFilter.onchange = filter;

        // SELECT ALL
        document.getElementById("selectAll").addEventListener("change", e => {
            document.querySelectorAll("tbody input[type=checkbox]").forEach(c => c.checked = e.target.checked);
        });
    </script>

</body>

</html>