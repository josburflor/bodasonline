<?php include_once("header.php"); ?>

<main class="prueba-page bg-light pb-5">
    <!-- Barra superior de usuario (Estilo Panel Usuario) -->
    <div class="bg-white shadow-sm border-bottom">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <div class="text-uppercase fw-bold text-muted small">Configuración de Perfil</div>
            
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-3 border rounded-pill px-3 py-2 bg-white shadow-sm">
                    <i class="far fa-heart text-danger cursor-pointer"></i>
                    <i class="far fa-envelope text-muted cursor-pointer"></i>
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; font-size: 0.9rem; display: flex; justify-content: center;">J</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sub-Navegación del Perfil -->
    <div class="bg-white border-bottom mb-4">
        <div class="container d-flex flex-wrap justify-content-center gap-4 py-3">
            <a href="panelusuario.php" class="text-decoration-none fw-bold text-muted hover-pink transition">Mi Boda</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Favoritos</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Proveedores</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Invitados</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Mensajes</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Presupuesto</a>
        </div>
    </div>

    <div class="container">
        <!-- Perfil Header -->
        <div class="row align-items-center mb-5 g-4">
            <div class="col-md-7 d-flex align-items-center gap-4">
                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow" style="width: 80px; height: 80px; font-size: 2rem;">J</div>
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <h2 class="h4 fw-bold mb-0">José</h2>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">
                            <small class="fw-bold">● Online</small>
                        </span>
                    </div>
                    <p class="text-muted mb-0 small">Granada, Granada. Desde Octubre 2025</p>
                </div>
            </div>

            <!-- Contador de Boda -->
            <div class="col-md-5">
                <div class="bg-white p-4 rounded-4 shadow-sm border border-pink-subtle d-flex align-items-center justify-content-between">
                    <span class="text-uppercase fw-bold text-muted small lh-sm" style="width: 100px;">¿Cuánto falta para tu boda?</span>
                    <div class="d-flex gap-4">
                        <div class="text-center">
                            <div class="h3 fw-bold text-pink mb-0">302</div>
                            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">Días</small>
                        </div>
                        <div class="text-center border-start ps-4">
                            <div class="h3 fw-bold text-pink mb-0">18:00:00</div>
                            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">hrs min s</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Perfil/Favoritos -->
        <ul class="nav nav-tabs border-0 mb-5 gap-4">
            <li class="nav-item">
                <a class="nav-link active fw-bold border-0 border-bottom border-3 border-pink px-0" style="color: #d81b60; background: none;" href="#">Mi Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-muted border-0 px-0" href="#">Favoritos</a>
            </li>
        </ul>

        <h1 class="h2 fw-bold mb-5">Modificar mi perfil</h1>

        <!-- Barra de Progreso -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mb-5 bg-pink-light border border-pink-subtle">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="h6 fw-bold mb-0">Completa tu perfil</h3>
                <span class="badge bg-pink text-white rounded-pill px-3">30%</span>
            </div>
            <p class="text-muted small mb-3">Para llegar al 45% háblanos sobre tu boda</p>
            <div class="progress" style="height: 10px;">
                <div class="progress-bar" role="progressbar" style="width: 30%; background-color: #d81b60;"></div>
            </div>
        </div>

        <!-- SECCIÓN: MIS DATOS PERSONALES -->
        <div class="card border-0 shadow-sm rounded-4 p-5 mb-5">
            <h3 class="h6 fw-bold text-uppercase tracking-widest mb-4 border-start border-4 border-pink ps-3">Mis datos personales</h3>
            
            <div class="row g-4">
                <!-- Columna Izquierda/Centro -->
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Nombre de usuario</label>
                            <input type="text" value="Jose" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Nombre y Apellido</label>
                            <input type="text" value="Jose Flores" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Mi pareja</label>
                            <input type="text" placeholder="Nombre de tu pareja" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Email</label>
                            <input type="email" value="josburflor@gmail.com" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Teléfono</label>
                            <input type="text" value="+34 00 000 00 00" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button class="btn btn-link text-decoration-none fw-bold text-pink p-0 mb-2 hover-pink transition">
                                <i class="fas fa-key me-1"></i> Cambiar contraseña
                            </button>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Soy yo</label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input border-pink-subtle" type="radio" name="soy" id="novia">
                                    <label class="form-check-label small" for="novia">Novia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input border-pink-subtle" type="radio" name="soy" id="novio" checked>
                                    <label class="form-check-label small" for="novio">Novio</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input border-pink-subtle" type="radio" name="soy" id="otros">
                                    <label class="form-check-label small" for="otros">Otros</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Mi pareja es</label>
                            <div class="d-flex gap-4 align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input border-pink-subtle" type="radio" name="pareja" id="p_novia" checked>
                                    <label class="form-check-label small" for="p_novia">Novia</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input border-pink-subtle" type="radio" name="pareja" id="p_novio">
                                    <label class="form-check-label small" for="p_novio">Novio</label>
                                </div>
                                <a href="#" class="small text-pink text-decoration-none fw-bold ms-auto">Enlazar con mi pareja</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha (Foto) -->
                <div class="col-lg-4 d-flex flex-column align-items-center justify-content-start border-start border-light-subtle">
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow mb-4" style="width: 120px; height: 120px; font-size: 3rem;">J</div>
                    <button class="btn btn-outline-pink btn-sm rounded-pill px-4 fw-bold shadow-sm">
                        <i class="fas fa-camera me-2"></i> Cambiar mi Foto
                    </button>
                    <button class="btn btn-link text-muted small mt-3 text-decoration-none hover-pink transition">Eliminar foto actual</button>
                </div>
            </div>
        </div>

        <!-- SECCIÓN: MI BODA -->
        <div class="card border-0 shadow-sm rounded-4 p-5 mb-5">
            <h3 class="h6 fw-bold text-uppercase tracking-widest mb-4 border-start border-4 border-pink ps-3">Detalles de Mi Boda</h3>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Me caso en</label>
                    <input type="text" value="Granada, Granada" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Fecha de la boda</label>
                    <input type="date" value="2026-12-17" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Número de invitados</label>
                    <input type="number" value="100" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Nombre Salón Fiesta</label>
                    <input type="text" placeholder="Ej: Hacienda Los Olivos" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Horario Inicio</label>
                    <input type="time" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Horario Final</label>
                    <input type="time" class="form-control rounded-3 py-2 border-light-subtle shadow-sm">
                </div>
                <div class="col-md-4">
                    <label class="form-label small fw-bold text-muted text-uppercase tracking-wider">Coste estimado €</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-light-subtle shadow-sm">€</span>
                        <input type="number" value="5000" class="form-control rounded-end-3 py-2 border-light-subtle shadow-sm">
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCIÓN: INSPIRACIÓN -->
        <div class="mb-5">
            <h3 class="h6 fw-bold text-uppercase tracking-widest mb-4 border-start border-4 border-pink ps-3">Inspiración</h3>
            <div class="row row-cols-2 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <i class="fas fa-palette text-pink mb-2 fs-4"></i>
                        <span class="text-uppercase fw-bold small tracking-widest d-block">Color</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <i class="fas fa-leaf text-pink mb-2 fs-4"></i>
                        <span class="text-uppercase fw-bold small tracking-widest d-block">Temporada</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <i class="fas fa-star text-pink mb-2 fs-4"></i>
                        <span class="text-uppercase fw-bold small tracking-widest d-block">Estilo</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <i class="fas fa-plane text-pink mb-2 fs-4"></i>
                        <span class="text-uppercase fw-bold small tracking-widest d-block">Luna de Miel</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botón Guardar -->
        <div class="d-flex justify-content-end mt-5">
            <button class="btn btn-pink-solid px-5 py-3 fw-bold rounded-4 shadow transition hover-lift">
                <i class="fas fa-save me-2"></i> Guardar Cambios
            </button>
        </div>

    </div>
</main>

<style>
    :root {
        --pink-main: #d81b60;
        --pink-light: #fff5f8;
        --pink-border: #ffc2d6;
    }

    .text-pink { color: var(--pink-main); }
    .bg-pink { background-color: var(--pink-main); }
    .bg-pink-light { background-color: var(--pink-light); }
    .border-pink { border-color: var(--pink-main) !important; }
    .border-pink-subtle { border-color: var(--pink-border) !important; }
    
    .btn-outline-pink {
        color: var(--pink-main);
        border-color: var(--pink-border);
    }
    .btn-outline-pink:hover {
        background-color: var(--pink-main);
        color: white;
        border-color: var(--pink-main);
    }

    .btn-pink-solid {
        background-color: var(--pink-main);
        color: white;
        border: none;
    }
    .btn-pink-solid:hover {
        background-color: #ad1457;
        color: white;
    }

    .hover-lift:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important; 
    }
    .cursor-pointer { cursor: pointer; }
    .hover-pink:hover { color: var(--pink-main) !important; }
    .transition { transition: all 0.3s ease; }
    
    .form-control:focus {
        border-color: var(--pink-main);
        box-shadow: 0 0 0 0.25rem rgba(216, 27, 96, 0.1);
    }
    
    .form-check-input:checked {
        background-color: var(--pink-main);
        border-color: var(--pink-main);
    }
</style>

<?php include_once("footer.php"); ?>