<?php 
$dbname = "bodasonline";
$dbuser = "root";
$dbpass = "";
$host = "localhost";

try {
   $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=Utf8", $dbuser, $dbpass);
   // Configuramos el modo de error para desarrollo seguro
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo "Ha ocurrido el siguiente error en la conexión: " . $error->getMessage();
}
?>