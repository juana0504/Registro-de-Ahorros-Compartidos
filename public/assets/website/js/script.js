// Funciones para mostrar/ocultar modales
function showLoginModal() {
    document.getElementById('loginModal').classList.add('active');
}

function closeLoginModal() {
    document.getElementById('loginModal').classList.remove('active');
    clearLoginForm();
}

function showRegisterModal() {
    document.getElementById('registerModal').classList.add('active');
}

function closeRegisterModal() {
    document.getElementById('registerModal').classList.remove('active');
    clearRegisterForm();
}

// Alternar entre login y registro
function switchToRegister() {
    closeLoginModal();
    showRegisterModal();
}

function switchToLogin() {
    closeRegisterModal();
    showLoginModal();
}

// Toggle para mostrar/ocultar contraseña
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}

// Limpiar formularios
function clearLoginForm() {
    document.getElementById('loginEmail').value = '';
    document.getElementById('loginPassword').value = '';
}

function clearRegisterForm() {
    document.getElementById('registerName').value = '';
    document.getElementById('registerEmail').value = '';
    document.getElementById('registerPassword').value = '';
    document.getElementById('registerConfirmPassword').value = '';
}

// Validación de email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Manejar Login
function handleLogin() {
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value;

    // Validaciones
    if (!email || !password) {
        alert('Por favor completa todos los campos');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Por favor ingresa un email válido');
        return;
    }

    // Aquí irían las llamadas al backend para autenticación
    // Por ahora es solo una demo
    console.log('Login con:', { email, password });
    
    alert('¡Bienvenido de vuelta! 🎉\n\n(Esto es una demo. Conecta con tu backend para funcionalidad real)');
    closeLoginModal();
}

// Manejar Registro
function handleRegister() {
    const name = document.getElementById('registerName').value.trim();
    const email = document.getElementById('registerEmail').value.trim();
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('registerConfirmPassword').value;

    // Validaciones
    if (!name || !email || !password || !confirmPassword) {
        alert('Por favor completa todos los campos');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Por favor ingresa un email válido');
        return;
    }

    if (password.length < 6) {
        alert('La contraseña debe tener al menos 6 caracteres');
        return;
    }

    if (password !== confirmPassword) {
        alert('Las contraseñas no coinciden');
        return;
    }

    // Aquí irían las llamadas al backend para crear usuario
    // Por ahora es solo una demo
    console.log('Registro con:', { name, email, password });
    
    alert('¡Cuenta creada exitosamente! 🎉\n\n(Esto es una demo. Conecta con tu backend para funcionalidad real)');
    closeRegisterModal();
}

// Cerrar modal al hacer clic fuera
window.onclick = function(event) {
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    
    if (event.target === loginModal) {
        closeLoginModal();
    }
    if (event.target === registerModal) {
        closeRegisterModal();
    }
}

// Manejar tecla Enter en los formularios
document.addEventListener('DOMContentLoaded', function() {
    // Login form
    const loginInputs = ['loginEmail', 'loginPassword'];
    loginInputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleLogin();
                }
            });
        }
    });

    // Register form
    const registerInputs = ['registerName', 'registerEmail', 'registerPassword', 'registerConfirmPassword'];
    registerInputs.forEach(inputId => {
        const input = document.getElementById(inputId);
        if (input) {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleRegister();
                }
            });
        }
    });
});

// Animación de scroll suave para los botones CTA
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});