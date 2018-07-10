-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 10/07/2018 às 11:27
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caodocao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal`
--

CREATE TABLE `animal` (
  `nome` varchar(20) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `cod_animal` int(11) NOT NULL,
  `foto_perfil` tinytext,
  `cod_doacao` int(11) DEFAULT NULL,
  `cod_raca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `idsessao` int(11) DEFAULT NULL,
  `cod_usuE` int(11) DEFAULT NULL,
  `texto` varchar(300) DEFAULT NULL,
  `dth` date DEFAULT NULL,
  `cod_usuR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cida` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `cod_esta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `cod_doacao` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL,
  `texto` varchar(300) DEFAULT NULL,
  `dt_coment` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `doacao`
--

CREATE TABLE `doacao` (
  `cod_doacao` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_doacao` date DEFAULT NULL,
  `cod_status` int(11) DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especie`
--

CREATE TABLE `especie` (
  `descricao` varchar(300) DEFAULT NULL,
  `cod_especie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `especie`
--

INSERT INTO `especie` (`descricao`, `cod_especie`) VALUES
('cao', 1),
('gato', 2),
('outro', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `cod_esta` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `sigla` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estado`
--

INSERT INTO `estado` (`cod_esta`, `nome`, `sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'Amapá', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'Piauí', 'PI'),
(18, 'Paraná', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rondônia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'São Paulo', 'SP'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotosanimal`
--

CREATE TABLE `fotosanimal` (
  `cod_foto` int(11) NOT NULL,
  `legenda` varchar(300) DEFAULT NULL,
  `foto` tinytext,
  `cod_animal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `raca`
--

CREATE TABLE `raca` (
  `descricao` varchar(300) DEFAULT NULL,
  `cod_raca` int(11) NOT NULL,
  `cod_especie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `raca`
--

INSERT INTO `raca` (`descricao`, `cod_raca`, `cod_especie`) VALUES
('Alaska Malamute', 1, 1),
('Basset Hound', 2, 1),
('Beagle', 3, 1),
('Bichon', 4, 1),
('Border Collie', 5, 1),
('Boston Terrier', 6, 1),
('Boxer', 7, 1),
('German Braco', 8, 1),
('Bull Mastiff', 9, 1),
(' Bull Terrier', 10, 1),
('Bulldog', 11, 1),
('Bulldog Francês / French Bulldog', 12, 1),
('Caniche / Poodle', 13, 1),
('Cão de Água / Portuguese Water Dog', 14, 1),
('Castro Laboreiro / Portuguese Castro Laboreiro', 15, 1),
('Chihuahua', 16, 1),
('Chow-Chow', 17, 1),
('Cocker Spaniel', 18, 1),
('Collie', 19, 1),
('Dálmata / Dalmatian', 20, 1),
('Doberman', 21, 1),
('Dogue Argentino / Argentinian Dogue', 22, 1),
('Dratar', 23, 1),
('Epagneul Bretton', 24, 1),
('Fila Brasileiro / Brazilian Fila', 25, 1),
('Fox Terrier', 26, 1),
('Galgo / Greyhound', 27, 1),
('Golden Retriever', 28, 1),
('Husky Siberiano / Siberian Husky', 29, 1),
('Indefinida / Undefined', 30, 1),
('Jack Russel Terrier', 31, 1),
('Labrador Retriever', 32, 1),
('Leão da Rodésia / Rhodesian ridgeback', 33, 1),
('Mastim Napolitano / Napolitan Mastin', 34, 1),
('Pastor Alemão / German Shepperd', 35, 1),
('Pastor australiano / Australian Shepperd', 36, 1),
('Pastor Belga / Belgian Shepperd', 37, 1),
('Pekinois', 38, 1),
('Perdigueiro Português / Portuguese Pointer', 39, 1),
('Pinscher', 40, 1),
('Pit Bull', 41, 1),
('Podengo Português / Portuguese Podengo', 42, 1),
('Pointer', 43, 1),
('Rafeiro do Alentejo / Portuguese Rafeiro Alentejo', 44, 1),
('Ratonero Andaluz', 45, 1),
('Rottweiller', 46, 1),
('Samoyedo', 47, 1),
('Serra da Estrela / Portuguese Serra da Estrela', 48, 1),
('Serra D Aires / Portuguese Serra D Aires', 49, 1),
('Setter Irlandês / Irish Setter', 50, 1),
('Springer Spaniel ', 51, 1),
('Staffordshire Bull Terrier', 52, 1),
('Staffordshire Terrier American', 53, 1),
('Teckel', 54, 1),
('Vizsla', 55, 1),
('Welsh Corgi', 56, 1),
('West Highland Terrier', 57, 1),
('Yorkshire Terrier', 58, 1),
('Abissínio', 64, 2),
('Angorá turco', 65, 2),
('American curl', 66, 2),
('American Shorthair', 67, 2),
('American wirehair', 68, 2),
('American wirehair', 69, 2),
('Azul rusoan', 70, 2),
('Balinês', 71, 2),
('Bengal', 72, 2),
('Bobtail Japonês', 73, 2),
('Bombay', 74, 2),
('Bosque da Noruega / Norwegian Forest', 75, 2),
('British Shorthair', 76, 2),
('Burmês', 77, 2),
('Burmês Europeu', 78, 2),
('California spangled', 79, 2),
('Chartreux', 80, 2),
('Cornish rex', 81, 2),
('Devon Rex', 82, 2),
('Europeu Comum / Common European', 83, 2),
('Exótico', 84, 2),
('Habana', 85, 2),
('Himalayan', 86, 2),
('Indefinido / Undefined', 87, 2),
('Javanês', 88, 2),
('Korat', 89, 2),
('Maine coon', 90, 2),
('Manx', 91, 2),
('Mau Egípcio', 92, 2),
('Nibelungo', 93, 2),
('Ocicat', 94, 2),
('Oriental de pêlo curto', 95, 2),
('Persa / Persian', 96, 2),
('Ragamuffin', 97, 2),
('Ragdoll', 98, 2),
('Sagrado da Birmânia', 99, 2),
('Scottish fold', 100, 2),
('Selkirk rex', 101, 2),
('Siamês / Siamese', 102, 2),
('Singapur', 103, 2),
('Shorthair Americano', 104, 2),
('Shorthair Britânico', 105, 2),
('Shorthair Exótico', 106, 2),
('Snowshoe', 107, 2),
('Somali', 108, 2),
('Sphynx', 109, 2),
('Tiffanie', 110, 2),
('Tonquinês', 111, 2),
('Van turco', 112, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessao`
--

CREATE TABLE `sessao` (
  `idsessao` int(11) NOT NULL,
  `dti` date DEFAULT NULL,
  `dtf` date DEFAULT NULL,
  `cod_usu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `statusdoacao`
--

CREATE TABLE `statusdoacao` (
  `cod_status` int(11) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tip_user`
--

CREATE TABLE `tip_user` (
  `desc_tipuser` varchar(80) DEFAULT NULL,
  `cd_tipuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `cod_usu` int(11) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `cod_cida` int(11) DEFAULT NULL,
  `cd_tipuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`cod_animal`),
  ADD KEY `cod_doacao` (`cod_doacao`),
  ADD KEY `cod_raca` (`cod_raca`);

--
-- Índices de tabela `chat`
--
ALTER TABLE `chat`
  ADD KEY `idsessao` (`idsessao`),
  ADD KEY `cod_usuE` (`cod_usuE`),
  ADD KEY `cod_usuR` (`cod_usuR`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cida`),
  ADD KEY `cod_esta` (`cod_esta`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD KEY `cod_doacao` (`cod_doacao`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Índices de tabela `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`cod_doacao`),
  ADD KEY `cod_status` (`cod_status`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Índices de tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`cod_especie`);

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`cod_esta`);

--
-- Índices de tabela `fotosanimal`
--
ALTER TABLE `fotosanimal`
  ADD PRIMARY KEY (`cod_foto`),
  ADD KEY `cod_animal` (`cod_animal`);

--
-- Índices de tabela `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`cod_raca`),
  ADD KEY `cod_especie` (`cod_especie`);

--
-- Índices de tabela `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`idsessao`),
  ADD KEY `cod_usu` (`cod_usu`);

--
-- Índices de tabela `statusdoacao`
--
ALTER TABLE `statusdoacao`
  ADD PRIMARY KEY (`cod_status`);

--
-- Índices de tabela `tip_user`
--
ALTER TABLE `tip_user`
  ADD PRIMARY KEY (`cd_tipuser`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`),
  ADD KEY `cod_cida` (`cod_cida`),
  ADD KEY `cd_tipuser` (`cd_tipuser`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `cod_animal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cod_cida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `doacao`
--
ALTER TABLE `doacao`
  MODIFY `cod_doacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `especie`
--
ALTER TABLE `especie`
  MODIFY `cod_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `cod_esta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `fotosanimal`
--
ALTER TABLE `fotosanimal`
  MODIFY `cod_foto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `raca`
--
ALTER TABLE `raca`
  MODIFY `cod_raca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT de tabela `sessao`
--
ALTER TABLE `sessao`
  MODIFY `idsessao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `statusdoacao`
--
ALTER TABLE `statusdoacao`
  MODIFY `cod_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tip_user`
--
ALTER TABLE `tip_user`
  MODIFY `cd_tipuser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`cod_doacao`) REFERENCES `doacao` (`cod_doacao`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`cod_raca`) REFERENCES `raca` (`cod_raca`);

--
-- Restrições para tabelas `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idsessao`) REFERENCES `sessao` (`idsessao`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`cod_usuE`) REFERENCES `usuario` (`cod_usu`),
  ADD CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`cod_usuR`) REFERENCES `usuario` (`cod_usu`);

--
-- Restrições para tabelas `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `cidade_ibfk_1` FOREIGN KEY (`cod_esta`) REFERENCES `estado` (`cod_esta`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`cod_doacao`) REFERENCES `doacao` (`cod_doacao`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`);

--
-- Restrições para tabelas `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`cod_status`) REFERENCES `statusdoacao` (`cod_status`),
  ADD CONSTRAINT `doacao_ibfk_2` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`);

--
-- Restrições para tabelas `fotosanimal`
--
ALTER TABLE `fotosanimal`
  ADD CONSTRAINT `fotosanimal_ibfk_1` FOREIGN KEY (`cod_animal`) REFERENCES `animal` (`cod_animal`);

--
-- Restrições para tabelas `raca`
--
ALTER TABLE `raca`
  ADD CONSTRAINT `raca_ibfk_1` FOREIGN KEY (`cod_especie`) REFERENCES `especie` (`cod_especie`);

--
-- Restrições para tabelas `sessao`
--
ALTER TABLE `sessao`
  ADD CONSTRAINT `sessao_ibfk_1` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_cida`) REFERENCES `cidade` (`cod_cida`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cd_tipuser`) REFERENCES `tip_user` (`cd_tipuser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
