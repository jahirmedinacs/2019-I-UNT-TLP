INSERT INTO usuario(id, nombre, codigo, primerapellido, segundoapellido, segundonombre, nacimiento, tipo, userid) VALUES
    (0105, 'TLP', 000000000,'Demostracion','Alumno','','1980-01-01', 1, 'tlpalumno');

CREATE USER 'tlpalumno'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON * . * TO 'tlpalumno'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;
GRANT CREATE USER on *.* TO 'tlpalumno'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;

FLUSH PRIVILEGES;

INSERT INTO usuario(id, nombre, codigo, primerapellido, segundoapellido, segundonombre, nacimiento, tipo, userid) VALUES
    (0106, 'TLP', 000000000,'Demostracion','Profesor','','1980-01-01', 1, 'tlpprofesor');

CREATE USER 'tlpprofesor'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON * . * TO 'tlpprofesor'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;
GRANT CREATE USER on *.* TO 'tlpprofesor'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;

FLUSH PRIVILEGES;

INSERT INTO usuario(id, nombre, codigo, primerapellido, segundoapellido, segundonombre, nacimiento, tipo, userid) VALUES
    (0107, 'TLP', 000000000,'Demostracion','Administrador','','1980-01-01', 1, 'tlpadministrador');

CREATE USER 'tlpadministrador'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON * . * TO 'tlpadministrador'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;
GRANT CREATE USER on *.* TO 'tlpadministrador'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;

FLUSH PRIVILEGES;