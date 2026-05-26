<?php
/**
 * ====================================================================
 * CABECERA GENERAL DE LA APLICACIÓN (DINÁMICA Y RESPONSIVA)
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Este archivo unifica el diseño visual base (Bootstrap 5) y controla
 * el inicio de sesión del usuario. Se incluye en todas las páginas.
 */

// Iniciamos la sesión para poder acceder a los datos del usuario conectado ($_SESSION)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFlow Solutions - Consultoría IT & PMO</title>
    <!-- 1. Bootstrap 5 CSS desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Para asegurar la carga si el CDN anterior tiene algún problema con la ruta interna, usamos la CDN oficial estándar de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 2. Bootstrap Icons desde CDN para la iconografía premium -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts - Inter & Outfit para una tipografía ultra profesional -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- 3. Estilos Personalizados Inline para el Toque Premium (Paleta Azul/Gris Consultora Madura) -->
    <style>
        :root {
            --azul-oscuro: #0A192F;      /* Fondo corporativo principal */
            --azul-slate: #172A45;       /* Fondo de tarjetas y elementos secundarios */
            --azul-brillante: #00B4D8;   /* Acentuados, enlaces y botones activos */
            --gris-fondo: #F4F6F9;       /* Fondo general claro de la app */
            --gris-texto: #4A5568;       /* Texto descriptivo */
            --blanco-puro: #FFFFFF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gris-fondo);
            color: var(--azul-oscuro);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
        }

        /* Navbar Estilo Premium */
        .navbar-custom {
            background-color: var(--azul-oscuro);
            border-bottom: 2px solid var(--azul-brillante);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .navbar-brand {
            color: var(--blanco-puro);
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }

        .navbar-custom .navbar-brand span {
            color: var(--azul-brillante);
        }

        .navbar-custom .nav-link {
            color: #CCD6F6;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar-custom .nav-link:hover, 
        .navbar-custom .nav-link.active {
            color: var(--azul-brillante);
            transform: translateY(-1px);
        }

        /* Botones Personalizados */
        .btn-tech-primary {
            background-color: var(--azul-brillante);
            color: var(--azul-oscuro);
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-tech-primary:hover {
            background-color: #0077B6;
            color: var(--blanco-puro);
            box-shadow: 0 4px 12px rgba(0, 180, 216, 0.3);
            transform: translateY(-2px);
        }

        .btn-tech-outline {
            border: 1px solid var(--azul-brillante);
            color: var(--azul-brillante);
            background-color: transparent;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-tech-outline:hover {
            background-color: var(--azul-brillante);
            color: var(--azul-oscuro);
            transform: translateY(-2px);
        }

        /* Tarjetas Premium */
        .card-custom {
            background: var(--blanco-puro);
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(10, 25, 47, 0.1);
        }

        /* Footer siempre abajo */
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- NAVBAR NAVEGACIÓN PRINCIPAL -->
    <nav class="navbar navbar-expand-lg navbar-custom navbar-dark py-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-cpu-fill me-2 text-info"></i>TechFlow<span>Solutions</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTechFlow" aria-controls="navbarTechFlow" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarTechFlow">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bi bi-house-door me-1"></i>Inicio</a>
                    </li>
                    
                    <!-- MENU DINÁMICO SEGÚN ROL DE SESIÓN -->
                    <?php if (!isset($_SESSION['usuario_id'])): ?>
                        <!-- Si el usuario NO ha iniciado sesión -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#servicios"><i class="bi bi-gear me-1"></i>Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php#contacto"><i class="bi bi-envelope me-1"></i>Contacto</a>
                        </li>
                        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                            <a class="btn btn-tech-primary px-4" href="login.php">
                                <i class="bi bi-person-workspace me-2"></i>Portal de Soporte
                            </a>
                        </li>
                    <?php else: ?>
                        <!-- Si el usuario SÍ ha iniciado sesión -->
                        <?php if ($_SESSION['rol'] === 'cliente'): ?>
                            <!-- Enlaces específicos para el Cliente -->
                            <li class="nav-item">
                                <a class="nav-link" href="panel_cliente.php"><i class="bi bi-kanban me-1"></i>Mis Proyectos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="crear_ticket.php"><i class="bi bi-plus-circle me-1"></i>Crear Ticket</a>
                            </li>
                        <?php elseif ($_SESSION['rol'] === 'tecnico' || $_SESSION['rol'] === 'pmo'): ?>
                            <!-- Enlaces específicos para el Técnico / PMO -->
                            <li class="nav-item">
                                <a class="nav-link" href="panel_pmo.php"><i class="bi bi-speedometer2 me-1"></i>Panel de Control</a>
                            </li>
                        <?php endif; ?>
                        
                        <!-- Sección común de perfil conectado -->
                        <li class="nav-item dropdown ms-lg-3 mt-2 mt-lg-0">
                            <a class="nav-link dropdown-toggle bg-dark-subtle text-white px-3 py-2 rounded-pill d-inline-block border border-info" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle text-info me-1"></i>
                                <?php echo htmlspecialchars($_SESSION['nombre']); ?> 
                                <span class="badge bg-info text-dark ms-1"><?php echo strtoupper($_SESSION['rol']); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="navbarDropdownUser">
                                <li><a class="dropdown-item py-2" href="<?php echo ($_SESSION['rol'] === 'cliente') ? 'panel_cliente.php' : 'panel_pmo.php'; ?>"><i class="bi bi-layout-text-sidebar-reverse me-2 text-primary"></i>Mi Panel</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger py-2" href="logout.php">
                                        <i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenedor principal de la app que se cierra en el footer -->
    <main class="py-4 flex-grow-1">
