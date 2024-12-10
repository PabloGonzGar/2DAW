
Objetivo
Diseñar un sistema en PHP que interactúe con una base de datos MySQL usando PDO y esté estructurado de manera modular para facilitar la reutilización y el mantenimiento del código.

Requisitos Técnicos
El sistema debe estar organizado en módulos o funciones reutilizables:
Conexión a la base de datos.
Gestión de usuarios (crear, listar, actualizar, eliminar).
Gestión de proyectos (crear, listar, actualizar, eliminar).
Gestión de tareas (crear, listar, actualizar, eliminar).
Consultas avanzadas (ejemplo: multitablas o estadísticas).
Todo el código debe estar en un archivo principal (index.php) que llame a funciones desde un archivo de utilidades (db_utils.php).
Utiliza constantes o variables de configuración para almacenar las credenciales de la base de datos.
Cada operación (crear, listar, actualizar, eliminar) debe tener su propia función.
Estructura del Proyecto
Archivo de configuración: config.php

Contiene las credenciales de la base de datos.
Archivo de utilidades: db_utils.php

Contiene las funciones para interactuar con la base de datos (CRUD).
Archivo principal: index.php

Incluye db_utils.php y llama a las funciones para realizar las operaciones solicitadas.
Base de datos: setup.sql

Archivo para crear y poblar la base de datos.
Tareas a Desarrollar


----------------------------------------------------------------------------------------------------------------------

Parte 1: Configuración
Crea un archivo config.php con las credenciales de la base de datos.
Define una función en db_utils.php para establecer la conexión usando PDO y las credenciales del archivo de configuración.

----------------------------------------------------------------------------------------------------------------------

Parte 2: Modularización
Implementa funciones genéricas para:
    -Crear, leer, actualizar y eliminar usuarios.
    -Crear, leer, actualizar y eliminar proyectos.
    -Crear, leer, actualizar y eliminar tareas.
Define consultas específicas para:
    -Obtener proyectos y sus tareas de un usuario.
    -Contar tareas completadas y pendientes por proyecto.
    -Listar usuarios con la cantidad de proyectos asignados.

----------------------------------------------------------------------------------------------------------------------

Parte 3: Archivo Principal
En index.php, escribe un menú básico con opciones para interactuar con el sistema:
Insertar un usuario, proyecto o tarea.
Consultar datos (ej. proyectos de un usuario, estadísticas de tareas).
Actualizar registros (ej. cambiar el estado de una tarea).
Eliminar registros (ej. un proyecto y sus tareas relacionadas).