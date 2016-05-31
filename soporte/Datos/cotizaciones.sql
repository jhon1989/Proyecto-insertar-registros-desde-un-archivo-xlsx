--Crear tabla cotizaciocnes
CREATE TABLE cotizaciones(idCotizaciones INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	                      fechaCreacion DATE NOT NULL,
	                      asesor VARCHAR(100) NOT NULL,
	                      sumar VARCHAR(100) NOT NULL,
	                      genero VARCHAR(1) NOT NULL,
	                      edad INT NOT NULL,
	                      departamento VARCHAR(150) NOT NULL,
	                      es0km VARCHAR(2) NOT NULL,
	                      modelo VARCHAR(10) NOT NULL,
	                      clase VARCHAR(50) NOT NULL,
	                      marca VARCHAR(50) NOT NULL,
	                      refencia VARCHAR(250) NOT NULL,
	                      precioFasecolda FLOAT NOT NULL);



SELECT departamento, COUNT(departamento) as total FROM cotizaciones
	    WHERE fechaCreacion BETWEEN '2014/06/03' AND  '2014/06/04'
	    GROUP BY departamento HAVING COUNT(departamento) > 1;