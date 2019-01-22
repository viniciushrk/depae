-- -- MySQL Script generated by MySQL Workbench
-- -- Wed Jan 16 17:43:37 2019
-- -- Model: New Model    Version: 1.0
-- -- MySQL Workbench Forward Engineering
--
-- SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
-- SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
--
-- -- -----------------------------------------------------
-- -- Schema depae
-- -- -----------------------------------------------------
-- DROP SCHEMA IF EXISTS `u504061722_rdd` ;
--
-- -- -----------------------------------------------------
-- -- Schema depae
-- -- -----------------------------------------------------
-- CREATE SCHEMA IF NOT EXISTS `u504061722_rdd` DEFAULT CHARACTER SET utf8 ;
-- SHOW WARNINGS;
USE `u504061722_rdd` ;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`curso` (
  `idCurso` INT NOT NULL AUTO_INCREMENT,
  `nome_curso` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idCurso`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`turno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`turno` (
  `idTurno` INT NOT NULL AUTO_INCREMENT,
  `turno` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTurno`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`turma` (
  `idTurma` VARCHAR(20) NOT NULL,
  `serie` VARCHAR(8) NOT NULL,
  `periodo_letivo` VARCHAR(6) NOT NULL,
  `curso_idCurso` INT NOT NULL,
  `turno_idTurno` INT NOT NULL,
  PRIMARY KEY (`idTurma`),
  CONSTRAINT `fk_Turma_Curso`
    FOREIGN KEY (`curso_idCurso`)
    REFERENCES `u504061722_rdd`.`curso` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_turno1`
    FOREIGN KEY (`turno_idTurno`)
    REFERENCES `u504061722_rdd`.`turno` (`idTurno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_Turma_Curso_idx` ON `u504061722_rdd`.`turma` (`curso_idCurso` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_turma_turno1_idx` ON `u504061722_rdd`.`turma` (`turno_idTurno` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`aluno` (
  `num_matricula` VARCHAR(20) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `rg` VARCHAR(9) NOT NULL,
  `orgexp` VARCHAR(20) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `telefone` VARCHAR(20) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`num_matricula`))
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `cpf_UNIQUE` ON `u504061722_rdd`.`aluno` (`cpf` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`cargo` (
  `idCargo` INT NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCargo`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`servidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`servidor` (
  `idServidor` INT NOT NULL AUTO_INCREMENT,
  `siape` VARCHAR(45) NOT NULL,
  `login_email` VARCHAR(255) NOT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `senha` VARBINARY(80) NOT NULL,
  `cargo_idCargo` INT NOT NULL,
  `status` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idServidor`),
  CONSTRAINT `fk_servidor_cargo1`
    FOREIGN KEY (`cargo_idCargo`)
    REFERENCES `u504061722_rdd`.`cargo` (`idCargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `login_email_UNIQUE` ON `u504061722_rdd`.`servidor` (`login_email` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_servidor_cargo1_idx` ON `u504061722_rdd`.`servidor` (`cargo_idCargo` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`coordenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`coordenador` (
  `idcoordenador` INT NOT NULL AUTO_INCREMENT,
  `Servidor_idServidor` INT NOT NULL,
  `curso_idCurso` INT NOT NULL,
  PRIMARY KEY (`idcoordenador`),
  CONSTRAINT `fk_coordenador_Servidor1`
    FOREIGN KEY (`Servidor_idServidor`)
    REFERENCES `u504061722_rdd`.`servidor` (`idServidor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_coordenador_curso1`
    FOREIGN KEY (`curso_idCurso`)
    REFERENCES `u504061722_rdd`.`curso` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_coordenador_Servidor1_idx` ON `u504061722_rdd`.`coordenador` (`Servidor_idServidor` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_coordenador_curso1_idx` ON `u504061722_rdd`.`coordenador` (`curso_idCurso` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`nivel_falta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`nivel_falta` (
  `idNivel_falta` INT NOT NULL AUTO_INCREMENT,
  `nivel_falta` VARCHAR(45) NOT NULL,
  `dias_penalidade` INT NOT NULL,
  PRIMARY KEY (`idNivel_falta`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`motivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`motivo` (
  `idMotivo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `servidor_idServidor` INT NOT NULL,
  `nivel_falta_idNivel_falta` INT NOT NULL,
  PRIMARY KEY (`idMotivo`),
  CONSTRAINT `fk_cadastro_Faltas_servidor1`
    FOREIGN KEY (`servidor_idServidor`)
    REFERENCES `u504061722_rdd`.`servidor` (`idServidor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastro_Faltas_nivel_falta1`
    FOREIGN KEY (`nivel_falta_idNivel_falta`)
    REFERENCES `u504061722_rdd`.`nivel_falta` (`idNivel_falta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_cadastro_Faltas_servidor1_idx` ON `u504061722_rdd`.`motivo` (`servidor_idServidor` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_cadastro_Faltas_nivel_falta1_idx` ON `u504061722_rdd`.`motivo` (`nivel_falta_idNivel_falta` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`faltas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`faltas` (
  `idFaltas` INT NOT NULL AUTO_INCREMENT,
  `data_inicio` DATE NOT NULL,
  `motivo_idMotivo` INT NOT NULL,
  `aluno_num_matricula` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idFaltas`),
  CONSTRAINT `fk_faltas_cadastro_Faltas1`
    FOREIGN KEY (`motivo_idMotivo`)
    REFERENCES `u504061722_rdd`.`motivo` (`idMotivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_faltas_aluno1`
    FOREIGN KEY (`aluno_num_matricula`)
    REFERENCES `u504061722_rdd`.`aluno` (`num_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_faltas_cadastro_Faltas1_idx` ON `u504061722_rdd`.`faltas` (`motivo_idMotivo` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_faltas_aluno1_idx` ON `u504061722_rdd`.`faltas` (`aluno_num_matricula` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`disciplina` (
  `idDisciplina` INT NOT NULL AUTO_INCREMENT,
  `materia` VARCHAR(45) NOT NULL,
  `carga_horaria` INT NOT NULL,
  `aulas_nao_precenciais` INT NULL,
  `aulas_presenciais` INT NULL,
  `curso_idCurso` INT NOT NULL,
  PRIMARY KEY (`idDisciplina`),
  CONSTRAINT `fk_disciplina_curso1`
    FOREIGN KEY (`curso_idCurso`)
    REFERENCES `u504061722_rdd`.`curso` (`idCurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_disciplina_curso1_idx` ON `u504061722_rdd`.`disciplina` (`curso_idCurso` ASC);

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`tipo_vinculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`tipo_vinculo` (
  `idTipo_vinculo` INT NOT NULL AUTO_INCREMENT,
  `tipo_vinculo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipo_vinculo`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `u504061722_rdd`.`disciplina_aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u504061722_rdd`.`disciplina_aluno` (
  `disciplina_idDisciplina` INT NOT NULL,
  `tipo_vinculo_idTipo_vinculo` INT NOT NULL,
  `faltas_justificadas` INT NULL,
  `numero_faltas` INT NULL,
  `percentual_faltas` INT NULL,
  `frequencia` INT NULL,
  `aluno_num_matricula` VARCHAR(20) NOT NULL,
  `turma_idTurma` VARCHAR(20) NOT NULL,
  CONSTRAINT `fk_disciplina_has_aluno_disciplina1`
    FOREIGN KEY (`disciplina_idDisciplina`)
    REFERENCES `u504061722_rdd`.`disciplina` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_aluno_tipo_Vinculo1`
    FOREIGN KEY (`tipo_vinculo_idTipo_vinculo`)
    REFERENCES `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_aluno_aluno1`
    FOREIGN KEY (`aluno_num_matricula`)
    REFERENCES `u504061722_rdd`.`aluno` (`num_matricula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_disciplina_aluno_turma1`
    FOREIGN KEY (`turma_idTurma`)
    REFERENCES `u504061722_rdd`.`turma` (`idTurma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_disciplina_has_aluno_disciplina1_idx` ON `u504061722_rdd`.`disciplina_aluno` (`disciplina_idDisciplina` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_disciplina_aluno_tipo_Vinculo1_idx` ON `u504061722_rdd`.`disciplina_aluno` (`tipo_vinculo_idTipo_vinculo` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_disciplina_aluno_aluno1_idx` ON `u504061722_rdd`.`disciplina_aluno` (`aluno_num_matricula` ASC);

SHOW WARNINGS;
CREATE INDEX `fk_disciplina_aluno_turma1_idx` ON `u504061722_rdd`.`disciplina_aluno` (`turma_idTurma` ASC);

SHOW WARNINGS;

-- SET SQL_MODE=@OLD_SQL_MODE;
-- SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
-- SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `u504061722_rdd`.`cargo`
-- -----------------------------------------------------
START TRANSACTION;
USE `u504061722_rdd`;
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (1, 'Admin');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (2, 'Chefe DEPAE');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (3, 'Técnico administrativo DEPAE');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (4, 'Coodenador de Curso Técnico em Informática');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (5, 'Coodenador de Curso Técnico em Eletrotécnica');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (6, 'Coodenador de Curso Técnico em Edificação');
INSERT INTO `u504061722_rdd`.`cargo` (`idCargo`, `cargo`) VALUES (7, 'Coodenador de Curso Técnico em Quimica');

COMMIT;


-- -----------------------------------------------------
-- Data for table `u504061722_rdd`.`servidor`
-- -----------------------------------------------------
START TRANSACTION;
USE `u504061722_rdd`;
INSERT INTO `u504061722_rdd`.`servidor` (`idServidor`, `siape`, `login_email`, `nome`, `senha`, `cargo_idCargo`, `status`) VALUES (1, '123', 'admin@localhost', 'Admin', AES_ENCRYPT('0258', '39IsoQcrzyblPAEZ'), 1, 'A');

COMMIT;


-- -----------------------------------------------------
-- Data for table `u504061722_rdd`.`nivel_falta`
-- -----------------------------------------------------
START TRANSACTION;
USE `u504061722_rdd`;
INSERT INTO `u504061722_rdd`.`nivel_falta` (`idNivel_falta`, `nivel_falta`, `dias_penalidade`) VALUES (1, 'Leve', 30);
INSERT INTO `u504061722_rdd`.`nivel_falta` (`idNivel_falta`, `nivel_falta`, `dias_penalidade`) VALUES (2, 'Média', 90);
INSERT INTO `u504061722_rdd`.`nivel_falta` (`idNivel_falta`, `nivel_falta`, `dias_penalidade`) VALUES (3, 'Grave', 180);

COMMIT;


-- -----------------------------------------------------
-- Data for table `u504061722_rdd`.`motivo`
-- -----------------------------------------------------
START TRANSACTION;
USE `u504061722_rdd`;
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (1, 'I. Deixar de cumprir os horários estabelecidos pelo campus, sem justificativa', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (2, 'II. Entrar nas dependências restritas sem autorização ou provocar ruídos nas suas proximidades', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (3, 'III. Descumprir as normas do campus, que orientam o uso de vestuários e uniformes', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (4, 'IV. Descumprir as normas do campus que orientam o uso de instalações, equipamentos e serviços', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (5, 'V. Utilizar o telefone celular, outros equipamentos eletrônicos ou instrumentos musicais que interfiram no processo de ensino e aprendizagem', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (6, 'VI. Retirar-se do ambiente de aula sem autorização', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (7, 'VII. Deixar de comparecer à sala de aula ou laboratório em horário de atividade, estando presente no campus', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (8, 'VIII. Deixar de entregar comunicação aos pais e/ou responsáveis referentes a assuntos escolares', 1, 1);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (9, 'I. Desrespeitar, provocar, desacatar com palavras, atos ou gestos, qualquer pessoa da comunidade acadêmica', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (10, 'II. Instigar faltas coletivas', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (11, 'III. Organizar eventos e qualquer forma de arrecadação, de propaganda, distribuição de impressos, publicação ou divulgação em imprensa falada, escrita ou televisionada em nome da instituição, sem o consentimento da Direção-Geral', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (12, 'IV. Interromper ou conturbar qualquer atividade acadêmica e/ou técnica administrativas nas dependências do campus, ou fora deste, quando em visitas técnicas ou atividades complementares, representando-o', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (13, 'V. Distorcer e fornecer informações inverídicas quando solicitadas', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (14, 'VI. Omitir-se, sem justificativa, de atividades escolares no campus ou fora dele, quando estiver representando-o', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (15, 'VII. Fazer uso indevido de recursos tecnológicos do Instituto que venham infringir o presente Regulamento', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (16, 'VIII. Facilitar o acesso de pessoas estranhas às dependências do campus sem a devida identificação e autorização', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (17, 'IX. Entrar ou sair do campus utilizando acessos que não sejam os permitidos pelo mesmo', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (18, 'X. Exceder-se em manifestações enamoradas impróprias ao ambiente escolar', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (19, 'XI. Praticar a retirada de equipamentos, produtos e outros, de qualquer setor, sem a prévia autorização do responsável', 1, 2);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (20, 'I. Ausentar-se do campus ou de qualquer atividade em que esteja representando a Instituição sem autorização dos responsáveis legais e sem a devida identificação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (21, 'II. Usar, portar, comercializar ou incentivar o uso de bebidas alcoólicas e substâncias entorpecentes dentro do campus ou em representação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (22, 'III. Compartilhar e/ou utilizar qualquer tipo de material pornográfico nas dependências do IFRO', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (23, 'IV. Tentar ou cometer furto, roubo e receptação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (24, 'V. Tentar ou agredir física ou moralmente qualquer membro da comunidade acadêmica no campus, durante o translado nos meios de transportes institucionais ou em representação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (25, 'VI. Praticar atos sexuais, libidinosos e de atentado ao pudor nas dependências do campus ou em representação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (26, 'VII. Causar danos em bens pertencentes ao campus ou propriedade alheia, ficando sujeito a indenização', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (27, 'VIII. Expor a perigo a vida ou a saúde de outrem', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (28, 'IX. Usar tabaco e similares nas dependências do IFRO ou em atividades externas de representação do mesmo, conforme definido em Lei', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (29, 'X. Organizar e participar de Jogos com finalidade de aposta', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (30, 'XI. Praticar ou incentivar qualquer modalidade de trote, bullying, cyberbullying ou qualquer outra forma de violência, que venha causar, direta ou indiretamente, danos físicos, psicológicos ou morais a qualquer membro da comunidade acadêmica', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (31, 'XII. Plagiar, total ou parcialmente, obras literárias, artísticas, científicas, técnicas ou culturais', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (32, 'XIII. Constranger alguém a fazer, tolerar que se faça ou deixar de fazer alguma coisa, mediante violência ou grave ameaça, e com o intuito de obter para si ou para outrem vantagem indevida', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (33, 'XIV. Portar ou manter sob sua guarda qualquer tipo de arma ou objeto cortante e perfurante nas dependências do IFRO ou em representação', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (34, 'XV. Adulterar documentos', 1, 3);
INSERT INTO `u504061722_rdd`.`motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES (35, 'XVI. Praticar, induzir ou incitar, por qualquer meio, a discriminação ou preconceito de gênero, raça, cor, etnia, religião, orientação sexual ou procedência', 1, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `u504061722_rdd`.`tipo_vinculo`
-- -----------------------------------------------------
START TRANSACTION;
USE `u504061722_rdd`;
INSERT INTO `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES (1, 'RG');
INSERT INTO `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES (2, 'DP');
INSERT INTO `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES (3, 'ES');
INSERT INTO `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES (4, 'OV');
INSERT INTO `u504061722_rdd`.`tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES (5, 'TR');

COMMIT;

