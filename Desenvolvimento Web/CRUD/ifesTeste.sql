SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifesTeste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_niveis_acesso` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome_niveis_acesso`, `created`, `modified`) VALUES
(1, 'Administrador', '2017-02-13 00:00:00', NULL),
(2, 'Colaborador', '2017-02-13 00:00:00', NULL),
(3, 'Cliente', '2017-02-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_users`
--

CREATE TABLE `situacoes_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sit_user` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacoes_users`
--

INSERT INTO `situacoes_users` (`id`, `nome_sit_user`, `created`, `modified`) VALUES
(1, 'Ativo', '2017-02-13 00:00:00', NULL),
(2, 'Inativo', '2017-02-13 00:00:00', NULL),
(3, 'Aguardando Confirmação', '2017-02-13 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `foto` varchar(220) DEFAULT NULL,
  `niveis_acesso_id` int(11) DEFAULT NULL,
  `situacoes_user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `foto`, `niveis_acesso_id`, `situacoes_user_id`, `created`, `modified`) VALUES
(1, 'Flávio Izo', 'flavio@flavioizo.com', '202cb962ac59075b964b07152d234b70', 'flavioizo.png', 1, 1, '2017-02-13 00:00:00', NULL);