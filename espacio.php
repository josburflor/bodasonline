<?php
// ===================================================
// PÁGINA DETALLE DE ESPACIOS / LUGARES (DINÁMICA)
// ===================================================
// Esta página carga lógicamente y de forma dinámica la información
// de los espacios destacados ("Jardín Los Olivos", "Salón Mirador" y "Hacienda Santa María")
// utilizando parámetros GET (?id=X).

// 1. Definimos el catálogo de espacios en un array asociativo.
$espacios = [
    1 => [
        "titulo" => "Jardín Los Olivos",
        "opiniones" => "5.0 ★ (120 opiniones)",
        "imagen" => "https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=800",
        "capacidad" => "Hasta 350 invitados",
        "precio" => "Desde 75€ / cubierto",
        "ubicacion" => "Churriana de la Vega, Granada",
        "descripcion" => "Jardín Los Olivos es un espacio exterior incomparable rodeado de olivos centenarios y zonas ajardinadas de ensueño en Granada. Cuenta con cascadas de agua iluminadas, una carpa acristalada climatizada de última generación y un catering exclusivo de alta cocina andaluza. Sus espectaculares vistas al atardecer y sus románticos rincones florales lo convierten en el escenario perfecto para ceremonias civiles al aire libre y grandes banquetes nocturnos bajo el cielo estrellado."
    ],
    2 => [
        "titulo" => "Salón Mirador",
        "opiniones" => "4.8 ★ (85 opiniones)",
        "imagen" => "https://images.pexels.com/photos/2253870/pexels-photo-2253870.jpeg?auto=compress&cs=tinysrgb&w=800",
        "capacidad" => "Hasta 250 invitados",
        "precio" => "Desde 90€ / cubierto",
        "ubicacion" => "Albayzín Alto, Granada",
        "descripcion" => "Situado en las colinas históricas de Granada, el Salón Mirador ofrece una panorámica inigualable de la Alhambra y de Sierra Nevada. Su salón principal cuenta con grandes ventanales acristalados de suelo a techo, permitiendo disfrutar de las mejores vistas de la ciudad durante el banquete. Con un diseño interior elegante y minimalista, cocina de autor contemporánea y suite de cortesía para los novios, es ideal para parejas que buscan una boda exclusiva, distinguida y de alta calidad visual."
    ],
    3 => [
        "titulo" => "Hacienda Santa María",
        "opiniones" => "4.9 ★ (140 opiniones)",
        "imagen" => "https://images.pexels.com/photos/1268855/pexels-photo-1268855.jpeg?auto=compress&cs=tinysrgb&w=800",
        "capacidad" => "Hasta 500 invitados",
        "precio" => "Desde 65€ / cubierto",
        "ubicacion" => "Atarfe, Granada",
        "descripcion" => "Hacienda Santa María es una antigua finca andaluza del siglo XVIII completamente restaurada. Conserva sus patios empedrados tradicionales, arcos de herradura, una gran piscina rodeada de palmeras y jardines exuberantes. Dispone de amplios espacios exteriores ideales para un cóctel de bienvenida animado, así como un gran salón rústico con vigas de madera noble. Es perfecto para bodas de gran formato con un ambiente cálido, tradicional, campestre y lleno de encanto andaluz."
    ]
];

// 2. Obtenemos el parámetro 'id' de la URL.
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Verificamos si el espacio solicitado existe en nuestro catálogo.
if (array_key_exists($id, $espacios)) {
    $espacio = $espacios[$id];
} else {
    $espacio = null;
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container" style="max-width: 1000px;">
        
        <?php if ($espacio): ?>
            <!-- BREADCRUMBS -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php" class="text-pink text-decoration-none">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Espacios para Bodas</li>
                </ol>
            </nav>

            <article class="bg-white rounded-4 shadow-sm overflow-hidden p-4 p-md-5">
                
                <!-- Cabecera de Espacio -->
                <div class="mb-4 text-center text-md-start">
                    <span class="badge bg-pink text-white mb-3 px-3 py-2 text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 1px; background-color: #ff4d88; border-radius: 20px;">
                        Espacio Verificado
                    </span>
                    <h1 class="display-4 fw-bold text-dark mb-2" style="font-family: 'Montserrat', sans-serif;">
                        <?= htmlspecialchars($espacio['titulo']) ?>
                    </h1>
                    <p class="fs-6 text-warning fw-bold mb-4">
                        <i class="fa-solid fa-star me-1"></i> <?= htmlspecialchars($espacio['opiniones']) ?>
                    </p>
                </div>

                <!-- Imagen Destacada del Espacio -->
                <div class="rounded-4 overflow-hidden mb-5 shadow-sm">
                    <img src="<?= htmlspecialchars($espacio['imagen']) ?>" 
                         alt="<?= htmlspecialchars($espacio['titulo']) ?>" 
                         class="img-fluid w-100 object-cover" 
                         style="max-height: 480px; object-fit: cover;"
                         onerror="this.src='https://via.placeholder.com/800x480?text=Bodas+Online+Espacios'">
                </div>

                <!-- Contenido Principal -->
                <div class="row g-5">
                    <!-- Columna de Texto -->
                    <div class="col-lg-8">
                        <div class="lh-lg text-secondary text-justify" style="text-align: justify; font-size: 1.1rem; font-family: 'Montserrat', sans-serif;">
                            <h3 class="fw-bold text-dark mb-3" style="font-size: 1.4rem;">Descripción del Espacio</h3>
                            <p class="mb-4">
                                <?= htmlspecialchars($espacio['descripcion']) ?>
                            </p>
                            <p class="mb-4">
                                Reservar el lugar idóneo es el paso fundamental para fijar la fecha de vuestra boda. Este espacio ofrece servicios complementarios de decoración, iluminación ambiental, coordinación en directo el día de la boda y asesoramiento culinario personalizado para que no tengáis que preocuparos por nada.
                            </p>

                            <!-- Bloque de Detalles Técnicos -->
                            <h4 class="fw-bold text-dark mt-5 mb-4" style="font-size: 1.25rem;"><i class="fa-solid fa-list-check text-pink me-2"></i> Detalles y Servicios del Lugar</h4>
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-users text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Capacidad</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($espacio['capacidad']) ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-euro-sign text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Tarifa Cubierto</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($espacio['precio']) ?></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="p-3 bg-light rounded-3 border text-center">
                                        <i class="fa-solid fa-map-location-dot text-pink mb-2 fs-3"></i>
                                        <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 0.65rem;">Ubicación</small>
                                        <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= htmlspecialchars($espacio['ubicacion']) ?></span>
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
                            <h4 class="fw-bold mb-3 text-dark" style="font-size: 1.2rem;">¿Quieres reservar este espacio?</h4>
                            <p class="text-secondary small mb-4">
                                Consulta la disponibilidad de fechas libres, solicita presupuesto personalizado o agenda una visita guiada presencial.
                            </p>
                            <a href="contacto.php" class="btn btn-pink w-100 fw-bold py-2 text-white mb-3" style="background-color: #ff4d88; border-radius: 12px; font-size: 0.95rem; text-decoration: none; text-align: center; display: block;">
                                Solicitar Presupuesto
                            </a>
                            
                            <hr class="my-4">
                            
                            <h5 class="fw-bold mb-3 text-dark text-start" style="font-size: 1.1rem;">Otros espacios recomendados</h5>
                            <ul class="list-unstyled text-start">
                                <?php 
                                $contador = 0;
                                foreach ($espacios as $altId => $altEsp): 
                                    if ($altId !== $id && $contador < 3): 
                                        $contador++;
                                ?>
                                    <li class="mb-3 d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-hotel text-pink" style="font-size: 0.85rem;"></i>
                                        <a href="espacio.php?id=<?= $altId ?>" class="text-secondary text-decoration-none small hover-pink fw-semibold">
                                            <?= htmlspecialchars($altEsp['titulo']) ?>
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
            <!-- ESPACIO NO ENCONTRADO -->
            <div class="text-center py-5 bg-white rounded-4 shadow-sm p-5">
                <i class="fa-solid fa-triangle-exclamation text-warning display-1 mb-4"></i>
                <h1 class="fw-bold mb-3">Espacio no encontrado</h1>
                <p class="text-muted fs-5 mb-5">El espacio para bodas solicitado no está disponible o no existe.</p>
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
