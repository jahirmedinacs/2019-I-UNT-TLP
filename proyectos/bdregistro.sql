create database registroNotas;
use registroNotas;
create table usuario(
id int,
nombre varchar(20),
codigo int,
primary key(id)
);
create table cuenta(
id int,
contraseña varchar(15),
tipo varchar(20),
primary key(id)
);
create table curso(
id int,
nombre varchar(20),
n_horas int,
nro_alumnos int,
primary key(id)
);
create table nota(
id int,
nroNotas int,
primary key(id)
);
create table registroGeneral(
id int
);