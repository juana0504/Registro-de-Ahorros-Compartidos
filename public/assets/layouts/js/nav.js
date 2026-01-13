/**
 * ============================================
 * HEADER NAVBAR CONTROLLER - Ahorros Ya
 * ============================================
 * Maneja la funcionalidad del header incluyendo:
 * - Dropdown del usuario
 * - Búsqueda móvil
 * - Notificaciones
 * - Integración con sidebar
 * - Animaciones y transiciones
 * ============================================
 */

class HeaderController {
    /**
     * Constructor - Inicializa el header
     */
    constructor() {
        // Elementos del DOM
        this.navbar = document.querySelector('.navbar-top');
        this.hamburgerBtn = document.querySelector('.hamburger-btn');
        this.searchInput = document.querySelector('.search-input');
        this.mobileSearch = document.querySelector('.mobile-search');
        this.mobileSearchBtn = document.querySelector('.mobile-search-btn');
        this.userAvatar = document.querySelector('.user-avatar-container');
        this.userDropdown = document.querySelector('.user-dropdown');
        this.notificationBtn = document.querySelector('.notification-btn');
        
        // Estado
        this.dropdownOpen = false;
        this.mobileSearchOpen = false;
        
        // Inicializar
        this.init();
    }

    /**
     * Inicializa todos los eventos
     */
    init() {
        this.attachEventListeners();
        this.setupSearch();
        this.loadUserData();
        
        console.log('✅ Header inicializado correctamente');
    }

    /**
     * Adjunta todos los event listeners
     */
    attachEventListeners() {
        // Hamburger menu (móvil)
        if (this.hamburgerBtn) {
            this.hamburgerBtn.addEventListener('click', () => {
                this.toggleMobileSidebar();
            });
        }

        // Avatar dropdown
        if (this.userAvatar) {
            this.userAvatar.addEventListener('click', (e) => {
                e.stopPropagation();
                this.toggleUserDropdown();
            });
        }

        // Cerrar dropdown al hacer click fuera
        document.addEventListener('click', (e) => {
            if (this.dropdownOpen && !this.userDropdown?.contains(e.target)) {
                this.closeUserDropdown();
            }
        });

        // Cerrar dropdown con ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (this.dropdownOpen) {
                    this.closeUserDropdown();
                }
                if (this.mobileSearchOpen) {
                    this.closeMobileSearch();
                }
            }
        });

        // Búsqueda móvil
        if (this.mobileSearchBtn) {
            this.mobileSearchBtn.addEventListener('click', () => {
                this.toggleMobileSearch();
            });
        }

        // Notificaciones
        if (this.notificationBtn) {
            this.notificationBtn.addEventListener('click', () => {
                this.handleNotifications();
            });
        }

        // Items del dropdown
        this.setupDropdownItems();

        // Scroll handler para efecto de sombra
        this.setupScrollEffect();
    }

    /**
     * Toggle del sidebar móvil
     */
    toggleMobileSidebar() {
        if (window.sidebarController) {
            window.sidebarController.toggle();
        } else if (typeof toggleSidebar === 'function') {
            toggleSidebar();
        }
    }

    /**
     * Toggle del dropdown de usuario
     */
    toggleUserDropdown() {
        if (this.dropdownOpen) {
            this.closeUserDropdown();
        } else {
            this.openUserDropdown();
        }
    }

    /**
     * Abre el dropdown de usuario
     */
    openUserDropdown() {
        if (!this.userDropdown) return;
        
        this.userDropdown.classList.add('show');
        this.dropdownOpen = true;
        
        // Animación de entrada para los items
        const items = this.userDropdown.querySelectorAll('.dropdown-item');
        items.forEach((item, index) => {
            item.style.animation = 'none';
            setTimeout(() => {
                item.style.animation = `slideInDown 0.3s ease ${index * 0.05}s both`;
            }, 10);
        });
    }

    /**
     * Cierra el dropdown de usuario
     */
    closeUserDropdown() {
        if (!this.userDropdown) return;
        
        this.userDropdown.classList.remove('show');
        this.dropdownOpen = false;
    }

    /**
     * Configura los items del dropdown
     */
    setupDropdownItems() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        
        dropdownItems.forEach(item => {
            item.addEventListener('click', (e) => {
                const action = item.dataset.action;
                
                if (action) {
                    e.preventDefault();
                    this.handleDropdownAction(action);
                }
                
                // Cerrar dropdown después de la acción
                setTimeout(() => {
                    this.closeUserDropdown();
                }, 200);
            });
        });
    }

    /**
     * Maneja las acciones del dropdown
     */
    handleDropdownAction(action) {
        switch (action) {
            case 'profile':
                console.log('Navegar a perfil');
                // window.location.href = '/profile';
                break;
                
            case 'settings':
                console.log('Navegar a configuración');
                // window.location.href = '/settings';
                break;
                
            case 'help':
                console.log('Abrir centro de ayuda');
                break;
                
            case 'logout':
                this.handleLogout();
                break;
                
            default:
                console.log(`Acción no manejada: ${action}`);
        }
    }

    /**
     * Maneja el cierre de sesión
     */
    handleLogout() {
        const confirmed = confirm('¿Estás seguro de que deseas cerrar sesión?');
        
        if (confirmed) {
            console.log('Cerrando sesión...');
            
            // Mostrar loading
            this.showLoadingState();
            
            // Simular logout (reemplazar con tu lógica real)
            setTimeout(() => {
                // window.location.href = '/logout';
                console.log('Usuario desconectado');
            }, 1000);
        }
    }

    /**
     * Muestra estado de carga
     */
    showLoadingState() {
        // Puedes agregar un spinner o overlay aquí
        console.log('Mostrando estado de carga...');
    }

    /**
     * Configura la funcionalidad de búsqueda
     */
    setupSearch() {
        if (!this.searchInput) return;

        // Búsqueda en tiempo real (debounced)
        let searchTimeout;
        
        this.searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            
            const query = e.target.value.trim();
            
            if (query.length > 0) {
                searchTimeout = setTimeout(() => {
                    this.performSearch(query);
                }, 500); // Esperar 500ms después de que el usuario deje de escribir
            }
        });

        // Enter para buscar
        this.searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                const query = e.target.value.trim();
                if (query) {
                    this.performSearch(query);
                }
            }
        });
    }

    /**
     * Realiza la búsqueda
     */
    performSearch(query) {
        console.log(`🔍 Buscando: "${query}"`);
        
        // Aquí puedes implementar tu lógica de búsqueda
        // Ejemplo: hacer una petición AJAX
        
        /*
        fetch(`/api/search?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                this.displaySearchResults(data);
            })
            .catch(error => {
                console.error('Error en búsqueda:', error);
            });
        */
    }

    /**
     * Toggle de búsqueda móvil
     */
    toggleMobileSearch() {
        if (this.mobileSearchOpen) {
            this.closeMobileSearch();
        } else {
            this.openMobileSearch();
        }
    }

    /**
     * Abre búsqueda móvil
     */
    openMobileSearch() {
        if (!this.mobileSearch) return;
        
        this.mobileSearch.classList.add('active');
        this.mobileSearchOpen = true;
        
        // Focus en el input
        const input = this.mobileSearch.querySelector('.search-input');
        if (input) {
            setTimeout(() => input.focus(), 300);
        }
    }

    /**
     * Cierra búsqueda móvil
     */
    closeMobileSearch() {
        if (!this.mobileSearch) return;
        
        this.mobileSearch.classList.remove('active');
        this.mobileSearchOpen = false;
    }

    /**
     * Maneja las notificaciones
     */
    handleNotifications() {
        console.log('📬 Abriendo notificaciones');
        
        // Aquí puedes abrir un modal o sidebar con notificaciones
        // Por ahora solo mostramos un log
        
        // Remover el badge de notificación
        const badge = this.notificationBtn?.querySelector('.notification-count');
        if (badge) {
            badge.style.animation = 'fadeOut 0.3s ease';
            setTimeout(() => {
                badge.remove();
            }, 300);
        }
    }

    /**
     * Carga datos del usuario
     */
    loadUserData() {
        // Aquí puedes cargar datos del usuario desde una API
        // Por ahora usamos datos de ejemplo
        
        const userData = {
            name: 'Usuario',
            email: 'usuario@ejemplo.com',
            avatar: 'https://i.pravatar.cc/40?img=47',
            notifications: 3
        };
        
        this.updateUserData(userData);
    }

    /**
     * Actualiza los datos del usuario en el UI
     */
    updateUserData(data) {
        // Actualizar nombre en el saludo
        const greetingName = document.querySelector('.greeting-name');
        if (greetingName) {
            const nameText = greetingName.querySelector('span') || greetingName;
            nameText.textContent = data.name;
        }

        // Actualizar email en dropdown
        const dropdownEmail = document.querySelector('.dropdown-user-email');
        if (dropdownEmail) {
            dropdownEmail.textContent = data.email;
        }

        // Actualizar nombre en dropdown
        const dropdownName = document.querySelector('.dropdown-user-name');
        if (dropdownName) {
            dropdownName.textContent = data.name;
        }

        console.log('✅ Datos de usuario actualizados');
    }

    /**
     * Setup del efecto de scroll en el header
     */
    setupScrollEffect() {
        let lastScroll = 0;
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            // Agregar sombra al hacer scroll
            if (currentScroll > 10) {
                this.navbar?.classList.add('scrolled');
            } else {
                this.navbar?.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });
    }

    /**
     * Obtiene la hora del día para el saludo
     */
    getTimeOfDay() {
        const hour = new Date().getHours();
        
        if (hour < 12) return 'Buenos días';
        if (hour < 18) return 'Buenas tardes';
        return 'Buenas noches';
    }

    /**
     * Actualiza el saludo según la hora
     */
    updateGreeting() {
        const greetingText = document.querySelector('.greeting-text');
        if (greetingText) {
            greetingText.textContent = this.getTimeOfDay();
        }
    }
}

/**
 * ============================================
 * INICIALIZACIÓN
 * ============================================
 */

// Esperar a que el DOM esté listo
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeader);
} else {
    initHeader();
}

/**
 * Función de inicialización
 */
function initHeader() {
    // Crear instancia global del header
    window.headerController = new HeaderController();
    
    // Actualizar saludo según la hora
    window.headerController.updateGreeting();
}

/**
 * ============================================
 * ANIMACIONES CSS (agregar al CSS)
 * ============================================
 */

// Agregar estas animaciones a tu CSS:
/*
@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: scale(1);
    }
    to {
        opacity: 0;
        transform: scale(0.8);
    }
}
*/

/**
 * ============================================
 * UTILIDADES PÚBLICAS
 * ============================================
 */

/**
 * Función helper para actualizar notificaciones
 */
function updateNotificationCount(count) {
    const badge = document.querySelector('.notification-count');
    if (badge) {
        badge.textContent = count;
        if (count === 0) {
            badge.style.display = 'none';
        }
    }
}

/**
 * Función helper para mostrar notificación
 */
function showNotification(message, type = 'info') {
    console.log(`🔔 ${type.toUpperCase()}: ${message}`);
    // Aquí puedes implementar un sistema de notificaciones toast
}

// Exportar para uso en módulos
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { 
        HeaderController, 
        updateNotificationCount, 
        showNotification 
    };
}