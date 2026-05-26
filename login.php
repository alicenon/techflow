<?php
/**
 * ====================================================================
 * CONTROL DE ACCESO - LOGIN.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Este script gestiona la autenticación de usuarios de forma segura.
 * Utiliza sesiones de PHP y consultas procedimentales con mysqli.
 * Las contraseñas se verifican con password_verify() (estándar seguro).
 */

// 1. Iniciamos sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario ya está logueado, lo redirigimos a su panel correspondiente para evitar doble login
if (isset($_SESSION['usuario_id'])) {
    if ($_SESSION['rol'] === 'cliente') {
        header("Location: panel_cliente.php");
        exit;
    } else {
        header("Location: panel_pmo.php");
        exit;
    }
}

// Incluimos la conexión a la base de datos
require_once 'conexion.php';

$error_mensaje = "";

// 2. Procesamos el formulario al hacer POST
if (isset($_POST['iniciar_sesion'])) {
    // Sanitizamos los datos de entrada para evitar inyección XSS básica
    $email = mysqli_real_escape_string($conexion, trim($_POST['email']));
    $password = trim($_POST['password']);
    
    if (empty($email) || empty($password)) {
        $error_mensaje = "Por favor, completa todos los campos.";
    } else {
        // 3. Consulta SQL para buscar al usuario por su email
        // El email es UNIQUE en la base de datos
        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $resultado = mysqli_query($conexion, $sql);
        
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtenemos los datos del usuario como un array asociativo
            $usuario = mysqli_fetch_assoc($resultado);
            
            // 4. Verificación de la contraseña cifrada
            // password_verify compara la contraseña plana con el hash guardado en la BD
            if (password_verify($password, $usuario['password'])) {
                // Autenticación correcta: registramos datos en la sesión
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre']     = $usuario['nombre'];
                $_SESSION['email']      = $usuario['email'];
                $_SESSION['rol']        = $usuario['rol'];
                
                // 5. Redirección inteligente según el rol del usuario conectado
                if ($usuario['rol'] === 'cliente') {
                    header("Location: panel_cliente.php");
                } else {
                    // Tanto 'tecnico' como 'pmo' acceden al panel de control global
                    header("Location: panel_pmo.php");
                }
                exit; // Detenemos la ejecución del script actual
            } else {
                $error_mensaje = "La contraseña introducida es incorrecta.";
            }
        } else {
            $error_mensaje = "No existe ninguna cuenta asociada a este correo electrónico.";
        }
    }
}

// Incluimos la cabecera común
include 'header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <!-- Logotipo centralizado sobre la tarjeta -->
            <div class="text-center mb-4">
                <a href="index.php" class="text-decoration-none text-dark display-6 fw-bold">
                    <i class="bi bi-cpu-fill text-info me-2"></i>TechFlow<span class="text-info">Solutions</span>
                </a>
                <p class="text-muted small mt-2">Acceso seguro al Portal de Clientes y Soporte IT</p>
            </div>
            
            <!-- Tarjeta de Login Premium -->
            <div class="card card-custom p-4">
                <h3 class="h5 text-center fw-bold mb-4">Área de Clientes y Personal</h3>
                
                <?php if (!empty($error_mensaje)): ?>
                    <!-- Alerta de Error si fallan las credenciales -->
                    <div class="alert alert-danger d-flex align-items-center mb-4 py-2" role="alert">
                        <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>
                        <div class="small">
                            <?php echo $error_mensaje; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    
                    <!-- Campo Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-medium">Dirección de Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-envelope text-secondary"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                    </div>
                    
                    <!-- Campo Contraseña -->
                    <div class="mb-4">
                        <label for="password" class="form-label small fw-medium">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-lock text-secondary"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu contraseña" required>
                        </div>
                    </div>
                    
                    <!-- Botón de Envío -->
                    <button type="submit" name="iniciar_sesion" class="btn btn-tech-primary w-100 py-2 mb-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                    </button>
                    
                    <a href="index.php" class="btn btn-outline-secondary w-100 py-2 small">
                        <i class="bi bi-arrow-left me-2"></i>Volver al Inicio Público
                    </a>
                </form>
            </div>
            
            <!-- Tarjeta informativa con las credenciales de prueba pre-cargadas para la defensa del tribunal -->
            <div class="card mt-4 bg-light border-0 shadow-sm">
                <div class="card-body p-3">
                    <h6 class="card-title text-dark small fw-bold mb-2"><i class="bi bi-info-circle text-info me-2"></i>Credenciales de Prueba (Examen)</h6>
                    <p class="card-text text-muted mb-0" style="font-size: 0.8rem;">
                        Para facilitar la evaluación presencial del proyecto final, puedes acceder con los siguientes perfiles (Contraseña común: <strong>password</strong>):
                    </p>
                    <hr class="my-2 bg-secondary opacity-25">
                    <ul class="list-unstyled mb-0 text-muted" style="font-size: 0.8rem;">
                        <li class="mb-1"><i class="bi bi-chevron-right text-info"></i><strong>Cliente:</strong> <code>cliente@techflow.com</code></li>
                        <li class="mb-1"><i class="bi bi-chevron-right text-info"></i><strong>Técnico:</strong> <code>tecnico@techflow.com</code></li>
                        <li><i class="bi bi-chevron-right text-info"></i><strong>PMO / Admin:</strong> <code>pmo@techflow.com</code></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
// Incluimos el pie de página
include 'footer.php';
?>
