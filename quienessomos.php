<?php include_once("header.php"); ?>

<!-- Estilos adicionales (si header.php no tiene los que necesitas) -->
<style>
    /* Estilos de respaldo en caso de que Tailwind no cargue */
    body {
        font-family: 'Inter', sans-serif;
        color: #333;
    }
    .hero-image {
        background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
        background-size: cover;
        background-position: center 20%;
        height: 400px;
    }
    /* Estilos base por si Tailwind no está disponible */
    .max-w-6xl { max-width: 72rem; }
    .mx-auto { margin-left: auto; margin-right: auto; }
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .pb-20 { padding-bottom: 5rem; }
    .flex { display: flex; }
    .flex-col { flex-direction: column; }
    .gap-12 { gap: 3rem; }
    .items-start { align-items: flex-start; }
    .w-full { width: 100%; }
    .rounded-sm { border-radius: 0.125rem; }
    .overflow-hidden { overflow: hidden; }
    .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); }
    .object-cover { object-fit: cover; }
    .gap-10 { gap: 2.5rem; }
    .text-2xl { font-size: 1.5rem; }
    .font-bold { font-weight: 700; }
    .mb-4 { margin-bottom: 1rem; }
    .text-gray-900 { color: #111827; }
    .text-gray-600 { color: #4b5563; }
    .leading-relaxed { line-height: 1.625; }
    .text-sm { font-size: 0.875rem; }
    .mb-12 { margin-bottom: 3rem; }
    .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05); }
    
    @media (min-width: 768px) {
        .md\:flex-row { flex-direction: row; }
        .md\:w-1\/2 { width: 50%; }
        .md\:text-base { font-size: 1rem; }
    }
</style>

<!-- Asegurar que el body está abierto (header.php debería abrirlo) -->
<?php 
// Si tu header.php NO abre la etiqueta <body>, descomenta la línea siguiente:
// echo '<body class="bg-white">'; 
?>

<!-- Sección Hero / Imagen Superior -->
<div class="w-full hero-image mb-12 shadow-sm">
    <!-- Espacio para la imagen de equipo profesional -->
</div>

<!-- Contenedor Principal -->
<main class="max-w-6xl mx-auto px-6 pb-20">
    <div class="flex flex-col md:flex-row gap-12 items-start">
        
        <!-- Columna Izquierda: Imagen de Pareja -->
        <div class="w-full md:w-1/2">
            <div class="rounded-sm overflow-hidden shadow-lg">
                <img 
                    src="img/somos.jpg" 
                    alt="Pareja planificando su boda frente al ordenador" 
                    class="w-full h-auto object-cover"
                    onerror="this.src='img/somos.jpg'"
                >
            </div>
        </div>

        <!-- Columna Derecha: Texto Informativo -->
        <div class="w-full md:w-1/2 flex flex-col gap-10">
            
            <!-- Sección Sobre Nosotros -->
            <section>
                <h2 class="text-2xl font-bold mb-4 text-gray-900">Sobre nosotros</h2>
                <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                    Bodas Online, es un directorio de proveedores de bodas de confianza que ayuda a las parejas a buscar, comparar y encontrar a los profesionales más adecuados para su gran día. Ofrecemos a nuestras parejas un montón de herramientas y servicios para planificar su boda, además del contenido inspiracional más actual, así como toda la información que necesitan durante todo el proceso de planificación.
                </p>
            </section>

            <!-- Sección La mejor ayuda -->
            <section>
                <h2 class="text-2xl font-bold mb-4 text-gray-900">La mejor ayuda para las parejas</h2>
                <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                    Hemos creado contenidos y herramientas que ayudan a las parejas en cada uno de los pasos que seguirán al organizar su boda. Desde el lugar para la boda, el vestido o los trámites burocráticos, encuentran fácilmente lo que necesitan en cada momento.
                </p>
            </section>

        </div>
    </div>
</main>

<?php include_once("footer.php"); ?>