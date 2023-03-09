-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 04:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowings`
--

CREATE TABLE `borrowings` (
  `Borrowing_Code` int(11) NOT NULL,
  `Borrowing_Date` datetime DEFAULT NULL,
  `Borrowing_Return_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Reservation_Code` int(11) NOT NULL,
  `Scheduled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowings`
--

INSERT INTO `borrowings` (`Borrowing_Code`, `Borrowing_Date`, `Borrowing_Return_Date`, `Item_Code`, `Nickname`, `Reservation_Code`, `Scheduled`) VALUES
(1, '2023-03-01 18:33:38', '2023-03-07 13:50:34', 2, 'bkhitamine2000', 8, 10),
(3, '2023-03-05 14:01:38', '2023-03-07 13:50:34', 9, 'daifaneyasmine2002', 29, 22),
(4, '2023-02-26 21:05:38', '2023-03-07 13:50:34', 13, 'elghaliikram2001', 5, NULL),
(5, '2023-02-26 21:07:22', '2023-03-07 13:50:34', 18, 'elghaliikram2001', 6, NULL),
(6, '2023-02-24 18:33:38', '2023-03-07 13:50:34', 24, 'ettamriilyasse1997', 4, NULL),
(7, '2023-02-26 19:28:23', '2023-03-07 13:50:34', 28, 'ettamriilyasse1997', 7, NULL),
(8, '2023-03-02 11:45:45', '2023-03-07 13:50:34', 33, 'lamchattabamine2003', 9, NULL),
(9, '2023-03-02 11:48:28', '2023-03-07 13:50:34', 34, 'lamchattabamine2003', 10, NULL),
(10, '2023-01-03 10:05:32', '2023-03-07 13:50:34', 11, 'lamchattabamine2003', 1, 1),
(11, '2023-01-03 10:07:58', '2023-03-07 13:50:34', 16, 'lamchattabamine2003', 2, 1),
(12, '2023-02-08 15:00:23', '2023-03-07 13:50:34', 19, 'bkhitamine2000', 3, 1),
(13, '2023-03-03 12:06:34', '2023-03-07 13:50:34', 38, 'tamimsoufian2003', 12, NULL),
(14, '2023-03-03 12:08:34', '2023-03-07 13:50:34', 39, 'tamimsoufian2003', 13, NULL),
(15, '2023-03-04 16:06:40', '2023-03-07 13:50:34', 41, 'tebbasaad2003', 14, NULL),
(16, '2023-03-04 16:07:59', '2023-03-07 13:50:34', 50, 'tebbasaad2003', 15, NULL),
(17, '2023-03-07 12:40:20', '2023-03-07 13:50:34', 1, 'Bkhit Amine', 2916, NULL),
(18, '2023-03-07 12:49:21', '2023-03-07 13:50:34', 22, 'Bkhit Amine', 2917, NULL),
(21, '2023-03-07 12:50:47', '2023-06-16 13:50:34', 11, 'Lunea Cain', 2910, 1),
(22, '2023-03-07 12:59:01', '2023-03-07 13:50:34', 49, 'bkhitamine2000', 2901, NULL),
(23, '2023-03-07 13:06:08', '2023-03-07 13:50:34', 19, 'Jermaine Daugherty', 2911, NULL),
(24, '2023-03-07 13:10:17', '2023-03-07 13:50:34', 4, 'Lunea Cain', 2908, NULL),
(46, '2023-03-07 20:20:04', '2023-03-07 20:20:34', 21, 'Miranda Knapp', 2956, NULL),
(49, '2023-01-07 20:28:17', '2023-03-09 11:22:26', 21, 'Yuri Pitts', 2961, 1),
(51, '2023-03-07 20:59:20', NULL, 6, 'Yuri Pitts', 2962, NULL),
(52, '2023-03-07 21:43:34', '2023-03-07 21:50:37', 48, 'George Mcdaniel', 2968, NULL),
(54, '2023-03-07 21:44:52', '2023-03-07 21:45:33', 31, 'George Mcdaniel', 2969, NULL),
(55, '2023-03-07 21:47:56', '2023-03-07 21:48:57', 13, 'George Mcdaniel', 2972, NULL),
(56, '2023-03-07 21:50:42', '2023-03-07 21:51:46', 16, 'George Mcdaniel', 2973, NULL),
(60, '2023-03-01 00:56:49', '2023-03-16 00:56:49', 49, 'Alfreda Bowman', 28, NULL),
(64, '2023-03-08 10:04:18', '2023-03-08 10:07:04', 107, 'Caesar Blair', 2984, NULL),
(65, '2023-03-08 10:04:20', '2023-03-08 10:06:21', 106, 'Caesar Blair', 2983, NULL),
(66, '2023-03-08 10:05:37', '2023-03-08 10:06:15', 104, 'Caesar Blair', 2985, NULL),
(67, '2023-03-08 10:11:26', '2023-03-08 10:12:57', 49, 'Caesar Blair', 2989, NULL),
(68, '2023-03-08 10:11:27', '2023-03-08 10:11:42', 48, 'Caesar Blair', 2987, NULL),
(69, '2023-03-08 10:11:29', '2023-03-08 10:11:40', 105, 'Caesar Blair', 2986, NULL),
(70, '2023-03-09 09:14:52', '2023-03-09 09:15:34', 104, 'Lucian Heath', 2998, NULL),
(71, '2023-03-09 13:51:27', NULL, 32, 'Bruno Gilbert', 2994, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_Code` int(11) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author_Name` varchar(100) DEFAULT NULL,
  `Cover_Image` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL,
  `Edition_Date` date DEFAULT NULL,
  `Purchase_Date` date DEFAULT NULL,
  `Status` varchar(150) DEFAULT NULL,
  `Type` varchar(80) NOT NULL,
  `PagesNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_Code`, `Title`, `Author_Name`, `Cover_Image`, `State`, `Edition_Date`, `Purchase_Date`, `Status`, `Type`, `PagesNumber`) VALUES
(1, 'LA FEMME MOUSTIQUE : TEXTE INTEGRAL', 'Ghislaine Herbera', 'Item_Images/Audio_Book/wsgetimg (3).jpeg', 'Used - like new', '2022-01-10', '2022-01-10', 'Borrowed', 'Audio book', 0),
(2, 'PANIQUE DANS LA FORET', 'Clotilde Perrin', 'Item_Images/Audio_Book/1297509.jpg', 'Used', '2013-03-27', '2019-07-10', 'Borrowed', 'Audio book', 0),
(3, 'PAX ET LE PETIT SOLDAT', 'Sara Pennypacker', 'Item_Images/Audio_Book/1297513.jpg', 'Used - like new', '2020-10-14', '2021-08-19', 'Available', 'Audio book', 0),
(4, 'SOURICETTE VEUT UN AMOUREUX', 'François Vincent', 'Item_Images/Audio_Book/1296908.jpg', 'Used - like old', '2016-09-15', '2021-09-10', 'Borrowed', 'Audio book', 0),
(5, 'SAUTE-LA-PUCE', 'Benoit Debecker', 'Item_Images/Audio_Book/wsgetimg.jpeg', 'Broken', '2015-09-09', '2021-03-18', 'Unavailable', 'Audio book', 0),
(6, 'PREMIERES NEIGES', 'Nelson', 'Item_Images/Audio_Book/wsgetimg (1).jpeg', 'New', '2022-05-06', '2022-03-30', 'Available', 'Audio book', 0),
(7, 'LA PYRAMIDE DES BESOINS HUMAINS', 'Caroline Sole', 'Item_Images/Audio_Book/A001765230.jpg', 'Used - like new', '2020-12-18', '2022-03-11', 'Available', 'Audio book', 0),
(8, 'LA PETITE DANSEUSE - EDGAR DEGAS', 'Geraldine Elschner', 'Item_Images/Audio_Book/1102896.jpg', 'Used', '2017-10-19', '2022-07-07', 'Available', 'Audio book', 0),
(9, 'SALSA !', 'Edouard Manceau', 'Item_Images/Audio_Book/9782375150788_thumb.jpg', 'Used - like old', '2021-10-06', '2022-06-10', 'Borrowed', 'Audio book', 0),
(10, 'LE BRUIT DES NOMBRES', 'Jeanne Boyer', 'Item_Images/Audio_Book/wsgetimg (2).jpeg', 'Broken', '2020-05-29', '2022-01-31', 'Unavailable', 'Audio book', 0),
(11, 'LES MITCHELL CONTRE LES MACHINES', 'Mike Rianda', 'Item_Images/Movie/V99999006506.jpg', 'New', '2020-03-04', '2021-07-09', 'Borrowed', 'Movie', 0),
(12, 'HAM ON RYE', 'Taormina Tyler', 'Item_Images/Movie/V99999007601.jpg', 'Used - like new', '2022-08-11', '2022-09-11', 'Available', 'Movie', 0),
(13, 'JERK', 'Vienne Gisele', 'Item_Images/Movie/wsgetimg.jpeg', 'Used', '2022-05-19', '2022-07-21', 'Available', 'Movie', 0),
(14, 'GREAT FREEDOM', 'Meise Sebastian', 'Item_Images/Movie/wsgetimg (1).jpeg', 'Used - like old', '2018-07-27', '2019-04-10', 'Available', 'Movie', 0),
(15, 'THE INNOCENTS', 'Vogt Eskil', 'Item_Images/Movie/0000000274442.jpg', 'Broken', '2017-03-02', '2017-08-11', 'Unavailable', 'Movie', 0),
(16, 'CLARA SOLA', 'Alvarez Mesen', 'Item_Images/Movie/wsgetimg (2).jpeg', 'New', '2022-02-07', '2022-02-09', 'Available', 'Movie', 0),
(17, 'LE PEUPLE LOUP', 'Moore Tomm', 'Item_Images/Movie/0000000271977.jpg', 'Used - like new', '2021-01-13', '2022-01-14', 'Available', 'Movie', 0),
(18, 'SOUL', 'Docter Pete', 'Item_Images/Movie/V99999006516.jpg', 'Used', '2019-07-25', '2020-01-21', 'Borrowed', 'Movie', 0),
(19, 'SOUS LE CIEL DE KOUTAISSI', 'Koberidze Aleksandre', 'Item_Images/Movie/V99999008299.jpg', 'Used - like old', '2016-07-10', '2017-05-27', 'Borrowed', 'Movie', 0),
(20, 'MEME LES SOURIS VONT AU PARADIS', 'Bubenicek Jan', 'Item_Images/Movie/0000000273262.jpg', 'Broken', '2014-09-04', '2015-08-29', 'Unavailable', 'Movie', 0),
(21, 'APRES LA CHUTE', 'Pierre-Henry Gomont', 'Item_Images/Comic/074ac8ed6b3c596776004f8e338af83bde47944d27e07e69ea5ea3cdc3a1a173.jpg', 'New', '2022-01-25', '2022-01-26', 'Available', 'Comic', 0),
(22, 'LA REPUBLIQUE DU CRANE', 'Vincent Brugeas', 'Item_Images/Comic/302d3ce65d4399b4abf8251d36fa0661d7623f60f8fa928a00ea7ab6d6ea538c.jpg', 'Used - like new', '2022-08-11', '2022-12-06', 'Borrowed', 'Comic', 0),
(23, 'UN CONCOURS PLEIN D\'OBSTACLES !', 'Kristin Varner', 'Item_Images/Comic/794e63537953ef1486c97b8a60560ff7dc9d72e17e9d03ab83c9e587960b761c.jpg', 'Used', '2021-01-01', '2021-02-23', 'Available', 'Comic', 0),
(24, 'HARRY MAKITO, MAGICIEN & SAUVEUR DE SORCIERES. 1', 'Shizumu Watanabe', 'Item_Images/Comic/e3eea37ac3f238ffe109a101fe198b0b6cb2605e31f1eae9ef3185e2cd933d07.jpg', 'Used - like old', '2018-01-11', '2018-07-19', 'Borrowed', 'Book', 0),
(25, 'CHER BLOPBLOP : LETTRE A MON EMBRYON', 'Lea Castor', 'Item_Images/Comic/4fbec7c24ebf7b699e1f8d80eb993a6aac12bb81c66fe8c939c04883bd884c84.jpg', 'Broken', '2016-02-08', '2017-01-31', 'Unavailable', 'Music', 0),
(26, 'HORIMIYA. 1', 'Hero', 'Item_Images/Comic/5fe82a6ebaaf82b781bbba1e191ee401c058da8f7c2b73301abdbfabe78075ce.jpg', 'New\r\n', '2021-12-31', '2022-03-01', 'Available', 'Book', 0),
(27, 'CE QUE NOUS SOMMES', 'Zep', 'Item_Images/Comic/ea6d8df9f4405831281f85f4858e045373cbf0888cbc3f4dd093c1726c5013f7.jpg', 'Used - like new', '2021-07-13', '2021-12-03', 'Available', 'Book', 0),
(28, 'JE SUIS TOUJOURS VIVANT', 'Roberto Saviano', 'Item_Images/Comic/4718f52129741fc999c051f1020d99502e12af471028007b47c75573df21d2cc.jpg', 'Used', '2020-08-28', '2021-09-02', 'Borrowed', 'Book', 0),
(29, 'LA LOUVE BOREALE', 'Nuria Tamarit', 'Item_Images/Comic/387c9f96d3ae60a8cf1bf2d7d66e8c50423b72eb1b333c30e071d0ad849a4aa7.jpg', 'Used - like old', '2018-07-23', '2019-03-28', 'Available', 'Book', 0),
(30, 'LE PETIT FRERE', 'Jean-Louis Tripp', 'Item_Images/Comic/142e727314018b9d6fa322ffe2d49cb86db6c9dcdf6835f668b60780e5aade9a.jpg', 'Broken', '2017-03-01', '2017-06-15', 'Unavailable', 'Book', 0),
(31, 'LOVE EXCHANGE FAILURE', 'White Ward. Musicien', 'Item_Images/Music/0634438580973_thumb.jpg', 'New', '2022-09-30', '2022-10-23', 'Available', 'Music', 0),
(32, 'FEVER DREAMS PTS 1-4', 'Johnny Marr', 'Item_Images/Music/4050538706109_thumb.jpg', 'Used - like new', '2020-09-11', '2021-11-30', 'Borrowed', 'Music', 0),
(33, 'THE GLEAM', 'Park Jiha', 'Item_Images/Music/1228680.jpg', 'Used', '2018-07-25', '2019-01-24', 'Borrowed', 'Music', 0),
(34, 'SHOALS', 'Palace', 'Item_Images/Music/0602438712960_thumb.jpg', 'Used - like old', '2017-06-23', '2017-09-16', 'Borrowed', 'Music', 0),
(35, 'DB545', 'Db545', 'Item_Images/Music/0803341556607_thumb.jpg', 'Broken', '2012-08-17', '2014-01-17', 'Available', 'Music', 0),
(36, 'POMPEII', 'Cate Le Bon', 'Item_Images/Music/0184923131529_thumb.jpg', 'New', '2022-03-25', '2022-06-15', 'Available', 'Music', 0),
(37, 'DRAGON NEW WARM MOUNTAIN I BELIEVE IN YOU', 'Big Thief', 'Item_Images/Music/0191400040823_thumb.jpg', 'Used - like new', '2020-07-23', '2020-10-30', 'Available', 'Music', 0),
(38, 'MANNUS', 'Casse Gueule', 'Item_Images/Music/1234467.jpg', 'Used', '2019-07-07', '2020-08-29', 'Borrowed', 'Music', 0),
(39, 'SONIC POEMS', 'Lewis OfMan', 'Item_Images/Music/0602445293896_thumb.jpg', 'Used - like old', '2014-03-12', '2016-07-12', 'Borrowed', 'Music', 0),
(40, 'CONFLUENCE #2 : LE CHANT DES SOURCES', 'Isabelle Courroy', 'Item_Images/Music/3341348603698_thumb.jpg', 'Broken', '2016-03-31', '2017-01-20', 'Unavailable', 'Music', 0),
(41, 'LE LIVRE SANS IMAGES', 'B. J. Novak', 'Item_Images/Book/2bef76287385920bb9770bb454d9cceef5571f9d8e6d45cf6c28bedcae8711f7.jpg', 'New', '2022-03-25', '2022-03-26', 'Borrowed', 'Book', 0),
(42, 'MAYDALA EXPRESS', 'Davide Morosinotto', 'Item_Images/Book/45f52e20447a3b81516de547e69bd91d025928f9b695f353b9b7c482075001db.jpg', 'Used - like new', '2020-09-15', '2021-02-03', 'Available', 'Book', 0),
(43, 'L\'ETE OU TOUT A FONDU : ROMAN', 'Tiffany McDaniel', 'Item_Images/Book/c45078e0f10b727bf5360f5fa86673f3f88333fc71106104fd903f8b310a6a68.jpg', 'Used', '2018-06-07', '2019-03-20', 'Available', 'Book', 0),
(44, 'LA TREIZIEME HEURE : ROMAN', 'Emmanuelle Bayamack-Tam', 'Item_Images/Book/b96af83e9db11509917c704f4064eb0d35f8d65c1fd0a88c8567593df3a95ebd.jpg', 'Used', '2019-03-09', '2019-05-30', 'Reserved', 'Book', 0),
(46, 'LES COEURS ENDURCIS', 'Martyna Bunda', 'Item_Images/Book/4f380300adf3afe2f56aec9a3cebaf2ba143eba512050d83e699fa21f479063d.jpg', 'Broken', '2015-08-28', '2015-09-02', 'Unavailable', 'Book', 0),
(47, 'UNE SURPRISE POUR AMOS MCGEE', 'Philip Christian', 'Item_Images/Book/079bd8ff61271504db3d7dbfbe7fc46f2f4c08a87ab4fb7da7a36f02c4135780.jpg', 'New', '2022-01-11', '2022-02-09', 'Available', 'Book', 0),
(48, 'LEUR SANG COULE DANS TES VEINES', 'Rachel Burge', 'Item_Images/Book/64ab4232595d9e4d20a4bb76d2508100290b8006af7cdd138e91d7a38f2a330a.jpg', 'Used - like new', '2019-06-10', '2020-02-04', 'Available', 'Book', 0),
(49, 'AU PARADIS JE DEMEURE', 'Attica Locke', 'Item_Images/Book/c80f59eefb7f0872ce8cda3577d5db807ff84aaf0e496198c46f943eb83c4619.jpg', 'Used', '2016-09-21', '2017-01-22', 'Available', 'Book', 0),
(50, 'L\'ECOLE N\'EST PAS FAITE POUR LES PAUVRES ', 'Jean-Paul Delahaye', 'Item_Images/Book/21711074dc6316af8f3428a1e0e5348da54f8f86c708e0f3af8279a20ed0f121.jpg', 'Used - like old', '2019-03-01', '2019-04-01', 'Borrowed', 'Book', 0),
(102, 'Eos est qui eum qu', 'Alika Patel', 'Item_Images/6407e358e21b9-1678238552.jpg', 'Acceptable', '2008-12-16', '1996-08-06', 'Reserved', 'research paper', 302),
(103, 'Eu natus molestiae v', 'Catherine Woodard', 'Item_Images/6408592f63cfe-1678268719.jpg', 'quite worn', '2004-12-03', '2019-09-10', 'Available', 'book', 387),
(104, 'Totam laudantium im', 'Dominic Lang', 'Item_Images/64084d95df24b-1678265749.jpg', 'Good condition', '1999-10-13', '1970-11-06', 'Available', 'DVD', 119),
(105, 'Labore aliquam labor', 'Victoria Rosa', 'Item_Images/64084da85c469-1678265768.jpg', 'Good condition', '2003-10-05', '2015-06-13', 'Available', 'magazine', 548),
(106, 'Veniam accusantium ', 'Carson Foley', 'Item_Images/64084dbd6b15a-1678265789.jpg', 'new', '1986-08-21', '1998-10-26', 'Available', 'book', 488),
(107, 'Sint tempore quasi ', 'Devin Short', 'Item_Images/64084efd96d65-1678266109.jpg', 'Good condition', '2000-10-23', '2021-12-16', 'Available', 'book', 728),
(108, 'Cupidatat autem dele', 'Robert English', 'Item_Images/640851c40ce08-1678266820.jpg', 'quite worn', '2013-03-08', '1997-04-08', 'Available', 'DVD', 669),
(109, 'Expedita aliqua Opt', 'Kirestin Stephens', 'Item_Images/640851d63251e-1678266838.jpg', 'Torn', '2010-09-29', '1990-01-17', 'Available', 'novel', 475),
(110, 'Ea anim velit aut q', 'Russell Holcomb', 'Item_Images/6408534c1960e-1678267212.jpg', 'Acceptable', '2005-06-04', '1988-07-08', 'Available', 'novel', 84),
(111, 'Eu aliqua Suscipit ', 'Stephen Crosby', 'Item_Images/64085378ef08b-1678267256.jpg', 'new', '1981-11-06', '2020-03-20', 'Available', 'book', 209),
(112, 'Asperiores suscipit ', 'Ursa Acosta', 'Item_Images/640854ec69452-1678267628.jpg', 'new', '1978-06-13', '2018-02-25', 'Available', 'magazine', 129),
(113, 'Excepteur dolore mol', 'Aquila Little', 'Item_Images/640855037c665-1678267651.jpg', 'new', '2003-05-03', '2009-12-03', 'Available', 'magazine', 355),
(114, 'Voluptas esse quaera', 'Willa Shelton', 'Item_Images/6408551cedc95-1678267676.jpg', 'Acceptable', '1974-01-01', '2003-10-23', 'Available', 'novel', 918),
(115, 'Nihil dolor quia mol', 'Abbot Dixon', 'Item_Images/6408552b21212-1678267691.jpg', 'Acceptable', '2014-03-02', '2009-10-31', 'Available', 'research paper', 280),
(116, 'Sed quasi aspernatur', 'Zeph Woods', 'Item_Images/64085538e961d-1678267704.jpg', 'Acceptable', '1976-05-12', '2018-11-27', 'Available', 'research paper', 31),
(117, 'Necessitatibus eius ', 'Gage Odom', 'Item_Images/6408555b64456-1678267739.jpg', 'quite worn', '2012-01-06', '2019-01-26', 'Available', 'novel', 962),
(118, 'Quia odit labore ips', 'Francesca Doyle', 'Item_Images/640855a29f03d-1678267810.jpg', 'Good condition', '1975-11-12', '1986-04-15', 'Available', 'book', 713),
(119, 'Ipsum quibusdam ven', 'Nerea Knowles', 'Item_Images/640855b8cf3ea-1678267832.jpg', 'quite worn', '1979-08-16', '1994-06-08', 'Available', 'book', 797),
(120, 'Minima deserunt tota', 'Yoko Kirby', 'Item_Images/640855cf46d68-1678267855.jpg', 'new', '2022-10-31', '1998-12-15', 'Available', 'magazine', 22),
(121, 'Aut fugiat velit dol', 'Astra Key', 'Item_Images/640855fc93fd1-1678267900.jpg', 'new', '2000-04-13', '1970-03-07', 'Available', 'magazine', 47),
(122, 'Aut consectetur dist', 'Luke Beach', 'Item_Images/6408560e1eea7-1678267918.jpg', 'new', '1973-07-26', '1977-03-31', 'Available', 'research paper', 466),
(124, 'Iste qui magnam non ', 'Mary Huff', 'Item_Images/6408565e6958c-1678267998.jpg', 'quite worn', '2008-12-11', '1980-01-05', 'Available', 'magazine', 845),
(125, 'Est omnis ipsa exce', 'Kevin Barnes', 'Item_Images/640856a0d1a39-1678268064.jpg', 'Good condition', '2003-03-08', '2007-10-17', 'Available', 'DVD', 491),
(126, 'Rerum non est quibus', 'Ignacia Page', 'Item_Images/640856b342f5d-1678268083.jpg', 'Acceptable', '2022-03-27', '2008-08-01', 'Available', 'magazine', 520),
(127, 'Voluptate non veniam', 'Shafira Camacho', 'Item_Images/640856cbc72fb-1678268107.jpg', 'new', '2015-06-09', '2021-05-29', 'Available', 'research paper', 551),
(128, 'Nihil amet suscipit', 'Jin Romero', 'Item_Images/640856f04ef26-1678268144.jpg', 'Good condition', '2018-08-15', '1984-01-04', 'Available', 'research paper', 365),
(129, 'Ea dolorem nulla eos', 'Levi Gibbs', 'Item_Images/640856ff578b0-1678268159.jpg', 'Acceptable', '1986-08-15', '1976-05-18', 'Available', 'novel', 743),
(130, 'Qui et sapiente face', 'Sean Fletcher', 'Item_Images/6408572589654-1678268197.jpg', 'new', '2016-11-15', '1981-01-28', 'Available', 'research paper', 845),
(131, 'Facilis cum non anim', 'Chava Bridges', 'Item_Images/6408573681d12-1678268214.jpg', 'new', '1987-08-27', '1975-01-09', 'Available', 'book', 519),
(132, 'Laborum ut ex quis s', 'Stone Solis', 'Item_Images/64085749b5520-1678268233.jpg', 'Torn', '1970-04-19', '1973-10-06', 'Available', 'DVD', 831),
(133, 'Rerum voluptatibus c', 'Trevor Morton', 'Item_Images/6408576525fa1-1678268261.jpg', 'Good condition', '2013-04-05', '1971-10-31', 'Available', 'book', 317),
(134, 'Quis labore cupidata', 'Tyler Wise', 'Item_Images/6408577fe83ec-1678268287.jpg', 'quite worn', '1985-05-03', '2016-01-27', 'Available', 'novel', 223),
(135, 'Deserunt ipsa accus', 'Elmo Horne', 'Item_Images/640857a1b665f-1678268321.jpg', 'new', '2010-10-28', '1970-03-30', 'Available', 'research paper', 576),
(136, 'Quia dignissimos rem', 'Hanae Juarez', 'Item_Images/640857b534409-1678268341.jpg', 'new', '2021-04-11', '2021-06-04', 'Available', 'DVD', 159),
(137, 'Ut error eiusmod con', 'Abra Vaughn', 'Item_Images/640857c411a46-1678268356.jpg', 'Acceptable', '1998-10-17', '1980-05-03', 'Available', 'research paper', 161),
(138, 'Enim qui sit praese', 'Ina Hale', 'Item_Images/640858938f610-1678268563.jpg', 'Good condition', '2020-01-19', '1982-01-19', 'Available', 'DVD', 93),
(139, 'Cillum pariatur Sit', 'Justin Stark', 'Item_Images/640858b5f3a75-1678268597.jpg', 'Torn', '2003-03-09', '2001-10-14', 'Available', 'book', 915),
(140, 'Nisi velit et in opt', 'Lawrence Bray', 'Item_Images/640858cc5f59c-1678268620.jpg', 'quite worn', '2003-03-24', '1988-06-09', 'Available', 'book', 617),
(141, 'Libero consequuntur ', 'Kai Green', 'Item_Images/640858e211206-1678268642.jpg', 'quite worn', '2013-01-31', '1993-05-18', 'Available', 'DVD', 86),
(142, 'Quibusdam incidunt ', 'Claudia Pierce', 'Item_Images/640858f585db0-1678268661.jpg', 'quite worn', '1979-05-26', '2009-06-18', 'Available', 'novel', 764),
(143, 'Unde explicabo Nobi', 'Kamal Zimmerman', 'Item_Images/6408591770554-1678268695.jpg', 'quite worn', '2001-08-05', '2005-10-14', 'Available', 'book', 469);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Nickname` varchar(150) NOT NULL,
  `Full_Name` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT 0,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `CIN` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Penalty_Count` int(11) DEFAULT 0,
  `Birth_Date` date DEFAULT NULL,
  `Creation_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Nickname`, `Full_Name`, `Password`, `Admin`, `Address`, `Email`, `Phone`, `CIN`, `Occupation`, `Penalty_Count`, `Birth_Date`, `Creation_Date`) VALUES
('Abdul Hull', 'Camden Hamilton', '$2y$10$ZLgQuP0LXo3K1GVmbdf9uej1tMQSBXk48Lj4EVXHSfEQTBysNqctq', 0, 'In earum ratione sol', 'mifegyb@mailinator.com', '+1 (639) 313-6395', 'Dolorem quo soluta q', 'Employee', 1, '2010-08-20', '2023-03-07'),
('Adrienne Bullock', 'Lunea Trujillo', '$2y$10$aKo.Lti0j.tzf0SK.i1O/O2.U700UBdSIWDUypqqeZV2H47Kk7m2W', 0, 'Cum culpa consequun', 'xybace@mailinator.com', '+1 (625) 992-6625', 'Quia est excepturi e', 'student', 0, '1992-07-09', '2023-03-07'),
('Aiko Dennis', 'Claudia Hardin', '$2y$10$hVGaj5ymgxqNqkwJcOEVZOvGgtxlBXo6ESv/2TWxQUidYSoXp..pW', 0, 'Consequat Similique', 'grtdfg@gmoffl-d.gtr', '+1 (601) 282-4417', 'Facilis a et consequ', '', 0, '1970-01-19', '2023-03-05'),
('Alfreda Bowman', 'Asher Schwartz', 'Pa$$w0rd!', 0, 'Fuga Qui est saepe ', 'repyzy@mailinator.com', '+1 (723) 541-6089', 'Possimus aliquip ex', 'Housewife', 0, '2008-04-18', NULL),
('alilousaad1975', 'Alilou Saad', '$2y$10$gVNZb.rvyWPkLfQqycx6Ius./yMCzP6.inUpr154WCyBAK67wxqqW', 1, '27, av. Hassan II', 'alilou.saad@gmail.com', '+212695621537', 'K143659', '', 0, '1975-04-22', '2015-06-09'),
('Aurelia Espinoza', 'Melinda Robertson', '$2y$10$43AiS03hjY0vQ5CZmWOquOyS5.MVYPXxVWexuLAkBs8qGCMtUjinS', 0, 'Qui voluptas ad vero', 'cuzixava@mailinator.com', '+1 (494) 973-1128', 'Nam sit non illo cul', 'Employee', 0, '2010-12-14', '2023-03-07'),
('Barrett Ramirez', 'Nathaniel Vaughan', '$2y$10$Ea4mKjyE7L1nN9mF6g/Q3OzgzJGQyYY7xm4SoHZA4Ub26aUToOpc6', 0, 'Ut illo sint modi ad', 'letami@mailinator.com', '+1 (321) 354-4982', 'Aut laboris quisquam', 'student', 3, '2013-12-07', '2023-03-05'),
('Bkhit Amine', 'Fuller Ortega', '$2y$10$ejfbn5GxKF285PUQLB/i1ufXoaKmukkTDPegCOwtgrlmvHXpJt3Ua', 0, 'Architecto delectus', 'syqax@mailinator.com', '+1 (425) 991-4976', 'Aspernatur iusto bea', 'Employee', 0, '1990-10-27', '2023-03-05'),
('bkhitamine2000', 'Bkhit Amine', '$2y$10$gVNZb.rvyWPkLfQqycx6Ius./yMCzP6.inUpr154WCyBAK67wxqqW', 0, '20, rue Bani Marine', 'bkhit.amine@gmail.com', '+212684021838', 'CE456918', 'Etudiant', 2, '2000-01-04', '2022-07-09'),
('Bruno Gilbert', 'Kane Neal', '$2y$10$cFMsklztdlNXWiTes9CwJOE.rFyAqiEJXsKNa.uOKz0GmKxrvyDBy', 0, 'Sequi ut qui ut ut e', 'bewulof@mailinator.com', '+1 (869) 374-3886', 'Minim consequat Cor', 'Housewife', 3, '2017-03-14', '2023-03-08'),
('Caesar Blair', 'Hector Reid', '$2y$10$FbAWqQ7QEmrIhJj87Rr7/.U2C1TbQeRyW2gNbh4kzDbCzeUJrHf4S', 0, 'Dolores inventore ip', 'husoqagowe@mailinator.com', '+1 (289) 841-8632', 'Aut debitis et et de', 'Housewife', 0, '2004-01-15', '2023-03-08'),
('Clarke Foster', 'Ila Mooney', '$2y$10$2bVeaUKIn.ha2M5eNvZMc.OSrPvnO2UgtH/SsiYDKxOmcJWM3xYIy', 0, 'Magni officia quas q', 'susiwan@mailinator.com', '+1 (272) 425-2321', 'Consequatur rerum fu', 'student', 3, '1990-03-15', '2023-03-08'),
('Dahlia Pollard', 'Deirdre Odonnell', '$2y$10$6QZleglEo38arYhmUiDYRORt/wtNbl2uS4FB.D6XC/z6AwjZ0pbSa', 0, 'Nostrud aliquip ex s', 'noxyvyluj@mailinator.com', '+1 (295) 412-4531', 'Corporis est quis en', 'Housewife', 0, '2004-09-05', '2023-03-07'),
('daifaneyasmine2002', 'Daifane Yasmine', 'fff78b1cc652372b6695b06311049f8c', 0, '63, Place Rahba Lakdima', 'dafaine.yasmine@gmail.com', '+212696395569', 'BR54712', 'Salariee', 0, '2002-05-15', '2021-08-23'),
('Doris_Reed', 'Doris Reed', '$2y$10$jmll5jzHfU38gmDKrQs8T.l6xXRinbeXurJvkBPqHOeBTk.uAHVs2', 0, 'Voluptas animi et n', 'xaribixonu@mailinator.com', '+1 (676) 128-9478', 'Adipisicing laborum ', '', 0, '2012-08-09', '2023-03-05'),
('Drake Carson', 'Xena Austin', 'Pa$$w0rd!', 0, 'Veniam occaecat ita', 'powoh@mailinator.com', '+1 (558) 968-8178', 'Dolor sit incididunt', 'Housewife', 0, '2023-01-05', NULL),
('elghaliikram2001', 'Elghali Ikram', '25da82168123e978a1ae0dff02f65028', 0, '6, rue Moulay Slimane', 'elghali.ikram@gmail.com', '+212676225556', 'BL87123', 'Etudiante', 0, '2001-08-25', '2021-09-09'),
('ettamriilyasse1997', 'Ettamri Ilyasse', '5133661b7a0be48e2510f945ead87cf4', 0, '1, av Hassan II, hay ElFarah Karia', 'ettamri.ilyasse@gmail.com', '+212672322387', 'BE345019', 'Salarié', 2, '1997-01-31', '2022-01-20'),
('Gary Barry', 'Madeson Gross', 'Pa$$w0rd!', 0, 'Enim id labore praes', 'voruwopuk@mailinator.com', '+1 (174) 518-5229', 'Ratione laudantium ', 'Employee', 0, '1975-05-21', NULL),
('George Mcdaniel', 'Vance Parrish', '$2y$10$hAEO2.k3ppIZvtMzZxuW9e.Y1.TApwHp12Pfs/n7df6ASaCzGQ6mi', 0, 'Dolor fugiat minus h', 'rymad@mailinator.com', '+1 (851) 189-5171', 'Culpa dolore duis om', 'student', 0, '1990-03-06', '2023-03-07'),
('Hasad Avery', 'Maryam Meyer', '$2y$10$W2LVuLudRn7fRoswADbfSOsRLlDx8TN2qNahneMsEr8H.v7YRA8kK', 0, 'Voluptas iusto offic', 'puziryv@mailinator.com', '+1 (133) 502-1939', 'Deleniti rerum qui a', 'Employee', 0, '1976-09-02', '2023-03-06'),
('Ian Cox', 'Charlotte Witt', '$2y$10$A70G.YuvUB5QfhUkFdenOOBR6YMv9fOsMmlPM9owHgkTEVwmOjaoG', 0, 'Reiciendis deleniti ', 'hivuxuxeq@mailinator.com', '+1 (965) 911-7644', 'Deserunt repellendus', 'Housewife', 0, '1985-02-04', '2023-03-08'),
('Imogene Melton', 'Barbara Nicholson', '$2y$10$gVNZb.rvyWPkLfQqycx6Ius./yMCzP6.inUpr154WCyBAK67wxqqW', 0, 'Rem minim et molesti', 'fefuca@mailinator.com', '+1 (532) 217-6745', 'Voluptas tempore no', 'student', 3, '2000-08-16', NULL),
('imranlol', 'Tad Hale', '$2y$10$gVNZb.rvyWPkLfQqycx6Ius./yMCzP6.inUpr154WCyBAK67wxqqW', 0, 'Quis eligendi enim v', 'leluka@mailinator.com', '+1 (492) 737-6538', 'Quas officia ut in v', 'Housewife', 2, '1992-09-30', '2023-03-07'),
('Jaquelyn West', 'Desirae Grimes', '$2y$10$bRV0JdiZQs.LMIAuGFGC6u150kOsyIj7YnildkN/iJ19Kxzyg8zB.', 0, 'Nulla et non dolore ', 'zowykiqi@mailinator.com', '+1 (699) 224-7783', 'Qui anim itaque enim', 'Housewife', 3, '2021-06-25', '2023-03-05'),
('Jemima Bryanop', 'Russell Simmons', '$2y$10$Xc3XcZpIMOnF9LvUB.QJfufOjf19mR2omBn9vUxN0mFSAv1dAWelq', 0, 'Et ut doloribus a mi', 'hybyg@mailinator.com', '+1 (365) 382-7623', 'Sed voluptate non a ', 'Employee', 0, '2004-01-10', '2023-03-05'),
('Jermaine Daugherty', 'Sloane Solomon', '$2y$10$sQaN8RlTcSuMUWprXpUrju7g7NK1OJ1wNwgAfYi1CEPLXsbxjlkgC', 0, 'Eos rerum est non c', 'kakidydeno@mailinator.com', '+1 (578) 723-2074', 'Dolorum neque dolore', 'Housewife', 0, '1980-10-01', '2023-03-07'),
('Jerome Jordan', 'Malcolm Potts', '$2y$10$TSdjrvapL5AQjcddAwFOYuUrqNw80piQZ7XmLCWqPLRa9tKDH8QRm', 0, 'Non repudiandae ab s', 'rodogek@mailinator.com', '+1 (438) 422-9208', 'Maiores et non atque', 'Employee', 0, '2007-07-31', '2023-03-07'),
('Karly Cain', 'Dara Wyatt', '$2y$10$aG/mFjfHm5ztrckvjrSdlOAFaecWupkzyDrRYkLXR10sA/divZTSC', 0, 'Nemo pariatur Volup', 'tytubahiby@mailinator.com', '+1 (452) 867-7006', 'Omnis sint velit fa', 'Housewife', 0, '1980-12-08', '2023-03-05'),
('lamchattabamine2003', 'Lamchattab Amine', 'd20703fa5e07b347d3df89cdd57a4858', 0, 'bd. Mohamed V, Imm. Al Ouafa', 'lamchattab.amine@gmail.com', '+212698129013', 'FG341203', 'Entrepreneur', 4, '2003-07-07', '2022-06-02'),
('Lucian Heath', 'Alexandra ', '$2y$10$DFODGLFEybsKUS.cMnLK4ugo/N4FBLxThrVdP4T5sybXyjhjK5j3.', 0, 'Dolorum voluptatum q', 'xodo@mailinator.com', '+1 (703) 365-8701', 'Molestias doloremque', 'Housewife', 3, '1997-11-16', '2023-03-09'),
('Lunea Cain', 'Anastasia Cannon', '$2y$10$1BuFnp53rIEWVnZYUiLhTOYmG7tdWqANTL83zLNMPOxO4DEhyNnVm', 0, 'Aute eligendi volupt', 'fyne@mailinator.com', '+1 (837) 731-9204', 'Non iste et explicab', 'Employee', 1, '1973-03-30', '2023-03-07'),
('Mark Goodwin', 'Igor Mccormick', '$2y$10$U8sJ4b1E2NSlgt6cjy.pouFqZxTvnS4hF.vytk8U0jldkT0NTqmnG', 0, 'Mollit illo incidunt', 'selyqe@mailinator.com', '+1 (268) 219-3045', 'Autem eaque magnam i', 'Official', 0, '1981-02-06', '2023-03-09'),
('Martina Bonner', 'Dorothy Yang', '$2y$10$FIHXUzTxTnF4hiJvu8.qve7ARjNeQFakHd7OQfYf9vaaeNvysGOta', 0, 'Error atque eos asp', 'famisiqori@mailinator.com', '+1 (235) 835-4641', 'Qui est velit dolor', 'Official', 0, '1990-08-02', '2023-03-05'),
('Miranda Knapp', 'Lisandra Rhodes', '$2y$10$p.lLK6MChANXgJsfg713TO9vU5.OOI/TxziLSZcKjeRRuFqgfqG86', 0, 'Sequi delectus qui ', 'deme@mailinator.com', '+1 (228) 803-3373', 'Quaerat nesciunt ut', 'student', 0, '1999-10-18', '2023-03-07'),
('Owen Alvarez', 'Justin Carlson', '$2y$10$PQH7PKGYUOquUcT.YxPv9.FibdFgob3C1QK4c1Rz2XP0o4GAm08BC', 0, 'Voluptates aliquip e', 'nelowod@mailinator.com', '+1 (427) 478-8025', 'Et repellendus Ulla', 'Housewife', 0, '2007-09-07', '2023-03-08'),
('Perry Carney', 'Hedwig Kirk', '$2y$10$ZHoZ6F0pB35II0R53kZt1.1dEYr4isQSwgDUFVc3CcM3.ezqsNBRi', 0, 'Quae consequatur In', 'woxa@mailinator.com', '+1 (878) 741-2925', 'Quod sed perferendis', '', 0, '2006-01-11', '2023-03-05'),
('Quinlan Glenn', 'Emi Bullock', '$2y$10$kPtW.unXiPj9CDy4/nV8N.OrZWw/7/HphD7CO6kNWmlqIjbCe.JTO', 0, 'Aut officiis dolorem', 'gunigovu@mailinator.com', '+1 (814) 748-6517', 'Debitis sequi commod', 'Employee', 0, '1992-08-06', '2023-03-07'),
('REDA Larson xxxxxx', 'Drake Livingston xxxxx', '$2y$10$SekKgADavYp3Qm2zrUBj1OH0VH/X0eD8r7G4fS8XVmpistn8C7YUm', 0, 'Ut dolorum est qui m xxxxx', 'gitevazedsgsdf^^w@mailinator.ceeeomsdfsdf', '+1 (104) 793-3517', 'Non perspiciatis do', '', 1, '1973-07-26', NULL),
('salikbassam2001', 'Bassam Salik', 'ff6c13a527533e7fe4d06d308d2e392c', 0, '365, bd Mohammed V', 'bassam.salik@gmail.com', '+212675975761', 'KB345712', 'Etudiant', 0, '2001-06-27', '2022-03-08'),
('sarsriimran2004', 'Sarsri Imran', '8b1bf0833ad39f8e683b31cf97b33263', 0, '13, av. de la liberté, v.n.', 'sarsri.imran@gmail.com', '+212674586990', 'KB33456', 'Etudiant', 0, '2004-04-01', '2022-02-26'),
('Stewart Potter', 'Christine Barrett', '$2y$10$vI.gt3hkJqKQXw3XJGuSFO0tKV3sURJ0Xg6xuQWg.Gihu9LdoLSKa', 0, 'Quisquam ea deserunt', 'xuxeh@mailinator.com', '+1 (588) 977-2514', 'Molestiae et blandit', 'student', 0, '1972-03-05', '2023-03-05'),
('Sydney WilliamO', 'Oleg Benjamin', '$2y$10$QPT/cLnaLAKUY6wJNwm1fu7rP/s8Y46KVp974GP3LfMnZzPHTvNt.', 0, 'Aut reprehenderit la', 'niwilav@mailinator.com', '+1 (585) 635-7983', 'Consequatur Quos re', '', 0, '1977-12-22', '2023-03-06'),
('tamimsoufian2003', 'Tamim Soufian', '830027a3167662727e072ed060a0a49e', 0, '24, rue Ali Abderrazak ', 'tamim.Soufian@gmail.com', '+212683842321', 'KB89645', 'Etudiant', 0, '2003-10-27', '2022-08-24'),
('tebbasaad2003', 'Tebba Saad', '36554aee94dcd773f70fda74d36e0bdb', 0, 'Av. Mohamed V, 83350', 'tebba.saad@gmail.com', '+212674065353', 'KB345716', 'Stagiaire', 0, '2003-02-06', '2022-06-07'),
('Teegan Taylor', 'Abel Conrad', 'Pa$$w0rd!', 0, 'Commodo et vero duis', 'sujenojam@mailinator.com', '+1 (863) 397-8148', 'Itaque impedit omni', 'Employee', 0, '1998-01-16', NULL),
('Upton Bradford', 'Amity Hancock', '$2y$10$I/Y1dSDZywuSb0WSN0cqDeRXHTofnkvg0L49mVCNYD8/3RFaOLpc2', 0, 'Voluptatem illo sed ', 'pigoqew@mailinator.com', '+1 (701) 537-2861', 'Irure dolorem distin', 'Employee', 0, '2000-01-22', '2023-03-05'),
('Vanna_Delaneyaaaaaaa', 'Jakeem Levine', '$2y$10$RKhOZSoyboq8ejAkgT10fuLGQOW9JWGaaAiASB2utK8hpjND1hcBK', 0, 'Non fugit ipsam nis', 'xehizyti@mailinator.com', '+1 (763) 935-3736', 'Commodo fugiat conse', 'Housewife', 0, '1987-03-07', '2023-03-05'),
('Wade BirdO', 'Quintessa Hewitt', '$2y$10$oTDhz14q8.Ew5Z1ZIOmbIeNkGnsfGYoXNanoCfRASZATGHlplWYr2', 0, 'Sit a exercitationem', 'hipacuhuw@mailinator.com', '+1 (857) 534-2234', 'Quo aut laborum dict', '', 0, '2005-07-13', '2023-03-06'),
('Yoko Reid', 'Dacey Sharp', '$2y$10$qKl9Oo0Iy5ZTyxrwkTyRHesd.HGtSfKay25Bj6ND9AWgV/w99PP7C', 0, 'Deserunt maiores tem', 'tikuwyxeze@mailinator.com', '+1 (922) 804-8679', 'Quaerat doloribus in', 'Official', 0, '1987-01-27', '2023-03-08'),
('Yuri Pitts', 'Daria Vazquez', '$2y$10$rZWm9pB.yBd0a3iWgnyzfeBJ5mFp7oLUOGA.ufy18ifoS66Ja83KG', 0, 'Corrupti sed rerum ', 'gopuxo@mailinator.com', '+1 (144) 268-4489', 'Debitis ullamco nisi', 'Housewife', 1, '1994-11-19', '2023-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_Code` int(11) NOT NULL,
  `Reservation_Date` datetime DEFAULT NULL,
  `Reservation_Expiration_Date` datetime DEFAULT NULL,
  `Item_Code` int(11) NOT NULL,
  `Nickname` varchar(150) NOT NULL,
  `Scheduled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_Code`, `Reservation_Date`, `Reservation_Expiration_Date`, `Item_Code`, `Nickname`, `Scheduled`) VALUES
(1, '2023-03-06 20:33:45', '2023-03-07 20:33:45', 11, 'lamchattabamine2003', NULL),
(2, '2023-01-02 20:35:21', '2023-01-03 20:35:21', 16, 'lamchattabamine2003', NULL),
(3, '2023-02-07 17:22:32', '2023-03-08 17:22:32', 19, 'bkhitamine2000', NULL),
(4, '2023-02-24 16:59:33', '2023-02-25 16:59:33', 24, 'ettamriilyasse1997', NULL),
(5, '2023-02-26 17:22:38', '2023-02-27 17:22:38', 13, 'elghaliikram2001', NULL),
(6, '2023-02-26 17:25:11', '2023-02-27 17:25:11', 18, 'elghaliikram2001', NULL),
(7, '2023-02-26 19:15:23', '2023-02-27 19:15:23', 28, 'ettamriilyasse1997', NULL),
(8, '2023-03-01 14:25:38', '2023-03-02 14:25:38', 2, 'bkhitamine2000', NULL),
(9, '2023-03-01 23:45:21', '2023-03-02 23:45:21', 33, 'lamchattabamine2003', NULL),
(10, '2023-03-01 23:46:44', '2023-03-02 23:46:44', 34, 'lamchattabamine2003', NULL),
(11, '2023-03-02 17:11:38', '2023-03-03 17:11:38', 6, 'daifaneyasmine2002', 1),
(12, '2023-03-02 23:06:44', '2023-03-03 23:06:44', 38, 'tamimsoufian2003', NULL),
(13, '2023-03-03 11:45:34', '2023-03-04 11:45:34', 39, 'tamimsoufian2003', NULL),
(14, '2023-03-03 21:29:09', '2023-03-04 21:29:09', 41, 'tebbasaad2003', NULL),
(15, '2023-03-03 21:31:19', '2023-03-04 21:31:19', 50, 'tebbasaad2003', NULL),
(16, '2023-03-04 07:53:37', '2023-03-05 07:53:37', 3, 'bkhitamine2000', 1),
(17, '2023-03-04 07:54:11', '2023-03-05 07:54:11', 8, 'daifaneyasmine2002', 1),
(18, '2023-03-04 07:55:00', '2023-03-05 07:55:00', 12, 'elghaliikram2001', 1),
(19, '2023-03-04 07:55:22', '2023-03-05 07:55:22', 14, 'bkhitamine2000', 1),
(20, '2023-03-04 08:30:11', '2023-03-05 08:30:11', 17, 'ettamriilyasse1997', 1),
(21, '2023-03-04 09:40:51', '2023-03-05 09:40:51', 23, 'lamchattabamine2003', 1),
(22, '2023-03-04 10:51:23', '2023-03-05 10:51:23', 27, 'salikbassam2001', 1),
(23, '2023-03-04 10:54:32', '2023-03-05 10:54:32', 29, 'salikbassam2001', 1),
(24, '2023-03-04 11:10:09', '2023-03-05 11:10:09', 32, 'salikbassam2001', 1),
(25, '2023-03-04 13:53:45', '2023-03-05 13:53:45', 37, 'sarsriimran2004', 1),
(26, '2023-03-04 13:55:42', '2023-03-05 13:55:42', 42, 'sarsriimran2004', 1),
(27, '2023-03-04 14:01:02', '2023-03-05 14:01:02', 44, 'sarsriimran2004', 1),
(28, '2023-03-04 19:23:37', '2023-03-05 19:23:37', 47, 'tamimsoufian2003', 1),
(29, '2023-03-04 21:55:21', '2023-03-05 21:55:21', 9, 'daifaneyasmine2002', NULL),
(2901, '2023-03-01 00:18:15', '2023-03-18 00:18:15', 49, 'bkhitamine2000', NULL),
(2902, '2023-03-01 00:18:15', '2023-03-18 00:18:15', 49, 'bkhitamine2000', NULL),
(2904, NULL, NULL, 27, 'ettamriilyasse1997', NULL),
(2908, '2023-03-07 09:17:43', '2023-03-08 09:17:43', 4, 'Lunea Cain', NULL),
(2909, '2023-03-07 09:18:01', '2023-03-08 09:18:01', 7, 'Lunea Cain', 1),
(2910, '2023-03-07 09:18:14', '2023-03-08 09:18:14', 11, 'Lunea Cain', NULL),
(2911, '2023-03-07 10:18:14', '2023-03-08 10:18:14', 19, 'Jermaine Daugherty', NULL),
(2916, '2023-03-07 11:06:56', '2023-03-08 11:06:56', 1, 'Bkhit Amine', NULL),
(2917, '2023-03-07 11:07:12', '2023-03-08 11:07:12', 22, 'Bkhit Amine', NULL),
(2931, '2023-03-07 15:47:45', '2023-03-08 15:47:45', 26, 'Quinlan Glenn', 1),
(2932, '2023-03-07 16:13:39', '2023-03-08 16:13:39', 21, 'Jerome Jordan', 1),
(2933, '2023-03-07 16:14:58', '2023-03-08 16:14:58', 7, 'Jerome Jordan', 1),
(2938, '2023-03-07 16:25:29', '2023-03-08 16:25:29', 13, 'Adrienne Bullock', 1),
(2941, '2023-03-07 16:29:46', '2023-03-08 16:29:46', 6, 'Adrienne Bullock', 1),
(2943, '2023-03-07 16:30:26', '2023-03-08 16:30:26', 36, 'Adrienne Bullock', 1),
(2944, '2023-03-07 16:32:54', '2023-03-08 16:32:54', 48, 'Adrienne Bullock', 1),
(2947, '2023-03-07 16:36:45', '2023-03-08 16:36:45', 13, 'Adrienne Bullock', 1),
(2950, '2023-03-07 16:56:35', '2023-03-08 16:56:35', 21, 'Adrienne Bullock', 1),
(2955, '2023-03-07 18:54:29', '2023-03-08 18:54:29', 43, 'Miranda Knapp', 1),
(2956, '2023-03-07 18:54:42', '2023-03-08 18:54:42', 21, 'Miranda Knapp', NULL),
(2961, '2023-03-07 20:28:00', '2023-03-08 20:28:00', 21, 'Yuri Pitts', NULL),
(2962, '2023-03-07 20:36:44', '2023-03-08 20:36:44', 6, 'Yuri Pitts', NULL),
(2968, '2023-03-07 21:43:12', '2023-03-08 21:43:12', 48, 'George Mcdaniel', NULL),
(2969, '2023-03-07 21:44:09', '2023-03-08 21:44:09', 31, 'George Mcdaniel', NULL),
(2972, '2023-03-07 21:47:26', '2023-03-08 21:47:26', 13, 'George Mcdaniel', NULL),
(2973, '2023-03-07 21:49:39', '2023-03-08 21:49:39', 16, 'George Mcdaniel', NULL),
(2979, '2023-03-02 22:56:16', '2023-03-04 22:56:16', 21, 'Adrienne Bullock', 1),
(2980, '2023-03-01 00:38:11', '2023-03-01 00:38:11', 49, 'Aiko Dennis', 1),
(2983, '2023-03-08 09:59:28', '2023-03-09 09:59:28', 106, 'Caesar Blair', NULL),
(2984, '2023-03-08 10:02:36', '2023-03-09 10:02:36', 107, 'Caesar Blair', NULL),
(2985, '2023-03-08 10:05:10', '2023-03-09 10:05:10', 104, 'Caesar Blair', NULL),
(2986, '2023-03-08 10:06:36', '2023-03-09 10:06:36', 105, 'Caesar Blair', NULL),
(2987, '2023-03-08 10:06:45', '2023-03-09 10:06:45', 48, 'Caesar Blair', NULL),
(2989, '2023-03-08 10:11:19', '2023-03-09 10:11:19', 49, 'Caesar Blair', NULL),
(2990, '2023-03-08 10:12:01', '2023-03-09 10:12:01', 37, 'Caesar Blair', 1),
(2991, '2023-03-08 10:12:09', '2023-03-09 10:12:09', 42, 'Caesar Blair', 1),
(2994, '2023-03-08 14:21:15', '2023-03-09 14:21:15', 32, 'Bruno Gilbert', NULL),
(2996, '2023-03-08 14:26:34', '2023-03-09 14:26:34', 44, 'Clarke Foster', NULL),
(2998, '2023-03-09 09:13:29', '2023-03-10 09:13:29', 104, 'Lucian Heath', NULL),
(3000, '2023-03-24 11:34:49', '2023-03-01 11:34:49', 49, 'alilousaad1975', 1),
(3001, '2023-02-15 11:38:33', '2023-03-01 11:38:33', 35, 'Yoko Reid', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD PRIMARY KEY (`Borrowing_Code`),
  ADD UNIQUE KEY `Reservation_Code` (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Code`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Nickname`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_Code`),
  ADD KEY `Item_Code` (`Item_Code`),
  ADD KEY `Nickname` (`Nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowings`
--
ALTER TABLE `borrowings`
  MODIFY `Borrowing_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_Code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowings`
--
ALTER TABLE `borrowings`
  ADD CONSTRAINT `borrowings_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowings_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowings_ibfk_3` FOREIGN KEY (`Reservation_Code`) REFERENCES `reservation` (`Reservation_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`Item_Code`) REFERENCES `item` (`Item_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`Nickname`) REFERENCES `members` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
