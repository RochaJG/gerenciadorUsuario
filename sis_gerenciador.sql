create database sis_gerenciador;

use sis_gerenciador;

create table if not exists funcionarios (
    matricula bigint not null auto_increment,
    nome varchar(20) not null,
    sobrenome varchar(20) not null,
	senha varchar(60) not null,
    cargo int(2) not null,
    salario decimal(8,2) not null,
    primary key(matricula)
);

create table if not exists entradas (
	mat_func bigint not null,
    horario datetime not null,
    primary key(mat_func),
    foreign key(mat_func) references funcionarios(matricula)
);

create table if not exists saidas (
	mat_func bigint not null,
    horario datetime not null,
    primary key(mat_func),
    foreign key(mat_func) references funcionarios(matricula)
);