<?php
/**
 * ====================================================================
 * REGISTRO DE INCIDENCIAS - CREAR_TICKET.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Formulario para que el cliente cree un nuevo ticket de soporte.
 * Inserta los datos de forma procedimental (mysqli_query) y asocia
 * la incidencia automáticamente al ID del cliente de la sesión.
 */

// 1. Iniciamos sesión y controlamos el acceso
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Bloqueamos el acceso a usuarios no autorizados
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.php");
    exit;
}

// 2. Cargamos dependencias
require_once 'conexion.php';

$mensaje_exito = "";
$mensaje_error = "";

// 3. Procesamos el formulario al hacer POST
if (isset($_POST['guardar_ticket'])) {
    // Capturamos y sanitizamos los inputs
    $titulo      = mysqli_real_escape_string($conexion, trim($_POST['titulo']));
    $categoria   = mysqli_real_escape_string($conexion, $_POST['categoria']);
    $gravedad    = mysqli_real_escape_string($conexion, $_POST['gravedad']);
    $descripcion = mysqli_real_escape_string($conexion, trim($_POST['descripcion']));
    
    $cliente_id  = $_SESSION['usuario_id'];
    
    // Validación de campos vacíos
    if (empty($titulo) || empty($descripcion) || empty($categoria) || empty($gravedad)) {
        $mensaje_error = "Todos los campos son obligatorios.";
    } else {
        // 4. Consulta SQL de inserción (procedimental)
        // El estado inicial de cualquier ticket nuevo es siempre 'Abierto'
        $sql = "INSERT INTO tickets (titulo, descripcion, cliente_id, categoria, gravedad, estado) 
                VALUES ('$titulo', '$descripcion', '$cliente_id', '$categoria', '$gravedad', 'Abierto')";
        
        if (mysqli_query($conexion, $sql)) {
            // Guardamos el ID generado por si quisiéramos redirigir a ver el ticket
            $nuevo_ticket_id = mysqli_insert_id($conexion);
            $mensaje_exito = "Incidencia registrada correctamente con el código <strong>#$nuevo_ticket_id</strong>.";
            
            // Redirigimos al panel del cliente tras 2 segundos para actualizar la vista
            header("Refresh: 2; URL=panel_cliente.php");
        } else {
            $mensaje_error = "Error al guardar el ticket en el sistema. Detalle: " . mysqli_error($conexion);
        }
    }
}

// Incluimos la cabecera común
include 'header.php';
?>

<div class="container my-4">
    <!-- Navegación tipo migas de pan (Breadcrumbs) para mejorar la usabilidad -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item"><a href="panel_cliente.php" class="text-decoration-none">Mi Panel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Abrir Ticket de Soporte</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card card-custom p-4 p-md-5">
                
                <!-- Encabezado del Formulario -->
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3 d-inline-flex">
                        <i class="bi bi-plus-circle-fill fs-3 text-info"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-0 fw-bold">Reportar Nueva Incidencia IT</h1>
                        <p class="text-muted small mb-0">Describe el problema y nuestro equipo de Soporte y PMO te atenderá de inmediato.</p>
                    </div>
                </div>

                <!-- Notificación de Éxito -->
                <?php if (!empty($mensaje_exito)): ?>
                    <div class="alert alert-success d-flex align-items-center shadow-sm mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                        <div>
                            <?php echo $mensaje_exito; ?> Redireccionando a tu panel de control...
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Notificación de Error -->
                <?php if (!empty($mensaje_error)): ?>
                    <div class="alert alert-danger d-flex align-items-center shadow-sm mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                        <div>
                            <?php echo $mensaje_error; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Formulario Técnico -->
                <form action="crear_ticket.php" method="POST" class="row g-3">
                    
                    <!-- Campo Título -->
                    <div class="col-12">
                        <label for="titulo" class="form-label fw-semibold text-dark">Título o Resumen de la Incidencia</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-tag text-secondary"></i></span>
                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej: No conecta la VPN desde casa / Solicito avance de ERP" required <?php echo !empty($mensaje_exito) ? 'disabled' : ''; ?>>
                        </div>
                        <div class="form-text text-muted">Escribe un título breve y descriptivo para identificar rápidamente el problema.</div>
                    </div>

                    <!-- Campo Categoría -->
                    <div class="col-md-6">
                        <label for="categoria" class="form-label fw-semibold text-dark">Categoría de Consulta</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-folder text-secondary"></i></span>
                            <select class="form-select" id="categoria" name="categoria" required <?php echo !empty($mensaje_exito) ? 'disabled' : ''; ?>>
                                <option value="" disabled selected>Selecciona una opción...</option>
                                <option value="Soporte Tecnico">Soporte Técnico (Sistemas, Equipos, Software)</option>
                                <option value="Gestion de Proyectos">Gestión de Proyectos / PMO (Hitos, Entregables)</option>
                                <option value="Infraestructura">Infraestructura (Redes, VPN, Servidores Cloud)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campo Gravedad -->
                    <div class="col-md-6">
                        <label for="gravedad" class="form-label fw-semibold text-dark">Gravedad o Prioridad</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-exclamation-octagon text-secondary"></i></span>
                            <select class="form-select" id="gravedad" name="gravedad" required <?php echo !empty($mensaje_exito) ? 'disabled' : ''; ?>>
                                <option value="" disabled selected>Selecciona la gravedad...</option>
                                <option value="Baja">Baja (Consultas generales, dudas leves)</option>
                                <option value="Media">Media (Fallo menor sin interrupción de negocio)</option>
                                <option value="Alta">Alta (Problema grave en producción o VPN)</option>
                                <option value="Critica">Crítica (Servidor caído, parada total de actividad)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Campo Descripción -->
                    <div class="col-12">
                        <label for="descripcion" class="form-label fw-semibold text-dark">Descripción Detallada del Incidente</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="6" placeholder="Detalla los pasos para reproducir el error, capturas de pantalla de error, o explicaciones detalladas que ayuden al técnico a solucionar tu caso..." required <?php echo !empty($mensaje_exito) ? 'disabled' : ''; ?>></textarea>
                        <div class="form-text text-muted">Aporta la máxima información posible (mensajes de error exactos, rangos de IP, etc.).</div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="col-12 d-flex gap-3 justify-content-end mt-4">
                        <a href="panel_cliente.php" class="btn btn-outline-secondary px-4 py-2">
                            <i class="bi bi-x-circle me-2"></i>Cancelar
                        </a>
                        <button type="submit" name="guardar_ticket" class="btn btn-tech-primary px-5 py-2" <?php echo !empty($mensaje_exito) ? 'disabled' : ''; ?>>
                            <i class="bi bi-send-fill me-2"></i>Registrar Incidencia
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<?php
// Incluimos el pie de página
include 'footer.php';
?>
