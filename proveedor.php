

<?php include_once("header.php"); ?>

<header class="w-full bg-light py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span class="fw-bold text-navy-blue" style="font-size: 13px;"><h3>Potencia tus resultados</h3></span>
                <a href="#" class="btn-pink-soft text-pink px-4 py-1 rounded-full font-bold text-decoration-none transition-all hover:bg-pink hover:text-white" style="font-size: 12px;">
                   <h3>Hazte Premium</h3> 
                </a>
            </div>
            <div class="fw-bold text-navy-blue" style="font-size: 13px;">
                Atención al Cliente : 632-426029
            </div>
        </div>
    </div>
</header>

<main>
<style>
        :root {
            --bo-pink-light: #fff0f3;
            --bo-pink-border: #ffdce5;
            --bo-navy: #1d3557;
            --bo-accent-pink: #ff4d88;
            --bo-yellow: #ffb800;
            --bo-blue-button: #233d90;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: var(--bo-navy);
            background-color: #fcfcfc;
        }

        .section-title {
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: var(--bo-navy);
        }

        /* --- 1. SECCIÓN CATEGORÍAS (Empresas Especializadas) --- */
        .category-card {
            background: white;
            border: 2px solid var(--bo-pink-border);
            border-radius: 35px;
            padding: 25px 15px;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 77, 136, 0.1);
        }

        .category-img-wrapper {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 15px;
            border: 1px solid #eee;
        }

        .category-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .category-name {
            font-weight: 700;
            font-size: 1rem;
            margin: 0;
            line-height: 1.2;
        }

        /* --- 2. SECCIÓN TESTIMONIOS (Comentarios Clientes) --- */
        .testimonial-card {
            background-color: var(--bo-pink-light);
            border-radius: 25px;
            padding: 40px 30px;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .testimonial-text {
            font-size: 1.1rem;
            line-height: 1.5;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .testimonial-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 15px;
            border: 3px solid white;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .stars {
            color: var(--bo-yellow);
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .testimonial-author {
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* --- 3. ACCESO EMPRESAS (Hero & Login) --- */
        .auth-section {
            background: url('img/provee.jpg') center/cover;
            min-height: 600px;
            display: flex;
            align-items: center;
            padding: 50px 0;
            position: relative;
        }

        .glass-box {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: 40px;
            color: white;
        }

        .glass-box h2 {
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        .glass-box ul {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        .glass-box ul li {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .glass-box ul li::before {
            content: "•";
            color: white;
            font-weight: bold;
            display: inline-block; 
            width: 1em;
            margin-left: -1em;
        }

        .btn-bo-navy {
            background-color: var(--bo-blue-button);
            color: white;
            border-radius: 12px;
            padding: 12px 30px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-bo-navy:hover {
            background-color: #1a2e6d;
            color: white;
            transform: scale(1.05);
        }

        .login-card {
            background: white;
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }

        .login-tabs {
            background: var(--bo-pink-light);
            border-radius: 15px;
            display: flex;
            padding: 5px;
            margin-bottom: 30px;
        }

        .login-tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700;
            transition: 0.3s;
        }

        .login-tab.active {
            background: var(--bo-blue-button);
            color: white;
        }

        .form-control-bo {
            border-radius: 12px;
            border: 1px solid #ddd;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .form-label-bo {
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 5px;
            display: block;
        }

    </style>
</head>
<body>

    

    <!-- SECCIÓN ACCESO (ESTILO GLASSMORPHISM) -->
    <div class="auth-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="glass-box">
                        <h2>¡Haz crecer tu negocio con Nosotros!</h2>
                        <ul>
                            <li>Recibe Solicitudes de Presupuestos</li>
                            <li>Consigue Nuevos Clientes</li>
                        </ul>
                        <button class="btn-bo-navy">Regístrate Gratis</button>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="login-card">
                        <div class="login-tabs">
                            <div class="login-tab active">Accede</div>
                            <div class="login-tab">Registro</div>
                        </div>
                        <h4 class="text-center fw-bold mb-4">Bienvenidos al Planificador Bodas Online</h4>
                        
                        <form>
                            <div class="mb-3">
                                <label class="form-label-bo">Email</label>
                                <input type="email" class="form-control form-control-bo" placeholder="joe@nomail.com">
                            </div>
                            <div class="mb-4">
                                <label class="form-label-bo">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control form-control-bo" placeholder="*************">
                                    <i class="far fa-eye position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                                </div>
                            </div>
                            <button type="button" class="btn btn-bo-navy w-100 py-3 mb-3">Accede</button>
                            <div class="text-center">
                                <a href="#" class="text-decoration-none text-muted small me-3">Olvido su contraseña?</a>
                                <a href="#" class="text-decoration-none fw-bold small text-dark border-bottom border-dark">Area de Clientes</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</main>
<?php include_once("footer.php"); ?>