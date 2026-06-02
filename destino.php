<?php
// ===================================================
// PÁGINA DETALLE DE DESTINO DE BODAS (DINÁMICA)
// ===================================================
// Esta página carga lógicamente y de forma dinámica la información
// de cada país en la sección "Organiza tu Boda en el País de tus Sueños"
// utilizando parámetros GET (?id=X).

// 1. Definimos el catálogo de destinos internacionales en un array asociativo.
$destinos = [
    1 => [
        "pais" => "Italia",
        "lema" => "El romance eterno entre viñedos de la Toscana y canales de Venecia.",
        "imagen" => "img/italia.jpg",
        "idioma" => "Italiano",
        "clima" => "Mediterráneo templado",
        "moneda" => "Euro (€)",
        "descripcion" => "Italia es, por excelencia, uno de los países más románticos del planeta. Imagina dar el 'sí, quiero' en una antigua villa junto al Lago de Como, en un romántico viñedo bajo el sol de la Toscana, o en un palacio histórico en Florencia. La gastronomía excepcional, los vinos finos, y su asombroso legado cultural e histórico harán que vuestro enlace sea una experiencia inolvidable no solo para vosotros, sino también para vuestros invitados."
    ],
    2 => [
        "pais" => "Brasil",
        "lema" => "Pasión tropical, arena dorada y atardeceres vibrantes frente al Atlántico.",
        "imagen" => "img/brazil.jpg",
        "idioma" => "Portugués",
        "clima" => "Tropical y cálido",
        "moneda" => "Real brasileño (R$)",
        "descripcion" => "Para las parejas que buscan una boda exótica y llena de vida, Brasil ofrece escenarios inigualables. Celebrar vuestro matrimonio descalzos en las playas de arena dorada de Buzios o con las impresionantes vistas de Río de Janeiro de fondo es un sueño hecho realidad. La calidez de su gente, la música bossa nova en vivo y una gastronomía tropical única garantizarán una fiesta llena de alegría y ritmo."
    ],
    3 => [
        "pais" => "Francia",
        "lema" => "Sofisticación chic y encanto de época en châteaux sacados de cuentos de hadas.",
        "imagen" => "img/francia.jpg",
        "idioma" => "Francés",
        "clima" => "Oceánico y continental templado",
        "moneda" => "Euro (€)",
        "descripcion" => "Francia representa la cúspide de la elegancia y la sofisticación. Desde un fastuoso casamiento en un majestuoso 'Château' medieval en el Valle del Loira hasta una boda íntima y bohemia con vistas a la Torre Eiffel en París, el país del amor nunca defrauda. Su exquisito champán, la pastelería gourmet de renombre mundial y el ambiente refinado darán a vuestra celebración un toque distinguido inigualable."
    ],
    4 => [
        "pais" => "Grecia",
        "lema" => "Luz deslumbrante, cúpulas azules y la inmensidad del mar Egeo al atardecer.",
        "imagen" => "img/grecia.jpg",
        "idioma" => "Griego",
        "clima" => "Mediterráneo seco",
        "moneda" => "Euro (€)",
        "descripcion" => "Casarse en Grecia es sumergirse en la luz y los mitos clásicos del Mediterráneo. Santorini es el destino preferido por sus cúpulas azules y espectaculares puestas de sol sobre la caldera volcánica. Mykonos ofrece un ambiente más festivo y exclusivo, mientras que Creta aporta historia y calidez rural. Una ceremonia frente a las aguas turquesas del mar Egeo es un recuerdo imborrable de pureza y libertad."
    ],
    5 => [
        "pais" => "México",
        "lema" => "Misticismo maya, playas caribeñas de ensueño y un folklore lleno de color.",
        "imagen" => "img/mexico.jpg",
        "idioma" => "Español",
        "clima" => "Cálido y tropical",
        "moneda" => "Peso mexicano ($)",
        "descripcion" => "México combina de forma magistral playas de arena blanca y aguas turquesas en la Riviera Maya con una riqueza cultural milenaria. Puedes celebrar desde una boda espiritual oficiada por un chamán maya en un cenote sagrado, hasta un enlace de lujo en una hacienda histórica de Yucatán o en las exclusivas playas de Los Cabos. La vibrante música de los mariachis y su gastronomía declarada patrimonio de la humanidad deleitarán todos los sentidos."
    ],
    6 => [
        "pais" => "Bali (Indonesia)",
        "lema" => "Espiritualidad zen, templos ancestrales y selvas de un verde infinito.",
        "imagen" => "img/bali.jpg",
        "idioma" => "Indonesio y Balinés",
        "clima" => "Ecuatorial húmedo",
        "moneda" => "Rupia indonesia (IDR)",
        "descripcion" => "Conocida como la 'Isla de los Dioses', Bali es un paraíso místico y espiritual. Ideal para bodas íntimas o elopements rodeados de campos de arroz escalonados en Ubud, acantilados imponentes en Uluwatu frente al Océano Índico, o playas exóticas. Las ceremonias balinesas destacan por sus espectaculares arreglos florales, inciensos aromáticos y un ambiente de paz y comunión con la naturaleza perfecto para comenzar una nueva vida juntos."
    ],
    7 => [
        "pais" => "Japón",
        "lema" => "El contraste perfecto entre el misticismo tradicional de los cerezos y la modernidad futurista.",
        "imagen" => "img/japon.jpg",
        "idioma" => "Japonés",
        "clima" => "Templado con cuatro estaciones",
        "moneda" => "Yen japonés (¥)",
        "descripcion" => "Japón es un destino único y fascinante para parejas que buscan una boda verdaderamente original. Imagina un enlace tradicional sintoísta vistiendo un kimono de seda en un templo de Kioto rodeado de jardines zen, o una celebración moderna en un rascacielos de Tokio iluminado por luces de neón. La temporada de florecimiento de los cerezos (Sakura) en primavera ofrece un telón de fondo de ensueño de tonos rosados para vuestras fotografías."
    ],
    8 => [
        "pais" => "Marruecos",
        "lema" => "La magia de las mil y una noches en exóticos riads y dunas doradas del Sahara.",
        "imagen" => "img/marreucos.jpg",
        "idioma" => "Árabe y Bereber",
        "clima" => "Seco y cálido",
        "moneda" => "Dirham marroquí (MAD)",
        "descripcion" => "Marruecos ofrece una experiencia sensorial y exótica sin igual a pocas horas de Europa. Marrakech cautiva con sus patios interiores de azulejos (riads), el olor a especias y flores de azahar, y sus majestuosos palacios de adobe. Para los más aventureros, dar el 'sí' bajo un manto de estrellas en el desierto del Sahara rodeados de velas es el romanticismo absoluto. Su folklore musical y banquetes bereberes aseguran una boda inolvidable."
    ]
];

// 2. Obtenemos el parámetro 'id' de la URL.
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Verificamos si el destino solicitado existe.
if (array_key_exists($id, $destinos)) {
    $destino = $destinos[$id];
} else {
    $destino = null;
}

// Helper para resolver la ruta de la imagen actual
if (!function_exists('obtenerRutaImagen')) {
    function obtenerRutaImagen($img) {
        if (empty($img)) return 'img/default.jpg';
        if (strpos($img, 'http://') === 0 || strpos($img, 'https://') === 0) return $img;
        if (strpos($img, 'img/') === 0) return $img;
        return 'img/' . $img;
    }
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container" style="max-width: 1000px;">
        
        <?php if ($destino): ?>
            <!-- BREADCRUMBS -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-pink text-decoration-none">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Destinos de Ensueño</li>
                </ol>
            </nav>

            <article class="bg-white rounded-4 shadow-sm overflow-hidden p-4 p-md-5">
                
                <!-- Cabecera de Destino -->
                <div class="mb-4 text-center text-md-start">
                    <span class="badge bg-pink text-white mb-3 px-3 py-2 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1.2px; background-color: #ff4d88; border-radius: 20px;">
                        Destino Internacional
                    </span>
                    <h1 class="display-4 fw-bold text-dark mb-2" style="font-family: 'Montserrat', sans-serif;">
                        Boda en <?= htmlspecialchars($destino['pais']) ?>
                    </h1>
                    <p class="fs-5 text-pink fw-semibold italic mb-4" style="color: #ff4d88; font-style: italic;">
                        "<?= htmlspecialchars($destino['lema']) ?>"
                    </p>
                </div>

                <!-- Imagen Destacada del Destino -->
                <div class="rounded-4 overflow-hidden mb-5 shadow-sm">
                    <img src="<?= htmlspecialchars(obtenerRutaImagen($destino['imagen'])) ?>" 
                         alt="Casarse en <?= htmlspecialchars($destino['pais']) ?>" 
                         class="img-fluid w-100 object-cover" 
                         style="max-height: 480px; object-fit: cover;"
                         onerror="this.src='https://via.placeholder.com/800x480?text=Bodas+Online+Destinos'">
                </div>

                <!-- Contenido Principal -->
                <div class="row g-5">
                    <!-- Columna de Texto -->
                    <div class="col-lg-8">
                        <div class="lh-lg text-secondary text-justify" style="text-align: justify; font-size: 1.1rem; font-family: 'Montserrat', sans-serif;">
                            <h3 class="fw-bold text-dark mb-3" style="font-size: 1.4rem;">¿Por qué casarse en <?= htmlspecialchars($destino['pais']) ?>?</h3>
                            <p class="mb-4">
                                <?= htmlspecialchars($destino['descripcion']) ?>
                            </p>
                            <p class="mb-4">
                                Organizar un enlace en el extranjero requiere una planificación minuciosa de la logística, trámites de visados, traducción de documentos legales y coordinación horaria con proveedores locales. En **Bodas Online** te facilitamos asesores y organizadores bilingües especializados en bodas de destino para que vuestra experiencia sea tan fluida y agradable como sea posible.
                            </p>

                            <!-- Bloque de Información Práctica -->
                            <h4 class="fw-bold text-dark mt-5 mb-4" style="font-size: 1.25rem;"><i class="fa-solid fa-circle-info text-pink me-2"></i> Información Práctica para el Viaje</h4>
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-language text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Idioma Oficial</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($destino['idioma']) ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-cloud-sun text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Climatología</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($destino['clima']) ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-coins text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Moneda Local</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($destino['moneda']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón de retorno -->
                        <div class="mt-5 pt-4 border-top">
                            <a href="index.php" class="btn btn-outline-pink px-4 py-2 fw-bold rounded-pill">
                                <i class="fa-solid fa-arrow-left me-2"></i> Volver al Inicio
                            </a>
                        </div>
                    </div>

                    <!-- Columna Lateral / Sidebar -->
                    <div class="col-lg-4">
                        <div class="p-4 rounded-4 bg-light border text-center text-lg-start" style="position: sticky; top: 120px;">
                            <h4 class="fw-bold mb-3 text-dark" style="font-size: 1.2rem;">¿Planes de Boda Internacional?</h4>
                            <p class="text-secondary small mb-4">
                                Solicita presupuesto e información sobre los trámites legales y coordinadores de bodas disponibles en este destino.
                            </p>
                            <a href="contacto.php" class="btn btn-pink w-100 fw-bold py-2 text-white mb-3" style="background-color: #ff4d88; border-radius: 12px; font-size: 0.95rem; text-decoration: none; text-align: center; display: block;">
                                Solicitar Presupuesto
                            </a>
                            
                            <hr class="my-4">
                            
                            <h5 class="fw-bold mb-3 text-dark text-start" style="font-size: 1.1rem;">Otros destinos de ensueño</h5>
                            <ul class="list-unstyled text-start">
                                <?php 
                                $contador = 0;
                                foreach ($destinos as $altId => $altDest): 
                                    if ($altId !== $id && $contador < 3): 
                                        $contador++;
                                ?>
                                    <li class="mb-3 d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-plane-departure text-pink" style="font-size: 0.85rem;"></i>
                                        <a href="destino.php?id=<?= $altId ?>" class="text-secondary text-decoration-none small hover-pink fw-semibold">
                                            Boda en <?= htmlspecialchars($altDest['pais']) ?>
                                        </a>
                                    </li>
                                <?php 
                                    endif; 
                                endforeach; 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

        <?php else: ?>
            <!-- DESTINO NO ENCONTRADO -->
            <div class="text-center py-5 bg-white rounded-4 shadow-sm p-5">
                <i class="fa-solid fa-triangle-exclamation text-warning display-1 mb-4"></i>
                <h1 class="fw-bold mb-3">Destino no encontrado</h1>
                <p class="text-muted fs-5 mb-5">El destino que estás buscando no está registrado en nuestro catálogo.</p>
                <a href="index.php" class="btn btn-pink text-white px-5 py-3 fw-bold rounded-pill" style="background-color: #ff4d88; text-decoration: none;">
                    <i class="fa-solid fa-arrow-left me-2"></i> Volver a Bodas Online
                </a>
            </div>
        <?php endif; ?>

    </div>
</main>

<style>
    .text-pink { color: #ff4d88; }
    .bg-pink { background-color: #ff4d88; }
    .btn-outline-pink {
        color: #ff4d88;
        border-color: #ff4d88;
        transition: all 0.3s;
    }
    .btn-outline-pink:hover {
        background-color: #ff4d88;
        color: white;
    }
    .hover-pink:hover {
        color: #ff4d88 !important;
    }
    .text-justify {
        text-align: justify;
    }
</style>

<?php include_once("footer.php"); ?>
