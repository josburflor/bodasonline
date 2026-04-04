<?php include_once("header.php"); ?>

<main>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            color: #1a1a1a;
            line-height: 1.6;
            background-color: #faf9f7;
        }
        
        /* Imagen circular */
        .circular-mask {
            clip-path: circle(50% at 50% 50%);
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
        
        /* CONTENEDOR LEGAL CON MÁRGENES IZQUIERDOS MÁS ANCHOS */
        .legal-content {
            padding-left: 2rem;
        }
        
        .legal-content h1 {
            font-size: 2.25rem;
            font-weight: 300;
            margin-bottom: 2rem;
            color: #000;
            border-left: 5px solid #d4af7a;
            padding-left: 1.5rem;
        }
        
        .legal-content h2 {
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-top: 2rem;
            margin-bottom: 1.25rem;
            color: #7a5a4e;
            padding-left: 0.75rem;
            border-left: 3px solid #d4af7a;
        }
        
        .legal-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            padding-left: 0.5rem;
            color: #2c3e2f;
        }
        
        .legal-content p {
            font-size: 1.05rem;
            color: #3a3a3a;
            margin-bottom: 1.25rem;
            font-weight: 350;
            line-height: 1.6;
            text-align: justify;
            margin-left: 1.8rem;
            padding-right: 1rem;
        }
        
        /* Bloque de información legal */
        .info-legal-block {
            background: #fefaf5;
            padding: 1rem 1.5rem 1rem 2.5rem;
            margin: 1rem 0 1.5rem 1.8rem;
            border-left: 5px solid #d4af7a;
            border-radius: 0 12px 12px 0;
        }
        
        .info-legal-block p {
            margin-left: 0;
            padding-left: 0;
            margin-bottom: 0.5rem;
        }
        
        /* Ajustes para tablet */
        @media (max-width: 992px) {
            .legal-content {
                padding-left: 1rem;
            }
            .legal-content p {
                margin-left: 1rem;
            }
            .info-legal-block {
                margin-left: 1rem;
            }
        }
        
        /* Ajustes para móvil - texto DEBAJO de la imagen */
        @media (max-width: 768px) {
            .legal-content {
                padding-left: 0.75rem;
                margin-top: 2rem;
            }
            .legal-content p {
                margin-left: 0.75rem;
            }
            .info-legal-block {
                margin-left: 0.75rem;
            }
            .img-wrapper {
                margin-bottom: 1rem;
            }
        }
        
        .img-wrapper {
            padding-top: 2rem;
        }
        
        .tracking-wide {
            letter-spacing: 0.05em;
        }
    </style>

    <div class="container py-5">
        <div class="row g-4 g-lg-5">
            
            <!-- Imagen circular - ARRIBA en móvil, DERECHA en desktop -->
            <div class="col-12 col-lg-4 order-first order-lg-last d-flex justify-content-center align-items-start img-wrapper">
                <div class="w-75 w-md-50 w-lg-100" style="max-width: 320px;">
                    <img 
                        src="img/aniamdor.jpg"
                        alt="Pareja revisando el ordenador" 
                        class="circular-mask grayscale-[0.2] contrast-[1.1] img-fluid"
                    >
                </div>
            </div>

            <!-- Contenido del texto legal - DEBAJO de la imagen en móvil, IZQUIERDA en desktop -->
            <div class="col-12 col-lg-8 legal-content">
                <h1 class="display-5 fw-light">Condiciones Legales de Uso del sitio web</h1>

                <!-- SECCIÓN 1: INFORMACIÓN LEGAL -->
                <section class="mb-4">
                    <h2 class="text-uppercase small fw-bold tracking-wide">1. INFORMACIÓN LEGAL</h2>
                    
                    <div class="info-legal-block">
                        <p class="mb-1"><strong>Wedding Planner</strong></p>
                        <p class="mb-1">Titular del sitio web: BodasOnline</p>
                        <p class="mb-1">C/ Isaac Albeniz</p>
                        <p class="mb-1">18012 Granada, España</p>
                        <p class="mb-1">Teléfono: (+34) 613476029</p>
                        <p class="mb-1">Inscrita en el Registro Mercantil de Granada</p>
                        <p class="mb-0">Fecha inscripción: 15/12/2025</p>
                    </div>
                </section>

                <!-- SECCIÓN 2: CONDICIONES GENERALES -->
                <section class="mb-4">
                    <h2 class="text-uppercase small fw-bold tracking-wide">2. CONDICIONES GENERALES DE USO DEL PORTAL BODASONLINE E INFORMACIÓN AL USUARIO</h2>
                    
                    <h3 class="fw-semibold mt-4 mb-2">2.1. Preámbulo</h3>
                    <p>
                        Wedding Planner, S.L. (Unipersonal) (en adelante "BodasOnline") pone a disposición de los usuarios de Internet el Sitio Web Bodas.net (en adelante, el "Sitio Web").
                    </p>
                    <p>
                        El acceso y el uso del Sitio Web atribuye automáticamente a quien lo utiliza la condición de Usuario. Se considerarán, por tanto, Usuarios, tanto las personas físicas que utilicen el Sitio Web en condición de consumidores como las personas jurídicas que lo utilicen en el marco de su actividad profesional en relación con los servicios que BodasOnline ofrece a los profesionales del sector de las bodas.
                    </p>
                </section>

                <!-- SECCIÓN 3: OBLIGACIONES -->
                <section class="mb-4">
                    <h3 class="fw-semibold mt-4 mb-2">2.3. Obligaciones de los Usuarios en el Sitio Web</h3>
                    <p>
                        El Usuario se compromete a hacer un uso diligente del Sitio Web y de los servicios accesibles desde éste, con total sujeción a la Ley, a las buenas costumbres y a las presentes Condiciones Generales de Uso y, en su caso, a aquellas condiciones particulares que pudieran ser de aplicación, así como manteniendo el debido respeto a los demás usuarios. De conformidad con lo previsto en el párrafo cuarto del punto 2.2 anterior, BodasOnline se reserva el derecho de retirar cualesquiera contenidos que, a su criterio, no cumplan con los requisitos mínimos de calidad.
                    </p>
                </section>
            </div>

        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>