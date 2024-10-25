-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2024 às 02:59
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quizdb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('sunnygkp10@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('55892169bf6a7', '55892169d2efc'),
('5589216a3646e', '5589216a48722'),
('558922117fcef', '5589221195248'),
('55892211e44d5', '55892211f1fa7'),
('558922894c453', '558922895ea0a'),
('558922899ccaa', '55892289aa7cf'),
('558923538f48d', '558923539a46c'),
('55892353f05c4', '55892354051be'),
('558973f4389ac', '558973f462e61'),
('558973f4c46f2', '558973f4d4abe'),
('558973f51600d', '558973f526fc5'),
('558973f55d269', '558973f57af07'),
('558973f5abb1a', '558973f5e764a'),
('5589751a63091', '5589751a81bf4'),
('5589751ad32b8', '5589751adbdbd'),
('5589751b304ef', '5589751b3b04d'),
('5589751b749c9', '5589751b9a98c'),
('67115df4aeed0', '67115df4af602'),
('67115df4b1d66', '67115df4b2282'),
('67115df4b4a80', '67115df4b5453'),
('67115df4b89ec', '67115df4b9610'),
('67115df4bd2c5', '67115df4be86b'),
('6713c404bab5d', '6713c404bb723'),
('6713c404bd7a3', '6713c404bdff1'),
('6713c404bff2b', '6713c404c0434'),
('671508f9c389e', '671508f9c4247'),
('671508f9c635b', '671508f9c6758'),
('671508f9c8555', '671508f9c88f0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('55846be776610', 'testing', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
('5584ddd0da0ab', 'netcamp', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
('558510a8a1234', 'sunnygkp10', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
('5585509097ae2', 'sunny', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
('5586ee27af2c9', 'vikas', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm'),
('5589858b6c43b', 'nik', 'nik1@gmail.com', 'good', 'good site', '2015-06-23', '06:12:59pm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('sunnygkp10@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 09:31:26'),
('sunnygkp10@gmail.com', '558920ff906b8', 4, 2, 2, 0, '2015-06-23 13:32:09'),
('avantika420@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2015-06-23 14:33:04'),
('avantika420@gmail.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 14:49:39'),
('mi5@hollywood.com', '5589222f16b93', 4, 2, 2, 0, '2015-06-23 15:12:56'),
('nik1@gmail.com', '558921841f1ec', 1, 2, 1, 1, '2015-06-23 16:11:50'),
('sunnygkp10@gmail.com', '5589222f16b93', 1, 2, 1, 1, '2015-06-24 03:22:38'),
('example@example.com', '6717e58caa777', 0, 1, 0, 0, '2024-10-22 17:49:00'),
('example@example.com', '6717f5ead8869', 0, 1, 0, 0, '2024-10-22 18:58:50'),
('example@example.com', '6717f7fdc5ddd', 0, 1, 0, 0, '2024-10-22 19:07:41'),
('example@example.com', '6717f9cab6303', 0, 1, 0, 0, '2024-10-22 19:15:22'),
('example@example.com', '6717ffafb6723', 0, 1, 0, 0, '2024-10-22 19:40:31'),
('example@example.com', '671803bd438f9', 0, 1, 0, 0, '2024-10-22 19:57:49'),
('example@example.com', '67180661858b9', 0, 1, 0, 0, '2024-10-22 20:09:05'),
('example@example.com', '671806845313b', 0, 1, 0, 0, '2024-10-22 20:09:40'),
('Gu12@gmail.com', '671507d63c333', 9, 3, 3, 0, '2024-10-22 22:37:52'),
('Gu12@gmail.com', '6713c1e7e8064', 12, 3, 3, 0, '2024-10-22 22:38:10'),
('Gu12@gmail.com', '67115ce8bf91c', 20, 5, 5, 0, '2024-10-22 22:38:25'),
('Gu12@gmail.com', '5589741f9ed52', -5, 5, 0, 5, '2024-10-22 22:38:44'),
('Gu12@gmail.com', '55897338a6659', 1, 5, 2, 3, '2024-10-22 22:38:58'),
('Gu12@gmail.com', '558922ec03021', 1, 2, 1, 1, '2024-10-22 22:39:09'),
('Gu12@gmail.com', '5589222f16b93', -2, 2, 0, 2, '2024-10-22 22:39:17'),
('Gu12@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2024-10-22 22:39:25'),
('Gu12@gmail.com', '558920ff906b8', 1, 2, 1, 1, '2024-10-22 22:39:37'),
('thomass@gmail.com', '671507d63c333', 9, 3, 3, 0, '2024-10-23 00:02:42'),
('thomass@gmail.com', '6713c1e7e8064', 12, 3, 3, 0, '2024-10-23 00:04:19'),
('thomass@gmail.com', '67115ce8bf91c', 20, 5, 5, 0, '2024-10-23 00:05:04'),
('thomass@gmail.com', '5589741f9ed52', 1, 5, 2, 3, '2024-10-23 00:05:31'),
('thomass@gmail.com', '55897338a6659', 1, 5, 2, 3, '2024-10-23 00:05:59'),
('thomass@gmail.com', '558922ec03021', -2, 2, 0, 2, '2024-10-23 00:06:07'),
('thomass@gmail.com', '5589222f16b93', -2, 2, 0, 2, '2024-10-23 00:06:19'),
('thomass@gmail.com', '558921841f1ec', 4, 2, 2, 0, '2024-10-23 00:06:28'),
('thomass@gmail.com', '558920ff906b8', 1, 2, 1, 1, '2024-10-23 00:06:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` text NOT NULL,
  `qid` text NOT NULL,
  `eid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notes`
--

INSERT INTO `notes` (`id`, `note`, `qid`, `eid`) VALUES
(2, 'Essas ondas juntas formam o que conhecemos sonoramente como música!', '671508f9c389e', '671507d63c333'),
(3, 'Ondas senoidais pois são ondas com frequencias próximas a da música', '671508f9c635b', '671507d63c333'),
(4, 'Em geral o ser humano é capaz de ouvir de 20 Hz a 20.000 Hz', '671508f9c8555', '671507d63c333');

-- --------------------------------------------------------

--
-- Estrutura para tabela `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('55892169bf6a7', 'usermod', '55892169d2efc'),
('55892169bf6a7', 'useradd', '55892169d2f05'),
('55892169bf6a7', 'useralter', '55892169d2f09'),
('55892169bf6a7', 'groupmod', '55892169d2f0c'),
('5589216a3646e', '751', '5589216a48713'),
('5589216a3646e', '752', '5589216a4871a'),
('5589216a3646e', '754', '5589216a4871f'),
('5589216a3646e', '755', '5589216a48722'),
('558922117fcef', 'echo', '5589221195248'),
('558922117fcef', 'print', '558922119525a'),
('558922117fcef', 'printf', '5589221195265'),
('558922117fcef', 'cout', '5589221195270'),
('55892211e44d5', 'int a', '55892211f1f97'),
('55892211e44d5', '$a', '55892211f1fa7'),
('55892211e44d5', 'long int a', '55892211f1fb4'),
('55892211e44d5', 'int a$', '55892211f1fbd'),
('558922894c453', 'cin>>a;', '558922895ea0a'),
('558922894c453', 'cin<<a;', '558922895ea26'),
('558922894c453', 'cout>>a;', '558922895ea34'),
('558922894c453', 'cout<a;', '558922895ea41'),
('558922899ccaa', 'cout', '55892289aa7cf'),
('558922899ccaa', 'cin', '55892289aa7df'),
('558922899ccaa', 'print', '55892289aa7eb'),
('558922899ccaa', 'printf', '55892289aa7f5'),
('558923538f48d', '255.0.0.0', '558923539a46c'),
('558923538f48d', '255.255.255.0', '558923539a480'),
('558923538f48d', '255.255.0.0', '558923539a48b'),
('558923538f48d', 'none of these', '558923539a495'),
('55892353f05c4', '192.168.1.100', '5589235405192'),
('55892353f05c4', '172.168.16.2', '55892354051a3'),
('55892353f05c4', '10.0.0.0.1', '55892354051b4'),
('55892353f05c4', '11.11.11.11', '55892354051be'),
('558973f4389ac', 'containing root file-system required during bootup', '558973f462e44'),
('558973f4389ac', ' Contains only scripts to be executed during bootup', '558973f462e56'),
('558973f4389ac', ' Contains root-file system and drivers required to be preloaded during bootup', '558973f462e61'),
('558973f4389ac', 'None of the above', '558973f462e6b'),
('558973f4c46f2', 'Kernel', '558973f4d4abe'),
('558973f4c46f2', 'Shell', '558973f4d4acf'),
('558973f4c46f2', 'Commands', '558973f4d4ad9'),
('558973f4c46f2', 'Script', '558973f4d4ae3'),
('558973f51600d', 'Boot Loading', '558973f526f9d'),
('558973f51600d', ' Boot Record', '558973f526fb9'),
('558973f51600d', ' Boot Strapping', '558973f526fc5'),
('558973f51600d', ' Booting', '558973f526fce'),
('558973f55d269', ' Quick boot', '558973f57aef1'),
('558973f55d269', 'Cold boot', '558973f57af07'),
('558973f55d269', ' Hot boot', '558973f57af17'),
('558973f55d269', ' Fast boot', '558973f57af27'),
('558973f5abb1a', 'bash', '558973f5e7623'),
('558973f5abb1a', ' Csh', '558973f5e7636'),
('558973f5abb1a', ' ksh', '558973f5e7640'),
('558973f5abb1a', ' sh', '558973f5e764a'),
('5589751a63091', 'q', '5589751a81bd6'),
('5589751a63091', 'wq', '5589751a81be8'),
('5589751a63091', ' both (a) and (b)', '5589751a81bf4'),
('5589751a63091', ' none of the mentioned', '5589751a81bfd'),
('5589751ad32b8', ' moves screen down one page', '5589751adbdbd'),
('5589751ad32b8', 'moves screen up one page', '5589751adbdce'),
('5589751ad32b8', 'moves screen up one line', '5589751adbdd8'),
('5589751ad32b8', ' moves screen down one line', '5589751adbde2'),
('5589751b304ef', ' yy', '5589751b3b04d'),
('5589751b304ef', 'yw', '5589751b3b05e'),
('5589751b304ef', 'yc', '5589751b3b069'),
('5589751b304ef', ' none of the mentioned', '5589751b3b073'),
('5589751b749c9', 'X', '5589751b9a98c'),
('5589751b749c9', 'x', '5589751b9a9a5'),
('5589751b749c9', 'D', '5589751b9a9b7'),
('5589751b749c9', 'd', '5589751b9a9c9'),
('5589751bd02ec', 'autoindentation is not possible in vi editor', '5589751bdadaa'),
('67115df4aeed0', '2', '67115df4af602'),
('67115df4aeed0', '5', '67115df4af606'),
('67115df4aeed0', '8', '67115df4af607'),
('67115df4aeed0', '20', '67115df4af609'),
('67115df4b1d66', 'Raquete', '67115df4b2280'),
('67115df4b1d66', 'Bola', '67115df4b2282'),
('67115df4b1d66', 'Tênis', '67115df4b2283'),
('67115df4b1d66', 'Sandalha', '67115df4b2284'),
('67115df4b4a80', 'Constroi casas', '67115df4b544f'),
('67115df4b4a80', 'Participa de olimpiadas', '67115df4b5452'),
('67115df4b4a80', 'Comida', '67115df4b5453'),
('67115df4b4a80', 'Vende produtos', '67115df4b5454'),
('67115df4b89ec', 'Para curtir', '67115df4b960a'),
('67115df4b89ec', 'Não serve para nada', '67115df4b960f'),
('67115df4b89ec', 'Para o tratamento de problemas de saúde', '67115df4b9610'),
('67115df4b89ec', 'Serve como um apoio de porta', '67115df4b9611'),
('67115df4bd2c5', 'Apenas ficar no pulso', '67115df4be866'),
('67115df4bd2c5', 'Para fins estéticos', '67115df4be869'),
('67115df4bd2c5', 'Para tirar fotos', '67115df4be86a'),
('67115df4bd2c5', 'Para ver as horas do dia', '67115df4be86b'),
('6713c404bab5d', 'Um tipo de comida.', '6713c404bb71f'),
('6713c404bab5d', 'Um mapa que mostra as estrelas e planetas no dia em que você nasceu.', '6713c404bb723'),
('6713c404bab5d', 'Um animal de estimação.', '6713c404bb724'),
('6713c404bab5d', 'Um jogo de tabuleiro.', '6713c404bb725'),
('6713c404bd7a3', 'Uma maçã.', '6713c404bdfee'),
('6713c404bd7a3', 'Um desenho que representa uma parte do céu, como um leão ou uma balança.', '6713c404bdff1'),
('6713c404bd7a3', 'Uma casa.', '6713c404bdff2'),
('6713c404bd7a3', 'Um carro.', '6713c404bdff3'),
('6713c404bff2b', 'Para saber que roupa usar.', '6713c404c0431'),
('6713c404bff2b', 'Para saber o que vai acontecer no futuro, como se fosse uma previsão.', '6713c404c0434'),
('6713c404bff2b', 'Para aprender a fazer mágica.', '6713c404c0435'),
('6713c404bff2b', 'Para saber a hora certa de dormir.', '6713c404c0436'),
('671508f9c389e', 'Ondas sonoras e melodicas que formam uma estrutura musical', '671508f9c4247'),
('671508f9c389e', 'Um brinquedo', '671508f9c424b'),
('671508f9c389e', 'Um planeta', '671508f9c424c'),
('671508f9c389e', 'Um jogo', '671508f9c424d'),
('671508f9c635b', 'longitudinais', '671508f9c6756'),
('671508f9c635b', 'ondas senoidais', '671508f9c6758'),
('671508f9c635b', 'tridimensionais', '671508f9c6759'),
('671508f9c635b', 'ondas magneticas', '671508f9c675a'),
('671508f9c8555', '20 Hz', '671508f9c88ee'),
('671508f9c8555', '40 Hz', '671508f9c88ef'),
('671508f9c8555', '20.000 Hz', '671508f9c88f0'),
('671508f9c8555', '40.000 Hz', '671508f9c88f1'),
('6717e141057d6', 'Bola', '6717e14105b68'),
('6717e141057d6', 'Raquete', '6717e14106360'),
('6717e141057d6', 'Tenis', '6717e141067cc'),
('6717e141057d6', 'Câmera fotográfica', '6717e14107055'),
('6717e14107525', 'Para controlar o hardware do computador.', '6717e14107cf9'),
('6717e14107525', 'Para realizar tarefas específicas, como editar textos ou jogar.', '6717e14108569'),
('6717e14107525', 'Para armazenar dados de forma física.', '6717e14108e41'),
('6717e14107525', 'Para conectar o computador à internet.', '6717e1410922b'),
('6717e14109adf', 'Microsoft Word', '6717e14109e67'),
('6717e14109adf', 'Google Chrome', '6717e1410a66d'),
('6717e14109adf', 'Mouse', '6717e1410aa48'),
('6717e14109adf', 'Minecraft', '6717e1410b233'),
('6717e1410b692', 'Um programa para navegar na internet.', '6717e1410bed7'),
('6717e1410b692', 'Uma página eletrônica que contém informações e recursos.', '6717e1410d133'),
('6717e1410b692', 'Um dispositivo para se conectar à internet.', '6717e1410e592'),
('6717e1410b692', 'Um tipo de arquivo de imagem.', '6717e1410eb86'),
('6717e1410f812', 'Pensar como um ser humano.', '6717e1410fcd8'),
('6717e1410f812', 'Realizar tarefas de forma automática.', '6717e14110772'),
('6717e1410f812', 'Sentir emoções.', '6717e14111242'),
('6717e1410f812', 'Criar novos robôs.', '6717e14111cc9'),
('6717e1462435b', 'Bola', '6717e146255b0'),
('6717e1462435b', 'Raquete', '6717e14625e36'),
('6717e1462435b', 'Tenis', '6717e14626382'),
('6717e1462435b', 'Câmera fotográfica', '6717e14626b89'),
('6717e14627409', 'Para controlar o hardware do computador.', '6717e14627bf0'),
('6717e14627409', 'Para realizar tarefas específicas, como editar textos ou jogar.', '6717e14627ffd'),
('6717e14627409', 'Para armazenar dados de forma física.', '6717e1462880e'),
('6717e14627409', 'Para conectar o computador à internet.', '6717e14628c08'),
('6717e1462944c', 'Microsoft Word', '6717e146296ad'),
('6717e1462944c', 'Google Chrome', '6717e14629ec2'),
('6717e1462944c', 'Mouse', '6717e1462a311'),
('6717e1462944c', 'Minecraft', '6717e1462aae0'),
('6717e1462af0c', 'Um programa para navegar na internet.', '6717e1462b680'),
('6717e1462af0c', 'Uma página eletrônica que contém informações e recursos.', '6717e1462ba16'),
('6717e1462af0c', 'Um dispositivo para se conectar à internet.', '6717e1462c227'),
('6717e1462af0c', 'Um tipo de arquivo de imagem.', '6717e1462ca2a'),
('6717e1462d387', 'Pensar como um ser humano.', '6717e1462d6df'),
('6717e1462d387', 'Realizar tarefas de forma automática.', '6717e1462def2'),
('6717e1462d387', 'Sentir emoções.', '6717e1462e2e4'),
('6717e1462d387', 'Criar novos robôs.', '6717e1462eab7'),
('6717e49a29f36', 'Bola', '6717e49a2a6f5'),
('6717e49a29f36', 'Raquete', '6717e49a2af4b'),
('6717e49a29f36', 'Tenis', '6717e49a2b3a4'),
('6717e49a29f36', 'Câmera fotográfica', '6717e49a2bc61'),
('6717e49a2c13e', 'Para controlar o hardware do computador.', '6717e49a2c903'),
('6717e49a2c13e', 'Para realizar tarefas específicas, como editar textos ou jogar.', '6717e49a2cd3a'),
('6717e49a2c13e', 'Para armazenar dados de forma física.', '6717e49a2d570'),
('6717e49a2c13e', 'Para conectar o computador à internet.', '6717e49a2d9af'),
('6717e49a2e286', 'Microsoft Word', '6717e49a2e600'),
('6717e49a2e286', 'Google Chrome', '6717e49a2ee28'),
('6717e49a2e286', 'Mouse', '6717e49a2f1f2'),
('6717e49a2e286', 'Minecraft', '6717e49a2fab1'),
('6717e49a3039b', 'Um programa para navegar na internet.', '6717e49a30bbc'),
('6717e49a3039b', 'Uma página eletrônica que contém informações e recursos.', '6717e49a30fc5'),
('6717e49a3039b', 'Um dispositivo para se conectar à internet.', '6717e49a317fd'),
('6717e49a3039b', 'Um tipo de arquivo de imagem.', '6717e49a31c57'),
('6717e49a32524', 'Pensar como um ser humano.', '6717e49a32883'),
('6717e49a32524', 'Realizar tarefas de forma automática.', '6717e49a330b5'),
('6717e49a32524', 'Sentir emoções.', '6717e49a334a8'),
('6717e49a32524', 'Criar novos robôs.', '6717e49a33d49'),
('6717e54b8cc04', 'São Paulo', '6717e54b8dcaa'),
('6717e54b8cc04', 'Rio de Janeiro', '6717e54b8ed79'),
('6717e54b8cc04', 'Salvador', '6717e54b8f1e5'),
('6717e54b8cc04', 'Brasília', '6717e54b8fa06'),
('6717e54b8fe8b', 'Amazonas', '6717e54b905a5'),
('6717e54b8fe8b', 'Danúbio', '6717e54b90d42'),
('6717e54b8fe8b', 'Yangtzé', '6717e54b914e1'),
('6717e54b8fe8b', 'Amazonas', '6717e54b91865'),
('6717e54b92097', '1939', '6717e54b923ac'),
('6717e54b92097', '1945', '6717e54b92b38'),
('6717e54b92097', '1950', '6717e54b92eb0'),
('6717e54b92097', '1939', '6717e54b9363f'),
('6717e58cab23d', 'São Paulo', '6717e58caba16'),
('6717e58cab23d', 'Rio de Janeiro', '6717e58cabe9a'),
('6717e58cab23d', 'Salvador', '6717e58cac6d2'),
('6717e58cab23d', 'Brasília', '6717e58cacacc'),
('6717e58cad373', 'Amazonas', '6717e58cad6d2'),
('6717e58cad373', 'Danúbio', '6717e58cadeb4'),
('6717e58cad373', 'Yangtzé', '6717e58cae29d'),
('6717e58cad373', 'Amazonas', '6717e58caeaa9'),
('6717e58caf460', '1939', '6717e58cb046f'),
('6717e58caf460', '1945', '6717e58cb0d0e'),
('6717e58caf460', '1950', '6717e58cb10d6'),
('6717e58caf460', '1939', '6717e58cb18f1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('558920ff906b8', '55892169bf6a7', 'what is command for changing user information??', 4, 1),
('558920ff906b8', '5589216a3646e', 'what is permission for view only for other??', 4, 2),
('558921841f1ec', '558922117fcef', 'what is command for print in php??', 4, 1),
('558921841f1ec', '55892211e44d5', 'which is a variable of php??', 4, 2),
('5589222f16b93', '558922894c453', 'what is correct statement in c++??', 4, 1),
('5589222f16b93', '558922899ccaa', 'which command is use for print the output in c++?', 4, 2),
('558922ec03021', '558923538f48d', 'what is correct mask for A class IP???', 4, 1),
('558922ec03021', '55892353f05c4', 'which is not a private IP??', 4, 2),
('55897338a6659', '558973f4389ac', 'On Linux, initrd is a file', 4, 1),
('55897338a6659', '558973f4c46f2', 'Which is loaded into memory when system is booted?', 4, 2),
('55897338a6659', '558973f51600d', ' The process of starting up a computer is known as', 4, 3),
('55897338a6659', '558973f55d269', ' Bootstrapping is also known as', 4, 4),
('55897338a6659', '558973f5abb1a', 'The shell used for Single user mode shell is:', 4, 5),
('5589741f9ed52', '5589751a63091', ' Which command is used to close the vi editor?', 4, 1),
('5589741f9ed52', '5589751ad32b8', ' In vi editor, the key combination CTRL+f', 4, 2),
('5589741f9ed52', '5589751b304ef', ' Which vi editor command copies the current line of the file?', 4, 3),
('5589741f9ed52', '5589751b749c9', ' Which command is used to delete the character before the cursor location in vi editor?', 4, 4),
('5589741f9ed52', '5589751bd02ec', ' Which one of the following statement is true?', 4, 5),
('67115ce8bf91c', '67115df4aeed0', 'Quanto é 1+1?', 4, 1),
('67115ce8bf91c', '67115df4b1d66', 'Qual objeto o esporte de futebol usa?', 4, 2),
('67115ce8bf91c', '67115df4b4a80', 'O que um cozinheiro faz?', 4, 3),
('67115ce8bf91c', '67115df4b89ec', 'Para que serve um remédio?', 4, 4),
('67115ce8bf91c', '67115df4bd2c5', 'Qual a utilidade de um relógio?', 4, 5),
('6713c1e7e8064', '6713c404bab5d', 'O que é um horóscopo?', 4, 1),
('6713c1e7e8064', '6713c404bd7a3', 'Qual é o símbolo do seu signo do zodíaco?', 4, 2),
('6713c1e7e8064', '6713c404bff2b', 'Por que as pessoas consultam o horóscopo?', 4, 3),
('671507d63c333', '671508f9c389e', 'O que significa música?', 4, 1),
('671507d63c333', '671508f9c635b', 'Qual a onda sonora de uma música?', 4, 2),
('671507d63c333', '671508f9c8555', 'Qual a frequência do som em Hz o ser humano é capaz de ouvir?', 4, 3),
('6717e140e171c', '6717e141057d6', 'Qual objeto é usado em esportes com djkfhdus', 0, 1),
('6717e140e171c', '6717e14107525', 'Para que serve um programa de computador?', 0, 2),
('6717e140e171c', '6717e14109adf', 'Qual dessas opções NÃO é um exemplo de software?', 0, 3),
('6717e140e171c', '6717e1410b692', 'O que é um site da internet?', 0, 4),
('6717e140e171c', '6717e1410f812', 'Qual a principal função de um robô?', 0, 5),
('6717e14623231', '6717e1462435b', 'Qual objeto é usado em esportes com djkfhdus', 0, 1),
('6717e14623231', '6717e14627409', 'Para que serve um programa de computador?', 0, 2),
('6717e14623231', '6717e1462944c', 'Qual dessas opções NÃO é um exemplo de software?', 0, 3),
('6717e14623231', '6717e1462af0c', 'O que é um site da internet?', 0, 4),
('6717e14623231', '6717e1462d387', 'Qual a principal função de um robô?', 0, 5),
('6717e49a28e32', '6717e49a29f36', 'Qual objeto é usado em esportes com djkfhdus', 0, 1),
('6717e49a28e32', '6717e49a2c13e', 'Para que serve um programa de computador?', 0, 2),
('6717e49a28e32', '6717e49a2e286', 'Qual dessas opções NÃO é um exemplo de software?', 0, 3),
('6717e49a28e32', '6717e49a3039b', 'O que é um site da internet?', 0, 4),
('6717e49a28e32', '6717e49a32524', 'Qual a principal função de um robô?', 0, 5),
('6717e54b8badf', '6717e54b8cc04', 'Brasília', 0, 1),
('6717e54b8badf', '6717e54b8fe8b', 'Nilo', 0, 2),
('6717e54b8badf', '6717e54b92097', '1914', 0, 3),
('6717e58caa777', '6717e58cab23d', 'Brasília', 0, 1),
('6717e58caa777', '6717e58cad373', 'Nilo', 0, 2),
('6717e58caa777', '6717e58caf460', '1914', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `tag`, `date`, `status`) VALUES
('558920ff906b8', 'Linux : File Managment', 2, 1, 2, 5, '', 'linux', '2015-06-23 09:03:59', 'active'),
('558921841f1ec', 'Php Coding', 2, 1, 2, 5, '', 'PHP', '2015-06-23 09:06:12', 'active'),
('5589222f16b93', 'C++ Coding', 2, 1, 2, 5, '', 'c++', '2015-06-23 09:09:03', 'active'),
('558922ec03021', 'Networking', 2, 1, 2, 5, '', 'networking', '2015-06-23 09:12:12', 'active'),
('55897338a6659', 'Linux:startup', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:54:48', 'active'),
('5589741f9ed52', 'Linux :vi Editor', 2, 1, 5, 10, '', 'linux', '2015-06-23 14:58:39', 'active'),
('67115ce8bf91c', 'Conhecimentos Gerais', 4, 2, 5, 20, 'Este é um questionário de testes', '#conhecimentos', '2024-10-17 18:52:24', 'active'),
('6713c1e7e8064', 'Questionário Astrológico', 4, 5, 3, 5, 'Este é um questionário sobre astrologia', '#astrologia', '2024-10-19 14:27:51', 'active'),
('671507d63c333', 'Questionário Músical', 3, 10, 3, 1, 'este é um questionário músical', '#musical', '2024-10-20 13:38:30', 'active');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('sunnygkp10@gmail.com', -48, '2024-10-19 17:24:57'),
('avantika420@gmail.com', 8, '2015-06-23 14:49:39'),
('mi5@hollywood.com', 4, '2015-06-23 15:12:56'),
('nik1@gmail.com', 1, '2015-06-23 16:11:50'),
('Gu12@gmail.com', 56, '2024-10-22 22:39:37'),
('thomass@gmail.com', 44, '2024-10-23 00:06:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Avantika', 'F', 'KNIT sultanpur', 'avantikaxyz@gmail.com', 123456789, 'e10adc3949ba59abbe56e057f20f883e'),
('Mark Zukarburg', 'M', 'Stanford', 'ceo@facebook.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Gustavo', 'M', 'cms', 'Gu12@gmail.com', 11945385448, '0d32cf3219685aa5af8dea30cc6d9fc4'),
('Tom Cruze', 'M', 'Hollywood', 'mi5@hollywood.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Netcamp', 'M', 'KNIT sultanpur', 'netcamp@gmail.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Sunny', 'M', 'KNIT sultanpur', 'sunny@gmail.com', 123456789, 'e10adc3949ba59abbe56e057f20f883e'),
('Thomass', 'M', 'University of Oxford', 'thomass@gmail.com', 1234567891212, '81428cca83291e9ae8649a218679c870'),
('Vikash', 'M', 'KNIT sultanpur@gmail.com', 'vikash@gmail.com', 123456789, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
