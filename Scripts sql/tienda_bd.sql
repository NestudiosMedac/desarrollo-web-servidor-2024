USE tienda_bd;

CREATE TABLE categorias (
	categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE productos (
	id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    precio NUMERIC(6,2) NOT NULL,
    categoria VARCHAR(30) NOT NULL,
    stock INT DEFAULT 0,
    imagen VARCHAR(60) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    FOREIGN KEY (categoria) REFERENCES categorias(categoria)
);


