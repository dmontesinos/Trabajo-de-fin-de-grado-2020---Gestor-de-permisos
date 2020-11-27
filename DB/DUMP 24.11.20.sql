-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gestor_permisos
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gestor_permisos` ;

-- -----------------------------------------------------
-- Schema gestor_permisos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gestor_permisos` DEFAULT CHARACTER SET utf8 COLLATE utf8_estonian_ci ;
USE `gestor_permisos` ;

-- -----------------------------------------------------
-- Table `gestor_permisos`.`Centros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Centros` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Centros` (
  `idCentro` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `acronimo` VARCHAR(100) NULL,
  PRIMARY KEY (`idCentro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Estudios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Estudios` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Estudios` (
  `idEstudio` INT NOT NULL,
  `nombre` VARCHAR(150) NOT NULL,
  `acronimo` VARCHAR(300) NULL,
  `Centros_idCentros` INT NOT NULL,
  `activo` TINYINT NULL,
  `tipo` ENUM('Grau', 'Màster') NULL,
  PRIMARY KEY (`idEstudio`, `Centros_idCentros`),
  INDEX `fk_Grados_Facultades1_idx` (`Centros_idCentros` ASC) VISIBLE,
  CONSTRAINT `fk_Grados_Facultades1`
    FOREIGN KEY (`Centros_idCentros`)
    REFERENCES `gestor_permisos`.`Centros` (`idCentro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Departamentos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Departamentos` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Departamentos` (
  `idDepartamentos` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `acronimo` VARCHAR(100) NULL,
  PRIMARY KEY (`idDepartamentos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Asignaturas` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Asignaturas` (
  `idAsignaturas` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idAsignaturas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Profesores` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Profesores` (
  `niu` INT NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`niu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Objeto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Objeto` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Objeto` (
  `idObjeto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idObjeto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Anio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Anio` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Anio` (
  `inicio` INT NOT NULL,
  PRIMARY KEY (`inicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Grupo` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Grupo` (
  `idGrupo` INT NOT NULL,
  `Anio_inicio` INT NOT NULL,
  PRIMARY KEY (`idGrupo`, `Anio_inicio`),
  INDEX `fk_Grupo_Anio1_idx` (`Anio_inicio` ASC) VISIBLE,
  CONSTRAINT `fk_Grupo_Anio1`
    FOREIGN KEY (`Anio_inicio`)
    REFERENCES `gestor_permisos`.`Anio` (`inicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Asignaturas_has_Estudios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Asignaturas_has_Estudios` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Asignaturas_has_Estudios` (
  `Asignaturas_idAsignaturas` INT NOT NULL,
  `Estudios_idEstudios` INT NOT NULL,
  `Estudio_Centros_idCentros` INT NOT NULL,
  PRIMARY KEY (`Asignaturas_idAsignaturas`, `Estudios_idEstudios`, `Estudio_Centros_idCentros`),
  INDEX `fk_Asignaturas_has_Grados_Grados1_idx` (`Estudios_idEstudios` ASC, `Estudio_Centros_idCentros` ASC) VISIBLE,
  INDEX `fk_Asignaturas_has_Grados_Asignaturas1_idx` (`Asignaturas_idAsignaturas` ASC) VISIBLE,
  CONSTRAINT `fk_Asignaturas_has_Grados_Asignaturas1`
    FOREIGN KEY (`Asignaturas_idAsignaturas`)
    REFERENCES `gestor_permisos`.`Asignaturas` (`idAsignaturas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Asignaturas_has_Grados_Grados1`
    FOREIGN KEY (`Estudios_idEstudios` , `Estudio_Centros_idCentros`)
    REFERENCES `gestor_permisos`.`Estudios` (`idEstudio` , `Centros_idCentros`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Grupo_has_Asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Grupo_has_Asignaturas` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Grupo_has_Asignaturas` (
  `Grupo_idGrupo` INT NOT NULL,
  `Asignaturas_idAsignaturas` INT NOT NULL,
  `ocupacion` INT NULL,
  PRIMARY KEY (`Grupo_idGrupo`, `Asignaturas_idAsignaturas`),
  INDEX `fk_Grupo_has_Asignaturas_Asignaturas1_idx` (`Asignaturas_idAsignaturas` ASC) VISIBLE,
  INDEX `fk_Grupo_has_Asignaturas_Grupo1_idx` (`Grupo_idGrupo` ASC) VISIBLE,
  CONSTRAINT `fk_Grupo_has_Asignaturas_Grupo1`
    FOREIGN KEY (`Grupo_idGrupo`)
    REFERENCES `gestor_permisos`.`Grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Grupo_has_Asignaturas_Asignaturas1`
    FOREIGN KEY (`Asignaturas_idAsignaturas`)
    REFERENCES `gestor_permisos`.`Asignaturas` (`idAsignaturas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Ambitos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Ambitos` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Ambitos` (
  `idAmbitos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `tabla` VARCHAR(100) NULL,
  PRIMARY KEY (`idAmbitos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Cargos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Cargos` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Cargos` (
  `idCargos` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) NULL,
  `idEnAmbito` INT NULL,
  `Ambitos_idAmbitos` INT NOT NULL,
  PRIMARY KEY (`idCargos`, `Ambitos_idAmbitos`),
  INDEX `fk_Cargos_Ambitos1_idx` (`Ambitos_idAmbitos` ASC) VISIBLE,
  CONSTRAINT `fk_Cargos_Ambitos1`
    FOREIGN KEY (`Ambitos_idAmbitos`)
    REFERENCES `gestor_permisos`.`Ambitos` (`idAmbitos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Permisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Permisos` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Permisos` (
  `idPermisos` INT NOT NULL,
  `nivel` ENUM('ninguno', 'basico', 'total') NULL DEFAULT 'ninguno',
  `Objeto_idObjeto` INT NOT NULL,
  `Ambitos_idAmbitos` INT NOT NULL,
  PRIMARY KEY (`idPermisos`, `Objeto_idObjeto`, `Ambitos_idAmbitos`),
  INDEX `fk_Permisos_Objeto1_idx` (`Objeto_idObjeto` ASC) VISIBLE,
  INDEX `fk_Permisos_Ambitos1_idx` (`Ambitos_idAmbitos` ASC) VISIBLE,
  CONSTRAINT `fk_Permisos_Objeto1`
    FOREIGN KEY (`Objeto_idObjeto`)
    REFERENCES `gestor_permisos`.`Objeto` (`idObjeto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_Ambitos1`
    FOREIGN KEY (`Ambitos_idAmbitos`)
    REFERENCES `gestor_permisos`.`Ambitos` (`idAmbitos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Profesores_has_Grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Profesores_has_Grupo` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Profesores_has_Grupo` (
  `Profesores_niu` INT NOT NULL,
  `Grupo_idGrupo` INT NOT NULL,
  `Grupo_Anio_inicio` INT NOT NULL,
  PRIMARY KEY (`Profesores_niu`, `Grupo_idGrupo`, `Grupo_Anio_inicio`),
  INDEX `fk_Profesores_has_Grupo_Profesores1_idx` (`Profesores_niu` ASC) VISIBLE,
  INDEX `fk_Profesores_has_Grupo_Grupo1_idx` (`Grupo_idGrupo` ASC, `Grupo_Anio_inicio` ASC) VISIBLE,
  CONSTRAINT `fk_Profesores_has_Grupo_Profesores1`
    FOREIGN KEY (`Profesores_niu`)
    REFERENCES `gestor_permisos`.`Profesores` (`niu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Profesores_has_Grupo_Grupo1`
    FOREIGN KEY (`Grupo_idGrupo` , `Grupo_Anio_inicio`)
    REFERENCES `gestor_permisos`.`Grupo` (`idGrupo` , `Anio_inicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Departamentos_has_Profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Departamentos_has_Profesores` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Departamentos_has_Profesores` (
  `Departamentos_idDepartamentos` INT NOT NULL,
  `Profesores_niu` INT NOT NULL,
  PRIMARY KEY (`Departamentos_idDepartamentos`, `Profesores_niu`),
  INDEX `fk_Departamentos_has_Profesores_Profesores1_idx` (`Profesores_niu` ASC) VISIBLE,
  INDEX `fk_Departamentos_has_Profesores_Departamentos1_idx` (`Departamentos_idDepartamentos` ASC) VISIBLE,
  CONSTRAINT `fk_Departamentos_has_Profesores_Departamentos1`
    FOREIGN KEY (`Departamentos_idDepartamentos`)
    REFERENCES `gestor_permisos`.`Departamentos` (`idDepartamentos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Departamentos_has_Profesores_Profesores1`
    FOREIGN KEY (`Profesores_niu`)
    REFERENCES `gestor_permisos`.`Profesores` (`niu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestor_permisos`.`Cargos_has_Profesores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestor_permisos`.`Cargos_has_Profesores` ;

CREATE TABLE IF NOT EXISTS `gestor_permisos`.`Cargos_has_Profesores` (
  `Cargos_idCargos` INT NOT NULL,
  `Profesores_niu` INT NOT NULL,
  PRIMARY KEY (`Cargos_idCargos`, `Profesores_niu`),
  INDEX `fk_Cargos_has_Profesores_Profesores1_idx` (`Profesores_niu` ASC) VISIBLE,
  INDEX `fk_Cargos_has_Profesores_Cargos1_idx` (`Cargos_idCargos` ASC) VISIBLE,
  CONSTRAINT `fk_Cargos_has_Profesores_Cargos1`
    FOREIGN KEY (`Cargos_idCargos`)
    REFERENCES `gestor_permisos`.`Cargos` (`idCargos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cargos_has_Profesores_Profesores1`
    FOREIGN KEY (`Profesores_niu`)
    REFERENCES `gestor_permisos`.`Profesores` (`niu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `gestor_permisos`.`Centros`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestor_permisos`;
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (101, 'Facultat de Filosofia i Lletres', 'FFiL');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (102, 'Facultat de Medicina', 'FM');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (103, 'Facultat de Ciències', 'FC');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (105, 'Facultat de Ciències de la Comunicació', 'FCC');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (106, 'Facultat de Dret', 'FD');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (107, 'Facultat de Veterinària', 'FV');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (108, 'Facultat de Ciències Polítiques i de Sociologia', 'FCPS');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (109, 'Facultat de Psicologia', 'FP');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (110, 'Facultat de Traducció i d\'Interpretació', 'FTI');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (111, 'Facultat de Ciències de l\'Educació', 'FCE');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (113, 'Facultat de Biociències', 'FB');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (114, 'Facultat d\'Economia i Empresa', 'FEE');
INSERT INTO `gestor_permisos`.`Centros` (`idCentro`, `nombre`, `acronimo`) VALUES (115, 'Escola d\'Enginyeria', 'EE');

COMMIT;


-- -----------------------------------------------------
-- Data for table `gestor_permisos`.`Estudios`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestor_permisos`;
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (958, 'Grau en Enginyeria Informàtica', 'GEI', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (951, 'Grau en Enginyeria Química', 'GEQ', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (956, 'Grau en Enginyeria de Sistemes de Telecomunicació', 'GEST', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (957, 'Grau en Enginyeria Electrònica de Telecomunicació', 'GEET', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1206, 'Grau en Enginyeria Informàtica (Menció en Enginyeria de Computadors) i Grau en Enginyeria Electrònica de Telecomunicació', 'GEI+GEET', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1207, 'Grau en Enginyeria Informàtica (Menció en Tecnologies de la Informació) i Grau en Enginyeria de Sistemes de Telecomunicació', 'GEI+GEST', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1365, 'Grau en Enginyeria Electrònica de Telecomunicació i Grau en Enginyeria de Sistemes de Telecomunicació', 'GEET+GEST', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1394, 'Grau en Enginyeria de Dades', 'GED', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1395, 'Grau en Gestió de Ciutats Intel·ligents i Sostenibles', 'GGCIS', 115, 1, 'Grau');
INSERT INTO `gestor_permisos`.`Estudios` (`idEstudio`, `nombre`, `acronimo`, `Centros_idCentros`, `activo`, `tipo`) VALUES (1170, 'Màster en Enginyeria de Telecomunicació', 'MET', 115, 1, 'Màster');

COMMIT;


-- -----------------------------------------------------
-- Data for table `gestor_permisos`.`Departamentos`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestor_permisos`;
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (429, 'Departament de Filologia Anglesa i de Germanística', 'DFAG');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (433, 'Departament de Ciència Política i de Dret Públic', 'DCPiDP');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (403, 'Departament de Química', 'DQ');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (431, 'Departament de Geografia', 'DG');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (461, 'Departament de Telecomunicació i d\'Enginyeria de Sistemes', 'DTES');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (2634, 'Departament d\'Enginyeria Química, Biològica i Ambiental', 'DEQBA');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (472, 'Departament d\'Enginyeria de la Informació i de les Comunicacions', 'DEIC');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (438, 'Departament de Dret Privat', 'DDP');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (469, 'Departament d\'Arquitectura de Computadors i Sistemes Operatius', 'DACSO');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (470, 'Departament de Microelectrónica i de Sistemes Electrònics', 'DMSE');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (471, 'Departament de Ciències de la Computació', 'DCC');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (463, 'Departament d\'Enginyeria Electrònica', 'DEE');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (404, 'Departament de Física', 'DF');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (402, 'Departament de Matemàtiques', 'DM');
INSERT INTO `gestor_permisos`.`Departamentos` (`idDepartamentos`, `nombre`, `acronimo`) VALUES (485, 'Departament d\'Empresa', 'DE');

COMMIT;


-- -----------------------------------------------------
-- Data for table `gestor_permisos`.`Ambitos`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestor_permisos`;
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (1, 'Centros', 'idCentro');
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (2, 'Estudios', 'idEstudio');
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (3, 'Asignaturas', 'idAsignaturas');
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (4, 'Departamentos', 'idDepartamentos');
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (5, 'Grupo', 'idGrupo');
INSERT INTO `gestor_permisos`.`Ambitos` (`idAmbitos`, `nombre`, `tabla`) VALUES (6, 'Profesores', 'niu');

COMMIT;

