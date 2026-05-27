# MEMORIA DEL PROYECTO FINAL
## Grado Medio en Sistemas Microinformáticos y Redes (SMR)
### Departamento de Informática y Comunicaciones (IFC)

---

## PORTADA

| Campo | Detalle |
|-------|---------|
| **Título del Proyecto** | Plataforma Web Integrada de Gestión de Incidencias y Proyectos TechFlow Solutions |
| **Alumna** | Shannon |
| **Ciclo Formativo** | Técnico en Sistemas Microinformáticos y Redes (GM SMR) |
| **Modalidad** | FP Dual Intensiva |
| **Curso Académico** | 2025 - 2026 |
| **Empresa co-formadora** | TechFlow Solutions (ficticia) |
| **Perfil profesional** | Soporte IT Nivel 1 → PMO Junior (promoción interna) |
| **Tecnologías empleadas** | PHP Procedimental, MySQL / MariaDB, Bootstrap 5, HTML5, Apache (XAMPP) |
| **Entorno de despliegue** | Servidor local XAMPP sobre Windows 10/11 |

---

## ÍNDICE GENERAL

1. [Introducción](#1-introducción)
2. [Requisitos del Sistema](#2-requisitos-del-sistema)
3. [Diseño](#3-diseño)
4. [Implementación](#4-implementación)
5. [Pruebas](#5-pruebas)
6. [Explotación](#6-explotación)
7. [Definición de Procedimientos de Control y Evaluación](#7-definición-de-procedimientos-de-control-y-evaluación)
8. [Conclusiones](#8-conclusiones)
9. [Fuentes](#9-fuentes)
10. [Anexos](#10-anexos)

---

## 1. INTRODUCCIÓN

### 1.1. Contexto Académico y Profesional

El presente trabajo constituye el proyecto final para la obtención del título de **Técnico en Sistemas Microinformáticos y Redes (SMR)** en el marco de la Formación Profesional española. El proyecto ha sido desarrollado bajo la modalidad de **FP Dual Intensiva**, que permite a la alumna integrarse de forma activa en el entorno empresarial real durante su periodo de formación.

Durante su estancia en la empresa co-formadora, la alumna experimentó una trayectoria de crecimiento notable: comenzó prestando funciones de **Soporte IT Nivel 1** (atención de incidencias de hardware, software y redes básicas) y, gracias a su rendimiento y capacidad organizativa, fue promocionada internamente a tareas de apoyo a la **Oficina de Gestión de Proyectos (PMO)**.

Esta experiencia dual ha inspirado directamente el tema del proyecto: construir una herramienta que fusione ambos mundos en un único sistema web integrado.

### 1.2. Descripción del Proyecto

**TechFlow Solutions** es una consultora tecnológica ficticia. El proyecto consiste en el diseño, desarrollo y despliegue de su plataforma web corporativa: un sistema interactivo que integra en un único portal digital la gestión de proyectos PMO y el sistema de soporte técnico IT mediante tickets de incidencias.

### 1.3. Justificación de la Temática

En las consultorías tecnológicas de tamaño medio, existe frecuentemente una brecha operativa entre dos departamentos clave:

- **Soporte Técnico (Sistemas y Redes):** Centrado en la resolución inmediata de incidencias del día a día.
- **PMO (Gestión de Proyectos):** Centrado en la planificación estratégica y ejecución de proyectos a medio y largo plazo.

Esta desconexión provoca ineficiencias: incidencias críticas de soporte que derivan en realidad de problemas estructurales que requieren una acción planificada desde la PMO. La plataforma TechFlow Solutions resuelve este problema unificando ambas realidades en un único ecosistema digital.

### 1.4. Análisis de la Competencia (Estudio de Mercado)

Para justificar la viabilidad y valor diferencial del proyecto, se ha realizado una investigación de las soluciones comerciales dominantes:

| Solución | Puntos Fuertes | Debilidades detectadas |
|----------|---------------|----------------------|
| **Jira Service Management (Atlassian)** | Integración soporte + proyectos muy completa | Coste de licencias prohibitivo para PYMEs; curva de aprendizaje muy elevada |
| **Zendesk / Freshdesk** | Excelente usabilidad en gestión de tickets | Sin módulo PMO nativo; requiere integraciones de pago con terceros |
| **Trello / Asana / Monday** | Planificación PMO ágil y visual | Completamente desconectados del canal de incidencias técnicas |

**Valor diferencial de TechFlow Solutions:** Plataforma autohospedada (*on-premise*), sin costes de licencia, diseñada para servidores locales modestos (XAMPP/Apache). Unifica en un único modelo de datos relacional la supervisión de proyectos y la gestión interactiva de incidencias técnicas.

### 1.5. Competencias Profesionales del Título SMR Aplicadas

El desarrollo del proyecto ha puesto en práctica las siguientes competencias del currículo oficial (Real Decreto 1691/2007):

- **Instalación y Configuración de Software de Aplicación:** Puesta en marcha y optimización del servidor XAMPP (Apache, MariaDB, PHP).
- **Gestión de Bases de Datos Relacionales:** Diseño lógico/físico de tablas, claves primarias, foráneas e importación de scripts SQL.
- **Puesta en Servicio de Servicios en Red:** Simulación de despliegue del portal en red local y análisis de incidencias de servidor VPN corporativo.
- **Seguridad Informática y Control de Accesos:** Control de acceso por roles, validación de sesiones PHP y cifrado de contraseñas con Bcrypt.
- **Soporte Técnico y Atención al Usuario:** Diseño del buzón de incidencias e interfaz de chat interactivo (*Help Desk*).

---

## 2. REQUISITOS DEL SISTEMA

Una vez acordado el alcance del proyecto con el cliente (representado por la empresa co-formadora ficticia), se establecen por escrito los requisitos funcionales y no funcionales que el sistema debe cumplir.

### 2.1. Requisitos Funcionales

Determinan qué tareas tiene que realizar el sistema. El sistema se articula en torno a tres perfiles de usuario con permisos diferenciados:

#### A) Módulo Público (Visitantes no registrados)
- El sistema debe mostrar una página corporativa principal (`index.php`) con información de servicios.
- El sistema debe ofrecer un formulario de contacto que valide los campos obligatorios.
- El sistema debe permitir el acceso al portal de login desde cualquier punto de la web.

#### B) Módulo de Cliente (Usuarios con rol `cliente`)
- El sistema debe autenticar al cliente y redirigirle a su panel privado personalizado.
- El sistema debe mostrar en tiempo real los proyectos contratados con nombre, descripción, estado y porcentaje de progreso.
- El sistema debe mostrar el historial de incidencias del cliente con su estado.
- El sistema debe permitir al cliente crear nuevos tickets de soporte especificando título, categoría, gravedad y descripción.
- El sistema debe permitir al cliente seguir el chat de comentarios de cada incidencia y añadir réplicas.

#### C) Módulo de Personal (Usuarios con rol `tecnico` o `pmo`)
- El sistema debe ofrecer un panel de control administrativo con KPIs estadísticos en tiempo real.
- El sistema debe mostrar en el buzón de tickets el listado global de todas las incidencias de todos los clientes.
- El sistema debe permitir al personal asignar un técnico responsable a cada ticket.
- El sistema debe permitir al personal actualizar el estado del ticket (Abierto → En Proceso → Resuelto → Cerrado).
- El sistema debe permitir al personal responder al cliente en el chat de seguimiento.
- El sistema debe mostrar la cartera completa de proyectos corporativos en desarrollo.

### 2.2. Requisitos No Funcionales

Son las propiedades o cualidades que el sistema debe cumplir:

- **Seguridad en Contraseñas:** Las contraseñas no se almacenan en texto plano. Se guardan cifradas en base de datos mediante el algoritmo de hash unidireccional **Bcrypt** (`password_hash()` / `password_verify()`).
- **Seguridad de Acceso (Sesiones):** Los recursos privados están protegidos mediante variables de sesión PHP. El acceso directo por URL a páginas privadas sin sesión activa redirige automáticamente al login.
- **Diseño Adaptativo (Responsive):** La interfaz es 100% responsive mediante el sistema de rejilla de Bootstrap 5, adaptándose sin descuadres a escritorio, tableta y móvil.
- **Codificación Internacional UTF-8:** Configuración explícita del juego de caracteres UTF-8 en HTML, PHP y MySQL para garantizar la correcta visualización de caracteres del español.
- **Tiempo de respuesta:** Las páginas deben cargar en menos de 2 segundos en un entorno local con XAMPP estándar.
- **Diseño atractivo y profesional:** La interfaz debe proyectar una imagen corporativa seria y moderna, acorde a una consultora tecnológica real.

### 2.3. Recursos de Hardware y Software Empleados

#### Hardware (Equipo de Desarrollo)
- Procesador: Intel Core i5 / AMD Ryzen 5 o superior
- Memoria RAM: 8 GB o 16 GB DDR4
- Almacenamiento: SSD de alta velocidad (para agilizar la carga del servidor Apache local)
- Monitor Full HD (1920×1080) para edición de código con doble pantalla

#### Software
| Software | Versión | Función en el Proyecto |
|----------|---------|----------------------|
| **XAMPP** | 8.2 | Entorno servidor local (Apache + MariaDB + PHP) |
| **Visual Studio Code** | Última | Editor de código con extensiones HTML/PHP |
| **phpMyAdmin** | Incluido en XAMPP | Gestión visual de la base de datos |
| **Google Chrome / Edge** | Última | Navegador de pruebas con DevTools para depuración CSS/DOM |
| **Git + GitHub** | Última | Control de versiones y repositorio del proyecto |
| **Windows 10/11** | 64 bits | Sistema operativo del equipo de desarrollo y despliegue |

---

## 3. DISEÑO

En esta fase se realiza la aproximación al diseño tecnológico de la solución, describiendo cómo se desarrollará cada uno de los requisitos.

### 3.1. Arquitectura de la Aplicación

La plataforma sigue una arquitectura clásica de **tres capas**:

```
┌─────────────────────────────────────────────────────────────┐
│                  CAPA DE PRESENTACIÓN                        │
│          Navegador Web (HTML5 + Bootstrap 5 + CSS)           │
└─────────────────────────┬───────────────────────────────────┘
                           │ Petición HTTP (Puerto 80/TCP)
┌─────────────────────────▼───────────────────────────────────┐
│               CAPA DE LÓGICA DE NEGOCIO                      │
│         Servidor Apache + Intérprete PHP 8.2                 │
│   (header.php, index.php, login.php, panel_*.php,            │
│    crear_ticket.php, ver_ticket.php, logout.php)             │
└─────────────────────────┬───────────────────────────────────┘
                           │ Consulta MySQL (Puerto 3306/TCP)
┌─────────────────────────▼───────────────────────────────────┐
│                  CAPA DE DATOS                               │
│         Motor de Base de Datos MariaDB / MySQL               │
│                  Base de datos: techflow_db                  │
└─────────────────────────────────────────────────────────────┘
```

### 3.2. Estructura de la Aplicación (Árbol de Archivos)

```
techflowsolution/
│
├── conexion.php          → Conector procedimental a la BD (mysqli)
├── header.php            → Cabecera HTML dinámica común (Bootstrap 5 + nav por roles)
├── footer.php            → Pie de página corporativo común
│
├── index.php             → Página corporativa pública (sin autenticación)
├── login.php             → Formulario de autenticación + lógica de sesiones
├── logout.php            → Destrucción segura de la sesión activa
│
├── panel_cliente.php     → Panel privado del cliente (proyectos + tickets propios)
├── crear_ticket.php      → Formulario de alta de nueva incidencia de soporte
├── panel_pmo.php         → Cuadro de mando del personal (KPIs + tabla global)
├── ver_ticket.php        → Vista de detalle y chat de seguimiento de ticket
│
├── database.sql          → Script SQL de creación e inicialización de la BD
│
└── imagenes-tfg/
    ├── inicio_corporativo.png
    ├── portal_login.png
    ├── panel_cliente.png
    └── cuadro_mando_pmo.png
```

### 3.3. Diseño de la Base de Datos

#### 3.3.1. Modelo Entidad-Relación

La base de datos **techflow_db** ha sido diseñada con un esquema relacional normalizado hasta la **3ª Forma Normal (3FN)**, garantizando la integridad referencial mediante claves foráneas (motor InnoDB de MariaDB).

![Figura 5 - Modelo Entidad-Relación de la Base de Datos](modelo_er.png)

*Figura 5. Diagrama del Modelo Entidad-Relación de la base de datos techflow_db. Se muestran las 4 tablas relacionales: usuarios, proyectos, tickets y comentarios_tickets, con sus claves primarias (PK) y foráneas (FK).*

**Relaciones del modelo:**

- **usuarios → proyectos** (1:N): Un cliente puede tener varios proyectos contratados.
- **usuarios → tickets** (1:N × 2): Un cliente puede tener varios tickets. Un técnico puede tener varios tickets asignados.
- **tickets → comentarios_tickets** (1:N): Un ticket puede contener múltiples comentarios de seguimiento.

#### 3.3.2. Diccionario de Datos (Estructura de Tablas)

**Tabla A: `usuarios`**

| Campo | Tipo de Dato | Nulo | Clave | Predeterminado | Descripción |
|-------|-------------|:----:|:-----:|:--------------:|-------------|
| `id` | `INT` UNSIGNED | No | PK | Auto-incremental | ID único del usuario |
| `nombre` | `VARCHAR(100)` | No | | | Nombre y apellidos |
| `email` | `VARCHAR(100)` | No | UNIQUE | | Correo electrónico (login) |
| `password` | `VARCHAR(255)` | No | | | Hash Bcrypt de la contraseña |
| `rol` | `ENUM('cliente','tecnico','pmo')` | No | | | Rol de permisos en el sistema |
| `created_at` | `TIMESTAMP` | No | | `CURRENT_TIMESTAMP` | Fecha de registro |

**Tabla B: `proyectos`**

| Campo | Tipo de Dato | Nulo | Clave | Predeterminado | Descripción |
|-------|-------------|:----:|:-----:|:--------------:|-------------|
| `id` | `INT` UNSIGNED | No | PK | Auto-incremental | ID único del proyecto |
| `nombre` | `VARCHAR(150)` | No | | | Nombre comercial del proyecto |
| `descripcion` | `TEXT` | No | | | Alcance y objetivos |
| `cliente_id` | `INT` UNSIGNED | No | FK | | Ref. a `usuarios.id` |
| `estado` | `ENUM(...)` | No | | `'Planificacion'` | Fase del ciclo de vida PMO |
| `progreso` | `INT` | No | | `0` | Porcentaje de avance (0-100) |
| `fecha_inicio` | `DATE` | No | | | Fecha de inicio planificada |
| `fecha_fin` | `DATE` | Sí | | `NULL` | Fecha estimada de finalización |

**Tabla C: `tickets`**

| Campo | Tipo de Dato | Nulo | Clave | Predeterminado | Descripción |
|-------|-------------|:----:|:-----:|:--------------:|-------------|
| `id` | `INT` UNSIGNED | No | PK | Auto-incremental | ID del ticket de soporte |
| `titulo` | `VARCHAR(150)` | No | | | Breve descripción del fallo |
| `descripcion` | `TEXT` | No | | | Explicación completa |
| `cliente_id` | `INT` UNSIGNED | No | FK | | Ref. a `usuarios.id` |
| `tecnico_id` | `INT` UNSIGNED | Sí | FK | `NULL` | Ref. a `usuarios.id` (técnico) |
| `categoria` | `ENUM(...)` | No | | `'Soporte Tecnico'` | Categoría para escalado |
| `gravedad` | `ENUM('Baja','Media','Alta','Critica')` | No | | `'Baja'` | Urgencia/impacto en negocio |
| `estado` | `ENUM('Abierto','En Proceso','Resuelto','Cerrado')` | No | | `'Abierto'` | Ciclo de vida del ticket |
| `created_at` | `TIMESTAMP` | No | | `CURRENT_TIMESTAMP` | Fecha de apertura |
| `updated_at` | `TIMESTAMP` | No | | `CURRENT_TIMESTAMP` | Fecha de última modificación |

**Tabla D: `comentarios_tickets`**

| Campo | Tipo de Dato | Nulo | Clave | Predeterminado | Descripción |
|-------|-------------|:----:|:-----:|:--------------:|-------------|
| `id` | `INT` UNSIGNED | No | PK | Auto-incremental | ID del comentario |
| `ticket_id` | `INT` UNSIGNED | No | FK | | Ref. a `tickets.id` |
| `usuario_id` | `INT` UNSIGNED | No | FK | | Ref. a `usuarios.id` (autor) |
| `comentario` | `TEXT` | No | | | Contenido del mensaje |
| `created_at` | `TIMESTAMP` | No | | `CURRENT_TIMESTAMP` | Fecha y hora del mensaje |

### 3.4. Diseño Visual y Paleta de Colores Corporativa

El diseño visual utiliza Bootstrap 5 como framework CSS base, complementado con estilos personalizados inline:

| Elemento | Color / Recurso |
|----------|----------------|
| Fondo cabecera/hero | Azul oscuro: `#0A192F` |
| Acento principal | Azul brillante: `#00B4D8` |
| Fondo contenido | Gris claro: `#F4F6F9` |
| Tipografía | Inter / Roboto (Google Fonts) vía CDN |
| Iconografía | Bootstrap Icons (librería CDN, sin imágenes pesadas) |

---

## 4. IMPLEMENTACIÓN

### 4.1. Entorno de Implementación

La implementación se ha llevado a cabo íntegramente en un entorno de desarrollo local sobre Windows 11, utilizando la pila de software **XAMPP 8.2** como servidor integrado. Los archivos fuente se han desarrollado con **Visual Studio Code** y gestionado con control de versiones **Git + GitHub**.

**Ruta de despliegue local:**
```
C:\xampp\htdocs\techflowsolution\
```
**URL de acceso durante el desarrollo:**
```
http://localhost/techflowsolution/index.php
```

### 4.2. Creación de la Base de Datos

La base de datos `techflow_db` se ha creado e inicializado mediante el script `database.sql`, importado a través de la interfaz de **phpMyAdmin**:

1. Acceder a `http://localhost/phpmyadmin/`
2. Crear la base de datos `techflow_db` con collation `utf8mb4_unicode_ci`
3. Importar el archivo `database.sql`

El script crea las 4 tablas relacionales e inserta registros semilla de prueba: 3 usuarios (1 cliente, 1 técnico, 1 PMO), 2 proyectos y 3 tickets con comentarios de seguimiento.

### 4.3. Implementaciones de Código Relevantes

#### A) Conexión Procedimental a la Base de Datos (`conexion.php`)

```php
<?php
// Parámetros de conexión estándar en XAMPP local
$servidor   = "localhost";   // Servidor web local
$usuario    = "root";        // Usuario administrador MariaDB (por defecto en XAMPP)
$contrasena = "";            // Contraseña en blanco (por defecto en XAMPP local)
$base_datos = "techflow_db"; // Nombre de la base de datos del proyecto

// Ejecución de la conexión procedimental MySQLi
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

// Captura y control de fallos en el canal de datos
if (!$conexion) {
    die("Error crítico: No se ha podido conectar a MySQL. " . mysqli_connect_error());
}

// Forzamos codificación UTF-8 para caracteres del español
mysqli_set_charset($conexion, "utf8mb4");
?>
```

#### B) Autenticación Segura con Bcrypt (`login.php` — fragmento clave)

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['iniciar_sesion'])) {
    // Sanitización contra inyección SQL básica
    $email    = mysqli_real_escape_string($conexion, trim($_POST['email']));
    $password = trim($_POST['password']);

    $sql      = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificación segura del hash Bcrypt almacenado
        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre']     = $usuario['nombre'];
            $_SESSION['rol']        = $usuario['rol'];

            // Redirección según el rol del usuario autenticado
            header("Location: " . ($usuario['rol'] === 'cliente'
                ? "panel_cliente.php"
                : "panel_pmo.php"));
            exit;
        }
    }
}
?>
```

#### C) Protección IDOR en ver_ticket.php (Seguridad de Acceso)

```php
<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); exit;
}

$ticket_id = (int)$_GET['id']; // Forzado a entero para evitar inyecciones

// Si es cliente, verificamos que el ticket le pertenece (anti-IDOR)
if ($_SESSION['rol'] === 'cliente') {
    $check_sql = "SELECT id FROM tickets WHERE id = $ticket_id
                  AND cliente_id = {$_SESSION['usuario_id']}";
    $check_res = mysqli_query($conexion, $check_sql);
    if (!$check_res || mysqli_num_rows($check_res) === 0) {
        header("Location: panel_cliente.php"); exit;
    }
}
?>
```

### 4.4. Capturas del Sistema Implementado

**Figura 1: Página Corporativa Principal**

![Figura 1 - Inicio Corporativo TechFlow Solutions](imagenes-tfg/inicio_corporativo.png)

*Figura 1. Vista de la página pública index.php. Banner hero con paleta de colores corporativa azul oscuro y acento en azul brillante, servicios integrados y formulario de contacto.*

**Figura 2: Portal de Login**

![Figura 2 - Portal de Login](imagenes-tfg/portal_login.png)

*Figura 2. Vista del formulario de autenticación login.php. Diseño limpio con Bootstrap 5, validación de credenciales y gestión de roles mediante sesiones PHP.*

**Figura 3: Panel de Control del Cliente**

![Figura 3 - Panel del Cliente](imagenes-tfg/panel_cliente.png)

*Figura 3. Vista del panel_cliente.php. Pestañas para proyectos (con barra de progreso dinámica) y soporte IT (historial de tickets del cliente).*

**Figura 4: Cuadro de Mando del Personal PMO**

![Figura 4 - Cuadro de Mando PMO](imagenes-tfg/cuadro_mando_pmo.png)

*Figura 4. Vista del panel_pmo.php. Cabecera con 4 KPIs estadísticos en tiempo real y tabla global de gestión de tickets con estado, técnico asignado y botón de gestión.*

---

## 5. PRUEBAS

Para garantizar el correcto funcionamiento del sistema, se han definido y ejecutado los siguientes casos de prueba que verifican el cumplimiento de los requisitos establecidos.

### 5.1. Casos de Prueba

---

**Caso de Prueba CP-01: Autenticación de Cliente**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-01 |
| **Descripción** | Verificar que un cliente puede iniciar sesión con credenciales válidas y es redirigido a su panel. |
| **Condiciones de ejecución** | XAMPP activo (Apache + MySQL). Base de datos `techflow_db` importada con datos semilla. |
| **Entrada** | Email: `cliente@techflow.com` / Contraseña: `password123` |
| **Resultado esperado** | El sistema valida las credenciales, crea la sesión y redirige a `panel_cliente.php` mostrando el nombre "Juan Gómez". |
| **Resultado obtenido** | ✅ Correcto. Redirección exitosa a `panel_cliente.php`. Nombre y rol mostrados en la barra de navegación. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-02: Autenticación de PMO**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-02 |
| **Descripción** | Verificar que una gestora PMO accede al panel administrativo tras autenticarse. |
| **Condiciones de ejecución** | Ídem CP-01. |
| **Entrada** | Email: `pmo@techflow.com` / Contraseña: `password123` |
| **Resultado esperado** | Redirección a `panel_pmo.php` con los KPIs y el cuadro de mando del personal. |
| **Resultado obtenido** | ✅ Correcto. Se muestran los 4 KPIs estadísticos y la tabla global de tickets. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-03: Rechazo de Credenciales Incorrectas**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-03 |
| **Descripción** | Verificar que el sistema rechaza credenciales inválidas sin exponer información sensible. |
| **Condiciones de ejecución** | Ídem CP-01. |
| **Entrada** | Email: `cliente@techflow.com` / Contraseña: `contraseña_incorrecta` |
| **Resultado esperado** | El sistema muestra el mensaje de error "La contraseña introducida es incorrecta." sin redirigir. |
| **Resultado obtenido** | ✅ Correcto. El mensaje de error se muestra en la pantalla de login. No se crea ninguna sesión. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-04: Protección de Recursos sin Sesión**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-04 |
| **Descripción** | Verificar que el acceso directo a páginas privadas sin sesión activa redirige al login. |
| **Condiciones de ejecución** | Navegador sin sesión activa (o en ventana de incógnito). |
| **Entrada** | URL directa: `http://localhost/techflowsolution/panel_pmo.php` |
| **Resultado esperado** | El sistema detecta la ausencia de sesión y redirige automáticamente a `login.php`. |
| **Resultado obtenido** | ✅ Correcto. Redirección inmediata al login. La página privada no se muestra en ningún momento. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-05: Creación de un Ticket de Incidencia**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-05 |
| **Descripción** | Verificar que un cliente puede crear un nuevo ticket y éste queda registrado en la base de datos. |
| **Condiciones de ejecución** | Sesión activa como cliente (`cliente@techflow.com`). |
| **Entrada** | Título: "Fallo VPN preproducción" / Categoría: Infraestructura / Gravedad: Alta / Descripción: "Error Timeout al conectar OpenVPN" |
| **Resultado esperado** | El sistema ejecuta `INSERT INTO tickets` y muestra mensaje de confirmación con el ID asignado. El ticket aparece en `panel_cliente.php` con estado "Abierto". |
| **Resultado obtenido** | ✅ Correcto. Ticket creado con ID #3, visible en el panel del cliente y en el buzón del personal. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-06: Asignación de Técnico y Cambio de Estado de Ticket**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-06 |
| **Descripción** | Verificar que el personal puede asignar un técnico y cambiar el estado de un ticket. |
| **Condiciones de ejecución** | Sesión activa como técnico (`tecnico@techflow.com`). Ticket #3 en estado "Abierto". |
| **Entrada** | Técnico: "Carlos Técnico" / Estado: "En Proceso" → Botón "Guardar Cambios" |
| **Resultado esperado** | El `UPDATE` se ejecuta en la BD. El ticket #3 pasa a "En Proceso" con técnico asignado. |
| **Resultado obtenido** | ✅ Correcto. El cambio se refleja inmediatamente en el cuadro de mando y en el panel del cliente. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-07: Protección IDOR (Acceso cruzado entre clientes)**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-07 |
| **Descripción** | Verificar que un cliente no puede acceder a los tickets de otro cliente modificando la URL. |
| **Condiciones de ejecución** | Sesión activa como `cliente@techflow.com` (cliente con ID 1). |
| **Entrada** | URL manipulada: `http://localhost/techflowsolution/ver_ticket.php?id=99` (ticket inexistente o de otro cliente) |
| **Resultado esperado** | El sistema verifica que `tickets.cliente_id` ≠ `$_SESSION['usuario_id']` y redirige a `panel_cliente.php`. |
| **Resultado obtenido** | ✅ Correcto. El cliente es redirigido a su panel sin acceder al recurso ajeno. |
| **Evaluación** | **SUPERADO** |

---

**Caso de Prueba CP-08: Visualización Responsive en Dispositivo Móvil**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-08 |
| **Descripción** | Verificar que la interfaz se adapta correctamente a resolución móvil (< 768px). |
| **Condiciones de ejecución** | Herramientas de desarrollador Chrome (F12) → Modo responsive → iPhone SE (375px de ancho). |
| **Entrada** | Navegación completa por `index.php`, `login.php`, `panel_cliente.php`. |
| **Resultado esperado** | Menú colapsado en hamburguesa, tablas con scroll horizontal, tarjetas apiladas verticalmente. Sin desbordamiento de contenidos. |
| **Resultado obtenido** | ✅ Correcto. Bootstrap 5 adapta el layout correctamente en todas las vistas probadas. |
| **Evaluación** | **SUPERADO** |

---

### 5.2. Resumen de Resultados de Pruebas

| ID | Caso de Prueba | Resultado |
|----|---------------|:---------:|
| CP-01 | Autenticación de Cliente | ✅ SUPERADO |
| CP-02 | Autenticación de PMO | ✅ SUPERADO |
| CP-03 | Rechazo de Credenciales Incorrectas | ✅ SUPERADO |
| CP-04 | Protección de Recursos sin Sesión | ✅ SUPERADO |
| CP-05 | Creación de Ticket de Incidencia | ✅ SUPERADO |
| CP-06 | Asignación de Técnico y Cambio de Estado | ✅ SUPERADO |
| CP-07 | Protección IDOR | ✅ SUPERADO |
| CP-08 | Diseño Responsive en Móvil | ✅ SUPERADO |

**Resultado global: 8/8 casos de prueba superados (100%).**

---

## 6. EXPLOTACIÓN

La explotación o implantación es la fase más crítica del proyecto, ya que el sistema entra en producción real, operando con usuarios y datos reales.

### 6.1. Planificación de la Implantación

Las tareas necesarias para implantar el sistema en el entorno del cliente se planifican de la siguiente manera:

| Nº | Tarea | Responsable | Recursos Necesarios | Tiempo Estimado | Riesgo |
|----|-------|------------|--------------------|-----------------| -------|
| 1 | Instalación y configuración de XAMPP en el servidor | Técnico IT | Servidor físico / VM + XAMPP | 1 hora | Bajo |
| 2 | Transferencia de archivos al directorio `htdocs` | Técnico IT | Acceso al servidor + archivos del proyecto | 30 min | Bajo |
| 3 | Creación de la base de datos e importación del script SQL | Técnico IT | phpMyAdmin + `database.sql` | 30 min | Medio (credenciales BD) |
| 4 | Verificación del archivo `conexion.php` | Técnico IT | Editor de texto | 15 min | Bajo |
| 5 | Prueba de acceso y validación funcional completa | Técnico IT + PMO | Navegador web | 1 hora | Bajo |
| 6 | Formación a los usuarios del sistema | PMO / Formadora | Manual de usuario + sala de formación | 2 horas | Bajo |

### 6.2. Preparación para el Cambio

Antes de poner el sistema en producción, se deben considerar los siguientes aspectos:

- **Permisos de instalación:** El técnico necesita acceso de administrador al servidor para instalar XAMPP y modificar archivos de configuración (`httpd.conf`).
- **Resistencia al cambio:** Algunos usuarios pueden mostrar reticencias a abandonar el correo electrónico como canal de comunicación de incidencias. Se comunicará claramente que el nuevo sistema centraliza y acelera la resolución de problemas.
- **Backup previo:** Antes de la implantación, se realizará una copia de seguridad de cualquier sistema existente en la empresa.

### 6.3. Plan de Formación

Para garantizar la correcta adopción del sistema por parte de los usuarios, se realizarán las siguientes acciones formativas:

| Perfil de Usuario | Contenido de la Formación | Duración |
|------------------|--------------------------|----------|
| **Clientes** | Acceso al portal, creación de tickets, seguimiento de proyectos y uso del chat. | 45 min |
| **Técnicos IT** | Gestión del buzón de tickets, asignación, cambio de estados y respuesta a clientes. | 60 min |
| **Gestoras PMO** | Supervisión del cuadro de mando, KPIs, gestión de proyectos y coordinación con soporte. | 60 min |

El material de formación es el **Manual de Usuario** adjunto como Anexo A de esta memoria.

### 6.4. Implantación Propiamente Dicha

Los pasos técnicos de implantación en el servidor de producción son:

**Paso 1: Despliegue del Servidor**
1. Instalar XAMPP 8.2 en el servidor Windows.
2. Verificar que Apache escucha en el puerto 80 y MySQL en el puerto 3306.
3. Configurar el firewall para permitir el tráfico entrante en el puerto 80 desde la red local.

**Paso 2: Despliegue de la Aplicación**
1. Crear la carpeta `C:\xampp\htdocs\techflowsolution\`
2. Copiar todos los archivos PHP, el script SQL y la carpeta `imagenes-tfg/` en ese directorio.

**Paso 3: Despliegue de la Base de Datos**
1. Acceder a `http://localhost/phpmyadmin/`
2. Crear la base de datos `techflow_db` con collation `utf8mb4_unicode_ci`
3. Importar `database.sql` desde la pestaña "Importar"
4. Verificar que se han creado las 4 tablas y los registros semilla.

**Paso 4: Verificación de la Conexión**
1. Abrir `conexion.php` y verificar que el host, usuario y contraseña de MySQL son correctos para el nuevo servidor.
2. Acceder a `http://localhost/techflowsolution/index.php` y comprobar que carga sin errores.

### 6.5. Pruebas de Implantación en Producción

Una vez implantado el sistema, se ejecutarán las pruebas de implantación:

- Verificar que todos los usuarios de prueba pueden iniciar sesión correctamente.
- Comprobar que la creación de un ticket es visible en tiempo real en el panel del personal.
- Verificar que el diseño es responsive desde distintos dispositivos (móvil, tableta, escritorio).
- Comprobar que el servidor Apache no presenta errores en el log (`C:\xampp\apache\logs\error.log`).

---

## 7. DEFINICIÓN DE PROCEDIMIENTOS DE CONTROL Y EVALUACIÓN

Durante el ciclo de vida del proyecto se pueden producir cambios e incidencias que deben controlarse y registrarse.

### 7.1. Registro de Incidencias Detectadas durante el Desarrollo

| Fecha | Identificación | Descripción | Causa | Corrección | Áreas Afectadas |
|-------|---------------|-------------|-------|-----------|-----------------|
| 27/05/2026 | INC-01 | Los caracteres con tilde (á, é, ñ) se muestran incorrectamente en la BD | Falta de configuración explícita del charset UTF-8 | Se añadió `mysqli_set_charset($conexion, "utf8mb4")` en `conexion.php` | `conexion.php`, todas las vistas PHP |
| 27/05/2026 | INC-02 | El panel PMO muestra tickets de clientes sin que el técnico esté autenticado | Falta de verificación de sesión al inicio de `panel_pmo.php` | Se añadió el bloque de control de sesión al inicio del script | `panel_pmo.php` |
| 27/05/2026 | INC-03 | Un cliente podía acceder a tickets ajenos modificando el parámetro `id` en la URL | Ausencia de validación de propiedad del ticket | Se implementó la comprobación IDOR cruzando `cliente_id` con `$_SESSION['usuario_id']` | `ver_ticket.php` |

### 7.2. Gestión de Cambios en el Proyecto

| Fecha | Cambio | Justificación | Áreas afectadas |
|-------|--------|---------------|-----------------|
| 26/05/2026 | Adición del campo `updated_at` en la tabla `tickets` | Necesidad de registrar la fecha de última actualización para el histórico de KPIs | `database.sql`, `panel_pmo.php` |
| 27/05/2026 | Adición de la carpeta `imagenes-tfg/` y capturas de pantalla reales | Requisito del departamento para la documentación técnica de la web | `memoria_proyecto.md`, `manual_usuario.md` |

---

## 8. CONCLUSIONES

### 8.1. Resumen del Trabajo Realizado

El proyecto **TechFlow Solutions** ha sido completado satisfactoriamente dentro del plazo establecido. Se han desarrollado todos los módulos planificados: la página corporativa pública, el sistema de autenticación por roles, el panel de control del cliente, el cuadro de mando del personal PMO/técnico, el sistema de tickets con chat de seguimiento y el manual técnico de instalación.

Los **8 casos de prueba definidos** han sido superados al 100%, validando tanto la funcionalidad del sistema como su seguridad (Bcrypt, control de sesiones, protección IDOR) y su usabilidad (diseño responsive).

### 8.2. Cumplimiento de Objetivos

| Objetivo | ¿Cumplido? |
|----------|:----------:|
| Base de datos relacional normalizada en MySQL | ✅ Sí |
| Aplicación web en PHP procedimental | ✅ Sí |
| Sistema de autenticación segura con Bcrypt | ✅ Sí |
| Interfaz responsive con Bootstrap 5 | ✅ Sí |
| Panel de KPIs para el personal PMO | ✅ Sí |
| Manual técnico de instalación | ✅ Sí |
| Manual de usuario con capturas | ✅ Sí |

### 8.3. Valoración Personal y Aprendizaje en la FP Dual

La modalidad de **FP Dual Intensiva** ha marcado una diferencia cualitativa en mi perfil profesional. La promoción interna desde Soporte IT Nivel 1 hacia la PMO me ha aportado dos tipos de competencias clave:

- **Hard Skills (Habilidades Técnicas):** Administración de sistemas informáticos, configuración de redes y VPNs, gestión de firewalls en entornos Cloud y depuración de aplicaciones web en entornos XAMPP.
- **Soft Skills (Habilidades Blandas):** Trabajo en equipo multidisciplinar, comunicación con clientes corporativos, gestión del tiempo y visión global del negocio tecnológico.

Este proyecto final ha sido la oportunidad perfecta para demostrar, de forma tangible y funcional, todo lo aprendido durante estos dos años de formación dual.

### 8.4. Propuesta de Mejoras Futuras

- **Notificaciones por Email:** Integrar `PHPMailer` para notificar automáticamente al cliente cuando su ticket cambie de estado.
- **Subida de Archivos Adjuntos:** Permitir adjuntar imágenes o documentos PDF al crear un ticket o comentario.
- **Gráficos Estadísticos Dinámicos:** Integrar `Chart.js` en el cuadro de mando PMO para visualizar estadísticas de incidencias por categoría y gravedad.
- **Panel de Administración de Usuarios:** Módulo para que la PMO pueda crear nuevos usuarios y proyectos directamente desde la interfaz web.
- **HTTPS y Producción:** Configurar certificados SSL/TLS con Let's Encrypt para desplegar el portal en un servidor web público con conexión segura.

---

## 9. FUENTES

1. **PHP Group.** (2026). *PHP Manual: MySQL Improved Extension (mysqli)*. Recuperado de https://www.php.net/manual/es/book.mysqli.php

2. **MariaDB Foundation.** (2026). *MariaDB Server Documentation: SQL Commands and Joins*. Recuperado de https://mariadb.com/kb/en/documentation/

3. **Bootstrap Team.** (2026). *Bootstrap v5.3 CSS Framework Components*. Recuperado de https://getbootstrap.com/docs/5.3/components/

4. **OWASP Foundation.** (2025). *OWASP Top Ten: A07 - Identification and Authentication Failures*. Recuperado de https://owasp.org/www-project-top-ten/

5. **Atlassian.** (2026). *Jira Service Management Documentation*. Recuperado de https://support.atlassian.com/jira-service-management/

6. **American Psychological Association.** (2020). *Publication Manual of the American Psychological Association* (7.ª ed.). https://apastyle.apa.org/

---

## 10. ANEXOS

### Anexo A: Manual de Usuario del Portal TechFlow Solutions

> Ver archivo independiente: **`manual_usuario.md`**

El manual de usuario detalla de forma paso a paso cómo utilizar cada módulo del portal corporativo TechFlow Solutions, con capturas de pantalla reales del sistema. Está dirigido a los tres perfiles de usuario del sistema: cliente, técnico de soporte y gestora PMO.

### Anexo B: Script de Base de Datos Completo (`database.sql`)

> Ver archivo independiente: **`database.sql`**

Script SQL completo con la creación de las 4 tablas relacionales e inserción de registros semilla listos para importar desde phpMyAdmin.

### Anexo C: Código Fuente Completo

> Ver repositorio GitHub: [https://github.com/alicenon/techflow](https://github.com/alicenon/techflow)

Los archivos fuente comentados incluyen:
- `conexion.php` — Conector procedimental mysqli
- `login.php` — Autenticación segura con Bcrypt
- `panel_cliente.php` — Panel privado del cliente
- `crear_ticket.php` — Formulario de alta de incidencias
- `panel_pmo.php` — Cuadro de mando del personal
- `ver_ticket.php` — Chat de seguimiento de tickets
- `logout.php` — Destrucción segura de sesión

---

*Memoria del Proyecto Final de Grado Medio SMR · TechFlow Solutions · Mayo 2026*
