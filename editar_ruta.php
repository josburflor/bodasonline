<?php 
require_once("conexion.php");
require_once("seguridad.php");

if(!isset($_GET['idRuta'])) {
    header("Location: admin.php?tab=rutas");
    exit;
}

$idRuta = $_GET['idRuta'];

// Obtener los detalles de la ruta actual
$consulta = "SELECT * FROM rutastb WHERE idRuta = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->execute([$idRuta]);
$ruta = $sentencia->fetch(PDO::FETCH_ASSOC);

if(!$ruta) {
    header("Location: admin.php?tab=rutas");
    exit;
}

// Procesar el formulario de actualización
if($_POST) {
    $nombreRuta = $_POST['nombreRuta'];
    $descripcionRuta = $_POST['descripcionRuta'];
    
    // Procesar imagen
    $imagen = $_FILES['imgRuta'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    
    if(!empty($nombreImagen)){
        $rutaDestino = "img/" . $nombreImagen;
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $imagenGuardar = "img/" . $nombreImagen;
    } else {
        $imagenGuardar = $ruta['imgRuta'];
    }

    $consultaUpdate = "UPDATE rutastb SET nombreRuta = ?, imgRuta = ?, descripcionRuta = ? WHERE idRuta = ?";
    $sentenciaUpdate = $conexion->prepare($consultaUpdate);
    $resultado = $sentenciaUpdate->execute([$nombreRuta, $imagenGuardar, $descripcionRuta, $idRuta]);

    if($resultado) {
        header("Location: admin.php?tab=rutas");
        exit;
    } else {
        echo "Error al actualizar la ruta.";
    }
}
?>

<?php include_once("header.php"); ?>

<div style="max-width: 500px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; font-family: sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Editar Ruta Romántica</h2>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre de la Ruta:</label>
            <input type="text" name="nombreRuta" value="<?= htmlspecialchars($ruta['nombreRuta']) ?>" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Descripción:</label>
            <textarea name="descripcionRuta" rows="5" required style="width: 100%; padding: 8px; box-sizing: border-box;"><?= htmlspecialchars($ruta['descripcionRuta']) ?></textarea>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Imagen actual:</label>
            <img src="<?= htmlspecialchars($ruta['imgRuta']) ?>" width="150" style="display: block; margin-bottom: 10px; border: 1px solid #ddd; padding: 3px;">
            
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Subir Nueva Imagen (Opcional):</label>
            <input type="file" name="imgRuta" style="width: 100%;">
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #ff4d88; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 3px;">Guardar Cambios</button>
            <br><br>
            <a href="admin.php?tab=rutas" style="color: #666; text-decoration: none;">Cancelar y Volver</a>
        </div>
    </form>
</div>

<?php include_once("footer.php"); ?>
