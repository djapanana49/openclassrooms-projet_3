-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 sep. 2018 à 09:25
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `u121473db1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) CHARACTER SET latin1 NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `posts_id` int(11) NOT NULL,
  `comment_date` datetime(6) NOT NULL,
  `signaled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id` (`comment_id`),
  KEY `posts_id` (`posts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `author`, `comment`, `posts_id`, `comment_date`, `signaled`) VALUES
(3, 'Alexiane', 'Cet article est très intéressant et divertissant 	', 2, '2018-08-04 19:01:26.000000', 0),
(4, 'Roxanne', 'J\'ai besoin de plus d\'informations', 1, '2018-08-05 20:17:35.000000', 0),
(5, 'Sylvie', 'La vie est un long fleuve tranquille', 1, '2018-08-10 17:26:31.000000', 0),
(6, 'Wonder Woman', 'Elle ne craint rien ni personne', 1, '2018-08-11 07:14:10.000000', 0),
(7, 'Albator', 'Albator, Albator, capitaine au coeur d\'or', 1, '2018-08-11 07:39:08.000000', 0),
(9, 'Candy', 'Au pays de Candy comme dans tous les pays, on s\'amuse on pleure on rit....', 4, '2018-08-13 20:42:00.000000', 0),
(11, 'Richard', 'C\'est une bonne idée. Je ne savais pas quoi faire aujourd\'hui', 6, '2018-08-15 08:48:25.000000', 1),
(12, 'Alexiane', ' Nunc imperdiet at enim vitae elementum. Aliquam erat volutpat. Vivamus sit amet purus efficitur, viverra orci vitae, mattis velit. Sed posuere, tortor in tincidunt suscipit, metus neque facilisis erat, in gravida elit enim id elit. Nullam eget eros non nisl aliquam semper eget eu quam. Praesent sed condimentum ligula. Fusce laoreet accumsan orci vitae interdum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sollicitudin erat quis arcu lobortis efficitur. Donec imperdiet urna ut eros mattis, id rutrum quam malesuada. Proin non mi et diam varius fringilla.\r\n\r\nSed varius bibendum varius. Pellentesque enim erat, porttitor fringilla massa vitae, venenatis blandit nibh. Aenean sed tristique purus. Suspendisse mollis mauris eget dolor molestie faucibus. In hac habitasse platea dictumst. In sit amet felis gravida, feugiat purus id, rhoncus quam. Pellentesque eget metus sed tortor maximus rhoncus eu eu leo. Nunc egestas dapibus nisi non accumsan. Duis tempor ex eget metus auctor congue eget nec dui. Aliquam eu sapien ut orci consequat ultrices. Phasellus accumsan, lacus eget tempus tincidunt, ex neque rutrum lorem, sit amet dapibus libero odio placerat ex. Donec ac iaculis nisl. Morbi pulvinar, nunc ut vehicula molestie, sem sapien lacinia elit, eu viverra erat nunc nec augue. ', 5, '2018-08-24 11:58:22.000000', 0),
(13, 'Ross', 'I\'ll be there for you, I\'ll be there for you....Then you\'re there for me too', 8, '2018-08-24 13:08:37.000000', 0),
(14, 'Camille', 'Je suis mentor Openclassrooms', 3, '2018-08-25 14:36:59.000000', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `post_author` varchar(45) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `creation_date` datetime(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post_author`, `content`, `creation_date`) VALUES
(2, 'D\'où vient-il?', 'Ecrivain', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.', '2018-08-02 11:11:00.000000'),
(3, 'Pourquoi l\'utiliser? ou pourquoi pas', 'Ecrivain', '<p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&ecirc;che de se concentrer sur la mise en page elle-m&ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</p>', '2018-08-04 16:27:00.000000'),
(4, 'Où puis-je m\'en procurer?', 'Ecrivain', 'Plusieurs variations de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d\'entre elles a été altérée par l\'addition d\'humour ou de mots aléatoires qui ne ressemblent pas une seconde à du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez être sûr qu\'il n\'y a rien d\'embarrassant caché dans le texte. Tous les générateurs de Lorem Ipsum sur Internet tendent à reproduire le même extrait sans fin, ce qui fait de lipsum.com le seul vrai générateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour générer un Lorem Ipsum irréprochable. Le Lorem Ipsum ainsi obtenu ne contient aucune répétition, ni ne contient des mots farfelus, ou des touches d\'humour.', '2018-08-04 19:09:00.000000'),
(5, 'Chanson de Candy', 'Candy', '<p>Au pays de Candy. Comme dans tous les pays. On s\'amuse on pleure on rit, il y a des m&eacute;chants et des gentils. Et pour sortir des moments difficiles, avoir des amis c\'est tr&egrave;s utile. Un peu d\'astuces, d\'espi&egrave;gleries, c\'est la vie de Candy</p>', '2018-08-14 09:43:25.000000'),
(6, 'On fait quoi aujourd\'hui', 'Le Parisien', '<p>Quelques id&eacute;es pour nous occuper le 15/08. Profitez de la saison pour apprendre &agrave; nager. Passer un bel &eacute;t&eacute; en apprenant &agrave; nager. Voil&agrave;, voil&agrave;</p>', '2018-08-15 08:46:25.000000'),
(7, 'Chicorée nature du petit déjeuner', 'Leroux', '<p>Le soleil vient de se lever, encore une belle journ&eacute;e et il va bient&ocirc;t arriver, l\'ami ricor&eacute;. Il vient toujours au bon moment avec ses pains et ses croissants, l\'ami du petit d&eacute;jeuner, l\'ami ricor&eacute;....</p>', '2018-08-15 15:42:05.000000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `conn_id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(45) CHARACTER SET latin1 NOT NULL,
  `mdp` varchar(25) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`conn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`conn_id`, `identifiant`, `mdp`) VALUES
(1, 'sylvianna46', 'alexiane');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
