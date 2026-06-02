<?php 
require_once("conexion.php");
require_once("seguridad.php");

if($_POST) {
    $nombreRuta = $_POST['nombreRuta'];
    $descripcionRuta = $_POST['descripcionRuta'];
    
    // Subida física de la foto de la ruta
    $imagen = $_FILES['imgRuta'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    $rutaDestino = "img/" . $nombreImagen;

    if(!empty($nombreImagen)){
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $imgRuta = "img/" . $nombreImagen;
    } else {
        $imgRuta = "img/default.jpg";
    }

    $insertar = "INSERT INTO rutastb (nombreRuta, imgRuta, descripcionRuta) VALUES (?, ?, ?)";
    $sentenciaInsertar = $conexion->prepare($insertar);
    $resultado = $sentenciaInsertar->execute([$nombreRuta, $imgRuta, $descripcionRuta]);

    if($resultado) {
        header("Location: admin.php?tab=rutas");
        exit;
    } else {
        $errorMensaje = "Ocurrió un inconveniente al guardar la ruta.";
    }
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container" style="max-width: 750px;">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
            <h2 class="fw-bold mb-1 text-center" style="color: #ff4d88;">Registrar Nueva Ruta Romántica</h2>
            <p class="text-muted text-center mb-4">Añade un nuevo rincón o itinerario romántico por Granada en el catálogo de Bodas Online.</p>
            
            <?php if(isset($errorMensaje)): ?>
                <div class="alert alert-danger rounded-3" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> <?= $errorMensaje ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Nombre de la Ruta</label>
                    <input type="text" class="form-control p-3 border-light-subtle" placeholder="Ej. Paseo Nocturno por el Albayzín" name="nombreRuta" required style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Descripción de la Ruta</label>
                    <textarea class="form-control p-3 border-light-subtle" placeholder="Describe los puntos románticos clave, miradores, monumentos e historia..." name="descripcionRuta" rows="5" required style="border-radius: 10px;"></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark d-block">Imagen Representativa / Portada</label>
                    <input type="file" name="imgRuta" class="form-control p-2" required style="border-radius: 10px;">
                    <small class="text-muted d-block mt-1">Formateada preferiblemente en dimensiones horizontales (JPEG, PNG o WebP).</small>
                </div>

                <div class="text-center pt-2">
                    <button type="submit" class="btn text-white w-100 fw-bold py-3 transition-all shadow" style="background-color: #ff4d88; border-radius: 12px; font-size: 1.05rem;">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Guardar y Publicar Ruta
                    </button>
                    <a href="admin.php?tab=rutas" class="btn btn-link text-muted mt-3 text-decoration-none small d-inline-block">Volver al Panel</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>
