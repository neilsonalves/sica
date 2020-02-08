CREATE DATABASE sica2;
-- DROP DATABASE sica2;
USE sica2;

CREATE TABLE usuarios(
    id INT auto_increment PRIMARY KEY,
    nome VARCHAR(200),
    -- username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(50) not NULL,
    atividade bool not null default false,
    root bool not null default false
);
create table dispositivos(
  id int primary key auto_increment,
  identificacao varchar(50) unique,
   atividade bool default false
);
create table modelos(
   id int primary key auto_increment,
   nome varchar(100),
   detalhe varchar(255)
);
create table materiais(
   id int primary key auto_increment,
   username varchar(50) unique,
   valor double default 0.0,
   contidade int default 1
);
create table material_modelo(
  id_modelo int,
  id_material int,
  FOREIGN KEY (id_modelo) REFERENCES modelos(id) on delete cascade,
  FOREIGN KEY (id_material) REFERENCES materiais(id) on delete cascade
);
create table modelo_dispositivo(
  id_dispositivo int,
  id_modelo int,
  FOREIGN KEY (id_dispositivo) REFERENCES dispositivos(id) on delete cascade,
  FOREIGN KEY (id_modelo) REFERENCES modelos(id) on delete cascade
);

create table campos(
  id int auto_increment primary key,
  id_user int,
  username varchar(200) not null unique,
  lagura int not null default 1,
  distancia int not null default 1,
  l_um varchar(10) not null default "m",
  d_um varchar(10) not null default "m",
  _end varchar(255),
  foreign key(id_user) references usuarios(id) on delete cascade 
);
create table blocos(
  id int auto_increment primary key,
  id_campo int,
  username varchar(200) not null unique,
  lagura int not null default 1,
  distancia int not null default 1,
  l_um varchar(10) not null default "m",
  d_um varchar(10) not null default "m",
  foreign key(id_campo) references campos(id) on delete cascade 
);
CREATE TABLE dispositivo_usando(
  id INT auto_increment PRIMARY KEY,
  id_bloco INT,
  id_dispositivo int,
  FOREIGN KEY (id_bloco) REFERENCES blocos(id) on delete cascade,
  FOREIGN KEY (id_dispositivo) REFERENCES dispositivos(id) on delete cascade
);
CREATE TABLE dados(
   id INT PRIMARY KEY auto_increment,
   id_dispositivo_usando INT not NULL,
   data_s DATE,
   dados VARCHAR(200) NOT NULL,
   FOREIGN KEY (id_dispositivo_usando) REFERENCES dispositivo_usando(id) on delete cascade
);

-- admin <<-- é obrigatorio
insert into usuarios(nome, email, senha, atividade,root) values("admin", "admin@gmail.com", "admin12345", true, true);

insert into dispositivos(identificacao, atividade) values("adu001", true);
insert into modelos(nome, detalhe) values("não sei", "admin admin@gmail.com admin12345");
insert into materiais(username, valor, contidade) values("esp32", 55.25,1);
insert into material_modelo(id_modelo, id_material) values(1,1);
insert into modelo_dispositivo(id_dispositivo, id_modelo) values(1,1);
insert into campos(id_user, username, lagura, distancia, l_um, d_um, _end) values(1, "campo 1", 10, 30, "m", "m","angical do piaui");
insert into blocos(id_campo, username, lagura, distancia, l_um, d_um) values(1, "bloco 1", 5, 6, "m", "m");
insert into dispositivo_usando(id_bloco, id_dispositivo) values(1,1);
insert into dados(id_dispositivo_usando, data_s, dados) values(1, "2020-01-25", "536");

select * from usuarios;
select * from dados;