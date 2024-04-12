CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol VARCHAR(50) NOT NULL
);

CREATE TABLE curso(
    id_curso INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50)
);

CREATE TABLE dias_acomer(
    id_dias_acomer INT PRIMARY KEY AUTO_INCREMENT,
    lunes VARCHAR(50) NOT NULL,
    martes VARCHAR(50) NOT NULL,
    miercoles VARCHAR(50) NOT NULL,
    jueves VARCHAR(50) NOT NULL,
    viernes VARCHAR(50) NOT NULL
);

CREATE TABLE comida(
    id_comida INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE estudiante (
    id_estudiante INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    dni VARCHAR(10) NOT NULL,
    alergias VARCHAR(255) NOT NULL,
    habilitado BOOLEAN NOT NULL, 
    id_curso INT NOT NULL,
    id_dias_acomer INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso),
    FOREIGN KEY (id_dias_acomer) REFERENCES dias_acomer(id_dias_acomer)
);

CREATE TABLE comentario(
    id_comentario INT PRIMARY KEY AUTO_INCREMENT,
    comentario VARCHAR(255),
    valoracion INT NOT NULL,
    fecha DATE NOT NULL,
    id_comida INT NOT NULL,
    id_estudiante INT NOT NULL,
    FOREIGN KEY (id_comida) REFERENCES comida(id_comida),
    FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante)
);

CREATE TABLE comensales(
    id_comensal INT PRIMARY KEY AUTO_INCREMENT,
    id_comida INT NOT NULL,
    id_estudiante INT NOT NULL,
    comio BOOLEAN NOT NULL,
    FOREIGN KEY (id_estudiante) REFERENCES estudiante(id_estudiante),
    FOREIGN KEY (id_comida) REFERENCES comida(id_comida)
);

CREATE TABLE configuracion(
    hora_cierre TIME NOT NULL,
    cambiar_contrasena BOOLEAN,
    modificar_datos BOOLEAN,
    cometarios BOOLEAN
);

CREATE TABLE registro_comidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_comida INT,
    fecha DATE,
    valoracion INT,
    FOREIGN KEY (id_comida) REFERENCES comida(id_comida)
);