<?php 
if(isset($_GET['idRuta'])) {
    require_once("conexion.php");        
    $idRuta = $_GET['idRuta'];

    // Consulta detallada de la ruta romántica
    $consulta = "SELECT * FROM rutastb WHERE idRuta = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute([$idRuta]);
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Redirección si se manipula la URL
    if (!$resultado) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            <div class="row g-0">
                <div class="col-lg-6 position-relative">
                    <img src="<?= htmlspecialchars($resultado['imgRuta']) ?>" alt="<?= htmlspecialchars($resultado['nombreRuta']) ?>" class="w-100 h-100 object-fit-cover" style="min-height: 480px;">
                    <span class="badge position-absolute top-0 start-0 m-4 px-3 py-2 text-uppercase fw-bold shadow-sm" style="background-color: #ff4d88; font-size: 0.85rem; letter-spacing: 0.05em; color: white;">
                        Rutas por Granada
                    </span>
                </div>
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center">
                    <span class="text-uppercase fw-bold text-muted small mb-2"><i class="fa-solid fa-heart text-danger me-1"></i> Rincones para Enamorados</span>
                    <h1 class="display-5 fw-bold mb-3" style="color: #1a2b56; font-family: 'Montserrat', sans-serif;">
                        <?= htmlspecialchars($resultado['nombreRuta']) ?>
                    </h1>
                    
                    <p class="text-secondary mb-4 leading-relaxed text-justify" style="font-size: 1.1rem; line-height: 1.7;">
                        <?= nl2br(htmlspecialchars($resultado['descripcionRuta'])) ?>
                    </p>

                    <div class="p-4 rounded-4 mb-4 border border-light-subtle bg-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center border shadow-sm text-danger" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-map-location-dot fs-5"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 0.75rem;">Ubicación</small>
                                <span class="fw-bold text-dark fs-6">Granada, España</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="index.php" class="btn text-white px-4 py-3 fw-bold rounded-pill shadow-sm flex-grow-1 flex-md-grow-0" style="background-color: #ff4d88;">
                            <i class="fa-solid fa-arrow-left me-2"></i> Volver a la Portada
                        </a>
                        <a href="contacto.php" class="btn btn-outline-secondary px-4 py-3 fw-bold rounded-pill flex-grow-1 flex-md-grow-0">
                            ¿Quieres organizar tu boda aquí?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>
