drop database if exists `animalshop`;
create database if not exists `animalshop`;
use `animalshop`;

CREATE USER IF NOT EXISTS 'mascota'@'localhost' IDENTIFIED BY 'minino';
GRANT ALL PRIVILEGES ON animalshop* TO 'mascota'@'localhost';
FLUSH PRIVILEGES;


-- Tables's creation
create table cliente
(
	idcliente		int auto_increment not null,
	nombre			varchar(25),
	apellidos		varchar(50),
	Telefono		varchar(9),
	email			varchar(100),
	usuario			varchar(15),
	tipo			varchar(20),
	password		varchar(16),
	primary key(idcliente)
);

create table alquiler
(
	idalquiler		int auto_increment not null,
	idcliente		int,
	fecha			date,
	primary key(idalquiler, idcliente),
	foreign key(idcliente) references cliente(idcliente) on delete cascade
);

create table animal
(
    idanimal        int auto_increment not null,
    especie      	varchar(20),
    nombre	      	varchar(25),
    raza  			varchar(25),
    precio      	decimal(7,2),
    primary key(idanimal)
 );


create table tiene
(
	idanimal		int,
	idalquiler		int
	cantidad		int,
	primary key(idanimal, idalquiler),
	foreign key(idanimal) references animal(idanimal),
	foreign key(idalquiler) references alquiler(idalquiler) on delete cascade
);

create table accesorio
(
	idaccesorio		int auto_increment not null,
	nombre			varchar(25),
	cantidad		int,
	precio			decimal(7,2),
	primary key(idaccesorio)
	);

create table compra
(
	idcliente		int,
	idaccesorio		int,
	cantidad 		int,
	preciototal		int,
	primary key(idcliente, idaccesorio),
	foreign key(idcliente) references cliente(idcliente),
	foreign key(idaccesorio) references accesorio(idaccesorio) on delete cascade
);
