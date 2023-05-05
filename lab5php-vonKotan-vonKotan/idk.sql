use info2vonKotan;

CREATE TABLE telefonkonyv (

id int primary key auto_increment,

nev varchar(100),

szam varchar(100)

);

INSERT INTO telefonkonyv(nev,szam) VALUES('Dávid Zoli', '+36-1-4633714');
INSERT INTO telefonkonyv(nev,szam) VALUES('Kovács Feri', '+36-1-4631648');
INSERT INTO telefonkonyv(nev,szam) VALUES('Mészáros Tomi', '+36-1-4634225');

SELECT * FROM telefonkonyv