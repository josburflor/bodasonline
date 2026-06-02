<?php
// ===================================================
// PÁGINA DETALLE DE ARTÍCULO (DINÁMICA)
// ===================================================
// Esta página carga lógicamente y de forma dinámica la información
// de cada artículo del "Blog al Día" utilizando parámetros GET (?id=X).
// De esta forma, evitamos duplicar código y mantenemos la modularidad.

// 1. Definimos el catálogo de artículos en un array asociativo.
// Esto simula la información que normalmente vendría de una base de datos.
$articulos = [
    1 => [
        "titulo" => "Preparativos: Antes de la boda",
        "subtitulo" => "Guía completa para organizar los meses previos a tu enlace sin estrés.",
        "categoria" => "Preparativos",
        "imagen" => "img/momentosbodas.jpg",
        "autor" => "Maria Sosa",
        "fecha" => "2 de Junio de 2026",
        "tiempo_lectura" => "5 min de lectura",
        "contenido" => "Organizar una boda es un viaje emocionante pero lleno de tareas importantes. Desde la elección de la fecha hasta la contratación de los proveedores ideales, cada paso cuenta. Es fundamental crear un calendario detallado de tareas ordenado por meses. Te aconsejamos empezar al menos con 10 o 12 meses de antelación para asegurar la disponibilidad de los mejores espacios de celebración. No olvides definir un presupuesto realista y respetarlo, dejando siempre un pequeño margen para imprevistos."
    ],
    2 => [
        "titulo" => "El gran momento: Votos y música",
        "subtitulo" => "Cómo crear una ceremonia inolvidable que refleje vuestra personalidad.",
        "categoria" => "Ceremonia",
        "imagen" => "img/zapatos.jpg",
        "autor" => "Michael Burgos",
        "fecha" => "1 de Junio de 2026",
        "tiempo_lectura" => "4 min de lectura",
        "contenido" => "La ceremonia es el verdadero corazón de la boda. Escribir vuestros propios votos matrimoniales aporta una carga emotiva incomparable que todos los invitados recordarán. Acompañar cada momento con la banda sonora adecuada marcará la diferencia. Desde la entrada triunfal hasta la salida como recién casados, la música debe estar perfectamente coordinada. Te recomendamos hablar con tu DJ o grupo musical con antelación para ensayar los tiempos clave."
    ],
    3 => [
        "titulo" => "Celebración: Menús y fiesta",
        "subtitulo" => "Deleita a tus invitados con un banquete gastronómico y una barra libre espectacular.",
        "categoria" => "Banquete",
        "imagen" => "img/celebracion.jpg",
        "autor" => "Jose Flores",
        "fecha" => "28 de Mayo de 2026",
        "tiempo_lectura" => "6 min de lectura",
        "contenido" => "La comida y la fiesta son los aspectos más comentados por los invitados después del evento. Elegir un buen catering o menú del restaurante requiere hacer pruebas de degustación previas. Asegúrate de incluir opciones para vegetarianos, veganos, celíacos y personas con alérgenos específicos. En cuanto a la fiesta, planificar sorpresas, photocalls divertidos y una buena música mantendrá la pista de baile llena hasta el amanecer."
    ],
    4 => [
        "titulo" => "El vestido: Consejos para elegirlo",
        "subtitulo" => "Encuentra el vestido o traje perfecto sintiéndote tú misma en cada prueba.",
        "categoria" => "Moda Nupcial",
        "imagen" => "img/vestidotienda.jpg",
        "autor" => "Lisa Anderson",
        "fecha" => "25 de Mayo de 2026",
        "tiempo_lectura" => "5 min de lectura",
        "contenido" => "El vestido de novia o el traje de novio es uno de los secretos mejor guardados y más esperados. Al comenzar la búsqueda, mantén una mente abierta y prueba diferentes siluetas; a veces el diseño que menos esperas es el que te enamora. Considera la comodidad, ya que pasarás muchas horas de pie, bailando y abrazando a tus seres queridos. Agenda las pruebas con unos 6 meses de antelación para realizar cualquier ajuste de costura necesario."
    ],
    5 => [
        "titulo" => "Maquillaje: Tendencias 2026",
        "subtitulo" => "Apuesta por la naturalidad, el brillo saludable y la durabilidad en tu gran día.",
        "categoria" => "Belleza",
        "imagen" => "img/maquillaje.jpg",
        "autor" => "Emily Aguilar",
        "fecha" => "20 de Mayo de 2026",
        "tiempo_lectura" => "3 min de lectura",
        "contenido" => "Las tendencias de belleza para bodas este año se centran en pieles sumamente luminosas y un aspecto natural pero pulido. El objetivo es resaltar tu belleza única sin que parezca que llevas una máscara. Realizar pruebas de maquillaje y peluquería unos meses antes te ayudará a definir el look final ideal. Recuerda utilizar productos resistentes al agua y de larga duración para soportar las lágrimas de felicidad y los bailes."
    ],
    6 => [
        "titulo" => "Luna de Miel: Destinos exóticos",
        "subtitulo" => "Prepara el viaje de vuestras vidas a rincones mágicos e inolvidables.",
        "categoria" => "Luna de Miel",
        "imagen" => "img/LUNADEMIEL.jpg",
        "autor" => "Julia Gimenez",
        "fecha" => "15 de Mayo de 2026",
        "tiempo_lectura" => "7 min de lectura",
        "contenido" => "Vuestra luna de miel es el merecido descanso tras meses de planificación. Desde las playas paradisíacas de Bali hasta los templos históricos de Japón o safaris en África, las opciones son infinitas. Planifica el viaje considerando la mejor época climática del destino elegido. Asegúrate de tener los pasaportes y visados al día y contrata un buen seguro de viaje para mayor tranquilidad."
    ],
    7 => [
        "titulo" => "Fotografía: Capturando emociones",
        "subtitulo" => "Consigue el mejor recuerdo visual que reviva cada sonrisa y cada lágrima.",
        "categoria" => "Fotografía",
        "imagen" => "img/FOTOBODA.jpg",
        "autor" => "Maria Sosa",
        "fecha" => "10 de Mayo de 2026",
        "tiempo_lectura" => "5 min de lectura",
        "contenido" => "Las fotos y videos serán el testimonio físico de tu boda que conservarás para siempre. Busca un fotógrafo profesional cuyo estilo fotoperiodístico o artístico encaje con lo que buscas. Realizar una sesión de preboda es ideal para ganar confianza frente a la cámara y perder la timidez. Coordina con tu fotógrafo una lista de momentos clave o fotos grupales que no pueden faltar."
    ],
    8 => [
        "titulo" => "Invitaciones: Diseños únicos",
        "subtitulo" => "El primer contacto con tus invitados que marcará el estilo de la boda.",
        "categoria" => "Papelería",
        "imagen" => "img/inivtaciones.jpg",
        "autor" => "Michael Burgos",
        "fecha" => "05 de Mayo de 2026",
        "tiempo_lectura" => "4 min de lectura",
        "contenido" => "La papelería de bodas adelanta el estilo y la paleta de colores de vuestro evento. Desde invitaciones en papel texturizado clásico hasta opciones digitales interactivas, personaliza cada detalle. No olvides incluir la fecha límite de confirmación de asistencia, información de transporte, menús especiales y un enlace a vuestra lista de bodas o cuenta para regalos."
    ]
];

// 2. Obtenemos el parámetro 'id' de la URL.
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Verificamos si el artículo solicitado existe en nuestro array.
if (array_key_exists($id, $articulos)) {
    $articulo = $articulos[$id];
} else {
    // Si no existe, preparamos un estado de artículo no encontrado
    $articulo = null;
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
        
        <?php if ($articulo): ?>
            <!-- ARTÍCULO ENCONTRADO -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-pink text-decoration-none">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>

            <article class="bg-white rounded-4 shadow-sm overflow-hidden p-4 p-md-5">
                <!-- Cabecera del Artículo -->
                <div class="mb-4 text-center text-md-start">
                    <span class="badge bg-pink text-white mb-3 px-3 py-2 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px; background-color: #ff4d88; border-radius: 20px;">
                        <?= htmlspecialchars($articulo['categoria']) ?>
                    </span>
                    <h1 class="display-5 fw-bold text-dark mb-3" style="font-family: 'Playfair Display', Georgia, serif;">
                        <?= htmlspecialchars($articulo['titulo']) ?>
                    </h1>
                    <p class="fs-5 text-secondary mb-4">
                        <?= htmlspecialchars($articulo['subtitulo']) ?>
                    </p>
                    
                    <!-- Metadata: Autor, Fecha, Lectura -->
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start align-items-center gap-3 py-3 border-top border-bottom text-muted" style="font-size: 0.9rem;">
                        <div>
                            <i class="fa-solid fa-user me-1 text-pink"></i> Por <strong><?= htmlspecialchars($articulo['autor']) ?></strong>
                        </div>
                        <div class="d-none d-md-block text-pink">•</div>
                        <div>
                            <i class="fa-solid fa-calendar-days me-1"></i> <?= htmlspecialchars($articulo['fecha']) ?>
                        </div>
                        <div class="d-none d-md-block text-pink">•</div>
                        <div>
                            <i class="fa-solid fa-clock me-1"></i> <?= htmlspecialchars($articulo['tiempo_lectura']) ?>
                        </div>
                    </div>
                </div>

                <!-- Imagen Destacada del Artículo -->
                <div class="rounded-4 overflow-hidden mb-5 shadow-sm">
                    <img src="<?= htmlspecialchars(obtenerRutaImagen($articulo['imagen'])) ?>" 
                         alt="<?= htmlspecialchars($articulo['titulo']) ?>" 
                         class="img-fluid w-100 object-cover" 
                         style="max-height: 480px; object-fit: cover;"
                         onerror="this.src='https://via.placeholder.com/800x480?text=Bodas+Online+Blog'">
                </div>

                <!-- Contenido Principal -->
                <div class="row g-5">
                    <!-- Columna de Texto -->
                    <div class="col-lg-8">
                        <div class="lh-lg text-secondary text-justify" style="text-align: justify; font-size: 1.1rem; font-family: 'Montserrat', sans-serif;">
                            <p class="mb-4">
                                <?= htmlspecialchars($articulo['contenido']) ?>
                            </p>
                            <p class="mb-4">
                                Planificar cada uno de estos aspectos puede ser abrumador, pero en **Bodas Online** estamos comprometidos en simplificarte el camino. Descubre nuestro directorio interactivo donde podrás buscar y filtrar proveedores locales en Granada y sus alrededores según tus preferencias de servicio y presupuesto.
                            </p>
                            <blockquote class="p-4 bg-light border-start border-4 rounded-end my-4" style="border-color: #ff4d88 !important; font-style: italic; color: #555;">
                                "El éxito de una gran boda no reside en el presupuesto invertido, sino en el amor y la personalidad reflejados en cada pequeño detalle."
                            </blockquote>
                            <p>
                                Te recomendamos suscribirte a nuestras newsletters y registrarte como usuario planificador de forma gratuita para desbloquear el calendario interactivo completo, la calculadora de presupuesto estimativo y poder guardar tus proveedores favoritos para contactarlos de inmediato.
                            </p>
                        </div>

                        <!-- Botón de retorno -->
                        <div class="mt-5 pt-4 border-top">
                            <a href="index.php" class="btn btn-outline-pink px-4 py-2 fw-bold rounded-pill">
                                <i class="fa-solid fa-arrow-left me-2"></i> Volver al Inicio
                            </a>
                        </div>
                    </div>

                    <!-- Columna Lateral / Sidebar de Sugerencias -->
                    <div class="col-lg-4">
                        <div class="p-4 rounded-4 bg-light border" style="position: sticky; top: 120px;">
                            <h4 class="fw-bold mb-3 text-dark text-center text-lg-start" style="font-size: 1.2rem;">¿Te ayudamos con tu boda?</h4>
                            <p class="text-secondary small mb-4">
                                Únete gratis a Bodas Online y organiza todo desde tu panel de control personalizado de forma fácil.
                            </p>
                            <a href="usuario.php" class="btn btn-pink w-100 fw-bold py-2 text-white mb-3" style="background-color: #ff4d88; border-radius: 12px; font-size: 0.95rem; text-decoration: none; text-align: center; display: block;">
                                Regístrate Gratis
                            </a>
                            <hr class="my-4">
                            <h5 class="fw-bold mb-3 text-dark" style="font-size: 1.1rem;">Otros artículos recomendados</h5>
                            <ul class="list-unstyled">
                                <?php 
                                $contador = 0;
                                foreach ($articulos as $altId => $altArt): 
                                    if ($altId !== $id && $contador < 3): 
                                        $contador++;
                                ?>
                                    <li class="mb-3 d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-heart-circle-check text-pink" style="font-size: 0.85rem;"></i>
                                        <a href="articulo.php?id=<?= $altId ?>" class="text-secondary text-decoration-none small hover-pink fw-semibold">
                                            <?= htmlspecialchars($altArt['titulo']) ?>
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
            <!-- ARTÍCULO NO ENCONTRADO -->
            <div class="text-center py-5 bg-white rounded-4 shadow-sm p-5">
                <i class="fa-solid fa-triangle-exclamation text-warning display-1 mb-4"></i>
                <h1 class="fw-bold mb-3">Artículo no encontrado</h1>
                <p class="text-muted fs-5 mb-5">El artículo que estás buscando no existe o ha sido retirado.</p>
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
