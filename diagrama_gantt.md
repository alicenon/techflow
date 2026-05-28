# Diagrama de Gantt — TechFlow Solutions

## Código Mermaid (para pegar en cualquier editor compatible)

### PIDELE A CHATGPT QUE TE CAMBIE LAS FECHAS O SI QUIERES ESPECIFICAR, QUE CUESTA UN POCO MODIFICAR LAS FECHAS A MANO. ES MUY IMPORTANTE QUE NO TE LO BORRE

Pegar en: https://mermaid.live · todiagram.com · o el plugin Mermaid de VS Code

```mermaid
gantt
    title Planificación del Proyecto TechFlow Solutions
    dateFormat  YYYY-MM-DD
    axisFormat  Día %d

    section Fase 1 — Base de datos y estructura
    Diseño del modelo E-R y la BD      :done, f1a, 2026-05-25, 1d
    Script database.sql                :done, f1b, 2026-05-25, 1d
    conexion.php + header + footer     :done, f1c, after f1b, 1d

    section Fase 2 — Desarrollo de módulos
    index.php (página pública)         :done, f2a, 2026-05-26, 1d
    login.php + logout.php             :done, f2b, 2026-05-26, 1d
    panel_cliente.php                  :done, f2c, 2026-05-26, 1d
    crear_ticket.php                   :done, f2d, 2026-05-26, 1d
    panel_pmo.php                      :done, f2e, 2026-05-26, 1d
    ver_ticket.php (chat)              :done, f2f, after f2e, 1d

    section Fase 3 — Pruebas y documentación
    Pruebas funcionales y correcciones :done, f3a, 2026-05-27, 1d
    Capturas de pantalla               :done, f3b, 2026-05-27, 1d
    Memoria técnica                    :done, f3c, 2026-05-27, 1d
    Manual de usuario                  :done, f3d, 2026-05-27, 1d
    Subida a GitHub                    :done, f3e, 2026-05-27, 1d
```

## Notas sobre las decisiones de planificación

Durante la fase inicial de planificación se valoró usar **WordPress con plugins de gestión de tickets** como punto de partida. Sin embargo, se descartó porque:
- Los plugins disponibles no integraban un módulo PMO nativo.
- La personalización del modelo de datos era muy limitada.
- No permitía aprender el funcionamiento interno de la tecnología.

Se optó por desarrollar desde cero con **PHP + MySQL + Bootstrap**, lo que implicó una inversión mayor en aprendizaje (consulta de documentación oficial, tutoriales y cursos en línea) pero aportó un dominio mucho más completo de las tecnologías implicadas.

## Para usar en todiagram

Pegar el bloque mermaid en: https://todiagram.com
o en la web oficial de Mermaid: https://mermaid.live

Exportar como PNG y pegar en la memoria en el apartado 3.5.
