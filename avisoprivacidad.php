<?php include_once("header.php"); ?>

<main>
 <style>
        body {
            font-family: 'Outfit', sans-serif;
            color: #000;
            background-color: #fff;
        }
        /* Margen lateral específico y alineación justificada */
        .content-container {
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }
        .text-justify {
            text-align: justify;
            text-justify: inter-word;
        }
        h1 {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 2.5rem;
        }
        h2 {
            font-size: 1.6rem;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1.5rem;
        }
        p {
            margin-bottom: 1.2rem;
            font-weight: 400;
            line-height: 1.5;
            color: #1a1a1a;
        }
        .legal-list {
            list-style-type: none;
            padding-left: 1rem;
            margin-bottom: 2rem;
        }
        .legal-list li {
            position: relative;
            margin-bottom: 0.8rem;
            padding-left: 1.5rem;
            text-align: justify;
        }
        .legal-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #000;
        }
        .highlight-box {
            margin-top: 3rem;
            padding: 1.5rem 0;
            font-weight: 600;
            text-align: justify;
        }
    </style>
</head>
<body>

    <main class="content-container py-16">
        
        <h1>Aviso de Privacidad</h1>

        <section>
            <h2>Introducción</h2>
            <div class="text-justify">
                <p>
                    El presente aviso de privacidad ("Aviso de privacidad") te informa sobre la recopilación y el uso que lleva a cabo Wedding Planner S.L.U. ("BodasOnline", "el Sitio Web", "nosotros") sobre tus datos personales, así como de las opciones de las que dispones para ejercitar tus derechos y mantener el control sobre tus datos personales.
                </p>
                <p>
                    Te recomendamos leer atentamente el presente Aviso de privacidad antes de utilizar los servicios de BodasOnline y de proporcionar datos personales a través de cualquiera de sus funcionalidades.
                </p>
                <p>
                    Bodas.net puede modificar el contenido del Aviso de privacidad en cualquier momento, especialmente cuando se produzcan modificaciones legislativas o de interpretación de la autoridad de control que afecten a los tratamientos de datos que realizamos. La nueva versión entrará en vigor en la fecha de última modificación. En caso de que se produzcan cambios sustanciales te lo notificaremos a través del correo electrónico o de cualquier otro medio que garantice su recepción. Asimismo, recomendamos leer el presente Aviso de privacidad de forma periódica para estar al tanto de los cambios y actualizaciones sobre el mismo.
                </p>
            </div>
        </section>

        <section>
            <h2>¿Qué datos personales recopilamos?</h2>
            <div class="text-justify">
                <p>Los datos personales que BodasOnline trata son:</p>
                
                <ul class="legal-list">
                    <li><strong>Datos identificativos:</strong> nombre, apellido, imagen, DNI, dirección IP, voz, nombre de usuario en redes sociales (nombre y apellido, en caso de que accedas o interactúes a través de una red social y estos sean evidentes o se puedan deducir).</li>
                    <li><strong>Datos de contacto:</strong> teléfono fijo, teléfono móvil, email, domicilio, nombre de usuario en redes sociales (email, en caso de que accedas o interactúes a través de una red social y estos sean evidentes o se puedan deducir).</li>
                    <li><strong>Datos de características personales:</strong> fecha de nacimiento, lugar de nacimiento, ciudad y país de residencia, sexo.</li>
                    <li><strong>Datos económico-financieros:</strong> datos bancarios, datos de pago.</li>
                </ul>
            </div>
        </section>

        <section class="highlight-box">
            BodasOnline está legitimada a tratar tus datos con las finalidades anteriormente mencionadas por concurrir un interés legítimo de la entidad, expresamente reconocido por la normativa sobre privacidad, para poder prestar correctamente el servicio.
        </section>
</main>

<?php include_once("footer.php"); ?>