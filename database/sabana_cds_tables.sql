/*==============================================================*/
/* Table: SABANA_CDS                                            */
/*==============================================================*/

create table sabana_cds (
    ID_SABANA		SERIAL NOT NULL,
    CODIGO_EMPLEADO      VARCHAR(30) NOT NULL,
    NOMBRE               VARCHAR(50) NOT NULL,
    ID_LUGAR		INT4 NOT NULL,
    ID_PUESTO		INT4 NOT NULL,
    JEFE_INMEDIAT0	VARCHAR(30) NOT NULL,
    ID_PLANILLA		INT4 NOT NULL,
    FECHA_INGRESO	DATE,
    FECHA_NACIMIENTO	DATE,
    CORREO		VARCHAR(25),
    TEL_CASA          	VARCHAR(25),
    TEL_CEL       	VARCHAR(25),
    DUI                 VARCHAR(15),
    NIT                 VARCHAR(20),
    ID_ESTADOCIVIL	INT4 NOT NULL,
    HIJOS		INT4,
    DIRECCION		VARCHAR(150),
    FECHA_SALIDA	DATE,
    MOTIVO_SALIDA	VARCHAR(50),
    COMENTARIO_BAJA	VARCHAR(1000),
    STATUS		VARCHAR(10),
    USUARIO		VARCHAR(15),
    PASSWORD		VARCHAR(50),
    ID_MUNIC		INT4,
}
    
ALTER TABLE SABANA_CDS ADD CONSTRAINT PK_SABANA_CDS PRIMARY KEY(ID_SABANA);
ALTER TABLE SABANA_CDS ADD CONSTRAINT FK_SABANA_CDS_MUNIC FOREIGN KEY(ID_MUNIC) REFERENCES DB_MUNICIPIO(id_munic);



/*CREAMDO TABLAS PARA DEPARTAMENTO Y MUNICIPIO*/

CREATE TABLE DB_DEPARTAMENTO
(
  id_depto int4 not null,
  name_depto varchar(50) not null,

  CONSTRAINT depto_pk PRIMARY KEY (id_depto)
);

CREATE TABLE DB_MUNICIPIO
(
  id_munic int4 not null,
  id_depto int4 not null,
  name_munic varchar(50) not null,

  CONSTRAINT pk_municip PRIMARY KEY (id_munic),
  
  CONSTRAINT fk_municip FOREIGN KEY (id_depto)
  REFERENCES DB_DEPARTAMENTO(id_depto)  
);


x










































/* DATOS PARA LAS TABLAS DE DEPARTAMENTO Y MUNICIPIO */
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (1, 'Ahuachapán');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (2, 'Cabañas');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (3, 'Chalatenango');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (4, 'Cuscatlán');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (5, 'La Libertad');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (6, 'La Paz');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (7, 'La Unión');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (8, 'Morazán');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (9, 'San Miguel');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (10, 'San Salvador');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (11, 'San Vicente');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (12, 'Santa Ana');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (13, 'Sonsonate');
INSERT INTO DB_DEPARTAMENTO (id_depto, name_depto) VALUES (14, 'Usulután');

Select * from DB_DEPARTAMENTO;

INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (1, 1, 'Ahuachapán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (2, 1, 'Jujutla');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (3, 1, 'Atiquizaya');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (4, 1, 'Concepción de Ataco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (5, 1, 'El Refugio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (6, 1, 'Guaymango');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (7, 1, 'Apaneca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (8, 1, 'San Francisco Menéndez');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (9, 1, 'San Lorenzo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (10, 1, 'San Pedro Puxtla');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (11, 1, 'Tacuba');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (12, 1, 'Turín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (13, 2, 'Cinquera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (14, 2, 'Villa Dolores');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (15, 2, 'Guacotecti');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (16, 2, 'Ilobasco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (17, 2, 'Jutiapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (18, 2, 'San Isidro');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (19, 2, 'Sensuntepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (20, 2, 'Ciudad de Tejutepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (21, 2, 'Victoria');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (22, 3, 'Agua Caliente');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (23, 3, 'Arcatao');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (24, 3, 'Azacualpa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (25, 3, 'Chalatenango');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (26, 3, 'Citalá');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (27, 3, 'Comalapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (28, 3, 'Concepción Quezaltepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (29, 3, 'Dulce Nombre de María');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (30, 3, 'El Carrizal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (31, 3, 'El Paraíso');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (32, 3, 'La Laguna');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (33, 3, 'La Palma');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (34, 3, 'La Reina');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (35, 3, 'Las Vueltas');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (36, 3, 'Nombre de Jesús');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (37, 3, 'Nueva Concepción');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (38, 3, 'Nueva Trinidad');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (39, 3, 'Ojos de Agua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (40, 3, 'Potonico');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (41, 3, 'San Antonio de la Cruz');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (42, 3, 'San Antonio Los Ranchos');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (43, 3, 'San Fernando');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (44, 3, 'San Francisco Lempa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (45, 3, 'San Francisco Morazán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (46, 3, 'San Ignacio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (47, 3, 'San Isro Labrador');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (48, 3, 'San José Cancasque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (49, 3, 'San José Las Flores');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (50, 3, 'San Luis del Carmen');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (51, 3, 'San Miguel de Mercedes');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (52, 3, 'San Rafael');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (53, 3, 'Santa Rita');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (54, 3, 'Tejutla');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (55, 4, 'Candelaria');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (56, 4, 'Cojutepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (57, 4, 'El Carmen');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (58, 4, 'El Rosario');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (59, 4, 'Monte San Juan');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (60, 4, 'Oratorio de Concepción');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (61, 4, 'San Bartolomé Perulapía');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (62, 4, 'San Cristóbal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (63, 4, 'San José Guayabal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (64, 4, 'San Pedro Perulapán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (65, 4, 'San Rafael Cedros');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (66, 4, 'San Ramón');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (67, 4, 'Santa Cruz Analquito');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (68, 4, 'Santa Cruz Michapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (69, 4, 'Suchitoto');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (70, 4, 'Tenancingo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (71, 5, 'Antiguo Cuscatlán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (72, 5, 'Chiltiupán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (73, 5, 'Ciudad Arce');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (74, 5, 'Colón');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (75, 5, 'Comasagua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (76, 5, 'Huizúcar');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (77, 5, 'Jayaque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (78, 5, 'Jicalapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (79, 5, 'La Libertad');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (80, 5, 'Nueva San Salvador');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (81, 5, 'Nuevo Cuscatlán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (82, 5, 'Opico');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (83, 5, 'Quezaltepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (84, 5, 'Sacacoyo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (85, 5, 'San José Villanueva');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (86, 5, 'San Matías');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (87, 5, 'San Pablo Tacachico');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (88, 5, 'Talnique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (89, 5, 'Tamanique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (90, 5, 'Teotepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (91, 5, 'Tepecoyo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (92, 5, 'Zaragoza');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (93, 6, 'Cuyultitán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (94, 6, 'El Rosario');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (95, 6, 'Jerusalén');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (96, 6, 'Mercedes La Ceiba');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (97, 6, 'Olocuilta');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (98, 6, 'Paraíso de Osorio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (99, 6, 'San Antonio Masahuat');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (100, 6, 'San Emigdio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (101, 6, 'San Francisco Chinameca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (102, 6, 'San Juan Nonualco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (103, 6, 'San Juan Talpa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (104, 6, 'San Juan Tepezontes');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (105, 6, 'San Luis La Herradura');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (106, 6, 'San Luis Talpa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (107, 6, 'San Miguel Tepezontes');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (108, 6, 'San Pedro Masahuat');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (109, 6, 'San Pedro Nonualco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (110, 6, 'San Rafael Obrajuelo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (111, 6, 'Santa María Ostuma');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (112, 6, 'Santiago Nonualco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (113, 6, 'Tapalhuaca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (114, 6, 'Zacatecoluca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (115, 7, 'Anamorós');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (116, 7, 'Bolívar');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (117, 7, 'Concepción de Oriente');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (118, 7, 'Conchagua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (119, 7, 'El Carmen');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (120, 7, 'El Sauce');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (121, 7, 'Intipucá');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (122, 7, 'La Unión');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (123, 7, 'Lislique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (124, 7, 'Meanguera del Golfo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (125, 7, 'Nueva Esparta');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (126, 7, 'Pasaquina');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (127, 7, 'Polorós');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (128, 7, 'San Alejo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (129, 7, 'San José');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (130, 7, 'Santa Rosa de Lima');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (131, 7, 'Yayantique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (132, 7, 'Yucuayquín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (133, 8, 'Arambala');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (134, 8, 'Cacaopera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (135, 8, 'Chilanga');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (136, 8, 'Corinto');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (137, 8, 'Delicias de Concepción');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (138, 8, 'El Divisadero');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (139, 8, 'El Rosario');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (140, 8, 'Gualococti');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (141, 8, 'Guatajiagua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (142, 8, 'Joateca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (143, 8, 'Jocoaitique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (144, 8, 'Jocoro');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (145, 8, 'Lolotiquillo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (146, 8, 'Meanguera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (147, 8, 'Osicala');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (148, 8, 'Perquín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (149, 8, 'San Carlos');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (150, 8, 'San Fernando');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (151, 8, 'San Francisco Gotera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (152, 8, 'San Isidro');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (153, 8, 'San Simón');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (154, 8, 'Sensembra');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (155, 8, 'Sociedad');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (156, 8, 'Torola');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (157, 8, 'Yamabal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (158, 8, 'Yoloaiquín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (159, 9, 'Carolina');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (160, 9, 'Chapeltique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (161, 9, 'Chinameca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (162, 9, 'Chirilagua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (163, 9, 'Ciudad Barrios');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (164, 9, 'Comacarán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (165, 9, 'El Tránsito');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (166, 9, 'Lolotique');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (167, 9, 'Moncagua');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (168, 9, 'Nueva Guadalupe');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (169, 9, 'Nuevo Edén de San Juan');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (170, 9, 'Quelepa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (171, 9, 'San Antonio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (172, 9, 'San Gerardo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (173, 9, 'San Jorge');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (174, 9, 'San Luis de la Reina');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (175, 9, 'San Miguel');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (176, 9, 'San Rafael');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (177, 9, 'Sesori');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (178, 9, 'Uluazapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (179, 10, 'Aguilares');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (180, 10, 'Apopa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (181, 10, 'Ayutuxtepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (182, 10, 'Cuscatancingo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (183, 10, 'Delgado');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (184, 10, 'El Paisnal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (185, 10, 'Guazapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (186, 10, 'Ilopango');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (187, 10, 'Mejicanos');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (188, 10, 'Nejapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (189, 10, 'Panchimalco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (190, 10, 'Rosario de Mora');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (191, 10, 'San Marcos');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (192, 10, 'San Martín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (193, 10, 'San Salvador');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (194, 10, 'Santiago Texacuangos');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (195, 10, 'Santo Tomás');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (196, 10, 'Soyapango');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (197, 10, 'Tonacatepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (198, 11, 'Apastepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (199, 11, 'Guadalupe');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (200, 11, 'San Cayetano Istepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (201, 11, 'San Esteban Catarina');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (202, 11, 'San Ildefonso');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (203, 11, 'San Lorenzo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (204, 11, 'San Sebastián');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (205, 11, 'Santa Clara');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (206, 11, 'Santo Domingo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (207, 11, 'San Vicente');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (208, 11, 'Tecoluca');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (209, 11, 'Tepetitán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (210, 11, 'Verapaz');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (211, 12, 'Candelaria de la Frontera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (212, 12, 'Chalchuapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (213, 12, 'Coatepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (214, 12, 'El Congo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (215, 12, 'El Porvenir');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (216, 12, 'Masahuat');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (217, 12, 'Metapán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (218, 12, 'San Antonio Pajonal');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (219, 12, 'San Sebastián Salitrillo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (220, 12, 'Santa Ana');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (221, 12, 'Santa Rosa Guachipilín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (222, 12, 'Santiago de la Frontera');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (223, 12, 'Texistepeque');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (224, 13, 'Acajutla');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (225, 13, 'Armenia');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (226, 13, 'Caluco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (227, 13, 'Cuisnahuat');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (228, 13, 'Izalco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (229, 13, 'Juayúa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (230, 13, 'Nahuizalco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (231, 13, 'Nahulingo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (232, 13, 'Salcoatitán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (233, 13, 'San Antonio del Monte');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (234, 13, 'San Julián');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (235, 13, 'Santa Catarina Masahuat');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (236, 13, 'Santa Isabel Ishuatán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (237, 13, 'Santo Domingo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (238, 13, 'Sonsonate');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (239, 13, 'Sonzacate');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (240, 14, 'Alegría');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (241, 14, 'Berlín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (242, 14, 'California');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (243, 14, 'Concepción Batres');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (244, 14, 'El Triunfo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (245, 14, 'Ereguayquín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (246, 14, 'Estanzuelas');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (247, 14, 'Jiquilisco');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (248, 14, 'Jucuapa');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (249, 14, 'Jucuarán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (250, 14, 'Mercedes Umaña');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (251, 14, 'Nueva Granada');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (252, 14, 'Ozatlán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (253, 14, 'Puerto El Triunfo');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (254, 14, 'San Agustín');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (255, 14, 'San Buenaventura');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (256, 14, 'San Dionisio');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (257, 14, 'San Francisco Javier');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (258, 14, 'Santa Elena');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (259, 14, 'Santa María');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (260, 14, 'Santiago de María');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (261, 14, 'Tecapán');
INSERT INTO DB_MUNICIPIO (id_munic, id_depto, name_munic) VALUES (262, 14, 'Usulután');








