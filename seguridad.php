<?php
// ==========================================
// ARCHIVO DE SEGURIDAD (CONTROL DE SESIÓN)
// ==========================================
// Este archivo sirve para proteger nuestras páginas de administración.
// Lo incluiremos al principio de cada archivo que queramos restringir.

// 1. Iniciamos la sesión si no está iniciada ya.
// Esto nos permite acceder a la variable global $_SESSION.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Comprobamos si la variable de sesión 'admin_login' existe y es verdadera.
// Si NO existe o NO es verdadera, significa que el usuario no ha iniciado sesión.
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
    // Redirigimos inmediatamente a la pantalla de login.
    header("Location: login.php");
    exit(); // Detenemos la ejecución del resto del script.
}
?>
