-- ====================================================================
-- SCRIPT DE CREACIÓN DE LA BASE DE DATOS - TECHFLOW SOLUTIONS
-- Proyecto Final de Grado Medio de SMR (Sistemas Microinformáticos y Redes)
-- ====================================================================
-- Este script crea la base de datos 'techflow_db' e inserta datos semilla.
-- Está estructurado de manera limpia y autodocumentada para facilitar
-- la defensa oral y cumplir con la rúbrica de bases de datos del proyecto.

-- 1. CREACIÓN DE LA BASE DE DATOS (Si no existe)
CREATE DATABASE IF NOT EXISTS `techflow_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `techflow_db`;

-- Limpieza preventiva de tablas por si ya existen en el entorno de desarrollo
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `comentarios_tickets`;
DROP TABLE IF EXISTS `tickets`;
DROP TABLE IF EXISTS `proyectos`;
DROP TABLE IF EXISTS `usuarios`;
SET FOREIGN_KEY_CHECKS = 1;

-- 2. TABLA DE USUARIOS
-- Almacena los clientes, técnicos de soporte y los gestores de proyectos (PMO)
CREATE TABLE `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL COMMENT 'Nombre completo del usuario',
  `email` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Correo electrónico que sirve como login',
  `password` VARCHAR(255) NOT NULL COMMENT 'Contraseña cifrada mediante password_hash() con bcrypt',
  `rol` ENUM('cliente', 'tecnico', 'pmo') NOT NULL COMMENT 'Rol del usuario: cliente, tecnico de soporte o gestor PMO',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de registro en la base de datos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. TABLA DE PROYECTOS (Módulo PMO/Gestión de Proyectos)
-- Vincula proyectos informáticos con los clientes que los han contratado
CREATE TABLE `proyectos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(150) NOT NULL COMMENT 'Nombre del proyecto tecnológico',
  `descripcion` TEXT NOT NULL COMMENT 'Descripción y alcance del proyecto',
  `cliente_id` INT NOT NULL COMMENT 'ID del cliente propietario del proyecto',
  `estado` ENUM('Planificacion', 'En Desarrollo', 'Pruebas', 'Completado') NOT NULL DEFAULT 'Planificacion' COMMENT 'Fase de la PMO',
  `progreso` INT NOT NULL DEFAULT 0 COMMENT 'Porcentaje de progreso (0 a 100)',
  `fecha_inicio` DATE NOT NULL COMMENT 'Fecha planificada de inicio',
  `fecha_fin` DATE DEFAULT NULL COMMENT 'Fecha de finalización prevista',
  FOREIGN KEY (`cliente_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. TABLA DE TICKETS (Módulo de Soporte IT)
-- Permite que los clientes registren incidencias o peticiones de soporte
CREATE TABLE `tickets` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `titulo` VARCHAR(150) NOT NULL COMMENT 'Breve título indicando el problema',
  `descripcion` TEXT NOT NULL COMMENT 'Detalles completos de la incidencia informática',
  `cliente_id` INT NOT NULL COMMENT 'Cliente que abre el ticket',
  `tecnico_id` INT DEFAULT NULL COMMENT 'Técnico asignado para resolver el ticket',
  `categoria` ENUM('Soporte Tecnico', 'Gestion de Proyectos', 'Infraestructura') NOT NULL DEFAULT 'Soporte Tecnico' COMMENT 'Categoría de la consulta',
  `gravedad` ENUM('Baja', 'Media', 'Alta', 'Critica') NOT NULL DEFAULT 'Baja' COMMENT 'Nivel de urgencia',
  `estado` ENUM('Abierto', 'En Proceso', 'Resuelto', 'Cerrado') NOT NULL DEFAULT 'Abierto' COMMENT 'Estado del flujo del soporte',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`cliente_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`tecnico_id`) REFERENCES `usuarios`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. TABLA DE COMENTARIOS DE TICKETS
-- Almacena el historial de conversación (chat) entre el cliente y el soporte/PMO
CREATE TABLE `comentarios_tickets` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `ticket_id` INT NOT NULL COMMENT 'Ticket al que pertenece la respuesta',
  `usuario_id` INT NOT NULL COMMENT 'Usuario que escribe el comentario (cliente o técnico/PMO)',
  `comentario` TEXT NOT NULL COMMENT 'Texto del mensaje',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`ticket_id`) REFERENCES `tickets`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Contraseña común para todos los usuarios de prueba: "password"
-- Hash de bcrypt estándar verificado para "password":
-- '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
-- ====================================================================

-- Insertar Usuarios de Prueba (Roles: PMO, Técnico, Cliente)
INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'Sofía PMO (Gestora)', 'pmo@techflow.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pmo'),
(2, 'Carlos Técnico (Soporte)', 'tecnico@techflow.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tecnico'),
(3, 'Juan Gomez (Cliente de TechFlow)', 'cliente@techflow.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cliente');

-- Insertar Proyectos de Prueba para el Cliente Juan Gomez
INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `cliente_id`, `estado`, `progreso`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 'Migración de Servidores Cloud', 'Migración completa de la infraestructura local de oficinas a la nube privada de TechFlow en AWS.', 3, 'En Desarrollo', 65, '2026-05-10', '2026-06-15'),
(2, 'Implementación de ERP Corporativo', 'Instalación, configuración y puesta en marcha del software de gestión y planificación de recursos.', 3, 'Planificacion', 10, '2026-06-01', '2026-09-30');

-- Insertar Incidencias/Tickets de Prueba
INSERT INTO `tickets` (`id`, `titulo`, `descripcion`, `cliente_id`, `tecnico_id`, `categoria`, `gravedad`, `estado`, `created_at`) VALUES
(1, 'Error de acceso al servidor VPN', 'No puedo conectarme a la VPN de la empresa desde el cliente de escritorio. Me da un error de timeout al validar las credenciales.', 3, 2, 'Infraestructura', 'Alta', 'En Proceso', '2026-05-25 10:00:00'),
(2, 'Revisión de avance del proyecto ERP', 'Solicitamos una reunión rápida con el gestor PMO para aclarar los plazos de la fase de análisis del ERP.', 3, NULL, 'Gestion de Proyectos', 'Baja', 'Abierto', '2026-05-26 15:30:00');

-- Insertar Comentarios en las Incidencias (Historial)
INSERT INTO `comentarios_tickets` (`id`, `ticket_id`, `usuario_id`, `comentario`, `created_at`) VALUES
(1, 1, 3, 'Hola, he intentado conectarme desde dos redes WiFi distintas y el fallo persiste. Agradezco vuestra ayuda.', '2026-05-25 10:05:00'),
(2, 1, 2, 'Hola Juan. Estamos revisando los logs del concentrador VPN. Parece que hay un bloqueo en tu rango de IPs externas de tu proveedor de Internet. Estamos en ello.', '2026-05-25 11:20:00');
