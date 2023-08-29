
//crear la tabla con dos columnas
CREATE TABLE sexo (
    id_sexo INT AUTO_INCREMENT PRIMARY KEY,
    Genero VARCHAR(10) NOT NULL
);

// agregar llave foranea a la tabla pet y crea
 relacion etre la tabla sexo y la tabla pet
ALTER TABLE sexo
ADD CONSTRAINT fk_mascota_id_cliente 
FOREIGN KEY (id_sexo) REFERENCES pet(id_sexo);
