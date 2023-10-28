-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 03:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homedeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rent_sell` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `halfrooms` varchar(255) NOT NULL,
  `propertycondition` varchar(255) NOT NULL,
  `comfort` varchar(255) NOT NULL,
  `furnished` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `wc` varchar(255) NOT NULL,
  `airconditioner` varchar(255) NOT NULL,
  `animal` varchar(255) NOT NULL,
  `smoking` varchar(255) NOT NULL,
  `barrier_free` varchar(255) NOT NULL,
  `moved` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `maxLevel` varchar(255) NOT NULL,
  `elevator` varchar(255) NOT NULL,
  `rentalPeriod` varchar(255) NOT NULL,
  `overhead` varchar(255) NOT NULL,
  `heating` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cellar` varchar(255) NOT NULL,
  `plotArea` varchar(255) NOT NULL,
  `insulation` varchar(255) NOT NULL,
  `water` varchar(255) NOT NULL,
  `gas` varchar(255) NOT NULL,
  `canal` varchar(255) NOT NULL,
  `electricity` varchar(255) NOT NULL,
  `coverage` varchar(255) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `user_id`, `rent_sell`, `type`, `city`, `street`, `housenumber`, `area`, `rooms`, `halfrooms`, `propertycondition`, `comfort`, `furnished`, `height`, `wc`, `airconditioner`, `animal`, `smoking`, `barrier_free`, `moved`, `level`, `maxLevel`, `elevator`, `rentalPeriod`, `overhead`, `heating`, `price`, `description`, `cellar`, `plotArea`, `insulation`, `water`, `gas`, `canal`, `electricity`, `coverage`, `verify`, `date`) VALUES
(209, 35, 'Kiadó', 'Lakás', 'Belgrád', 'utcanev', '18', '56', '2', '1', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Külön helyiségben', 'Van', 'Igen', 'Megengedett', 'Igen', 'Azonnal', '3', '4', 'Van', '12', '70', 'Gáz', '400', 'asdasdasdasdasdasd asdasdasejwigjkgjsflsfk aokpasoasdasdasdasdasdasd asdasdasejwigjkgjsflsfk aokpasoasdasdasdasdasdasd asdasdasejwigjkgjsflsfkaokpas oasdasdasdasdasdasd asdasdasejwigjkgjsflsfkaokpaso', '', '', '', '', '', '', '', '', 1, '2024-03-14'),
(210, 35, 'Eladó', 'Ház', 'Újvidék', 'utcanev', '54', '90', '2', '1', 'Új építésű', 'Luxus', 'Igen', '3 méter vagy magasabb', 'Külön helyiségben', 'Van', '', '', 'Igen', '', '', '1', '', '', '100', 'Házközponti', '80000', 'aksdaskdoaiofjiuheqbweqwekjqwej qiw jeqoweopqwefpqweopkqwkjqwkop aksdaskdoaiofjiuheqbweqwekjqwej qiw jeqoweopqwefpqweopkqwkjqwkop asdasdasd', 'Van', '498', 'Van', '', '', '', '', '', 1, '2024-03-14'),
(211, 35, 'Eladó', 'Lakás', 'Újvidék', 'utcanev', '14', '70', '3', '1', 'Új építésű', 'Luxus', 'Igen', '3 méter vagy magasabb', 'Külön helyiségben', 'Van', '', '', 'Nem', '', '1', '5', 'Van', '', '70', 'Gáz', '350', 'kjasoidashdiuhqwjdwidjqiw jdiqwodijqwdhiuhdojasdaksopdjasdkjoiawjoladisjod aoiwpdkjiaosjdoiuahwud asd asdwudoqwd9öqwiidqo', '', '', 'Van', '', '', '', '', '', 1, '2024-03-14'),
(212, 35, 'Kiadó', 'Lakás', 'Belgrád', 'utcanev', '1', '85', '3', '', 'Újszerű', 'Luxus', 'Igen', '3 méter vagy magasabb', 'Külön helyiségben', 'Van', 'Nem', 'Nem megengedett', 'Igen', '1 hónapon belül', '4', '4', 'Van', '3', '60', 'Gáz', '410', 'ajshfoajsfiojasifjoajwuiofpjaiwoip fjaowjfpojwaipféalowéfkwhfoaéwfnialwjfil jawoifjialwjfhuiwhfzuwhfewhufwehuifewuifhuwehfwhueifhiwehifhe hasd asdasdasdasdasdasdasdas', '', '', '', '', '', '', '', '', 1, '2024-03-14'),
(213, 35, 'Kiadó', 'Lakás', 'Pristina', 'utcanev', '51', '70', '3', '', 'Új építésű', 'Összkomfortos', 'Igen', '3 méter vagy magasabb', 'Egy helyiségben', 'Van', 'Igen', 'Nem megengedett', 'Igen', 'Azonnal', '1', '7', 'Van', '3', '65', 'Gáz', '380', 'akjdasdojawiodkaiwojdoa nwodkjaiosdjauwgdhiaowéjdn jawlhduialhjsdmaélsfmkglnrieoéfékakrwfefewfwe fdwjodiqjwiod asjdioajsidj qwijdasd jqiwdj ioqwjdiqlwhdoi', '', '', '', '', '', '', '', '', 1, '2024-03-14'),
(214, 35, 'Kiadó', 'Ház', 'Belgrád', 'utcanev', '22', '100', '2', '1', 'Felújított', 'Összkomfortos', 'Igen', '3 méter vagy magasabb', 'Külön helyiségben', 'Van', 'Igen', 'Nem megengedett', 'Nem', '2 hónapon belül', '', '1', '', '6', '70', 'Gáz', '450', 'iqwjeqowkokw kqwokdkalsnfkghljgkjfgsfnjglsj sdfjsldkjfsdj fjfas asda djasjdlajsdoaijs', 'Nincs', '388', '', '', '', '', '', '', 1, '2024-03-14'),
(215, 35, 'Kiadó', 'Ház', 'Nis', 'utcanev', '18', '120', '4', '1', 'Felújított', 'Összkomfortos', 'Igen', '3 méter vagy magasabb', 'Külön helyiségben', 'Van', 'Igen', 'Megengedett', 'Igen', 'Azonnal', '', '1', '', '12', '80', 'Gáz', '380', 'kajsdioqwoidjjioqw diqmwldkasnjkdaskndiwqdj ajésldjkasjdklajsdkl asd asdowqioudoqwpof', 'Nincs', '400', '', '', '', '', '', '', 1, '2024-03-14'),
(216, 35, 'Kiadó', 'Telek', 'Belgrád', 'utcanev', '68', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '190', 'aijsdioajsoidj iaojsdqwhquihfewueriroiroirighi diowqdoiqhwuiaijsdioajsoidj iaojsdqwhquihfewueriroiroirighi diowqdoiqhwuiaijsdioajsoidj iaojsdqwhquihfewueriroiroirighi diowqdoiqhwui', '', '1402', '', 'Utcában', 'Telken belül', 'Utcában', 'Telken belül', '30', 1, '2024-03-14'),
(217, 36, 'Kiadó', 'Lakás', 'Szabadka', 'utcanev', '55', '70', '1', '2', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Egy helyiségben', 'Van', 'Nem', 'Nem megengedett', 'Igen', 'Azonnal', '2', '6', 'Van', '12', '75', 'Gáz', '320', 'qiowejkédlamsodkkasd aklsjdhewouifwheuflweékfmklj éjdslfjsduihfuhdsfhsdjflsld sdf iofewoifj iwoejfoiéqjwnflqjwfljjlfsdkjfkldjslfjésodfjoaj aqwaijdi ajsdioaljskdj ahguzihhjkk', '', '', '', '', '', '', '', '', 3, '2024-03-14'),
(218, 36, 'Kiadó', 'Lakás', 'Belgrád', 'utcanev', '2', '33', '1', '', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Egy helyiségben', 'Van', 'Nem', 'Nem megengedett', 'Igen', 'Azonnal', '1', '5', 'Van', '6', '50', 'Gáz', '470', 'joiasjdjasodjoasj djaoisjpdoqwodpqwiodjoijaskopédjlkas lkdjaklsjldkkasdopasjdoéaskpodaisodéja kshdkjashkjdhakjshdjkah sjdhkjasdhajs kjdahshdahsoudha shdlhasldhlah ao oisdojaisjojpjiojiohui', '', '', '', '', '', '', '', '', 3, '2024-03-14'),
(219, 36, 'Eladó', 'Lakás', 'Szabadka', 'utcanev', '87', '57', '1', '2', 'Felújított', 'Komfortos', 'Nem', '3 méternél alacsonyabb', 'Egy helyiségben', 'Van', '', '', 'Igen', '', '2', '4', 'Van', '', '60', 'Gáz', '230', 'odkqwodjkasjd jasjkdhkjash dkjalskjd lajslkdjolajwoidéa jslkdj alsjd owqdqjdoi josdioajsdjaisodhoiasod as idjwqo odaoisdoiasod oiasoidoiwqdoha sjodwqiodoiashoid asj daiwuoidoaisdoia hsoidhoah oud shoaihsdoihaiwohdoaishdh aiosgzughikj', '', '', 'Van', '', '', '', '', '', 3, '2024-03-14'),
(220, 36, 'Eladó', 'Ház', 'Újvidék', 'utcanev', '28', '172', '5', '', 'Új építésű', 'Összkomfortos', 'Igen', '3 méternél alacsonyabb', 'Külön helyiségben', 'Van', '', '', 'Igen', '', '', '1', '', '', '70', 'Gáz', '192000', 'asjdioajsiodjasj diojaoisdhqwdhuial suidljwqoédjoqéw djioasjduiohwqduilj aisudhjwqiodjuoiqwhduoqwgzdu iahszuidwqohduoiwédj oéjwdjoqjwpidoqjwoidj hqoiwdhqwio hdpiqdpiqwpjqpwijdpiq wijqiojwqioj qwdjiqojwdjqo', 'Van', '674', 'Van', '', '', '', '', '', 3, '2024-03-14'),
(221, 36, 'Eladó', 'Lakás', 'Kragujevac', 'utcanev', '42', '47', '1', '1', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Külön helyiségben', 'Van', '', '', 'Igen', '', '4', '4', 'Van', '', '50', 'Gáz', '55000', 'skdljfsdjkfs jédpofjoiésdjfiouqwhuoifu jopsdj ifposdjpfojsdpofkjposdkfposdjifosjdhofgew67ifg wzeg6ifuweiew9öpfjp osdjfoiéwejofis hdizufhgwuefgu', '', '', 'Van', '', '', '', '', '', 3, '2024-03-14'),
(222, 36, 'Eladó', 'Telek', 'Belgrád', 'utcanev', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '58000', 'oppogdjfoigjsdiuioj fiweh uifha souildhuialhwuioaoisj dioaj soidj wq jdoas jodopkaposjdaojsido ahw8qh67widz hiaushdui ', '', '807', '', 'Telken belül', 'Telken belül', 'Nincs', 'Telken belül', '45', 3, '2024-03-14'),
(223, 36, 'Eladó', 'Lakás', 'Újvidék', 'utcanev', '12', '78', '3', '', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Külön helyiségben', 'Van', '', '', 'Igen', '', '2', '6', 'Van', '', '65', 'Gáz', '380', 'qjweiuqwdkijasndk askjdnaksjdiaéjwoidjuiahuidhdhashdhasdhi ahusdh uashd hiuash dhashduihwqidoiai sdhoiuashiduoahosidhas hdui has', '', '', 'Van', '', '', '', '', '', 3, '2024-03-14'),
(224, 36, 'Eladó', 'Telek', 'Belgrád', 'utcanev', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '70000', 'pojojioédkkoiqwéd qjwiohqwdoqw jlkjqwljdqwlqopésdjpweoifjoweifiu hdqiuwhduizqwhdiuqwd joquwi dnuioqlhdoiwqhdoiuq whudiqwoidjqoidjio', '', '1154', '', 'Telken belül', 'Telken belül', 'Telken belül', 'Telken belül', '60', 3, '2024-03-14'),
(225, 36, 'Kiadó', 'Lakás', 'Belgrád', 'utcanev', '51', '71', '2', '1', 'Új építésű', 'Luxus', 'Igen', '3 méternél alacsonyabb', 'Külön helyiségben', 'Van', 'Igen', 'Megengedett', 'Igen', 'Azonnal', '2', '4', 'Van', '6', '55', 'Gáz', '400', 'kjoiajfsoiajfpjas fjoaijoifuqwhoifoqiwjfqwpfjqwjf aos pfjaspo fjpokqpiqjuiofuihqwg f7qwf haoshdoasduasdasduas9du a98usdas u8duas dasdasd', '', '', '', '', '', '', '', '', 3, '2024-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `verify` int(11) NOT NULL DEFAULT 0,
  `new_email` varchar(255) NOT NULL,
  `passwordToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `phone`, `password`, `token`, `level`, `verify`, `new_email`, `passwordToken`) VALUES
(35, 'zoli@gmail.com', 'Zoltán', 'Nagy', '0641234578', '$2y$10$f8YxkISOLjaBArRslq3hDeePy95tsgTZGbzngVZlqRCTeAVDCxOmC', '', 1, 1, '', ''),
(36, 'adam@gmail.com', 'Ádám', 'Csabai', '063885791', '$2y$10$f8YxkISOLjaBArRslq3hDeePy95tsgTZGbzngVZlqRCTeAVDCxOmC', '', 5, 1, '', ''),
(38, 'admin@gmail.com', 'Admin', 'Admin', '0645589125', '$2y$10$WjIsi52.mOhsA654sjqdbeUMsEMmU4/uqwd58bcpMUGJVojiQT1OW', '', 2, 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
