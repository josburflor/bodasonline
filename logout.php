<?php
// ==========================================
// ARCHIVO DE CIERRE DE SESIÓN (LOGOUT)
// ==========================================
// Este archivo sirve para destruir la sesión actual y salir de forma segura.

// 1. Iniciamos la sesión para poder destruirla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Vaciamos todas las variables cargadas en $_SESSION
$_SESSION = array();

// 3. Si se desea destruir completamente la sesión, borramos también la cookie de sesión.
// Esto es una buena práctica recomendada para principiantes/estudiantes.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Finalmente, destruimos la sesión en el servidor
session_destroy();

// 5. Redirigimos al administrador de vuelta a la página de login
header("Location: login.php");
exit();
?>
