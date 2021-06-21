-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 12:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `dateSortie` date NOT NULL,
  `acteurs` varchar(255) NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `duree` time NOT NULL,
  `sypnosis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `nom`, `dateSortie`, `acteurs`, `affiche`, `duree`, `sypnosis`) VALUES
(1, '1917', '2020-01-15', 'George MacKay, Dean-Charles Chapman, Mark Strong', 'https://fr.web.img5.acsta.net/pictures/20/01/10/14/49/5340816.jpg', '01:59:00', 'Pris dans la tourmente de la Première Guerre Mondiale, Schofield et Blake, deux jeunes soldats britanniques, se voient assigner une mission à proprement parler impossible. Porteurs d’un message qui pourrait empêcher une attaque dévastatrice et la mort de centaines de soldats, dont le frère de Blake, ils se lancent dans une véritable course contre la montre, derrière les lignes ennemies.'),
(2, 'Hérédité', '2018-06-13', 'Toni Collette, Gabriel Byrne, Alex Wolff', 'https://fr.web.img4.acsta.net/pictures/18/06/13/12/30/1565468.jpg', '02:06:00', 'Lorsque Ellen, matriarche de la famille Graham, décède, sa famille découvre des secrets de plus en plus terrifiants sur sa lignée. Une hérédité sinistre à laquelle il semble impossible d’échapper.'),
(3, 'Jumanji: next level', '2019-12-04', 'Dwayne Johnson, Jack Black, Kevin Hart', 'https://fr.web.img4.acsta.net/pictures/19/11/07/12/52/2054035.jpg', '02:04:00', 'L\'équipe est de retour mais le jeu a changé. Alors qu\'ils retournent dans Jumanji pour secourir l\'un des leurs, ils découvrent un monde totalement inattendu. Des déserts arides aux montagnes enneigées, les joueurs vont devoir braver des espaces inconnus et inexplorés, afin de sortir du jeu le plus dangereux du monde.'),
(4, 'Le ganster, le flic & l\'assassin', '2019-08-14', 'Dong-seok Ma, Kim Moo-yul, Kim Sung-kyu', 'https://fr.web.img3.acsta.net/pictures/19/06/19/15/01/3455438.jpg', '01:50:00', 'Un puissant chef de gang dont la férocité est redoutée dans le milieu manque de se faire assassiner par un homme qui prend la fuite sans être identifié. S’il a survécu à l’attaque, le gangster sait que sa réputation est irrémédiablement endommagée : il doit retrouver l’assassin et le faire payer...'),
(5, 'Mon grand-père et moi', '2020-10-07', 'Robert De Niro, Oakes Fegley, Uma Thurman', 'https://fr.web.img4.acsta.net/pictures/20/09/10/13/26/4562652.jpg', '01:38:00', 'Peter, 10 ans, doit, à la demande de ses parents, libérer sa chambre pour son grand-père et s\'installer, à contrecœur, au grenier. Avec l\'aide de ses amis, il va tout faire pour récupérer sa chambre et n\'hésitera pas à employer les grands moyens.'),
(6, 'Madre', '2020-07-22', 'Marta Nieto, Jules Porier, Alex Brendemühl', 'https://fr.web.img5.acsta.net/pictures/20/07/23/15/36/3376214.jpg', '02:09:00', 'Dix ans se sont écoulés depuis que le fils d’Elena, alors âgé de 6 ans, a disparu. Dix ans depuis ce coup de téléphone où seul et perdu sur une plage des Landes, il lui disait qu’il ne trouvait plus son père. Dévastée depuis ce tragique épisode, sa vie suit son cours tant bien que mal...'),
(7, 'Drunk', '2020-10-14', 'Mads Mikkelsen, Thomas Bo Larsen, Magnus Millang', 'https://fr.web.img4.acsta.net/pictures/20/11/27/15/28/4526404.jpg', '01:57:00', 'Peter, 10 ans, doit, à la demande de ses parents, libérer sa chambre pour son grand-père et s\'installer, à contrecœur, au grenier. Avec l\'aide de ses amis, il va tout faire pour récupérer sa chambre et n\'hésitera pas à employer les grands moyens.'),
(8, 'Bad Boys For Life', '2020-01-22', 'Will Smith, Martin Lawrence, Vanessa Hudgens', 'https://fr.web.img6.acsta.net/pictures/19/11/22/09/44/3027567.jpg', '02:04:00', 'Les Bad Boys Mike Lowrey et Marcus Burnett se retrouvent pour résoudre une ultime affaire.'),
(9, 'Criminal Squad', '2018-02-21', 'Gerard Butler, Pablo Schreiber, 50 Cent', 'https://fr.web.img3.acsta.net/pictures/17/10/25/09/36/3911056.jpg', '02:20:00', 'Un groupe de braqueurs de banques célèbre décide de s\'attaquer à la Réserve Fédérale de Los Angeles sous le nez des autorités locales.'),
(10, 'Ip Man 4 : Le dernier combat', '2020-07-22', 'Donnie Yen, Scott Adkins, Danny Kwok-Kwan Chan', 'https://fr.web.img5.acsta.net/pictures/20/06/25/13/26/4560562.jpg', '01:45:00', 'Dans le dernier opus de la saga mythique, Ip Man se rend aux Etats-Unis à la demande de Bruce Lee afin d\'apaiser les tensions entre les maîtres locaux du Kung-fu et son protégé. Il se retrouve très vite impliqué dans un différend raciste entre les forces armées locales et une école d\'arts martiaux chinoise établie dans le quartier de Chinatown à San Francisco.');

-- --------------------------------------------------------

--
-- Table structure for table `likefilm`
--

CREATE TABLE `likefilm` (
  `id` int(11) NOT NULL,
  `likes` enum('1','2','3','4','5') NOT NULL,
  `fk_films` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likefilm`
--

INSERT INTO `likefilm` (`id`, `likes`, `fk_films`, `fk_user`) VALUES
(39, '4', 1, 42),
(40, '4', 2, 42),
(41, '2', 4, 42),
(42, '2', 1, 0),
(43, '3', 5, 44),
(44, '5', 8, 44),
(45, '5', 7, 42);

-- --------------------------------------------------------

--
-- Table structure for table `likereview`
--

CREATE TABLE `likereview` (
  `id` int(11) NOT NULL,
  `likeReview` enum('1','2','3','4','5') NOT NULL,
  `fk_reviews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likereview`
--

INSERT INTO `likereview` (`id`, `likeReview`, `fk_reviews`) VALUES
(1, '2', 8),
(2, '5', 3),
(3, '5', 3),
(4, '2', 3),
(5, '3', 6),
(6, '3', 5),
(7, '2', 19),
(8, '2', 1),
(9, '4', 14),
(10, '3', 4),
(11, '1', 4),
(12, '5', 4),
(13, '2', 4),
(14, '4', 4),
(15, '1', 4),
(16, '3', 3),
(17, '4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` longtext NOT NULL,
  `fk_utilisateur` int(11) NOT NULL,
  `fk_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `review`, `fk_utilisateur`, `fk_film`) VALUES
(1, 'Trop cool !', 1, 1),
(3, 'J\'en veux encore !', 3, 2),
(4, 'J\'ai adoré !!', 4, 2),
(5, 'J\'ai adoré !!', 5, 3),
(6, 'Ennuyant à mourir !!', 6, 3),
(7, 'A mourir de rire', 7, 4),
(8, 'Ennuyant à mourir !!', 8, 3),
(9, 'Je le recommande', 9, 5),
(10, 'Rien à dire un chef d\'oeuvre !', 10, 5),
(11, 'Je le recommande', 1, 6),
(13, 'J\'ai tellement pleurer', 3, 7),
(14, 'Je me suis endormi devant', 4, 7),
(15, 'Je le recommande', 5, 8),
(16, 'Rien à dire un chef d\'oeuvre !', 6, 8),
(17, 'Ca en vaut pour son argent', 7, 9),
(18, 'Rien à dire un chef d\'oeuvre !', 8, 9),
(19, 'Je le recommande', 9, 10),
(20, 'Rien à dire un chef d\'oeuvre !', 10, 10),
(53, '                    Rien à dire un chef d\'oeuvre !\r\n                    ', 44, 6),
(54, '                    Rien à dire un chef d\'oeuvre !\r\n                    ', 44, 6),
(68, 'azeazeazeaze', 42, 1),
(69, 'azeazeazeaze', 42, 1),
(70, 'azeazeazeaze', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(2, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `pseudo` text NOT NULL,
  `password` varchar(45) NOT NULL,
  `fk_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `pseudo`, `password`, `fk_role`) VALUES
(1, 'biatch@gmail.com', '', '76543466', 1),
(2, 'jdhsfjhdsf@gmslek.com', '', '54000006+454', 1),
(3, 'dupont@gmail.com', '', 'ezarezr+2454', 1),
(4, 'pierre@gmail.com', '', '69565265srgrg+', 1),
(5, 'agathe@gmail.com', '', '6956trgrtg6565', 1),
(6, 'cyriak@gmail.com', '', 'leformateurdu59', 1),
(7, 'lebotkevin@gmail.com', '', 'lebotkevin1328', 1),
(8, 'chelou@gmail.com', '', 'cheloudu1994', 1),
(9, 'ehoh@gmail.com', '', 'egr6565265', 1),
(10, 'miam@gmail.com', '', 'edfzf645655', 1),
(11, 'az@gmail.com', '', '123456789', 1),
(12, 'aze@gmail.com', '', 'azerazer', 1),
(13, 'aze@gmail.com', '', 'azerazer', 1),
(14, 'azeaze@gmail.com', '', 'zerzer', 1),
(15, 'azeaze@gmail.com', '', 'zerzer', 1),
(16, 'aza@gmail.com', '', '123456789', 1),
(17, 'aza@gmail.com', '', '123456789', 1),
(18, 'azeaze@gmail.com', '', '123456789', 1),
(19, 'azeaze@gmail.com', '', '123456789', 1),
(20, 'polo@gmail.com', '', '123456789', 2),
(21, 'azaz@gmail.com', 'seerak', '123456789', 1),
(22, 'azaz@gmail.com', 'azerty', '123456789', 1),
(23, 'po@gmail.com', 'poiuyt', '123456789', 1),
(24, 'po@gmail.com', 'poiuyt', '123456789', 1),
(25, 'po@gmail.com', 'poiuyt', '123456789', 1),
(26, 'po@gmail.com', 'poiuyt', '123456789', 1),
(27, 'po@gmail.com', 'poiuyt', '123456789', 1),
(28, 'azazazaz@gmail.com', 'AZERTY', '123456789', 1),
(29, 'azazazaz@gmail.com', 'AZERTY', '123456789', 1),
(30, 'azer@gmail.com', 'AZERTYUIOP', '123456789', 1),
(31, 'azer@gmail.com', 'AZERTYUIOP', '123456789', 1),
(32, 'az@gmail.com', 'azazazazazz', '123456789', 1),
(33, 'azaz@gmail.com', 'Jean Marie Lepen', '123456789', 1),
(37, 'abc@abvc.fr', 'AAA', '26cb92b63be667ee43a4c6b397711040', 1),
(38, '123@aozajoeijaz.com', 'AOPIJ', '4b6a9d6717e3e53e52dac00afbce1b6f', 1),
(39, 'aaa@aaa.com', 'AAAA', '3dbe00a167653a1aaee01d93e77e730e', 1),
(40, 'new@email.com', 'NU', '25f9e794323b453885f5181f1b624d0b', 1),
(42, 'harratanis@hotmail.fr', 'NACH', '$1$rasmusle$ajnFEUBODlxezJZg52spU0', 2),
(44, 'admin@admin.admin', 'ADMIN', '$1$rasmusle$MsM9yyq95ZvajzOqiKy9/1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likefilm`
--
ALTER TABLE `likefilm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_films` (`fk_films`);

--
-- Indexes for table `likereview`
--
ALTER TABLE `likereview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews` (`fk_reviews`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilisateur` (`fk_utilisateur`),
  ADD KEY `fk_film` (`fk_film`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`fk_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `likefilm`
--
ALTER TABLE `likefilm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `likereview`
--
ALTER TABLE `likereview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likefilm`
--
ALTER TABLE `likefilm`
  ADD CONSTRAINT `fk_films` FOREIGN KEY (`fk_films`) REFERENCES `film` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likereview`
--
ALTER TABLE `likereview`
  ADD CONSTRAINT `fk_reviews` FOREIGN KEY (`fk_reviews`) REFERENCES `review` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`fk_film`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_utilisateur` FOREIGN KEY (`fk_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`fk_role`) REFERENCES `role` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
