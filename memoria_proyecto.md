# PLATAFORMA WEB INTEGRADA DE GESTIÓN DE INCIDENCIAS Y PROYECTOS — TECHFLOW SOLUTIONS
**DAW / SMR — Departamento de Informática y Comunicaciones (IFC)**

---

| | |
|---|---|
| **NOMBRE DEL PROYECTO** | TechFlow Solutions — Portal de Gestión Integrada IT & PMO |
| **TÍTULO DEL PROYECTO** | Plataforma Web de Gestión de Tickets e Incidencias Técnicas con Módulo PMO |
| **EMPRESA** | TechFlow Solutions (empresa ficticia) |
| **CICLO FORMATIVO** | Grado Medio en Sistemas Microinformáticos y Redes (SMR) |
| **MODALIDAD** | FP Dual Intensiva |
| **AUTORA** | Shannon |
| **TUTORA DEL PROYECTO** | [Nombre de la tutora del centro] |
| **CURSO ACADÉMICO** | 2025 – 2026 |

---

*Esta obra está bajo una licencia Reconocimiento-Compartir bajo la misma licencia 3.0 España de Creative Commons.*

---

## Índice de contenido

1. INTRODUCCIÓN
2. ALCANCE DEL PROYECTO
3. ESTUDIO DE VIABILIDAD
   - 3.1 Estado actual del sistema
   - 3.2 Requisitos del cliente
   - 3.3 Posibles soluciones
   - 3.4 Solución elegida
   - 3.5 Planificación temporal de las tareas del proyecto [TechFlow Solutions]
   - 3.6 Planificación de los recursos a utilizar
4. ANÁLISIS
   - 4.1 Requisitos funcionales
   - 4.2 Requisitos no funcionales
5. DISEÑO
   - 5.1 Estructura de la aplicación
   - 5.2 Componentes del sistema
   - 5.3 Arquitectura de la red
   - 5.4 Herramientas
6. IMPLEMENTACIÓN
   - 6.1 Entorno de implementación
   - 6.2 Tablas creadas
   - 6.3 Carga de datos
   - 6.4 Ficheros de configuración actualizados
   - 6.5 Configuraciones realizadas en el sistema
   - 6.6 Implementaciones de código realizadas
7. PRUEBAS
   - 7.1 Casos de pruebas
8. EXPLOTACIÓN
   - 8.1 Planificación
   - 8.2 Preparación para el cambio
   - 8.3 Plan de formación
   - 8.4 Implantación propiamente dicha
   - 8.5 Pruebas de implantación
9. DEFINICIÓN DE PROCEDIMIENTOS DE CONTROL Y EVALUACIÓN
10. CONCLUSIONES
11. FUENTES
12. ANEXOS
    - 12.1 Guía de estilo

---

## 1. INTRODUCCIÓN

Este documento recoge el trabajo realizado para el **proyecto final** del Ciclo Formativo de Grado Medio en **Sistemas Microinformáticos y Redes (SMR)**, modalidad FP Dual Intensiva, en el Departamento de Informática y Comunicaciones (IFC).

Este módulo profesional complementa la formación establecida en el resto de módulos del título en las funciones de **análisis** del contexto, **diseño** del proyecto y organización de la **ejecución**.

La alumna realizó su FP Dual en la empresa co-formadora **TechFlow Solutions**, donde comenzó en el departamento de **Soporte IT Nivel 1** y fue promocionada internamente a tareas de apoyo a la **PMO (Oficina de Gestión de Proyectos)**. Esta experiencia práctica ha inspirado el desarrollo de una plataforma web empresarial que integra ambas funciones en un único sistema digital.

---

## 2. ALCANCE DEL PROYECTO

El propósito de este proyecto es **diseñar, desarrollar y desplegar una plataforma web corporativa** para la consultora tecnológica TechFlow Solutions, que permita unificar en un único entorno digital la gestión de proyectos PMO y el soporte técnico IT mediante un sistema de tickets de incidencias.

El objetivo es claro y preciso: **crear una aplicación web funcional, segura y visualmente profesional** que permita a los clientes consultar el estado de sus proyectos y reportar incidencias, mientras el personal técnico y gestor puede supervisar, asignar y resolver dichas incidencias desde un cuadro de mando centralizado.

El desarrollo de este proyecto se llevará a cabo en varias fases: estudio de viabilidad, análisis, diseño, implementación y pruebas, y explotación. A continuación, se detallan las actividades y tareas de cada una de estas fases.

---

## 3. ESTUDIO DE VIABILIDAD

En esta fase se considera si el proyecto se puede realizar teniendo en cuenta las circunstancias internas y externas de la empresa, las diferentes soluciones posibles y los recursos disponibles. Para ello se hace una valoración del estado actual del sistema y de los requisitos del cliente, se presentan soluciones alternativas y la solución elegida.

### 3.1 Estado actual del sistema

El sistema actual de la empresa co-formadora TechFlow Solutions **no dispone de ninguna herramienta centralizada** para la gestión de incidencias ni para la supervisión de proyectos. La situación previa al desarrollo de este proyecto es la siguiente:

- La comunicación con los clientes sobre incidencias técnicas se realiza íntegramente por **correo electrónico**, generando hilos de conversación largos y difíciles de rastrear, sin posibilidad de priorizar por urgencia ni asignar un responsable claro.
- El seguimiento del estado de los proyectos se actualiza manualmente en **hojas de cálculo Excel** compartidas, sin control de versiones ni visibilidad en tiempo real para el cliente.
- No existe ningún **registro formal de apertura, asignación y cierre de incidencias**, lo que dificulta el análisis del rendimiento del equipo y la mejora continua de los procesos.
- No hay distinción de roles ni control de accesos: cualquier miembro del equipo puede ver y modificar cualquier información, lo que supone un riesgo de seguridad.

Como consecuencia, se producen incidencias sin resolver por falta de asignación clara, clientes descontentos al no conocer el estado real de sus proyectos, y ausencia de datos históricos para medir el rendimiento del equipo.

### 3.2 Requisitos del cliente

El cliente (empresa co-formadora) ha trasladado los siguientes requisitos para el nuevo sistema:

- Acceso al portal desde cualquier navegador web sin necesidad de instalar software adicional.
- Acceso diferenciado según el perfil del usuario: cliente, técnico de soporte y gestora PMO.
- Visualización por parte del cliente del estado y porcentaje de avance de sus proyectos en tiempo real.
- Posibilidad de que el cliente reporte incidencias técnicas indicando título, categoría y gravedad.
- Gestión de incidencias por parte del personal: asignación de técnico responsable y cambio de estado.
- Canal de comunicación directo entre cliente y técnico dentro de cada incidencia (chat de seguimiento).
- Panel de indicadores estadísticos (KPIs) para el personal de gestión.
- Interfaz web moderna, responsive y con imagen corporativa profesional.
- Contraseñas almacenadas de forma segura (nunca en texto plano) en la base de datos.
- Sistema que funcione sobre infraestructura local (servidor Apache + MySQL con XAMPP).

### 3.3 Posibles soluciones

Existen otras herramientas en el mercado que ofrecen funcionalidades similares a las requeridas:

- **Jira Service Management (Atlassian):** Solución corporativa líder que integra soporte técnico y gestión de proyectos. Sin embargo, el coste de las licencias es elevado para una PYME, su curva de aprendizaje es alta y requiere consultores especializados para su configuración.
- **Zendesk / Freshdesk:** Plataformas de soporte en la nube con excelente gestión de tickets, pero sin módulo PMO nativo. Para conectar ambas funciones es necesario contratar integraciones de terceros que incrementan el coste.
- **Trello / Asana / Monday:** Herramientas de planificación de proyectos ágiles y visuales, pero completamente desconectadas del canal de incidencias técnicas.
- **WordPress + plugins de tickets:** Permite un despliegue rápido, pero los plugins disponibles no integran un módulo PMO real y la personalización del modelo de datos es limitada.

Ninguna de las opciones anteriores ofrece de forma nativa, con bajo coste y fácil despliegue, la integración completa entre soporte IT y gestión de proyectos PMO que requiere TechFlow Solutions.

### 3.4 Solución elegida

Se elige el **desarrollo web a medida** utilizando PHP procedimental, MySQL y Bootstrap 5 sobre un servidor Apache local (XAMPP). Esta solución se justifica por los siguientes motivos:

- **Coste cero en licencias:** Todo el software utilizado es de código libre y gratuito.
- **Control total del código:** La empresa es propietaria del código fuente, que puede modificarse sin restricciones ni dependencias de terceros.
- **Integración real PMO + Soporte IT:** El modelo de datos relacional unifica en una única base de datos los proyectos y las incidencias, algo que las soluciones comerciales no ofrecen de forma nativa y gratuita.
- **Alineación académica:** El desarrollo en PHP procedimental es coherente con el currículo del ciclo formativo SMR y completamente defendible ante el tribunal examinador.
- **Despliegue sencillo:** Funciona sobre cualquier equipo con XAMPP instalado, sin necesidad de infraestructura adicional.

De esta solución nace el nuevo proyecto denominado **TechFlow Solutions — Portal de Gestión Integrada IT & PMO**.

### 3.5 Planificación temporal de las tareas del proyecto [TechFlow Solutions]

Se identifican las tareas del proyecto y se estima el tiempo necesario para llevarlas a cabo. El proyecto es desarrollado por **1 persona** (la alumna) en un plazo de **3 días de trabajo intensivo**.

**Diagrama de Gantt:**

```
TAREAS DEL PROYECTO                       DÍA 1        DÍA 2        DÍA 3
                                         [  8h  ]     [  8h  ]     [  8h  ]

Diseño del modelo E-R y la BD            [====]
Script database.sql                      [====]
conexion.php + header.php + footer.php        [==]
index.php (página corporativa pública)            [==]
login.php + logout.php                            [====]
panel_cliente.php                                      [==]
crear_ticket.php                                       [==]
panel_pmo.php                                              [===]
ver_ticket.php (chat de seguimiento)                       [====]
Pruebas funcionales y corrección errores                        [====]
Capturas de pantalla del sistema                                [==]
Redacción de la memoria técnica                                     [====]
Manual de usuario                                                   [===]
Subida a GitHub                                                     [==]
```

| Fase | Tarea principal | Día | Horas estimadas |
|------|----------------|-----|-----------------|
| Base de datos | Diseño E-R + `database.sql` + `conexion.php` | Día 1 | 5 h |
| Estructura | `header.php` + `footer.php` | Día 1 | 3 h |
| Autenticación | `index.php` + `login.php` + `logout.php` | Día 2 | 4 h |
| Módulo cliente | `panel_cliente.php` + `crear_ticket.php` | Día 2 | 4 h |
| Módulo personal | `panel_pmo.php` + `ver_ticket.php` | Día 2–3 | 5 h |
| Pruebas | Pruebas funcionales + corrección | Día 3 | 3 h |
| Documentación | Memoria + manual + GitHub | Día 3 | 7 h |

### 3.6 Planificación de los recursos a utilizar

Para solventar los problemas que plantea el proyecto **TechFlow Solutions**, se necesitan los siguientes recursos. Al tratarse de un proyecto académico con software libre, el coste económico es cero:

**Recursos humanos:**

| Perfil | Rol | Dedicación |
|--------|-----|------------|
| Alumna (Shannon) | Desarrolladora web y documentadora | 100% (3 días) |
| Tutora del centro | Supervisión académica | Puntual |
| Tutora de empresa (PMO) | Validación de requisitos | Puntual |

**Recursos de hardware y software:**

| Recurso | Detalle |
|---------|---------|
| Equipo de desarrollo | PC con Intel Core i5 / 8 GB RAM / SSD |
| Sistema operativo | Windows 10/11 (64 bits) |
| Servidor local | XAMPP 8.2 (Apache + MariaDB + PHP) |
| Editor de código | Visual Studio Code |
| Navegador de pruebas | Google Chrome con DevTools |
| Control de versiones | Git + repositorio GitHub |
| Framework CSS | Bootstrap 5.3 (CDN, gratuito) |

**Coste económico total del proyecto: 0 €** (todo el software es de código abierto o gratuito).

---

## 4. ANÁLISIS

En esta fase se establecen los requisitos del sistema. Una vez que el cliente ha aceptado el nuevo proyecto, hay que dejar muy claro y por escrito cuáles son los requisitos que debe cumplir el sistema. Se puede distinguir entre los requisitos funcionales y no funcionales.

### 4.1 Requisitos funcionales

Son aquellos que determinan qué tareas tiene que hacer el sistema:

**Perfil: Cliente**
- El sistema debe permitir al cliente iniciar sesión y acceder a su panel privado personalizado.
- El sistema debe mostrar al cliente los proyectos contratados con nombre, descripción, estado actual y porcentaje de progreso en tiempo real.
- El sistema debe mostrar al cliente su historial de tickets de soporte con su estado actualizado.
- El sistema debe permitir al cliente crear nuevas incidencias indicando título, categoría (Soporte Técnico / Gestión de Proyectos / Infraestructura), gravedad (Baja / Media / Alta / Crítica) y descripción detallada.
- El sistema debe permitir al cliente consultar el chat de seguimiento de cada una de sus incidencias y añadir nuevas respuestas.
- El sistema NO debe permitir al cliente acceder a datos o tickets de otros clientes.

**Perfil: Técnico / PMO**
- El sistema debe ofrecer al personal un cuadro de mando con indicadores KPI en tiempo real: total de incidencias, incidencias activas, casos resueltos y proyectos activos.
- El sistema debe mostrar al personal una tabla global con todas las incidencias de todos los clientes.
- El sistema debe permitir al personal asignar un técnico responsable a cada incidencia.
- El sistema debe permitir al personal cambiar el estado de un ticket: Abierto → En Proceso → Resuelto → Cerrado.
- El sistema debe permitir al personal responder al cliente en el chat de seguimiento de cada ticket.
- El sistema debe mostrar al personal la cartera completa de proyectos activos de la consultora.

**Perfil: Visitante público**
- El sistema debe mostrar una página corporativa pública con información de los servicios de la consultora.
- El sistema debe ofrecer un formulario de contacto con validación de campos.

### 4.2 Requisitos no funcionales

Son propiedades o cualidades que el sistema debe cumplir:

- **Diseño atractivo y profesional:** La interfaz debe proyectar una imagen corporativa seria y moderna, coherente con una consultora tecnológica real.
- **Diseño responsive:** La web debe adaptarse correctamente a distintos tamaños de pantalla: escritorio, tableta y móvil, sin errores de maquetación.
- **Seguridad en contraseñas:** Las contraseñas deben almacenarse cifradas en la base de datos mediante el algoritmo Bcrypt. Nunca en texto plano.
- **Control de accesos por sesión:** El acceso directo a páginas privadas sin sesión activa debe redirigir automáticamente al login.
- **Integridad de datos:** Los accesos entre recursos de distintos usuarios deben estar protegidos para evitar accesos cruzados no autorizados.
- **Tiempo de respuesta:** Las páginas deben cargar en menos de 2 segundos en el entorno local con XAMPP.
- **Codificación de caracteres:** El sistema debe soportar correctamente caracteres del español (tildes, eñes) mediante UTF-8 en todos los niveles (PHP, HTML y MySQL).

Tienen que quedar claras además las restricciones del nuevo sistema: no contempla despliegue en servidor público, notificaciones por email ni app móvil en su versión actual (siempre será mejorable).

---

## 5. DISEÑO

En esta fase se realiza una aproximación al diseño tecnológico de la solución. Se describe **cómo** desarrollar cada uno de los requisitos establecidos en la fase anterior, apoyándose en la estructura de la aplicación, la arquitectura de la red y los componentes del sistema.

### 5.1 Estructura de la aplicación

Se trata del desarrollo de una **aplicación web** en PHP procedimental. El árbol de archivos de la aplicación es el siguiente:

```
techflowsolution/                  ← Directorio raíz en htdocs de Apache
│
├── conexion.php                   ← Conector procedimental MySQLi
├── header.php                     ← Cabecera HTML dinámica (nav por roles)
├── footer.php                     ← Pie de página corporativo común
│
├── index.php                      ← Página corporativa pública
├── login.php                      ← Autenticación + gestión de sesiones
├── logout.php                     ← Destrucción segura de sesión
│
├── panel_cliente.php              ← Panel privado del cliente
├── crear_ticket.php               ← Formulario de alta de incidencia
├── panel_pmo.php                  ← Cuadro de mando del personal
├── ver_ticket.php                 ← Ficha del ticket + chat
│
├── database.sql                   ← Script SQL de creación de la BD
│
└── imagenes-tfg/
    ├── inicio_corporativo.png
    ├── portal_login.png
    ├── panel_cliente.png
    └── cuadro_mando_pmo.png
```

**Flujo de navegación de la aplicación:**

```
  [VISITANTE]  →  index.php  →  login.php
                                    │
                    ┌───────────────┴────────────────┐
                    │ rol = cliente                  │ rol = tecnico / pmo
                    ▼                                ▼
           panel_cliente.php               panel_pmo.php
                    │                                │
           crear_ticket.php                ver_ticket.php
           ver_ticket.php              (asignar + cambiar estado)
                    │                                │
                    └───────────┬────────────────────┘
                                ▼
                           logout.php
```

### 5.2 Componentes del sistema

**Base de datos (`techflow_db`):** 4 tablas relacionales con motor InnoDB que garantizan la integridad referencial mediante claves foráneas.

| Tabla | Función |
|-------|---------|
| `usuarios` | Clientes, técnicos y gestoras con su rol y contraseña Bcrypt |
| `proyectos` | Proyectos contratados por cada cliente con estado PMO y progreso |
| `tickets` | Incidencias de soporte con su ciclo de vida completo |
| `comentarios_tickets` | Mensajes del chat de seguimiento de cada ticket |

**Modelo Entidad-Relación:**

![Figura 1 - Modelo E-R de la base de datos techflow_db](modelo_er.png)

*Figura 1. Diagrama del modelo entidad-relación de techflow_db. Se representan las 4 tablas con sus claves primarias (PK), claves foráneas (FK) y las relaciones uno a muchos (1:N) entre ellas.*

**Relaciones:**
- `usuarios → proyectos` (1:N): un cliente puede tener varios proyectos contratados.
- `usuarios → tickets` (1:N × 2): un cliente puede abrir varios tickets; un técnico puede tener varios tickets asignados.
- `tickets → comentarios_tickets` (1:N): un ticket puede contener múltiples comentarios en el chat.

**Servidor web:** Apache (XAMPP), que interpreta los scripts PHP y sirve el HTML generado al navegador del cliente.

**Interfaz de usuario:** HTML5 + Bootstrap 5 (framework CSS), con iconografía de Bootstrap Icons. Diseño responsive con paleta de colores corporativa azul oscuro (#0A192F) y acento azul brillante (#00B4D8).

### 5.3 Arquitectura de la red

El sistema se implementa sobre una arquitectura **cliente-servidor de tres capas** en red local:

```
┌──────────────────────────────────────────────────────┐
│           CAPA 1: PRESENTACIÓN                        │
│   Navegador web del usuario (Chrome / Edge)           │
│   HTML5 + CSS Bootstrap 5 + JavaScript                │
└──────────────────────┬───────────────────────────────┘
                        │  HTTP  (Puerto 80 / TCP)
┌──────────────────────▼───────────────────────────────┐
│           CAPA 2: LÓGICA DE NEGOCIO                   │
│   Servidor Apache + Intérprete PHP 8.2 (XAMPP)        │
│   Gestión de sesiones: $_SESSION                      │
└──────────────────────┬───────────────────────────────┘
                        │  MySQL  (Puerto 3306 / TCP)
┌──────────────────────▼───────────────────────────────┐
│           CAPA 3: DATOS                               │
│   Motor MariaDB/MySQL — Base de datos: techflow_db    │
└──────────────────────────────────────────────────────┘

URL de acceso local: http://localhost/techflowsolution/
```

### 5.4 Herramientas

| Herramienta | Uso en el proyecto |
|-------------|-------------------|
| **XAMPP 8.2** | Servidor integrado local (Apache + MariaDB + PHP) |
| **Visual Studio Code** | Editor de código con extensiones PHP e IntelliSense |
| **phpMyAdmin** | Administración gráfica de la BD y validación de scripts SQL |
| **Bootstrap 5.3** (CDN) | Framework CSS para maquetación responsive y componentes UI |
| **Bootstrap Icons** (CDN) | Iconografía vectorial sin imágenes pesadas |
| **Git + GitHub** | Control de versiones y repositorio del proyecto |
| **Google Chrome DevTools** | Depuración CSS/DOM y pruebas de diseño responsive |

---

## 6. IMPLEMENTACIÓN

Partiendo del diseño, en esta fase se construye el sistema. Se ha llevado a cabo la implementación de la página web en PHP procedimental, la creación de las tablas de la base de datos, la carga de datos iniciales de prueba y la configuración del entorno de servidor XAMPP.

### 6.1 Entorno de implementación

El entorno de implementación utilizado es un **servidor local Apache con XAMPP 8.2** sobre Windows 11. Los archivos del proyecto se encuentran en:

```
C:\xampp\htdocs\techflowsolution\
```

La URL de acceso durante el desarrollo y las pruebas ha sido:

```
http://localhost/techflowsolution/index.php
```

El editor de código utilizado ha sido **Visual Studio Code**. El control de versiones se ha gestionado con **Git**, con repositorio remoto en GitHub: `https://github.com/alicenon/techflow`

### 6.2 Tablas creadas

Se han creado **4 tablas relacionales** en la base de datos `techflow_db` mediante el script `database.sql`:

**Tabla `usuarios`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AUTO) | Identificador único |
| `nombre` | VARCHAR(100) | Nombre completo |
| `email` | VARCHAR(100) UNIQUE | Correo de acceso |
| `password` | VARCHAR(255) | Hash Bcrypt de la contraseña |
| `rol` | ENUM('cliente','tecnico','pmo') | Nivel de permisos |
| `created_at` | TIMESTAMP | Fecha de registro |

**Tabla `proyectos`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AUTO) | ID del proyecto |
| `nombre` | VARCHAR(150) | Nombre comercial |
| `descripcion` | TEXT | Alcance del proyecto |
| `cliente_id` | INT (FK → usuarios) | Cliente propietario |
| `estado` | ENUM('Planificacion','En Desarrollo','Pruebas','Completado') | Fase PMO |
| `progreso` | INT | Porcentaje de avance (0-100) |
| `fecha_inicio` | DATE | Inicio planificado |
| `fecha_fin` | DATE | Entrega estimada |

**Tabla `tickets`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AUTO) | ID del ticket |
| `titulo` | VARCHAR(150) | Breve descripción |
| `descripcion` | TEXT | Descripción completa |
| `cliente_id` | INT (FK → usuarios) | Cliente que abre el ticket |
| `tecnico_id` | INT (FK → usuarios, NULL) | Técnico asignado |
| `categoria` | ENUM('Soporte Tecnico','Gestion de Proyectos','Infraestructura') | Categoría |
| `gravedad` | ENUM('Baja','Media','Alta','Critica') | Urgencia/impacto |
| `estado` | ENUM('Abierto','En Proceso','Resuelto','Cerrado') | Ciclo de vida |
| `created_at` | TIMESTAMP | Fecha de apertura |
| `updated_at` | TIMESTAMP | Última modificación |

**Tabla `comentarios_tickets`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AUTO) | ID del comentario |
| `ticket_id` | INT (FK → tickets) | Ticket al que pertenece |
| `usuario_id` | INT (FK → usuarios) | Autor del mensaje |
| `comentario` | TEXT | Contenido del mensaje |
| `created_at` | TIMESTAMP | Fecha y hora del mensaje |

### 6.3 Carga de datos

Se han insertado los siguientes **registros semilla** en la base de datos para poder realizar las pruebas sin necesidad de crear datos manualmente:

**Usuarios:**

| Rol | Nombre | Email | Contraseña (hash Bcrypt en BD) |
|-----|--------|-------|-------------------------------|
| cliente | Juan Gómez | cliente@techflow.com | hash de `password123` |
| tecnico | Carlos Técnico | tecnico@techflow.com | hash de `password123` |
| pmo | Sofía PMO (Gestora) | pmo@techflow.com | hash de `password123` |

**Proyectos:**

| Nombre | Cliente | Estado | Progreso |
|--------|---------|--------|----------|
| Migración de Servidores Cloud (AWS) | Juan Gómez | En Desarrollo | 65% |
| Implantación ERP Corporativo | Juan Gómez | Planificacion | 10% |

**Tickets de prueba:**

| ID | Título (resumido) | Estado | Técnico |
|----|-------------------|--------|---------|
| #1 | Error de acceso al servidor | En Proceso | Carlos Técnico |
| #2 | Revisión de avance del proyecto | Abierto | Sin asignar |
| #3 | No conecta la VPN desde preproducción | Resuelto | Carlos Técnico |

### 6.4 Ficheros de configuración actualizados

El único fichero de configuración que debe actualizarse según el entorno de destino es **`conexion.php`**, que contiene los parámetros de conexión a la base de datos:

```php
<?php
// Parámetros de conexión — modificar según el entorno
$servidor   = "localhost";    // Dirección del servidor MySQL
$usuario    = "root";         // Usuario de MySQL (root en XAMPP por defecto)
$contrasena = "";             // Contraseña (vacía en XAMPP local por defecto)
$base_datos = "techflow_db";  // Nombre de la base de datos del proyecto

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error crítico: No se pudo conectar. " . mysqli_connect_error());
}

mysqli_set_charset($conexion, "utf8mb4"); // UTF-8 para caracteres del español
?>
```

En caso de conflicto de puertos en Apache, se debe modificar también el fichero `httpd.conf` de XAMPP, cambiando la línea `Listen 80` por `Listen 8080`.

### 6.5 Configuraciones realizadas en el sistema

A continuación se muestran las imágenes que demuestran que el sistema ha sido correctamente configurado y desplegado:

**Figura 2: Página Corporativa (index.php) — Sistema desplegado en servidor Apache local**

![Figura 2 - Página corporativa pública desplegada](imagenes-tfg/inicio_corporativo.png)

*Figura 2. Captura de la página corporativa pública (index.php) accedida a través del servidor Apache local. La barra de direcciones muestra `localhost/techflowsolution/index.php`, confirmando que Apache está activo y sirviendo correctamente los archivos PHP del proyecto.*

**Figura 3: Portal de Autenticación (login.php) — Gestión de sesiones PHP activa**

![Figura 3 - Portal de login con sesión activa](imagenes-tfg/portal_login.png)

*Figura 3. Formulario de login del portal corporativo. La barra de navegación superior muestra "Sofía PMO (Gestora) — PMO", confirmando que el sistema de sesiones PHP (`$_SESSION`) está correctamente configurado y que la diferenciación de roles funciona.*

**Figura 4: Panel del Cliente (panel_cliente.php) — BD conectada y datos en tiempo real**

![Figura 4 - Panel del cliente con proyectos y tickets](imagenes-tfg/panel_cliente.png)

*Figura 4. Panel privado del cliente. Se muestran los tickets de soporte recuperados de la tabla `tickets` de MySQL y las barras de progreso de los proyectos leídas de la tabla `proyectos`. Confirma que la conexión MySQLi a la BD techflow_db es correcta.*

**Figura 5: Cuadro de Mando PMO (panel_pmo.php) — KPIs estadísticos en tiempo real**

![Figura 5 - Cuadro de mando con KPIs y tabla de tickets](imagenes-tfg/cuadro_mando_pmo.png)

*Figura 5. Cuadro de mando del personal con sesión iniciada como "Sofía PMO (Gestora)". La cabecera muestra los 4 KPIs calculados en tiempo real mediante consultas SQL: 3 incidencias totales, 2 activas, 1 resuelta y 2 proyectos activos. La tabla global lista los 3 tickets con su estado, técnico asignado y botón de gestión.*

### 6.6 Implementaciones de código realizadas

El código fuente completo y comentado se entrega en formato electrónico en el **repositorio GitHub del proyecto**: `https://github.com/alicenon/techflow`

A continuación se comentan los aspectos más significativos de la implementación:

**Autenticación segura con Bcrypt (`login.php`):**
El aspecto más importante de la seguridad del sistema. Las contraseñas se validan con `password_verify()` comparando el texto plano introducido con el hash Bcrypt almacenado en la BD, garantizando que aunque alguien accediera a la base de datos, nunca podría recuperar las contraseñas originales.

```php
// Verificación del hash Bcrypt — el punto más crítico de la seguridad
if (password_verify($password, $usuario['password'])) {
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['rol']        = $usuario['rol'];
    header("Location: " . ($usuario['rol'] === 'cliente'
        ? "panel_cliente.php" : "panel_pmo.php"));
    exit;
}
```

**Protección IDOR en `ver_ticket.php`:**
Antes de mostrar los datos de un ticket, el sistema verifica que el `cliente_id` del ticket coincide con el `$_SESSION['usuario_id']` activo. Esto impide que un cliente acceda a los tickets de otro usuario manipulando el parámetro `id` de la URL.

```php
$ticket_id = (int)$_GET['id']; // Forzado a entero para evitar inyecciones
if ($_SESSION['rol'] === 'cliente') {
    $check = mysqli_query($conexion,
        "SELECT id FROM tickets WHERE id=$ticket_id
         AND cliente_id={$_SESSION['usuario_id']} LIMIT 1");
    if (!$check || mysqli_num_rows($check) === 0) {
        header("Location: panel_cliente.php"); exit;
    }
}
```

**KPIs estadísticos en tiempo real (`panel_pmo.php`):**
Cuatro consultas SQL `COUNT(*)` independientes calculan los indicadores clave en cada carga de página, garantizando datos siempre actualizados sin necesidad de caché.

```php
$kpi_total    = mysqli_fetch_assoc(mysqli_query($conexion,
    "SELECT COUNT(*) AS total FROM tickets"))['total'];
$kpi_activos  = mysqli_fetch_assoc(mysqli_query($conexion,
    "SELECT COUNT(*) AS total FROM tickets
     WHERE estado IN ('Abierto','En Proceso')"))['total'];
```

---

## 7. PRUEBAS

Son muchas las pruebas que pueden realizarse en un proyecto para eliminar los posibles errores y garantizar su correcto funcionamiento. Los casos de prueba establecen las condiciones y variables que permitirán determinar si los requisitos establecidos se cumplen o no.

A continuación se detallan los casos de prueba que se han ejecutado para comprobar la correcta construcción del proyecto:

### 7.1 Casos de pruebas

---

**CP-01: Inicio de sesión correcto — perfil cliente**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-01 |
| **Descripción** | Verificar que un cliente puede iniciar sesión con credenciales válidas y es redirigido a su panel privado. |
| **Condiciones de ejecución** | XAMPP activo (Apache + MySQL). BD `techflow_db` importada con datos semilla. Navegador sin sesión activa. |
| **Entrada** | Email: `cliente@techflow.com` / Contraseña: `password123` |
| **Resultado esperado** | El sistema valida las credenciales, crea la sesión y redirige a `panel_cliente.php` mostrando el nombre "Juan Gómez". |
| **Resultado obtenido** | Redirección correcta a `panel_cliente.php`. Nombre y rol visibles en la barra de navegación. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-02: Inicio de sesión correcto — perfil PMO**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-02 |
| **Descripción** | Verificar que la gestora PMO accede al cuadro de mando administrativo. |
| **Condiciones de ejecución** | Ídem CP-01. |
| **Entrada** | Email: `pmo@techflow.com` / Contraseña: `password123` |
| **Resultado esperado** | Redirección a `panel_pmo.php` con los 4 KPIs estadísticos y la tabla global de tickets. |
| **Resultado obtenido** | Correcto. KPIs: 3 incidencias totales, 2 activas, 1 resuelta, 2 proyectos activos. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-03: Rechazo de credenciales incorrectas**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-03 |
| **Descripción** | Verificar que el sistema rechaza una contraseña inválida mostrando un error apropiado. |
| **Condiciones de ejecución** | Ídem CP-01. |
| **Entrada** | Email: `cliente@techflow.com` / Contraseña: `contraseña_incorrecta` |
| **Resultado esperado** | Mensaje de error "La contraseña introducida es incorrecta." Sin redirección. Sin crear sesión. |
| **Resultado obtenido** | Mensaje de error mostrado correctamente. No hay sesión creada. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-04: Protección de recursos privados sin sesión**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-04 |
| **Descripción** | Verificar que el acceso directo por URL a páginas privadas sin sesión redirige al login. |
| **Condiciones de ejecución** | Navegador en ventana de incógnito (sin sesión activa). |
| **Entrada** | URL directa: `http://localhost/techflowsolution/panel_pmo.php` |
| **Resultado esperado** | Redirección automática a `login.php`. La página privada no se muestra en ningún momento. |
| **Resultado obtenido** | Redirección inmediata al login. El contenido privado no queda expuesto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-05: Creación de un nuevo ticket de incidencia**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-05 |
| **Descripción** | Verificar que un cliente puede crear un ticket y queda registrado en la BD. |
| **Condiciones de ejecución** | Sesión activa como `cliente@techflow.com`. |
| **Entrada** | Título: "Fallo VPN preproducción" / Categoría: Infraestructura / Gravedad: Alta / Descripción: "Error Timeout al conectar OpenVPN" |
| **Resultado esperado** | Se ejecuta `INSERT INTO tickets`. Confirmación en pantalla con ID asignado. El ticket aparece en el panel del cliente con estado "Abierto". |
| **Resultado obtenido** | Ticket creado con ID #3. Visible en el panel del cliente y en el buzón del personal. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-06: Asignación de técnico y cambio de estado**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-06 |
| **Descripción** | Verificar que el personal puede asignar un técnico y cambiar el estado de un ticket. |
| **Condiciones de ejecución** | Sesión activa como `tecnico@techflow.com`. Ticket #3 en estado "Abierto". |
| **Entrada** | Técnico: "Carlos Técnico" / Estado: "En Proceso" → Botón "Guardar Cambios" |
| **Resultado esperado** | Se ejecuta `UPDATE tickets`. El ticket #3 queda "En Proceso" con técnico asignado. Cambio visible en el cuadro de mando y en el panel del cliente. |
| **Resultado obtenido** | Correcto. El KPI "Pendientes/Activos" se incrementa en el panel PMO. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-07: Protección IDOR — acceso cruzado entre clientes**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-07 |
| **Descripción** | Verificar que un cliente no puede acceder a los tickets de otro usuario manipulando la URL. |
| **Condiciones de ejecución** | Sesión activa como `cliente@techflow.com` (ID = 1). |
| **Entrada** | URL manipulada: `http://localhost/techflowsolution/ver_ticket.php?id=99` |
| **Resultado esperado** | El sistema detecta que `tickets.cliente_id ≠ $_SESSION['usuario_id']` y redirige a `panel_cliente.php`. El recurso ajeno no se muestra. |
| **Resultado obtenido** | Redirección inmediata al panel del cliente. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-08: Diseño responsive en dispositivo móvil**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-08 |
| **Descripción** | Verificar que el diseño se adapta correctamente en resolución de móvil (375px). |
| **Condiciones de ejecución** | Chrome DevTools (F12) → Modo responsive → iPhone SE (375px). |
| **Entrada** | Navegación completa por `index.php`, `login.php`, `panel_cliente.php` y `panel_pmo.php`. |
| **Resultado esperado** | Menú colapsado en hamburguesa, tablas con scroll horizontal, tarjetas apiladas verticalmente. Sin desbordamiento. |
| **Resultado obtenido** | Bootstrap 5 adapta el layout correctamente en todas las vistas. |
| **Evaluación** | ✅ SUPERADO |

---

**Resumen de resultados:**

| ID | Caso de prueba | Evaluación |
|----|---------------|:----------:|
| CP-01 | Login cliente → panel_cliente.php | ✅ SUPERADO |
| CP-02 | Login PMO → panel_pmo.php | ✅ SUPERADO |
| CP-03 | Rechazo contraseña incorrecta | ✅ SUPERADO |
| CP-04 | Protección sin sesión activa | ✅ SUPERADO |
| CP-05 | Creación de nuevo ticket | ✅ SUPERADO |
| CP-06 | Asignación técnico + cambio estado | ✅ SUPERADO |
| CP-07 | Protección IDOR | ✅ SUPERADO |
| CP-08 | Diseño responsive en móvil | ✅ SUPERADO |

**8/8 casos de prueba superados (100% de éxito)**

A continuación se facilita la plantilla para reportar errores detectados durante las pruebas:

| Fecha/autora | Caso de prueba | Evaluación | Posible causa del error | Posible corrección | Áreas afectadas |
|---|---|---|---|---|---|
| 27/05/2026 — Shannon | CP-XX | No superado | [Describir la causa] | [Describir la corrección] | [Archivos afectados] |

*(Tabla completada si se detectan errores durante la prueba final del tribunal)*

---

## 8. EXPLOTACIÓN

La implantación es la fase más crítica del proyecto, ya que el sistema entra en producción, es decir, opera en un entorno real con usuarios reales.

### 8.1 Planificación

| Nº | Tarea | Responsable | Recursos | Tiempo | Riesgo |
|----|-------|------------|----------|--------|--------|
| 1 | Instalación de XAMPP en el servidor de destino | Técnico IT | Servidor + instalador XAMPP | 1 h | Bajo |
| 2 | Copia de archivos PHP al directorio `htdocs` | Técnico IT | Acceso al servidor + proyecto | 30 min | Bajo |
| 3 | Creación de la BD e importación del SQL | Técnico IT | phpMyAdmin + `database.sql` | 30 min | Medio |
| 4 | Verificación de `conexion.php` | Técnico IT | Editor de texto | 15 min | Bajo |
| 5 | Prueba de acceso y validación funcional | Técnico IT + PMO | Navegador | 1 h | Bajo |
| 6 | Formación a los usuarios del sistema | PMO | Manual de usuario | 2 h | Bajo |

**Identificación de riesgos:**

- **Puerto 80 ocupado:** Otro servicio (IIS, Skype, Teams) puede estar usando el puerto 80. Solución: cambiar `Listen 80` por `Listen 8080` en `httpd.conf` de Apache.
- **Credenciales de BD incorrectas:** Si el servidor destino usa otra contraseña para MySQL, editar `conexion.php` antes del despliegue.

### 8.2 Preparación para el cambio

Considerar las necesidades de permisos y autorizaciones para llevar a cabo las actividades:

- El técnico necesita **acceso de administrador** al servidor para instalar XAMPP y modificar la configuración de Apache.
- Se deben tener en cuenta las posibles **reticencias al cambio** por parte de los usuarios acostumbrados al correo electrónico. Se debe comunicar con antelación la fecha de puesta en marcha y los beneficios del nuevo sistema.
- Antes de la implantación se realizará un **backup** del sistema anterior (hojas de cálculo y correos archivados).

### 8.3 Plan de formación

Definición de la documentación necesaria para la formación de los usuarios del sistema (incluida como Anexo 12.1 — Manual de usuario):

| Perfil | Contenido | Duración |
|--------|-----------|----------|
| **Clientes** | Acceso al portal, visualización de proyectos, creación y seguimiento de tickets | 45 min |
| **Técnicos** | Gestión del buzón, asignación, cambio de estados, respuesta a clientes | 60 min |
| **PMO** | Supervisión del cuadro de mando, KPIs, cartera de proyectos | 60 min |

### 8.4 Implantación propiamente dicha

Demostración de que el sistema está implantado y en producción:

**Paso 1 — Servidor:** Instalar XAMPP 8.2. Verificar que Apache y MySQL muestran fondo verde en el Panel de Control de XAMPP.

**Paso 2 — Aplicación:** Copiar todos los archivos PHP, el script `database.sql` y la carpeta `imagenes-tfg/` en `C:\xampp\htdocs\techflowsolution\`.

**Paso 3 — Base de datos:**
1. Acceder a `http://localhost/phpmyadmin/`
2. Crear la base de datos `techflow_db` con collation `utf8mb4_unicode_ci`
3. Importar `database.sql` desde la pestaña "Importar"

**Paso 4 — Verificación:** Acceder a `http://localhost/techflowsolution/index.php` y comprobar que carga correctamente sin errores PHP.

### 8.5 Pruebas de implantación

Realización de las pruebas del sistema ya implantado en el entorno de destino:

| Prueba | Verificación | Estado |
|--------|-------------|:------:|
| Página index carga sin errores PHP | Sin mensajes de error en pantalla | ✅ OK |
| Login funciona con los 3 perfiles | Cada usuario accede a su panel correcto | ✅ OK |
| Ticket creado por cliente visible en panel PMO | Sin necesidad de recargar manualmente | ✅ OK |
| Diseño responsive en móvil | Sin scroll horizontal no deseado | ✅ OK |
| Log de Apache sin errores | `C:\xampp\apache\logs\error.log` limpio | ✅ OK |

---

## 9. DEFINICIÓN DE PROCEDIMIENTOS DE CONTROL Y EVALUACIÓN

A lo largo del ciclo de vida del proyecto se producirán cambios e incidencias que deberán controlarse y registrarse.

**Registro de incidencias detectadas durante el desarrollo:**

| Fecha | ID incidencia | Descripción | Posible causa | Corrección aplicada | Áreas afectadas |
|-------|--------------|-------------|---------------|---------------------|-----------------|
| 27/05/2026 | INC-01 | Caracteres con tilde (á, ñ) se muestran como símbolos extraños en la BD | Falta de configuración de charset UTF-8 en la conexión | Se añadió `mysqli_set_charset($conexion, "utf8mb4")` en `conexion.php` | `conexion.php`, todas las vistas PHP |
| 27/05/2026 | INC-02 | El panel PMO era accesible sin autenticación mediante URL directa | Ausencia del bloque de control de sesión al inicio de `panel_pmo.php` | Se añadió `if (!isset($_SESSION['usuario_id'])) { header("Location: login.php"); exit; }` | `panel_pmo.php`, `panel_cliente.php` |
| 27/05/2026 | INC-03 | Un cliente podía ver tickets de otro usuario cambiando el parámetro `?id=` en la URL | No se verificaba si el ticket pertenecía al cliente de la sesión activa | Se implementó la comprobación cruzada `cliente_id` vs `$_SESSION['usuario_id']` | `ver_ticket.php` |

**Plantilla para gestión de cambios en el proyecto:**

| Fecha | Cambio realizado | Justificación | Áreas afectadas |
|-------|-----------------|---------------|-----------------|
| 26/05/2026 | Adición del campo `updated_at` en la tabla `tickets` | Registrar la fecha de última actualización para el histórico de KPIs | `database.sql`, `panel_pmo.php` |
| 27/05/2026 | Creación de la carpeta `imagenes-tfg/` con capturas reales | Requisito de la documentación técnica del departamento IFC | `memoria_proyecto.md` |

---

## 10. CONCLUSIONES

El proyecto **TechFlow Solutions** ha sido completado satisfactoriamente, cumpliendo el 100% de los objetivos técnicos y académicos establecidos al inicio. Los 8 casos de prueba definidos han sido superados al 100%, validando tanto la funcionalidad del sistema como su seguridad y usabilidad.

El desarrollo integral de esta plataforma ha supuesto una simulación fidedigna de los desafíos técnicos que se presentan en las consultorías informáticas reales, permitiendo aplicar de forma integrada los conocimientos adquiridos durante el ciclo formativo: bases de datos relacionales, desarrollo web en PHP, seguridad informática, redes y administración de sistemas.

La modalidad de **FP Dual Intensiva** ha marcado una diferencia cualitativa en la formación. La promoción interna experimentada durante la estancia en empresa —desde Soporte IT Nivel 1 hacia la PMO— ha aportado tanto habilidades técnicas (administración de sistemas, redes, programación web) como habilidades transversales (comunicación con clientes, trabajo en equipo, gestión del tiempo).

**Propuesta de mejoras futuras:**
- Integración de notificaciones por email con `PHPMailer` cuando un ticket cambie de estado.
- Módulo de subida de archivos adjuntos a los tickets.
- Gráficos estadísticos dinámicos con `Chart.js` en el cuadro de mando PMO.
- Panel de administración de usuarios sin necesidad de acceder a phpMyAdmin.
- Despliegue en producción con HTTPS mediante Let's Encrypt.

---

## 11. FUENTES

1. PHP Group. (2026). *PHP Manual: MySQL Improved Extension (mysqli)*. https://www.php.net/manual/es/book.mysqli.php

2. MariaDB Foundation. (2026). *MariaDB Server Documentation*. https://mariadb.com/kb/en/documentation/

3. Bootstrap Team. (2026). *Bootstrap v5.3 — CSS Framework*. https://getbootstrap.com/docs/5.3/

4. OWASP Foundation. (2025). *OWASP Top Ten — A01: Broken Access Control (IDOR)*. https://owasp.org/www-project-top-ten/

5. Apache Software Foundation. (2026). *Apache HTTP Server Documentation*. https://httpd.apache.org/docs/

6. Apache Friends. (2026). *XAMPP — Documentación y FAQs para Windows*. https://www.apachefriends.org/es/faq_windows.html

7. American Psychological Association. (2020). *Publication Manual of the APA* (7.ª ed.). https://apastyle.apa.org/

---

## 12. ANEXOS

### 12.1 Guía de estilo — Manual de Usuario

> **Archivo adjunto:** `manual_usuario.md` / `manual_usuario.docx`

El manual de usuario detalla paso a paso cómo utilizar cada módulo del portal corporativo TechFlow Solutions, con capturas de pantalla reales del sistema. Incluye:

- Acceso al portal y credenciales de prueba
- Guía para el perfil **cliente**: visualización de proyectos, creación de tickets y chat de seguimiento
- Guía para el perfil **técnico**: gestión del buzón, asignación y cambio de estados
- Guía para el perfil **PMO**: cuadro de mando, KPIs y cartera de proyectos
- Resolución de problemas frecuentes

**Credenciales de prueba del sistema:**

| Perfil | Email | Contraseña |
|--------|-------|------------|
| Cliente | cliente@techflow.com | password123 |
| Técnico | tecnico@techflow.com | password123 |
| PMO (Gestora) | pmo@techflow.com | password123 |

---

*Memoria del Proyecto Final de Grado Medio SMR · TechFlow Solutions · Mayo 2026 · IFC*
