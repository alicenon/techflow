# Diagramas Mermaid — TechFlow Solutions

A continuación tienes todos los códigos Mermaid extraídos de la memoria. Se han limpiado los caracteres especiales para evitar errores de sintaxis en los distintos editores (como todiagram.com).

## 1. Diagrama de Gantt

```mermaid
gantt
    title Planificacion del proyecto TechFlow Solutions
    dateFormat  YYYY-MM-DD

    section Fase 1 - Base de datos
    Diseno E-R y script SQL          :done, 2026-05-25, 1d
    Conexion e index publico         :done, 2026-05-25, 1d

    section Fase 2 - Modulos Web
    Login y autenticacion            :done, 2026-05-26, 1d
    Panel cliente y tickets          :done, 2026-05-26, 1d
    Cuadro de mando PMO y chat       :done, 2026-05-26, 2d

    section Fase 3 - Pruebas y Docs
    Pruebas y correccion de errores  :done, 2026-05-27, 1d
    Memoria tecnica y manual         :done, 2026-05-27, 1d
```

*(Nota: Si tu editor sigue sin aceptar el tipo `gantt`, usa la alternativa en formato de tabla de más abajo)*

## 2. Flujo de navegación

```mermaid
flowchart TD
    A([Visitante]) --> B[index.php - Pagina publica]
    B --> C[login.php]
    C --> D{Rol del usuario}
    D -->|cliente| E[panel_cliente.php]
    D -->|tecnico / pmo| F[panel_pmo.php]
    E --> G[crear_ticket.php - Nueva incidencia]
    E --> H[ver_ticket.php - Chat del cliente]
    F --> I[ver_ticket.php - Gestion y asignacion]
    G --> E
    H --> J([logout.php])
    I --> J
```

## 3. Arquitectura de red (3 capas)

```mermaid
graph TB
    subgraph C1[Capa 1 - Presentacion]
        NAV[Navegador web Chrome/Edge HTML5 y Bootstrap 5]
    end
    subgraph C2[Capa 2 - Logica de negocio]
        SRV[Apache HTTP Server XAMPP 8.2 y PHP 8.2]
    end
    subgraph C3[Capa 3 - Datos]
        DB[MariaDB / MySQL techflow_db 4 tablas InnoDB]
    end

    NAV -->|HTTP Puerto 80| SRV
    SRV -->|SQL Puerto 3306| DB
```

## 4. Esquema de autenticación (Bcrypt)

```mermaid
flowchart LR
    A[Usuario introduce contrasena] --> B[password_verify compara texto con hash Bcrypt]
    B -->|Correcto| C[Sesion creada. Redireccion al panel]
    B -->|Incorrecto| D[Mensaje de error. Sin redireccion]
```
