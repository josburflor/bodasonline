<?php include_once("header.php"); ?>

<main class="contacto-page">
    <div class="container contact-wrapper">
        <div class="row g-5">
            <!-- COLUMNA IZQUIERDA: SOLO LA IMAGEN -->
            <div class="col-lg-5">
                <div class="image-container mb-4">
                    <img src="img/contacto.jpg" alt="Consultoría de Bodas">
                </div>
            </div>

            <!-- COLUMNA DERECHA: FORMULARIO Y MAPA -->
            <div class="col-lg-7">
                <h1 class="contact-title">Contacto</h1>
                <h2 class="contact-subtitle">Deseas más Información</h2>

                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-bo" placeholder="Nombre">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control form-control-bo" placeholder="Apellido">
                        </div>
                    </div>
                    <input type="email" class="form-control form-control-bo" placeholder="Email">
                    <input type="text" class="form-control form-control-bo" placeholder="Asunto:">
                    <textarea class="form-control form-control-bo textarea-bo" placeholder="Deje tu mensaje"></textarea>
                    
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="privacyCheck">
                        <label class="form-check-label small text-muted" for="privacyCheck">
                            Acepto la política de privacidad
                        </label>
                    </div>

                    <button type="button" class="btn btn-send">Enviar</button>
                </form>

                <!-- Mapa -->
                <div class="map-wrapper">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3178.966467041793!2d-3.6105051234479526!3d37.17733634676571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fcf9804e6e6d%3A0x600f91722e570f80!2sCalle%20Dr.%20Oloriz%2C%20Granada!5e0!3m2!1ses!2ses!4v1711790000000!5m2!1ses!2ses" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTACTO Y ENLACES LEGALES (Cajetín Azul Claro) -->
    <div class="container my-5">
        <div class="contact-box-blue p-4 rounded-4 shadow-sm border-0 text-center">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 md-gap-5">
                <a href="tel:+34613476000" class="contact-link">
                    <i class="fa-solid fa-phone-flip text-primary"></i>
                    <span>+34 613 47 60 00</span>
                </a>
                <a href="mailto:contact@example.com" class="contact-link">
                    <i class="fa-solid fa-envelope text-primary"></i>
                    <span>contact@example.com</span>
                </a>
                <div class="contact-link">
                    <i class="fa-solid fa-location-dot text-primary"></i>
                    <span>Calle Doctor Oloriz, Granada</span>
                </div>
            </div>
        </div>
    </div>


</main>

<?php include_once("footer.php"); ?>