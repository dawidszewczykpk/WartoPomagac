create table cities
(
    id          serial
        constraint cities_pk
            primary key,
    name        varchar(100) not null,
    province_id integer      not null
);

create unique index cities_id_uindex
    on cities (id);

INSERT INTO schemas.cities (id, name, province_id) VALUES (1, 'Poznań', 7);
INSERT INTO schemas.cities (id, name, province_id) VALUES (2, 'Września', 7);
INSERT INTO schemas.cities (id, name, province_id) VALUES (3, 'Śrem', 7);
INSERT INTO schemas.cities (id, name, province_id) VALUES (4, 'Wolsztyn', 7);
INSERT INTO schemas.cities (id, name, province_id) VALUES (5, 'Konin', 7);
INSERT INTO schemas.cities (id, name, province_id) VALUES (6, 'Kraków', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (7, 'Tarnów', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (8, 'Wieliczka', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (9, 'Andrychów', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (10, 'Skawina', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (11, 'Oświęcim', 6);
INSERT INTO schemas.cities (id, name, province_id) VALUES (12, 'Łódź', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (13, 'Radomsko', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (14, 'Łowicz', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (15, 'Poddębice', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (16, 'Zgierz', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (17, 'Tomaszów Mazowiecki', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (18, 'Łask', 5);
INSERT INTO schemas.cities (id, name, province_id) VALUES (19, 'Zielona Góra', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (20, 'Gorzów Wielkopolski', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (21, 'Żary', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (22, 'Świebodzin', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (23, 'Żagań', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (24, 'Słubice', 4);
INSERT INTO schemas.cities (id, name, province_id) VALUES (25, 'Biłgoraj', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (26, 'Chełm', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (27, 'Dęblin', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (28, 'Hrubieszów', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (29, 'Krasnystaw', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (30, 'Kraśnik', 3);
INSERT INTO schemas.cities (id, name, province_id) VALUES (31, 'Bydgoszcz', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (32, 'Toruń', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (33, 'Włocławek', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (34, 'Grudziądz', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (35, 'Inowrocław', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (36, 'Świecie', 2);
INSERT INTO schemas.cities (id, name, province_id) VALUES (37, 'Bardo', 1);
INSERT INTO schemas.cities (id, name, province_id) VALUES (38, 'Bielawa', 1);
INSERT INTO schemas.cities (id, name, province_id) VALUES (39, 'Bogatynia', 1);
INSERT INTO schemas.cities (id, name, province_id) VALUES (40, 'Głogów', 1);
INSERT INTO schemas.cities (id, name, province_id) VALUES (41, 'Chojnów', 1);
INSERT INTO schemas.cities (id, name, province_id) VALUES (42, 'Bolków', 1);

create table offers
(
    id               serial
        constraint offers_pk
            primary key,
    user_email       varchar(100) not null,
    province         varchar(100) not null,
    city             varchar(100) not null,
    number_of_people varchar(100) not null,
    how_long         varchar(100) not null,
    img              varchar(100) not null
);

create unique index offers_id_uindex
    on offers (id);

INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (1, 't@t.pl', 'Małopolskie', 'Oświęcim', '2', '3', 'ThumperDC.jpg');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (7, 't@t1.pl', 'Małopolskie', 'Oświęcim', '2', '3', 'ThumperDC.jpg');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (9, 't@t3.pl', 'Małopolskie', 'Oświęcim', '2', '3', 'ThumperDC.jpg');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (10, 't@t4.pl', 'Małopolskie', 'Oświęcim', '2', '3', 'ThumperDC.jpg');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (8, 't@2.pl', 'Małopolskie', 'Oświęcim', '2', '3', 'ThumperDC.jpg');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (11, 't@t.pl', 'Małopolskie', 'Kraków', '4', '16', 'Warto Pomagac-logos_white.png');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (12, 't@t.pl', 'Małopolskie', 'Kraków', '4', '16', 'Warto Pomagac-logos_white.png');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (13, 't@t.pl', 'Łódzkie', 'Poddębice', '4', '6', 'Warto Pomagac-logos_transparent.png');
INSERT INTO schemas.offers (id, user_email, province, city, number_of_people, how_long, img) VALUES (14, 't@t.pl', 'Łódzkie', 'Poddębice', '4', '6', 'Warto Pomagac-logos_transparent.png');

create table provinces
(
    id   integer default nextval('schemas.province_id_seq'::regclass) not null
        constraint province_pk
            primary key,
    name varchar(100)                                                 not null
);

create unique index province_id_uindex
    on provinces (id);

INSERT INTO schemas.provinces (id, name) VALUES (1, 'Dolnośląskie');
INSERT INTO schemas.provinces (id, name) VALUES (2, 'Kujawsko-pomorskie');
INSERT INTO schemas.provinces (id, name) VALUES (3, 'Lubelskie');
INSERT INTO schemas.provinces (id, name) VALUES (4, 'Lubuskie');
INSERT INTO schemas.provinces (id, name) VALUES (5, 'Łódzkie');
INSERT INTO schemas.provinces (id, name) VALUES (6, 'Małopolskie');
INSERT INTO schemas.provinces (id, name) VALUES (7, 'Wielkopolskie');

create table users
(
    email           varchar(100) not null
        constraint users_pk
            primary key,
    password        varchar(100) not null,
    id_user_details integer      not null
);

create unique index users_email_uindex
    on users (email);


INSERT INTO schemas.users (email, password, id_user_details) VALUES ('Test@test.pl', '098f6bcd4621d373cade4e832627b4f6', 1);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('test2@test.pl', '098f6bcd4621d373cade4e832627b4f6', 5);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('test3@test.pl', '098f6bcd4621d373cade4e832627b4f6', 6);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('test4@test.pl', '098f6bcd4621d373cade4e832627b4f6', 8);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('test@test.pl', '098f6bcd4621d373cade4e832627b4f6', 10);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('t', 'd41d8cd98f00b204e9800998ecf8427e', 7);
INSERT INTO schemas.users (email, password, id_user_details) VALUES ('t@t.pl', '098f6bcd4621d373cade4e832627b4f6', 12);

create table users_details
(
    id         serial
        constraint users_details_pk
            primary key,
    name       varchar(100) not null,
    surname    varchar(100) not null,
    permission integer      not null
);

create unique index users_details_id_uindex
    on users_details (id);

INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (1, 'Test', 'Test', 2);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (4, 'Test', 'test', 1);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (5, 'Test2', 'Test2', 1);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (6, 'test', 'test', 1);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (8, 'Test4', 'Test4', 1);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (10, 'Test', 'Test', 1);
INSERT INTO schemas.users_details (id, name, surname, permission) VALUES (12, 'Test6', 'Test6', 2);



