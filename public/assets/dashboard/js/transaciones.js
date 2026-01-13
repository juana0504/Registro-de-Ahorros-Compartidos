// ============================================
// CONFIGURACIÓN
// ============================================
const colors = {
    purple: '#818cf8',
    pink: '#f472b6',
    success: '#34d399',
    danger: '#f87171',
    info: '#60a5fa',
    warning: '#fbbf24'
};

// ============================================
// MENÚ MÓVIL
// ============================================
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');

function toggleSidebar() {
    sidebar.classList.toggle('active');
    sidebarOverlay.classList.toggle('active');
}

if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener('click', toggleSidebar);
}

if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', toggleSidebar);
}

// Cerrar sidebar al hacer clic en un link (móvil)
document.querySelectorAll('.sidebar .nav-link').forEach(link => {
    link.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            toggleSidebar();
        }
    });
});

// ============================================
// GRÁFICO DE TENDENCIA
// ============================================
const trendCtx = document.getElementById('trendChart');
let trendChart;

const chartData = {
    week: {
        labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'],
        income: [400, 300, 500, 278, 489, 539, 349],
        expense: [240, 139, 380, 390, 280, 320, 220]
    },
    month: {
        labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4'],
        income: [15000, 18000, 16500, 19200],
        expense: [12000, 13500, 11800, 14200]
    },
    year: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        income: [45000, 48000, 52000, 48000, 55000, 60000, 58000, 62000, 65000, 68000, 70000, 75000],
        expense: [32000, 35000, 38000, 36000, 40000, 42000, 44000, 46000, 48000, 45000, 50000, 52000]
    }
};

function createTrendChart(period = 'week') {
    const data = chartData[period];
    
    if (trendChart) {
        trendChart.destroy();
    }
    
    trendChart = new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: data.labels,
            datasets: [
                {
                    label: 'Ingresos',
                    data: data.income,
                    borderColor: colors.success,
                    backgroundColor: 'rgba(52, 211, 153, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: colors.success,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                },
                {
                    label: 'Gastos',
                    data: data.expense,
                    borderColor: colors.danger,
                    backgroundColor: 'rgba(248, 113, 113, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: colors.danger,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#1a1a2e',
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': $' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#9ca3af'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.05)'
                    },
                    ticks: {
                        color: '#9ca3af',
                        callback: function(value) {
                            return '$' + (value / 1000).toFixed(0) + 'k';
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
}

// Inicializar gráfico
if (trendCtx) {
    createTrendChart('week');
}

// Botones de periodo
document.querySelectorAll('[data-period]').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('[data-period]').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        createTrendChart(this.getAttribute('data-period'));
    });
});

// ============================================
// BÚSQUEDA Y FILTROS
// ============================================
const searchInput = document.getElementById('searchTransaction');
const filterType = document.getElementById('filterType');
const filterCategory = document.getElementById('filterCategory');
const filterDateFrom = document.getElementById('filterDateFrom');
const filterDateTo = document.getElementById('filterDateTo');

function filterTransactions() {
    const searchTerm = searchInput.value.toLowerCase();
    const type = filterType.value;
    const category = filterCategory.value;
    const dateFrom = filterDateFrom.value;
    const dateTo = filterDateTo.value;

    const rows = document.querySelectorAll('.transaction-row');
    let visibleCount = 0;

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const rowType = row.getAttribute('data-type');
        const rowCategory = row.getAttribute('data-category');

        let show = true;

        // Filtrar por búsqueda
        if (searchTerm && !text.includes(searchTerm)) {
            show = false;
        }

        // Filtrar por tipo
        if (type !== 'all' && rowType !== type) {
            show = false;
        }

        // Filtrar por categoría
        if (category !== 'all' && rowCategory !== category) {
            show = false;
        }

        // Mostrar/ocultar
        if (show) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    // Ocultar separadores de fecha si no tienen transacciones visibles
    document.querySelectorAll('.date-separator').forEach(separator => {
        let nextRow = separator.nextElementSibling;
        let hasVisibleRows = false;

        while (nextRow && !nextRow.classList.contains('date-separator')) {
            if (nextRow.style.display !== 'none') {
                hasVisibleRows = true;
                break;
            }
            nextRow = nextRow.nextElementSibling;
        }

        separator.style.display = hasVisibleRows ? '' : 'none';
    });

    console.log(`Mostrando ${visibleCount} transacciones`);
}

// Event listeners para filtros
if (searchInput) searchInput.addEventListener('input', filterTransactions);
if (filterType) filterType.addEventListener('change', filterTransactions);
if (filterCategory) filterCategory.addEventListener('change', filterTransactions);
if (filterDateFrom) filterDateFrom.addEventListener('change', filterTransactions);
if (filterDateTo) filterDateTo.addEventListener('change', filterTransactions);

// ============================================
// SELECCIÓN MÚLTIPLE
// ============================================
const selectAllCheckbox = document.getElementById('selectAll');
const rowCheckboxes = document.querySelectorAll('.transaction-row input[type="checkbox"]');

if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener('change', function() {
        const visibleRows = document.querySelectorAll('.transaction-row:not([style*="display: none"])');
        visibleRows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox) {
                checkbox.checked = this.checked;
            }
        });
        updateSelectedCount();
    });
}

rowCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', updateSelectedCount);
});

function updateSelectedCount() {
    const checked = document.querySelectorAll('.transaction-row input[type="checkbox"]:checked').length;
    
    if (checked > 0) {
        console.log(`${checked} transacciones seleccionadas`);
        // Aquí podrías mostrar un botón de acciones masivas
    }
}

// ============================================
// EXPORTAR TRANSACCIONES
// ============================================
const exportBtn = document.getElementById('exportBtn');

if (exportBtn) {
    exportBtn.addEventListener('click', function() {
        // Simular descarga
        const transactions = [];
        document.querySelectorAll('.transaction-row:not([style*="display: none"])').forEach(row => {
            const concept = row.querySelector('.fw-medium').textContent;
            const category = row.querySelector('.badge').textContent;
            const amount = row.querySelector('.text-end strong').textContent;
            
            transactions.push({ concept, category, amount });
        });

        console.log('Exportando', transactions.length, 'transacciones');
        showNotification(`✓ Exportando ${transactions.length} transacciones...`);

        // Aquí harías la descarga real del CSV o PDF
        // downloadCSV(transactions);
    });
}

// ============================================
// NUEVA TRANSACCIÓN
// ============================================
const newTransactionBtn = document.getElementById('newTransactionBtn');

if (newTransactionBtn) {
    newTransactionBtn.addEventListener('click', function() {
        showNotification('Formulario de nueva transacción próximamente');
        // Aquí abrirías un modal con formulario
    });
}

// ============================================
// ANIMACIÓN DE NÚMEROS
// ============================================
function animateNumber(element, target, duration = 1500, prefix = '$', decimals = 0) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        
        if (decimals > 0) {
            element.textContent = prefix + current.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        } else {
            element.textContent = prefix + Math.floor(current).toLocaleString();
        }
    }, 16);
}

// Animar estadísticas al cargar
window.addEventListener('load', function() {
    setTimeout(() => {
        const monthIncome = document.getElementById('monthIncome');
        const monthExpense = document.getElementById('monthExpense');
        const totalTrans = document.getElementById('totalTrans');
        const dailyAvg = document.getElementById('dailyAvg');

        if (monthIncome) animateNumber(monthIncome, 198110, 1500, '$', 0);
        if (monthExpense) animateNumber(monthExpense, 145280, 1500, '$', 0);
        if (totalTrans) animateNumber(totalTrans, 247, 1000, '', 0);
        if (dailyAvg) animateNumber(dailyAvg, 4176, 1500, '$', 0);
    }, 300);
});

// ============================================
// NOTIFICACIONES
// ============================================
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
    notification.style.cssText = `
        z-index: 9999;
        min-width: 300px;
        animation: slideInRight 0.3s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============================================
// MENÚ CONTEXTUAL DE ACCIONES
// ============================================
document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();
        const action = this.textContent.trim();
        
        if (action.includes('Ver detalles')) {
            showNotification('Mostrando detalles de la transacción');
        } else if (action.includes('Descargar')) {
            showNotification('Descargando comprobante...', 'info');
        } else if (action.includes('Eliminar')) {
            if (confirm('¿Estás seguro de eliminar esta transacción?')) {
                const row = this.closest('.transaction-row');
                row.style.animation = 'fadeOut 0.3s ease';
                setTimeout(() => row.remove(), 300);
                showNotification('Transacción eliminada', 'success');
            }
        }
    });
});

// ============================================
// ANIMACIONES
// ============================================
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);

// ============================================
// MANEJO DE RESPONSIVE
// ============================================
let lastWidth = window.innerWidth;

window.addEventListener('resize', function() {
    const currentWidth = window.innerWidth;
    
    // Si pasamos de móvil a desktop, cerrar sidebar
    if (lastWidth <= 768 && currentWidth > 768) {
        sidebar.classList.remove('active');
        sidebarOverlay.classList.remove('active');
    }
    
    lastWidth = currentWidth;
    
    // Redimensionar gráfico
    if (trendChart) {
        trendChart.resize();
    }
});

// ============================================
// TOOLTIPS
// ============================================
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// ============================================
// ESTABLECER FECHAS POR DEFECTO
// ============================================
window.addEventListener('load', function() {
    const today = new Date();
    const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
    
    if (filterDateFrom) {
        filterDateFrom.valueAsDate = firstDay;
    }
    
    if (filterDateTo) {
        filterDateTo.valueAsDate = today;
    }
});

// ============================================
// DEBUGGING
// ============================================
console.log('Transactions JS cargado correctamente ✅');
console.log('Transacciones en tabla:', document.querySelectorAll('.transaction-row').length);
console.log('Chart.js versión:', Chart.version);

// ============================================
// EXPORTAR FUNCIONES ÚTILES
// ============================================
window.transactionsUtils = {
    filterTransactions,
    showNotification,
    animateNumber,
    toggleSidebar
};