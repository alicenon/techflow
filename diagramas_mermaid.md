# Diagramas Mermaid — TechFlow Solutions

A continuación tienes todos los códigos Mermaid extraídos de la memoria para que puedas generar las imágenes copiándolos en herramientas como [Mermaid Live Editor](https://mermaid.live) o [ToDiagram](https://todiagram.com).

## 1. Diagrama de Gantt

```mermaid
gantt
    title TechFlow Solutions — Planificación del proyecto
    dateFormat  YYYY-MM-DD

    section Fase 1 · BD y Estructura (Día 1)
    Diseño E-R + database.sql          :done, 2026-05-25, 1d
    conexion.php + header + footer     :done, 2026-05-25, 1d

    section Fase 2 · Módulos Web (Día 2)
    index.php + login.php + logout.php :done, 2026-05-26, 1d
    panel_cliente + crear_ticket       :done, 2026-05-26, 1d
    panel_pmo + ver_ticket             :done, 2026-05-26, 2d

    section Fase 3 · Pruebas y Docs (Día 3)
    Pruebas funcionales + correcciones :done, 2026-05-27, 1d
    Memoria + manual + GitHub          :done, 2026-05-27, 1d
```

## 2. Flujo de navegación

```mermaid
flowchart TD
    A([Visitante]) --> B[index.php\nPágina pública]
    B --> C[login.php]
    C --> D{Rol del usuario}
    D -->|cliente| E[panel_cliente.php]
    D -->|técnico / pmo| F[panel_pmo.php]
    E --> G[crear_ticket.php\nNueva incidencia]
    E --> H[ver_ticket.php\nChat del cliente]
    F --> I[ver_ticket.php\nGestión + asignación]
    G --> E
    H --> J([logout.php])
    I --> J
```

## 3. Arquitectura de red (3 capas)

```mermaid
graph TB
    subgraph C1["Capa 1 — Presentación"]
        NAV["Navegador web · Chrome / Edge\nHTML5 + Bootstrap 5 + JavaScript"]
    end
    subgraph C2["Capa 2 — Lógica de negocio"]
        SRV["Apache HTTP Server · XAMPP 8.2\nPHP 8.2 · Gestión de sesiones PHP"]
    end
    subgraph C3["Capa 3 — Datos"]
        DB["MariaDB / MySQL\ntechflow_db · 4 tablas InnoDB"]
    end

    NAV -->|"HTTP · Puerto 80"| SRV
    SRV -->|"SQL · Puerto 3306"| DB
```

## 4. Esquema de autenticación (Bcrypt)

```mermaid
flowchart LR
    A["Usuario introduce\ncontraseña"] --> B["password_verify()\ncompara texto\ncon hash Bcrypt en BD"]
    B -->|Correcto| C["$_SESSION creada\nRedirección al panel\nsegún rol"]
    B -->|Incorrecto| D["Mensaje de error\nSin redirección"]
```
