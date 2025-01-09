CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    usuario_id INT NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    proyecto_id INT NOT NULL,
    estado ENUM('pendiente', 'en progreso', 'completada') DEFAULT 'pendiente',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
);



--EJEMPLOS


INSERT INTO usuarios (nombre, email) VALUES 
('Pablo', 'pablo@example.com'),
('Ana', 'ana@example.com'),
('Luis', 'luis@example.com');

INSERT INTO proyectos (titulo, descripcion, usuario_id) VALUES 
('Proyecto A', 'Descripción del proyecto A', 1), 
('Proyecto B', 'Descripción del proyecto B', 1), 
('Proyecto C', 'Descripción del proyecto C', 2),
('Proyecto D', 'Descripción del proyecto D', 3); 

INSERT INTO tareas (descripcion, proyecto_id, estado) VALUES 
('Tarea 1 del Proyecto A', 1, 'pendiente'),
('Tarea 2 del Proyecto A', 1, 'en progreso'),
('Tarea 3 del Proyecto A', 1, 'completada'),
('Tarea 1 del Proyecto B', 2, 'pendiente'),
('Tarea 2 del Proyecto B', 2, 'completada'),
('Tarea del Proyecto C', 3, 'en progreso'),
('Tarea del Proyecto D', 4, 'pendiente');