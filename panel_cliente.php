<?php
/**
 * ====================================================================
 * PANEL DEL CLIENTE - PANEL_CLIENTE.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Vista exclusiva para usuarios con rol 'cliente'.
 * Muestra el estado y progreso de sus proyectos en desarrollo (PMO)
 * y el listado de sus incidencias de soporte técnico abiertas (Tickets).
 */

// 1. Iniciamos sesión y controlamos el acceso
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos si el usuario no se ha autenticado o si no tiene el rol de cliente
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.php");
    exit;
}

// 2. Cargamos archivos de soporte (Conexión y Cabecera)
require_once 'conexion.php';
include 'header.php';

$cliente_id = $_SESSION['usuario_id'];

// 3. CONSULTA: Proyectos contratados por este cliente
$sql_proyectos = "SELECT * FROM proyectos WHERE cliente_id = '$cliente_id' ORDER BY fecha_inicio DESC";
$resultado_proyectos = mysqli_query($conexion, $sql_proyectos);

// 4. CONSULTA: Tickets de soporte reportados por este cliente
$sql_tickets = "SELECT t.*, u.nombre AS tecnico_nombre 
                FROM tickets t 
                LEFT JOIN usuarios u ON t.tecnico_id = u.id 
                WHERE t.cliente_id = '$cliente_id' 
                ORDER BY t.created_at DESC";
$resultado_tickets = mysqli_query($conexion, $sql_tickets);
?>

<div class="container my-4">
    <!-- Fila de bienvenida -->
    <div class="row align-items-center mb-5 gy-3">
        <div class="col-md-8">
            <h1 class="display-6 fw-bold mb-1">Área Privada de Cliente</h1>
            <p class="text-secondary mb-0">Bienvenido/a, <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong>. Desde aquí puedes supervisar tus proyectos tecnológicos y contactar con Soporte IT.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="crear_ticket.php" class="btn btn-tech-primary btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Nueva Incidencia IT
            </a>
        </div>
    </div>

    <div class="row g-4">
        <!-- ========================================== -->
        <!-- SECCIÓN DE PROYECTOS CONTRATADOS (MÓDULO PMO) -->
        <!-- ========================================== -->
        <div class="col-12">
            <div class="card card-custom p-4 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3 d-inline-flex">
                        <i class="bi bi-kanban fs-4 text-info"></i>
                    </div>
                    <h2 class="h4 mb-0">Estado de tus Proyectos en Desarrollo (PMO)</h2>
                </div>

                <?php if (mysqli_num_rows($resultado_proyectos) > 0): ?>
                    <div class="row g-4">
                        <?php while ($proyecto = mysqli_fetch_assoc($resultado_proyectos)): ?>
                            <div class="col-md-6">
                                <div class="p-3 border rounded bg-light bg-opacity-50 h-100">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h3 class="h5 mb-0 text-dark"><?php echo htmlspecialchars($proyecto['nombre']); ?></h3>
                                        
                                        <!-- Insignia del estado del proyecto -->
                                        <?php 
                                        $estado_clase = 'bg-secondary';
                                        if ($proyecto['estado'] === 'En Desarrollo') $estado_clase = 'bg-primary';
                                        elseif ($proyecto['estado'] === 'Pruebas') $estado_clase = 'bg-warning text-dark';
                                        elseif ($proyecto['estado'] === 'Completado') $estado_clase = 'bg-success';
                                        ?>
                                        <span class="badge <?php echo $estado_clase; ?>"><?php echo $proyecto['estado']; ?></span>
                                    </div>
                                    <p class="text-secondary small mb-3"><?php echo htmlspecialchars($proyecto['descripcion']); ?></p>
                                    
                                    <!-- Barra de Progreso de Bootstrap -->
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between small mb-1 fw-medium text-dark">
                                            <span>Avance General</span>
                                            <span><?php echo $proyecto['progreso']; ?>%</span>
                                        </div>
                                        <div class="progress" style="height: 10px; border-radius: 5px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" 
                                                 role="progressbar" 
                                                 style="width: <?php echo $proyecto['progreso']; ?>%" 
                                                 aria-valuenow="<?php echo $proyecto['progreso']; ?>" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Fechas del proyecto -->
                                    <div class="row text-center bg-white p-2 rounded border small">
                                        <div class="col-6 border-end">
                                            <span class="text-muted d-block small">Fecha Inicio</span>
                                            <strong class="text-dark"><i class="bi bi-calendar-check text-info me-1"></i><?php echo date('d/m/Y', strtotime($proyecto['fecha_inicio'])); ?></strong>
                                        </div>
                                        <div class="col-6">
                                            <span class="text-muted d-block small">Fecha Fin Prevista</span>
                                            <strong class="text-dark"><i class="bi bi-calendar-x text-danger me-1"></i><?php echo $proyecto['fecha_fin'] ? date('d/m/Y', strtotime($proyecto['fecha_fin'])) : 'Por definir'; ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light text-center py-4 border">
                        <i class="bi bi-info-circle display-6 text-muted mb-2"></i>
                        <p class="text-secondary mb-0">Actualmente no dispones de ningún proyecto de desarrollo activo asignado en la PMO.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- SECCIÓN DE INCIDENCIAS / SOPORTE IT (TICKETS) -->
        <!-- ========================================== -->
        <div class="col-12">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 me-3 d-inline-flex">
                            <i class="bi bi-headset fs-4 text-info"></i>
                        </div>
                        <h2 class="h4 mb-0">Mis Incidencias de Soporte Técnico</h2>
                    </div>
                    <span class="badge bg-secondary px-3 py-2"><?php echo mysqli_num_rows($resultado_tickets); ?> Tickets Registrados</span>
                </div>

                <?php if (mysqli_num_rows($resultado_tickets) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Problema / Título</th>
                                    <th>Categoría</th>
                                    <th>Gravedad</th>
                                    <th>Estado</th>
                                    <th>Técnico Asignado</th>
                                    <th>Fecha Reporte</th>
                                    <th class="text-end">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($ticket = mysqli_fetch_assoc($resultado_tickets)): ?>
                                    <tr>
                                        <!-- ID del Ticket -->
                                        <td class="fw-bold">#<?php echo $ticket['id']; ?></td>
                                        
                                        <!-- Título con truncamiento por si es largo -->
                                        <td>
                                            <div class="text-dark fw-medium" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?php echo htmlspecialchars($ticket['titulo']); ?>
                                            </div>
                                            <span class="text-muted" style="font-size: 0.75rem;">Ver comentarios y chat</span>
                                        </td>
                                        
                                        <!-- Categoría -->
                                        <td>
                                            <span class="badge bg-light text-dark border"><?php echo $ticket['categoria']; ?></span>
                                        </td>
                                        
                                        <!-- Gravedad con colores de alerta -->
                                        <td>
                                            <?php 
                                            $grav_clase = 'bg-secondary';
                                            if ($ticket['gravedad'] === 'Baja') $grav_clase = 'bg-success bg-opacity-10 text-success border border-success';
                                            elseif ($ticket['gravedad'] === 'Media') $grav_clase = 'bg-warning bg-opacity-10 text-warning-emphasis border border-warning';
                                            elseif ($ticket['gravedad'] === 'Alta') $grav_clase = 'bg-danger bg-opacity-10 text-danger border border-danger';
                                            elseif ($ticket['gravedad'] === 'Critica') $grav_clase = 'bg-danger text-white';
                                            ?>
                                            <span class="badge <?php echo $grav_clase; ?> px-2.5 py-1.5"><?php echo $ticket['gravedad']; ?></span>
                                        </td>
                                        
                                        <!-- Estado del ticket -->
                                        <td>
                                            <?php 
                                            $est_clase = 'bg-secondary';
                                            if ($ticket['estado'] === 'Abierto') $est_clase = 'bg-info text-dark';
                                            elseif ($ticket['estado'] === 'En Proceso') $est_clase = 'bg-primary';
                                            elseif ($ticket['estado'] === 'Resuelto') $est_clase = 'bg-success';
                                            elseif ($ticket['estado'] === 'Cerrado') $est_clase = 'bg-dark';
                                            ?>
                                            <span class="badge <?php echo $est_clase; ?>"><?php echo $ticket['estado']; ?></span>
                                        </td>
                                        
                                        <!-- Técnico asignado -->
                                        <td class="text-secondary small">
                                            <?php if ($ticket['tecnico_nombre']): ?>
                                                <i class="bi bi-person-fill text-info me-1"></i><?php echo htmlspecialchars($ticket['tecnico_nombre']); ?>
                                            <?php else: ?>
                                                <span class="text-muted"><i class="bi bi-hourglass-split me-1"></i>Sin asignar</span>
                                            <?php endif; ?>
                                        </td>
                                        
                                        <!-- Fecha de creación -->
                                        <td class="small text-secondary">
                                            <?php echo date('d/m/Y H:i', strtotime($ticket['created_at'])); ?>
                                        </td>
                                        
                                        <!-- Botón de acción -->
                                        <td class="text-end">
                                            <a href="ver_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-tech-outline btn-sm">
                                                <i class="bi bi-chat-left-text me-1"></i>Ver Detalles
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light text-center py-4 border mb-0">
                        <i class="bi bi-envelope-open display-6 text-muted mb-2"></i>
                        <p class="text-secondary mb-3">No tienes ninguna incidencia abierta en este momento.</p>
                        <a href="crear_ticket.php" class="btn btn-tech-outline btn-sm">Abrir tu primer ticket</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
// 5. Incluimos el pie de página
include 'footer.php';
?>
