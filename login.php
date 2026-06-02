<?php
// ==================================================
// PÁGINA DE LOGIN PARA EL PANEL DE ADMINISTRACIÓN
// ==================================================

// 1. Iniciamos la sesión para comprobar si el administrador ya está logueado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Si ya tiene una sesión iniciada de administrador, lo mandamos directo al panel
if (isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true) {
    header("Location: admin.php");
    exit();
}

// Variable para almacenar posibles errores de credenciales
$error_mensaje = "";

// 3. Procesamos el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtenemos el usuario y contraseña ingresados (eliminamos espacios extras con trim)
    $usuario = trim($_POST['usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 4. Comprobamos si coinciden con las credenciales requeridas: admin / admin
    if ($usuario === "admin" && $password === "admin") {
        // ¡Éxito! Creamos la variable de sesión indicando que está logueado
        $_SESSION['admin_login'] = true;
        
        // Redirigimos inmediatamente al panel de control
        header("Location: admin.php");
        exit();
    } else {
        // Si fallan, preparamos un mensaje de alerta en español
        $error_mensaje = "Usuario o contraseña incorrectos. Por favor, vuelve a intentarlo.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Panel Administrativo | Bodas Online</title>
    <!-- Cargamos Bootstrap 5 y FontAwesome para íconos y diseño moderno -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Fuente premium Google Fonts: Montserrat y Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Playfair+Display:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            --accent-pink: #ff4d88;
            --accent-pink-hover: #ff3370;
            --dark-navy: #1a2b56;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            color: #333;
            overflow-x: hidden;
            position: relative;
        }

        /* Decoración de fondo para dar sensación de boda/elegancia */
        body::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 77, 136, 0.15);
            border-radius: 50%;
            top: -100px;
            right: -100px;
            filter: blur(80px);
            z-index: 1;
        }

        body::after {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(42, 82, 152, 0.3);
            border-radius: 50%;
            bottom: -150px;
            left: -150px;
            filter: blur(100px);
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 460px;
        }

        /* Card de login con efecto Glassmorphism premium */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 24px;
            padding: 45px 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .brand-logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-logo {
            height: 70px;
            object-fit: contain;
            margin-bottom: 15px;
            filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.1));
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--dark-navy);
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .login-subtitle {
            font-size: 0.85rem;
            color: #777;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 30px;
        }

        /* Estilo para los campos de entrada */
        .form-floating > .form-control {
            border-radius: 12px;
            border: 1px solid #ddd;
            padding-left: 45px;
            font-size: 0.95rem;
            height: 60px;
            transition: all 0.3s ease;
        }

        .form-floating > .form-control:focus {
            border-color: var(--accent-pink);
            box-shadow: 0 0 0 0.25rem rgba(255, 77, 136, 0.2);
        }

        .form-floating > label {
            padding-left: 45px;
            font-weight: 500;
            color: #888;
        }

        /* Icono dentro del input */
        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            z-index: 5;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .input-group-custom:focus-within .input-icon {
            color: var(--accent-pink);
        }

        .btn-submit {
            background-color: var(--dark-navy);
            color: #fff;
            font-weight: 700;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 1.05rem;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(26, 43, 86, 0.3);
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #121f3f;
            color: #fff;
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(26, 43, 86, 0.4);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .error-alert {
            font-size: 0.85rem;
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.4s ease-in-out;
        }

        /* Animación de vibración para errores */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }

        .footer-note {
            text-align: center;
            margin-top: 25px;
        }

        .footer-note a {
            color: var(--accent-pink);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .footer-note a:hover {
            color: var(--accent-pink-hover);
            text-decoration: underline;
        }
        
        /* Controles de visibilidad de contraseña */
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
            z-index: 5;
            font-size: 1.1rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: var(--accent-pink);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        
        <!-- Encabezado con marca/título -->
        <div class="brand-logo-container">
            <a href="index.php">
                <img src="img/logo.png" class="brand-logo" alt="Bodas Online Logo" onerror="this.src='https://via.placeholder.com/150x70?text=Bodas+Online'">
            </a>
            <h1 class="login-title">Administración</h1>
            <p class="login-subtitle">Acceso de Personal</p>
        </div>

        <!-- Alerta de Error en caso de credenciales incorrectas -->
        <?php if (!empty($error_mensaje)): ?>
            <div class="alert alert-danger error-alert border-0 shadow-sm" role="alert">
                <i class="fas fa-exclamation-circle fs-5"></i>
                <div>
                    <strong>Error:</strong> <?= htmlspecialchars($error_mensaje) ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Formulario de Acceso -->
        <form action="login.php" method="POST" autocomplete="off">
            
            <!-- Campo de Usuario -->
            <div class="input-group-custom">
                <i class="fas fa-user-shield input-icon"></i>
                <div class="form-floating">
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required autocomplete="username">
                    <label for="usuario">Nombre de Usuario</label>
                </div>
            </div>

            <!-- Campo de Contraseña -->
            <div class="input-group-custom">
                <i class="fas fa-key input-icon"></i>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                    <label for="password">Contraseña</label>
                </div>
                <i class="far fa-eye password-toggle" id="togglePassword"></i>
            </div>

            <!-- Botón de Entrar -->
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
            </button>
            
        </form>

        <!-- Enlace para volver a la web principal -->
        <div class="footer-note">
            <a href="index.php"><i class="fas fa-arrow-left me-1"></i> Volver a Bodas Online</a>
        </div>

    </div>
</div>

<!-- JS para alternar la visibilidad de la contraseña de forma interactiva -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // Obtenemos el tipo actual del input
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Cambiamos el ícono del ojo
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
