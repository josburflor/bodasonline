<?php 
require_once("conexion.php");
require_once("seguridad.php");

if($_POST) {
    $nombreTraje = $_POST['nombreTraje'];
    $tipoTraje = $_POST['tipoTraje'];
    $descripcionTraje = $_POST['descripcionTraje'];
    
    // Subida de la foto del traje
    $imagen = $_FILES['imgTraje'];
    $nombreImagen = $imagen['name'];
    $rutaTemporal = $imagen['tmp_name'];
    $rutaDestino = "img/" . $nombreImagen;

    if(!empty($nombreImagen)){
        move_uploaded_file($rutaTemporal, $rutaDestino);
        $imgTraje = "img/" . $nombreImagen;
    } else {
        $imgTraje = "img/default.jpg";
    }

    $insertar = "INSERT INTO trajestb (nombreTraje, imgTraje, tipoTraje, descripcionTraje) VALUES (?, ?, ?, ?)";
    $sentencia = $conexion->prepare($insertar);
    $resultado = $sentencia->execute([$nombreTraje, $imgTraje, $tipoTraje, $descripcionTraje]);

    if($resultado) {
        header("Location: admin.php?tab=trajes");
        exit;
    } else {
        echo "Error al guardar el traje.";
    }
}
?>

<?php include_once("header.php"); ?>

<div style="max-width: 500px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff; font-family: sans-serif;">
    <h2 style="text-align: center; margin-bottom: 20px;">Añadir Nuevo Traje</h2>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre del Traje:</label>
            <input type="text" name="nombreTraje" required style="width: 100%; padding: 8px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Tipo de Traje:</label>
            <select name="tipoTraje" required style="width: 100%; padding: 8px; box-sizing: border-box;">
                <option value="novia">Traje de Novia</option>
                <option value="novio">Traje de Novio</option>
                <option value="fiesta">Traje de Fiesta y Acompañante</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Descripción:</label>
            <textarea name="descripcionTraje" rows="4" required style="width: 100%; padding: 8px; box-sizing: border-box;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Imagen:</label>
            <input type="file" name="imgTraje" required style="width: 100%;">
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #1a2b56; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 3px;">Guardar Traje</button>
            <br><br>
            <a href="admin.php?tab=trajes" style="color: #666; text-decoration: none;">Volver al Panel</a>
        </div>
    </form>
</div>

<?php include_once("footer.php"); ?>
