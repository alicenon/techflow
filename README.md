# 🎓 TECHFLOW SOLUTIONS - MANUAL DE PUESTA EN MARCHA & GUÍA DE DEFENSA (SMR)

¡Bienvenida a tu proyecto de fin de **Grado Medio en Sistemas Microinformáticos y Redes (SMR)**! 

Este repositorio contiene la plataforma web de la consultora tecnológica **TechFlow Solutions**, un sistema diseñado específicamente para reflejar tu crecimiento en la **FP Dual Intensiva**, donde lograste una promoción interna real de **Soporte IT Nivel 1** a **PMO Junior**.

El objetivo de este `README.md` es guiarte paso a paso para **instalar la aplicación en tu equipo local** y darte las **claves estratégicas para defender el proyecto** y obtener la máxima calificación ante el tribunal evaluador.

---

## 🧠 1. EL CONCEPTO CLAVE: ¿Por qué "TechFlow Solutions"?
En la mayoría de las empresas tecnológicas, el **equipo de soporte técnico** (Sistemas/Redes) y la **PMO** (Oficina de Gestión de Proyectos de desarrollo) operan de forma aislada. Esto genera ineficiencias: muchas incidencias críticas de soporte IT se deben en realidad a problemas de diseño o arquitectura que requieren un cambio estructurado.

**TechFlow Solutions** soluciona esta brecha mediante un ecosistema digital unificado:
* **Módulo PMO (Gestión)**: Los clientes supervisan el avance porcentual y estado de sus proyectos en desarrollo en tiempo real.
* **Módulo de Soporte IT (Tickets)**: Los clientes reportan fallos, los técnicos los atienden mediante un chat activo y, si la incidencia es recurrente, la PMO puede planificar cambios en caliente dentro de la cartera del proyecto.

---

## 🛠️ 2. MANUAL DE INSTALACIÓN PASO A PASO (EN WINDOWS CON XAMPP)

Como alumna de SMR, tu entorno local estándar es **XAMPP**. Sigue estas instrucciones para desplegar la aplicación:

### Paso 1: Arrancar los Módulos de XAMPP
1. Abre el panel de control de **XAMPP** en tu equipo con Windows.
2. Haz clic en el botón **Start** de **Apache** y en el de **MySQL**. Deben ponerse en color verde.

### Paso 2: Ubicar los Archivos en `htdocs`
1. Copia toda la carpeta del proyecto `SHANNON-TFG`.
2. Pégala dentro de la raíz del servidor Apache de tu instalación local de XAMPP. La ruta por defecto en Windows es:  
   📂 **`C:\xampp\htdocs\techflowsolution\`**

### Paso 3: Crear e Importar la Base de Datos
1. Abre tu navegador web y entra en la consola de administración:  
   👉 **`http://localhost/phpmyadmin/`**
2. Haz clic en **"Nueva"** (en el menú de la izquierda) para crear una base de datos.
3. Introduce el nombre exacto: **`techflow_db`** y haz clic en **"Crear"**.
4. Selecciona la base de datos `techflow_db` recién creada y haz clic en la pestaña **"Importar"** en el menú superior.
5. Haz clic en *"Seleccionar archivo"*, busca el archivo **`database.sql`** en la carpeta de tu proyecto (`C:\xampp\htdocs\techflowsolution\database.sql`) y pulsa en **"Importar"** al final de la página.
6. En unos segundos, phpMyAdmin confirmará la importación del esquema relacional y las semillas de prueba.

### Paso 4: Cargar la Aplicación en el Navegador
Abre una nueva pestaña en tu navegador web y escribe la siguiente dirección:  
👉 **`http://localhost/techflowsolution/index.php`**

---

## 📂 3. ESTRUCTURA DE ARCHIVOS DEL PROYECTO
El proyecto está estructurado de manera modular y limpia en PHP Procedimental:

* **`database.sql`**: Script de base de datos relacional (tablas: `usuarios`, `proyectos`, `tickets`, `comentarios_tickets`).
* **`conexion.php`**: Conexión procedimental nativa con control de errores mediante `mysqli_connect()`.
* **`header.php`**: Cabecera común que inicia la sesión PHP (`session_start()`) y adapta el menú dinámicamente según el rol.
* **`footer.php`**: Pie de página responsivo con los créditos académicos de tu FP de SMR.
* **`index.php`**: Portal corporativo público con servicios y formulario de contacto reactivo.
* **`login.php`**: Control de acceso seguro por roles de sesión (`$_SESSION`) y contraseñas cifradas en Bcrypt.
* **`logout.php`**: Destrucción segura de variables de sesión.
* **`panel_cliente.php`**: Dashboard del cliente (progreso de proyectos y sus incidencias de soporte).
* **`crear_ticket.php`**: Formulario interactivo para registrar una nueva incidencia técnica.
* **`panel_pmo.php`**: Cuadro de mandos unificado para el personal (estadísticas KPIs, buzón global de soporte y cartera PMO).
* **`ver_ticket.php`**: Detalle del ticket con chat interactivo bidireccional cliente-soporte y panel lateral administrativo.
* **`memoria_proyecto.md`**: Memoria técnica completa de tu proyecto, alineada 100% con las rúbricas oficiales.

---

## 🧪 4. GUÍA DE DEMOSTRACIÓN EN VIVO (Para el Tribunal)
Te sugerimos seguir este flujo de **5 minutos** durante tu exposición práctica ante los profesores:

1. **Mostrar el Inicio Público**: Accede a `index.php` y enseña la web empresarial y el formulario de contacto.
2. **Entrar como Cliente**:
   - Inicia sesión con: Usuario: **`cliente@techflow.com`** | Contraseña: **`password`**
   - Muestra la barra de progreso de sus proyectos en desarrollo.
   - Crea una incidencia técnica de prueba (ej. *Fallo crítico de acceso en la red VPN de AWS* - Gravedad Alta).
3. **Entrar como Técnico / PMO**:
   - Cierra sesión e inicia sesión con: Usuario: **`tecnico@techflow.com`** o **`pmo@techflow.com`** | Contraseña: **`password`**
   - Muestra el aumento inmediato de los KPIs en los widgets y abre el buzón de soporte.
   - Entra a gestionar el ticket del cliente, asignátelo, cambia el estado a *"En Proceso"* y respóndele a través del chat de soporte técnico.
4. **Validación**: Vuelve a entrar con el perfil de cliente para mostrar cómo se ve el chat interactivo integrado y la insignia de estado actualizada en tiempo real.

---

## 🎓 5. CONSEJOS DE ORO PARA LA DEFENSA ORAL

* **¿Por qué PHP Procedimental?**  
  Si te preguntan por qué no has usado Programación Orientada a Objetos (POO) o frameworks avanzados:
  > *"He optado por PHP Procedimental clásico y consultas estructuradas mediante la API nativa de MySQLi. Esto se alinea al 100% con el currículo oficial del ciclo formativo de SMR, garantizando que el código sea ligero, fácilmente mantenible en servidores web locales modestos y totalmente comprensible y defendible en este examen técnico."*
* **Seguridad Implementada**:  
  Destaca que las contraseñas se almacenan mediante el hash seguro unidireccional **Bcrypt** (`password_hash()`), de forma que las claves reales nunca se exponen en texto plano. Además, explica que usas `mysqli_real_escape_string()` para prevenir inyecciones SQL en los formularios.
* **Diseño Responsivo**:  
  Comenta que la maquetación visual utiliza **Bootstrap 5** desde CDN, asegurando que la aplicación cargue a gran velocidad en cualquier dispositivo y se adapte automáticamente al formato móvil o tablet sin descuadres en la interfaz.

---
*Diseñado y desarrollado para garantizar la máxima calificación académica en el Proyecto Final de Grado Medio SMR.*
