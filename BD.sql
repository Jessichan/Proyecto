drop database if exists `animalshop`;
create database if not exists `animalshop`;
use `animalshop`;

CREATE USER IF NOT EXISTS 'mascota'@'localhost' IDENTIFIED BY 'minino';
GRANT ALL PRIVILEGES ON animalshop TO 'mascota'@'localhost';
FLUSH PRIVILEGES;


-- Crear tabla
create table cliente
(
	idcliente		int auto_increment not null,
	nombre			varchar(25),
	apellidos		varchar(50),
	Telefono		varchar(9),
	email			varchar(100),
	usuario			varchar(15),
	tipo			varchar(20),
	password		varchar(50),
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
    raza  			varchar(50),
    edad			varchar(10),
    descripcion		varchar(500),
    precio      	decimal(5,2),
    imagen			varchar(500),
    primary key(idanimal)
 );


create table tiene
(
	idanimal		int,
	idalquiler		int,
	cantidad		int,
	primary key(idanimal, idalquiler),
	foreign key(idanimal) references animal(idanimal),
	foreign key(idalquiler) references alquiler(idalquiler) on delete cascade
);

create table accesorio
(
	idaccesorio		int auto_increment not null,
	nombre			varchar(50),
	descripcion		varchar(50),
	cantidad		int,
	precio			decimal(4,2),
	imagen			varchar(500),
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

-- insertar datos
insert into cliente values(null, 'Maria', 'Gonzalez', '657890634','mariag@gmail.com','admin', 'Admin', '1234');
insert into cliente values(null, 'Carlos', 'Martin', '654321672', 'carlosmar@gmail', 'luism', 'User', '168923');
insert into cliente values(null, 'Amanda', 'Marin', '647896541', 'amanda23@gmail.com', 'amanda', 'User', '123456');
insert into cliente values(null, 'Jose', 'Laguillo', '654789064', 'josela@gmail.com', 'josel', 'User', 'asdfgh');
insert into cliente values(null, 'Jonni', 'Melavo', '654378906', 'joni@gmail.com', 'jonim', 'User', 'jonim');
insert into cliente values(null, 'Holi', 'Moli', '675432349', 'holimoli@hotmail.com', 'holim', 'User', 'holim');

insert into alquiler values(null, 3, now());
insert into alquiler values(null, 5, now());
insert into alquiler values(null, 2, now());
insert into alquiler values(null, 4, now());
insert into alquiler values(null, 6, now());

insert into animal values(null, 'perro', 'Peludo', 'golden retriever', '3 meses', 'Perro cariñoso y jugueton', 18.00, '/php/proyecto/img/peludo.png');
insert into animal values(null, 'gato', 'Beng', 'bengala', '4 meses', 'gato cariñoso y goloso', 20.00, '/php/proyecto/gato.jpg');
insert into animal values(null, 'pajaro', 'Manuel', 'canario', '6 meses', 'ya sabe volar', 15.00, '/php/proyecto/canario.jpg');
insert into animal values(null, 'loro', 'Tina', 'Psittacus erithacus', '2 meses', 'Tararea el himno de España', 23.00, '/php/proyecto/loro.jpg');
insert into animal values(null, 'perro', 'Giva', 'dalmata', '1 año',  'muy mansito', 17.00, 'php/proyecto/img/dalmata.jpg');
insert into animal values(null, 'conejo', 'Sabana', 'belier Gold', 'año y medio', 'Se deja mimar que da gusto', 14.00, 'php/proyecto/img/conejo.jpg');
insert into animal values(null, 'hamster', 'Currito', 'Hanster Comun', '1 año' , 'se esta preparando para la carrera nocturna', 12.50, 'php/proyecto/img/hanster.jpg');
insert into animal values(null, 'gato', 'Doraemon', 'bombai', '1 año', 'gato juegueton y cariñoso', 18.00, '/php/proyecto/doraemon.png');
insert into animal values(null, 'cobaya', 'Kitty', 'peruana', '1 año', 'muy mona', 15.00, '/php/proyecto/cobaya.jpg');
insert into animal values(null, 'perro', 'Jara', 'meztiza', '9 años', 'chucha agil y pedidora de comida, siempre quiere estar acompanada', 20.00, '/php/proyecto/jara.png');

insert into tiene values(3, 4, 1);
insert into tiene values(2, 2, 1);
insert into tiene values(8, 2, 1);
insert into tiene values(5, 3, 1);
insert into tiene values(4, 5, 1);
insert into tiene values(6, 1, 1);

insert into accesorio values(null, 'Correa','Correa para perros' , 10, 3.00, '/php/proyecto/correa.jpg');
insert into accesorio values(null, 'sonajero', 'Juguete para gatos o perros', 10, 2.50, '/php/proyecto/sonajero.jpg');
insert into accesorio values(null, 'Hueso comestible', 'hueso sabroso para perros', 20, 4.00, '/php/proyecto/hueso.jpg');
insert into accesorio values(null, 'Brekkies Excel Junior', 'Comida para perros pequeños', 10, 7.00, '/php/proyecto/comida1.jpg');
insert into accesorio values(null, 'Brekiies Excel Senior', 'Comida para perros de mas de 7 años', 10, 7.50, '/php/proyecto/comida2.jpg');
insert into accesorio values(null, 'Brekkies Excel Cat', 'Comida sabrosa para gatos', 10, 8.00, '/php/proyecto/comidag.jpg');
insert into accesorio values(null, 'vitakraft menu', 'Comida para pequeños roedores', 10, 8.00, '/php/proyecto/comidac.jpg');
insert into accesorio values(null, 'Pio pa', 'Mezcla para canarios', 10, 1.77, '/php/proyecto/mezclac.jpg');

insert into compra values(3, 7, 1, 8.00);
insert into compra values(2, 4, 1, 7.00);
insert into compra values(4, 8, 1, 1.77);
insert into compra values(5, 2, 1, 2.50);
insert into compra values(6, 2, 1, 2.50);
