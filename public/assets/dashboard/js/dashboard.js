/**
 * ============================================
 * DASHBOARD CONTROLLER - Ahorros Ya
 * ============================================
 * Funcionalidades:
 * - Animación de números (count up)
 * - Gráficos interactivos (Chart.js)
 * - Gestión de transacciones
 * - Manejo de metas de ahorro
 * - Integración con sidebar
 * - Responsive y animaciones
 * ============================================
 */

class DashboardController {
    constructor() {
        // Configuración
        this.charts = {};
        this.animationDuration = 2000;
        
        // Elementos del DOM
        this.mobileMenuBtn = document.getElementById('mobileMenuBtn');
        this.sidebarOverlay = document.getElementById('sidebarOverlay');
        
        // Datos
        this.dashboardData = {
            balance: 857850,
            income: 198110,
            expenses: 145280,
            savings: 52830,
            categories: [
                { name: 'Comida', value: 35, color: '#818cf8' },
                { name: 'Transporte', value: 20, color: '#f472b6' },
                { name: 'Entretenimiento', value: 15, color: '#fbbf24' },
                { name: 'Servicios', value: 18, color: '#34d399' },
                { name: 'Otros', value: 12, color: '#60a5fa' }
            ]
        };
        
        // Inicializar
        this.init();
    }

    /**
     * Inicializa el dashboard
     */
    init() {
        console.log('🚀 Inicializando Dashboard...');
        
        this.setupEventListeners();
        this.animateNumbers();
        this.initializeCharts();
        this.setupTransactionListeners();
        this.setupProgressBars();
        this.loadRecentActivity();
        
        console.log('✅ Dashboard inicializado correctamente');
    }

    /**
     * Configura los event listeners
     */
    setupEventListeners() {
        // Botón menú móvil
        if (this.mobileMenuBtn) {
            this.mobileMenuBtn.addEventListener('click', () => {
                this.toggleMobileSidebar();
            });
        }

        // Overlay
        if (this.sidebarOverlay) {
            this.sidebarOverlay.addEventListener('click', () => {
                this.closeMobileSidebar();
            });
        }

        // Botones de acciones en cards
        document.querySelectorAll('.bi-three-dots-vertical').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.showCardMenu(e.target);
            });
        });

        // Botón de nueva meta
        const newGoalBtn = document.querySelector('.btn-primary');
        if (newGoalBtn) {
            newGoalBtn.addEventListener('click', () => {
                this.showNewGoalModal();
            });
        }
    }

    /**
     * Toggle del sidebar móvil
     */
    toggleMobileSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = this.sidebarOverlay;
        
        if (sidebar && overlay) {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
        }
    }

    /**
     * Cierra el sidebar móvil
     */
    closeMobileSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = this.sidebarOverlay;
        
        if (sidebar && overlay) {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    /**
     * Anima los números de las estadísticas
     */
    animateNumbers() {
        const balanceElement = document.querySelector('.balance-amount');
        const statsElements = document.querySelectorAll('.card h3');
        
        if (balanceElement) {
            this.animateValue(balanceElement, 0, this.dashboardData.balance, this.animationDuration, true);
        }
        
        statsElements.forEach((element, index) => {
            const text = element.textContent.trim();
            const isNegative = text.includes('-');
            const number = parseInt(text.replace(/[^0-9]/g, ''));
            
            if (!isNaN(number)) {
                this.animateValue(element, 0, number, this.animationDuration, true, isNegative);
            }
        });
    }

    /**
     * Anima un valor numérico
     */
    animateValue(element, start, end, duration, isCurrency = false, isNegative = false) {
        const startTime = performance.now();
        const prefix = isNegative ? '-' : '+';
        
        const updateValue = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (easeOutExpo)
            const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
            
            const currentValue = Math.floor(start + (end - start) * easeProgress);
            
            if (isCurrency) {
                const formattedValue = new Intl.NumberFormat('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    minimumFractionDigits: 0
                }).format(currentValue);
                
                if (element.classList.contains('balance-amount')) {
                    element.textContent = formattedValue;
                } else {
                    element.textContent = (isNegative ? '-' : '+') + formattedValue;
                }
            } else {
                element.textContent = currentValue.toLocaleString('es-CO');
            }
            
            if (progress < 1) {
                requestAnimationFrame(updateValue);
            }
        };
        
        requestAnimationFrame(updateValue);
    }

    /**
     * Inicializa los gráficos
     */
    initializeCharts() {
        this.initPieChart();
    }

    /**
     * Inicializa el gráfico de pastel (categorías)
     */
    initPieChart() {
        const ctx = document.getElementById('pieChart');
        if (!ctx) return;

        const data = this.dashboardData.categories;
        
        this.charts.pie = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data.map(item => item.name),
                datasets: [{
                    data: data.map(item => item.value),
                    backgroundColor: data.map(item => item.color),
                    borderWidth: 0,
                    hoverOffset: 10
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
                        backgroundColor: '#1e293b',
                        titleColor: '#f1f5f9',
                        bodyColor: '#f1f5f9',
                        borderColor: '#334155',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return ` ${context.label}: ${context.parsed}%`;
                            }
                        }
                    }
                },
                cutout: '70%',
                animation: {
                    animateRotate: true,
                    animateScale: true,
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    /**
     * Configura los listeners de transacciones
     */
    setupTransactionListeners() {
        const transactionItems = document.querySelectorAll('.transaction-item');
        
        transactionItems.forEach((item, index) => {
            item.style.animationDelay = `${0.1 * index}s`;
            
            item.addEventListener('click', () => {
                this.showTransactionDetail(item);
            });
        });
    }

    /**
     * Muestra el detalle de una transacción
     */
    showTransactionDetail(item) {
        const title = item.querySelector('.fw-medium').textContent;
        const amount = item.querySelector('.fw-bold').textContent;
        const date = item.querySelector('.text-muted').textContent;
        
        console.log('📋 Transacción seleccionada:', { title, amount, date });
        
        // Efecto visual
        item.style.transform = 'scale(0.98)';
        setTimeout(() => {
            item.style.transform = '';
        }, 150);
        
        // Aquí puedes abrir un modal con más detalles
        // this.showModal({ title, amount, date });
    }

    /**
     * Configura las barras de progreso
     */
    setupProgressBars() {
        const progressBars = document.querySelectorAll('.progress-bar');
        
        // Observer para animar cuando entran en viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    
                    setTimeout(() => {
                        bar.style.width = width;
                    }, 100);
                    
                    observer.unobserve(bar);
                }
            });
        }, { threshold: 0.5 });
        
        progressBars.forEach(bar => {
            observer.observe(bar);
        });
    }

    /**
     * Carga actividad reciente
     */
    loadRecentActivity() {
        console.log('📊 Cargando actividad reciente...');
        
        // Simular carga de datos (reemplazar con API real)
        setTimeout(() => {
            this.updateDashboardStats();
        }, 500);
    }

    /**
     * Actualiza las estadísticas del dashboard
     */
    updateDashboardStats() {
        // Aquí puedes hacer una petición AJAX para actualizar los datos
        console.log('🔄 Estadísticas actualizadas');
    }

    /**
     * Muestra menú contextual de tarjeta
     */
    showCardMenu(button) {
        console.log('📌 Menú de tarjeta');
        
        // Efecto visual
        button.style.transform = 'rotate(90deg)';
        setTimeout(() => {
            button.style.transform = '';
        }, 200);
        
        // Aquí puedes mostrar un dropdown con opciones
    }

    /**
     * Muestra modal para nueva meta
     */
    showNewGoalModal() {
        console.log('🎯 Abriendo modal de nueva meta');
        
        // Aquí puedes abrir un modal de Bootstrap o custom
        // Por ahora mostramos un alert simple
        alert('Modal de Nueva Meta\n\nAquí puedes crear una nueva meta de ahorro.');
    }

    /**
     * Formatea números como moneda
     */
    formatCurrency(amount) {
        return new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0
        }).format(amount);
    }

    /**
     * Obtiene los datos del dashboard
     */
    async fetchDashboardData() {
        try {
            // Aquí harías una petición real a tu API
            // const response = await fetch('/api/dashboard');
            // const data = await response.json();
            // return data;
            
            console.log('📡 Obteniendo datos del dashboard...');
            return this.dashboardData;
        } catch (error) {
            console.error('❌ Error al obtener datos:', error);
            return null;
        }
    }

    /**
     * Actualiza el gráfico de categorías
     */
    updateCategoriesChart(newData) {
        if (this.charts.pie) {
            this.charts.pie.data.datasets[0].data = newData.map(item => item.value);
            this.charts.pie.update('active');
        }
    }

    /**
     * Destructor - limpia los recursos
     */
    destroy() {
        // Destruir gráficos
        Object.values(this.charts).forEach(chart => {
            if (chart) chart.destroy();
        });
        
        console.log('🧹 Dashboard limpiado');
    }
}

/**
 * ============================================
 * UTILIDADES ADICIONALES
 * ============================================
 */

/**
 * Formatea fechas de manera amigable
 */
function formatRelativeTime(date) {
    const now = new Date();
    const diff = now - new Date(date);
    const seconds = Math.floor(diff / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    
    if (days > 0) return `Hace ${days} día${days > 1 ? 's' : ''}`;
    if (hours > 0) return `Hace ${hours} hora${hours > 1 ? 's' : ''}`;
    if (minutes > 0) return `Hace ${minutes} minuto${minutes > 1 ? 's' : ''}`;
    return 'Justo ahora';
}

/**
 * Muestra notificación toast
 */
function showToast(message, type = 'info') {
    console.log(`🔔 ${type.toUpperCase()}: ${message}`);
    
    // Aquí puedes implementar un sistema de notificaciones toast
    // Por ejemplo con Bootstrap Toast o una librería como Toastify
}

/**
 * Obtiene el color según el tipo de transacción
 */
function getTransactionColor(type) {
    const colors = {
        income: '#10b981',
        expense: '#ef4444',
        saving: '#3b82f6',
        investment: '#8b5cf6'
    };
    return colors[type] || '#64748b';
}

/**
 * Valida formularios
 */
function validateForm(formData) {
    const errors = [];
    
    if (!formData.amount || formData.amount <= 0) {
        errors.push('El monto debe ser mayor a 0');
    }
    
    if (!formData.category) {
        errors.push('Debe seleccionar una categoría');
    }
    
    return {
        isValid: errors.length === 0,
        errors
    };
}

/**
 * ============================================
 * INICIALIZACIÓN
 * ============================================
 */

// Variable global para el dashboard
let dashboardController;

// Esperar a que el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDashboard);
} else {
    initDashboard();
}

/**
 * Función de inicialización
 */
function initDashboard() {
    dashboardController = new DashboardController();
    
    // Hacer accesible globalmente
    window.dashboardController = dashboardController;
}

/**
 * ============================================
 * FUNCIONES PÚBLICAS
 * ============================================
 */

/**
 * Recarga los datos del dashboard
 */
function refreshDashboard() {
    if (dashboardController) {
        dashboardController.loadRecentActivity();
    }
}

/**
 * Exporta los datos del dashboard
 */
function exportDashboardData() {
    console.log('💾 Exportando datos del dashboard...');
    // Implementar lógica de exportación
}

// Exportar para uso en módulos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        DashboardController,
        formatRelativeTime,
        showToast,
        getTransactionColor,
        validateForm
    };
}