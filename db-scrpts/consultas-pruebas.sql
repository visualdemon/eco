# INSERT INTO `ecoapp`.`usuario` (`usuario`, `pass`, `nombre`, `email`, `telefono`, `sexo`, `ocupacion`, `entidad`, `pais`, `ciudad`, `estado`) VALUES ('wil', '123', 'Wil', 'wilberamp@gmail.com', '3206100639', 'M', 'Estudiante', 'Comfa', 'Col', 'Pas', '1');

SELECT * FROM usuario;

SELECT * FROM aporte WHERE id_usuario = 1;

INSERT INTO `ecoapp`.`usuario` (`usuario`, `pass`, `nombre`, `email`, `telefono`, `sexo`, `ocupacion`, `entidad`, `pais`, `ciudad`, `estado`) VALUES ('ale', '345', 'Aleja', 'aleja0206@gmail.com', '3206100639', 'F', 'Estudiante', 'Geografía', 'Col', 'Pas', '1');

INSERT INTO `ecoapp`.`aporte` (`cliente`, `correos-eliminados`, `espacio-liberado`, `id_usuario`, `fecha`) VALUES ('hotmail', '25', '50', '2', CURRENT_TIMESTAMP());

SELECT * FROM aporte WHERE id_usuario = 2;

SELECT usuario.nombre, aporte.cliente FROM usuario, aporte;

SELECT usuario.nombre, aporte.id_usuario FROM usuario, aporte;

SELECT * FROM usuario 
INNER JOIN aporte ON aporte.id_usuario=usuario.id_usuario;

SELECT nombre, cliente, correos_eliminados, espacio_liberado, fecha FROM aporte
INNER JOIN usuario
WHERE aporte.id_usuario=usuario.id_usuario AND aporte.id_usuario=2;

SELECT cliente, correos_eliminados, espacio_libreado, fecha FROM ecoapp.aporte;

INSERT INTO `ecoapp`.`aporte` (`cliente`, `correos_eliminados`, `espacio_liberado`, `id_usuario`, `fecha`) VALUES ('Cloud', '12', '250', '2',  CURRENT_TIMESTAMP());

INSERT INTO `ecoapp`.`aporte` (`cliente`, `correos_eliminados`, `espacio_liberado`, `id_usuario`, `fecha`) VALUES ('iCloud', '295', '8192', '1',  CURRENT_TIMESTAMP());

INSERT INTO `ecoapp`.`aporte` (`cliente`, `correos_eliminados`, `espacio_liberado`, `id_usuario`, `fecha`) VALUES ('Google Fotos', '400', '10240', '1',  CURRENT_TIMESTAMP());

