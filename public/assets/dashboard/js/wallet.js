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
// NAVEGACIÓN
// ============================================
document.querySelectorAll('.sidebar .nav-link').forEach(item => {
    item.addEventListener('click', function(e) {
        if (this.getAttribute('data-page') && !this.href.includes('.html')) {
            e.preventDefault();
            
            // Remover active de todos
            document.querySelectorAll('.sidebar .nav-link').forEach(nav => {
                nav.classList.remove('active');
            });
            
            // Agregar active al clickeado
            this.classList.add('active');
            
            console.log('Navegando a:', this.getAttribute('data-page'));
        }
    });
});

// ============================================
// ANIMACIÓN DE NÚMEROS (BALANCE)
// ============================================
function animateNumber(element, target, duration = 1500, prefix = '$', decimals = 2) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = prefix + current.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }, 16);
}

// Animar balances al cargar
window.addEventListener('load', function() {
    // Balance total
    const totalBalance = document.querySelector('.total-balance-card h1');
    if (totalBalance) {
        totalBalance.textContent = '$0.00';
        setTimeout(() => {
            animateNumber(totalBalance, 857850);
        }, 300);
    }

    // Balances de tarjetas
    const cardBalances = document.querySelectorAll('.credit-card h4');
    const balanceValues = [45230, 28500, 12800];
    
    cardBalances.forEach((balance, index) => {
        balance.textContent = '$0.00';
        setTimeout(() => {
            animateNumber(balance, balanceValues[index]);
        }, 500 + (index * 200));
    });

    // Balances de cuentas bancarias
    const bankBalances = document.querySelectorAll('.bank-account-item .fw-bold');
    const bankValues = [485230, 285120, 87500];
    
    bankBalances.forEach((balance, index) => {
        balance.textContent = '$0.00';
        setTimeout(() => {
            animateNumber(balance, bankValues[index]);
        }, 800 + (index * 200));
    });
});

// ============================================
// ANIMACIONES DE TARJETAS
// ============================================
const creditCards = document.querySelectorAll('.credit-card');

creditCards.forEach(card => {
    // Efecto 3D al mover el mouse
    card.addEventListener('mousemove', function(e) {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
    });
    
    card.addEventListener('mouseleave', function() {
        card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
    });

    // Click para ver detalles
    card.addEventListener('click', function() {
        const cardNumber = this.querySelector('.card-number span').textContent;
        showCardDetails(cardNumber);
    });
});

function showCardDetails(cardNumber) {
    // Crear modal simple
    const modal = document.createElement('div');
    modal.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #1a1a2e;
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        z-index: 9999;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        animation: fadeIn 0.3s ease;
    `;
    
    modal.innerHTML = `
        <h5 style="margin-bottom: 1rem; color: white;">Detalles de Tarjeta</h5>
        <p style="color: #9ca3af; margin-bottom: 0.5rem;">Número: ${cardNumber}</p>
        <p style="color: #9ca3af; margin-bottom: 0.5rem;">Estado: Activa ✓</p>
        <p style="color: #9ca3af; margin-bottom: 1.5rem;">Límite disponible: Ver app</p>
        <button onclick="this.parentElement.remove(); document.querySelector('.modal-overlay-custom').remove();" 
                style="background: linear-gradient(135deg, #818cf8, #f472b6); color: white; border: none; padding: 0.5rem 1.5rem; border-radius: 0.5rem; cursor: pointer;">
            Cerrar
        </button>
    `;
    
    const overlay = document.createElement('div');
    overlay.className = 'modal-overlay-custom';
    overlay.style.cssText = `
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
        z-index: 9998;
    `;
    
    overlay.addEventListener('click', function() {
        modal.remove();
        overlay.remove();
    });
    
    document.body.appendChild(overlay);
    document.body.appendChild(modal);
}

// ============================================
// BÚSQUEDA
// ============================================
const searchInput = document.querySelector('.search-input');
if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.toLowerCase();
        
        if (query.length > 0) {
            console.log('Buscando:', query);
            
            // Filtrar transacciones
            const transactions = document.querySelectorAll('.transaction-item');
            transactions.forEach(trans => {
                const text = trans.textContent.toLowerCase();
                if (text.includes(query)) {
                    trans.style.display = 'block';
                    trans.style.animation = 'fadeIn 0.3s ease';
                } else {
                    trans.style.display = 'none';
                }
            });
        } else {
            // Mostrar todas si no hay búsqueda
            document.querySelectorAll('.transaction-item').forEach(trans => {
                trans.style.display = 'block';
            });
        }
    });
}

// ============================================
// BARRAS DE PROGRESO ANIMADAS
// ============================================
window.addEventListener('load', function() {
    setTimeout(() => {
        document.querySelectorAll('.progress-bar').forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 100);
        });
    }, 1000);
});

// ============================================
// ACCIONES RÁPIDAS
// ============================================
const quickActions = document.querySelectorAll('.col-6 .btn-outline-light');

quickActions.forEach(btn => {
    btn.addEventListener('click', function() {
        const action = this.querySelector('span').textContent;
        
        // Animación de clic
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);
        
        // Notificación temporal
        showNotification(`Función "${action}" en desarrollo`);
    });
});

function showNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 80px;
        right: 20px;
        background: #1a1a2e;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        border: 1px solid rgba(129, 140, 248, 0.3);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        z-index: 9999;
        animation: slideInRight 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'fadeOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// ============================================
// AGREGAR ESTILOS DE ANIMACIÓN
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
});

// ============================================
// INICIALIZAR TOOLTIPS DE BOOTSTRAP
// ============================================
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// ============================================
// ACTUALIZACIÓN AUTOMÁTICA (SIMULADA)
// ============================================
function refreshWalletData() {
    console.log('Actualizando datos del wallet...');
    
    // Aquí harías fetch a tu API
    // fetch('/api/wallet')
    //     .then(res => res.json())
    //     .then(data => updateWallet(data));
    
    showNotification('✓ Datos actualizados');
}

// Auto-refresh cada 5 minutos (opcional)
// setInterval(refreshWalletData, 300000);

// ============================================
// COPIAR NÚMERO DE TARJETA
// ============================================
document.querySelectorAll('.card-number span').forEach(cardNum => {
    cardNum.style.cursor = 'pointer';
    cardNum.title = 'Click para copiar';
    
    cardNum.addEventListener('click', function(e) {
        e.stopPropagation();
        const text = this.textContent;
        
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Número copiado al portapapeles');
        }).catch(err => {
            console.error('Error al copiar:', err);
        });
    });
});

// ============================================
// EFECTOS DE HOVER EN CUENTAS BANCARIAS
// ============================================
const bankAccounts = document.querySelectorAll('.bank-account-item');

bankAccounts.forEach(account => {
    account.style.cursor = 'pointer';
    
    account.addEventListener('click', function() {
        const bankName = this.querySelector('.fw-medium').textContent;
        const balance = this.querySelector('.fw-bold').textContent;
        
        showNotification(`${bankName}: ${balance}`);
    });
});

// ============================================
// AGREGAR/QUITAR TARJETA
// ============================================
const addCardBtn = document.querySelector('.btn-outline-light');
if (addCardBtn && addCardBtn.textContent.includes('Nueva Tarjeta')) {
    addCardBtn.addEventListener('click', function() {
        showNotification('Formulario de nueva tarjeta próximamente');
    });
}

// ============================================
// DEBUGGING
// ============================================
console.log('Wallet JS cargado correctamente ✅');
console.log('Ancho de pantalla:', window.innerWidth + 'px');
console.log('Tarjetas encontradas:', creditCards.length);
console.log('Cuentas bancarias:', bankAccounts.length);

// ============================================
// EXPORTAR FUNCIONES ÚTILES
// ============================================
window.walletUtils = {
    toggleSidebar,
    refreshWalletData,
    showNotification,
    animateNumber
};