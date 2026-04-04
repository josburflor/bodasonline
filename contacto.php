<?php include_once("header.php"); ?>

<!-- Estilos CSS -->
<style>
    :root {
        --bo-pink: #ff4d88;
        --bo-pink-hover: #ff3370;
        --bo-navy: #1d3557;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fee9e9;
        color: white;
    }

    .contact-wrapper {
        padding: 80px 0;
    }

    /* --- IMAGEN IZQUIERDA --- */
    .image-container {
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        min-height: 500px;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* --- TÍTULOS --- */
    .contact-title {
        color: #233d90;
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 5px;
    }

    .contact-subtitle {
        color: #233d90;
        font-weight: 700;
        font-size: 2.2rem;
        margin-bottom: 30px;
    }

    /* --- FORMULARIO --- */
    .form-control-bo {
        background-color: white !important;
        border: none;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 20px;
        font-size: 0.95rem;
        color: #171717;
    }

    .form-control-bo::placeholder {
        color: #262525;
    }

    .textarea-bo {
        resize: none;
        height: 150px;
    }

    .btn-send {
        background-color: var(--bo-pink);
        color: white;
        border: none;
        padding: 12px 50px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1.1rem;
        transition: 0.3s;
        margin-top: 10px;
    }

    .btn-send:hover {
        background-color: var(--bo-pink-hover);
        transform: translateY(-2px);
    }

    /* --- DATOS DE CONTACTO EN UNA SOLA LÍNEA --- */
    .contact-info-footer {
        background-color: #1d3557;
        padding: 20px 0;
        margin-top: 50px;
        text-align: center;
    }

    .contact-info-footer .container {
        display: flex;
        justify-content: center;
        gap: 50px;
        flex-wrap: wrap;
    }

    .contact-info-footer a, 
    .contact-info-footer div {
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        transition: 0.3s;
    }

    .contact-info-footer a:hover {
        color: var(--bo-pink);
        transform: translateY(-2px);
    }

    .contact-info-footer i {
        font-size: 1.2rem;
    }

    /* --- MAPA --- */
    .map-wrapper {
        border-radius: 30px;
        overflow: hidden;
        height: 450px;
        margin-top: 20px;
        border: 2px solid #333;
    }

    /* --- ENLACES LEGALES --- */
    .legal-links {
        text-align: center;
        padding: 20px 0;
        background-color: #152238;
        margin-top: 0;
    }

    .legal-links a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .legal-links a:hover {
        color: var(--bo-pink);
    }

    /* Ajustes Responsive */
    @media (max-width: 991px) {
        .contact-title, .contact-subtitle { font-size: 1.8rem; }
        .image-container { min-height: 300px; margin-bottom: 40px; }
        .contact-info-footer .container { gap: 20px; }
    }
</style>

<main>
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

    <!-- CONTACTO Y ENLACES LEGALES (SOLO UNA VEZ, ANTES DEL FOOTER) -->
    <div class="contact-info-footer">
        <div class="container">
            <a href="tel:+34613476000">
                <i class="fa-solid fa-phone-flip"></i>
                +34 613 47 60 00
            </a>
            <a href="mailto:contact@example.com">
                <i class="fa-solid fa-envelope"></i>
                contact@example.com
            </a>
            <div>
                <i class="fa-solid fa-location-dot"></i>
                Calle Doctor Oloriz, Granada
            </div>
        </div>
    </div>


</main>

<?php include_once("footer.php"); ?>