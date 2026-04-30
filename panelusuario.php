<?php include_once("header.php"); ?>

<main class="panel-usuario-page bg-light pb-5">
    <!-- Barra superior de usuario (Bootstrap) -->
    <div class="bg-white shadow-sm border-bottom">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <div class="text-uppercase fw-bold text-muted small">Panel de Control</div>
            
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-3 border rounded-pill px-3 py-2 bg-white shadow-sm">
                    <i class="far fa-heart text-danger cursor-pointer"></i>
                    <i class="far fa-envelope text-muted cursor-pointer"></i>
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-center fw-bold shadow-sm" style="width: 35px; height: 35px; font-size: 0.9rem; display: flex; justify-content: center;">J</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sub-Navegación del Perfil (Bootstrap) -->
    <div class="bg-white border-bottom mb-4">
        <div class="container d-flex flex-wrap justify-content-center gap-4 py-3">
            <a href="#" class="text-decoration-none fw-bold text-pink border-bottom border-2 border-pink pb-1" style="color: #d81b60;">Mi Boda</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Favoritos</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Proveedores</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Invitados</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Mensajes</a>
            <a href="#" class="text-decoration-none fw-bold text-muted hover-pink transition">Presupuesto</a>
        </div>
    </div>

    <div class="container">
        <!-- Perfil Usuario y Contador -->
        <div class="row align-items-center mb-5 g-4">
            <div class="col-md-7 d-flex align-items-center gap-4">
                <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow" style="width: 80px; height: 80px; font-size: 2rem;">J</div>
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <h2 class="h4 fw-bold mb-0">José</h2>
                        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">
                            <small class="fw-bold">● Online</small>
                        </span>
                        <button class="btn btn-outline-secondary btn-sm ms-2 py-0 px-2 small">Editar</button>
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
                            <div class="h3 fw-bold text-pink mb-0" style="color: #d81b60;">302</div>
                            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">Días</small>
                        </div>
                        <div class="text-center border-start ps-4">
                            <div class="h3 fw-bold text-pink mb-0" style="color: #d81b60;">18:00:00</div>
                            <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">hrs min s</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs Perfil/Favoritos -->
        <ul class="nav nav-tabs border-0 mb-4 gap-4">
            <li class="nav-item">
                <a class="nav-link active fw-bold border-0 border-bottom border-3 border-pink px-0" style="color: #d81b60; background: none;" href="#">Mi Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-muted border-0 px-0" href="#">Favoritos</a>
            </li>
        </ul>

        <!-- Sección Sobre mi boda -->
        <div class="mb-5">
            <h3 class="h5 fw-bold mb-4">Sobre mi boda</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-5 g-4">
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <span class="text-uppercase fw-bold small tracking-widest">Color</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <span class="text-uppercase fw-bold small tracking-widest">Temporada</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <span class="text-uppercase fw-bold small tracking-widest">Estilo</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition cursor-pointer">
                        <span class="text-uppercase fw-bold small tracking-widest">Luna de Miel</span>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center bg-pink-light border border-pink-subtle" style="background-color: #fff5f8;">
                        <h4 class="small fw-bold mb-2">Completa tu perfil</h4>
                        <div class="progress mb-2" style="height: 8px;">
                            <div class="progress-bar" role="progressbar" style="width: 30%; background-color: #d81b60;"></div>
                        </div>
                        <p class="small fw-bold text-muted mb-0">30%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Mis Proveedores -->
        <div class="mb-5">
            <h3 class="h5 fw-bold mb-4">Mis Proveedores</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                <?php 
                $categorias = [
                    "Lugares para Bodas", "Fotografía", "Vídeo", "Música", "Catering", 
                    "Coche de Boda", "Transporte", "Invitaciones de Boda", "Detalles de Boda", "Flores y Decoración"
                ];
                foreach ($categorias as $cat): ?>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-3 text-center transition hover-lift">
                        <h4 class="small fw-bold mb-3 px-2 lh-sm" style="min-height: 40px;"><?php echo $cat; ?></h4>
                        <button class="btn btn-outline-pink btn-sm w-100 rounded-3 py-2 fw-bold" style="border-color: #ffc2d6; color: #d81b60;">Añadir Empresa</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<style>
    .text-pink { color: #d81b60; }
    .bg-pink-light { background-color: #fff5f8; }
    .border-pink-subtle { border-color: #ffc2d6 !important; }
    .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important; }
    .cursor-pointer { cursor: pointer; }
    .hover-pink:hover { color: #d81b60 !important; }
    .transition { transition: all 0.3s ease; }
</style>

<?php include_once("footer.php"); ?>
