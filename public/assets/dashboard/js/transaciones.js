// ========================================
// DATOS DE EJEMPLO - Historial Completo
// ========================================
let transactions = [
    // Enero 2025
    { id: 1, concept: 'Salario Mensual', category: 'Salario', type: 'income', amount: 5000, date: '2025-01-01', time: '08:00', notes: 'Pago de nómina empresa XYZ' },
    { id: 2, concept: 'Pago Netflix', category: 'Entretenimiento', type: 'expense', amount: 50, date: '2025-01-02', time: '10:30', notes: 'Plan Premium' },
    { id: 3, concept: 'Supermercado Éxito', category: 'Alimentación', type: 'expense', amount: 350, date: '2025-01-03', time: '18:45', notes: 'Compra mensual' },
    { id: 4, concept: 'Gasolina', category: 'Transporte', type: 'expense', amount: 80, date: '2025-01-04', time: '07:15', notes: 'Tanque lleno' },
    { id: 5, concept: 'Freelance Web', category: 'Freelance', type: 'income', amount: 1200, date: '2025-01-05', time: '16:20', notes: 'Desarrollo página web cliente' },
    { id: 6, concept: 'Restaurante', category: 'Alimentación', type: 'expense', amount: 120, date: '2025-01-06', time: '13:30', notes: 'Almuerzo familiar' },
    { id: 7, concept: 'Spotify Premium', category: 'Entretenimiento', type: 'expense', amount: 25, date: '2025-01-07', time: '09:00', notes: 'Suscripción mensual' },
    { id: 8, concept: 'Farmacia', category: 'Salud', type: 'expense', amount: 65, date: '2025-01-08', time: '11:20', notes: 'Medicamentos' },
    { id: 9, concept: 'Venta artículo usado', category: 'Otros', type: 'income', amount: 200, date: '2025-01-08', time: '15:45', notes: 'Venta por marketplace' },
    { id: 10, concept: 'Electricidad', category: 'Servicios', type: 'expense', amount: 180, date: '2025-01-09', time: '10:00', notes: 'Factura mensual' },
    { id: 11, concept: 'Internet', category: 'Servicios', type: 'expense', amount: 100, date: '2025-01-09', time: '10:15', notes: 'Plan 200 Mbps' },
    { id: 12, concept: 'Taxi Uber', category: 'Transporte', type: 'expense', amount: 35, date: '2025-01-10', time: '08:30', notes: 'Viaje al centro' },
    { id: 13, concept: 'Curso Online', category: 'Educación', type: 'expense', amount: 150, date: '2025-01-10', time: '20:00', notes: 'Udemy - JavaScript Avanzado' },
    { id: 14, concept: 'Cafetería', category: 'Alimentación', type: 'expense', amount: 15, date: '2025-01-11', time: '09:00', notes: 'Café con amigos' },
    { id: 15, concept: 'Bonificación', category: 'Salario', type: 'income', amount: 500, date: '2025-01-11', time: '14:00', notes: 'Bono por desempeño' },
    { id: 16, concept: 'Cine', category: 'Entretenimiento', type: 'expense', amount: 45, date: '2025-01-12', time: '19:30', notes: '2 boletas + combo' },
    { id: 17, concept: 'Supermercado Carulla', category: 'Alimentación', type: 'expense', amount: 280, date: '2025-01-13', time: '17:00', notes: 'Compra semanal' },
    { id: 18, concept: 'Parqueadero', category: 'Transporte', type: 'expense', amount: 20, date: '2025-01-13', time: '12:00', notes: 'Centro comercial' },
    
    // Diciembre 2024
    { id: 19, concept: 'Salario Diciembre', category: 'Salario', type: 'income', amount: 5000, date: '2024-12-01', time: '08:00', notes: 'Nómina mensual' },
    { id: 20, concept: 'Regalo Navidad', category: 'Otros', type: 'expense', amount: 300, date: '2024-12-15', time: '16:30', notes: 'Regalos familia' },
    { id: 21, concept: 'Cena Navidad', category: 'Alimentación', type: 'expense', amount: 250, date: '2024-12-24', time: '19:00', notes: 'Cena familiar' },
    { id: 22, concept: 'Aguinaldo', category: 'Salario', type: 'income', amount: 2000, date: '2024-12-20', time: '10:00', notes: 'Prima de Navidad' },
    
    // Noviembre 2024
    { id: 23, concept: 'Salario Noviembre', category: 'Salario', type: 'income', amount: 5000, date: '2024-11-01', time: '08:00', notes: 'Nómina mensual' },
    { id: 24, concept: 'Freelance Diseño', category: 'Freelance', type: 'income', amount: 800, date: '2024-11-10', time: '14:30', notes: 'Logo para startup' },
    { id: 25, concept: 'Seguro Auto', category: 'Servicios', type: 'expense', amount: 400, date: '2024-11-05', time: '11:00', notes: 'Póliza anual' },
    
    // Más transacciones antiguas
    { id: 26, concept: 'Gym Mensualidad', category: 'Salud', type: 'expense', amount: 120, date: '2024-10-15', time: '07:00', notes: 'Membresía mensual' },
    { id: 27, concept: 'Consulta Médica', category: 'Salud', type: 'expense', amount: 150, date: '2024-10-20', time: '10:30', notes: 'Control general' },
    { id: 28, concept: 'Venta Freelance', category: 'Freelance', type: 'income', amount: 1500, date: '2024-10-25', time: '16:00', notes: 'Proyecto WordPress' },
    { id: 29, concept: 'Amazon Prime', category: 'Entretenimiento', type: 'expense', amount: 30, date: '2024-10-01', time: '00:00', notes: 'Suscripción anual' },
    { id: 30, concept: 'Libros', category: 'Educación', type: 'expense', amount: 85, date: '2024-09-15', time: '14:20', notes: '3 libros técnicos' }
];

// ========================================
// VARIABLES GLOBALES
// ========================================
let filteredTransactions = [...transactions];
const itemsPerPage = 10;
let currentPage = 1;
let chartInstance = null;

// ========================================
// INICIALIZACIÓN
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

function initializeApp() {
    // Configurar fecha y hora actual en el formulario
    const now = new Date();
    document.getElementById('date').valueAsDate = now;
    document.getElementById('time').value = now.toTimeString().slice(0, 5);
    
    // Renderizar contenido inicial
    renderTable();
    initializeChart();
    
    // Event Listeners
    setupEventListeners();
}

// ========================================
// EVENT LISTENERS
// ========================================
function setupEventListeners() {
    // Sidebar toggle
    document.getElementById('menuBtn').onclick = () => {
        document.getElementById('sidebar').classList.toggle('active');
    };
    
    // Filtros
    document.getElementById('search').oninput = applyFilters;
    document.getElementById('typeFilter').onchange = applyFilters;
    document.getElementById('dateFilter').onchange = applyFilters;
    
    // Formulario
    document.getElementById('transactionForm').onsubmit = handleFormSubmit;
    
    // Select all
    document.getElementById('selectAll').onchange = handleSelectAll;
    
    // Delete selected
    document.getElementById('deleteSelected').onclick = deleteSelected;
}

// ========================================
// RENDERIZAR TABLA
// ========================================
function renderTable() {
    const tbody = document.getElementById('tableBody');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedItems = filteredTransactions.slice(start, end);

    if (paginatedItems.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="7" class="empty-state">
                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                    <p class="mb-0">No se encontraron transacciones</p>
                    <small>Intenta ajustar los filtros o agrega una nueva transacción</small>
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = paginatedItems.map(t => `
        <tr class="transaction-row" data-id="${t.id}">
            <td>
                <input type="checkbox" class="form-check-input row-checkbox" value="${t.id}">
            </td>
            <td>
                <div>
                    <strong>${t.concept}</strong>
                    ${t.notes ? `<br><small class="text-secondary">${t.notes}</small>` : ''}
                </div>
            </td>
            <td>
                <span class="badge bg-secondary">${t.category}</span>
            </td>
            <td>
                <div class="date-badge">
                    <i class="bi bi-calendar3"></i> ${formatDate(t.date)}
                    <br>
                    <i class="bi bi-clock"></i> ${t.time}
                </div>
            </td>
            <td>
                <span class="badge-custom ${t.type === 'income' ? 'badge-income' : 'badge-expense'}">
                    <i class="bi bi-arrow-${t.type === 'income' ? 'up' : 'down'}-circle"></i>
                    ${t.type === 'income' ? 'Ingreso' : 'Gasto'}
                </span>
            </td>
            <td class="text-end fw-bold ${t.type === 'income' ? 'text-success' : 'text-danger'}">
                ${t.type === 'income' ? '+' : '-'}$${formatNumber(t.amount)}
            </td>
            <td class="text-end">
                <button class="btn btn-sm action-btn me-1" onclick="editTransaction(${t.id})" title="Editar">
                    <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm action-btn" onclick="deleteTransaction(${t.id})" title="Eliminar">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        </tr>
    `).join('');

    updateStats();
    renderPagination();
}

// ========================================
// ESTADÍSTICAS
// ========================================
function updateStats() {
    const income = transactions
        .filter(t => t.type === 'income')
        .reduce((sum, t) => sum + t.amount, 0);
    
    const expense = transactions
        .filter(t => t.type === 'expense')
        .reduce((sum, t) => sum + t.amount, 0);
    
    const balance = income - expense;
    
    document.getElementById('totalIncome').textContent = formatNumber(income);
    document.getElementById('totalExpense').textContent = formatNumber(expense);
    document.getElementById('balance').textContent = formatNumber(balance);
    document.getElementById('totalTransactions').textContent = transactions.length;
}

// ========================================
// GRÁFICO
// ========================================
function initializeChart() {
    const ctx = document.getElementById('chart').getContext('2d');
    
    // Agrupar datos por día (últimos 7 días)
    const last7Days = getLast7Days();
    const incomeData = [];
    const expenseData = [];
    
    last7Days.forEach(day => {
        const dayTransactions = transactions.filter(t => t.date === day);
        const dayIncome = dayTransactions
            .filter(t => t.type === 'income')
            .reduce((sum, t) => sum + t.amount, 0);
        const dayExpense = dayTransactions
            .filter(t => t.type === 'expense')
            .reduce((sum, t) => sum + t.amount, 0);
        
        incomeData.push(dayIncome);
        expenseData.push(dayExpense);
    });
    
    const labels = last7Days.map(d => formatDateShort(d));
    
    chartInstance = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Ingresos',
                    data: incomeData,
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: 2
                },
                {
                    label: 'Gastos',
                    data: expenseData,
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true,
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    labels: { 
                        color: '#94a3b8',
                        font: { size: 12 }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(26, 31, 53, 0.9)',
                    titleColor: '#f8fafc',
                    bodyColor: '#f8fafc',
                    borderColor: '#6366f1',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': $' + formatNumber(context.parsed.y);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { 
                        color: 'rgba(148, 163, 184, 0.1)',
                        drawBorder: false
                    },
                    ticks: { 
                        color: '#94a3b8',
                        callback: function(value) {
                            return '$' + formatNumber(value);
                        }
                    }
                },
                x: {
                    grid: { 
                        color: 'rgba(148, 163, 184, 0.1)',
                        drawBorder: false
                    },
                    ticks: { color: '#94a3b8' }
                }
            }
        }
    });
}

// ========================================
// PAGINACIÓN
// ========================================
function renderPagination() {
    const totalPages = Math.ceil(filteredTransactions.length / itemsPerPage);
    const pagination = document.getElementById('pagination');
    
    if (totalPages <= 1) {
        pagination.innerHTML = '';
        return;
    }
    
    let html = '';
    
    // Botón anterior
    if (currentPage > 1) {
        html += `<li class="page-item">
            <a class="page-link" href="#" onclick="changePage(${currentPage - 1}); return false;">
                <i class="bi bi-chevron-left"></i>
            </a>
        </li>`;
    }
    
    // Números de página
    for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
            html += `<li class="page-item ${i === currentPage ? 'active' : ''}">
                <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
            </li>`;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
            html += `<li class="page-item disabled">
                <span class="page-link">...</span>
            </li>`;
        }
    }
    
    // Botón siguiente
    if (currentPage < totalPages) {
        html += `<li class="page-item">
            <a class="page-link" href="#" onclick="changePage(${currentPage + 1}); return false;">
                <i class="bi bi-chevron-right"></i>
            </a>
        </li>`;
    }
    
    pagination.innerHTML = html;

    // Actualizar contador
    const start = (currentPage - 1) * itemsPerPage + 1;
    const end = Math.min(start + itemsPerPage - 1, filteredTransactions.length);
    document.getElementById('showingCount').textContent = `${start}-${end}`;
    document.getElementById('totalCount').textContent = filteredTransactions.length;
}

function changePage(page) {
    currentPage = page;
    renderTable();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ========================================
// FILTROS
// ========================================
function applyFilters() {
    const search = document.getElementById('search').value.toLowerCase();
    const type = document.getElementById('typeFilter').value;
    const dateFilter = document.getElementById('dateFilter').value;
    
    filteredTransactions = transactions.filter(t => {
        // Filtro de búsqueda
        const matchSearch = t.concept.toLowerCase().includes(search) || 
                          t.category.toLowerCase().includes(search) ||
                          (t.notes && t.notes.toLowerCase().includes(search));
        
        // Filtro de tipo
        const matchType = type === 'all' || t.type === type;
        
        // Filtro de fecha
        let matchDate = true;
        if (dateFilter !== 'all') {
            const transDate = new Date(t.date + 'T00:00:00');
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (dateFilter === 'today') {
                matchDate = transDate.toDateString() === today.toDateString();
            } else if (dateFilter === 'week') {
                const weekAgo = new Date(today);
                weekAgo.setDate(weekAgo.getDate() - 7);
                matchDate = transDate >= weekAgo;
            } else if (dateFilter === 'month') {
                matchDate = transDate.getMonth() === today.getMonth() && 
                           transDate.getFullYear() === today.getFullYear();
            }
        }
        
        return matchSearch && matchType && matchDate;
    });
    
    currentPage = 1;
    renderTable();
}

// ========================================
// CRUD OPERATIONS
// ========================================
function handleFormSubmit(e) {
    e.preventDefault();
    
    const newTransaction = {
        id: Date.now(), // ID temporal
        concept: document.getElementById('concept').value,
        category: document.getElementById('category').value,
        type: document.getElementById('type').value,
        amount: parseFloat(document.getElementById('amount').value),
        date: document.getElementById('date').value,
        time: document.getElementById('time').value,
        notes: document.getElementById('notes').value
    };
    
    // Agregar al inicio del array
    transactions.unshift(newTransaction);
    filteredTransactions = [...transactions];
    
    // Cerrar modal y resetear formulario
    const modal = bootstrap.Modal.getInstance(document.getElementById('addModal'));
    modal.hide();
    document.getElementById('transactionForm').reset();
    
    // Actualizar fecha y hora
    const now = new Date();
    document.getElementById('date').valueAsDate = now;
    document.getElementById('time').value = now.toTimeString().slice(0, 5);
    
    // Re-renderizar
    renderTable();
    
    // Mostrar notificación (opcional)
    showNotification('Transacción agregada correctamente', 'success');
}

function editTransaction(id) {
    const transaction = transactions.find(t => t.id === id);
    if (!transaction) return;
    
    // Llenar formulario con datos
    document.getElementById('concept').value = transaction.concept;
    document.getElementById('type').value = transaction.type;
    document.getElementById('category').value = transaction.category;
    document.getElementById('amount').value = transaction.amount;
    document.getElementById('date').value = transaction.date;
    document.getElementById('time').value = transaction.time;
    document.getElementById('notes').value = transaction.notes || '';
    
    // Cambiar título del modal
    document.querySelector('#addModal .modal-title').textContent = 'Editar Transacción';
    
    // Abrir modal
    const modal = new bootstrap.Modal(document.getElementById('addModal'));
    modal.show();
    
    // Modificar submit para actualizar en lugar de agregar
    const form = document.getElementById('transactionForm');
    form.onsubmit = function(e) {
        e.preventDefault();
        
        // Actualizar datos
        transaction.concept = document.getElementById('concept').value;
        transaction.category = document.getElementById('category').value;
        transaction.type = document.getElementById('type').value;
        transaction.amount = parseFloat(document.getElementById('amount').value);
        transaction.date = document.getElementById('date').value;
        transaction.time = document.getElementById('time').value;
        transaction.notes = document.getElementById('notes').value;
        
        // Actualizar vista
        filteredTransactions = [...transactions];
        renderTable();
        
        // Cerrar modal
        modal.hide();
        
        // Restaurar función original
        form.onsubmit = handleFormSubmit;
        document.querySelector('#addModal .modal-title').textContent = 'Nueva Transacción';
        
        showNotification('Transacción actualizada correctamente', 'success');
    };
}

function deleteTransaction(id) {
    if (!confirm('¿Estás seguro de eliminar esta transacción?')) return;
    
    transactions = transactions.filter(t => t.id !== id);
    filteredTransactions = [...transactions];
    renderTable();
    
    showNotification('Transacción eliminada', 'info');
}

function handleSelectAll(e) {
    document.querySelectorAll('.row-checkbox').forEach(c => {
        c.checked = e.target.checked;
    });
}

function deleteSelected() {
    const selected = Array.from(document.querySelectorAll('.row-checkbox:checked'))
        .map(c => parseInt(c.value));
    
    if (selected.length === 0) {
        alert('Selecciona al menos una transacción');
        return;
    }
    
    if (!confirm(`¿Eliminar ${selected.length} transacción(es) seleccionada(s)?`)) return;
    
    transactions = transactions.filter(t => !selected.includes(t.id));
    filteredTransactions = [...transactions];
    document.getElementById('selectAll').checked = false;
    renderTable();
    
    showNotification(`${selected.length} transacciones eliminadas`, 'info');
}

// ========================================
// UTILIDADES
// ========================================
function formatNumber(num) {
    return num.toLocaleString('es-CO', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 2
    });
}

function formatDate(dateStr) {
    const date = new Date(dateStr + 'T00:00:00');
    return date.toLocaleDateString('es-ES', { 
        day: '2-digit', 
        month: 'short', 
        year: 'numeric' 
    });
}

function formatDateShort(dateStr) {
    const date = new Date(dateStr + 'T00:00:00');
    const days = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
    return days[date.getDay()];
}

function getLast7Days() {
    const days = [];
    for (let i = 6; i >= 0; i--) {
        const date = new Date();
        date.setDate(date.getDate() - i);
        days.push(date.toISOString().split('T')[0]);
    }
    return days;
}

function showNotification(message, type = 'info') {
    // Implementación simple - puedes mejorarla con toast notifications
    console.log(`[${type.toUpperCase()}] ${message}`);
    
    // Opcional: Usar Bootstrap toast
    // const toast = document.createElement('div');
    // toast.className = 'toast';
    // ...
}