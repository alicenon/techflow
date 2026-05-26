<?php
/**
 * ====================================================================
 * PANEL DE CONTROL GLOBAL (TÉCNICOS Y PMO) - PANEL_PMO.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Panel administrativo unificado. Permite a técnicos y gestores PMO
 * ver estadísticas de incidencias, gestionar tickets globales (Soporte IT)
 * y supervisar el progreso de los proyectos asignados (PMO).
 */

// 1. Iniciamos sesión y controlamos el acceso
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprobamos si el usuario tiene rol válido (técnico o pmo)
if (!isset($_SESSION['usuario_id']) || ($_SESSION['rol'] !== 'tecnico' && $_SESSION['rol'] !== 'pmo')) {
    header("Location: login.php");
    exit;
}

// 2. Cargamos archivos base
require_once 'conexion.php';
include 'header.php';

// 3. OBTENCIÓN DE ESTADÍSTICAS RÁPIDAS (WIDGETS)
// Total Tickets
$res_total = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM tickets");
$total_tickets = mysqli_fetch_assoc($res_total)['total'];

// Tickets Abiertos/En Proceso
$res_pendientes = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM tickets WHERE estado IN ('Abierto', 'En Proceso')");
$pendientes_tickets = mysqli_fetch_assoc($res_pendientes)['total'];

// Tickets Resueltos/Cerrados
$res_resueltos = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM tickets WHERE estado IN ('Resuelto', 'Cerrado')");
$resueltos_tickets = mysqli_fetch_assoc($res_resueltos)['total'];

// Proyectos Activos (PMO)
$res_proyectos_activos = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM proyectos WHERE estado != 'Completado'");
$proyectos_activos = mysqli_fetch_assoc($res_proyectos_activos)['total'];


// 4. CONSULTA: Todos los Tickets globales con información del Cliente y del Técnico asignado
$sql_tickets = "SELECT t.*, u_c.nombre AS cliente_nombre, u_t.nombre AS tecnico_nombre 
                FROM tickets t
                JOIN usuarios u_c ON t.cliente_id = u_c.id
                LEFT JOIN usuarios u_t ON t.tecnico_id = u_t.id
                ORDER BY t.created_at DESC";
$resultado_tickets = mysqli_query($conexion, $sql_tickets);


// 5. CONSULTA: Todos los Proyectos en desarrollo y sus clientes (PMO)
$sql_proyectos = "SELECT p.*, u.nombre AS cliente_nombre 
                  FROM proyectos p
                  JOIN usuarios u ON p.cliente_id = u.id
                  ORDER BY p.fecha_inicio DESC";
$resultado_proyectos = mysqli_query($conexion, $sql_proyectos);
?>

<div class="container my-4">
    <!-- Encabezado del Panel -->
    <div class="row align-items-center mb-4 gy-2">
        <div class="col-md-8">
            <h1 class="display-6 fw-bold mb-1">Cuadro de Mando del Personal</h1>
            <p class="text-secondary mb-0">Sesión iniciada como <strong><?php echo htmlspecialchars($_SESSION['nombre']); ?></strong> 
               (<span class="text-uppercase text-info fw-bold"><?php echo $_SESSION['rol']; ?></span>).</p>
        </div>
        <div class="col-md-4 text-md-end">
            <!-- Fecha y hora del sistema en tiempo real para emular robustez -->
            <span class="badge bg-dark border border-secondary text-white px-3 py-2">
                <i class="bi bi-clock-fill text-info me-2"></i>Fecha Sistema: <?php echo date('d/m/Y'); ?>
            </span>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- WIDGETS DE ESTADÍSTICAS RÁPIDAS (KPIs)     -->
    <!-- ========================================== -->
    <div class="row g-3 mb-5">
        <!-- Widget 1: Total de Incidencias -->
        <div class="col-6 col-lg-3">
            <div class="card card-custom p-3 d-flex flex-row align-items-center justify-content-between h-100 border-start border-primary border-4">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block">Incidencias Totales</span>
                    <strong class="display-6 fw-bold text-dark"><?php echo $total_tickets; ?></strong>
                </div>
                <div class="fs-1 text-primary bg-primary bg-opacity-10 rounded p-2 d-none d-sm-block"><i class="bi bi-ticket-perforated"></i></div>
            </div>
        </div>

        <!-- Widget 2: Tickets Pendientes -->
        <div class="col-6 col-lg-3">
            <div class="card card-custom p-3 d-flex flex-row align-items-center justify-content-between h-100 border-start border-warning border-4">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block">Pendientes / Activos</span>
                    <strong class="display-6 fw-bold text-warning"><?php echo $pendientes_tickets; ?></strong>
                </div>
                <div class="fs-1 text-warning bg-warning bg-opacity-10 rounded p-2 d-none d-sm-block"><i class="bi bi-hourglass-split"></i></div>
            </div>
        </div>

        <!-- Widget 3: Tickets Resueltos -->
        <div class="col-6 col-lg-3">
            <div class="card card-custom p-3 d-flex flex-row align-items-center justify-content-between h-100 border-start border-success border-4">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block">Casos Resueltos</span>
                    <strong class="display-6 fw-bold text-success"><?php echo $resueltos_tickets; ?></strong>
                </div>
                <div class="fs-1 text-success bg-success bg-opacity-10 rounded p-2 d-none d-sm-block"><i class="bi bi-check-circle"></i></div>
            </div>
        </div>

        <!-- Widget 4: Proyectos Activos (PMO) -->
        <div class="col-6 col-lg-3">
            <div class="card card-custom p-3 d-flex flex-row align-items-center justify-content-between h-100 border-start border-info border-4">
                <div>
                    <span class="text-muted small text-uppercase fw-semibold d-block">Proyectos Activos</span>
                    <strong class="display-6 fw-bold text-info"><?php echo $proyectos_activos; ?></strong>
                </div>
                <div class="fs-1 text-info bg-info bg-opacity-10 rounded p-2 d-none d-sm-block"><i class="bi bi-kanban"></i></div>
            </div>
        </div>
    </div>

    <!-- PESTAÑAS DE NAVEGACIÓN ENTRE SOPORTE IT Y GESTIÓN DE PROYECTOS -->
    <ul class="nav nav-tabs mb-4 border-bottom-2" id="panelAdminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold py-2.5 px-4" id="tickets-tab" data-bs-toggle="tab" data-bs-target="#tickets-panel" type="button" role="tab" aria-controls="tickets-panel" aria-selected="true">
                <i class="bi bi-headset me-2 text-info"></i>Soporte IT (Buzón de Tickets)
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold py-2.5 px-4" id="proyectos-tab" data-bs-toggle="tab" data-bs-target="#proyectos-panel" type="button" role="tab" aria-controls="proyectos-panel" aria-selected="false">
                <i class="bi bi-kanban me-2 text-info"></i>Gestión de Proyectos (PMO)
            </button>
        </li>
    </ul>

    <!-- CONTENIDO DE LAS PESTAÑAS -->
    <div class="tab-content" id="panelAdminTabContent">
        
        <!-- PESTAÑA 1: SOPORTE IT (TICKETS GLOBALES) -->
        <div class="tab-pane fade show active" id="tickets-panel" role="tabpanel" aria-labelledby="tickets-tab">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <h3 class="h5 mb-0 fw-bold">Listado General de Incidencias</h3>
                    <span class="text-muted small">Haz clic en "Gestionar" para asignar técnicos, cambiar estados o añadir comentarios.</span>
                </div>

                <?php if (mysqli_num_rows($resultado_tickets) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Incidencia / Título</th>
                                    <th>Categoría</th>
                                    <th>Gravedad</th>
                                    <th>Estado</th>
                                    <th>Técnico Asignado</th>
                                    <th>Reportado</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($ticket = mysqli_fetch_assoc($resultado_tickets)): ?>
                                    <tr>
                                        <!-- ID -->
                                        <td class="fw-bold">#<?php echo $ticket['id']; ?></td>
                                        
                                        <!-- Cliente -->
                                        <td>
                                            <div class="fw-semibold text-dark"><?php echo htmlspecialchars($ticket['cliente_nombre']); ?></div>
                                            <span class="text-muted small">Cliente Corporativo</span>
                                        </td>
                                        
                                        <!-- Título -->
                                        <td>
                                            <div class="text-dark fw-medium" style="max-width: 220px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?php echo htmlspecialchars($ticket['titulo']); ?>
                                            </div>
                                        </td>
                                        
                                        <!-- Categoría -->
                                        <td>
                                            <span class="badge bg-light text-dark border"><?php echo $ticket['categoria']; ?></span>
                                        </td>
                                        
                                        <!-- Gravedad -->
                                        <td>
                                            <?php 
                                            $grav_clase = 'bg-secondary';
                                            if ($ticket['gravedad'] === 'Baja') $grav_clase = 'bg-success bg-opacity-10 text-success border border-success';
                                            elseif ($ticket['gravedad'] === 'Media') $grav_clase = 'bg-warning bg-opacity-10 text-warning-emphasis border border-warning';
                                            elseif ($ticket['gravedad'] === 'Alta') $grav_clase = 'bg-danger bg-opacity-10 text-danger border border-danger';
                                            elseif ($ticket['gravedad'] === 'Critica') $grav_clase = 'bg-danger text-white';
                                            ?>
                                            <span class="badge <?php echo $grav_clase; ?>"><?php echo $ticket['gravedad']; ?></span>
                                        </td>
                                        
                                        <!-- Estado -->
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
                                                <strong class="text-dark"><i class="bi bi-person-fill text-info me-1"></i><?php echo htmlspecialchars($ticket['tecnico_nombre']); ?></strong>
                                            <?php else: ?>
                                                <span class="text-muted"><i class="bi bi-exclamation-circle text-danger me-1"></i>Sin asignar</span>
                                            <?php endif; ?>
                                        </td>
                                        
                                        <!-- Fecha Reporte -->
                                        <td class="small text-secondary">
                                            <?php echo date('d/m/Y H:i', strtotime($ticket['created_at'])); ?>
                                        </td>
                                        
                                        <!-- Acciones -->
                                        <td class="text-end">
                                            <a href="ver_ticket.php?id=<?php echo $ticket['id']; ?>" class="btn btn-tech-outline btn-sm">
                                                <i class="bi bi-pencil-square me-1"></i>Gestionar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light text-center py-4 border">
                        <i class="bi bi-emoji-smile display-6 text-muted mb-2"></i>
                        <p class="text-secondary mb-0">¡Increíble! No hay incidencias pendientes registradas en el sistema.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- PESTAÑA 2: GESTIÓN DE PROYECTOS (PMO) -->
        <div class="tab-pane fade" id="proyectos-panel" role="tabpanel" aria-labelledby="proyectos-tab">
            <div class="card card-custom p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <h3 class="h5 mb-0 fw-bold">Cartera de Proyectos Tecnológicos</h3>
                    <span class="badge bg-secondary py-2 px-3"><?php echo mysqli_num_rows($resultado_proyectos); ?> Proyectos Totales</span>
                </div>

                <?php if (mysqli_num_rows($resultado_proyectos) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle border-top">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente Propietario</th>
                                    <th>Proyecto</th>
                                    <th>Estado de la PMO</th>
                                    <th>Avance General</th>
                                    <th>Fecha Planificada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($proyecto = mysqli_fetch_assoc($resultado_proyectos)): ?>
                                    <tr>
                                        <!-- ID -->
                                        <td class="fw-bold">#PROY-<?php echo $proyecto['id']; ?></td>
                                        
                                        <!-- Cliente -->
                                        <td>
                                            <div class="fw-semibold text-dark"><?php echo htmlspecialchars($proyecto['cliente_nombre']); ?></div>
                                            <span class="text-muted small">Cliente Corporativo</span>
                                        </td>
                                        
                                        <!-- Proyecto y Descripción corta -->
                                        <td>
                                            <div class="text-dark fw-medium"><?php echo htmlspecialchars($proyecto['nombre']); ?></div>
                                            <div class="text-muted small" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <?php echo htmlspecialchars($proyecto['descripcion']); ?>
                                            </div>
                                        </td>
                                        
                                        <!-- Estado -->
                                        <td>
                                            <?php 
                                            $p_est_clase = 'bg-secondary';
                                            if ($proyecto['estado'] === 'Planificacion') $p_est_clase = 'bg-secondary';
                                            elseif ($proyecto['estado'] === 'En Desarrollo') $p_est_clase = 'bg-primary';
                                            elseif ($proyecto['estado'] === 'Pruebas') $p_est_clase = 'bg-warning text-dark';
                                            elseif ($proyecto['estado'] === 'Completado') $p_est_clase = 'bg-success';
                                            ?>
                                            <span class="badge <?php echo $p_est_clase; ?>"><?php echo $proyecto['estado']; ?></span>
                                        </td>
                                        
                                        <!-- Barra de Progreso -->
                                        <td style="width: 200px;">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="progress flex-grow-1" style="height: 8px;">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $proyecto['progreso']; ?>%" aria-valuenow="<?php echo $proyecto['progreso']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="small fw-semibold text-dark"><?php echo $proyecto['progreso']; ?>%</span>
                                            </div>
                                        </td>
                                        
                                        <!-- Fechas -->
                                        <td class="small text-secondary">
                                            <span class="d-block">Del <strong><?php echo date('d/m/Y', strtotime($proyecto['fecha_inicio'])); ?></strong></span>
                                            <span class="d-block">Al <strong><?php echo $proyecto['fecha_fin'] ? date('d/m/Y', strtotime($proyecto['fecha_fin'])) : 'Indefinido'; ?></strong></span>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light text-center py-4 border mb-0">
                        <i class="bi bi-kanban display-6 text-muted mb-2"></i>
                        <p class="text-secondary mb-0">No se ha registrado ningún proyecto de desarrollo activo en la PMO.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</div>

<?php
// Incluimos el pie de página
include 'footer.php';
?>
