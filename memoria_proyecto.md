# PLATAFORMA WEB INTEGRADA DE GESTIÓN DE INCIDENCIAS Y PROYECTOS — TECHFLOW SOLUTIONS
**SMR — Departamento de Informática y Comunicaciones (IFC)**

---

| | |
|---|---|
| **NOMBRE DEL PROYECTO** | TechFlow Solutions — Portal de Gestión Integrada IT & PMO |
| **CICLO FORMATIVO** | Grado Medio en Sistemas Microinformáticos y Redes (SMR) |
| **MODALIDAD** | FP Dual Intensiva |
| **AUTORA** | Shannon |
| **TUTORA DEL PROYECTO** | [Nombre de la tutora del centro] |
| **CURSO ACADÉMICO** | 2025 – 2026 |

*Esta obra está bajo una licencia Reconocimiento-Compartir bajo la misma licencia 3.0 España de Creative Commons.*

---

## Índice de contenido

1. [INTRODUCCIÓN](#1-introducción)
2. [ALCANCE DEL PROYECTO](#2-alcance-del-proyecto)
3. [ESTUDIO DE VIABILIDAD](#3-estudio-de-viabilidad)
   - 3.1 [Estado actual del sistema](#31-estado-actual-del-sistema)
   - 3.2 [Requisitos del cliente](#32-requisitos-del-cliente)
   - 3.3 [Posibles soluciones](#33-posibles-soluciones)
   - 3.4 [Solución elegida](#34-solución-elegida)
   - 3.5 [Planificación temporal de las tareas del proyecto](#35-planificación-temporal-de-las-tareas-del-proyecto-techflow-solutions)
   - 3.6 [Planificación de los recursos a utilizar](#36-planificación-de-los-recursos-a-utilizar)
4. [ANÁLISIS](#4-análisis)
   - 4.1 [Requisitos funcionales](#41-requisitos-funcionales)
   - 4.2 [Requisitos no funcionales](#42-requisitos-no-funcionales)
5. [DISEÑO](#5-diseño)
   - 5.1 [Estructura de la aplicación](#51-estructura-de-la-aplicación)
   - 5.2 [Componentes del sistema](#52-componentes-del-sistema)
   - 5.3 [Arquitectura de la red](#53-arquitectura-de-la-red)
   - 5.4 [Herramientas](#54-herramientas)
6. [IMPLEMENTACIÓN](#6-implementación)
   - 6.1 [Entorno de implementación](#61-entorno-de-implementación)
   - 6.2 [Tablas creadas](#62-tablas-creadas)
   - 6.3 [Carga de datos](#63-carga-de-datos)
   - 6.4 [Ficheros de configuración actualizados](#64-ficheros-de-configuración-actualizados)
   - 6.5 [Configuraciones realizadas en el sistema](#65-configuraciones-realizadas-en-el-sistema)
   - 6.6 [Implementaciones de código realizadas](#66-implementaciones-de-código-realizadas)
7. [PRUEBAS](#7-pruebas)
   - 7.1 [Casos de pruebas](#71-casos-de-pruebas)
8. [EXPLOTACIÓN](#8-explotación)
   - 8.1 [Planificación](#81-planificación)
   - 8.2 [Preparación para el cambio](#82-preparación-para-el-cambio)
   - 8.3 [Plan de formación](#83-plan-de-formación)
   - 8.4 [Implantación propiamente dicha](#84-implantación-propiamente-dicha)
   - 8.5 [Pruebas de implantación](#85-pruebas-de-implantación)
9. [DEFINICIÓN DE PROCEDIMIENTOS DE CONTROL Y EVALUACIÓN](#9-definición-de-procedimientos-de-control-y-evaluación)
10. [CONCLUSIONES](#10-conclusiones)
11. [FUENTES](#11-fuentes)
12. [ANEXOS](#12-anexos)
    - 12.1 [Manual de usuario](#121-manual-de-usuario)

---

## 1. INTRODUCCIÓN

Este documento recoge el trabajo realizado para el **proyecto final** del Ciclo Formativo de Grado Medio en **Sistemas Microinformáticos y Redes (SMR)**, modalidad FP Dual Intensiva.

La alumna realizó su FP Dual en la empresa co-formadora **TechFlow Solutions**, donde comenzó en el departamento de **Soporte IT Nivel 1** y fue promocionada internamente a tareas de apoyo a la **PMO (Oficina de Gestión de Proyectos)**. Esta experiencia práctica directa en empresa motivó el desarrollo de una plataforma web que integra ambas funciones en un único sistema.

Para afrontar el desarrollo, se consultaron recursos de aprendizaje en línea (documentación oficial de PHP y MySQL, tutoriales de Bootstrap, foros de desarrollo web) y se construyó la plataforma de forma progresiva, aplicando los conocimientos adquiridos en cada módulo del ciclo y profundizando en aspectos nuevos como la seguridad web y el diseño responsive.

---

## 2. ALCANCE DEL PROYECTO

El propósito de este proyecto es **diseñar, desarrollar y desplegar una plataforma web corporativa** para TechFlow Solutions, que permita unificar en un único entorno digital la gestión de proyectos PMO y el soporte técnico IT.

El objetivo concreto es crear una aplicación web funcional, segura y de aspecto profesional que:

- Permita a los clientes consultar el estado de sus proyectos y reportar incidencias.
- Permita al personal técnico y gestor supervisar, asignar y resolver dichas incidencias desde un cuadro de mando centralizado.

El desarrollo se lleva a cabo en las siguientes fases: estudio de viabilidad, análisis, diseño, implementación, pruebas y explotación.

---

## 3. ESTUDIO DE VIABILIDAD

En esta fase se considera si el proyecto se puede realizar teniendo en cuenta las circunstancias de la empresa, las soluciones posibles y los recursos disponibles.

### 3.1 Estado actual del sistema

El sistema actual de la empresa **no dispone de ninguna herramienta centralizada** para gestionar incidencias ni proyectos. La situación previa es:

- La comunicación con los clientes sobre incidencias se realiza íntegramente por **correo electrónico**, sin posibilidad de priorizar ni asignar responsable.
- El seguimiento de proyectos se actualiza manualmente en **hojas de cálculo Excel**, sin visibilidad en tiempo real para el cliente.
- No existe registro formal de apertura, asignación ni cierre de incidencias.
- No hay control de accesos: cualquier miembro del equipo puede ver y modificar cualquier dato.

Como consecuencia, hay incidencias sin resolver, clientes insatisfechos y ausencia de datos históricos para medir el rendimiento del equipo.

### 3.2 Requisitos del cliente

El cliente solicita para el nuevo sistema:

- Acceso desde cualquier navegador web, sin instalar software adicional.
- Acceso diferenciado por perfil: cliente, técnico de soporte y gestora PMO.
- Visualización del estado y avance de los proyectos en tiempo real.
- Posibilidad de reportar incidencias con título, categoría y nivel de gravedad.
- Asignación de técnico responsable y seguimiento del estado de cada incidencia.
- Canal de comunicación interno entre cliente y técnico por incidencia (chat).
- Panel de indicadores estadísticos (KPIs) para el equipo gestor.
- Interfaz web moderna, responsive y con imagen profesional.
- Contraseñas almacenadas de forma segura en la base de datos.

### 3.3 Posibles soluciones

Existen otras herramientas que ofrecen funcionalidades similares:

- **Jira Service Management:** solución corporativa líder que integra soporte y proyectos. Coste elevado para una PYME, curva de aprendizaje alta y dependencia de servidores externos.
- **Zendesk / Freshdesk:** excelente gestión de tickets, pero sin módulo PMO nativo. Para integrar ambas funciones requiere contratar servicios adicionales de pago.
- **WordPress + plugins de tickets:** despliegue rápido, pero los plugins no integran módulo PMO real. Se valoró esta opción inicialmente como punto de partida, pero se descartó porque limitaba la personalización del modelo de datos y no permitía aprender el funcionamiento interno de las tecnologías.
- **Trello / Asana / Monday:** herramientas visuales de planificación, completamente desconectadas del canal de soporte técnico.

Ninguna de estas opciones ofrece, de forma gratuita y con despliegue sencillo, la integración real entre soporte IT y PMO que requiere la empresa.

### 3.4 Solución elegida

Se elige el **desarrollo web a medida** con PHP, MySQL y Bootstrap 5 sobre servidor Apache local (XAMPP). Esta decisión se justifica por:

- **Coste cero:** todo el software es gratuito y de código libre.
- **Control total:** el código es propiedad de la empresa, sin dependencias externas.
- **Integración real PMO + Soporte IT** en un único modelo de datos relacional.
- **Aprendizaje:** el desarrollo en PHP permitió aplicar directamente los contenidos del ciclo formativo y profundizar en áreas nuevas. Para el diseño responsive se eligió Bootstrap 5 en lugar de CSS puro, ya que proporciona un sistema de rejilla y componentes ya probados que reducen el tiempo de desarrollo y garantizan compatibilidad entre dispositivos.
- **Despliegue sencillo** sobre cualquier equipo con XAMPP instalado.

Nace así el nuevo proyecto denominado **TechFlow Solutions — Portal de Gestión Integrada IT & PMO**.

### 3.5 Planificación temporal de las tareas del proyecto [TechFlow Solutions]

Se identifican las tareas del proyecto y se estima el tiempo necesario. El proyecto es desarrollado por **1 persona** en **3 días de trabajo intensivo**.

> 📷 **[Insertar aquí la imagen del diagrama de Gantt]**

*Figura 1. Diagrama de Gantt del proyecto TechFlow Solutions. Las tres fases muestran la distribución de tareas a lo largo de los 3 días de desarrollo.*

| Fase | Tarea | Día | Horas |
|------|-------|:---:|:-----:|
| BD y estructura | Diseño E-R + `database.sql` + `conexion.php` | 1 | 5 h |
| BD y estructura | `header.php` + `footer.php` | 1 | 3 h |
| Módulos web | `index.php` + `login.php` + `logout.php` | 2 | 4 h |
| Módulos web | `panel_cliente.php` + `crear_ticket.php` | 2 | 4 h |
| Módulos web | `panel_pmo.php` + `ver_ticket.php` | 2–3 | 5 h |
| Pruebas y docs | Pruebas funcionales + corrección | 3 | 3 h |
| Pruebas y docs | Memoria + manual + GitHub | 3 | 7 h |

*Tabla 1. Desglose de tareas por fase, día y horas estimadas.*

### 3.6 Planificación de los recursos a utilizar

Para solventar los problemas que plantea el proyecto TechFlow Solutions se utilizan los siguientes recursos:

| Perfil | Rol | Dedicación |
|--------|-----|:----------:|
| Alumna (Shannon) | Desarrolladora web y documentadora | 100% |
| Tutora del centro | Supervisión académica | Puntual |
| Tutora de empresa | Validación de requisitos | Puntual |

*Tabla 2. Recursos humanos del proyecto.*

| Recurso | Detalle |
|---------|---------|
| Equipo de desarrollo | PC Windows 11, Core i5, 8 GB RAM, SSD |
| Servidor local | XAMPP 8.2 (Apache + MariaDB + PHP) |
| Editor de código | Visual Studio Code |
| Navegador de pruebas | Google Chrome con DevTools |
| Control de versiones | Git + GitHub |
| Framework CSS | Bootstrap 5.3 (CDN, gratuito) |

*Tabla 3. Recursos de hardware y software. Coste económico total: 0 € (todo el software es libre).*

---

## 4. ANÁLISIS

En esta fase se establecen los requisitos del sistema. Una vez que el cliente acepta el nuevo proyecto, hay que dejar claro y por escrito qué requisitos debe cumplir el sistema.

### 4.1 Requisitos funcionales

Son los que determinan qué tareas tiene que realizar el sistema:

**Perfil cliente:**
- Iniciar sesión y acceder a un panel privado personalizado.
- Visualizar los proyectos contratados con nombre, estado y porcentaje de progreso.
- Crear nuevas incidencias con título, categoría, gravedad y descripción.
- Consultar el chat de seguimiento de cada incidencia y añadir respuestas.
- No poder ver datos ni tickets de otros clientes.

**Perfil técnico / PMO:**
- Acceder a un cuadro de mando con indicadores KPI en tiempo real.
- Ver una tabla global con todas las incidencias del sistema.
- Asignar técnico responsable a cada incidencia y cambiar su estado.
- Responder al cliente en el chat de seguimiento.
- Consultar la cartera de proyectos activos.

**Área pública:**
- Mostrar una página corporativa con servicios y formulario de contacto.

### 4.2 Requisitos no funcionales

Son propiedades o cualidades que el sistema debe cumplir:

- **Diseño responsive:** adaptación a escritorio, tableta y móvil sin errores de maquetación.
- **Seguridad en contraseñas:** almacenamiento mediante hash Bcrypt, nunca en texto plano.
- **Control de sesiones:** el acceso a páginas privadas sin sesión activa redirige al login.
- **Protección de datos:** un cliente no puede acceder a los recursos de otro usuario.
- **Tiempo de respuesta:** carga de páginas inferior a 2 segundos en entorno local.
- **Codificación UTF-8:** soporte correcto de tildes y caracteres del español.

---

## 5. DISEÑO

En esta fase se realiza una aproximación al diseño tecnológico de la solución. Se describe cómo desarrollar los requisitos establecidos, apoyándose en la estructura de la aplicación, la arquitectura de la red y los componentes del sistema.

### 5.1 Estructura de la aplicación

Se trata del desarrollo de una aplicación web en PHP procedimental. El árbol de archivos del proyecto es el siguiente:

```
techflowsolution/
├── conexion.php          ← Conector MySQLi a la base de datos
├── header.php            ← Cabecera HTML con menú dinámico por rol
├── footer.php            ← Pie de página corporativo común
├── index.php             ← Página corporativa pública
├── login.php             ← Autenticación y gestión de sesiones
├── logout.php            ← Cierre de sesión seguro
├── panel_cliente.php     ← Panel privado del cliente
├── crear_ticket.php      ← Formulario de nueva incidencia
├── panel_pmo.php         ← Cuadro de mando del personal
├── ver_ticket.php        ← Ficha del ticket y chat de seguimiento
└── database.sql          ← Script SQL de creación de la BD
```

*Figura 2. Árbol de archivos del proyecto TechFlow Solutions.*

**Flujo de navegación de la aplicación:**

> 📷 **[Insertar aquí la imagen del flujo de navegación]**

*Figura 3. Flujo de navegación. Según el rol autenticado, el sistema redirige al panel del cliente o al cuadro de mando del personal.*

### 5.2 Componentes del sistema

**Base de datos (`techflow_db`):** 4 tablas relacionales con motor InnoDB.

| Tabla | Función |
|-------|---------|
| `usuarios` | Clientes, técnicos y gestoras con su rol y contraseña cifrada |
| `proyectos` | Proyectos contratados por cada cliente con estado PMO y progreso |
| `tickets` | Incidencias de soporte con su ciclo de vida completo |
| `comentarios_tickets` | Mensajes del chat de seguimiento de cada ticket |

*Tabla 4. Tablas de la base de datos techflow_db.*

![Figura 4 - Diagrama de relaciones de la BD techflow_db en phpMyAdmin](imagenes-tfg/diagrama_bd_phpmyadmin.png)

*Figura 4. Diagrama de relaciones de techflow_db generado con phpMyAdmin. Se observan las 4 tablas InnoDB con sus campos y las relaciones: usuarios → proyectos (1:N), usuarios → tickets (1:N × 2) y tickets → comentarios_tickets (1:N).*

**Servidor web:** Apache (XAMPP), que interpreta los scripts PHP y sirve el HTML generado al navegador.

**Interfaz de usuario:** HTML5 + Bootstrap 5 con Bootstrap Icons. Se eligió Bootstrap frente a CSS puro porque proporciona un sistema de rejilla responsive ya probado con componentes reutilizables (tarjetas, tablas, formularios), lo que reduce significativamente el tiempo de desarrollo.

### 5.3 Arquitectura de la red

El sistema se implementa sobre una arquitectura **cliente-servidor de tres capas** en red local:

> 📷 **[Insertar aquí la imagen de la arquitectura de red]**

*Figura 5. Arquitectura cliente-servidor de tres capas del sistema TechFlow Solutions. URL de acceso local: `http://localhost/techflowsolution/`*

### 5.4 Herramientas

| Herramienta | Uso en el proyecto |
|-------------|-------------------|
| **XAMPP 8.2** | Servidor integrado (Apache + MariaDB + PHP) |
| **Visual Studio Code** | Editor de código principal |
| **phpMyAdmin** | Administración visual de la BD y validación de scripts SQL |
| **Bootstrap 5.3** (CDN) | Framework CSS responsive |
| **Bootstrap Icons** (CDN) | Iconografía vectorial |
| **Git + GitHub** | Control de versiones y repositorio |
| **Chrome DevTools** | Depuración y pruebas de diseño responsive |

*Tabla 5. Herramientas utilizadas en el desarrollo.*

---

## 6. IMPLEMENTACIÓN

Partiendo del diseño, en esta fase se construye el sistema. Se implementa la aplicación web en PHP procedimental, se crean las tablas de la BD, se cargan los datos iniciales y se configura el entorno de servidor.

### 6.1 Entorno de implementación

El entorno utilizado es un **servidor local Apache con XAMPP 8.2** sobre Windows 11. Los archivos del proyecto se encuentran en:

```
C:\xampp\htdocs\techflowsolution\
```

URL de acceso durante el desarrollo:

```
http://localhost/techflowsolution/index.php
```

El editor de código utilizado es Visual Studio Code. El control de versiones se gestiona con Git, con repositorio remoto en GitHub: `https://github.com/alicenon/techflow`

### 6.2 Tablas creadas

Se crean 4 tablas relacionales en la base de datos `techflow_db` mediante el script `database.sql`:

**Tabla `usuarios`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT PK AUTO | Identificador único |
| `nombre` | VARCHAR(100) | Nombre completo |
| `email` | VARCHAR(100) UNIQUE | Correo de acceso |
| `password` | VARCHAR(255) | Hash Bcrypt de la contraseña |
| `rol` | ENUM('cliente','tecnico','pmo') | Nivel de permisos |
| `created_at` | TIMESTAMP | Fecha de registro |

*Tabla 6. Estructura de la tabla usuarios.*

**Tabla `proyectos`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT PK AUTO | ID del proyecto |
| `nombre` | VARCHAR(150) | Nombre comercial |
| `cliente_id` | INT FK → usuarios | Cliente propietario |
| `estado` | ENUM('Planificacion'…'Completado') | Fase PMO |
| `progreso` | INT | Porcentaje de avance (0-100) |
| `fecha_inicio` / `fecha_fin` | DATE | Fechas de planificación |

*Tabla 7. Estructura de la tabla proyectos.*

**Tabla `tickets`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT PK AUTO | ID del ticket |
| `titulo` | VARCHAR(150) | Breve descripción |
| `cliente_id` | INT FK → usuarios | Cliente que abre el ticket |
| `tecnico_id` | INT FK → usuarios NULL | Técnico asignado |
| `categoria` | ENUM('Soporte Tecnico'…) | Categoría de la incidencia |
| `gravedad` | ENUM('Baja','Media','Alta','Critica') | Nivel de urgencia |
| `estado` | ENUM('Abierto'…'Cerrado') | Ciclo de vida |
| `created_at` / `updated_at` | TIMESTAMP | Fechas de registro |

*Tabla 8. Estructura de la tabla tickets.*

**Tabla `comentarios_tickets`:**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT PK AUTO | ID del comentario |
| `ticket_id` | INT FK → tickets | Ticket al que pertenece |
| `usuario_id` | INT FK → usuarios | Autor del mensaje |
| `comentario` | TEXT | Contenido del mensaje |
| `created_at` | TIMESTAMP | Fecha y hora del mensaje |

*Tabla 9. Estructura de la tabla comentarios_tickets.*

### 6.3 Carga de datos

Se insertan los siguientes registros de prueba en la base de datos:

| Rol | Nombre | Email |
|-----|--------|-------|
| cliente | Juan Gómez | cliente@techflow.com |
| tecnico | Carlos Técnico | tecnico@techflow.com |
| pmo | Sofía PMO | pmo@techflow.com |

*Tabla 10. Usuarios de prueba. Las contraseñas (`password123`) se almacenan como hash Bcrypt en BD.*

| Proyecto | Estado | Progreso |
|----------|--------|:--------:|
| Migración de Servidores Cloud (AWS) | En Desarrollo | 65% |
| Implantación ERP Corporativo | Planificacion | 10% |

*Tabla 11. Proyectos de prueba asignados al cliente Juan Gómez.*

### 6.4 Ficheros de configuración actualizados

El único fichero que hay que actualizar según el entorno de destino es **`conexion.php`**:

```php
<?php
$servidor   = "localhost";    // Dirección del servidor MySQL
$usuario    = "root";         // Usuario MySQL (root en XAMPP por defecto)
$contrasena = "";             // Contraseña (vacía en XAMPP estándar)
$base_datos = "techflow_db";  // Nombre de la base de datos

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);
mysqli_set_charset($conexion, "utf8mb4"); // Soporte de caracteres en español
?>
```

*Figura 6. Fichero conexion.php — único punto de configuración de la conexión a la BD.*

### 6.5 Configuraciones realizadas en el sistema

A continuación se muestran capturas que demuestran que el sistema está correctamente configurado y desplegado:

---

> 📷 **[Insertar captura de index.php — página pública]**
>
> *Figura 7. Página corporativa pública desplegada en el servidor Apache local. La URL `localhost/techflowsolution/` confirma que el servidor sirve correctamente los archivos PHP.*

---

> 📷 **[Insertar captura de panel_cliente.php]**
>
> *Figura 8. Panel privado del cliente con proyectos y tickets recuperados en tiempo real desde MySQL. Confirma que la conexión MySQLi a techflow_db funciona correctamente.*

---

> 📷 **[Insertar captura de panel_pmo.php]**
>
> *Figura 9. Cuadro de mando del personal PMO con los 4 indicadores KPI calculados en tiempo real mediante consultas SQL.*

---

### 6.6 Implementaciones de código realizadas

El código fuente completo y comentado se entrega en formato electrónico en el repositorio GitHub del proyecto: `https://github.com/alicenon/techflow`

A continuación se comentan los aspectos más significativos:

**Sistema de autenticación segura (`login.php`):**

Las contraseñas nunca se almacenan en texto plano. Se utiliza el algoritmo **Bcrypt**, que transforma la contraseña en un hash unidireccional. La verificación se realiza con la función `password_verify()` de PHP:

> 📷 **[Insertar aquí la imagen del esquema de autenticación]**

*Figura 10. Proceso de autenticación con verificación de hash Bcrypt.*

Si se intenta acceder directamente a una URL privada sin sesión activa, el sistema redirige automáticamente al formulario de login.

**KPIs estadísticos en tiempo real (`panel_pmo.php`):**

El cuadro de mando calcula los indicadores mediante consultas SQL `COUNT(*)` en cada carga de página:

```php
// Total de incidencias en el sistema
$total = mysqli_fetch_assoc(
    mysqli_query($conexion, "SELECT COUNT(*) AS n FROM tickets")
)['n'];

// Incidencias activas (pendientes de resolver)
$activas = mysqli_fetch_assoc(
    mysqli_query($conexion,
        "SELECT COUNT(*) AS n FROM tickets
         WHERE estado IN ('Abierto','En Proceso')")
)['n'];
```

*Figura 11. Fragmento del panel_pmo.php para el cálculo de KPIs en tiempo real.*

---

## 7. PRUEBAS

Son muchas las pruebas que se pueden realizar en un proyecto para eliminar errores y garantizar el correcto funcionamiento. Los casos de prueba establecen las condiciones que permiten determinar si los requisitos se cumplen o no.

### 7.1 Casos de pruebas

**CP-01: Inicio de sesión correcto**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-01 |
| **Descripción** | El cliente inicia sesión con credenciales válidas y accede a su panel. |
| **Condiciones** | XAMPP activo. BD importada con datos de prueba. Sin sesión previa. |
| **Entrada** | Email: `cliente@techflow.com` / Contraseña: `password123` |
| **Resultado esperado** | Redirección a `panel_cliente.php` con el nombre del usuario en la barra de navegación. |
| **Resultado obtenido** | Correcto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-02: Rechazo de credenciales incorrectas**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-02 |
| **Descripción** | El sistema rechaza una contraseña inválida sin exponer información sensible. |
| **Condiciones** | Ídem CP-01. |
| **Entrada** | Email correcto / Contraseña incorrecta. |
| **Resultado esperado** | Mensaje de error visible. Sin redirección. Sin crear sesión. |
| **Resultado obtenido** | Correcto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-03: Acceso sin sesión activa**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-03 |
| **Descripción** | El acceso directo a una página privada sin sesión redirige al login. |
| **Condiciones** | Navegador en ventana de incógnito. |
| **Entrada** | URL directa: `http://localhost/techflowsolution/panel_pmo.php` |
| **Resultado esperado** | Redirección automática a `login.php`. El contenido privado no se muestra. |
| **Resultado obtenido** | Correcto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-04: Creación de un nuevo ticket**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-04 |
| **Descripción** | El cliente crea una incidencia y queda registrada en la BD. |
| **Condiciones** | Sesión activa como cliente. |
| **Entrada** | Título, categoría, gravedad y descripción. |
| **Resultado esperado** | El ticket aparece en el panel del cliente y en el buzón del personal. |
| **Resultado obtenido** | Correcto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-05: Asignación de técnico y cambio de estado**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-05 |
| **Descripción** | El personal asigna un técnico y actualiza el estado del ticket. |
| **Condiciones** | Sesión activa como técnico. Ticket en estado "Abierto". |
| **Entrada** | Selección de técnico + estado "En Proceso" → Guardar. |
| **Resultado esperado** | El ticket queda actualizado y el KPI "Activos" se incrementa. |
| **Resultado obtenido** | Correcto. |
| **Evaluación** | ✅ SUPERADO |

---

**CP-06: Diseño responsive en móvil**

| Campo | Detalle |
|-------|---------|
| **Identificador** | CP-06 |
| **Descripción** | La interfaz se adapta correctamente a resolución de móvil (375px). |
| **Condiciones** | Chrome DevTools → dispositivo móvil (375px). |
| **Entrada** | Navegación completa por todas las páginas del portal. |
| **Resultado esperado** | Menú hamburguesa, tarjetas apiladas, sin scroll horizontal. |
| **Resultado obtenido** | Correcto. Bootstrap 5 adapta el layout en todas las vistas. |
| **Evaluación** | ✅ SUPERADO |

---

| ID | Caso de prueba | Evaluación |
|----|---------------|:----------:|
| CP-01 | Login con credenciales válidas | ✅ SUPERADO |
| CP-02 | Rechazo de contraseña incorrecta | ✅ SUPERADO |
| CP-03 | Protección sin sesión activa | ✅ SUPERADO |
| CP-04 | Creación de nuevo ticket | ✅ SUPERADO |
| CP-05 | Asignación técnico + cambio estado | ✅ SUPERADO |
| CP-06 | Diseño responsive en móvil | ✅ SUPERADO |

*Tabla 12. Resumen de resultados: 6/6 casos de prueba superados.*

**Registro de errores detectados durante la prueba final:**

| Fecha / autora | Caso de prueba | Evaluación | Posible causa | Corrección aplicada | Áreas afectadas |
|---|---|---|---|---|---|
| | | | | | |

*Tabla 13. Plantilla para registrar incidencias detectadas en la prueba final. Completar si se detecta algún error.*

---

## 8. EXPLOTACIÓN

La implantación es la fase más crítica del proyecto, ya que el sistema entra en producción con usuarios y datos reales.

### 8.1 Planificación

| Nº | Tarea | Responsable | Tiempo | Riesgo |
|----|-------|------------|:------:|:------:|
| 1 | Instalación de XAMPP en el servidor de destino | Técnico IT | 1 h | Bajo |
| 2 | Copia de archivos al directorio htdocs | Técnico IT | 30 min | Bajo |
| 3 | Creación de la BD e importación del SQL | Técnico IT | 30 min | Medio |
| 4 | Verificación de conexion.php | Técnico IT | 15 min | Bajo |
| 5 | Prueba de acceso y validación funcional | Técnico + PMO | 1 h | Bajo |
| 6 | Formación a los usuarios | PMO | 2 h | Bajo |

*Tabla 14. Planificación de la implantación.*

Riesgos identificados:
- **Puerto 80 ocupado** por otro servicio: cambiar `Listen 80` por `Listen 8080` en `httpd.conf` de Apache.
- **Credenciales de BD distintas en el servidor destino:** editar `conexion.php` antes del despliegue.

### 8.2 Preparación para el cambio

Para la implantación se deben tener en cuenta:

- El técnico necesita **acceso de administrador** al servidor para instalar XAMPP.
- Se comunicará el cambio al equipo con antelación, explicando los beneficios respecto al sistema de correo electrónico actual.
- Antes de la implantación se realizará un **backup** del sistema anterior (hojas de cálculo y correos archivados).

### 8.3 Plan de formación

| Perfil | Contenido | Duración |
|--------|-----------|:--------:|
| **Clientes** | Acceso, proyectos, tickets y chat | 45 min |
| **Técnicos** | Buzón, asignación, estados y respuestas | 60 min |
| **PMO** | Cuadro de mando, KPIs y cartera | 60 min |

*Tabla 15. Plan de formación por perfil. Material disponible en el Anexo 12.1.*

### 8.4 Implantación propiamente dicha

**Paso 1 — Servidor:** instalar XAMPP 8.2 y arrancar Apache y MySQL desde el Panel de Control.

**Paso 2 — Aplicación:** copiar todos los archivos del proyecto en `C:\xampp\htdocs\techflowsolution\`.

**Paso 3 — Base de datos:**
1. Acceder a `http://localhost/phpmyadmin/`
2. Crear la base de datos `techflow_db` con collation `utf8mb4_unicode_ci`
3. Importar el archivo `database.sql` desde la pestaña "Importar"

**Paso 4 — Verificación:** acceder a `http://localhost/techflowsolution/index.php` y comprobar que carga sin errores.

### 8.5 Pruebas de implantación

| Prueba | Estado |
|--------|:------:|
| Página index carga sin errores PHP | ✅ OK |
| Login funciona con los 3 perfiles | ✅ OK |
| Ticket creado por cliente visible en panel PMO | ✅ OK |
| Diseño responsive en móvil | ✅ OK |
| Log de Apache sin errores nuevos | ✅ OK |

*Tabla 16. Resultados de las pruebas de implantación en el entorno de destino.*

---

## 9. DEFINICIÓN DE PROCEDIMIENTOS DE CONTROL Y EVALUACIÓN

**Registro de incidencias detectadas durante el desarrollo:**

| Fecha | ID | Descripción | Causa | Corrección | Áreas afectadas |
|-------|----|-------------|-------|------------|-----------------|
| 27/05/2026 | INC-01 | Tildes y eñes aparecen como símbolos extraños | Falta de charset UTF-8 en la conexión | Se añadió `mysqli_set_charset($conexion, "utf8mb4")` | `conexion.php` |
| 27/05/2026 | INC-02 | El panel PMO era accesible sin autenticación por URL directa | Falta del control de sesión al inicio del script | Se añadió comprobación de `$_SESSION` con redirección al login | `panel_pmo.php`, `panel_cliente.php` |

*Tabla 17. Registro de incidencias detectadas y resueltas durante el desarrollo.*

**Registro de cambios en el proyecto:**

| Fecha | Cambio | Justificación | Áreas afectadas |
|-------|--------|---------------|-----------------|
| 26/05/2026 | Adición del campo `updated_at` en tickets | Registrar la última modificación para los KPIs | `database.sql`, `panel_pmo.php` |
| 27/05/2026 | Sustitución de WordPress por desarrollo PHP a medida | Mayor flexibilidad y aprendizaje técnico | Toda la arquitectura del proyecto |

*Tabla 18. Registro de cambios realizados durante el proyecto.*

---

## 10. CONCLUSIONES

El proyecto TechFlow Solutions se ha completado satisfactoriamente, cumpliendo los objetivos técnicos y académicos establecidos. Los 6 casos de prueba definidos han sido superados al 100%, validando la funcionalidad, seguridad y usabilidad del sistema.

El desarrollo ha supuesto una simulación real de los retos técnicos de una consultoría informática, permitiendo aplicar de forma integrada los conocimientos del ciclo formativo: bases de datos, desarrollo web, seguridad, redes y administración de sistemas.

La metodología de investigar, aprender y aplicar de forma progresiva ha resultado muy efectiva. Se consultó documentación oficial (PHP, MySQL, Bootstrap) y se fue construyendo cada módulo a medida que se adquirían los conocimientos necesarios.

**Objetivos cumplidos:**
- Base de datos relacional normalizada en MySQL. ✅
- Aplicación web funcional en PHP procedimental. ✅
- Autenticación segura con hash Bcrypt. ✅
- Interfaz responsive con Bootstrap 5. ✅
- Cuadro de mando PMO con KPIs en tiempo real. ✅
- Documentación técnica completa. ✅

**Mejoras futuras posibles:**
- Notificaciones automáticas por email cuando un ticket cambia de estado.
- Subida de archivos adjuntos a los tickets.
- Gráficos estadísticos con Chart.js en el cuadro de mando.
- Despliegue en servidor de producción con HTTPS.

---

## 11. FUENTES

1. PHP Group. (2026). *PHP Manual: MySQL Improved Extension (mysqli)*. https://www.php.net/manual/es/book.mysqli.php
2. MariaDB Foundation. (2026). *MariaDB Server Documentation*. https://mariadb.com/kb/en/documentation/
3. Bootstrap Team. (2026). *Bootstrap v5.3 — Components and Grid*. https://getbootstrap.com/docs/5.3/
4. OWASP Foundation. (2025). *OWASP Top Ten — Seguridad en aplicaciones web*. https://owasp.org/www-project-top-ten/
5. Apache Friends. (2026). *XAMPP — Documentación para Windows*. https://www.apachefriends.org/es/
6. American Psychological Association. (2020). *Publication Manual of the APA* (7.ª ed.). https://apastyle.apa.org/

---

## 12. ANEXOS

### 12.1 Manual de usuario

> **Archivo adjunto:** `manual_usuario.docx`

El manual de usuario detalla paso a paso cómo utilizar cada módulo del portal TechFlow Solutions, con capturas de pantalla reales. Incluye:

- Acceso al portal y credenciales de prueba.
- Guía para el perfil **cliente**: proyectos, tickets y chat.
- Guía para el perfil **técnico**: gestión del buzón y asignación.
- Guía para el perfil **PMO**: cuadro de mando y KPIs.

| Perfil | Email | Contraseña |
|--------|-------|------------|
| Cliente | cliente@techflow.com | password123 |
| Técnico | tecnico@techflow.com | password123 |
| PMO | pmo@techflow.com | password123 |

*Tabla 19. Credenciales de prueba del sistema.*

---

*Proyecto Final SMR · TechFlow Solutions · Mayo 2026 · IFC*
