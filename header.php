<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bodas Online</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="style.css">
</head>


<body>




   


  <!-- BARRA SUPERIOR -->
  <div id="topBar" class="top-bar py-1 position-relative">
    <div class="container d-flex justify-content-between">
      <div>ACCEDE A NUESTRO SISTEMA DE BODAS</div>
      <div>
         <a href="proveedor.php" class="btn btn-outline-light btn-sm">Proveedor</a>
        <a href="usuario.php" class="btn btn-outline-light btn-sm">Me caso</a>
      </div>
    </div>
  </div>

  <!-- NAVBAR FIJA -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container-fluid">
        <!-- Logo alineado a la izquierda -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="img/logo.png" alt="Bodas Online" class="logo" style="height: 90px;" onerror="this.src='https://via.placeholder.com/150x90?text=Logo'">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Links alineados a la derecha -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuario.php">Mi Boda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Lugares</a>
                    <ul class="dropdown-menu shadow-sm border-0">
                        <li><a class="dropdown-item" href="#">Restaurantes</a></li>
                        <li><a class="dropdown-item" href="#">Campo</a></li>
                        <li><a class="dropdown-item" href="#">Playa</a></li>
                        <li><a class="dropdown-item" href="#">Hoteles</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Proveedores</a>
                    <ul class="dropdown-menu shadow-sm border-0">
                        <li><a class="dropdown-item" href="#">Catering</a></li>
                        <li><a class="dropdown-item" href="#">Belleza</a></li>
                        <li><a class="dropdown-item" href="#">Pastelería</a></li>
                        <li><a class="dropdown-item" href="#">Trajes</a></li>
                        <li><a class="dropdown-item" href="#">Coches</a></li>
                        <li><a class="dropdown-item" href="#">DJ</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quienessomos.php">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>