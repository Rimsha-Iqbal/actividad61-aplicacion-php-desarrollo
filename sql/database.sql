
CREATE TABLE servicios_eventos (
    id_servicio INT PRIMARY KEY AUTO_INCREMENT,
    tipo_evento VARCHAR(50) NOT NULL,
    nombre_servicio VARCHAR(100) NOT NULL,
    encargado VARCHAR(100) NOT NULL,
    contacto VARCHAR(50) NOT NULL,
    precio_estimado DECIMAL(10,2) NOT NULL,
    descripcion TEXT,
    fecha_creacion  DATE DEFAULT (CURRENT_DATE)
);



INSERT INTO servicios_eventos (tipo_evento, nombre_servicio, encargado, contacto, precio_estimado, descripcion) VALUES
('Cumpleaños', 'Decoración con globos', 'María López', 'maria@example.com', 150.00, 'Decoración con globos temáticos y colores personalizados.'),
('Boda', 'Arreglos florales', 'Carlos Rivera', 'carlos@example.com', 500.00, 'Arreglos florales elegantes para bodas.'),
('Corporativo', 'Montaje de escenario', 'Elena Martínez', 'elena@example.com', 800.00, 'Montaje de escenario profesional para eventos corporativos.'),
('Diseño Interior', 'Decoración de lujo', 'Juan García', 'juan@example.com', 2000.00, 'Diseño de interiores modernos y clásicos para hogares.'),
('Cumpleaños', 'Fiestas temáticas', 'Laura Fernández', 'laura@example.com', 300.00, 'Decoración temática para fiestas infantiles y de adultos.'),
('Boda', 'Iluminación y sonido', 'Pedro Alonso', 'pedro@example.com', 1000.00, 'Iluminación y sonido de alta calidad para bodas.'),
('Corporativo', 'Branding y publicidad', 'Sofía Rodríguez', 'sofia@example.com', 1200.00, 'Diseño y personalización de branding para eventos corporativos.'),
('Diseño Interior', 'Decoración de oficinas', 'Ricardo Suárez', 'ricardo@example.com', 2500.00, 'Diseño innovador para oficinas y espacios de trabajo.'),
('Cumpleaños', 'Mesa de postres', 'Ana González', 'ana@example.com', 400.00, 'Mesa de postres y pasteles personalizados para cumpleaños.'),
('Boda', 'Fotografía y video', 'Daniel Pérez', 'daniel@example.com', 1500.00, 'Fotografía y videografía profesional para bodas.');

