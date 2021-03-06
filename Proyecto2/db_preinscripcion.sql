﻿CREATE DATABASE IF NOT EXISTS preinscripcion;
USE preinscripcion;

CREATE TABLE student (
  id_boleta INT(10) NOT NULL,
  f_name varchar(25),
  m_name varchar(20),
  l_name varchar(20),
  email VARCHAR(30),
  phone INT(30),
  gender varchar(2),
  b_date date,
  contrasena VARCHAR(30),
  finalized VARCHAR(12) DEFAULT NULL,
  PRIMARY KEY (id_boleta)
  );

CREATE TABLE subject (
  id_subject INT(5) NOT NULL,
  tipo INT,
  nombre VARCHAR(45),
  PRIMARY KEY (id_subject)
  );
  
CREATE TABLE student_subject (
  student_id_boleta INT(10) NOT NULL,
  subject_id_student INT(5) NOT NULL,
  estado VARCHAR(12),
  PRIMARY KEY (student_id_boleta, subject_id_student),
  constraint studentfk foreign key(student_id_boleta) references student(id_boleta) on delete cascade on update cascade,
  constraint subjectfk foreign key(subject_id_student) references subject(id_subject) on delete cascade on update cascade
  ); 

CREATE TABLE admin(
  user varchar(10) NOT NULL,
  num_user INT(10) NOT NULL,
  contrasenAdmin varchar(64) NOT NULL,
  PRIMARY KEY(num_user)
  );

CREATE TABLE admin_student(
  admin_id INT(10) NOT NULL,
  student_id_boleta INT(10) NOT NULL,
  PRIMARY KEY (student_id_boleta, admin_id),
  constraint fkstudent foreign key(student_id_boleta) references student(id_boleta) on delete cascade on update cascade,
  constraint adminfk foreign key(admin_id) references admin(num_user) on delete cascade on update cascade
  );
insert into subject values (1, 1, 'Ecuaciones diferenciales');
insert into subject values (2, 1, 'Analisis vectorial');
insert into subject values (3, 1, 'Calculo');
insert into subject values (4, 1, 'Matematicas discretas');
insert into subject values (5, 1, 'Algoritmia y programacion estructurada');
insert into subject values (6, 1, 'Fisica');
insert into subject values (7, 1, 'Ingenieria Etica y Sociedad');
insert into subject values (8, 1, 'Algebra lineal');
insert into subject values (9, 1, 'Calculo aplicado');
insert into subject values (10, 1, 'Estructuras de datos');
insert into subject values (11, 1, 'Comunicacion Oral y Escrita');
insert into subject values (12, 1, 'Analisis fundamental de circuitos');

insert into subject values (13, 2, 'Matematicas avanzadas para la ingenieria');
insert into subject values (14, 2, 'Fundamentos economicos');
insert into subject values (15, 2, 'Fundamentos de diseño digital');
insert into subject values (16, 2, 'Teoria computacional');
insert into subject values (17, 2, 'Bases de datos');
insert into subject values (18, 2, 'Programacion Orientada a Objetos');
insert into subject values (19, 2, 'Electronica analogica');
insert into subject values (20, 2, 'Redes de computadoras');
insert into subject values (21, 2, 'Diseño de sistemas digitales');
insert into subject values (22, 2, 'Probabilidad y estadistica');
insert into subject values (23, 2, 'Sistemas operativos');
insert into subject values (24, 2, 'Analisis y diseño orientado a objetos');
insert into subject values (25, 2, 'Tecnologias para la web');
insert into subject values (26, 2, 'Administracion financiera');

insert into subject values (27, 3, 'Arquitectura de computadoras');
insert into subject values (28, 3, 'Analisis de algoritmos');
insert into subject values (29, 3, 'Ingenieria de software');
insert into subject values (30, 3, 'Administracion de proyectos');
insert into subject values (31, 3, 'Instrumentacion');
insert into subject values (32, 3, 'Aplicaciones para comunicaciones en red');
insert into subject values (33, 3, 'Metodos cuantitativos para toma de decisiones');
insert into subject values (34, 3, 'Introduccion a los microcontroladores');
insert into subject values (35, 3, 'Compiladores ');
insert into subject values (36, 3, 'Teoria de comunicaciones y señales');

insert into subject values (37, 4, 'Desarrollo de sistemas distribuidos');
insert into subject values (38, 4, 'Administracione de servicios en red');
insert into subject values (39, 4, 'Gestion empresarial');
insert into subject values (40, 4, 'Liderazgo');
insert into subject values (41, 4, 'Trabajo Terminal I');
insert into subject values (42, 3, 'Trabajo Terminal II');
 
insert into student values (2020000000, 'Juan', 'Perez', 'Perez', 'jpp@gmail.com', 554556578, 'mas', '2000-00-00','juan$',0);
insert into student_subject values (2020000000, 1,'Ordinario');

insert into admin values("admin",2020495842, "tweb2020");
