-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2018 às 18:45
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depae`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `num_matricula` varchar(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `rg` varchar(8) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`) VALUES
(1, 'Admin'),
(2, 'Chefe DEPAE'),
(3, 'Técnico administrativo DEPAE'),
(4, 'Coodenador de Curso Técnico em Informática'),
(5, 'Coodenador de Curso Técnico em Eletrotécnica'),
(6, 'Coodenador de Curso Técnico em Edificação'),
(7, 'Coodenador de Curso Técnico em Quimica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `idcoordenador` int(11) NOT NULL,
  `Servidor_idServidor` int(11) NOT NULL,
  `curso_idCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nome_curso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nome_curso`) VALUES
(1, 'Técnico em Informática'),
(2, 'Técnico em Química'),
(3, 'Técnico em Edificações'),
(4, 'Técnico em Eletrotécnica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `materia` varchar(45) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `aulas_nao_precenciais` int(11) NOT NULL,
  `aulas_presenciais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_aluno`
--

CREATE TABLE `disciplina_aluno` (
  `disciplina_idDisciplina` int(11) NOT NULL,
  `aluno_idAluno` int(11) NOT NULL,
  `tipo_vinculo_idTipo_vinculo` int(11) NOT NULL,
  `faltas_justificadas` int(11) NOT NULL,
  `numero_faltas` int(11) NOT NULL,
  `percentual_faltas` int(11) NOT NULL,
  `frequencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_turma`
--

CREATE TABLE `disciplina_turma` (
  `disciplina_idDisciplina` int(11) NOT NULL,
  `turma_idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faltas`
--

CREATE TABLE `faltas` (
  `idFaltas` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `aluno_idAluno` int(11) NOT NULL,
  `motivo_idMotivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivo`
--

CREATE TABLE `motivo` (
  `idMotivo` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `servidor_idServidor` int(11) NOT NULL,
  `nivel_falta_idNivel_falta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motivo`
--

INSERT INTO `motivo` (`idMotivo`, `nome`, `servidor_idServidor`, `nivel_falta_idNivel_falta`) VALUES
(1, 'I. Deixar de cumprir os horários estabelecidos pelo campus, sem justificativa', 1, 1),
(2, 'II. Entrar nas dependências restritas sem autorização ou provocar ruídos nas suas proximidades', 1, 1),
(3, 'III. Descumprir as normas do campus, que orientam o uso de vestuários e uniformes', 1, 1),
(4, 'IV. Descumprir as normas do campus que orientam o uso de instalações, equipamentos e serviços', 1, 1),
(5, 'V. Utilizar o telefone celular, outros equipamentos eletrônicos ou instrumentos musicais que interfiram no processo de ensino e aprendizagem', 1, 1),
(6, 'VI. Retirar-se do ambiente de aula sem autorização', 1, 1),
(7, 'VII. Deixar de comparecer à sala de aula ou laboratório em horário de atividade, estando presente no campus', 1, 1),
(8, 'VIII. Deixar de entregar comunicação aos pais e/ou responsáveis referentes a assuntos escolares', 1, 1),
(9, 'I. Desrespeitar, provocar, desacatar com palavras, atos ou gestos, qualquer pessoa da comunidade acadêmica', 1, 2),
(10, 'II. Instigar faltas coletivas', 1, 2),
(11, 'III. Organizar eventos e qualquer forma de arrecadação, de propaganda, distribuição de impressos, publicação ou divulgação em imprensa falada, escrita ou televisionada em nome da instituição, sem o consentimento da Direção-Geral', 1, 2),
(12, 'IV. Interromper ou conturbar qualquer atividade acadêmica e/ou técnica administrativas nas dependências do campus, ou fora deste, quando em visitas técnicas ou atividades complementares, representando-o', 1, 2),
(13, 'V. Distorcer e fornecer informações inverídicas quando solicitadas', 1, 2),
(14, 'VI. Omitir-se, sem justificativa, de atividades escolares no campus ou fora dele, quando estiver representando-o', 1, 2),
(15, 'VII. Fazer uso indevido de recursos tecnológicos do Instituto que venham infringir o presente Regulamento', 1, 2),
(16, 'VIII. Facilitar o acesso de pessoas estranhas às dependências do campus sem a devida identificação e autorização', 1, 2),
(17, 'IX. Entrar ou sair do campus utilizando acessos que não sejam os permitidos pelo mesmo', 1, 2),
(18, 'X. Exceder-se em manifestações enamoradas impróprias ao ambiente escolar', 1, 2),
(19, 'XI. Praticar a retirada de equipamentos, produtos e outros, de qualquer setor, sem a prévia autorização do responsável', 1, 2),
(20, 'I. Ausentar-se do campus ou de qualquer atividade em que esteja representando a Instituição sem autorização dos responsáveis legais e sem a devida identificação', 1, 3),
(21, 'II. Usar, portar, comercializar ou incentivar o uso de bebidas alcoólicas e substâncias entorpecentes dentro do campus ou em representação', 1, 3),
(22, 'III. Compartilhar e/ou utilizar qualquer tipo de material pornográfico nas dependências do IFRO', 1, 3),
(23, 'IV. Tentar ou cometer furto, roubo e receptação', 1, 3),
(24, 'V. Tentar ou agredir física ou moralmente qualquer membro da comunidade acadêmica no campus, durante o translado nos meios de transportes institucionais ou em representação', 1, 3),
(25, 'VI. Praticar atos sexuais, libidinosos e de atentado ao pudor nas dependências do campus ou em representação', 1, 3),
(26, 'VII. Causar danos em bens pertencentes ao campus ou propriedade alheia, ficando sujeito a indenização', 1, 3),
(27, 'VIII. Expor a perigo a vida ou a saúde de outrem', 1, 3),
(28, 'IX. Usar tabaco e similares nas dependências do IFRO ou em atividades externas de representação do mesmo, conforme definido em Lei', 1, 3),
(29, 'X. Organizar e participar de Jogos com finalidade de aposta', 1, 3),
(30, 'XI. Praticar ou incentivar qualquer modalidade de trote, bullying, cyberbullying ou qualquer outra forma de violência, que venha causar, direta ou indiretamente, danos físicos, psicológicos ou morais a qualquer membro da comunidade acadêmica', 1, 3),
(31, 'XII. Plagiar, total ou parcialmente, obras literárias, artísticas, científicas, técnicas ou culturais', 1, 3),
(32, 'XIII. Constranger alguém a fazer, tolerar que se faça ou deixar de fazer alguma coisa, mediante violência ou grave ameaça, e com o intuito de obter para si ou para outrem vantagem indevida', 1, 3),
(33, 'XIV. Portar ou manter sob sua guarda qualquer tipo de arma ou objeto cortante e perfurante nas dependências do IFRO ou em representação', 1, 3),
(34, 'XV. Adulterar documentos', 1, 3),
(35, 'XVI. Praticar, induzir ou incitar, por qualquer meio, a discriminação ou preconceito de gênero, raça, cor, etnia, religião, orientação sexual ou procedência', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_falta`
--

CREATE TABLE `nivel_falta` (
  `idNivel_falta` int(11) NOT NULL,
  `nivel_falta` varchar(45) NOT NULL,
  `dias_penalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_falta`
--

INSERT INTO `nivel_falta` (`idNivel_falta`, `nivel_falta`, `dias_penalidade`) VALUES
(1, 'Leve', 30),
(2, 'Média', 90),
(3, 'Grave', 180);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `idServidor` int(11) NOT NULL,
  `siape` varchar(45) NOT NULL,
  `login_email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cargo_idCargo` int(11) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `servidor`
--

INSERT INTO `servidor` (`idServidor`, `siape`, `login_email`, `nome`, `senha`, `cargo_idCargo`, `status`) VALUES
(1, '123', 'admin@localhost', 'Admin', 'MTIzNDU=', 1, 'A'),
(2, '12345', 'vinicius@localhost', 'vinicius', '123', 2, 'A'),
(3, '1235', 'helo@helo', 'heloisy', '123', 4, 'A'),
(4, '45', 'luis@gay', 'luis', '123', 1, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_vinculo`
--

CREATE TABLE `tipo_vinculo` (
  `idTipo_vinculo` int(11) NOT NULL,
  `tipo_vinculo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_vinculo`
--

INSERT INTO `tipo_vinculo` (`idTipo_vinculo`, `tipo_vinculo`) VALUES
(1, 'Regular'),
(2, 'Dependência'),
(3, 'Especial'),
(4, 'Ouvinte'),
(5, 'Transferido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `periodo_letivo` year(4) NOT NULL,
  `Curso_idCurso` int(11) NOT NULL,
  `turno_idturno` int(11) NOT NULL,
  `turma` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`idTurma`, `serie`, `periodo_letivo`, `Curso_idCurso`, `turno_idturno`, `turma`) VALUES
(1, 1, 2018, 1, 1, 'A'),
(2, 1, 2018, 1, 1, 'B'),
(3, 1, 2018, 1, 2, 'A'),
(4, 2, 2018, 1, 2, 'B'),
(5, 1, 2018, 2, 1, 'A'),
(6, 1, 2018, 2, 1, 'B'),
(7, 1, 2018, 2, 2, 'A'),
(8, 1, 2018, 2, 2, 'B'),
(9, 1, 2018, 3, 1, 'A'),
(10, 1, 2018, 3, 1, 'B'),
(11, 1, 2018, 3, 2, 'A'),
(12, 1, 2018, 3, 2, 'B'),
(13, 1, 2018, 4, 1, 'A'),
(14, 1, 2018, 4, 1, 'B'),
(15, 1, 2018, 4, 2, 'A'),
(16, 1, 2018, 4, 2, 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `idTurno` int(11) NOT NULL,
  `turno` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`idTurno`, `turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`idcoordenador`),
  ADD KEY `fk_coordenador_Servidor1_idx` (`Servidor_idServidor`),
  ADD KEY `fk_coordenador_curso1_idx` (`curso_idCurso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Indexes for table `disciplina_aluno`
--
ALTER TABLE `disciplina_aluno`
  ADD KEY `fk_disciplina_has_aluno_aluno1_idx` (`aluno_idAluno`),
  ADD KEY `fk_disciplina_has_aluno_disciplina1_idx` (`disciplina_idDisciplina`),
  ADD KEY `fk_disciplina_aluno_tipo_Vinculo1_idx` (`tipo_vinculo_idTipo_vinculo`);

--
-- Indexes for table `disciplina_turma`
--
ALTER TABLE `disciplina_turma`
  ADD KEY `fk_disciplina_has_turma_turma1_idx` (`turma_idTurma`),
  ADD KEY `fk_disciplina_has_turma_disciplina1_idx` (`disciplina_idDisciplina`);

--
-- Indexes for table `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`idFaltas`),
  ADD KEY `fk_faltas_aluno1_idx` (`aluno_idAluno`),
  ADD KEY `fk_faltas_cadastro_Faltas1_idx` (`motivo_idMotivo`);

--
-- Indexes for table `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`idMotivo`),
  ADD KEY `fk_cadastro_Faltas_servidor1_idx` (`servidor_idServidor`),
  ADD KEY `fk_cadastro_Faltas_nivel_falta1_idx` (`nivel_falta_idNivel_falta`);

--
-- Indexes for table `nivel_falta`
--
ALTER TABLE `nivel_falta`
  ADD PRIMARY KEY (`idNivel_falta`);

--
-- Indexes for table `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`idServidor`),
  ADD UNIQUE KEY `login_email_UNIQUE` (`login_email`),
  ADD KEY `fk_servidor_cargo1_idx` (`cargo_idCargo`);

--
-- Indexes for table `tipo_vinculo`
--
ALTER TABLE `tipo_vinculo`
  ADD PRIMARY KEY (`idTipo_vinculo`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idTurma`),
  ADD KEY `fk_Turma_Curso_idx` (`Curso_idCurso`),
  ADD KEY `fk_turma_turno1_idx` (`turno_idturno`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idTurno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordenador`
--
ALTER TABLE `coordenador`
  MODIFY `idcoordenador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faltas`
--
ALTER TABLE `faltas`
  MODIFY `idFaltas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idMotivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nivel_falta`
--
ALTER TABLE `nivel_falta`
  MODIFY `idNivel_falta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servidor`
--
ALTER TABLE `servidor`
  MODIFY `idServidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_vinculo`
--
ALTER TABLE `tipo_vinculo`
  MODIFY `idTipo_vinculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `idTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `coordenador`
--
ALTER TABLE `coordenador`
  ADD CONSTRAINT `fk_coordenador_Servidor1` FOREIGN KEY (`Servidor_idServidor`) REFERENCES `servidor` (`idServidor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coordenador_curso1` FOREIGN KEY (`curso_idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplina_aluno`
--
ALTER TABLE `disciplina_aluno`
  ADD CONSTRAINT `fk_disciplina_aluno_tipo_Vinculo1` FOREIGN KEY (`tipo_vinculo_idTipo_vinculo`) REFERENCES `tipo_vinculo` (`idTipo_vinculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplina_has_aluno_aluno1` FOREIGN KEY (`aluno_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplina_has_aluno_disciplina1` FOREIGN KEY (`disciplina_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplina_turma`
--
ALTER TABLE `disciplina_turma`
  ADD CONSTRAINT `fk_disciplina_has_turma_disciplina1` FOREIGN KEY (`disciplina_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_disciplina_has_turma_turma1` FOREIGN KEY (`turma_idTurma`) REFERENCES `turma` (`idTurma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `fk_faltas_aluno1` FOREIGN KEY (`aluno_idAluno`) REFERENCES `aluno` (`idAluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_faltas_cadastro_Faltas1` FOREIGN KEY (`motivo_idMotivo`) REFERENCES `motivo` (`idMotivo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `motivo`
--
ALTER TABLE `motivo`
  ADD CONSTRAINT `fk_cadastro_Faltas_nivel_falta1` FOREIGN KEY (`nivel_falta_idNivel_falta`) REFERENCES `nivel_falta` (`idNivel_falta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cadastro_Faltas_servidor1` FOREIGN KEY (`servidor_idServidor`) REFERENCES `servidor` (`idServidor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `servidor`
--
ALTER TABLE `servidor`
  ADD CONSTRAINT `fk_servidor_cargo1` FOREIGN KEY (`cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `fk_Turma_Curso` FOREIGN KEY (`Curso_idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_turno1` FOREIGN KEY (`turno_idturno`) REFERENCES `turno` (`idTurno`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
