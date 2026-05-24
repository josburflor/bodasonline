<?php 
if(isset($_GET['idProveedor'])) {
    require_once("conexion.php");        
    $idProveedor = $_GET['idProveedor'];

    // Consulta detallada mediante enlace relacional PDO
    $consulta = "SELECT * FROM proveedorestb, categoriastb WHERE proveedorestb.idCategoria = categoriastb.idCategoria AND idProveedor = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->execute([$idProveedor]);
    $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    // Redirección si se manipula la URL con un identificador inexistente
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
                    <?php 
                    $imgSrc = 'img/default.jpg';
                    if (!empty($resultado['imgProveedorP'])) {
                        if (strpos($resultado['imgProveedorP'], 'http://') === 0 || strpos($resultado['imgProveedorP'], 'https://') === 0) {
                            $imgSrc = $resultado['imgProveedorP'];
                        } else {
                            $imgSrc = 'img/' . $resultado['imgProveedorP'];
                        }
                    }
                    ?>
                    <img src="<?= htmlspecialchars($imgSrc) ?>" alt="<?= $resultado['nombreProveedor'] ?>" class="w-100 h-100 object-fit-cover" style="min-height: 450px;">
                    <span class="badge position-absolute top-0 start-0 m-4 px-3 py-2 text-uppercase fw-bold shadow-sm" style="background-color: #233d90; font-size: 0.85rem; letter-spacing: 0.05em;">
                        <?= $resultado['nombreCategoria'] ?>
                    </span>
                </div>
                <div class="col-lg-6 p-4 p-md-5 d-flex flex-column justify-content-center">
                    <h1 class="display-5 fw-bold mb-3" style="color: #1a2b56; font-family: 'Montserrat', sans-serif;">
                        <?= $resultado['nombreProveedor'] ?>
                    </h1>
                    
                    <p class="text-secondary mb-4 leading-relaxed text-justify" style="font-size: 1.05rem;">
                        <?= nl2br($resultado['descripcionProveedor']) ?>
                    </p>

                    <div class="p-4 rounded-4 mb-4 border border-light-subtle bg-light">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center border shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-euro-sign text-success fs-5"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 0.75rem;">Tarifa Base Estimada</small>
                                <span class="fw-bold text-dark fs-5">Desde <?= $resultado['precioDesde'] ?>€</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center border shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-phone text-primary fs-5" style="color: #233d90 !important;"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block text-uppercase fw-semibold tracking-wider" style="font-size: 0.75rem;">Contacto Telefónico</small>
                                <span class="fw-bold text-dark fs-5"><?= $resultado['telefonoProveedor'] ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="contacto.php" class="btn text-white px-4 py-3 fw-bold rounded-pill shadow-sm flex-grow-1 flex-md-grow-0" style="background-color: #233d90;">
                            <i class="far fa-envelope me-2"></i> Solicitar Información Gratuita
                        </a>
                        <a href="admin.php" class="btn btn-outline-secondary px-4 py-3 fw-bold rounded-pill flex-grow-1 flex-md-grow-0">
                            Volver al Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>