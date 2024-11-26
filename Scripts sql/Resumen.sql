USE animes_bd;
SELECT * FROM animes; -- esto es un comentario /*esto tamb*/, nunca comentes en un script
SELECT * FROM animes ORDER BY anno_estreno ;-- orden ascendente
SELECT * FROM animes ORDER BY anno_estreno DESC;-- orden descendente
SELECT * FROM animes WHERE titulo ="FRIEREN";
SELECT * FROM animes WHERE titulo LIKE "F%";-- .* que empiecen por F y el % significa lo que sea, la letra da igual si es mayus o minus
SELECT * FROM animes WHERE titulo LIKE "%n";-- los que acaben por n
SELECT * FROM animes WHERE titulo LIKE "%fRieren%";-- los buscadores hacen esto siempre
SELECT * FROM animes WHERE titulo LIKE "%tragones%";

SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    Where anno_estreno > 2010;
    
SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    WHERE anno_estreno BETWEEN 2010 AND 2020;
    
SELECT titulo, nombre_estudio, anno_estreno 
	FROM animes
    WHERE anno_estreno BETWEEN 2010 AND 2020
    ORDER BY titulo;-- cuidado que las instrucciones tienen orden

SELECT * FROM estudios;
SELECT * FROM animes;

-- animes i en la tabla y a DDL, puedes ver 
-- vamos a mostrar el titulo del anime, su estudio y la ciudad del estudio

SELECT a.titulo, a.nombre_estudio, e.ciudad -- puedes poner a. o e. nombre_estudio
	FROM anime a JOIN estudios e -- HACER PRIMERO EL FROM, a es el alias de animes e el alias de estudios
    ON a.nombre_estudio = e.nombre_estudio;-- es la columna que relaciona ambas tablas,comparandolas
    -- igualamos la clave foranea(muchos) animes con la clave primaria(1 estudio) con la que se relaciona
    
SELECT a.titulo, a.nombre_estudio, e.ciudad 
	FROM anime a right JOIN estudios e -- busca en anime y en lo que conecta con estudios, el left seria igual pero al reves , lo que este en la derecha que no este relaciona con la izquierda unemelo
    ON a.nombre_estudio = e.nombre_estudio; 

SET AUTOCOMMIT = 0; -- el cero lo quita, es el autoguardado
SET SQL_SAFE_UPDATES = 0; -- deshabilitamos el modo niños
DELETE FROM animes;
ROLLBACK;
SELECT * FROM animes;

INSERT INTO estudios VALUES ("Wanolo", "Mozambique del norte", 2024);
SELECT * FROM estudios;
COMMIT;

INSERT INTO estudios VALUES ("Manolo", "Mozambique del sur", 2024);
SELECT * FROM estudios;
ROLLBACK;
SELECT * FROM estudios;

/*
	COMMIT -> GUARDAR
    ROLLBACK ->VOLVER AL ULTIMO GUARDADO
*/
  
/*
UPDATE accounts  SET saldo -= 30 WHERE id = "1331"; --Mi cuenta del banco
UPDATE accounts  SET saldo += 30 WHERE id = "0012"; --La cuenta de amazon
COMMIT;


intruccion atomica
UNA SERIE DE INSTRUCCIONES ES ATOMICA CUANDO SE EJECUTA COMO SOLAMENTE 1. SI ALGUNA DE SUS PARTES FALLA, TODO FALLA Y SE DESHACEN LOS CAMBIOS
*/

