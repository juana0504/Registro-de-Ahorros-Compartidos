/**
 * ============================================
 * SIDEBAR CONTROLLER - Ahorros Ya
 * ============================================
 * Maneja la funcionalidad del sidebar incluyendo:
 * - Toggle collapse/expand
 * - Navegación activa
 * - Responsive móvil
 * - LocalStorage para recordar estado
 * - Accesibilidad
 * ============================================
 */

class SidebarController {
    /**
     * Constructor - Inicializa el sidebar
     */
    constructor() {
        // Elementos del DOM
        this.sidebar = document.getElementById('sidebar');
        this.toggleBtn = document.getElementById('toggleBtn');
        this.overlay = document.getElementById('sidebarOverlay');
        this.navLinks = document.querySelectorAll('.nav-link');
        
        // Configuración
        this.isMobile = window.innerWidth <= 768;
        this.storageKey = 'sidebar_collapsed';
        
        // Inicializar
        this.init();
    }

    /**
     * Inicializa todos los eventos y estado inicial
     */
    init() {
        this.loadSavedState();
        this.attachEventListeners();
        this.setActiveLink();
        this.handleResize();
        
        console.log('✅ Sidebar inicializado correctamente');
    }

    /**
     * Carga el estado guardado del sidebar desde localStorage
     */
    loadSavedState() {
        const isCollapsed = localStorage.getItem(this.storageKey) === 'true';
        
        if (!this.isMobile && isCollapsed) {
            this.sidebar.classList.add('collapsed');
            document.body.classList.add('sidebar-collapsed');
        }
    }

    /**
     * Guarda el estado actual en localStorage
     */
    saveState() {
        const isCollapsed = this.sidebar.classList.contains('collapsed');
        localStorage.setItem(this.storageKey, isCollapsed);
    }

    /**
     * Adjunta todos los event listeners
     */
    attachEventListeners() {
        // Toggle button
        if (this.toggleBtn) {
            this.toggleBtn.addEventListener('click', () => this.toggleSidebar());
        }

        // Overlay (cerrar en móvil)
        if (this.overlay) {
            this.overlay.addEventListener('click', () => this.closeMobileSidebar());
        }

        // Links de navegación
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => this.handleLinkClick(e, link));
        });

        // Resize handler
        window.addEventListener('resize', () => this.handleResize());

        // Teclado (Escape para cerrar en móvil)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMobile) {
                this.closeMobileSidebar();
            }
        });

        // Prevenir cierre al hacer click dentro del sidebar
        this.sidebar.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }

    /**
     * Toggle del sidebar (colapsar/expandir)
     */
    toggleSidebar() {
        if (this.isMobile) {
            this.toggleMobileSidebar();
        } else {
            this.toggleDesktopSidebar();
        }
    }

    /**
     * Toggle para escritorio
     */
    toggleDesktopSidebar() {
        this.sidebar.classList.toggle('collapsed');
        document.body.classList.toggle('sidebar-collapsed');
        this.saveState();

        // Animar el botón
        this.animateToggleButton();
    }

    /**
     * Toggle para móvil
     */
    toggleMobileSidebar() {
        const isActive = this.sidebar.classList.contains('active');
        
        if (isActive) {
            this.closeMobileSidebar();
        } else {
            this.openMobileSidebar();
        }
    }

    /**
     * Abre el sidebar en móvil
     */
    openMobileSidebar() {
        this.sidebar.classList.add('active');
        this.overlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevenir scroll
    }

    /**
     * Cierra el sidebar en móvil
     */
    closeMobileSidebar() {
        this.sidebar.classList.remove('active');
        this.overlay.classList.remove('active');
        document.body.style.overflow = ''; // Restaurar scroll
    }

    /**
     * Anima el botón de toggle
     */
    animateToggleButton() {
        this.toggleBtn.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.toggleBtn.style.transform = 'scale(1)';
        }, 150);
    }

    /**
     * Maneja el click en los links de navegación
     */
    handleLinkClick(event, clickedLink) {
        // Si es un link de logout, permitir comportamiento por defecto
        if (clickedLink.classList.contains('logout')) {
            return;
        }

        // Remover active de todos los links
        this.navLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Agregar active al link clickeado
        clickedLink.classList.add('active');

        // Cerrar sidebar en móvil después de click
        if (this.isMobile) {
            setTimeout(() => {
                this.closeMobileSidebar();
            }, 300);
        }

        // Guardar link activo
        this.saveActiveLink(clickedLink.getAttribute('href'));
    }

    /**
     * Establece el link activo basado en la URL actual
     */
    setActiveLink() {
        const currentPath = window.location.pathname;
        
        this.navLinks.forEach(link => {
            const href = link.getAttribute('href');
            
            // Remover active de todos
            link.classList.remove('active');
            
            // Agregar active si coincide con la ruta actual
            if (href && currentPath.includes(href.split('?')[0])) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Guarda el link activo en localStorage
     */
    saveActiveLink(href) {
        if (href && href !== '#') {
            localStorage.setItem('active_link', href);
        }
    }

    /**
     * Maneja el resize de la ventana
     */
    handleResize() {
        const wasMobile = this.isMobile;
        this.isMobile = window.innerWidth <= 768;

        // Si cambiamos de móvil a escritorio
        if (wasMobile && !this.isMobile) {
            this.closeMobileSidebar();
            this.sidebar.classList.remove('active');
        }

        // Si cambiamos de escritorio a móvil
        if (!wasMobile && this.isMobile) {
            this.sidebar.classList.remove('collapsed');
            document.body.classList.remove('sidebar-collapsed');
        }
    }

    /**
     * Método público para abrir/cerrar desde fuera
     */
    toggle() {
        this.toggleSidebar();
    }

    /**
     * Método público para colapsar
     */
    collapse() {
        if (!this.isMobile) {
            this.sidebar.classList.add('collapsed');
            document.body.classList.add('sidebar-collapsed');
            this.saveState();
        }
    }

    /**
     * Método público para expandir
     */
    expand() {
        if (!this.isMobile) {
            this.sidebar.classList.remove('collapsed');
            document.body.classList.remove('sidebar-collapsed');
            this.saveState();
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
    document.addEventListener('DOMContentLoaded', initSidebar);
} else {
    initSidebar();
}

/**
 * Función de inicialización
 */
function initSidebar() {
    // Crear instancia global del sidebar
    window.sidebarController = new SidebarController();
}

/**
 * ============================================
 * UTILIDADES ADICIONALES
 * ============================================
 */

/**
 * Función helper para abrir el sidebar desde cualquier parte
 * Uso: openSidebar()
 */
function openSidebar() {
    if (window.sidebarController) {
        window.sidebarController.openMobileSidebar();
    }
}

/**
 * Función helper para cerrar el sidebar desde cualquier parte
 * Uso: closeSidebar()
 */
function closeSidebar() {
    if (window.sidebarController) {
        window.sidebarController.closeMobileSidebar();
    }
}

/**
 * Función helper para toggle del sidebar
 * Uso: toggleSidebar()
 */
function toggleSidebar() {
    if (window.sidebarController) {
        window.sidebarController.toggle();
    }
}

// Exportar para uso en módulos (opcional)
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { SidebarController, openSidebar, closeSidebar, toggleSidebar };
}