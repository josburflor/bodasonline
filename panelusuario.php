<?php
// ===================================================
// PANEL DE CONTROL DE USUARIO (DASHBOARD INTERACTIVO)
// ===================================================
// Este archivo representa la zona privada para las parejas que están organizando
// su boda. Cuenta con un diseño premium y funcionalidades interactivas reales
// usando JavaScript y almacenamiento local (localStorage) del navegador.

include_once("header.php"); 
?>

<!-- Estilos premium específicos para el Dashboard -->
<style>
    :root {
        --bo-pink: #ff4d88;
        --bo-pink-hover: #ff3370;
        --bo-pink-light: #fff0f3;
        --bo-navy: #1a2b56;
        --bo-navy-hover: #121f3f;
    }

    body {
        background-color: #f8f9fa;
        font-family: 'Montserrat', sans-serif;
    }

    /* Transición suave para todos los efectos hover */
    .transition-all {
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Efecto de elevación para tarjetas */
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(255, 77, 136, 0.12) !important;
    }

    .hover-lift-navy:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(26, 43, 86, 0.12) !important;
    }

    /* Pestañas activas */
    .profile-tab-link {
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        padding-bottom: 8px;
        transition: color 0.2s, border-color 0.2s;
    }

    .profile-tab-link.active-tab {
        color: var(--bo-pink) !important;
        border-bottom: 3px solid var(--bo-pink) !important;
    }

    .profile-tab-link:hover {
        color: var(--bo-pink) !important;
    }

    /* Botones personalizados */
    .btn-bo-pink {
        background-color: var(--bo-pink);
        color: white;
        border: none;
        border-radius: 30px;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-bo-pink:hover {
        background-color: var(--bo-pink-hover);
        color: white;
        transform: scale(1.03);
    }

    .btn-bo-outline-pink {
        background: transparent;
        color: var(--bo-pink);
        border: 2px solid #ffccd8;
        border-radius: 12px;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-bo-outline-pink:hover {
        background-color: var(--bo-pink-light);
        border-color: var(--bo-pink);
        color: var(--bo-pink);
    }

    /* Inputs elegantes */
    .form-control-dashboard {
        border-radius: 12px;
        border: 1px solid #dee2e6;
        padding: 12px 15px;
        font-size: 0.95rem;
        transition: all 0.2s;
    }

    .form-control-dashboard:focus {
        border-color: var(--bo-pink);
        box-shadow: 0 0 0 0.25rem rgba(255, 77, 136, 0.15);
        outline: none;
    }
</style>

<main class="panel-usuario-page pb-5">
    
    <!-- BARRA DE INFORMACIÓN DE CONTROL -->
    <div class="bg-white shadow-sm border-bottom">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <div class="text-uppercase fw-bold text-muted small tracking-wider"><i class="fa-solid fa-square-poll-vertical me-2 text-pink"></i>Panel de Control</div>
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-3 border rounded-pill px-3 py-2 bg-white shadow-sm">
                    <i class="far fa-heart text-danger cursor-pointer" title="Favoritos"></i>
                    <i class="far fa-envelope text-muted cursor-pointer" title="Mensajes"></i>
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 35px; height: 35px; font-size: 0.9rem;">J</div>
                </div>
            </div>
        </div>
    </div>

    <!-- SUB-NAVEGACIÓN INTERACTIVA -->
    <div class="bg-white border-bottom mb-4">
        <div class="container d-flex flex-wrap justify-content-center gap-4 py-3">
            <a href="#" class="text-decoration-none text-pink profile-tab-link active-tab" data-target="section-miboda">Mi Boda</a>
            <a href="#" class="text-decoration-none text-muted profile-tab-link" data-target="section-favoritos">Favoritos</a>
            <a href="#" class="text-decoration-none text-muted profile-tab-link" data-target="section-proveedores">Proveedores</a>
            <a href="#" class="text-decoration-none text-muted profile-tab-link" data-target="section-invitados">Invitados</a>
            <a href="#" class="text-decoration-none text-muted profile-tab-link" data-target="section-mensajes">Mensajes</a>
            <a href="#" class="text-decoration-none text-muted profile-tab-link" data-target="section-presupuesto">Presupuesto</a>
        </div>
    </div>

    <div class="container">
        
        <!-- ============================================== -->
        <!-- PESTAÑA: MI BODA (PRINCIPAL)                   -->
        <!-- ============================================== -->
        <div id="section-miboda" class="tab-content-section">
            
            <!-- Perfil Usuario y Contador en tiempo real -->
            <div class="row align-items-center mb-5 g-4">
                <div class="col-md-7 d-flex align-items-center gap-4">
                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold shadow" style="width: 80px; height: 80px; font-size: 2rem;">J</div>
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h2 class="h4 fw-bold mb-0">José</h2>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">
                                <small class="fw-bold">● En Línea</small>
                            </span>
                        </div>
                        <p class="text-muted mb-0 small"><i class="fa-solid fa-location-dot me-1"></i> Granada, España. Boda en Octubre 2026</p>
                    </div>
                </div>

                <!-- Contador de Boda en Tiempo Real -->
                <div class="col-md-5">
                    <div class="bg-white p-4 rounded-4 shadow-sm border border-pink-subtle d-flex align-items-center justify-content-between">
                        <span class="text-uppercase fw-bold text-muted small lh-sm" style="width: 100px;">¿Cuánto falta para tu boda?</span>
                        <div class="d-flex gap-4">
                            <div class="text-center">
                                <div class="h3 fw-bold text-pink mb-0" id="daysCount" style="color: #d81b60;">--</div>
                                <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">Días</small>
                            </div>
                            <div class="text-center border-start ps-4">
                                <div class="h3 fw-bold text-pink mb-0" id="timeCount" style="color: #d81b60; font-family: monospace;">--:--:--</div>
                                <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem;">hrs min s</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección Sobre mi boda -->
            <div class="mb-5">
                <h3 class="h5 fw-bold mb-4 text-dark"><i class="fa-regular fa-folder-open me-2 text-pink"></i>Ficha de nuestra Boda</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-5 g-4">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition-all bg-white">
                            <i class="fa-solid fa-palette text-pink mb-2 fs-4"></i>
                            <span class="text-uppercase fw-bold text-muted d-block small mb-1" style="font-size: 0.7rem;">Color Temático</span>
                            <span class="fw-bold text-dark" style="font-size: 0.9rem;">Rosa Palo & Oro</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition-all bg-white">
                            <i class="fa-solid fa-cloud-sun text-pink mb-2 fs-4"></i>
                            <span class="text-uppercase fw-bold text-muted d-block small mb-1" style="font-size: 0.7rem;">Temporada</span>
                            <span class="fw-bold text-dark" style="font-size: 0.9rem;">Otoño 2026</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition-all bg-white">
                            <i class="fa-solid fa-wand-magic-sparkles text-pink mb-2 fs-4"></i>
                            <span class="text-uppercase fw-bold text-muted d-block small mb-1" style="font-size: 0.7rem;">Estilo</span>
                            <span class="fw-bold text-dark" style="font-size: 0.9rem;">Boho Chic Rústico</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition-all bg-white">
                            <i class="fa-solid fa-plane-departure text-pink mb-2 fs-4"></i>
                            <span class="text-uppercase fw-bold text-muted d-block small mb-1" style="font-size: 0.7rem;">Luna de Miel</span>
                            <span class="fw-bold text-dark" style="font-size: 0.9rem;">Japón & Maldivas</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center bg-white border border-pink-subtle shadow-sm" style="background-color: #fff5f8;">
                            <h4 class="small fw-bold mb-2">Completado del Perfil</h4>
                            <div class="progress mb-2" style="height: 8px;">
                                <div class="progress-bar" role="progressbar" id="profileProgressBar" style="width: 50%; background-color: #ff4d88;"></div>
                            </div>
                            <p class="small fw-bold text-muted mb-0" id="profileProgressText">50% completado</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Accesos rápidos del Dashboard -->
            <div class="row g-4 mb-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white hover-lift-navy transition-all h-100">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-users me-2 text-pink"></i>Resumen de Invitados</h4>
                        <p class="text-secondary small">Gestiona tu lista de invitados interactiva de forma rápida, confirma asistencias y mantén al día a tus familiares.</p>
                        <div class="d-flex justify-content-around bg-light p-3 rounded-3 my-3">
                            <div class="text-center">
                                <span class="d-block fw-bold text-pink fs-3" id="dashConfirmedCount">0</span>
                                <small class="text-muted fw-bold" style="font-size: 0.7rem;">CONFIRMADOS</small>
                            </div>
                            <div class="text-center border-start ps-4">
                                <span class="d-block fw-bold text-dark fs-3" id="dashTotalGuestsCount">0</span>
                                <small class="text-muted fw-bold" style="font-size: 0.7rem;">TOTAL INVITADOS</small>
                            </div>
                        </div>
                        <button class="btn btn-bo-outline-pink mt-2 w-100 trigger-tab-btn" data-target-tab="section-invitados">Gestionar Invitados</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white hover-lift-navy transition-all h-100">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-calculator me-2 text-pink"></i>Presupuesto Actual</h4>
                        <p class="text-secondary small">Controla los gastos de la ceremonia, el banquete y el catering. Te avisaremos si te acercas al límite fijado.</p>
                        <div class="d-flex justify-content-around bg-light p-3 rounded-3 my-3">
                            <div class="text-center">
                                <span class="d-block fw-bold text-success fs-3" id="dashSpentText">0 €</span>
                                <small class="text-muted fw-bold" style="font-size: 0.7rem;">GASTADO</small>
                            </div>
                            <div class="text-center border-start ps-4">
                                <span class="d-block fw-bold text-dark fs-3" id="dashRemainingText">0 €</span>
                                <small class="text-muted fw-bold" style="font-size: 0.7rem;">RESTANTE</small>
                            </div>
                        </div>
                        <button class="btn btn-bo-outline-pink mt-2 w-100 trigger-tab-btn" data-target-tab="section-presupuesto">Controlar Presupuesto</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- ============================================== -->
        <!-- PESTAÑA: FAVORITOS                             -->
        <!-- ============================================== -->
        <div id="section-favoritos" class="tab-content-section d-none">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 text-center">
                <i class="fa-solid fa-heart text-danger display-3 mb-3"></i>
                <h3 class="fw-bold text-dark mb-2">Tus Proveedores Favoritos</h3>
                <p class="text-secondary mb-4">Guarda aquí las empresas que más te gustan del catálogo para contactarlas fácilmente.</p>
                
                <div class="row g-4 text-start justify-content-center mt-2">
                    <div class="col-md-4">
                        <div class="card border rounded-4 overflow-hidden bg-white shadow-sm">
                            <img src="https://images.pexels.com/photos/1264210/pexels-photo-1264210.jpeg?auto=compress&cs=tinysrgb&w=400" class="card-img-top object-fit-cover" height="180" alt="Fotografía">
                            <div class="card-body">
                                <span class="badge bg-pink text-white mb-2" style="background-color: #ff4d88;">Fotógrafos</span>
                                <h5 class="fw-bold text-dark mb-1">Fotógrafo Rafa</h5>
                                <p class="text-muted small mb-3">Granada Centro</p>
                                <a href="detalleProveedor.php?idProveedor=4" class="btn btn-bo-pink btn-sm w-100 py-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border rounded-4 overflow-hidden bg-white shadow-sm">
                            <img src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=400" class="card-img-top object-fit-cover" height="180" alt="Hotel">
                            <div class="card-body">
                                <span class="badge bg-pink text-white mb-2" style="background-color: #ff4d88;">Lugares</span>
                                <h5 class="fw-bold text-dark mb-1">Palace Hotel</h5>
                                <p class="text-muted small mb-3">La Caleta, Granada</p>
                                <a href="detalleProveedor.php?idProveedor=3" class="btn btn-bo-pink btn-sm w-100 py-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- PESTAÑA: PROVEEDORES                           -->
        <!-- ============================================== -->
        <div id="section-proveedores" class="tab-content-section d-none">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">Empresas Contratadas y Candidatas</h3>
                        <p class="text-secondary mb-0 small">Registra los proveedores que estás considerando o que ya has reservado para tu enlace.</p>
                    </div>
                    <button class="btn btn-bo-pink px-4 py-2" data-bs-toggle="modal" data-bs-target="#addProviderModal">
                        <i class="fa-solid fa-plus me-2"></i> Añadir Proveedor
                    </button>
                </div>

                <!-- Tarjetas de Categoría con Proveedores Dinámicos -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="providersGrid">
                    <!-- Los proveedores añadidos se renderizan aquí dinámicamente con JS -->
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- PESTAÑA: INVITADOS                             -->
        <!-- ============================================== -->
        <div id="section-invitados" class="tab-content-section d-none">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4">
                
                <h3 class="fw-bold text-dark mb-2">Lista de Invitados Interactiva</h3>
                <p class="text-secondary mb-4 small">Añade a tus seres queridos, edita sus confirmaciones de asistencia y obtén totales en tiempo real.</p>
                
                <!-- Resumen e Info de Invitados -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4 border text-center">
                            <span class="fw-bold text-pink fs-2 d-block" id="totalGuestsText">0</span>
                            <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Total Invitados</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4 border text-center border-success">
                            <span class="fw-bold text-success fs-2 d-block" id="confirmedGuestsText">0</span>
                            <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Confirmados</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4 border text-center border-warning">
                            <span class="fw-bold text-warning fs-2 d-block" id="pendingGuestsText">0</span>
                            <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Pendientes</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded-4 border text-center border-danger">
                            <span class="fw-bold text-danger fs-2 d-block" id="declinedGuestsText">0</span>
                            <small class="text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">No asistirán</small>
                        </div>
                    </div>
                </div>

                <!-- Formulario rápido para añadir invitados -->
                <form id="addGuestForm" class="row g-3 p-3 bg-light rounded-4 border mb-4 align-items-end">
                    <div class="col-md-5">
                        <label class="form-label fw-bold text-dark small">Nombre del Invitado</label>
                        <input type="text" class="form-control form-control-dashboard bg-white" id="guestName" placeholder="Ej. Juan Pérez" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold text-dark small">Estado de Asistencia</label>
                        <select class="form-select form-control-dashboard bg-white" id="guestStatus" required>
                            <option value="Pendiente" selected>Pendiente</option>
                            <option value="Confirmado">Confirmado</option>
                            <option value="No asistirá">No asistirá</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-bo-pink w-100 py-3">
                            <i class="fa-solid fa-user-plus me-2"></i> Añadir
                        </button>
                    </div>
                </form>

                <!-- Tabla de Invitados -->
                <div class="table-responsive rounded-4 border overflow-hidden">
                    <table class="table table-hover align-middle mb-0 bg-white">
                        <thead class="table-pink" style="background-color: var(--bo-pink-light);">
                            <tr>
                                <th class="p-3 text-dark fw-bold" style="font-size: 0.9rem;">Nombre</th>
                                <th class="p-3 text-dark fw-bold text-center" style="font-size: 0.9rem;">Asistencia</th>
                                <th class="p-3 text-dark fw-bold text-center" style="font-size: 0.9rem; width: 150px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="guestsTableBody">
                            <!-- Los invitados se cargarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- ============================================== -->
        <!-- PESTAÑA: MENSAJES                              -->
        <!-- ============================================== -->
        <div id="section-mensajes" class="tab-content-section d-none">
            <div class="bg-white rounded-4 shadow-sm overflow-hidden mb-4">
                <div class="row g-0" style="min-height: 500px;">
                    <!-- Lista de Chats -->
                    <div class="col-md-4 border-end bg-light">
                        <div class="p-3 border-bottom bg-white fw-bold text-dark">
                            <i class="fa-solid fa-comments me-2 text-pink"></i> Bandeja de Entrada
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active p-3 border-0 bg-pink-light border-start border-4 border-pink" style="background-color: var(--bo-pink-light);" onclick="selectChat(1, 'Fotógrafo Rafa')">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="fw-bold mb-0 text-dark">Fotógrafo Rafa</h6>
                                    <small class="text-muted">16:30</small>
                                </div>
                                <p class="text-secondary small mb-0 text-truncate">¡Hola José! ¿Cuándo hacemos la sesión de fotos de preboda?</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action p-3 border-bottom" onclick="selectChat(2, 'Palace Hotel')">
                                <div class="d-flex justify-content-between mb-1">
                                    <h6 class="fw-bold mb-0 text-dark">Palace Hotel</h6>
                                    <small class="text-muted">Ayer</small>
                                </div>
                                <p class="text-muted small mb-0 text-truncate">Estimado José, el menú de degustación ya está listo para...</p>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Contenedor del Chat Activo -->
                    <div class="col-md-8 d-flex flex-column justify-content-between bg-white">
                        <!-- Cabecera del chat -->
                        <div class="p-3 border-bottom fw-bold text-dark d-flex align-items-center justify-content-between">
                            <span id="chatTitle">Fotógrafo Rafa</span>
                            <span class="badge bg-success rounded-pill px-2 py-1"><small>● Activo</small></span>
                        </div>
                        
                        <!-- Mensajes -->
                        <div class="p-4 flex-grow-1 overflow-y-auto" style="max-height: 380px; background-color: #fcfcfc;" id="chatHistory">
                            <!-- Mensaje Recibido -->
                            <div class="d-flex gap-3 mb-3">
                                <div class="bg-pink text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; min-width: 38px; background-color: var(--bo-pink);">R</div>
                                <div class="p-3 bg-light rounded-4 shadow-xs" style="max-width: 75%;">
                                    <p class="mb-1 text-dark small fw-semibold">Fotógrafo Rafa</p>
                                    <p class="mb-0 text-secondary" style="font-size: 0.95rem;">¡Hola José! Te escribo para consultar qué día de la próxima semana os viene bien para agendar la sesión de fotos de preboda en el Albayzín.</p>
                                    <small class="text-muted d-block text-end mt-1">16:30</small>
                                </div>
                            </div>
                        </div>

                        <!-- Caja de Envío de Mensaje -->
                        <form id="sendMessageForm" class="p-3 border-top d-flex gap-2 align-items-center">
                            <input type="text" class="form-control form-control-dashboard flex-grow-1" id="chatMessageInput" placeholder="Escribe tu mensaje aquí..." required>
                            <button type="submit" class="btn btn-bo-pink px-4 py-3">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================== -->
        <!-- PESTAÑA: PRESUPUESTO                           -->
        <!-- ============================================== -->
        <div id="section-presupuesto" class="tab-content-section d-none">
            <div class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4">
                <h3 class="fw-bold text-dark mb-2">Calculadora y Estimador de Presupuesto</h3>
                <p class="text-secondary mb-4 small">Organiza los límites monetarios de tu boda. Modifica los importes para realizar el desglose en tiempo real.</p>
                
                <!-- Fila de Resultados del Presupuesto -->
                <div class="row g-4 mb-4 align-items-center">
                    <div class="col-md-4">
                        <div class="p-4 rounded-4 bg-light border text-center">
                            <label class="form-label fw-bold text-secondary text-uppercase small mb-2">Presupuesto Total Estimado</label>
                            <div class="input-group justify-content-center">
                                <input type="number" class="form-control form-control-dashboard text-center fw-bold fs-4 text-dark" id="budgetTotal" value="20000" style="max-width: 180px;">
                                <span class="input-group-text bg-white border-0 fw-bold fs-4">€</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-4 rounded-4 border bg-light">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold text-muted small text-uppercase">Progreso de Gastos</span>
                                <span class="fw-bold text-dark small" id="spentPercentageText">0%</span>
                            </div>
                            <div class="progress mb-3" style="height: 12px; border-radius: 10px;">
                                <div class="progress-bar" id="budgetProgressBar" role="progressbar" style="width: 0%; background-color: var(--bo-pink);"></div>
                            </div>
                            <div class="row text-center text-md-start">
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <small class="text-muted d-block">GASTO ACTUAL</small>
                                    <span class="fw-bold text-pink fs-5" id="spentTotalText">0 €</span>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted d-block">PRESUSPUESTO DISPONIBLE</small>
                                    <span class="fw-bold text-dark fs-5" id="remainingTotalText">20000 €</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario de Desglose de Gastos -->
                <h4 class="fw-bold text-dark mb-4 mt-5"><i class="fa-solid fa-wallet text-pink me-2"></i> Desglose por Partidas Nupciales</h4>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">1. Banquete, Catering & Espacio (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expenseVenue" value="8500">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">2. Vestido de Novia & Traje de Novio (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expenseAttire" value="2500">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">3. Música, DJ & Iluminación (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expenseMusic" value="1200">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">4. Reportaje Fotográfico & Video (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expensePhoto" value="1800">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">5. Detalles, Alianzas & Papelería (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expenseDetails" value="900">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">6. Viaje de Novios / Luna de Miel (€)</label>
                            <input type="number" class="form-control form-control-dashboard budget-expense-input" id="expenseHoneymoon" value="3500">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

<!-- ============================================== -->
<!-- MODALES INTERACTIVOS                           -->
<!-- ============================================== -->

<!-- Modal: Añadir Proveedor -->
<div class="modal fade" id="addProviderModal" tabindex="-1" aria-labelledby="addProviderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0 justify-content-between p-4">
                <h5 class="modal-title fw-bold text-dark" id="addProviderModalLabel">Añadir Proveedor</h5>
                <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addProviderForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary small">Nombre de la Empresa</label>
                        <input type="text" class="form-control form-control-dashboard" id="provName" placeholder="Ej. Sonido Granada S.L." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary small">Categoría del Servicio</label>
                        <select class="form-select form-control-dashboard" id="provCategory" required>
                            <option value="Banquetes">Banquetes / Restaurantes</option>
                            <option value="Fotógrafos">Fotografía y Video</option>
                            <option value="Música">Música y DJ</option>
                            <option value="Belleza">Belleza y Estética</option>
                            <option value="Coches de Boda">Coches de Boda</option>
                            <option value="Joyas">Alianzas y Joyería</option>
                            <option value="Decoración">Flores y Decoración</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary small">Teléfono de Contacto</label>
                        <input type="text" class="form-control form-control-dashboard" id="provPhone" placeholder="Ej. 600 000 000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary small">Presupuesto Acordado (€)</label>
                        <input type="number" class="form-control form-control-dashboard" id="provCost" placeholder="Ej. 1200" required>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 p-4">
                    <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-bo-pink px-4 py-2">Guardar Proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================== -->
<!-- SCRIPT DE FUNCIONAMIENTO INTERACTIVO           -->
<!-- ============================================== -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. CONTROL DE CAMBIO DE PESTAÑAS (TABS)
    // ==========================================
    const tabs = document.querySelectorAll(".profile-tab-link");
    const sections = document.querySelectorAll(".tab-content-section");

    tabs.forEach(tab => {
        tab.addEventListener("click", (e) => {
            e.preventDefault();
            const targetSection = tab.getAttribute("data-target");
            switchTab(targetSection);
        });
    });

    // Permitir botones dentro de las secciones para saltar a otras pestañas
    document.querySelectorAll(".trigger-tab-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const targetSection = btn.getAttribute("data-target-tab");
            switchTab(targetSection);
        });
    });

    function switchTab(targetSectionId) {
        // Actualizar pestañas activas
        tabs.forEach(t => {
            const matches = t.getAttribute("data-target") === targetSectionId;
            t.classList.toggle("active-tab", matches);
            t.classList.toggle("text-muted", !matches);
        });

        // Mostrar sección correspondiente
        sections.forEach(s => {
            s.classList.toggle("d-none", s.id !== targetSectionId);
        });

        // Scrollear al inicio
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ==========================================
    // 2. RELOJ CUENTA ATRÁS EN TIEMPO REAL
    // ==========================================
    // Fecha ficticia de boda: 15 de Octubre de 2026 a las 18:00
    const weddingTimestamp = new Date("October 15, 2026 18:00:00").getTime();

    function updateTimer() {
        const now = new Date().getTime();
        const diff = weddingTimestamp - now;

        const daysSpan = document.getElementById("daysCount");
        const timeSpan = document.getElementById("timeCount");

        if (!daysSpan || !timeSpan) return;

        if (diff <= 0) {
            daysSpan.textContent = "0";
            timeSpan.textContent = "¡Hoy es el día!";
            return;
        }

        // Cálculos temporales
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        // Formatear a dos dígitos
        const formatHours = hours.toString().padStart(2, '0');
        const formatMinutes = minutes.toString().padStart(2, '0');
        const formatSeconds = seconds.toString().padStart(2, '0');

        daysSpan.textContent = days;
        timeSpan.textContent = `${formatHours}:${formatMinutes}:${formatSeconds}`;
    }

    setInterval(updateTimer, 1000);
    updateTimer();


    // ==========================================
    // 3. GESTOR DE INVITADOS (LOCAL STORAGE)
    // ==========================================
    let invitados = JSON.parse(localStorage.getItem('bo_invitados')) || [
        { id: 1, nombre: "Tío Manuel y Familia", estado: "Confirmado" },
        { id: 2, nombre: "Sofía (Amiga de la Universidad)", estado: "Confirmado" },
        { id: 3, nombre: "Primo Carlos", estado: "Pendiente" },
        { id: 4, nombre: "Vecina Laura", estado: "No asistirá" }
    ];

    const guestsTableBody = document.getElementById("guestsTableBody");
    const addGuestForm = document.getElementById("addGuestForm");
    const guestNameInput = document.getElementById("guestName");
    const guestStatusSelect = document.getElementById("guestStatus");

    function renderGuests() {
        if (!guestsTableBody) return;
        guestsTableBody.innerHTML = "";

        let total = invitados.length;
        let confirmados = 0;
        let pendientes = 0;
        let declinados = 0;

        invitados.forEach(inv => {
            // Contabilizar estados
            if (inv.estado === "Confirmado") confirmados++;
            else if (inv.estado === "Pendiente") pendientes++;
            else if (inv.estado === "No asistirá") declinados++;

            // Determinar color de badge
            let badgeClass = "bg-warning-subtle text-warning border-warning-subtle";
            if (inv.estado === "Confirmado") badgeClass = "bg-success-subtle text-success border-success-subtle";
            else if (inv.estado === "No asistirá") badgeClass = "bg-danger-subtle text-danger border-danger-subtle";

            // Crear fila
            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="p-3 text-dark fw-semibold">${escapeHtml(inv.nombre)}</td>
                <td class="p-3 text-center">
                    <span class="badge ${badgeClass} border rounded-pill px-3 py-1">${inv.estado}</span>
                </td>
                <td class="p-3 text-center">
                    <button class="btn btn-sm btn-outline-danger rounded-circle p-2" onclick="deleteGuest(${inv.id})">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </td>
            `;
            guestsTableBody.appendChild(row);
        });

        // Actualizar marcadores e interfaces
        document.getElementById("totalGuestsText").textContent = total;
        document.getElementById("confirmedGuestsText").textContent = confirmados;
        document.getElementById("pendingGuestsText").textContent = pendientes;
        document.getElementById("declinedGuestsText").textContent = declinados;

        // Actualizar en el resumen de Mi Boda
        document.getElementById("dashConfirmedCount").textContent = confirmados;
        document.getElementById("dashTotalGuestsCount").textContent = total;

        // Guardar en localStorage
        localStorage.setItem('bo_invitados', JSON.stringify(invitados));
        
        // Recalcular perfil completado
        recalculateProfileProgress();
    }

    if (addGuestForm) {
        addGuestForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const nuevoInvitado = {
                id: Date.now(),
                nombre: guestNameInput.value.trim(),
                estado: guestStatusSelect.value
            };
            invitados.push(nuevoInvitado);
            guestNameInput.value = "";
            guestStatusSelect.value = "Pendiente";
            renderGuests();
        });
    }

    // Definimos deleteGuest en window para poder llamarlo desde onclick inline
    window.deleteGuest = (id) => {
        invitados = invitados.filter(inv => inv.id !== id);
        renderGuests();
    };

    renderGuests();


    // ==========================================
    // 4. CALCULADORA DE PRESUPUESTO INTERACTIVO
    // ==========================================
    const budgetTotalInput = document.getElementById("budgetTotal");
    const expenseInputs = document.querySelectorAll(".budget-expense-input");

    function calculateBudget() {
        if (!budgetTotalInput) return;

        const totalPresupuesto = parseFloat(budgetTotalInput.value) || 0;
        let gastado = 0;

        expenseInputs.forEach(input => {
            gastado += parseFloat(input.value) || 0;
        });

        const restante = totalPresupuesto - gastado;
        const porcentaje = totalPresupuesto > 0 ? (gastado / totalPresupuesto) * 100 : 0;

        // Renderizar textos
        document.getElementById("spentTotalText").textContent = `${gastado.toLocaleString()} €`;
        document.getElementById("remainingTotalText").textContent = `${restante.toLocaleString()} €`;
        document.getElementById("spentPercentageText").textContent = `${Math.round(porcentaje)}%`;
        
        // Renderizar marcadores de Mi Boda
        document.getElementById("dashSpentText").textContent = `${gastado.toLocaleString()} €`;
        document.getElementById("dashRemainingText").textContent = `${restante.toLocaleString()} €`;

        // Barra de progreso y colores
        const bar = document.getElementById("budgetProgressBar");
        if (bar) {
            bar.style.width = `${Math.min(porcentaje, 100)}%`;
            if (porcentaje > 100) {
                bar.style.backgroundColor = "#dc3545"; // Rojo: Excedido
            } else if (porcentaje > 85) {
                bar.style.backgroundColor = "#ffc107"; // Amarillo: Al límite
            } else {
                bar.style.backgroundColor = "#ff4d88"; // Rosa: Correcto
            }
        }

        // Guardar valores en LocalStorage
        const valoresGastos = {};
        expenseInputs.forEach(input => {
            valoresGastos[input.id] = input.value;
        });
        localStorage.setItem('bo_presupuesto_total', totalPresupuesto);
        localStorage.setItem('bo_gastos', JSON.stringify(valoresGastos));
    }

    if (budgetTotalInput) {
        budgetTotalInput.addEventListener("input", calculateBudget);
        expenseInputs.forEach(input => {
            input.addEventListener("input", calculateBudget);
        });

        // Cargar presupuesto previo si existe
        const prevBudget = localStorage.getItem('bo_presupuesto_total');
        const prevExpenses = JSON.parse(localStorage.getItem('bo_gastos'));

        if (prevBudget !== null) {
            budgetTotalInput.value = prevBudget;
        }
        if (prevExpenses !== null) {
            Object.keys(prevExpenses).forEach(key => {
                const element = document.getElementById(key);
                if (element) element.value = prevExpenses[key];
            });
        }
        calculateBudget();
    }


    // ==========================================
    // 5. GESTOR DE PROVEEDORES (LOCAL STORAGE)
    // ==========================================
    // Inicializamos proveedores por defecto si no existen
    let proveedores = JSON.parse(localStorage.getItem('bo_proveedores')) || [
        { id: 1, nombre: "Restaurante Gourmet", categoria: "Banquetes", telefono: "958 555 666", costo: 8500 },
        { id: 2, nombre: "Fotógrafo Rafa", categoria: "Fotógrafos", telefono: "611 444 555", costo: 1800 },
        { id: 3, nombre: "Joyas Reales", categoria: "Joyas", telefono: "958 888 999", costo: 900 }
    ];

    const providersGrid = document.getElementById("providersGrid");
    const addProviderForm = document.getElementById("addProviderForm");

    const categoryIcons = {
        "Banquetes": "fa-utensils",
        "Fotógrafos": "fa-camera",
        "Música": "fa-music",
        "Belleza": "fa-sparkles",
        "Coches de Boda": "fa-car-side",
        "Joyas": "fa-gem",
        "Decoración": "fa-paint-roller"
    };

    function renderProviders() {
        if (!providersGrid) return;
        providersGrid.innerHTML = "";

        proveedores.forEach(p => {
            const icon = categoryIcons[p.categoria] || "fa-briefcase";
            const card = document.createElement("div");
            card.className = "col";
            card.innerHTML = `
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-lift transition-all bg-white">
                    <div class="bg-pink-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 50px; height: 50px; background-color: var(--bo-pink-light); color: var(--bo-pink);">
                        <i class="fa-solid ${icon} fs-5"></i>
                    </div>
                    <span class="badge bg-pink text-white mb-2 mx-auto" style="background-color: var(--bo-pink);">${p.categoria}</span>
                    <h5 class="fw-bold text-dark mb-2" style="font-size: 1rem;">${escapeHtml(p.nombre)}</h5>
                    <p class="text-secondary small mb-2"><i class="fa-solid fa-phone me-1 text-muted"></i> ${escapeHtml(p.telefono)}</p>
                    <div class="fw-bold text-pink fs-6 mb-3">${p.costo.toLocaleString()} €</div>
                    <button class="btn btn-outline-danger btn-sm border-0 rounded-pill small w-100" onclick="deleteProvider(${p.id})">
                        <i class="fa-regular fa-trash-can me-1"></i> Eliminar
                    </button>
                </div>
            `;
            providersGrid.appendChild(row = card);
        });

        localStorage.setItem('bo_proveedores', JSON.stringify(proveedores));
        recalculateProfileProgress();
    }

    if (addProviderForm) {
        addProviderForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const name = document.getElementById("provName").value.trim();
            const category = document.getElementById("provCategory").value;
            const phone = document.getElementById("provPhone").value.trim();
            const cost = parseFloat(document.getElementById("provCost").value) || 0;

            const nuevoProv = {
                id: Date.now(),
                nombre: name,
                categoria: category,
                telefono: phone,
                costo: cost
            };
            proveedores.push(nuevoProv);

            // Cerrar el modal
            const modalEl = document.getElementById('addProviderModal');
            const modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();

            // Limpiar inputs
            addProviderForm.reset();

            // Renderizar y sincronizar con calculadora
            renderProviders();
            syncProviderCostToBudget(category, cost);
        });
    }

    window.deleteProvider = (id) => {
        proveedores = proveedores.filter(p => p.id !== id);
        renderProviders();
    };

    function syncProviderCostToBudget(category, cost) {
        // Enlazar de forma interactiva coste de proveedor a las casillas del presupuesto
        if (category === "Banquetes") {
            const input = document.getElementById("expenseVenue");
            if (input) { input.value = cost; calculateBudget(); }
        } else if (category === "Fotógrafos") {
            const input = document.getElementById("expensePhoto");
            if (input) { input.value = cost; calculateBudget(); }
        } else if (category === "Música") {
            const input = document.getElementById("expenseMusic");
            if (input) { input.value = cost; calculateBudget(); }
        } else if (category === "Joyas") {
            const input = document.getElementById("expenseDetails");
            if (input) { input.value = cost; calculateBudget(); }
        }
    }

    renderProviders();


    // ==========================================
    // 6. RECALCULAR PROGRESO DEL PERFIL
    // ==========================================
    function recalculateProfileProgress() {
        let porcentaje = 30; // Base por configurar la boda inicialmente
        
        if (invitados.length > 0) porcentaje += 25; // 25% por añadir invitados
        if (proveedores.length > 0) porcentaje += 25; // 25% por añadir proveedores
        if (parseFloat(budgetTotalInput?.value || 0) > 0) porcentaje += 20; // 20% por definir presupuesto

        const bar = document.getElementById("profileProgressBar");
        const text = document.getElementById("profileProgressText");

        if (bar && text) {
            bar.style.width = `${porcentaje}%`;
            text.textContent = `${porcentaje}% completado`;
        }
    }


    // ==========================================
    // 7. SISTEMA DE MENSAJERÍA INTERACTIVA
    // ==========================================
    const sendMessageForm = document.getElementById("sendMessageForm");
    const chatMessageInput = document.getElementById("chatMessageInput");
    const chatHistory = document.getElementById("chatHistory");
    const chatTitle = document.getElementById("chatTitle");

    let conversacionActiva = 1; // 1 = Rafa, 2 = Palace Hotel

    // Mensajes guardados en memoria por chat
    const chatsMemoria = {
        1: [
            { emisor: "Rafa", msg: "¡Hola José! Te escribo para consultar qué día de la próxima semana os viene bien para agendar la sesión de fotos de preboda en el Albayzín.", hora: "16:30" }
        ],
        2: [
            { emisor: "Palace", msg: "Estimado José, el menú de degustación ya está listo para vuestra revisión. ¿Os vendría bien asistir el próximo jueves a las 14:00?", hora: "Ayer" }
        ]
    };

    window.selectChat = (chatId, nombre) => {
        conversacionActiva = chatId;
        chatTitle.textContent = nombre;
        
        // Remover clase active de todos los links
        document.querySelectorAll(".list-group-item").forEach(item => {
            item.classList.remove("active", "bg-pink-light", "border-start", "border-4", "border-pink");
            item.style.backgroundColor = "";
        });

        // Agregar clase active al seleccionado
        const selectedLink = event.currentTarget;
        selectedLink.classList.add("active", "border-start", "border-4", "border-pink");
        selectedLink.style.backgroundColor = "var(--bo-pink-light)";

        renderChatHistory();
    };

    function renderChatHistory() {
        if (!chatHistory) return;
        chatHistory.innerHTML = "";

        const msgs = chatsMemoria[conversacionActiva] || [];

        msgs.forEach(m => {
            const isMe = m.emisor === "Yo";
            const emisorNombre = isMe ? "José (Tú)" : chatTitle.textContent;
            const letter = isMe ? "J" : chatTitle.textContent.charAt(0);
            
            const messageBlock = document.createElement("div");
            messageBlock.className = `d-flex gap-3 mb-3 ${isMe ? 'flex-row-reverse' : ''}`;
            messageBlock.innerHTML = `
                <div class="${isMe ? 'bg-dark' : 'bg-pink'} text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; min-width: 38px; ${!isMe ? 'background-color: var(--bo-pink);' : ''}">${letter}</div>
                <div class="p-3 rounded-4 shadow-xs ${isMe ? 'bg-pink-light text-end' : 'bg-light'}" style="max-width: 75%; ${isMe ? 'background-color: var(--bo-pink-light);' : ''}">
                    <p class="mb-1 text-dark small fw-semibold">${emisorNombre}</p>
                    <p class="mb-0 text-secondary" style="font-size: 0.95rem;">${escapeHtml(m.msg)}</p>
                    <small class="text-muted d-block mt-1">${m.hora}</small>
                </div>
            `;
            chatHistory.appendChild(messageBlock);
        });

        // Auto-scroll al final del chat
        chatHistory.scrollTop = chatHistory.scrollHeight;
    }

    if (sendMessageForm) {
        sendMessageForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const text = chatMessageInput.value.trim();
            if (!text) return;

            const timeNow = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            // Añadir mensaje del usuario
            chatsMemoria[conversacionActiva].push({
                emisor: "Yo",
                msg: text,
                hora: timeNow
            });

            chatMessageInput.value = "";
            renderChatHistory();

            // Simular respuesta automática simulada del proveedor (2 segundos después)
            setTimeout(() => {
                const autoReplies = {
                    1: "¡Perfecto! Agendado queda. Nos vemos la próxima semana. ¡Un saludo!",
                    2: "Muchas gracias por confirmar. Prepararemos la mesa de degustación para ese día."
                };
                
                chatsMemoria[conversacionActiva].push({
                    emisor: conversacionActiva === 1 ? "Rafa" : "Palace",
                    msg: autoReplies[conversacionActiva] || "¡Entendido! Lo revisaremos de inmediato.",
                    hora: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                });

                renderChatHistory();
            }, 2000);
        });
    }

    renderChatHistory();

    // Helper para escapar HTML por seguridad (XSS)
    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

});
</script>

<?php include_once("footer.php"); ?>
