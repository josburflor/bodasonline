<?php 
if(isset($_GET['idTraje'])) {
    require_once("conexion.php");        
    $idTraje = $_GET['idTraje'];

    // Consulta detallada del traje
    $consulta = "SELECT * FROM trajestb WHERE idTraje = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute([$idTraje]);
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
                    <img src="<?= htmlspecialchars($resultado['imgTraje']) ?>" alt="<?= htmlspecialchars($resultado['nombreTraje']) ?>" class="w-100 h-100 object-fit-cover" style="min-height: 480px;">
                    <span class="badge position-absolute top-0 start-0 m-4 px-3 py-2 text-uppercase fw-bold shadow-sm" style="background-color: #233d90; font-size: 0.85rem; letter-spacing: 0.05em; color: white;">
                        Catálogo de Moda
                    </span>
                </div>
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center">
                    <span class="text-uppercase fw-bold text-muted small mb-2"><i class="fa-solid fa-scissors me-1"></i> Diseños Exclusivos</span>
                    <h1 class="display-5 fw-bold mb-3" style="color: #1a2b56; font-family: 'Montserrat', sans-serif;">
                        <?= htmlspecialchars($resultado['nombreTraje']) ?>
                    </h1>
                    
                    <p class="text-secondary mb-4 leading-relaxed text-justify" style="font-size: 1.1rem; line-height: 1.7;">
                        <?= nl2br(htmlspecialchars($resultado['descripcionTraje'])) ?>
                    </p>

                    <div class="p-4 rounded-4 mb-4 border border-light-subtle bg-light">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center border shadow-sm text-primary" style="width: 45px; height: 45px; color: #233d90 !important;">
                                <i class="fa-solid fa-gem fs-5"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 0.75rem;">Calidad Certificada</small>
                                <span class="fw-bold text-dark fs-6">Tejidos y Alta Costura Premium</span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="index.php" class="btn text-white px-4 py-3 fw-bold rounded-pill shadow-sm flex-grow-1 flex-md-grow-0" style="background-color: #233d90;">
                            <i class="fa-solid fa-arrow-left me-2"></i> Volver a la Portada
                        </a>
                        <a href="contacto.php" class="btn btn-outline-rosado px-4 py-3 fw-bold rounded-pill flex-grow-1 flex-md-grow-0" style="color: #ff4d88; border-color: #ffc2d6;">
                            Solicitar Cita con Diseñador
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>
