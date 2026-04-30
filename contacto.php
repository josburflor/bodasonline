<?php include_once("header.php"); ?>

<main class="contacto-page py-5">
    <div class="container">
        <!-- SECCIÓN SUPERIOR: FOTO Y FORMULARIO -->
        <div class="row g-5 align-items-center mb-5">
            <!-- COLUMNA IZQUIERDA: IMAGEN -->
            <div class="col-lg-6">
                <div class="image-container rounded-4 overflow-hidden shadow-lg border-0">
                    <img src="img/contacto.jpg" alt="Consultoría de Bodas" class="img-fluid w-100 h-auto">
                </div>
            </div>

            <!-- COLUMNA DERECHA: FORMULARIO -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <h1 class="display-5 fw-bold mb-2">Contacto</h1>
                    <h2 class="h4 text-secondary mb-4">Deseas más Información</h2>

                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-bo" placeholder="Nombre">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-bo" placeholder="Apellido">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control form-control-bo" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control form-control-bo" placeholder="Asunto:">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control form-control-bo textarea-bo" placeholder="Deje tu mensaje" rows="4"></textarea>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="privacyCheck">
                                <label class="form-check-label small text-muted" for="privacyCheck">
                                    Acepto la política de privacidad
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-send px-5 py-2 fw-bold text-white" style="background-color: var(--rosa-intenso); border-radius: 30px;">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- SECCIÓN INFERIOR: MAPA (JUSTIFICADO 100%) -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="map-wrapper rounded-4 overflow-hidden shadow-sm border" style="height: 450px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.966467041793!2d-3.6105051234479526!3d37.17733634676571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcf9804e6e6d%3A0x600f91722e570f80!2sCalle%20Dr.%20Oloriz%2C%20Granada!5e0!3m2!1ses!2ses!4v1711790000000!5m2!1ses!2ses" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- CONTACTO Y ENLACES LEGALES (Cajetín Azul Claro) -->
        <div class="contact-box-blue p-4 rounded-4 shadow-sm border-0 text-center">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 md-gap-5">
                <a href="tel:+34613476000" class="contact-link text-decoration-none text-dark">
                    <i class="fa-solid fa-phone-flip text-primary me-2"></i>
                    <span>+34 613 47 60 00</span>
                </a>
                <a href="mailto:contact@example.com" class="contact-link text-decoration-none text-dark">
                    <i class="fa-solid fa-envelope text-primary me-2"></i>
                    <span>contact@example.com</span>
                </a>
                <div class="contact-link">
                    <i class="fa-solid fa-location-dot text-primary me-2"></i>
                    <span>Calle Doctor Oloriz, Granada</span>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>