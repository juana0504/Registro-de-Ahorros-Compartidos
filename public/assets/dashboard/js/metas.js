// ===== DATOS DE EJEMPLO (REEMPLAZAR CON DATOS REALES DE LA BASE DE DATOS) =====
let goals = [
    {
        id: 1,
        name: 'Vacaciones en Europa',
        category: 'Vacaciones',
        target: 5000,
        current: 2500,
        deadline: '2026-07-01',
        priority: 'alta',
        status: 'active',
        description: 'Viaje familiar a Paris y Roma',
        createdAt: '2025-01-01',
        savings: [
            { date: '2025-01-15', amount: 500, note: 'Ahorro mensual' },
            { date: '2025-02-15', amount: 500, note: 'Ahorro mensual' },
            { date: '2025-03-15', amount: 1500, note: 'Bono extra' }
        ]
    },
    {
        id: 2,
        name: 'Fondo de Emergencias',
        category: 'Emergencias',
        target: 10000,
        current: 7500,
        deadline: '2026-12-31',
        priority: 'alta',
        status: 'active',
        description: 'Colchón financiero para imprevistos',
        createdAt: '2025-01-01',
        savings: []
    },
    {
        id: 3,
        name: 'Nuevo Laptop',
        category: 'Tecnología',
        target: 1500,
        current: 1500,
        deadline: '2025-12-31',
        priority: 'media',
        status: 'completed',
        description: 'MacBook Pro M3',
        createdAt: '2024-10-01',
        completedAt: '2025-12-15',
        savings: []
    }
];

// ===== VARIABLES GLOBALES =====
let currentFilters = {
    search: '',
    status: 'all',
    category: 'all',
    sort: 'date'
};

let editingGoalId = null;

// ===== INICIALIZACIÓN =====
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
    setupEventListeners();
});

function initializeApp() {
    updateStats();
    renderGoals();
    setDefaultDate();
}

// ===== EVENT LISTENERS =====
function setupEventListeners() {
    // Formulario de nueva meta
    document.getElementById('goalForm').addEventListener('submit', handleGoalSubmit);
    
    // Formulario de ahorro
    document.getElementById('savingForm').addEventListener('submit', handleSavingSubmit);
    
    // Filtros
    document.getElementById('searchGoal').addEventListener('input', handleSearch);
    document.getElementById('statusFilter').addEventListener('change', handleStatusFilter);
    document.getElementById('categoryFilter').addEventListener('change', handleCategoryFilter);
    document.getElementById('sortFilter').addEventListener('change', handleSortFilter);
    
    // Modal events
    document.getElementById('addGoalModal').addEventListener('hidden.bs.modal', resetGoalForm);
}

// ===== FUNCIONES DE RENDERIZADO =====
function renderGoals() {
    const filteredGoals = filterGoals();
    const activeGoals = filteredGoals.filter(g => g.status === 'active');
    const completedGoals = filteredGoals.filter(g => g.status === 'completed');
    
    renderGoalContainer('activeGoalsContainer', activeGoals);
    renderGoalContainer('completedGoalsContainer', completedGoals);
}

function renderGoalContainer(containerId, goals) {
    const container = document.getElementById(containerId);
    
    if (goals.length === 0) {
        container.innerHTML = `
            <div class="col-12">
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h5>No hay metas ${containerId.includes('completed') ? 'completadas' : 'activas'}</h5>
                    <p>Comienza creando una nueva meta de ahorro</p>
                </div>
            </div>
        `;
        return;
    }
    
    container.innerHTML = goals.map(goal => createGoalCard(goal)).join('');
}

function createGoalCard(goal) {
    const progress = calculateProgress(goal.current, goal.target);
    const daysLeft = calculateDaysLeft(goal.deadline);
    const isOverdue = daysLeft < 0 && goal.status === 'active';
    
    const categoryIcons = {
        'Vacaciones': '🏖️',
        'Auto': '🚗',
        'Casa': '🏠',
        'Emergencias': '🆘',
        'Educación': '📚',
        'Tecnología': '💻',
        'Salud': '❤️',
        'Otros': '📌'
    };
    
    return `
        <div class="col-md-6 col-lg-4">
            <div class="goal-card ${goal.status}">
                <div class="goal-header">
                    <div>
                        <h4 class="goal-title">${goal.name}</h4>
                        <div class="goal-category">
                            <span>${categoryIcons[goal.category] || '📌'}</span>
                            <span>${goal.category}</span>
                        </div>
                    </div>
                    <div class="goal-amount">
                        <span class="goal-current">$${formatNumber(goal.current)}</span>
                        <span class="goal-target">de $${formatNumber(goal.target)}</span>
                    </div>
                </div>
                
                <div class="progress-section">
                    <div class="progress-label">
                        <span>Progreso</span>
                        <span class="progress-percentage">${progress}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: ${progress}%"></div>
                    </div>
                </div>
                
                <div class="goal-info">
                    <div class="info-item">
                        <div class="info-label">Plazo</div>
                        <div class="info-value ${isOverdue ? 'text-danger' : ''}">
                            <i class="bi bi-calendar"></i>
                            <span>${isOverdue ? 'Vencido' : daysLeft > 0 ? daysLeft + ' días' : 'Hoy'}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Prioridad</div>
                        <div class="info-value">
                            <span class="priority-badge priority-${goal.priority}">
                                ${goal.priority === 'alta' ? '🔴' : goal.priority === 'media' ? '🟡' : '🟢'}
                                ${capitalizeFirst(goal.priority)}
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="goal-actions">
                    ${goal.status === 'active' ? `
                        <button class="btn-goal-action btn-primary-custom" onclick="openAddSavingModal(${goal.id})">
                            <i class="bi bi-plus-circle"></i> Ahorrar
                        </button>
                    ` : ''}
                    <button class="btn-goal-action" onclick="viewGoalDetail(${goal.id})">
                        <i class="bi bi-eye"></i> Ver
                    </button>
                    <button class="btn-goal-action" onclick="editGoal(${goal.id})">
                        <i class="bi bi-pencil"></i> Editar
                    </button>
                    <button class="btn-goal-action" onclick="deleteGoal(${goal.id})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    `;
}

// ===== FUNCIONES DE ESTADÍSTICAS =====
function updateStats() {
    const activeGoals = goals.filter(g => g.status === 'active').length;
    const completedGoals = goals.filter(g => g.status === 'completed').length;
    const totalSaved = goals.reduce((sum, g) => sum + g.current, 0);
    const avgProgress = goals.length > 0 
        ? Math.round(goals.reduce((sum, g) => sum + calculateProgress(g.current, g.target), 0) / goals.length)
        : 0;
    
    document.getElementById('activeGoals').textContent = activeGoals;
    document.getElementById('completedGoals').textContent = completedGoals;
    document.getElementById('totalSaved').textContent = formatNumber(totalSaved);
    document.getElementById('avgProgress').textContent = avgProgress;
}

// ===== FUNCIONES DE FILTRADO =====
function filterGoals() {
    let filtered = [...goals];
    
    // Búsqueda por texto
    if (currentFilters.search) {
        const search = currentFilters.search.toLowerCase();
        filtered = filtered.filter(g => 
            g.name.toLowerCase().includes(search) ||
            g.category.toLowerCase().includes(search) ||
            g.description.toLowerCase().includes(search)
        );
    }
    
    // Filtro por estado
    if (currentFilters.status !== 'all') {
        filtered = filtered.filter(g => g.status === currentFilters.status);
    }
    
    // Filtro por categoría
    if (currentFilters.category !== 'all') {
        filtered = filtered.filter(g => g.category === currentFilters.category);
    }
    
    // Ordenamiento
    filtered.sort((a, b) => {
        switch (currentFilters.sort) {
            case 'date':
                return new Date(b.createdAt) - new Date(a.createdAt);
            case 'progress':
                const progressA = calculateProgress(a.current, a.target);
                const progressB = calculateProgress(b.current, b.target);
                return progressB - progressA;
            case 'amount':
                return b.target - a.target;
            default:
                return 0;
        }
    });
    
    return filtered;
}

function handleSearch(e) {
    currentFilters.search = e.target.value;
    renderGoals();
}

function handleStatusFilter(e) {
    currentFilters.status = e.target.value;
    renderGoals();
}

function handleCategoryFilter(e) {
    currentFilters.category = e.target.value;
    renderGoals();
}

function handleSortFilter(e) {
    currentFilters.sort = e.target.value;
    renderGoals();
}

// ===== FUNCIONES DE FORMULARIO =====
function handleGoalSubmit(e) {
    e.preventDefault();
    
    const goalData = {
        name: document.getElementById('goalName').value,
        category: document.getElementById('goalCategory').value,
        target: parseFloat(document.getElementById('goalTarget').value),
        current: parseFloat(document.getElementById('goalCurrent').value) || 0,
        deadline: document.getElementById('goalDeadline').value,
        priority: document.getElementById('goalPriority').value,
        description: document.getElementById('goalDescription').value,
        status: 'active',
        savings: []
    };
    
    if (editingGoalId) {
        // Editar meta existente
        const goalIndex = goals.findIndex(g => g.id === editingGoalId);
        if (goalIndex !== -1) {
            goals[goalIndex] = { ...goals[goalIndex], ...goalData };
            showNotification('Meta actualizada correctamente', 'success');
        }
    } else {
        // Crear nueva meta
        const newGoal = {
            ...goalData,
            id: Date.now(),
            createdAt: new Date().toISOString().split('T')[0]
        };
        goals.unshift(newGoal);
        showNotification('Meta creada correctamente', 'success');
    }
    
    updateStats();
    renderGoals();
    closeModal('addGoalModal');
    resetGoalForm();
}

function handleSavingSubmit(e) {
    e.preventDefault();
    
    const goalId = parseInt(document.getElementById('savingGoalId').value);
    const amount = parseFloat(document.getElementById('savingAmount').value);
    const date = document.getElementById('savingDate').value;
    const note = document.getElementById('savingNote').value;
    
    const goalIndex = goals.findIndex(g => g.id === goalId);
    if (goalIndex !== -1) {
        const goal = goals[goalIndex];
        
        // Agregar ahorro
        goal.savings.push({ date, amount, note });
        goal.current += amount;
        
        // Verificar si se completó la meta
        if (goal.current >= goal.target && goal.status === 'active') {
            goal.status = 'completed';
            goal.completedAt = date;
            showNotification('¡Felicidades! Has completado tu meta 🎉', 'success');
        } else {
            showNotification(`Se agregaron $${formatNumber(amount)} a tu meta`, 'success');
        }
        
        updateStats();
        renderGoals();
        closeModal('addSavingModal');
        document.getElementById('savingForm').reset();
    }
}

function resetGoalForm() {
    document.getElementById('goalForm').reset();
    document.getElementById('goalId').value = '';
    document.getElementById('modalTitle').textContent = 'Nueva Meta de Ahorro';
    editingGoalId = null;
}

// ===== FUNCIONES DE ACCIONES =====
function openAddSavingModal(goalId) {
    const goal = goals.find(g => g.id === goalId);
    if (!goal) return;
    
    document.getElementById('savingGoalId').value = goalId;
    document.getElementById('savingDate').value = new Date().toISOString().split('T')[0];
    
    const modal = new bootstrap.Modal(document.getElementById('addSavingModal'));
    modal.show();
}

function editGoal(goalId) {
    const goal = goals.find(g => g.id === goalId);
    if (!goal) return;
    
    editingGoalId = goalId;
    
    document.getElementById('modalTitle').textContent = 'Editar Meta';
    document.getElementById('goalName').value = goal.name;
    document.getElementById('goalCategory').value = goal.category;
    document.getElementById('goalTarget').value = goal.target;
    document.getElementById('goalCurrent').value = goal.current;
    document.getElementById('goalDeadline').value = goal.deadline;
    document.getElementById('goalPriority').value = goal.priority;
    document.getElementById('goalDescription').value = goal.description || '';
    
    const modal = new bootstrap.Modal(document.getElementById('addGoalModal'));
    modal.show();
}

function deleteGoal(goalId) {
    if (confirm('¿Estás seguro de eliminar esta meta?')) {
        goals = goals.filter(g => g.id !== goalId);
        updateStats();
        renderGoals();
        showNotification('Meta eliminada correctamente', 'info');
    }
}

function viewGoalDetail(goalId) {
    const goal = goals.find(g => g.id === goalId);
    if (!goal) return;
    
    const progress = calculateProgress(goal.current, goal.target);
    const daysLeft = calculateDaysLeft(goal.deadline);
    const remaining = goal.target - goal.current;
    
    const detailHTML = `
        <div class="row">
            <div class="col-md-6 mb-3">
                <h6 class="text-secondary mb-2">Información General</h6>
                <div class="card-custom">
                    <p><strong>Meta:</strong> ${goal.name}</p>
                    <p><strong>Categoría:</strong> ${goal.category}</p>
                    <p><strong>Objetivo:</strong> $${formatNumber(goal.target)}</p>
                    <p><strong>Ahorrado:</strong> $${formatNumber(goal.current)}</p>
                    <p><strong>Faltante:</strong> $${formatNumber(remaining)}</p>
                    <p><strong>Progreso:</strong> ${progress}%</p>
                    <p><strong>Prioridad:</strong> ${capitalizeFirst(goal.priority)}</p>
                    <p class="mb-0"><strong>Fecha límite:</strong> ${formatDate(goal.deadline)} (${daysLeft} días)</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h6 class="text-secondary mb-2">Historial de Ahorros</h6>
                <div class="card-custom" style="max-height: 300px; overflow-y: auto;">
                    ${goal.savings.length > 0 ? goal.savings.map(s => `
                        <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-secondary">
                            <div>
                                <div class="text-success fw-bold">+$${formatNumber(s.amount)}</div>
                                <small class="text-secondary">${formatDate(s.date)}</small>
                                ${s.note ? `<div><small>${s.note}</small></div>` : ''}
                            </div>
                        </div>
                    `).join('') : '<p class="text-secondary">No hay ahorros registrados</p>'}
                </div>
            </div>
        </div>
        ${goal.description ? `
            <div class="mb-3">
                <h6 class="text-secondary mb-2">Descripción</h6>
                <div class="card-custom">
                    <p class="mb-0">${goal.description}</p>
                </div>
            </div>
        ` : ''}
    `;
    
    document.getElementById('goalDetailContent').innerHTML = detailHTML;
    
    const modal = new bootstrap.Modal(document.getElementById('detailGoalModal'));
    modal.show();
}

// ===== FUNCIONES AUXILIARES =====
function calculateProgress(current, target) {
    if (target === 0) return 0;
    return Math.min(Math.round((current / target) * 100), 100);
}

function calculateDaysLeft(deadline) {
    const today = new Date();
    const deadlineDate = new Date(deadline);
    const diffTime = deadlineDate - today;
    return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
}

function formatNumber(number) {
    return number.toLocaleString('es-CO', { minimumFractionDigits: 0, maximumFractionDigits: 0 });
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('es-CO', { year: 'numeric', month: 'long', day: 'numeric' });
}

function capitalizeFirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function setDefaultDate() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('savingDate').value = today;
}

function closeModal(modalId) {
    const modalElement = document.getElementById(modalId);
    const modal = bootstrap.Modal.getInstance(modalElement);
    if (modal) modal.hide();
}

function showNotification(message, type = 'info') {
    // Implementar sistema de notificaciones (puedes usar Toast de Bootstrap o crear uno personalizado)
    alert(message);
}

// ===== MENÚ MÓVIL =====
document.getElementById('menuBtn')?.addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    sidebar?.classList.toggle('active');
});