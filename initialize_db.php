<?php
// Script de Inicialización y Población de la Base de Datos para Bodas Online
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bodasonline";

try {
    // 1. Conexión inicial sin base de datos para verificar/crearla
    $conexion = new PDO("mysql:host=$host;charset=Utf8", $dbuser, $dbpass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear base de datos si no existe
    $conexion->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8 COLLATE utf8_general_ci;");
    echo "Base de datos '$dbname' verificada o creada con éxito.<br>\n";
    
    // Conectar a la base de datos seleccionada
    $conexion->exec("USE `$dbname`;");
    // Volver a instanciar con la base de datos
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=Utf8", $dbuser, $dbpass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Crear Tabla de Categorías (categoriastb)
    $tablaCategorias = "CREATE TABLE IF NOT EXISTS categoriastb (
        idCategoria INT AUTO_INCREMENT PRIMARY KEY,
        nombreCategoria VARCHAR(100) NOT NULL,
        iconoCategoria VARCHAR(100) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $conexion->exec($tablaCategorias);
    echo "Tabla 'categoriastb' verificada o creada con éxito.<br>\n";

    // 3. Crear Tabla de Proveedores (proveedorestb)
    $tablaProveedores = "CREATE TABLE IF NOT EXISTS proveedorestb (
        idProveedor INT AUTO_INCREMENT PRIMARY KEY,
        nombreProveedor VARCHAR(150) NOT NULL,
        idCategoria INT NOT NULL,
        imgProveedorP VARCHAR(255) DEFAULT 'default.jpg',
        descripcionProveedor TEXT,
        telefonoProveedor VARCHAR(50),
        precioDesde INT,
        seoKeywords TEXT,
        visible TINYINT(1) DEFAULT 1,
        FOREIGN KEY (idCategoria) REFERENCES categoriastb(idCategoria) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $conexion->exec($tablaProveedores);
    echo "Tabla 'proveedorestb' verificada o creada con éxito.<br>\n";

    // 4. Sembrar Categorías si la tabla está vacía
    $checkCategorias = $conexion->query("SELECT COUNT(*) FROM categoriastb")->fetchColumn();
    if ($checkCategorias == 0) {
        $categoriasIniciales = [
            ["Fotógrafos", "fa-camera"],
            ["Coches de Boda", "fa-car-side"],
            ["Música", "fa-music"],
            ["Autobuses", "fa-bus"],
            ["Animación", "fa-champagne-glasses"],
            ["Banquetes", "fa-utensils"],
            ["Belleza", "fa-sparkles"],
            ["Lugares", "fa-map-location-dot"],
            ["Restaurantes", "fa-hotel"],
            ["Floristería", "fa-leaf"],
            ["Mobiliario", "fa-chair"],
            ["Food truck", "fa-truck-field"],
            ["Mesas de Dulces", "fa-cookie-bite"],
            ["Joyas", "fa-gem"],
            ["Luna de Miel", "fa-plane"],
            ["Decoración", "fa-paint-roller"]
        ];

        $stmt = $conexion->prepare("INSERT INTO categoriastb (nombreCategoria, iconoCategoria) VALUES (?, ?)");
        foreach ($categoriasIniciales as $cat) {
            $stmt->execute([$cat[0], $cat[1]]);
        }
        echo "Categorías sembradas con éxito (" . count($categoriasIniciales) . " añadidas).<br>\n";
    } else {
        echo "La tabla 'categoriastb' ya contiene datos, omitiendo siembra.<br>\n";
    }

    // 5. Sembrar Proveedores Premium si la tabla está vacía
    $checkProveedores = $conexion->query("SELECT COUNT(*) FROM proveedorestb")->fetchColumn();
    if ($checkProveedores == 0) {
        // Recuperar mapeo de IDs de categorías para asignar correctamente las FK
        $mapeoCat = [];
        $res = $conexion->query("SELECT idCategoria, nombreCategoria FROM categoriastb")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($res as $r) {
            $mapeoCat[$r['nombreCategoria']] = $r['idCategoria'];
        }

        $proveedoresPremium = [
            [
                "nombreProveedor" => "Salón de Belleza",
                "categoria" => "Belleza",
                "imgProveedorP" => "bellezasalon.jpg", // usaremos nombres locales o URLs si es necesario, pero guardaremos un nombre de archivo
                "imgURL" => "https://images.pexels.com/photos/3997391/pexels-photo-3997391.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Ofrecemos los mejores servicios de belleza, peluquería, maquillaje y spa para novias e invitadas. Tratamientos personalizados para que brilles en tu gran día en la zona de Armilla.",
                "telefonoProveedor" => "600 111 222",
                "precioDesde" => 120,
                "seoKeywords" => "belleza, Armilla, maquillaje novias, peluquería, estética"
            ],
            [
                "nombreProveedor" => "Rent Cars",
                "categoria" => "Coches de Boda",
                "imgProveedorP" => "rentcars.jpg",
                "imgURL" => "https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Alquiler de vehículos de lujo y clásicos con conductor para bodas y eventos especiales en Granada y alrededores de Plaza de Toro. Puntualidad, elegancia y máximo confort para tu entrada triunfal.",
                "telefonoProveedor" => "600 222 333",
                "precioDesde" => 350,
                "seoKeywords" => "coches boda, Plaza de Toro, alquiler coche clásico, lujo, conductor"
            ],
            [
                "nombreProveedor" => "Palace Hotel",
                "categoria" => "Lugares",
                "imgProveedorP" => "palacehotel.jpg",
                "imgURL" => "https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Un hotel de ensueño frente a la Caleta para celebrar tu banquete de bodas. Salones espectaculares de gran capacidad, catering de primer nivel, vistas hermosas y una suite de cortesía para los novios.",
                "telefonoProveedor" => "958 333 444",
                "precioDesde" => 1800,
                "seoKeywords" => "hotel bodas, Caleta, banquetes, salón de bodas, celebración"
            ],
            [
                "nombreProveedor" => "Fotógrafo Rafa",
                "categoria" => "Fotógrafos",
                "imgProveedorP" => "fotografocarlos.jpg",
                "imgURL" => "https://images.pexels.com/photos/1264210/pexels-photo-1264210.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Capturamos los momentos más emotivos y naturales de tu boda en Granada. Reportajes de fotografía de autor, tomas espontáneas llenas de sentimiento y cobertura completa de toda la boda.",
                "telefonoProveedor" => "611 444 555",
                "precioDesde" => 850,
                "seoKeywords" => "fotógrafo granada, reportaje de fotos, boda, álbum de fotos, video"
            ],
            [
                "nombreProveedor" => "Restaurante Gourmet",
                "categoria" => "Restaurantes",
                "imgProveedorP" => "restaurantegourmet.jpg",
                "imgURL" => "https://images.pexels.com/photos/931177/pexels-photo-931177.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Exquisitos menús para bodas elaborados por chefs con estrella. Fusión de gastronomía tradicional andaluza y toques de autor contemporáneos en pleno centro histórico de Granada.",
                "telefonoProveedor" => "958 555 666",
                "precioDesde" => 95,
                "seoKeywords" => "restaurante centro, banquete gourmet, menú bodas, catering, comida"
            ],
            [
                "nombreProveedor" => "Spa & Wellness",
                "categoria" => "Belleza",
                "imgProveedorP" => "spawellness.jpg",
                "imgURL" => "https://images.pexels.com/photos/1024960/pexels-photo-1024960.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "El complemento perfecto de relajación antes o después de la boda en Sierra Nevada. Circuitos termales y masajes especializados para novios e invitadas en un entorno de paz absoluta.",
                "telefonoProveedor" => "958 666 777",
                "precioDesde" => 80,
                "seoKeywords" => "spa sierra nevada, relajación novios, masajes, termas, bienestar"
            ],
            [
                "nombreProveedor" => "Wedding Planner",
                "categoria" => "Animación",
                "imgProveedorP" => "weddingplanner.jpg",
                "imgURL" => "https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Planificamos tu boda ideal de la A a la Z en Realejo y toda la provincia. Gestión de proveedores, diseño decorativo integral, logística y coordinación en directo de toda la jornada.",
                "telefonoProveedor" => "600 777 888",
                "precioDesde" => 1500,
                "seoKeywords" => "organizador de bodas, Realejo, coordinación, logística bodas"
            ],
            [
                "nombreProveedor" => "Joyas Reales",
                "categoria" => "Joyas",
                "imgProveedorP" => "joyasreales.jpg",
                "imgURL" => "https://images.pexels.com/photos/1036623/pexels-photo-1036623.jpeg?auto=compress&cs=tinysrgb&w=600",
                "descripcionProveedor" => "Especialistas en alianzas y sortijas de compromiso en Alcaicería. Oro blanco, platino, diamantes y gemas selectas con grabado personalizado sin cargo para que vuestro amor dure para siempre.",
                "telefonoProveedor" => "958 888 999",
                "precioDesde" => 400,
                "seoKeywords" => "joyería alcaicería, alianzas de boda, anillos compromiso, diamantes"
            ]
        ];

        // Vamos a descargar localmente las imágenes o copiar sus nombres
        // Para que todo funcione de inmediato sin obligar a descargas de red lentas,
        // guardaremos la URL directamente en el campo imgProveedorP si es externo
        // o copiaremos a un archivo local si queremos.
        // Pero dado que los archivos locales de imagen podrían faltar, utilizaremos URLs
        // o guardaremos la URL en la BD. Si la imagen es una URL (empieza por http), la renderizaremos directamente en el frontend.
        // Si no, la buscaremos en img/. Esto es extremadamente robusto y elegante!
        
        $stmt = $conexion->prepare("INSERT INTO proveedorestb (nombreProveedor, idCategoria, imgProveedorP, descripcionProveedor, telefonoProveedor, precioDesde, seoKeywords, visible) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        foreach ($proveedoresPremium as $p) {
            $catId = isset($mapeoCat[$p['categoria']]) ? $mapeoCat[$p['categoria']] : $mapeoCat["Fotógrafos"];
            $stmt->execute([
                $p['nombreProveedor'],
                $catId,
                $p['imgURL'], // Guardar la URL en imgProveedorP
                $p['descripcionProveedor'],
                $p['telefonoProveedor'],
                $p['precioDesde'],
                $p['seoKeywords'],
                1 // Visible
            ]);
        }
        echo "Proveedores Premium sembrados con éxito (" . count($proveedoresPremium) . " añadidos).<br>\n";
    } else {
        echo "La tabla 'proveedorestb' ya contiene datos, omitiendo siembra.<br>\n";
    }

    // 6. Crear Tabla de Rutas Románticas (rutastb)
    $tablaRutas = "CREATE TABLE IF NOT EXISTS rutastb (
        idRuta INT AUTO_INCREMENT PRIMARY KEY,
        nombreRuta VARCHAR(150) NOT NULL,
        imgRuta VARCHAR(255) DEFAULT 'img/default.jpg',
        descripcionRuta TEXT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $conexion->exec($tablaRutas);
    echo "Tabla 'rutastb' verificada o creada con éxito.<br>\n";

    // 7. Sembrar Rutas si la tabla está vacía
    $checkRutas = $conexion->query("SELECT COUNT(*) FROM rutastb")->fetchColumn();
    if ($checkRutas == 0) {
        $rutasIniciales = [
            ["Mirador de San Nicolás", "img/sanicolas.jpg", "Una de las vistas más románticas del mundo frente a la Alhambra. Ideal para pasear al atardecer y disfrutar de la música de los artistas callejeros."],
            ["Jardines del Generalife", "img/generalife.jpg", "Un oasis de paz y belleza repleto de fuentes, flores y rincones íntimos. Pasear por estos jardines es como viajar en el tiempo."],
            ["Carmen de los Mártires", "img/martires.jpg", "Un hermoso palacete rodeado de románticos jardines ingleses, franceses y un lago central con patos. El lugar idóneo para una declaración de amor."],
            ["Paseo de los Tristes y Sacromonte", "img/sacromonte.jpg", "El paseo más bonito de Granada, a los pies de la Alhambra y junto al río Darro, que culmina con la subida a las famosas cuevas del Sacromonte."],
            ["Atardecer en los Jardines del Triunfo", "img/triunfo.jpg", "Hermosos jardines con fuentes de agua luminosas ideales para dar un paseo tranquilo al anochecer en pleno corazón de la ciudad."],
            ["Escapada Romántica a Sierra Nevada", "img/sierra.jpg", "Una increíble ruta de senderismo o un día de nieve con vistas espectaculares, perfecto para parejas que aman la naturaleza y la aventura."]
        ];

        $stmt = $conexion->prepare("INSERT INTO rutastb (nombreRuta, imgRuta, descripcionRuta) VALUES (?, ?, ?)");
        foreach ($rutasIniciales as $ruta) {
            $stmt->execute([$ruta[0], $ruta[1], $ruta[2]]);
        }
        echo "Rutas románticas sembradas con éxito (" . count($rutasIniciales) . " añadidas).<br>\n";
    } else {
        echo "La tabla 'rutastb' ya contiene datos, omitiendo siembra.<br>\n";
    }

    // 8. Crear Tabla de Trajes (trajestb)
    $tablaTrajes = "CREATE TABLE IF NOT EXISTS trajestb (
        idTraje INT AUTO_INCREMENT PRIMARY KEY,
        nombreTraje VARCHAR(150) NOT NULL,
        imgTraje VARCHAR(255) DEFAULT 'img/default.jpg',
        tipoTraje VARCHAR(100) NOT NULL,
        descripcionTraje TEXT
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $conexion->exec($tablaTrajes);
    echo "Tabla 'trajestb' verificada o creada con éxito.<br>\n";

    // 9. Sembrar Trajes si la tabla está vacía
    $checkTrajes = $conexion->query("SELECT COUNT(*) FROM trajestb")->fetchColumn();
    if ($checkTrajes == 0) {
        $trajesIniciales = [
            ["Traje de Novia", "img/trajenovia.jpg", "novia", "Vestido de novia de alta costura, diseñado con encajes finos, corte de sirena o princesa, y un velo largo para que luzcas espectacular y radiante en el día más importante de tu vida."],
            ["Traje de Novio", "img/trajenovio.jpg", "novio", "Elegante traje de novio de corte italiano, confeccionado con tejidos de alta calidad en color azul marino o negro clásico, completo con chaleco, corbata o pajarita a juego."],
            ["Traje de Fiesta y Acompañante", "img/trajes.jpg", "fiesta", "Hermoso conjunto de vestidos y trajes de fiesta para damas de honor, madrinas e invitados especiales. Diseños sofisticados en una gran variedad de colores y estilos modernos."]
        ];

        $stmt = $conexion->prepare("INSERT INTO trajestb (nombreTraje, imgTraje, tipoTraje, descripcionTraje) VALUES (?, ?, ?, ?)");
        foreach ($trajesIniciales as $traje) {
            $stmt->execute([$traje[0], $traje[1], $traje[2], $traje[3]]);
        }
        echo "Trajes sembrados con éxito (" . count($trajesIniciales) . " añadidos).<br>\n";
    } else {
        echo "La tabla 'trajestb' ya contiene datos, omitiendo siembra.<br>\n";
    }

    echo "<h2>¡Inicialización Completa con Éxito!</h2>";

} catch (PDOException $error) {
    echo "Ha ocurrido un error en la inicialización: " . $error->getMessage();
}
?>
