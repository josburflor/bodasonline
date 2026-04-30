<?php include_once("header.php"); ?>

<main class="usuario-page">

    <section class="hero-auth">
        <div class="container-flex">
            <!-- Bloque Izquierdo: Glassmorphism -->
            <div class="glass-card">
                <h2>Quiero Disfrutar Organizando Mi Boda</h2>
                <ul>
                    <li>Nos indicas por favor el día que deseas casarte y nosotros organizamos todo.</li>
                    <li>Encontrarás de todo en un solo sitio web.</li>
                </ul>
                <button class="btn-register" onclick="showAuthForm('register')">Regístrate Gratis</button>
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
                        <h3 class="text-center fw-bold mb-4" style="font-size: 1.2rem;">Bienvenidos al Planificador Bodas Online</h3>
                        <form>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="joe@nomail.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" placeholder="*************">
                                    <i class="far fa-eye password-toggle"></i>
                                </div>
                            </div>
                            <button type="button" class="btn-login" onclick="window.location.href='panelusuario.php'">Accede</button>
                            <div class="footer-links">
                                <a href="#">Olvido su contraseña?</a>
                                <a href="#" class="area-link">Area de Empresas</a>
                            </div>
                        </form>
                    </div>

                    <!-- FORMULARIO REGISTRO -->
                    <div id="form-register" style="display: none;">
                        <h3 class="text-center fw-bold mb-4" style="font-size: 1.2rem;">Crea tu cuenta de Novio/a</h3>
                        <form>
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" class="form-control" placeholder="Tu nombre">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="tu@email.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Crea una contraseña">
                            </div>
                            <div class="form-group">
                                <label>Fecha aproximada de Boda</label>
                                <input type="date" class="form-control">
                            </div>
                            <button type="button" class="btn-login">Registrarme</button>
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