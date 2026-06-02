<?php 
require_once("conexion.php");
require_once("seguridad.php");

if(!isset($_GET['idTraje'])) {
    header("Location: admin.php?tab=trajes");
    exit;
}

$idTraje = $_GET['idTraje'];

// Obtener los detalles del traje actual
$consulta = "SELECT * FROM trajestb WHERE idTraje = ?";
$sentencia = $conexion->prepare($consulta);
$sentencia->execute([$idTraje]);
$traje = $sentencia->fetch(PDO::FETCH_ASSOC);

if(!$traje) {
    header("Location: admin.php?tab=trajes");
    exit;
}

// Procesar el formulario de actualización
if($_POST) {
    $nombreTraje = $_POST['nombreTraje'];
    $tipoTraje = $_POST['tipoTraje'];
    $descripcionTraje = $_POST['descripcionTraje'];
    
    // Procesar imagen
    $imagen = $_FILES['imgTraje'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    
    if(!empty($nombreImagen)){
        $rutaDestino = "img/" . $nombreImagen;
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $imagenGuardar = "img/" . $nombreImagen;
    } else {
        $imagenGuardar = $traje['imgTraje'];
    }

    $consultaUpdate = "UPDATE trajestb SET nombreTraje = ?, imgTraje = ?, tipoTraje = ?, descripcionTraje = ? WHERE idTraje = ?";
    $sentenciaUpdate = $conexion->prepare($consultaUpdate);
    $resultado = $sentenciaUpdate->execute([$nombreTraje, $imagenGuardar, $tipoTraje, $descripcionTraje, $idTraje]);

    if($resultado) {
        header("Location: admin.php?tab=trajes");
        exit;
    } else {
        echo "Error al actualizar el traje.";
    }
}
?>

<?php include_once("header.php"); ?>

<div style="max-width: 500px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; font-family: sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Editar Colección de Trajes</h2>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre de la Colección:</label>
            <input type="text" name="nombreTraje" value="<?= htmlspecialchars($traje['nombreTraje']) ?>" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tipo de Traje:</label>
            <select name="tipoTraje" required style="width: 100%; padding: 8px; box-sizing: border-box;">
                <option value="novia" <?= ($traje['tipoTraje'] == 'novia') ? 'selected' : '' ?>>Traje de Novia</option>
                <option value="novio" <?= ($traje['tipoTraje'] == 'novio') ? 'selected' : '' ?>>Traje de Novio</option>
                <option value="fiesta" <?= ($traje['tipoTraje'] == 'fiesta') ? 'selected' : '' ?>>Traje de Fiesta y Acompañante</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Descripción:</label>
            <textarea name="descripcionTraje" rows="5" required style="width: 100%; padding: 8px; box-sizing: border-box;"><?= htmlspecialchars($traje['descripcionTraje']) ?></textarea>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Imagen actual:</label>
            <img src="<?= htmlspecialchars($traje['imgTraje']) ?>" width="150" style="display: block; margin-bottom: 10px; border: 1px solid #ddd; padding: 3px;">
            
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Subir Nueva Imagen (Opcional):</label>
            <input type="file" name="imgTraje" style="width: 100%;">
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #1a2b56; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 3px;">Guardar Cambios</button>
            <br><br>
            <a href="admin.php?tab=trajes" style="color: #666; text-decoration: none;">Cancelar y Volver</a>
        </div>
    </form>
</div>

<?php include_once("footer.php"); ?>
