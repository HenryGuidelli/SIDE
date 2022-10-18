create database testePHP;

drop database testePHP;

create table cadUser (
	codUser int primary key auto_increment,
    nomeUser varchar (60),
    emailUser varchar (70),
    passWser varchar (60)
);

create table addProd (
	codItem int primary key auto_increment,
    nomeItem varchar (60),
    emailUser varchar (70)
);



select * from cadUser;