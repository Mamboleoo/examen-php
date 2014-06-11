-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  mysql51-31.perso
-- Généré le :  Mer 11 Juin 2014 à 16:22
-- Version du serveur :  5.1.73-1.1+squeeze+build0+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mamboleobdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `jokes`
--

CREATE TABLE IF NOT EXISTS `jokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` varchar(255) NOT NULL,
  `user` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `jokes`
--

INSERT INTO `jokes` (`id`, `txt`, `user`) VALUES
(4, 'TO UNDERSTAND WHAT RECURSION IS, YOU MUST FIRST UNDERSTAND RECURSION.', 'Mamboleoo'),
(5, 'It''s finished, just need to test.', 'Mamboleoo'),
(6, 'How many developers does it take to change a lightbulb? None, that''s a hardware problem.', 'Mamboleoo'),
(7, 'How do you comfort a JavaScript bug?<br />You console it', 'Mamboleoo'),
(8, 'When a JavaScript date has gone bad, "Don''t call me, I''ll callback you. I promise!"', 'Mamboleoo'),
(9, 'Two JavaScript developers walked into the variable bar. Ouch!', 'Mamboleoo'),
(10, 'Why did the CoffeeScript developer keep getting lost? Because he couldn''t find his source without a map', 'Mamboleoo'),
(11, 'How did the doctor revive the developer? The dev wasn''t responsive so the doc picked him up by his bootstraps', 'Mamboleoo'),
(12, 'Why did the C# developer fall asleep? Because he didn''t like Java.', 'Mamboleoo'),
(13, 'Why did the JavaScript boxer goto the chiropractor? Because his backbone was angular from a knockout and required attention', 'Mamboleoo'),
(14, 'How did the web developer hurt Comic Sans feelings?  Once he saw the font he quickly changed it to Open Sans and exclaimed "In your @font-face!"', 'Mamboleoo'),
(15, 'Why did the jQuery developer never have financial problems? Because he was in $.noConflict() mode', 'Mamboleoo'),
(16, '.democrat { float: right !important; }', 'Mamboleoo'),
(17, '.kids-these-days { -webkit-perspective: none; }', 'Mamboleoo'),
(18, '.iceberg { overflow: hidden; }', 'Mamboleoo'),
(19, 'Salut bébé ', 'Mamboleoo'),
(20, 'Salut bébé ', 'Mamboleoo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
