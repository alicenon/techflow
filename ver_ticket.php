<?php
/**
 * ====================================================================
 * DETALLE Y SEGUIMIENTO DE INCIDENCIA - VER_TICKET.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Muestra la información técnica detallada de una incidencia.
 * Permite mantener un diálogo activo (tipo chat) y que el personal IT
 * o gestores PMO actualicen el estado y el técnico asignado.
 */

// 1. Iniciamos sesión y controlamos el acceso general
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// 2. Cargamos dependencias e iniciamos la conexión
require_once 'conexion.php';

// Validamos el parámetro GET 'id'
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$ticket_id = intval($_GET['id']);
$usuario_id = $_SESSION['usuario_id'];
$usuario_rol = $_SESSION['rol'];

// 3. CONSULTA: Obtener detalles del ticket con nombres de cliente y técnico
$sql_ticket = "SELECT t.*, u_c.nombre AS cliente_nombre, u_c.email AS cliente_email, u_t.nombre AS tecnico_nombre 
               FROM tickets t
               JOIN usuarios u_c ON t.cliente_id = u_c.id
               LEFT JOIN usuarios u_t ON t.tecnico_id = u_t.id
               WHERE t.id = '$ticket_id' LIMIT 1";
$resultado_ticket = mysqli_query($conexion, $sql_ticket);

if (!$resultado_ticket || mysqli_num_rows($resultado_ticket) === 0) {
    die("Error: La incidencia solicitada no existe o ha sido eliminada.");
}

$ticket = mysqli_fetch_assoc($resultado_ticket);

// 4. CONTROL DE SEGURIDAD (IDOR): Un cliente solo puede ver sus propios tickets
if ($usuario_rol === 'cliente' && $ticket['cliente_id'] != $usuario_id) {
    die("Acceso denegado: No tienes permisos para ver esta incidencia.");
}

$mensaje_exito = "";
$mensaje_error = "";

// 5. ACCIÓN: Procesar nuevo comentario (historial/chat)
if (isset($_POST['enviar_comentario'])) {
    $comentario = mysqli_real_escape_string($conexion, trim($_POST['comentario']));
    
    if (empty($comentario)) {
        $mensaje_error = "El comentario no puede estar vacío.";
    } else {
        // SQL para insertar la respuesta
        $sql_insert = "INSERT INTO comentarios_tickets (ticket_id, usuario_id, comentario) 
                       VALUES ('$ticket_id', '$usuario_id', '$comentario')";
        
        if (mysqli_query($conexion, $sql_insert)) {
            // Si responde un técnico o PMO y el ticket estaba en 'Abierto', lo cambiamos a 'En Proceso' automáticamente
            if ($usuario_rol !== 'cliente' && $ticket['estado'] === 'Abierto') {
                mysqli_query($conexion, "UPDATE tickets SET estado = 'En Proceso' WHERE id = '$ticket_id'");
            }
            
            // Recargamos la misma página con parámetros limpios
            header("Location: ver_ticket.php?id=$ticket_id");
            exit;
        } else {
            $mensaje_error = "Error al registrar el comentario: " . mysqli_error($conexion);
        }
    }
}

// 6. ACCIÓN ADMINISTRATIVA: Actualizar Estado y Asignación de Técnico (Solo PMO/Técnico)
if (isset($_POST['actualizar_ticket']) && ($usuario_rol === 'tecnico' || $usuario_rol === 'pmo')) {
    $nuevo_estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $nuevo_tecnico_id = $_POST['tecnico_id'] !== "" ? intval($_POST['tecnico_id']) : "NULL";
    
    // Ejecutamos la actualización
    $sql_update = "UPDATE tickets SET estado = '$nuevo_estado', tecnico_id = $nuevo_tecnico_id WHERE id = '$ticket_id'";
    
    if (mysqli_query($conexion, $sql_update)) {
        $mensaje_exito = "Incidencia actualizada con éxito.";
        // Recargamos los datos actualizados del ticket
        header("Refresh: 1; URL=ver_ticket.php?id=$ticket_id");
    } else {
        $mensaje_error = "Error al actualizar la incidencia: " . mysqli_error($conexion);
    }
}

// 7. CONSULTA: Obtener historial de comentarios para este ticket
$sql_comentarios = "SELECT c.*, u.nombre AS autor_nombre, u.rol AS autor_rol 
                    FROM comentarios_tickets c 
                    JOIN usuarios u ON c.usuario_id = u.id 
                    WHERE c.ticket_id = '$ticket_id' 
                    ORDER BY c.created_at ASC";
$resultado_comentarios = mysqli_query($conexion, $sql_comentarios);

// Incluimos la cabecera común
include 'header.php';
?>

<div class="container my-4">
    <!-- Migas de Pan para Navegación -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item">
                <a href="<?php echo ($usuario_rol === 'cliente') ? 'panel_cliente.php' : 'panel_pmo.php'; ?>" class="text-decoration-none">
                    <?php echo ($usuario_rol === 'cliente') ? 'Mi Panel' : 'Panel de Control'; ?>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Ficha del Ticket #<?php echo $ticket['id']; ?></li>
        </ol>
    </nav>

    <?php if (!empty($mensaje_exito)): ?>
        <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> <?php echo $mensaje_exito; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($mensaje_error)): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $mensaje_error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- ========================================== -->
        <!-- COLUMNA IZQUIERDA: CHAT Y DESCRIPCIÓN       -->
        <!-- ========================================== -->
        <div class="col-lg-8">
            <!-- Ficha del problema -->
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-light text-secondary border">Incidencia #<?php echo $ticket['id']; ?></span>
                    <span class="text-muted small"><i class="bi bi-clock me-1"></i><?php echo date('d/m/Y H:i', strtotime($ticket['created_at'])); ?></span>
                </div>
                <h1 class="h3 fw-bold mb-3 text-dark"><?php echo htmlspecialchars($ticket['titulo']); ?></h1>
                
                <hr class="my-3 bg-secondary opacity-25">
                
                <h5 class="h6 text-uppercase fw-semibold text-secondary mb-2">Descripción del Incidente</h5>
                <p class="text-dark bg-light p-3 rounded border border-light" style="white-space: pre-wrap; font-size: 0.95rem;"><?php echo htmlspecialchars($ticket['descripcion']); ?></p>
            </div>

            <!-- CHAT DE COMENTARIOS / SEGUIMIENTO -->
            <div class="card card-custom p-4 mb-4">
                <h4 class="h5 fw-bold mb-4"><i class="bi bi-chat-dots text-info me-2"></i>Historial de Respuestas y Seguimiento</h4>
                
                <div class="chat-container mb-4" style="max-height: 450px; overflow-y: auto; padding-right: 5px;">
                    <?php if (mysqli_num_rows($resultado_comentarios) > 0): ?>
                        <div class="d-flex flex-column gap-3">
                            <?php while ($comentario = mysqli_fetch_assoc($resultado_comentarios)): ?>
                                <!-- Estilo de burbuja dinámico según el autor (Cliente a la derecha, Soporte/PMO a la izquierda) -->
                                <?php 
                                $es_propio = ($comentario['usuario_id'] == $usuario_id);
                                $es_soporte = ($comentario['autor_rol'] !== 'cliente');
                                
                                // Si es soporte, color de fondo azul suave; si es cliente, color gris
                                $burbuja_clase = $es_soporte ? 'bg-info bg-opacity-10 border border-info border-opacity-25 ms-0 me-5' : 'bg-light border me-0 ms-5';
                                $align_clase = $es_soporte ? 'align-self-start' : 'align-self-end';
                                ?>
                                <div class="p-3 rounded-3 <?php echo $burbuja_clase; ?> <?php echo $align_clase; ?> w-100" style="max-width: 90%;">
                                    <div class="d-flex justify-content-between align-items-center mb-1 flex-wrap">
                                        <strong class="small text-dark">
                                            <i class="bi <?php echo $es_soporte ? 'bi-person-badge-fill text-info' : 'bi-person-fill text-secondary'; ?> me-1"></i>
                                            <?php echo htmlspecialchars($comentario['autor_nombre']); ?>
                                            <?php if ($es_soporte): ?>
                                                <span class="badge bg-info text-dark small" style="font-size: 0.65rem;"><?php echo strtoupper($comentario['autor_rol']); ?> SOPORTE</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary text-white small" style="font-size: 0.65rem;">CLIENTE</span>
                                            <?php endif; ?>
                                        </strong>
                                        <span class="text-muted" style="font-size: 0.75rem;">
                                            <?php echo date('d/m/Y H:i', strtotime($comentario['created_at'])); ?>
                                        </span>
                                    </div>
                                    <p class="mb-0 text-dark small" style="white-space: pre-wrap;"><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-light text-center py-4 border mb-0">
                            <i class="bi bi-chat-left-dots display-6 text-muted mb-2"></i>
                            <p class="text-secondary small mb-0">Aún no se han registrado respuestas. Escribe a continuación para iniciar el diálogo.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <hr class="my-3 bg-secondary opacity-25">
                
                <!-- FORMULARIO DE NUEVO COMENTARIO -->
                <form action="ver_ticket.php?id=<?php echo $ticket_id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="comentario" class="form-label small fw-semibold text-dark">Escribe tu Respuesta / Comentario</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Escribe aquí tu mensaje de seguimiento o actualización técnica..." required <?php echo ($ticket['estado'] === 'Cerrado') ? 'disabled' : ''; ?>></textarea>
                    </div>
                    <div class="text-end">
                        <?php if ($ticket['estado'] === 'Cerrado'): ?>
                            <button type="button" class="btn btn-dark btn-sm px-4" disabled>
                                <i class="bi bi-lock-fill me-2"></i>Incidencia Cerrada
                            </button>
                        <?php else: ?>
                            <button type="submit" name="enviar_comentario" class="btn btn-tech-primary px-4 py-2">
                                <i class="bi bi-reply-fill me-2"></i>Enviar Mensaje
                            </button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- COLUMNA DERECHA: ESTADO Y CONTROL          -->
        <!-- ========================================== -->
        <div class="col-lg-4">
            <!-- Detalles generales (Estáticos para ambos roles) -->
            <div class="card card-custom p-4 mb-4">
                <h4 class="h5 fw-bold mb-3">Detalle Técnico</h4>
                
                <ul class="list-unstyled mb-0">
                    <li class="mb-3 d-flex justify-content-between">
                        <span class="text-muted small">Estado Actual:</span>
                        <?php 
                        $est_clase = 'bg-secondary';
                        if ($ticket['estado'] === 'Abierto') $est_clase = 'bg-info text-dark';
                        elseif ($ticket['estado'] === 'En Proceso') $est_clase = 'bg-primary';
                        elseif ($ticket['estado'] === 'Resuelto') $est_clase = 'bg-success';
                        elseif ($ticket['estado'] === 'Cerrado') $est_clase = 'bg-dark';
                        ?>
                        <span class="badge <?php echo $est_clase; ?> px-3 py-2"><?php echo $ticket['estado']; ?></span>
                    </li>
                    <li class="mb-3 d-flex justify-content-between align-items-center">
                        <span class="text-muted small">Gravedad:</span>
                        <?php 
                        $grav_clase = 'bg-secondary';
                        if ($ticket['gravedad'] === 'Baja') $grav_clase = 'bg-success bg-opacity-10 text-success border border-success';
                        elseif ($ticket['gravedad'] === 'Media') $grav_clase = 'bg-warning bg-opacity-10 text-warning-emphasis border border-warning';
                        elseif ($ticket['gravedad'] === 'Alta') $grav_clase = 'bg-danger bg-opacity-10 text-danger border border-danger';
                        elseif ($ticket['gravedad'] === 'Critica') $grav_clase = 'bg-danger text-white';
                        ?>
                        <span class="badge <?php echo $grav_clase; ?>"><?php echo $ticket['gravedad']; ?></span>
                    </li>
                    <li class="mb-3 d-flex justify-content-between">
                        <span class="text-muted small">Categoría:</span>
                        <span class="fw-medium small"><?php echo $ticket['categoria']; ?></span>
                    </li>
                    <li class="mb-3 d-flex justify-content-between">
                        <span class="text-muted small">Cliente:</span>
                        <span class="fw-medium small"><?php echo htmlspecialchars($ticket['cliente_nombre']); ?></span>
                    </li>
                    <li class="mb-0 d-flex justify-content-between">
                        <span class="text-muted small">Técnico Asignado:</span>
                        <span class="fw-medium text-info small">
                            <?php if ($ticket['tecnico_nombre']): ?>
                                <i class="bi bi-person-fill me-1"></i><?php echo htmlspecialchars($ticket['tecnico_nombre']); ?>
                            <?php else: ?>
                                <span class="text-muted small">Sin asignar</span>
                            <?php endif; ?>
                        </span>
                    </li>
                </ul>
            </div>

            <!-- PANEL ADMINISTRATIVO (Solo visible para Técnicos o PMO) -->
            <?php if ($usuario_rol === 'tecnico' || $usuario_rol === 'pmo'): ?>
                <div class="card card-custom p-4 border border-info border-opacity-50">
                    <h4 class="h5 fw-bold mb-3 text-dark"><i class="bi bi-shield-lock-fill text-info me-2"></i>Gestión de Incidencia</h4>
                    
                    <form action="ver_ticket.php?id=<?php echo $ticket_id; ?>" method="POST" class="d-flex flex-column gap-3">
                        
                        <!-- Select de Cambio de Estado -->
                        <div>
                            <label for="estado" class="form-label small fw-medium">Actualizar Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="Abierto" <?php echo $ticket['estado'] === 'Abierto' ? 'selected' : ''; ?>>Abierto</option>
                                <option value="En Proceso" <?php echo $ticket['estado'] === 'En Proceso' ? 'selected' : ''; ?>>En Proceso</option>
                                <option value="Resuelto" <?php echo $ticket['estado'] === 'Resuelto' ? 'selected' : ''; ?>>Resuelto</option>
                                <option value="Cerrado" <?php echo $ticket['estado'] === 'Cerrado' ? 'selected' : ''; ?>>Cerrado (Cierre definitivo)</option>
                            </select>
                        </div>
                        
                        <!-- Select de Asignación de Técnico -->
                        <div>
                            <label for="tecnico_id" class="form-label small fw-medium">Asignar Técnico Responsable</label>
                            <select class="form-select" id="tecnico_id" name="tecnico_id">
                                <option value="">-- Sin Asignar (Disponible) --</option>
                                <?php 
                                // Consultamos todos los técnicos y gestores de la base de datos
                                $sql_tecnicos = "SELECT id, nombre, rol FROM usuarios WHERE rol IN ('tecnico', 'pmo') ORDER BY nombre ASC";
                                $res_tecnicos = mysqli_query($conexion, $sql_tecnicos);
                                while ($tecnico = mysqli_fetch_assoc($res_tecnicos)):
                                ?>
                                    <option value="<?php echo $tecnico['id']; ?>" <?php echo $ticket['tecnico_id'] == $tecnico['id'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($tecnico['nombre']); ?> (<?php echo strtoupper($tecnico['rol']); ?>)
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        
                        <!-- Botón de Guardado Administrativo -->
                        <button type="submit" name="actualizar_ticket" class="btn btn-tech-primary w-100 mt-2 py-2">
                            <i class="bi bi-save2-fill me-2"></i>Guardar Cambios
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
// Incluimos el pie de página
include 'footer.php';
?>
