create database EstoqueTcc;

create table Usuario(
idUser int not null auto_increment primary key,
nome varchar(80),
email varchar(100),
senha varchar(80),
celular varchar(14));

select*from produto;

select*from usuario;
drop table usuario;
select*from Alimento;

insert into usuario(nome,email,senha,celular)
values
('marcio farias', 'marciofarias22@gmail.com', 'carneiro#53', '16997870865');

insert into mov(ES, qtd, dat)
values
('E', 10, '22/08/2022');



select * from user_mov;


create table Produto(
codigo int not null auto_increment primary key,
nome varchar(80) not null,
unidade varchar(15));

create table Alimento(
codAli int not null auto_increment primary key,
nome varchar (80),
unidade varchar (10),
validade varchar (20),
quantidade varchar (10));

create table cozinha(
idCozinha int primary key,
nome varchar(45));

create table estoque(
idEstoque int primary key);

create table mov(
idMov int not null auto_increment primary key,
ES varchar(50),
qtd int,
dat varchar(45));

create table coz_mov(
idcozinha_fk int,
idmov_fk int,
foreign key (idcozinha_fk) references cozinha(idcozinha),
foreign key (idmov_fk) references mov(idmov));

create table user_mov(
iduser_fk int,
idmov_fk int,
foreign key (iduser_fk) references usuario(iduser),
foreign key (idmov_fk) references mov(idmov));

create table prod_mov(
idprod_fk int,
idmov_fk int,
foreign key (idprod_fk) references produto(codigo),
foreign key (idmov_fk) references mov(idmov));

create table Ali_mov(
idAli_fk int,
idmov_fk int,
foreign key (idAli_fk) references alimento(codAli),
foreign key (idmov_fk) references mov(idmov));