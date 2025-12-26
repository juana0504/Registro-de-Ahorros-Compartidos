<form action="">
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <button onclick="closeLoginModal()" class="close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="text-center mb-8">
                <svg class="w-12 h-12 text-blue-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-900">Iniciar Sesión</h2>
                <p class="text-gray-600 mt-2">Bienvenido de vuelta</p>
            </div>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="loginEmail" class="input-field" placeholder="tu@email.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <div class="relative">
                        <input type="password" id="loginPassword" class="input-field" placeholder="••••••••">
                        <button onclick="togglePassword('loginPassword')" class="password-toggle">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button onclick="handleLogin()" class="btn-primary">
                    Entrar
                </button>
            </div>

            <p class="text-center text-sm text-gray-600 mt-6">
                ¿No tienes cuenta?
                <button type="submit" class="text-blue-600 font-medium hover:underline">
                    Regístrate aquí
                </button>
            </p>
        </div>
    </div>
</form>