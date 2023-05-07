use mintazh; --NE FELEJTSD EL SCHEMA NEVET ÉS FILENEVET VÁLTOZTATNI

-- Állatok tábla létrehozása
CREATE TABLE allatok (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nev VARCHAR(100) NOT NULL,
  faj VARCHAR(100) NOT NULL
);

-- Gondozók tábla létrehozása
CREATE TABLE gondozok (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nev VARCHAR(100) NOT NULL,
  eletkor INT NOT NULL
);

-- Kapcsolótábla az állatok és gondozók közötti kapcsolatok tárolásához
CREATE TABLE allat_gondozok (
  allat_id INT NOT NULL,
  gondozo_id INT NOT NULL,
  FOREIGN KEY (allat_id) REFERENCES allatok(id),
  FOREIGN KEY (gondozo_id) REFERENCES gondozok(id),
  PRIMARY KEY (allat_id, gondozo_id)
);

INSERT INTO allatok (id, nev, faj)
VALUES (1, 'Bálint', 'vizilo'),
       (2, 'Glória', 'vizilo'),
       (3, 'Meng', 'panda'),
       (4, 'Theo', 'zsiraf');
       
INSERT INTO gondozok (id, nev, eletkor)
VALUES (1, 'Kiss Anna', 28),
       (2, 'Közepes Béla', 42),
       (3, 'Nagy Cecil', 56);
       
INSERT INTO allat_gondozok (allat_id, gondozo_id)
VALUES (1,2),
       (1,3),
       (2,1),
       (3, 1),
       (4, 1);

select * from allatok;

