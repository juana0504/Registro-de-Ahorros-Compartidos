document.addEventListener('DOMContentLoaded', () => {

    /* ===============================
       SIDEBAR
    =============================== */
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (sidebarToggle && sidebar && sidebarOverlay) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            sidebarOverlay.classList.toggle('active');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    }

    /* ===============================
       CHART.JS CONFIG SEGURA
    =============================== */
    if (window.Chart) {
        Chart.defaults.responsive = true;
        Chart.defaults.maintainAspectRatio = false;
    }

    /* ===============================
       GRÁFICO DE VENTAS
    =============================== */
    const salesChartEl = document.getElementById('salesChart');

    if (salesChartEl && window.Chart) {
        new Chart(salesChartEl, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Ventas',
                    data: [120, 190, 300, 250, 220, 310],
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: { display: true }
                }
            }
        });
    }

    /* ===============================
       GRÁFICO DE PRODUCTOS
    =============================== */
    const productsChartEl = document.getElementById('productsChart');

    if (productsChartEl && window.Chart) {
        new Chart(productsChartEl, {
            type: 'bar',
            data: {
                labels: ['A', 'B', 'C', 'D'],
                datasets: [{
                    label: 'Productos',
                    data: [40, 55, 30, 80]
                }]
            }
        });
    }

    /* ===============================
       RESIZE (SEGURO)
    =============================== */
    let lastWidth = window.innerWidth;

    window.addEventListener('resize', () => {
        const currentWidth = window.innerWidth;

        if (sidebar && sidebarOverlay) {
            if (lastWidth <= 768 && currentWidth > 768) {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            }
        }

        lastWidth = currentWidth;
    });

});
