<form action="<?= BASE_URL ?>/guardar-usuario" method="POST" enctype="multipart/form-data">
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <button onclick="closeRegisterModal()" class="close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="text-center mb-8">
                <svg class="w-12 h-12 text-green-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-900">Crear Cuenta</h2>
                <p class="text-gray-600 mt-2">Comienza tu viaje financiero</p>
            </div>


            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="nombre" id="registerName" class="input-field" placeholder="Tu nombre">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="registerEmail" class="input-field" placeholder="tu@email.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input type="password" name="clave" id="registerPassword" class="input-field" placeholder="••••••••">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Contraseña</label>
                    <input type="password" name="confirmar_contrasena" id="registerConfirmPassword" class="input-field" placeholder="••••••••">
                </div>

                <button type="submit" class="btn-primary">
                    Crear Cuenta
                </button>
            </div>

            <p class="text-center text-sm text-gray-600 mt-6">
                ¿Ya tienes cuenta?
                <button onclick="switchToLogin()" class="text-blue-600 font-medium hover:underline">
                    Inicia sesión
                </button>
            </p>
        </div>
    </div>
</form>