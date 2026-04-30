

<?php include_once("header.php"); ?>

<header class="w-full bg-light py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold text-navy-blue" style="font-size: 13px;"><h3>Potencia tus resultados</h3></span>
                <a href="#" class="btn-pink-soft text-pink px-4 py-1 rounded-full font-bold text-decoration-none transition-all hover:bg-pink hover:text-white" style="font-size: 12px;">
                   <h3>Hazte Premium</h3> 
                </a>
            </div>
            <div class="fw-bold text-navy-blue" style="font-size: 13px;">
                Atención al Cliente : 632-426029
            </div>
        </div>
    </div>
</header>

<main class="proveedor-page">
    <section class="hero-auth">
        <div class="container-flex">
            <!-- Bloque Izquierdo: Glassmorphism -->
            <div class="glass-card">
                <h2>¡Haz crecer tu negocio con Nosotros!</h2>
                <ul class="text-start d-inline-block">
                    <li>Recibe Solicitudes de Presupuestos</li>
                    <li>Consigue Nuevos Clientes</li>
                </ul>
                <div class="mt-4">
                    <button class="btn-register" onclick="showAuthForm('register')">Regístrate Gratis</button>
                </div>
            </div>

            <!-- Bloque Derecho: Formulario -->
            <div class="login-card">
                <div class="auth-tabs">
                    <div class="tab active" id="tab-login" onclick="showAuthForm('login')">Accede</div>
                    <div class="tab" id="tab-register" onclick="showAuthForm('register')">Registro</div>
                </div>

                <div id="auth-form-container">
                    <!-- FORMULARIO ACCESO -->
                    <div id="form-login">
                        <h3 class="text-center fw-bold mb-4" style="font-size: 1.2rem;">Acceso para Profesionales</h3>
                        <form>
                            <div class="form-group">
                                <label>Email Profesional</label>
                                <input type="email" class="form-control" placeholder="empresa@email.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" placeholder="*************">
                                    <i class="far fa-eye password-toggle"></i>
                                </div>
                            </div>
                            <button type="button" class="btn-login">Acceder al Panel</button>
                            <div class="footer-links">
                                <a href="#">Olvido su contraseña?</a>
                                <a href="#" class="area-link">Soporte para Empresas</a>
                            </div>
                        </form>
                    </div>

                    <!-- FORMULARIO REGISTRO -->
                    <div id="form-register" style="display: none;">
                        <h3 class="text-center fw-bold mb-4" style="font-size: 1.2rem;">Registra tu Empresa</h3>
                        <form>
                            <div class="form-group">
                                <label>Nombre de la Empresa</label>
                                <input type="text" class="form-control" placeholder="Nombre comercial">
                            </div>
                            <div class="form-group">
                                <label>Sector / Categoría</label>
                                <select class="form-control">
                                    <option>Catering</option>
                                    <option>Fotografía</option>
                                    <option>Música</option>
                                    <option>Espacios</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email de contacto</label>
                                <input type="email" class="form-control" placeholder="comercial@empresa.com">
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="tel" class="form-control" placeholder="600 000 000">
                            </div>
                            <button type="button" class="btn-login">Solicitar Registro</button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function showAuthForm(type) {
                    const loginForm = document.getElementById('form-login');
                    const registerForm = document.getElementById('form-register');
                    const tabLogin = document.getElementById('tab-login');
                    const tabRegister = document.getElementById('tab-register');

                    if (type === 'login') {
                        loginForm.style.display = 'block';
                        registerForm.style.display = 'none';
                        tabLogin.classList.add('active');
                        tabRegister.classList.remove('active');
                    } else {
                        loginForm.style.display = 'none';
                        registerForm.style.display = 'block';
                        tabLogin.classList.remove('active');
                        tabRegister.classList.add('active');
                    }
                }
            </script>
        </div>
    <

</main>
<?php include_once("footer.php"); ?>