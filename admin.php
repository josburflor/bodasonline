<?php 
require_once("conexion.php");

$tab = $_GET['tab'] ?? 'proveedores';

// Acortar texto largo
function extraer($texto, $desde, $numero){
    if (strlen($texto) > $numero) {
        return substr($texto, $desde, $numero) . "...";
    }
    return $texto;
}

// Resolver ruta de imágenes
function obtenerRutaImagen($img) {
    if (empty($img)) return 'img/default.jpg';
    if (strpos($img, 'http://') === 0 || strpos($img, 'https://') === 0) return $img;
    if (strpos($img, 'img/') === 0) return $img;
    return 'img/' . $img;
}

// Borrar proveedor (ocultar)
if(isset($_GET['borrarProveedor'])) {
    $sentencia = $conexion->prepare("UPDATE proveedorestb SET visible = 0 WHERE idProveedor = ?");
    $sentencia->execute([$_GET['borrarProveedor']]);
    header("Location: admin.php?tab=proveedores");
    exit;
}

// Borrar ruta
if(isset($_GET['borrarRuta'])) {
    $sentencia = $conexion->prepare("DELETE FROM rutastb WHERE idRuta = ?");
    $sentencia->execute([$_GET['borrarRuta']]);
    header("Location: admin.php?tab=rutas");
    exit;
}

// Borrar traje
if(isset($_GET['borrarTraje'])) {
    $sentencia = $conexion->prepare("DELETE FROM trajestb WHERE idTraje = ?");
    $sentencia->execute([$_GET['borrarTraje']]);
    header("Location: admin.php?tab=trajes");
    exit;
}

// Cargar datos según pestaña
if ($tab == 'proveedores') {
    $consulta = "SELECT * FROM proveedorestb, categoriastb WHERE proveedorestb.idCategoria = categoriastb.idCategoria";
    $resultados = $conexion->query($consulta)->fetchAll(PDO::FETCH_ASSOC);
} elseif ($tab == 'rutas') {
    $resultados = $conexion->query("SELECT * FROM rutastb")->fetchAll(PDO::FETCH_ASSOC);
} elseif ($tab == 'trajes') {
    $resultados = $conexion->query("SELECT * FROM trajestb")->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include_once("header.php"); ?>

<div style="max-width: 1100px; margin: 30px auto; padding: 0 15px; font-family: sans-serif;">

    <h1 style="margin-bottom: 5px;">Panel de Administración</h1>
    <p style="color: #666; margin-bottom: 20px;">Gestiona proveedores, rutas románticas y colección de trajes.</p>

    <!-- Navegación entre pestañas -->
    <div style="margin-bottom: 20px;">
        <a href="admin.php?tab=proveedores" style="padding: 8px 16px; margin-right: 5px; text-decoration: none; border: 1px solid #333; background-color: <?= $tab == 'proveedores' ? '#333' : '#fff' ?>; color: <?= $tab == 'proveedores' ? '#fff' : '#333' ?>;">
            Proveedores
        </a>
        <a href="admin.php?tab=rutas" style="padding: 8px 16px; margin-right: 5px; text-decoration: none; border: 1px solid #333; background-color: <?= $tab == 'rutas' ? '#333' : '#fff' ?>; color: <?= $tab == 'rutas' ? '#fff' : '#333' ?>;">
            Rutas Románticas
        </a>
        <a href="admin.php?tab=trajes" style="padding: 8px 16px; text-decoration: none; border: 1px solid #333; background-color: <?= $tab == 'trajes' ? '#333' : '#fff' ?>; color: <?= $tab == 'trajes' ? '#fff' : '#333' ?>;">
            Colección de Trajes
        </a>
    </div>

    <!-- Botón Añadir -->
    <div style="margin-bottom: 15px;">
        <?php if($tab == 'proveedores'): ?>
            <a href="insertar.php" style="padding: 8px 16px; background-color: #1a2b56; color: white; text-decoration: none; border-radius: 3px;">+ Añadir Proveedor</a>
        <?php elseif($tab == 'rutas'): ?>
            <a href="insertar_ruta.php" style="padding: 8px 16px; background-color: #c0392b; color: white; text-decoration: none; border-radius: 3px;">+ Añadir Ruta</a>
        <?php elseif($tab == 'trajes'): ?>
            <a href="insertar_traje.php" style="padding: 8px 16px; background-color: #1a2b56; color: white; text-decoration: none; border-radius: 3px;">+ Añadir Traje</a>
        <?php endif; ?>
    </div>

    <!-- TABLA PROVEEDORES -->
    <?php if($tab == 'proveedores'): ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; background-color: #fff;">
        <thead style="background-color: #1a2b56; color: white;">
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($resultados) > 0): ?>
            <?php foreach($resultados as $fila): ?>
            <tr>
                <td><?= $fila['idProveedor'] ?></td>
                <td>
                    <?= htmlspecialchars($fila['nombreProveedor']) ?><br>
                    <small style="color: #666;"><?= htmlspecialchars($fila['telefonoProveedor']) ?></small>
                </td>
                <td><img src="<?= htmlspecialchars(obtenerRutaImagen($fila['imgProveedorP'])) ?>" width="80" height="55" style="object-fit: cover; border: 1px solid #ddd;"></td>
                <td><?= extraer(htmlspecialchars($fila['descripcionProveedor']), 0, 50) ?></td>
                <td><?= htmlspecialchars($fila['nombreCategoria']) ?></td>
                <td><?= $fila['visible'] == 1 ? 'Visible' : 'Oculto' ?></td>
                <td><a href="editar.php?idProveedor=<?= $fila['idProveedor'] ?>">Editar</a></td>
                <td><a href="admin.php?tab=proveedores&borrarProveedor=<?= $fila['idProveedor'] ?>" onclick="return confirm('¿Ocultar este proveedor?');">Ocultar</a></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" style="text-align: center; padding: 20px; color: #666;">No hay proveedores registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- TABLA RUTAS -->
    <?php elseif($tab == 'rutas'): ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; background-color: #fff;">
        <thead style="background-color: #c0392b; color: white;">
            <tr>
                <th>ID</th>
                <th>Nombre de la Ruta</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($resultados) > 0): ?>
            <?php foreach($resultados as $fila): ?>
            <tr>
                <td><?= $fila['idRuta'] ?></td>
                <td><?= htmlspecialchars($fila['nombreRuta']) ?></td>
                <td><img src="<?= htmlspecialchars(obtenerRutaImagen($fila['imgRuta'])) ?>" width="80" height="55" style="object-fit: cover; border: 1px solid #ddd;"></td>
                <td><?= extraer(htmlspecialchars($fila['descripcionRuta']), 0, 80) ?></td>
                <td><a href="editar_ruta.php?idRuta=<?= $fila['idRuta'] ?>">Editar</a></td>
                <td><a href="admin.php?tab=rutas&borrarRuta=<?= $fila['idRuta'] ?>" onclick="return confirm('¿Eliminar esta ruta?');">Eliminar</a></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" style="text-align: center; padding: 20px; color: #666;">No hay rutas registradas.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- TABLA TRAJES -->
    <?php elseif($tab == 'trajes'): ?>
    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse; background-color: #fff;">
        <thead style="background-color: #1a2b56; color: white;">
            <tr>
                <th>ID</th>
                <th>Nombre del Traje</th>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($resultados) > 0): ?>
            <?php foreach($resultados as $fila): ?>
            <tr>
                <td><?= $fila['idTraje'] ?></td>
                <td><?= htmlspecialchars($fila['nombreTraje']) ?></td>
                <td><img src="<?= htmlspecialchars(obtenerRutaImagen($fila['imgTraje'])) ?>" width="80" height="55" style="object-fit: cover; border: 1px solid #ddd;"></td>
                <td><?= htmlspecialchars($fila['tipoTraje']) ?></td>
                <td><?= extraer(htmlspecialchars($fila['descripcionTraje']), 0, 80) ?></td>
                <td><a href="editar_traje.php?idTraje=<?= $fila['idTraje'] ?>">Editar</a></td>
                <td><a href="admin.php?tab=trajes&borrarTraje=<?= $fila['idTraje'] ?>" onclick="return confirm('¿Eliminar este traje?');">Eliminar</a></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" style="text-align: center; padding: 20px; color: #666;">No hay trajes registrados.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php endif; ?>

</div>

<?php include_once("footer.php"); ?>