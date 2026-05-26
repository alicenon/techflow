<?php
/**
 * ====================================================================
 * ARCHIVO DE CONEXIÓN A LA BASE DE DATOS (ESTILO PROCEDIMENTAL)
 * Proyecto Final SMR - TechFlow Solutions
 * ====================================================================
 * Este script establece la comunicación con el servidor MySQL.
 * Se utiliza la API mysqli de manera procedimental (funciones mysqli_*),
 * tal como se requiere en el nivel académico de Grado Medio de SMR.
 */

// 1. CONFIGURACIÓN DE LOS PARÁMETROS DE CONEXIÓN
// En servidores locales (como XAMPP o WampServer en Windows), los valores por defecto son:
$servidor   = "localhost";    // El servidor MySQL suele estar en el mismo equipo (local)
$usuario    = "root";         // Usuario administrador por defecto en XAMPP
$contrasena = "";             // Contraseña en blanco por defecto en XAMPP
$base_datos = "techflow_db";  // Nombre de la base de datos creada en el script SQL

// 2. CONEXIÓN AL MOTOR DE BASE DE DATOS MYSQL
// La función mysqli_connect abre una nueva conexión con el servidor MySQL
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// 3. CONTROL DE ERRORES DE CONEXIÓN
// Si la conexión falla, mysqli_connect devuelve 'false'. Lo evaluamos:
if (!$conexion) {
    // Si falla, detenemos la ejecución de la página con die() y mostramos el error
    die("Error crítico: No se ha podido conectar a MySQL. Detalle: " . mysqli_connect_error());
}

// 4. CONFIGURACIÓN DEL JUEGO DE CARACTERES UTF-8
// Obligamos a que la comunicación con la base de datos use codificación UTF-8.
// Esto evita problemas con acentos, eñes y caracteres especiales en español.
mysqli_set_charset($conexion, "utf8mb4");

// Opcional: A partir de este momento, cualquier página que incluya 'conexion.php' 
// mediante 'include' o 'require' dispondrá de la variable global '$conexion' 
// lista para realizar consultas SQL (mysqli_query).
?>
