<?php 
require_once("conexion.php");

// Helper function to resolve image path
if (!function_exists('obtenerRutaImagen')) {
    function obtenerRutaImagen($img) {
        if (empty($img)) {
            return 'img/default.jpg';
        }
        if (strpos($img, 'http://') === 0 || strpos($img, 'https://') === 0) {
            return $img;
        }
        if (strpos($img, 'img/') === 0 || strpos($img, 'img\\') === 0) {
            return $img;
        }
        return 'img/' . $img;
    }
}

// Helper function to resolve category image
if (!function_exists('obtenerImagenCategoria')) {
    function obtenerImagenCategoria($nombre) {
        switch(strtolower(trim($nombre))) {
            case 'lugares para mi boda':
            case 'lugares': return 'https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'restaurantes': return 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'floristería': return 'https://images.pexels.com/photos/931177/pexels-photo-931177.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'mobiliario': return 'https://images.pexels.com/photos/276583/pexels-photo-276583.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'rentar coche':
            case 'coches de boda': return 'img/coche.jpg';
            case 'animadores':
            case 'animación': return 'img/aniamdor.jpg';
            case 'food truck': return 'https://images.pexels.com/photos/2233729/pexels-photo-2233729.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'mesas de dulces': return 'https://images.pexels.com/photos/1721932/pexels-photo-1721932.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'dj':
            case 'música': return 'https://images.pexels.com/photos/2253843/pexels-photo-2253843.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'decorador':
            case 'decoración': return 'https://images.pexels.com/photos/3419264/pexels-photo-3419264.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'joyas': return 'https://images.pexels.com/photos/265906/pexels-photo-265906.jpeg?auto=compress&cs=tinysrgb&w=400';
            case 'luna de miel': return 'https://images.pexels.com/photos/1024967/pexels-photo-1024967.jpeg?auto=compress&cs=tinysrgb&w=400';
            default: return 'https://images.pexels.com/photos/1024967/pexels-photo-1024967.jpeg?auto=compress&cs=tinysrgb&w=400';
        }
    }
}

// Obtener las categorías principales (primeras 6)
$consultaCats6 = "SELECT * FROM categoriastb LIMIT 6";
$sentenciaCats6 = $conexion->query($consultaCats6);
$categorias6 = $sentenciaCats6->fetchAll(PDO::FETCH_ASSOC);

// Obtener 12 categorías para el grid inferior
$consultaCats12 = "SELECT * FROM categoriastb LIMIT 12";
$sentenciaCats12 = $conexion->query($consultaCats12);
$categorias12 = $sentenciaCats12->fetchAll(PDO::FETCH_ASSOC);

// Obtener todos los proveedores premium que son visibles
$consultaPremium = "SELECT * FROM proveedorestb, categoriastb WHERE proveedorestb.idCategoria = categoriastb.idCategoria AND proveedorestb.visible = 1 LIMIT 8";
$sentenciaPremium = $conexion->query($consultaPremium);
$proveedoresPremium = $sentenciaPremium->fetchAll(PDO::FETCH_ASSOC);

// Obtener todas las rutas románticas
$consultaRutas = "SELECT * FROM rutastb";
$sentenciaRutas = $conexion->query($consultaRutas);
$rutas = $sentenciaRutas->fetchAll(PDO::FETCH_ASSOC);

// Obtener todas las categorías de trajes
$consultaTrajes = "SELECT * FROM trajestb";
$sentenciaTrajes = $conexion->query($consultaTrajes);
$trajes = $sentenciaTrajes->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once("header.php"); ?>

<main>
   <!-- HERO PRINCIPAL -->
  <section class="py-0">
    <div class="container-fluid">
      <div class="row align-items-center g-4">
        <div class="col-lg-6">
          <img src="img/onlineboda.png" alt="Compras" class="hero-img img-fluid w-100">
          <div class="mt-3 d-flex hero-search-wrap justify-content-center mb-4 mb-lg-0">
            <form class="d-flex flex-grow-1 flex-sm-row flex-column gap-2" role="search">
              <input class="form-control" type="search" placeholder="Proveedores" aria-label="Proveedores">
              <button class="btn btn-buscar" type="submit">Buscar</button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="img/boda.png" alt="Boda" class="hero-img img-fluid w-100 mb-4 mb-lg-0">
        </div>
      </div>
    </div>
  </section>




  <!-- CARRUSEL 3D - AISLADO -->
  <div class="carousel-section">
    <h1 class="about-title">Nuestro Equipo</h1>

    <div class="carousel-container">
      <button class="nav-arrow left" aria-label="Anterior">‹</button>
      <div class="carousel-track">
        <div class="card" data-index="0">
          <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400 400w, https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600 600w, https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Maria Sosa">
        </div>
        <div class="card" data-index="1">
          <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=400 400w, https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=600 600w, https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Michael Burgos">
        </div>
        <div class="card" data-index="2">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400 400w, https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600 600w, https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Emily Aguilar">
        </div>
        <div class="card" data-index="3">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400 400w, https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=600 600w, https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Julia Gimenez">
        </div>
        <div class="card" data-index="4">
          <img src="https://images.unsplash.com/photo-1655249481446-25d575f1c054?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1655249481446-25d575f1c054?w=400 400w, https://images.unsplash.com/photo-1655249481446-25d575f1c054?w=600 600w, https://images.unsplash.com/photo-1655249481446-25d575f1c054?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Lisa Anderson">
        </div>
        <div class="card" data-index="5">
          <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=600&auto=format&fit=crop" 
               srcset="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400 400w, https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=600 600w, https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=800 800w"
               sizes="(max-width: 768px) 200px, 280px"
               alt="Jose Flores">
        </div>
      </div>
      <button class="nav-arrow right" aria-label="Siguiente">›</button>
    </div>

    <div class="member-info">
      <h2 class="member-name">Maria Sosa</h2>
      <p class="member-role">Founder</p>
    </div>

    <div class="dots">
      <div class="dot active" data-index="0"></div>
      <div class="dot" data-index="1"></div>
      <div class="dot" data-index="2"></div>
      <div class="dot" data-index="3"></div>
      <div class="dot" data-index="4"></div>
      <div class="dot" data-index="5"></div>
    </div>
  </div>


<!-- CALENDARIO INTERACTIVO -->
  <section class="wedding-section">
    <h2 class="titulo-principal text-center mb-4">¿Qué Día desean Casarse?</h2>
    <div class="wedding-container">
      <div class="image-side">
        <img src="img/calendario.png" alt="Pareja">
      </div>
      <div class="calendar-side">
        <div class="calendar" id="calendar">
          <div class="month" id="monthDisplay">ENERO 2026</div>
          <div class="days">
            <span>Do</span><span>Lu</span><span>Ma</span><span>Mi</span><span>Ju</span><span>Vi</span><span>Sa</span>
          </div>
          <div class="dates" id="datesDisplay">
            <!-- Los días se generarán con JS -->
          </div>
          <div class="calendar-controls mt-3 d-flex justify-content-between">
            <button class="btn btn-sm btn-outline-rosado" id="prevMonthBtn"><i class="fa-solid fa-chevron-left"></i> Anterior</button>
            <button class="btn btn-sm btn-outline-rosado" id="nextMonthBtn">Siguiente <i class="fa-solid fa-chevron-right"></i></button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN: DISFRUTA ORGANIZANDO TU BODA -->
  <section class="disfruta-section py-5">
    <div class="container">
      <h2 class="titulo-principal text-center mb-5">Disfruta Organizando tu Boda</h2>
      
      <div class="row g-4 justify-content-center text-center mb-5">
        <?php foreach($categorias6 as $cat): ?>
        <div class="col-6 col-sm-4 col-md-2">
          <div class="categoria-card p-3">
            <i class="fa-solid <?= htmlspecialchars($cat['iconoCategoria'] ?? 'fa-heart') ?> categoria-icon"></i>
            <span class="d-block mt-2 fw-semibold"><?= htmlspecialchars($cat['nombreCategoria']) ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="row align-items-center mb-5">
        <div class="col-md-8">
          <h2>Proveedores</h2>
          <p class="text-secondary fs-5">Encuentra a los mejores profesionales de tu zona por categorías</p>
          <a href="#" class="enlace-rosado">Descubres los proveedores <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
          <span class="badge-rosado">+150 proveedores verificados</span>
        </div>
      </div>

      <div class="row align-items-center mb-4">
        <div class="col-md-8">
          <h2>Espacios</h2>
          <p class="text-secondary fs-5">Fotos, opiniones y muchos más ¡contáctalos desde aquí!</p>
          <a href="#" class="enlace-rosado">Encuentra más Espacios <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
          <span class="badge-rosado">+80 espacios disponibles</span>
        </div>
      </div>

      <div class="row g-4 mt-3">
        <div class="col-md-4">
          <div class="card espacio-card border-0 shadow-sm">
            <img src="https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Jardín">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Jardín Los Olivos</h5>
              <p class="card-text text-secondary">Fotos espectaculares, opiniones 5★</p>
              <a href="#" class="btn btn-outline-rosado btn-sm">Ver espacio</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card espacio-card border-0 shadow-sm">
            <img src="https://images.pexels.com/photos/2253870/pexels-photo-2253870.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Salón">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Salón Mirador</h5>
              <p class="card-text text-secondary">Elegante, opiniones 4.8★</p>
              <a href="#" class="btn btn-outline-rosado btn-sm">Ver espacio</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card espacio-card border-0 shadow-sm">
            <img src="https://images.pexels.com/photos/1268855/pexels-photo-1268855.jpeg?auto=compress&cs=tinysrgb&w=600" class="card-img-top" alt="Hacienda">
            <div class="card-body">
              <h5 class="card-title fw-semibold">Hacienda Santa María</h5>
              <p class="card-text text-secondary">Rústico, piscina, opiniones 4.9★</p>
              <a href="#" class="btn btn-outline-rosado btn-sm">Ver espacio</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 



<!-- SECCIÓN: EMPRESAS MÁS DESTACADAS PREMIUM -->
<section class="seccion-premium py-5">
  <div class="container">
    
    <!-- Cabecera Estilo Captura -->
    <div class="header-premium d-flex align-items-center mb-4">
      <h2 class="titulo-seccion">Empresas más Destacadas</h2>
      <span class="badge-top-premium">PREMIUM</span>
    </div>

    <!-- Viewport del Carrusel -->
    <div class="premium-viewport" id="vpPremium">
      <div class="premium-pista">
        
        <?php if(count($proveedoresPremium) > 0): ?>
          <?php foreach($proveedoresPremium as $fila): 
              $location = 'Granada';
              if (!empty($fila['seoKeywords'])) {
                  $parts = explode(',', $fila['seoKeywords']);
                  if (count($parts) > 1) {
                      $location = trim($parts[1]);
                  } else {
                      $location = trim($parts[0]);
                  }
              }
              $rutaImg = obtenerRutaImagen($fila['imgProveedorP']);
          ?>
          <!-- Tarjeta Dinámica -->
          <div class="premium-item">
            <div class="card-premium" style="background-image: url('<?= htmlspecialchars($rutaImg) ?>')">
              <div class="card-gradient"></div>
              <div class="card-content">
                <div class="card-top-row d-flex justify-content-between align-items-center">
                  <span class="badge-yellow">PREMIUM</span>
                  <div class="stars-gold">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                  </div>
                </div>
                <div class="card-info">
                  <h3 class="card-title"><?= htmlspecialchars($fila['nombreProveedor']) ?></h3>
                  <p class="card-location"><i class="fa-solid fa-location-dot me-1"></i> <?= htmlspecialchars($location) ?></p>
                  <a href="detalleProveedor.php?idProveedor=<?= $fila['idProveedor'] ?>" class="btn-premium-pink">Ver más</a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="w-100 text-center py-5 text-muted">No hay empresas premium disponibles.</div>
        <?php endif; ?>

      </div>
    </div>

    <!-- Barra de progreso -->
    <div class="progreso-wrapper mt-4">
      <div class="progreso-bg">
        <div class="progreso-fill" id="barPremium"></div>
      </div>
    </div>

    <!-- Navegación -->
    <div class="nav-controles d-flex justify-content-center mt-4">
      <button class="btn-circle" id="prevPrem" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>
      <button class="btn-circle ms-3" id="nextPrem" aria-label="Siguiente"><i class="fa-solid fa-chevron-right"></i></button>
    </div>

  </div>
</section>






<!-- SECCIÓN: BLOG AL DÍA -->
<section class="blog-seccion py-5 bg-white">
  <div class="container">
    
    <!-- Cabecera con Título y Badge Artículos -->
    <div class="blog-header d-flex align-items-center mb-4">
      <h2 class="blog-titulo-principal">Blog al Día</h2>
      <span class="blog-tag-articulos ms-3">ARTÍCULOS</span>
    </div>

    <!-- Contenedor del Carrusel Blog -->
    <div class="blog-carrusel-viewport" id="blogViewport">
      <div class="blog-pista" id="blogPista">
        
        <!-- Tarjeta 1 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
           <div class="blog-foto" style="background-image: url('img/momentosbodas.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Preparativos: Antes de la boda</h3>
        </div>

        <!-- Tarjeta 2 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
            <div class="blog-foto" style="background-image: url('img/zapatos.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">El gran momento: Votos y música</h3>
        </div>

        <!-- Tarjeta 3 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
            <div class="blog-foto" style="background-image: url('img/celebracion.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Celebración: Menús y fiesta</h3>
        </div>

        <!-- Tarjeta 4 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
            <div class="blog-foto" style="background-image: url('img/vestidotienda.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">El vestido: Consejos para elegirlo</h3>
        </div>

        <!-- Tarjeta 5 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
            <div class="blog-foto" style="background-image: url('img/maquillaje.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Maquillaje: Tendencias 2026</h3>
        </div>

        <!-- Tarjeta 6 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
           <div class="blog-foto" style="background-image: url('img/LUNADEMIEL.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Luna de Miel: Destinos exóticos</h3>
        </div>

        <!-- Tarjeta 7 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
            <div class="blog-foto" style="background-image: url('img/FOTOBODA.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Fotografía: Capturando emociones</h3>
        </div>

        <!-- Tarjeta 8 -->
        <div class="blog-item">
          <div class="blog-card-wrapper">
           <div class="blog-foto" style="background-image: url('img/inivtaciones.jpg')">
              <div class="blog-overlay">
                <a href="#" class="btn-ver-mas-center">Ver más</a>
              </div>
            </div>
          </div>
          <h3 class="blog-pie-titulo">Invitaciones: Diseños únicos</h3>
        </div>

      </div>
    </div>

    <!-- Barra de progreso inferior Blog -->
    <div class="progreso-contenedor mt-4">
      <div class="barra-fondo">
        <div class="barra-relleno" id="barraBlog"></div>
      </div>
    </div>

    <!-- Botones de navegación circulares Blog -->
    <div class="controles-nav d-flex justify-content-center mt-4">
      <button class="btn-nav-circular" id="btnPrevBlog">
        <i class="fa-solid fa-chevron-left"></i>
      </button>
      <button class="btn-nav-circular ms-3" id="btnNextBlog">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>
  </div>
</section>






<!-- SECCIÓN: RUTAS POR GRANADA PARA ENAMORADOS -->
<section class="rutas-seccion py-5 bg-white">
  <div class="container py-5">
    
    <!-- Título superior -->
    <h2 class="titulo-rutas-main mb-4">Rutas por Granada para Enamorados</h2>

    <!-- Contenedor del Carrusel -->
    <div class="carrusel-viewport" id="rutasViewport">
      <div class="carrusel-pista" id="rutasPista">
        
        <?php foreach($rutas as $index => $r): ?>
        <!-- Tarjeta Ruta Dinámica <?= $index + 1 ?> -->
        <div class="ruta-item">
          <div class="ruta-card-container">
            <div class="ruta-img-box" style="background-image: url('<?= htmlspecialchars($r['imgRuta']) ?>')">
              <div class="ruta-hover-overlay">
                <a href="detalleRuta.php?idRuta=<?= $r['idRuta'] ?>" class="btn-ver-mas-ruta">Ver más</a>
              </div>
            </div>
            <h4 class="ruta-nombre-pie"><?= htmlspecialchars($r['nombreRuta']) ?></h4>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <!-- Barra de progreso -->
    <div class="progreso-contenedor mt-4">
      <div class="barra-fondo">
        <div class="barra-relleno" id="fillRutas"></div>
      </div>
    </div>

    <!-- Botones de navegación circulares debajo de la barra -->
    <div class="controles-nav d-flex justify-content-center mt-4">
      <button class="btn-nav-circular" id="btnPrevRutas">
        <i class="fa-solid fa-chevron-left"></i>
      </button>
      <button class="btn-nav-circular ms-3" id="btnNextRutas">
        <i class="fa-solid fa-chevron-right"></i>
      </button>
    </div>

  </div>
</section>






<!-- SECCIÓN: ¿AÚN NO TIENES TU TRAJE? -->
<section class="trajes-seccion py-5">
  <div class="container py-5">
    <h2 class="titulo-trajes mb-5">¿Aún no tienes tu Traje?</h2>
    
    <div class="row">
      <!-- Columna de Enlaces Interactivos -->
      <div class="col-lg-3">
        <ul class="nav-trajes">
          <?php foreach($trajes as $index => $t): ?>
          <li class="nav-traje-item <?= $index == 0 ? 'active' : '' ?>" data-target="<?= htmlspecialchars($t['tipoTraje']) ?>">
            <span class="nav-marker">*</span> <?= htmlspecialchars($t['nombreTraje']) ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Columna de las 3 Tarjetas -->
      <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="trajes-grid-container" id="trajesGrid">
          
          <?php foreach($trajes as $t): ?>
          <!-- Tarjeta <?= htmlspecialchars($t['nombreTraje']) ?> -->
          <div class="traje-card-wrapper" id="card-<?= htmlspecialchars($t['tipoTraje']) ?>">
            <div class="traje-card shadow">
              <img src="<?= htmlspecialchars($t['imgTraje']) ?>" alt="<?= htmlspecialchars($t['nombreTraje']) ?>" class="img-traje">
              <div class="traje-reveal-overlay">
                <div class="traje-label"><?= htmlspecialchars(str_replace('Traje de ', '', $t['nombreTraje'])) ?></div>
                <div class="traje-footer">
                  <a href="detalleTraje.php?idTraje=<?= $t['idTraje'] ?>" class="btn-traje-link shadow-sm">Ver catálogo <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</section>


<!-- SECCIÓN: BODA EN EL PAÍS DE TUS SUEÑOS -->
<section class="seccion-carrusel py-5 bg-white">
  <div class="container">
    <div class="header-estilo-blog d-flex align-items-center mb-4">
      <h2 class="titulo-principal">Organiza tu Boda en el País de tus Sueños</h2>
    </div>

    <div class="carrusel-viewport" id="vpBodas">
      <div class="pista-carrusel">
        <!-- 8 Tarjetas de Destinos -->
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/italia.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Italia</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
             <div class="foto-blog" style="background-image: url('img/brazil.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Brasil</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/francia.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Francia</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
             <div class="foto-blog" style="background-image: url('img/grecia.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Grecia</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/mexico.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">México</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/bali.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Bali</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/japon.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Japón</h3>
        </div>
        <div class="item-carrusel">
          <div class="card-wrapper-blog">
            <div class="foto-blog" style="background-image: url('img/marreucos.jpg')">
              <div class="overlay-blog"><a href="#" class="btn-ver-mas-blog">Ver más</a></div>
            </div>
          </div>
          <h3 class="pie-titulo text-center">Marruecos</h3>
        </div>
      </div>
    </div>

    <!-- Navegación Bodas -->
    <div class="controles-navegacion mt-4">
      <div class="progreso-contenedor">
        <div class="barra-fondo"><div class="barra-relleno" id="barBodas"></div></div>
      </div>
      <div class="botones-nav d-flex justify-content-center mt-3">
        <button class="btn-circular" data-target="vpBodas" data-dir="prev"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="btn-circular ms-3" data-target="vpBodas" data-dir="next"><i class="fa-solid fa-chevron-right"></i></button>
      </div>
    </div>
  </div>
</section>

  
  
<!-- SECCIÓN: COMENTARIOS DE NUESTROS CLIENTES -->
<section class="seccion-testimonios py-5 bg-white">
  <div class="container">
    <div class="header-estilo-blog mb-5">
      <h2 class="titulo-principal">Comentarios de Nuestros Clientes</h2>
    </div>

    <div class="carrusel-viewport" id="vpTestimonios">
      <div class="pista-carrusel">
        <!-- Testimonio 1 -->
        <div class="item-testimonio">
          <div class="card-testimonio">
            <p class="texto-comentario">
              "Me ha encantado todo, gracias por ser parte de este sueño mágico, los recomiendo"
            </p>
            <div class="usuario-info">
              <div class="avatar-wrapper">
                <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Maria Sanchez" class="avatar-img">
              </div>
              <div class="calificacion-estrellas">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <h4 class="nombre-usuario">Maria Sanchez</h4>
            </div>
          </div>
        </div>

        <!-- Testimonio 2 -->
        <div class="item-testimonio">
          <div class="card-testimonio">
            <p class="texto-comentario">
              "Me ha encantado todo, gracias por ser parte de este sueño mágico, los recomiendo"
            </p>
            <div class="usuario-info">
              <div class="avatar-wrapper">
                <img src="https://images.pexels.com/photos/1181686/pexels-photo-1181686.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Maria Sanchez" class="avatar-img">
              </div>
              <div class="calificacion-estrellas">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <h4 class="nombre-usuario">Maria Sanchez</h4>
            </div>
          </div>
        </div>

        <!-- Testimonio 3 -->
        <div class="item-testimonio">
          <div class="card-testimonio">
            <p class="texto-comentario">
              "Me ha encantado todo, gracias por ser parte de este sueño mágico, los recomiendo"
            </p>
            <div class="usuario-info">
              <div class="avatar-wrapper">
                <img src="https://images.pexels.com/photos/712513/pexels-photo-712513.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Maria Sanchez" class="avatar-img">
              </div>
              <div class="calificacion-estrellas">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <h4 class="nombre-usuario">Maria Sanchez</h4>
            </div>
          </div>
        </div>

        <!-- Testimonio 4 -->
        <div class="item-testimonio">
          <div class="card-testimonio">
            <p class="texto-comentario">
              "Me ha encantado todo, gracias por ser parte de este sueño mágico, los recomiendo"
            </p>
            <div class="usuario-info">
              <div class="avatar-wrapper">
                <img src="https://images.pexels.com/photos/1130626/pexels-photo-1130626.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Maria Sanchez" class="avatar-img">
              </div>
              <div class="calificacion-estrellas">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <h4 class="nombre-usuario">Maria Sanchez</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- EMPRESAS ESPECIALIZADAS -->



<section class="seccion-categorias py-5 bg-white">
  <div class="container">
    <!-- Título de la sección -->
    <div class="header-categorias mb-5">
      <h2 class="titulo-seccion">Empresas Especializadas en Bodas</h2>
    </div>

    <!-- Grid de Categorías (12 Tarjetas) -->
    <div class="grid-categorias">
      
      <?php foreach($categorias12 as $index => $cat): 
          $rutaImgCat = obtenerImagenCategoria($cat['nombreCategoria']);
          // Si el nombre de la categoría es largo o queremos formatearlo como el original
          $nombreCatFormateado = $cat['nombreCategoria'];
          if (strtolower($cat['nombreCategoria']) == 'lugares') {
              $nombreCatFormateado = "Lugares para<br>mi Boda";
          }
      ?>
      <!-- Categoría Dinámica <?= $index + 1 ?> -->
      <div class="categoria-card">
        <div class="card-inner">
          <div class="img-circular-wrapper">
            <img src="<?= htmlspecialchars($rutaImgCat) ?>" alt="<?= htmlspecialchars($cat['nombreCategoria']) ?>">
          </div>
          <h4 class="categoria-nombre"><?= $nombreCatFormateado ?></h4>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>



<!-- SCROOLL TOP -->

<button id="scrollTopBtn" class="scroll-top-btn" title="Ir arriba">
  <i class="fa-solid fa-arrow-up"></i>
</button>





<!-- ALERT -->

<!-- Modal de Bienvenida -->
    <div class="modal-overlay" id="welcomeModal">
        <div class="modal-container">
            <button class="modal-close-x" id="closeX"><i class="fas fa-times"></i></button>
            
            <div class="modal-image-header">
                <div class="modal-gradient"></div>
                <div class="modal-body-content">
                    <h2>¡Bienvenidos a Bodas Online!</h2>
                    <p>¿Qué día deseas casarte?</p>
                    
                    <div class="wedding-form">
                        <input type="date" class="date-input" id="weddingDate">
                        <button class="btn-entrar" id="btnEntrar">Entrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main> 

<?php include_once("footer.php"); ?>