<?php
/**
 * ====================================================================
 * SCRIPT DE CIERRE DE SESIÓN - LOGOUT.PHP
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Este script se encarga de destruir de forma segura todas las variables
 * almacenadas en la sesión ($_SESSION) y redirigir al portal público.
 */

// 1. Iniciamos sesión si no está iniciada ya
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Vaciamos el array de sesión
$_SESSION = array();

// 3. Si se desea destruir la cookie de sesión (opcional pero recomendado por seguridad)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), 
        '', 
        time() - 42000,
        $params["path"], 
        $params["domain"],
        $params["secure"], 
        $params["httponly"]
    );
}

// 4. Destruimos la sesión en el servidor
session_destroy();

// 5. Redireccionamos a la página de inicio pública
header("Location: index.php");
exit; // Aseguramos que no se ejecute código posterior
?>
