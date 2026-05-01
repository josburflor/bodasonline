<?php include_once("header.php"); ?>

<main>
 <style>
        :root {
            --bo-pink: #ff4d88;
            --bo-pink-hover: #ff3370;
            --bo-pink-light: #fff0f3;
            --bo-navy: #1d3557;
            --bo-gray-text: #555;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* --- CONTENEDOR HERO --- */
        .hero-auth {
            background: url('img/prove.jpg') center/cover no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }

        .container-flex {
            display: flex;
            max-width: 1100px;
            width: 100%;
            gap: 40px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* --- CUADRO DE TEXTO (GLASSMORPHISM) --- */
        .glass-card {
            flex: 1;
            min-width: 300px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 40px;
            padding: 50px;
            color: white;
            text-align: center;
        }

        .glass-card h2 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .glass-card ul {
            list-style: none;
            padding: 0;
            margin: 0 0 40px 0;
            text-align: left;
            display: inline-block;
        }

        .glass-card ul li {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            position: relative;
            padding-left: 25px;
        }

        .glass-card ul li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: white;
            font-size: 1.5rem;
            line-height: 1;
        }

        .btn-register-white {
            background-color: var(--bo-pink);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 77, 136, 0.3);
        }

        .btn-register-white:hover {
            background-color: var(--bo-pink-hover);
            transform: scale(1.05);
        }

        /* --- CARD DE LOGIN --- */
        .login-card {
            flex: 1;
            min-width: 350px;
            background: white;
            border-radius: 40px;
            padding: 50px 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
            max-width: 450px;
        }

        /* Tabs de Accede / Registro */
        .auth-tabs {
            background-color: var(--bo-pink-light);
            border-radius: 20px;
            display: flex;
            padding: 6px;
            margin-bottom: 35px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            border-radius: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            color: #333;
        }

        .tab.active {
            background-color: var(--bo-pink);
            color: white;
        }

        .login-card h3 {
            text-align: center;
            font-weight: 800;
            font-size: 1.2rem;
            margin-bottom: 35px;
            color: #000;
        }

        /* Inputs */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            position: absolute;
            top: -10px;
            left: 15px;
            background: white;
            padding: 0 8px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--bo-gray-text);
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 12px;
            font-family: inherit;
            font-size: 0.95rem;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--bo-pink);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            background-color: var(--bo-pink);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-login:hover {
            background-color: var(--bo-pink-hover);
        }

        .footer-links {
            text-align: center;
            margin-top: 25px;
        }

        .footer-links a {
            display: block;
            text-decoration: none;
            color: #333;
            font-size: 0.85rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .footer-links .area-link {
            text-decoration: underline;
            margin-top: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container-flex { flex-direction: column; }
            .glass-card { padding: 30px; }
            .login-card { width: 100%; }
        }
    </style>
</head>
<body>

    <section class="hero-auth">
        <div class="container-flex">
            <!-- Bloque Izquierdo: Glassmorphism -->
            <div class="glass-card">
                <h2>Quiero Disfrutar Organizando Mi Boda</h2>
                <ul>
                    <li>Nos indicas por favor el día que deseas casarte y nosotros organizamos todo.</li>
                    <li>Encontrarás de todo en un solo sitio web.</li>
                </ul>
                <button class="btn-register-white">Regístrate Gratis</button>
            </div>

            <!-- Bloque Derecho: Formulario -->
            <div class="login-card">
                <div class="auth-tabs">
                    <div class="tab active">Accede</div>
                    <div class="tab">Registro</div>
                </div>

                <h3>Bienvenidos al Planificador Bodas Online</h3>

                <form>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="joe@nomail.com">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" value="************">
                        <i class="far fa-eye password-toggle"></i>
                    </div>

                    <button type="button" class="btn-login" onclick="window.location.href='panelusuario.php'">Accede</button>

                    <div class="footer-links">
                        <a href="#">Olvido su contraseña?</a>
                        <a href="#" class="area-link">Area de Empresas</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include_once("footer.php"); ?>