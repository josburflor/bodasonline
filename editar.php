<?php 
require_once("conexion.php");

// 1. Validar que exista el identificador del proveedor
if(!isset($_GET['idProveedor'])) {
    header("Location: admin.php");
    exit;
}

$idProveedor = $_GET['idProveedor'];

// 2. Obtener los detalles del proveedor actual
$consultaProveedor = "SELECT * FROM proveedorestb WHERE idProveedor = ?";
$sentenciaProveedor = $conexion->prepare($consultaProveedor);
$sentenciaProveedor->execute([$idProveedor]);
$proveedor = $sentenciaProveedor->fetch(PDO::FETCH_ASSOC);

if(!$proveedor) {
    header("Location: admin.php");
    exit;
}

// Helper para resolver la ruta de la imagen actual
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

// 3. Recuperar las categorías para el listado desplegable
$consultaCategorias = "SELECT * FROM categoriastb";
$sentenciaCategorias = $conexion->query($consultaCategorias);
$categorias = $sentenciaCategorias->fetchAll(PDO::FETCH_ASSOC);

// 4. Procesar el formulario de actualización
if($_POST) {
    $nombreProveedor = $_POST['nombreProveedor'];
    $idCategoria = $_POST['idCategoria'];
    $descripcionProveedor = $_POST['descripcionProveedor'];
    $telefonoProveedor = $_POST['telefonoProveedor'];
    $precioDesde = $_POST['precioDesde'];
    $seoKeywords = $_POST['seoKeywords'];
    $visible = isset($_POST['visible']) ? 1 : 0;
    
    // Procesar imagen
    $imagen = $_FILES['imgProveedorP'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    
    if(!empty($nombreImagen)){
        // Se subió una nueva imagen física
        $rutaDestino = "img/" . $nombreImagen;
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $imagenGuardar = $nombreImagen;
    } else {
        // Mantener la imagen/URL existente
        $imagenGuardar = $proveedor['imgProveedorP'];
    }

    // Ejecutar actualización
    $consultaUpdate = "UPDATE proveedorestb SET nombreProveedor = ?, idCategoria = ?, imgProveedorP = ?, descripcionProveedor = ?, telefonoProveedor = ?, precioDesde = ?, seoKeywords = ?, visible = ? WHERE idProveedor = ?";
    $sentenciaUpdate = $conexion->prepare($consultaUpdate);
    $resultado = $sentenciaUpdate->execute([$nombreProveedor, $idCategoria, $imagenGuardar, $descripcionProveedor, $telefonoProveedor, $precioDesde, $seoKeywords, $visible, $idProveedor]);

    if($resultado) {
        header("Location: admin.php");
        exit;
    } else {
        $errorMensaje = "Ocurrió un inconveniente al actualizar el registro.";
    }
}
?>

<?php include_once("header.php"); ?>

<main class="bg-light py-5">
    <div class="container" style="max-width: 750px;">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
            <h2 class="fw-bold mb-1 text-center" style="color: #1d3557;">Editar Proveedor Profesional</h2>
            <p class="text-muted text-center mb-4">Modifica los detalles, categoría o visibilidad de la empresa seleccionada.</p>
            
            <?php if(isset($errorMensaje)): ?>
                <div class="alert alert-danger rounded-3" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> <?= $errorMensaje ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Nombre de la Empresa</label>
                    <input type="text" class="form-control p-3 border-light-subtle" name="nombreProveedor" value="<?= htmlspecialchars($proveedor['nombreProveedor']) ?>" required style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Categoría de Servicio</label>
                    <select class="form-select p-3 border-light-subtle" name="idCategoria" required style="border-radius: 10px;">
                        <?php foreach ($categorias as $cat) { ?>
                            <option value="<?= $cat['idCategoria'] ?>" <?= ($cat['idCategoria'] == $proveedor['idCategoria']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['nombreCategoria']) ?>
                            </option>
                        <?php } ?>  
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Descripción de Servicios</label>
                    <textarea class="form-control p-3 border-light-subtle" name="descripcionProveedor" rows="4" required style="border-radius: 10px;"><?= htmlspecialchars($proveedor['descripcionProveedor']) ?></textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Teléfono Comercial</label>
                        <input type="text" class="form-control p-3 border-light-subtle" name="telefonoProveedor" value="<?= htmlspecialchars($proveedor['telefonoProveedor']) ?>" required style="border-radius: 10px;">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-dark">Precio Mínimo de Servicio (€)</label>
                        <input type="number" class="form-control p-3 border-light-subtle" name="precioDesde" value="<?= htmlspecialchars($proveedor['precioDesde']) ?>" required style="border-radius: 10px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Palabras Clave (SEO)</label>
                    <textarea name="seoKeywords" class="form-control p-3 border-light-subtle" rows="2" style="border-radius: 10px;"><?= htmlspecialchars($proveedor['seoKeywords'] ?? '') ?></textarea>
                </div>    
                
                <div class="mb-4">
                    <label class="form-label fw-semibold text-dark d-block">Imagen de Portada Actual</label>
                    <div class="d-flex align-items-center gap-3 mb-3 p-3 border rounded-3 bg-light">
                        <img src="<?= htmlspecialchars(obtenerRutaImagen($proveedor['imgProveedorP'])) ?>" width="100" height="70" class="object-fit-cover rounded shadow-sm border" alt="Portada actual">
                        <div class="small text-muted text-break">
                            <strong>Nombre actual:</strong><br>
                            <?= htmlspecialchars(basename($proveedor['imgProveedorP'])) ?>
                        </div>
                    </div>
                    
                    <label class="form-label fw-semibold text-dark d-block">Subir Nueva Portada (Opcional)</label>
                    <input type="file" name="imgProveedorP" class="form-control p-2" style="border-radius: 10px;">
                    <small class="text-muted d-block mt-1">Deja este campo vacío si deseas mantener la portada actual.</small>
                </div>

                <div class="form-check form-switch mb-4 p-3 rounded-3 bg-light border border-dashed">
                    <input type="checkbox" class="form-check-input ms-0 me-3" name="visible" id="visible" <?= ($proveedor['visible'] == 1) ? 'checked' : '' ?> style="cursor: pointer;">
                    <label class="form-check-label fw-bold text-dark" for="visible" style="cursor: pointer;">Activar visualización inmediata en el directorio público</label>
                </div>

                <div class="text-center pt-2">
                    <button type="submit" class="btn text-white w-100 fw-bold py-3 transition-all shadow" style="background-color: #233d90; border-radius: 12px; font-size: 1.05rem;">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Guardar y Aplicar Cambios
                    </button>
                    <a href="admin.php" class="btn btn-link text-muted mt-3 text-decoration-none small d-inline-block">Cancelar y Volver al Panel</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>
