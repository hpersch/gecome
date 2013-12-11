-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 11-Dez-2013 às 01:20
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `gecome`
--
CREATE DATABASE IF NOT EXISTS `gecome` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gecome`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_estado_idx` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisicas` int(11) DEFAULT NULL,
  `id_pessoa_juridicas` int(11) DEFAULT NULL,
  `id_user` bigint(20) NOT NULL COMMENT 'level 2',
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_pessoa_fisica1_idx` (`id_pessoa_fisicas`),
  KEY `fk_cliente_pessoa_juridica1_idx` (`id_pessoa_juridicas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `id_pessoa_fisicas`, `id_pessoa_juridicas`, `id_user`, `data_criacao`) VALUES
(2, 1, NULL, 6, '2013-11-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) DEFAULT NULL,
  `valor` decimal(6,2) NOT NULL,
  `data_compra` datetime NOT NULL,
  `status_compras` varchar(45) NOT NULL,
  `id_tipo_pagamentos` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_tipo_pagamento1_idx` (`id_tipo_pagamentos`),
  KEY `fk_compra_cliente1_idx` (`id_clientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `compras`
--

INSERT INTO `compras` (`id`, `codigo`, `valor`, `data_compra`, `status_compras`, `id_tipo_pagamentos`, `id_clientes`) VALUES
(1, 'das343', '234.00', '2013-11-14 00:00:00', '', 3, 2),
(22, 'das343', '234.00', '2013-11-14 00:00:00', 'Finalizada', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras_produtos`
--

CREATE TABLE IF NOT EXISTS `compras_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compras` int(11) NOT NULL,
  `id_produtos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_has_produto_produto1_idx` (`id_produtos`),
  KEY `fk_compra_has_produto_compra1_idx` (`id_compras`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `compras_produtos`
--

INSERT INTO `compras_produtos` (`id`, `id_compras`, `id_produtos`) VALUES
(22, 22, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE IF NOT EXISTS `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `id_telefones` int(11) NOT NULL,
  `id_fornecedores` int(11) NOT NULL,
  `id_tipo_contatos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contato_telefone1_idx` (`id_telefones`),
  KEY `fk_contato_fornecedor1_idx` (`id_fornecedores`),
  KEY `fk_contato_tipo_contato1_idx` (`id_tipo_contatos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`, `data_criacao`) VALUES
(1, 'nike', '2013-10-04'),
(2, 'coca cola', '2013-10-04'),
(4, 'dell', '2013-10-04'),
(5, 'acer', '2013-10-04'),
(6, 'cce', '2013-10-04'),
(7, 'inf', '2013-10-04'),
(8, 'ufsm', '2013-10-04'),
(9, 'polar', '2013-10-04'),
(10, 'acer', '2013-10-04'),
(11, 'pepsi', '2013-10-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento_has_fornecedor`
--

CREATE TABLE IF NOT EXISTS `departamento_has_fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departamentos` int(11) NOT NULL,
  `id_fornecedores` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departamento_has_fornecedor_departamento1_idx` (`id_departamentos`),
  KEY `fk_departamento_has_fornecedor_fornecedor1_idx` (`id_fornecedores`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `tipo` tinyint(2) DEFAULT NULL COMMENT '0 - apartamento\n1 - casa\n2 - comercial',
  `rua` varchar(120) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `descricao` text,
  `bairro` varchar(120) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `nome`, `cep`, `tipo`, `rua`, `numero`, `complemento`, `descricao`, `bairro`, `cidade`, `estado_id`) VALUES
(3, 'edificio santana', '97105-440', 2, 'dsa', '22', 'sd', 'dsa', 'dsa', '', 0),
(4, 'ddas', '222', 0, 'dasd', '22', 'wwq', 'dsdsa', 'ddsadsss', '', 0),
(5, 'ddsda', 'dsa', 1, 'da', '444', 'gfdgdf', 'gdfgdgf', 'gdfgfd', '', 0),
(6, 'dsad', 'das', 0, 'das', '77', 'dsa', 'dsa', 'das', '', 0),
(7, 'evandro', '23232222', 1, 'dsadasddsdasda', '3333', 'dsad', 'dasdasd', 'dasdas', '', 0),
(9, 'ultima', '232', 1, 'das', '999', 'gfd', '9gfdg', 'gfd', '', 0),
(10, 'nova', '454', 2, 'merda', '58585', 'dasd', 'dad', 'dasd', '', 0),
(11, 'das', '99090', 1, 'dada', '2', 'dsad', 'dsa', 'dsad', '', 0),
(12, 'evano', '90909', 1, '889kjkjkjl', 'jkjkj', 'jkj', 'jkj', 'kjkj', '', 0),
(13, 'Rua', '97200-000', 1, 'Rodolpho Behr', '1234', 'ap 302', 'perto de uma creche', 'camibi', 'Santa Maria', 37);

-- --------------------------------------------------------

--
-- Estrutura da tabela `especificacoes`
--

CREATE TABLE IF NOT EXISTS `especificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  `valor` varchar(120) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_has_especificacao_produto1_idx` (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `especificacoes`
--

INSERT INTO `especificacoes` (`id`, `nome`, `valor`, `id_produto`) VALUES
(40, 'verdade', '20', 2),
(41, 'OPA', '56', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uf` (`uf`),
  KEY `uf_2` (`uf`),
  KEY `uf_3` (`uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `uf`) VALUES
(17, 'Acre', 'AC'),
(18, 'Alagoas', 'AL'),
(19, 'Amapá ', 'AP'),
(20, 'Amazonas', 'AM'),
(21, 'Bahia', 'BA'),
(22, 'Ceará ', 'CE'),
(23, 'Distrito Federal', 'DF'),
(24, 'Espírito Santo', 'ES'),
(25, 'Goiás', 'GO'),
(26, 'Maranhão', 'MA'),
(27, 'Mato Grosso', 'MT'),
(28, 'Mato Grosso do Sul', 'MS'),
(29, 'Minas Gerais', 'MG'),
(30, 'Paraná', 'PR'),
(31, 'Paraíba', 'PB'),
(32, 'Pará', 'PA'),
(33, 'Pernambuco', 'PE'),
(34, 'Piauí', 'PI'),
(35, 'Rio de Janeiro', 'RJ'),
(36, 'Rio Grande do Norte', 'RN'),
(37, 'Rio Grande do Sul', 'RS'),
(38, 'Rondonia', 'RO'),
(39, 'Roraima', 'RR'),
(40, 'Santa Catarina', 'SC'),
(41, 'Sergipe', 'SE'),
(42, 'São Paulo', 'SP'),
(43, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_juridicas` int(11) NOT NULL,
  `site` varchar(120) DEFAULT NULL,
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedor_pessoa_juridica1_idx` (`id_pessoa_juridicas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisicas` int(11) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL COMMENT 'level ~99',
  `data_criacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_funcionario_pessoa_fisica1_idx` (`id_pessoa_fisicas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(120) DEFAULT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `principal` tinyint(1) DEFAULT NULL,
  `id_produtos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagem_produto1_idx` (`id_produtos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id`, `caminho`, `nome`, `principal`, `id_produtos`) VALUES
(4, 'img/files', '20131112190341_Screenshot_from_2013-11-03_21:45:27.png', 1, 2),
(5, 'img/files', '20131112225556_Screenshot_from_2013-11-08_08:29:12.png', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`) VALUES
(1, 'Nike Brasil'),
(2, 'brf'),
(3, 'Brasil'),
(4, 'brasil'),
(5, 'brasil'),
(6, 'maxprint'),
(7, 'estojo'),
(8, 'piveta'),
(9, 'Ho'),
(10, 'dell');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(6,2) NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `status_pagamentos` varchar(45) NOT NULL,
  `id_compras` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagamento_compra1_idx` (`id_compras`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoasfisicas`
--

CREATE TABLE IF NOT EXISTS `pessoasfisicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` tinyint(1) NOT NULL COMMENT '0 - masculino\n1 - feminino',
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `pessoasfisicas`
--

INSERT INTO `pessoasfisicas` (`id`, `nome`, `cpf`, `rg`, `data_nascimento`, `sexo`, `email`, `senha`) VALUES
(1, 'Evandro Bolzan', '232131', '43243242', '2013-11-06', 1, 'ebolzan@inf.ufsm.br', ''),
(2, 'Daiane', '231', '34', '2013-11-16', 1, 'ebolzan@inf.ufsm.br', '23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoasjuridicas`
--

CREATE TABLE IF NOT EXISTS `pessoasjuridicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(120) NOT NULL,
  `nome_fantasia` varchar(120) DEFAULT NULL,
  `cnpj` varchar(18) NOT NULL,
  `insc_estadual` varchar(8) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_has_enderecos`
--

CREATE TABLE IF NOT EXISTS `pessoa_has_enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisicas` int(11) DEFAULT NULL,
  `id_pessoa_juridicas` int(11) DEFAULT NULL,
  `id_enderecos` int(11) NOT NULL,
  `preferencial` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_has_endereco_pessoa_fisica1_idx` (`id_pessoa_fisicas`),
  KEY `fk_pessoa_has_endereco_endereco1_idx` (`id_enderecos`),
  KEY `fk_pessoa_has_endereco_pessoa_juridica1_idx` (`id_pessoa_juridicas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_has_telefones`
--

CREATE TABLE IF NOT EXISTS `pessoa_has_telefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pessoa_fisicas` int(11) DEFAULT NULL,
  `id_pessoa_juridicas` int(11) DEFAULT NULL,
  `id_telefones` int(11) NOT NULL,
  `preferencial` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_pessoa_has_telefone_pessoa_fisica1_idx` (`id_pessoa_fisicas`),
  KEY `fk_pessoa_has_telefone_pessoa_juridica1_idx` (`id_pessoa_juridicas`),
  KEY `fk_pessoa_has_telefone_telefone1_idx` (`id_telefones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nome` varchar(120) NOT NULL,
  `descricao` text,
  `preco` decimal(5,2) DEFAULT '0.00',
  `quantidade` int(11) DEFAULT NULL,
  `promocao` tinyint(1) DEFAULT '0',
  `data_cadastro` date NOT NULL,
  `id_marcas` int(11) NOT NULL,
  `id_sub_departamentos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_produto_marca1_idx` (`id_marcas`),
  KEY `fk_produto_sub_departamento1_idx` (`id_sub_departamentos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `codigo`, `nome`, `descricao`, `preco`, `quantidade`, `promocao`, `data_cadastro`, `id_marcas`, `id_sub_departamentos`) VALUES
(2, '12334', 'Mouse de mesa', 'grande mouse de mesa para a inserção de conteúdos', '123.00', 123, 1, '2013-10-22', 1, 1),
(3, '3dsada', 'gatao ', 'das', '12.00', 2, 0, '2013-11-16', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE IF NOT EXISTS `promocoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `desconto` int(3) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `quantidade_vendida` int(11) DEFAULT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_promocoes_produtos1_idx` (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `promocoes`
--

INSERT INTO `promocoes` (`id`, `data_inicio`, `data_fim`, `ativo`, `desconto`, `quantidade`, `quantidade_vendida`, `id_produto`) VALUES
(2, '2013-10-24', '2013-10-24', 1, NULL, NULL, NULL, 2),
(3, '2013-10-24', '2013-10-24', 1, 0, 0, 23, 2),
(4, '2013-10-26', '2013-03-26', 1, 12, 23, 12, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_departamentos`
--

CREATE TABLE IF NOT EXISTS `sub_departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `id_departamentos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_departamento_departamento1_idx` (`id_departamentos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `sub_departamentos`
--

INSERT INTO `sub_departamentos` (`id`, `nome`, `id_departamentos`) VALUES
(1, 'tenis', 1),
(2, 'pilsen', 9),
(3, 'vendas', 2),
(4, 'compras', 5),
(5, 'inf', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` tinyint(1) NOT NULL COMMENT '0 - residencial\n1 - celular\n2 - comercial',
  `numero` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopagamentos`
--

CREATE TABLE IF NOT EXISTS `tipopagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tipopagamentos`
--

INSERT INTO `tipopagamentos` (`id`, `nome`) VALUES
(3, 'boleto'),
(5, 'em dinheiro'),
(6, 'cartão visa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_contatos`
--

CREATE TABLE IF NOT EXISTS `tipo_contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_access`
--

CREATE TABLE IF NOT EXISTS `usergroups_access` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element` int(3) NOT NULL,
  `element_id` bigint(20) NOT NULL,
  `module` varchar(140) NOT NULL,
  `controller` varchar(140) NOT NULL,
  `permission` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_configuration`
--

CREATE TABLE IF NOT EXISTS `usergroups_configuration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rule` varchar(40) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  `options` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_cron`
--

CREATE TABLE IF NOT EXISTS `usergroups_cron` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `lapse` int(6) DEFAULT NULL,
  `last_occurrence` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_group`
--

CREATE TABLE IF NOT EXISTS `usergroups_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(120) CHARACTER SET latin1 NOT NULL,
  `level` int(6) DEFAULT NULL,
  `home` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groupname` (`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_lookup`
--

CREATE TABLE IF NOT EXISTS `usergroups_lookup` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `element` varchar(20) DEFAULT NULL,
  `value` int(5) DEFAULT NULL,
  `text` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups_user`
--

CREATE TABLE IF NOT EXISTS `usergroups_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) DEFAULT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `home` varchar(120) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `question` text,
  `answer` text,
  `creation_date` datetime DEFAULT NULL,
  `activation_code` varchar(30) DEFAULT NULL,
  `activation_time` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ban` datetime DEFAULT NULL,
  `ban_reason` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `group_id_idxfk` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `hash_change_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `role`, `created`, `modified`, `hash_change_password`) VALUES
(2, 'evandrobolzan', '6cf4806722799b7e0fa0c79622157939d06287fd', 'ebolzan@inf.ufsm.br', '', 'admin', '2013-10-03 17:08:59', '2013-10-03 17:08:59', ''),
(3, 'eduardo', '6cf4806722799b7e0fa0c79622157939d06287fd', 'eduardo@gmail.com', '', 'admin', '2013-11-15 08:37:53', '2013-11-15 08:37:53', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_id_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_cliente_pessoa_fisica1` FOREIGN KEY (`id_pessoa_fisicas`) REFERENCES `pessoasfisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cliente_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridicas`) REFERENCES `pessoasjuridicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compra_cliente1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_tipo_pagamento1` FOREIGN KEY (`id_tipo_pagamentos`) REFERENCES `tipopagamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `compras_produtos`
--
ALTER TABLE `compras_produtos`
  ADD CONSTRAINT `compras_produtos_ibfk_1` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_produtos_ibfk_2` FOREIGN KEY (`id_produtos`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `contatos`
--
ALTER TABLE `contatos`
  ADD CONSTRAINT `fk_contato_fornecedor1` FOREIGN KEY (`id_fornecedores`) REFERENCES `fornecedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contato_telefone1` FOREIGN KEY (`id_telefones`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contato_tipo_contato1` FOREIGN KEY (`id_tipo_contatos`) REFERENCES `tipo_contatos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `departamento_has_fornecedor`
--
ALTER TABLE `departamento_has_fornecedor`
  ADD CONSTRAINT `fk_departamento_has_fornecedor_departamento1` FOREIGN KEY (`id_departamentos`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departamento_has_fornecedor_fornecedor1` FOREIGN KEY (`id_fornecedores`) REFERENCES `fornecedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `especificacoes`
--
ALTER TABLE `especificacoes`
  ADD CONSTRAINT `fk_produto_has_especificacao_produto1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fk_fornecedor_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridicas`) REFERENCES `pessoasjuridicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionario_pessoa_fisica1` FOREIGN KEY (`id_pessoa_fisicas`) REFERENCES `pessoasfisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_imagem_produto1` FOREIGN KEY (`id_produtos`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamento_compra1` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pessoa_has_enderecos`
--
ALTER TABLE `pessoa_has_enderecos`
  ADD CONSTRAINT `fk_pessoa_has_endereco_endereco1` FOREIGN KEY (`id_enderecos`) REFERENCES `enderecos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pessoa_has_endereco_pessoa_fisica1` FOREIGN KEY (`id_pessoa_fisicas`) REFERENCES `pessoasfisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pessoa_has_endereco_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridicas`) REFERENCES `pessoasjuridicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pessoa_has_telefones`
--
ALTER TABLE `pessoa_has_telefones`
  ADD CONSTRAINT `fk_pessoa_has_telefone_pessoa_fisica1` FOREIGN KEY (`id_pessoa_fisicas`) REFERENCES `pessoasfisicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pessoa_has_telefone_pessoa_juridica1` FOREIGN KEY (`id_pessoa_juridicas`) REFERENCES `pessoasjuridicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pessoa_has_telefone_telefone1` FOREIGN KEY (`id_telefones`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produto_marca1` FOREIGN KEY (`id_marcas`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produto_sub_departamento1` FOREIGN KEY (`id_sub_departamentos`) REFERENCES `sub_departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD CONSTRAINT `fk_promocoes_produtos1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `sub_departamentos`
--
ALTER TABLE `sub_departamentos`
  ADD CONSTRAINT `fk_sub_departamento_departamento1` FOREIGN KEY (`id_departamentos`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usergroups_user`
--
ALTER TABLE `usergroups_user`
  ADD CONSTRAINT `usergroups_user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `usergroups_group` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
