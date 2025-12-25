// ============================================
// CONFIGURACIÓN
// ============================================
const colors = {
    purple: '#818cf8',
    pink: '#f472b6',
    yellow: '#fbbf24',
    green: '#34d399',
    blue: '#60a5fa',
    bg: '#1a1a2e',
    text: '#9ca3af'
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
// GRÁFICO PRINCIPAL (BARRAS)
// ============================================
const mainCtx = document.getElementById('mainChart');
if (mainCtx) {
    const mainChart = new Chart(mainCtx, {
        type: 'bar',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [
                {
                    label: 'Ingresos',
                    data: [4000, 4500, 5200, 4800, 5500, 6000, 5800, 6200, 6500, 6800, 7000, 7500],
                    backgroundColor: colors.purple,
                    borderRadius: 8,
                    barPercentage: 0.7
                },
                {
                    label: 'Gastos',
                    data: [2400, 2800, 3200, 3500, 3800, 3600, 4000, 4200, 4500, 4300, 4600, 4800],
                    backgroundColor: colors.pink,
                    borderRadius: 8,
                    barPercentage: 0.7
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
                    backgroundColor: colors.bg,
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    displayColors: true,
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
                        color: colors.text,
                        font: {
                            size: 11
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        color: colors.text,
                        font: {
                            size: 11
                        },
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

    // Animación al cargar
    mainChart.options.animation = {
        duration: 1500,
        easing: 'easeInOutQuart'
    };
}

// ============================================
// GRÁFICO DE PASTEL (CATEGORÍAS)
// ============================================
const pieCtx = document.getElementById('pieChart');
if (pieCtx) {
    const pieChart = new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Comida', 'Transporte', 'Entretenimiento', 'Servicios', 'Otros'],
            datasets: [{
                data: [35, 20, 15, 18, 12],
                backgroundColor: [
                    colors.purple,
                    colors.pink,
                    colors.yellow,
                    colors.green,
                    colors.blue
                ],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: colors.bg,
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgba(255, 255, 255, 0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.parsed + '%';
                        }
                    }
                }
            },
            cutout: '70%',
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 1500
            }
        }
    });
}

// ============================================
// ANIMACIONES AL CARGAR
// ============================================
window.addEventListener('load', function() {
    // Animar cards
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 50);
    });

    // Animar barras de progreso
    setTimeout(() => {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 100);
        });
    }, 500);
});

// ============================================
// NÚMEROS ANIMADOS
// ============================================
function animateNumber(element, target, duration = 1500) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = '$' + Math.floor(current).toLocaleString();
    }, 16);
}

// Animar balance al cargar
window.addEventListener('load', function() {
    setTimeout(() => {
        const balanceEl = document.querySelector('.balance-amount');
        if (balanceEl) {
            animateNumber(balanceEl, 857850);
        }
    }, 300);
});

// ============================================
// ACTUALIZAR HORA EN TIEMPO REAL
// ============================================
function updateTime() {
    const now = new Date();
    const hours = now.getHours();
    let greeting = 'Buenos días';
    
    if (hours >= 12 && hours < 18) {
        greeting = 'Buenas tardes';
    } else if (hours >= 18) {
        greeting = 'Buenas noches';
    }
    
    // Opcional: actualizar saludo en header
    // document.querySelector('.navbar h5').textContent = greeting + ', Yair 👋';
}

setInterval(updateTime, 60000); // Cada minuto
updateTime();

// ============================================
// BÚSQUEDA
// ============================================
const searchInput = document.querySelector('.search-input');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        console.log('Buscando:', query);
        
        // Aquí puedes implementar la lógica de búsqueda
        // Por ejemplo: filtrar transacciones, categorías, etc.
    });
}

// ============================================
// TOOLTIPS DE BOOTSTRAP
// ============================================
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

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
    
    // Redimensionar gráficos
    if (window.Chart) {
        Chart.helpers.each(Chart.instances, function(instance) {
            instance.resize();
        });
    }
});

// ============================================
// MODO CLARO/OSCURO (OPCIONAL)
// ============================================
function toggleTheme() {
    const html = document.documentElement;
    const currentTheme = html.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-bs-theme', newTheme);
    localStorage.setItem('theme', newTheme);
}

// Cargar tema guardado
const savedTheme = localStorage.getItem('theme') || 'dark';
document.documentElement.setAttribute('data-bs-theme', savedTheme);

// ============================================
// REFRESH DATA (SIMULADO)
// ============================================
function refreshData() {
    console.log('Actualizando datos...');
    
    // Aquí podrías hacer fetch a tu API
    // fetch('/api/dashboard')
    //     .then(res => res.json())
    //     .then(data => updateDashboard(data));
    
    // Simulación
    const notification = document.createElement('div');
    notification.className = 'alert alert-success position-fixed top-0 end-0 m-3';
    notification.style.zIndex = '9999';
    notification.textContent = '✓ Datos actualizados';
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 2000);
}

// Auto-refresh cada 5 minutos (opcional)
// setInterval(refreshData, 300000);

// ============================================
// MANEJO DE ERRORES DE GRÁFICOS
// ============================================
Chart.defaults.responsive = true;
Chart.defaults.maintainAspectRatio = false;

// ============================================
// DEBUGGING
// ============================================
console.log('Dashboard cargado correctamente ✅');
console.log('Chart.js versión:', Chart.version);
console.log('Ancho de pantalla:', window.innerWidth + 'px');

// Log cuando los gráficos están listos
if (mainCtx && pieCtx) {
    console.log('Gráficos inicializados ✅');
} else {
    console.warn('⚠️ Algunos gráficos no se pudieron inicializar');
}

// ============================================
// EXPORTAR FUNCIONES ÚTILES
// ============================================
window.dashboardUtils = {
    toggleSidebar,
    toggleTheme,
    refreshData,
    animateNumber
};