<?php
// ===================================================
// PANEL DE CONTROL DE PROVEEDORES (PORTAL PROFESIONAL)
// ===================================================
// Este archivo representa la zona privada para las empresas/proveedores.
// En este caso, simulamos el escaparate de un proveedor PREMIUM (Floristería)
// que cuenta con el privilegio exclusivo de chatear con los novios
// que lo han agregado a su lista de bodas (privilegio no disponible en cuentas gratis).

include_once("header.php"); 
?>

<!-- Estilos premium específicos para el Portal del Proveedor -->
<style>
    :root {
        --bo-gold: #d4af37;
        --bo-gold-light: #fffbeb;
        --bo-pink: #ff4d88;
        --bo-navy: #1a2b56;
    }

    body {
        background-color: #f4f6f9;
        font-family: 'Montserrat', sans-serif;
    }

    /* Animación de brillo para el banner Premium */
    .premium-glow-card {
        background: linear-gradient(135deg, #1a2b56 0%, #2a5298 100%);
        border: 2px solid var(--bo-gold);
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        color: white;
        box-shadow: 0 10px 30px rgba(26, 43, 86, 0.15);
    }

    .premium-glow-card::before {
        content: "";
        position: absolute;
        width: 150px;
        height: 100%;
        background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.1), transparent);
        transform: skewX(-25deg);
        left: -150px;
        top: 0;
        animation: shine 6s infinite;
    }

    @keyframes shine {
        0% { left: -150px; }
        20% { left: 100%; }
        100% { left: 100%; }
    }

    .badge-premium-gold {
        background-color: var(--bo-gold);
        color: #1a2b56;
        font-weight: 800;
        border-radius: 20px;
        font-size: 0.75rem;
        letter-spacing: 1.5px;
        display: inline-block;
        padding: 5px 12px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Galería de imágenes del escaparate */
    .escaparate-img-container {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        height: 200px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        border: 2px solid white;
        transition: transform 0.3s ease;
    }

    .escaparate-img-container:hover {
        transform: scale(1.03);
    }

    .escaparate-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Caja de chat premium */
    .chat-box-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
        border: 1px solid #e3e6f0;
    }

    .btn-bo-pink {
        background-color: var(--bo-pink);
        color: white;
        border: none;
        border-radius: 30px;
        font-weight: 700;
        transition: all 0.2s;
    }

    .btn-bo-pink:hover {
        background-color: #ff3370;
        color: white;
        transform: scale(1.02);
    }

    .form-control-custom {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #ced4da;
    }

    .form-control-custom:focus {
        border-color: var(--bo-pink);
        box-shadow: 0 0 0 0.25rem rgba(255, 77, 136, 0.15);
        outline: none;
    }
</style>

<main class="panel-proveedor-page py-5">
    <div class="container">
        
        <!-- CABECERA: TÍTULO DEL PORTAL -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-5">
            <div>
                <h1 class="fw-bold text-dark mb-1" style="font-family: 'Montserrat', sans-serif;">Portal de Profesionales</h1>
                <p class="text-secondary mb-0">Gestiona el escaparate público de tu empresa y responde a tus parejas interesadas.</p>
            </div>
            <div>
                <a href="index.php" class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-bold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Volver a Bodas Online
                </a>
            </div>
        </div>

        <div class="row g-4">
            
            <!-- COLUMNA IZQUIERDA: CONFIGURACIÓN ESCAPARATE -->
            <div class="col-lg-6">
                
                <!-- TARJETA PREMIUM GLOW -->
                <div class="premium-glow-card p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge-premium-gold"><i class="fa-solid fa-crown me-1"></i> PLAN PREMIUM ACTIVO</span>
                        <i class="fa-solid fa-circle-check text-success fs-4"></i>
                    </div>
                    <h3 class="fw-bold mb-2">¡Tu empresa es Destacada!</h3>
                    <p class="small mb-3" style="opacity: 0.9;">
                        Gracias a tu suscripción premium, apareces en el carrusel de **Empresas más Destacadas** en la página principal y tienes acceso libre para chatear y responder directamente a cualquier pareja que te agregue a su organizador.
                    </p>
                    <div class="bg-white bg-opacity-10 p-3 rounded-3" style="backdrop-filter: blur(5px);">
                        <small class="d-block fw-bold" style="letter-spacing: 1px; color: var(--bo-gold);">PRIVILEGIO PREMIUM ACTIVADO:</small>
                        <span class="small"><i class="fa-solid fa-comment-dots text-pink me-2"></i> Puedes enviar mensajes ilimitados a las parejas vinculadas. *(El plan gratis solo permite recibir visitas estáticas).*</span>
                    </div>
                </div>

                <!-- FORMULARIO ESCAPARATE -->
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <h3 class="fw-bold text-dark mb-4"><i class="fa-solid fa-store me-2 text-pink"></i>Tu Escaparate Comercial</h3>
                    
                    <form id="escaparateForm">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary small">Nombre de la Empresa</label>
                            <input type="text" class="form-control form-control-custom bg-light" id="compName" value="Floristería Pétalos de Granada" required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary small">Sector / Rubro</label>
                                <input type="text" class="form-control form-control-custom bg-light" id="compCategory" value="Floristería y Decoración" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary small">Teléfono de Contacto</label>
                                <input type="text" class="form-control form-control-custom bg-light" id="compPhone" value="958 123 456" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary small">Descripción de tu Empresa</label>
                            <textarea class="form-control form-control-custom bg-light" id="compDesc" rows="5" required>Creamos decoraciones florales mágicas y personalizadas para bodas y eventos en Granada. Ramos de novia exclusivos, decoración floral de iglesias, banquetes exteriores y centros de mesa sofisticados. Cuidamos cada detalle con flores frescas y diseños artísticos para hacer de tu boda un día inolvidable.</textarea>
                        </div>

                        <!-- FOTOS DEL ESCAPARATE -->
                        <label class="form-label fw-bold text-secondary small d-block mb-3">Galería de Imágenes del Escaparate</label>
                        <div class="row g-3 mb-4">
                            <div class="col-4">
                                <div class="escaparate-img-container">
                                    <img src="https://images.pexels.com/photos/169190/pexels-photo-169190.jpeg?auto=compress&cs=tinysrgb&w=300" class="escaparate-img" alt="Arreglo 1">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="escaparate-img-container">
                                    <img src="https://images.pexels.com/photos/1036623/pexels-photo-1036623.jpeg?auto=compress&cs=tinysrgb&w=300" class="escaparate-img" alt="Arreglo 2">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="escaparate-img-container">
                                    <img src="https://images.pexels.com/photos/1456613/pexels-photo-1456613.jpeg?auto=compress&cs=tinysrgb&w=300" class="escaparate-img" alt="Arreglo 3">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-bo-pink w-100 py-3 fw-bold">
                            <i class="fa-regular fa-floppy-disk me-2"></i> Guardar y Actualizar Escaparate
                        </button>
                    </form>
                </div>

            </div>

            <!-- COLUMNA DERECHA: NOTIFICACIONES Y MENSAJES (PRIVILEGIO PREMIUM) -->
            <div class="col-lg-6">
                
                <!-- ALERTA DE CLIENTE VINCULADO -->
                <div class="alert alert-success border-0 shadow-sm p-4 rounded-4 mb-4" role="alert" style="background-color: #ecfdf5; border-left: 5px solid #10b981 !important;">
                    <div class="d-flex gap-3 align-items-start">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; min-width: 40px;">
                            <i class="fa-solid fa-bell fs-5"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-success mb-1" style="font-size: 1.05rem;">¡Nueva Pareja Vinculada!</h5>
                            <p class="text-secondary small mb-3">
                                El cliente **José** (Boda Boho en Octubre 2026, Granada) te ha añadido a sus proveedores seleccionados dentro de su planificador.
                            </p>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">
                                <i class="fa-solid fa-link me-1"></i> Canal de Chat Abierto
                            </span>
                        </div>
                    </div>
                </div>

                <!-- CHAT INTERACTIVO EXCLUSIVO PREMIUM -->
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="p-3 border-bottom bg-white d-flex align-items-center gap-3">
                        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">J</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-0">José (Novio Planificador)</h6>
                            <small class="text-muted"><i class="fa-solid fa-circle text-success" style="font-size: 0.55rem;"></i> En Línea • Granada, ES</small>
                        </div>
                    </div>

                    <!-- Mensajes en el Chat -->
                    <div class="p-4" style="height: 380px; overflow-y: auto; background-color: #f8fafc;" id="provChatHistory">
                        <!-- Mensaje de José -->
                        <div class="d-flex gap-3 mb-3">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 35px; height: 35px; min-width: 35px;">J</div>
                            <div class="p-3 bg-white rounded-4 shadow-xs" style="max-width: 75%; border: 1px solid #f1f5f9;">
                                <p class="mb-1 text-dark small fw-semibold">José</p>
                                <p class="mb-0 text-secondary" style="font-size: 0.95rem;">¡Hola! He visto las imágenes de vuestro escaparate y me encantan los arreglos florales boho chic que hacéis. ¿Realizáis visitas al espacio de celebración para tomar medidas?</p>
                                <small class="text-muted d-block text-end mt-1">10:45</small>
                            </div>
                        </div>
                    </div>

                    <!-- Input para escribir (Privilegio Premium) -->
                    <form id="provSendMessageForm" class="p-3 border-top bg-light d-flex gap-2 align-items-center">
                        <input type="text" class="form-control form-control-custom bg-white flex-grow-1" id="provChatMessageInput" placeholder="Escribe tu respuesta como Floristería..." required>
                        <button type="submit" class="btn btn-bo-pink px-4 py-3">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</main>

<!-- SCRIPT INTERACTIVO DEL PANEL DE PROVEEDOR -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById("escaparateForm");
    const chatHistory = document.getElementById("provChatHistory");
    const sendMessageForm = document.getElementById("provSendMessageForm");
    const chatMessageInput = document.getElementById("provChatMessageInput");

    // 1. Guardar cambios en el escaparate
    if (form) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const name = document.getElementById("compName").value.trim();
            const phone = document.getElementById("compPhone").value.trim();
            
            // Simular guardado
            alert(`¡Escaparate de "${name}" actualizado con éxito! Los cambios ya son visibles públicamente.`);
        });
    }

    // 2. Control de Mensajes en el Chat
    const chatData = [
        { emisor: "Jose", msg: "¡Hola! He visto las imágenes de vuestro escaparate y me encantan los arreglos florales boho chic que hacéis. ¿Realizáis visitas al espacio de celebración para tomar medidas?", hora: "10:45" }
    ];

    function renderChat() {
        if (!chatHistory) return;
        chatHistory.innerHTML = "";

        chatData.forEach(m => {
            const isMe = m.emisor === "Yo";
            const senderName = isMe ? "Floristería Pétalos de Granada" : "José";
            const letter = isMe ? "F" : "J";
            const bubbleBg = isMe ? "background-color: var(--bo-pink-light); border: 1px solid #ffd6e0;" : "background-color: white; border: 1px solid #f1f5f9;";
            const senderColor = isMe ? "color: var(--bo-pink);" : "color: var(--bo-navy);";
            
            const messageBlock = document.createElement("div");
            messageBlock.className = `d-flex gap-3 mb-3 ${isMe ? 'flex-row-reverse' : ''}`;
            messageBlock.innerHTML = `
                <div class="${isMe ? 'bg-pink' : 'bg-dark'} text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 35px; height: 35px; min-width: 35px; ${isMe ? 'background-color: var(--bo-pink);' : ''}">${letter}</div>
                <div class="p-3 rounded-4 shadow-xs" style="max-width: 75%; ${bubbleBg}">
                    <p class="mb-1 small fw-bold" style="${senderColor}">${senderName}</p>
                    <p class="mb-0 text-secondary" style="font-size: 0.95rem;">${escapeHtml(m.msg)}</p>
                    <small class="text-muted d-block text-end mt-1">${m.hora}</small>
                </div>
            `;
            chatHistory.appendChild(messageBlock);
        });

        chatHistory.scrollTop = chatHistory.scrollHeight;
    }

    if (sendMessageForm) {
        sendMessageForm.addEventListener("submit", (e) => {
            e.preventDefault();
            const text = chatMessageInput.value.trim();
            if (!text) return;

            const timeNow = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            
            // Añadir mensaje del proveedor (Yo)
            chatData.push({
                emisor: "Yo",
                msg: text,
                hora: timeNow
            });

            chatMessageInput.value = "";
            renderChat();

            // Simular respuesta de José transcurridos 2 segundos
            setTimeout(() => {
                chatData.push({
                    emisor: "Jose",
                    msg: "¡Estupendo! Me parece genial. El lugar es el 'Palace Hotel' en la Caleta. ¿Cuándo os viene bien que organicemos la videollamada para cerrar los detalles del ramo?",
                    hora: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
                });
                renderChat();
            }, 2000);
        });
    }

    renderChat();

    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

});
</script>

<?php include_once("footer.php"); ?>
