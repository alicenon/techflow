<?php
/**
 * ====================================================================
 * PORTAL CORPORATIVO PRINCIPAL - INDEX.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Esta es la página de inicio pública de la consultora tecnológica.
 * Incluye un banner llamativo (Hero), la presentación de servicios de
 * Gestión de Proyectos (PMO) y Soporte IT, y un formulario de contacto.
 */

// 1. Incluimos la cabecera común
include 'header.php';

// Procesamos el formulario de contacto ficticio si se ha enviado
$mensaje_enviado = false;
if (isset($_POST['enviar_contacto'])) {
    // Capturamos los datos para dar realismo al formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    // Al ser un proyecto procedimental y de nivel medio, simplemente simulamos
    // que se ha enviado correctamente o que se almacena, mostrando una alerta visual.
    $mensaje_enviado = true;
}
?>

<!-- SECCIÓN HERO (BANNER DE BIENVENIDA) -->
<section class="hero-section py-5 text-white mb-5" style="background: linear-gradient(135deg, #0A192F 0%, #172A45 100%); border-bottom: 3px solid #00B4D8; position: relative; overflow: hidden;">
    <!-- Decoración de fondo de redes/tecnología -->
    <div style="position: absolute; top: -10%; right: -5%; opacity: 0.1; font-size: 25rem; color: #00B4D8; pointer-events: none;">
        <i class="bi bi-cpu"></i>
    </div>
    
    <div class="container py-4 position-relative">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-info text-dark mb-3 px-3 py-2 rounded-pill fw-semibold">Consultora Tecnológica de Confianza</span>
                <h1 class="display-4 fw-bold mb-3 text-white">Uniendo Soporte Técnico IT y Gestión de Proyectos</h1>
                <p class="lead text-light mb-4">
                    En TechFlow Solutions transformamos la infraestructura tecnológica de tu empresa y garantizamos el éxito de tus iniciativas gracias a nuestra oficina PMO integrada y nuestro soporte técnico de nivel avanzado.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="login.php" class="btn btn-tech-primary btn-lg px-4 py-2">
                        <i class="bi bi-person-workspace me-2"></i>Área de Soporte
                    </a>
                    <a href="#servicios" class="btn btn-outline-light btn-lg px-4 py-2">
                        Conocer Servicios
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="p-4 bg-white bg-opacity-10 rounded-3 border border-white border-opacity-10 text-center shadow">
                    <i class="bi bi-shield-check text-info display-1 mb-3"></i>
                    <h3 class="text-white h4">Soporte Express 24/7</h3>
                    <p class="text-secondary small mb-3">¿Eres cliente? Reporta incidencias de red, servidores o gestión de proyectos al instante entrando a tu panel corporativo.</p>
                    <a href="login.php" class="btn btn-tech-outline btn-sm w-100">Iniciar Sesión de Cliente</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN SERVICIOS -->
<section id="servicios" class="container py-5 mb-5">
    <div class="text-center mb-5">
        <h2 class="display-5 text-dark fw-bold mb-2">Nuestros Servicios Integrados</h2>
        <p class="text-muted lead mx-auto" style="max-width: 700px;">
            Fusionamos la disciplina metodológica de la PMO y la respuesta inmediata del soporte IT de nivel avanzado.
        </p>
        <div style="width: 80px; height: 4px; background: #00B4D8; margin: 0 auto; border-radius: 2px;"></div>
    </div>

    <div class="row g-4">
        
        <!-- Tarjeta de Servicio 1: PMO -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 card-custom p-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-4 style-icon" style="width: 60px; height: 60px;">
                    <i class="bi bi-kanban fs-2 text-info"></i>
                </div>
                <h3 class="h4 mb-3 text-dark">Gestión de Proyectos (PMO)</h3>
                <p class="text-secondary small">
                    Planificamos, organizamos y controlamos los proyectos informáticos de tu empresa. Garantizamos el cumplimiento de plazos, presupuesto y estándares de calidad usando metodologías ágiles e híbridas.
                </p>
                <ul class="list-unstyled small text-secondary mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Gestión de recursos y riesgos.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Control de plazos (Hitos y Entregables).</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Informes periódicos de avance.</li>
                </ul>
            </div>
        </div>

        <!-- Tarjeta de Servicio 2: Soporte IT -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 card-custom p-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-4 style-icon" style="width: 60px; height: 60px;">
                    <i class="bi bi-headset fs-2 text-info"></i>
                </div>
                <h3 class="h4 mb-3 text-dark">Soporte IT Avanzado (Tickets)</h3>
                <p class="text-secondary small">
                    Un sistema robusto para resolver incidencias de hardware, software, red y servidores. Nuestros clientes cuentan con un canal web prioritario para reportar tickets y chatear directamente con los técnicos asignados.
                </p>
                <ul class="list-unstyled small text-secondary mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Resolución de incidencias en red y VPN.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Administración de servidores y cloud.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Soporte de primer y segundo nivel.</li>
                </ul>
            </div>
        </div>

        <!-- Tarjeta de Servicio 3: Consultoría Cloud -->
        <div class="col-lg-4 col-md-12">
            <div class="card h-100 card-custom p-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-4 style-icon" style="width: 60px; height: 60px;">
                    <i class="bi bi-cloud-arrow-up fs-2 text-info"></i>
                </div>
                <h3 class="h4 mb-3 text-dark">Infraestructura y Nube</h3>
                <p class="text-secondary small">
                    Acompañamos a tu organización en la transición hacia la nube (AWS, Azure o Nube Privada). Diseñamos infraestructuras de red escalables, securizadas y optimizadas para el teletrabajo.
                </p>
                <ul class="list-unstyled small text-secondary mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Migración de entornos locales a Cloud.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Auditorías de seguridad de red.</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-info me-2"></i>Mantenimiento de bases de datos.</li>
                </ul>
            </div>
        </div>
        
    </div>
</section>

<!-- SECCIÓN POR QUÉ ELEGIRNOS -->
<section class="bg-white py-5 mb-5 border-top border-bottom border-light">
    <div class="container py-3">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="display-6 fw-bold mb-4">¿Por qué integrar la PMO y el Soporte IT?</h2>
                <p class="text-secondary mb-3">
                    Normalmente, los equipos de proyectos (PMO) y los equipos de soporte operativo (IT) trabajan de forma aislada. Esto provoca que los problemas técnicos no se alineen con la estrategia de negocio y viceversa.
                </p>
                <p class="text-secondary mb-4">
                    En <strong>TechFlow Solutions</strong> unificamos ambos departamentos. Cuando un cliente reporta una incidencia de gravedad que requiere cambios en sus aplicaciones, se escala automáticamente a la PMO como una propuesta de proyecto para evitar soluciones temporales ineficaces.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-lightning-fill text-info fs-3 me-2"></i>
                            <div>
                                <h4 class="h6 mb-0 text-dark">Respuesta Rápida</h4>
                                <small class="text-muted">Tickets de soporte atendidos en <2 horas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-briefcase-fill text-info fs-3 me-2"></i>
                            <div>
                                <h4 class="h6 mb-0 text-dark">Gestión Transparente</h4>
                                <small class="text-muted">Estado de tus proyectos en tiempo real</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Generamos una representación visual estética -->
                <div class="p-4 bg-light rounded-4 border border-1 d-flex flex-column gap-3">
                    <div class="d-flex bg-white p-3 rounded shadow-sm align-items-center gap-3">
                        <div class="bg-info text-dark rounded-circle p-2 d-inline-flex justify-content-center align-items-center" style="width:40px; height:40px;"><i class="bi bi-1-circle-fill"></i></div>
                        <div>
                            <h5 class="h6 mb-1">Cliente reporta un ticket</h5>
                            <p class="small text-muted mb-0">Mediante nuestro sencillo panel web de soporte.</p>
                        </div>
                    </div>
                    <div class="d-flex bg-white p-3 rounded shadow-sm align-items-center gap-3">
                        <div class="bg-info text-dark rounded-circle p-2 d-inline-flex justify-content-center align-items-center" style="width:40px; height:40px;"><i class="bi bi-2-circle-fill"></i></div>
                        <div>
                            <h5 class="h6 mb-1">Técnico analiza la infraestructura</h5>
                            <p class="small text-muted mb-0">Soluciona el problema o detecta mejoras de sistemas.</p>
                        </div>
                    </div>
                    <div class="d-flex bg-white p-3 rounded shadow-sm align-items-center gap-3">
                        <div class="bg-info text-dark rounded-circle p-2 d-inline-flex justify-content-center align-items-center" style="width:40px; height:40px;"><i class="bi bi-3-circle-fill"></i></div>
                        <div>
                            <h5 class="h6 mb-1">PMO planifica el cambio</h5>
                            <p class="small text-muted mb-0">Si el fallo requiere una actualización estructural.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN CONTACTO -->
<section id="contacto" class="container py-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Contacta con TechFlow</h2>
                    <p class="text-muted">¿Necesitas asesoría en tus proyectos o un plan de soporte IT personalizado?</p>
                </div>
                
                <?php if ($mensaje_enviado): ?>
                    <!-- Alerta de éxito si se ha enviado el formulario -->
                    <div class="alert alert-success d-flex align-items-center shadow-sm mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                        <div>
                            <strong>¡Formulario recibido con éxito, <?php echo $nombre; ?>!</strong><br>
                            Hemos simulado el envío de tu consulta sobre <em>"<?php echo $asunto; ?>"</em>. Nos pondremos en contacto contigo a través de <strong><?php echo $email; ?></strong> en menos de 24 horas.
                        </div>
                    </div>
                <?php endif; ?>

                <form action="index.php#contacto" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label fw-medium">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person text-secondary"></i></span>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Ana García" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope text-secondary"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ej. ana@empresa.com" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="asunto" class="form-label fw-medium">Asunto</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-info-circle text-secondary"></i></span>
                            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ej. Presupuesto de soporte o consulta PMO" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="mensaje" class="form-label fw-medium">Mensaje / Consulta</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Describe tu necesidad o el reto tecnológico de tu empresa..." required></textarea>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" name="enviar_contacto" class="btn btn-tech-primary btn-lg px-5">
                            <i class="bi bi-send-fill me-2"></i>Enviar Consulta
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- BANNER FINAL LLAMADA A LA ACCIÓN (CTA) -->
<section class="py-5 text-white text-center" style="background: linear-gradient(135deg, #172A45 0%, #0A192F 100%); border-top: 3px solid #00B4D8;">
    <div class="container py-4">
        <h2 class="display-6 fw-bold mb-3 text-white">¿Eres Cliente y Tienes una Incidencia Informática?</h2>
        <p class="lead text-light mb-4 mx-auto" style="max-width: 800px;">
            No esperes más. Registra hoy mismo tu ticket en nuestra plataforma de soporte integrada y realiza el seguimiento en tiempo real con nuestros técnicos y directores de proyectos.
        </p>
        <a href="login.php" class="btn btn-tech-primary btn-lg px-5 py-3 fw-bold fs-5">
            <i class="bi bi-headset me-2"></i>Acceder al Portal de Soporte
        </a>
    </div>
</section>

<?php
// 2. Incluimos el pie de página común
include 'footer.php';
?>
