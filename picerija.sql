CREATE TABLE IF NOT EXISTS `uporabniki` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `priimek` VARCHAR(45) NOT NULL,
  `tel` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE IF NOT EXISTS `narocila` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kolicina` INT NOT NULL,
  `kolicina_dodatkov` INT NOT NULL,
  `datum_prevzema` DATETIME NOT NULL,
  `dodatek_id` INT NOT NULL,
  `velikost_id` INT NOT NULL,
  `pica_id` INT NOT NULL,
  `uporabnik_id` INT NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE INDEX `IX_Relationship1` ON `narocila` (`uporabnik_id`);
CREATE INDEX `IX_Relationship2` ON `narocila` (`dodatek_id`);
CREATE INDEX `IX_Relationship3` ON `narocila` (`velikost_id`);
CREATE INDEX `IX_Relationship4` ON `narocila` (`pica_id`);

CREATE TABLE IF NOT EXISTS `dodatki` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
);

-- CREATE TABLE IF NOT EXISTS `dodatki_narocila` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `narocilo_id` INT NOT NULL,
--   `dodatek_id` INT NOT NULL,
--   PRIMARY KEY (`id`));

-- CREATE INDEX `IX_Relationship2` ON `dodatki_narocila` (`narocilo_id`);
-- CREATE INDEX `IX_Relationship3` ON `dodatki_narocila` (`dodatek_id`);

CREATE TABLE IF NOT EXISTS `velikosti` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `cena` DOUBLE NOT NULL,
  PRIMARY KEY (`id`));

-- CREATE TABLE IF NOT EXISTS `narocila_velikosti` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `velikost_id` INT NOT NULL,
--   `narocilo_id` INT NOT NULL,
--   PRIMARY KEY (`id`));

-- CREATE INDEX `IX_Relationship4` ON `narocila_velikosti` (`velikost_id`);
-- CREATE INDEX `IX_Relationship5` ON `narocila_velikosti` (`narocilo_id`);

CREATE TABLE IF NOT EXISTS `pice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `cena` DOUBLE NOT NULL,
  PRIMARY KEY (`id`));

-- CREATE TABLE IF NOT EXISTS `narocila_pice` (
--   `id` INT NOT NULL AUTO_INCREMENT,
--   `pica_id` INT NOT NULL,
--   `narocilo_id` INT NOT NULL,
--   PRIMARY KEY (`id`));

-- CREATE INDEX `IX_Relationship6` ON `narocila_pice` (`pica_id`);
-- CREATE INDEX `IX_Relationship7` ON `narocila_pice` (`narocilo_id`);


ALTER TABLE `narocila` ADD CONSTRAINT `Relationship1` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `narocila` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`dodatek_id`) REFERENCES `dodatki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `narocila` ADD CONSTRAINT `Relationship3` FOREIGN KEY (`velikost_id`) REFERENCES `velikosti` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `narocila` ADD CONSTRAINT `Relationship4` FOREIGN KEY (`pica_id`) REFERENCES `pice` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ALTER TABLE `dodatki_narocila` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`narocilo_id`) REFERENCES `narocila` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `dodatki_narocila` ADD CONSTRAINT `Relationship3` FOREIGN KEY (`dodatek_id`) REFERENCES `dodatki` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `narocila_velikosti` ADD CONSTRAINT `Relationship4` FOREIGN KEY (`velikost_id`) REFERENCES `velikosti` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `narocila_velikosti` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`narocilo_id`) REFERENCES `narocila` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `narocila_pice` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`pica_id`) REFERENCES `pice` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
-- ALTER TABLE `narocila_pice` ADD CONSTRAINT `Relationship7` FOREIGN KEY (`narocilo_id`) REFERENCES `narocila` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO `velikosti` (`ime`, `cena`) VALUES ('Mala', '1');
INSERT INTO `velikosti` (`ime`, `cena`) VALUES ('Velika', '1.15');
INSERT INTO `velikosti` (`ime`, `cena`) VALUES ('Družinska', '2');

INSERT INTO `dodatki` (`ime`) VALUES ('Jajce');
INSERT INTO `dodatki` (`ime`) VALUES ('Slanina');
INSERT INTO `dodatki` (`ime`) VALUES ('Nacho');
INSERT INTO `dodatki` (`ime`) VALUES ('Ketchup');
INSERT INTO `dodatki` (`ime`) VALUES ('Koruza');
INSERT INTO `dodatki` (`ime`) VALUES ('Paprika');
INSERT INTO `dodatki` (`ime`) VALUES ('Pršut');
INSERT INTO `dodatki` (`ime`) VALUES ('Olive');
INSERT INTO `dodatki` (`ime`) VALUES ('Paradižnik');
INSERT INTO `dodatki` (`ime`) VALUES ('Tatarska omaka');
INSERT INTO `dodatki` (`ime`) VALUES ('Kisla smetana');

INSERT INTO `pice` (`ime`, `cena`) VALUES ('Margarita', '5.9');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Klasična', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Mehiška', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Poletna', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Morska', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Rukola', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Tuna', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Kraška', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Puran', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Štajerska', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Vražja', '6.6');
INSERT INTO `pice` (`ime`, `cena`) VALUES ('Napolitana', '6.6');



