<?php include_once("header.php"); ?>

<header class="container-fluid bg-light border-bottom py-2">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold text-dark h5 mb-0">Potencia tus resultados</span>
                <a href="#" class="btn btn-outline-rosado px-4 py-1 fw-bold text-decoration-none" style="font-size: 14px; border-radius: 30px;">
                   Hazte Premium
                </a>
            </div>
            <div class="fw-bold text-secondary" style="font-size: 14px;">
                Atención al Cliente: 632-426029
            </div>
        </div>
    </div>
</header>

<main class="proveedor-page">
    <section class="hero-auth py-5">
        <div class="container d-flex flex-wrap justify-content-center align-items-stretch gap-4">
            <!-- Bloque Izquierdo: Glassmorphism -->
            <div class="glass-card shadow-lg">
                <h2 class="display-6 fw-bold mb-4">¡Haz crecer tu negocio con Nosotros!</h2>
                <ul class="text-start d-inline-block ps-0">
                    <li class="mb-3"><i class="fa-solid fa-check me-2"></i> Recibe Solicitudes de Presupuestos</li>
                    <li class="mb-3"><i class="fa-solid fa-check me-2"></i> Consigue Nuevos Clientes</li>
                </ul>
                <div class="mt-4">
                    <button class="btn btn-light btn-lg px-5 py-2 fw-bold" style="border-radius: 30px; color: var(--rosa-intenso);" onclick="showAuthForm('register')">Regístrate Gratis</button>
                </div>
            </div>

            <!-- Bloque Derecho: Formulario -->
            <div class="login-card shadow-lg border-0 bg-white">
                <div class="auth-tabs d-flex mb-4">
                    <div class="tab active flex-fill text-center py-2" id="tab-login" onclick="showAuthForm('login')" style="cursor: pointer;">Accede</div>
                    <div class="tab flex-fill text-center py-2" id="tab-register" onclick="showAuthForm('register')" style="cursor: pointer;">Registro</div>
                </div>

                <div id="auth-form-container">
                    <!-- FORMULARIO ACCESO -->
                    <div id="form-login">
                        <h3 class="text-center fw-bold mb-4">Acceso para Profesionales</h3>
                        <form>
                            <div class="form-group mb-3">
                                <label class="form-label small fw-bold">Email Profesional</label>
                                <input type="email" class="form-control form-control-lg" placeholder="empresa@email.com">
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label small fw-bold">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control form-control-lg" placeholder="*************">
                                    <i class="far fa-eye password-toggle position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary w-100 py-2 fw-bold mb-3" style="background-color: var(--bo-blue-button); border-radius: 10px; border: none;">Acceder al Panel</button>
                            <div class="footer-links d-flex justify-content-between small">
                                <a href="#" class="text-decoration-none text-secondary">¿Olvidó su contraseña?</a>
                                <a href="#" class="text-decoration-none text-primary fw-bold">Soporte Empresas</a>
                            </div>
                        </form>
                    </div>

                    <!-- FORMULARIO REGISTRO -->
                    <div id="form-register" style="display: none;">
                        <h3 class="text-center fw-bold mb-4">Registra tu Empresa</h3>
                        <form class="row g-3">
                            <div class="col-12">
                                <label class="form-label small fw-bold">Nombre de la Empresa</label>
                                <input type="text" class="form-control" placeholder="Nombre comercial">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Sector / Categoría</label>
                                <select class="form-select">
                                    <option>Catering</option>
                                    <option>Fotografía</option>
                                    <option>Música</option>
                                    <option>Espacios</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Email de contacto</label>
                                <input type="email" class="form-control" placeholder="comercial@empresa.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Teléfono</label>
                                <input type="tel" class="form-control" placeholder="600 000 000">
                            </div>
                            <div class="col-12 mt-4">
                                <button type="button" class="btn btn-primary w-100 py-2 fw-bold" style="background-color: var(--bo-blue-button); border-radius: 10px; border: none;">Solicitar Registro</button>
                            </div>
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
    </section>
</main>
<?php include_once("footer.php"); ?>