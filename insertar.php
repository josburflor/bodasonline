<?php 
require_once("conexion.php");
require_once("seguridad.php");

// Recuperar las categorías activas para renderizar dinámicamente el selector
$consultaCategorias = "SELECT * FROM categoriastb";
$sentenciaCategorias = $conexion->query($consultaCategorias);
$categorias = $sentenciaCategorias->fetchAll(PDO::FETCH_ASSOC);

if($_POST) {
    $imagen = $_FILES['imgProveedorP'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    $rutaDestino = "img/" . $nombreImagen;

    // Subida física de la foto promocional
    if(!empty($nombreImagen)){
        move_uploaded_file($rutaTemporal, $rutaDestino);
    } else {
        $nombreImagen = "default.jpg";
    }

    $nombreProveedor = $_POST['nombreProveedor'];
    $idCategoria = $_POST['idCategoria'];
    $descripcionProveedor = $_POST['descripcionProveedor'];
    $telefonoProveedor = $_POST['telefonoProveedor'];
    $precioDesde = $_POST['precioDesde'];
    $seoKeywords = $_POST['seoKeywords'];
    $visible = isset($_POST['visible']) ? 1 : 0;

    // Ejecución estructurada usando marcadores de posición preparados de PDO
    $insertar = "INSERT INTO proveedorestb (nombreProveedor, idCategoria, imgProveedorP, descripcionProveedor, telefonoProveedor, precioDesde, seoKeywords, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $sentenciaInsertar = $conexion->prepare($insertar);
    $resultado = $sentenciaInsertar->execute([$nombreProveedor, $idCategoria, $nombreImagen, $descripcionProveedor, $telefonoProveedor, $precioDesde, $seoKeywords, $visible]);

    if($resultado) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Ocurrió un inconveniente al guardar el registro.";
    }
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container" style="max-width: 750px;">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
            <h2 class="fw-bold mb-1 text-center" style="color: #1d3557;">Registrar Proveedor Profesional</h2>
            <p class="text-muted text-center mb-4">Añade una nueva empresa o profesional autónomo al catálogo de Bodas Online.</p>
            
            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Nombre de la Empresa</label>
                    <input type="text" class="form-control p-3 border-light-subtle" placeholder="Ej. Banquetes Alhambra S.L." name="nombreProveedor" required style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Categoría de Servicio</label>
                    <select class="form-select p-3 border-light-subtle" name="idCategoria" required style="border-radius: 10px;">
                        <option value="" disabled selected>Selecciona el sector profesional...</option>
                        <?php foreach ($categorias as $cat) { ?>
                            <option value="<?= $cat['idCategoria'] ?>"><?= $cat['nombreCategoria'] ?></option>
                        <?php } ?>  
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Descripción de Servicios</label>
                    <textarea class="form-control p-3 border-light-subtle" placeholder="Describe detalladamente qué servicios ofrece la empresa, instalaciones, experiencia..." name="descripcionProveedor" rows="4" required style="border-radius: 10px;"></textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Teléfono Comercial</label>
                        <input type="text" class="form-control p-3 border-light-subtle" placeholder="Ej. +34 600 000 000" name="telefonoProveedor" required style="border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Precio Mínimo de Servicio (€)</label>
                        <input type="number" class="form-control p-3 border-light-subtle" placeholder="Ej. 1200" name="precioDesde" required style="border-radius: 10px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Palabras Clave (SEO)</label>
                    <textarea name="seoKeywords" placeholder="Palabras clave separadas por comas (ej. catering granada, menú boda, banquetes gourmet)" class="form-control p-3 border-light-subtle" rows="2" style="border-radius: 10px;"></textarea>
                </div>    
                
                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark d-block">Logotipo o Imagen de Portada</label>
                    <input type="file" name="imgProveedorP" class="form-control p-2" required style="border-radius: 10px;">
                    <small class="text-muted d-block mt-1">Formateada preferiblemente en dimensiones horizontales (JPEG, PNG o WebP).</small>
                </div>

                <div class="form-check form-switch mb-4 p-3 rounded-3 bg-light border border-dashed">
                    <input type="checkbox" class="form-check-input ms-0 me-3" name="visible" id="visible" checked style="cursor: pointer;">
                    <label class="form-check-label fw-bold text-dark" for="visible" style="cursor: pointer;">Activar visualización inmediata en el directorio público</label>
                </div>

                <div class="text-center pt-2">
                    <button type="submit" class="btn text-white w-100 fw-bold py-3 transition-all shadow" style="background-color: #233d90; border-radius: 12px; font-size: 1.05rem;">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Guardar y Publicar Proveedor
                    </button>
                    <a href="admin.php" class="btn btn-link text-muted mt-3 text-decoration-none small d-inline-block">Volver al Panel General</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>