create database EstoqueTcc;
use EstoqueTcc;

create table Usuario(
idUser int not null auto_increment primary key,
nome varchar(80),
email varchar(100),
senha varchar(80));

create table Produto(
codigo int not null auto_increment primary key,
nome varchar(80) not null,
unidade varchar(15));

create table Alimento(
codAli int not null auto_increment primary key,
nome varchar (80),
unidade varchar (10),
peso varchar (7),
validade varchar (20),
quantidade varchar (10),
estatus varchar (30));

create table mov(
idMov int not null auto_increment primary key,
ES varchar(50),
qtd int,
dat varchar(45));

create table user_mov(
iduser_fk int,
idmov_fk int,
foreign key (iduser_fk) references Usuario(iduser),
foreign key (idmov_fk) references mov(idmov));

create table prod_mov(
idprod_fk int,
idmov_fk int,
foreign key (idprod_fk) references Produto(codigo),
foreign key (idmov_fk) references mov(idmov));

create table Ali_mov(
idAli_fk int,
idmov_fk int,
foreign key (idAli_fk) references Alimento(codAli),
foreign key (idmov_fk) references mov(idmov));


select*from Usuario;
select*from Produto;
select*from Alimento;

drop table usuario;
drop table produto;
drop table alimento;

drop table Ali_mov;