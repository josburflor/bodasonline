<?php include_once("header.php"); ?>

<div class="w-full hero-image mb-12 shadow-sm">
    <!-- Espacio para la imagen de equipo profesional -->
</div>

<main class="nosotros-page max-w-6xl mx-auto px-6 pb-20">
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