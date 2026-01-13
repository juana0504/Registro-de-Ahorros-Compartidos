/* =========================
   MODALES
========================= */
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

function switchToRegister() {
    closeLoginModal();
    showRegisterModal();
}

function switchToLogin() {
    closeRegisterModal();
    showLoginModal();
}

/* =========================
   TOGGLE PASSWORD
========================= */
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    input.type = input.type === 'password' ? 'text' : 'password';
}

/* =========================
   LIMPIAR FORMULARIOS
========================= */
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

/* =========================
   VALIDACIONES
========================= */
function isValidEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

/* =========================
   LOGIN
========================= */
function handleLogin() {
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value;

    if (!email || !password) {
        alert('Por favor completa todos los campos');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Ingresa un email válido');
        return;
    }

    // ✅ Cuando conectes con PHP, descomenta:
    // document.getElementById('loginForm').submit();
}

/* =========================
   REGISTRO
========================= */
function handleRegister() {
    const name = document.getElementById('registerName').value.trim();
    const email = document.getElementById('registerEmail').value.trim();
    const password = document.getElementById('registerPassword').value;
    const confirm = document.getElementById('registerConfirmPassword').value;

    if (!name || !email || !password || !confirm) {
        alert('Completa todos los campos');
        return;
    }

    if (!isValidEmail(email)) {
        alert('Email inválido');
        return;
    }

    if (password.length < 6) {
        alert('La contraseña debe tener mínimo 6 caracteres');
        return;
    }

    if (password !== confirm) {
        alert('Las contraseñas no coinciden');
        return;
    }

    alert('Registro exitoso (demo)');
    closeRegisterModal();
}

/* =========================
   EVENTOS
========================= */
document.addEventListener('DOMContentLoaded', () => {

    /* SUBMIT LOGIN */
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', e => {
            e.preventDefault();
            handleLogin();
        });
    }

    /* ENTER LOGIN */
    ['loginEmail', 'loginPassword'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('keydown', e => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleLogin();
                }
            });
        }
    });

    /* ENTER REGISTER */
    ['registerName', 'registerEmail', 'registerPassword', 'registerConfirmPassword'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener('keydown', e => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleRegister();
                }
            });
        }
    });

});

/* =========================
   CERRAR MODAL AL CLICK FUERA
========================= */
window.onclick = e => {
    if (e.target === document.getElementById('loginModal')) closeLoginModal();
    if (e.target === document.getElementById('registerModal')) closeRegisterModal();
};

/* =========================
   SCROLL SUAVE
========================= */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) target.scrollIntoView({ behavior: 'smooth' });
    });
});
