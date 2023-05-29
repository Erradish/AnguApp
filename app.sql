-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2023 alle 10:19
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `message`
--

CREATE TABLE `message` (
  `Id` int(11) NOT NULL,
  `Sender` varchar(20) NOT NULL,
  `Recipient` varchar(20) NOT NULL,
  `Text` varchar(256) NOT NULL,
  `TimeSent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `message`
--

INSERT INTO `message` (`Id`, `Sender`, `Recipient`, `Text`, `TimeSent`) VALUES
(56, 'Erradish', 'asdasdsadasd', 'Ciao', '2023-05-26 10:07:19'),
(57, 'asdasdsadasd', 'Erradish', 'Ao', '2023-05-26 10:07:27'),
(58, 'Erradish', 'asdasdsadasd', 'Ciao BROther', '2023-05-26 10:11:43'),
(59, 'Erradish', 'asdasdsadasd', 'Ao', '2023-05-26 10:12:58'),
(60, 'asdasdsadasd', 'Erradish', 'CIAOOOOO', '2023-05-26 10:13:13'),
(61, 'Erradish', 'asdasdsadasd', 'SI', '2023-05-26 10:16:06'),
(62, 'Erradish', 'asdasdsadasd', 'No', '2023-05-26 10:16:18'),
(63, 'asdasdsadasd', 'Erradish', 'asdasd', '2023-05-26 10:16:34'),
(64, 'asdasdsadasd', 'Erradish', 'asdadf', '2023-05-26 10:16:42'),
(65, 'Erradish', 'asdasdsadasd', 'sad', '2023-05-26 10:54:26'),
(66, 'asdasdsadasd', 'Erradish', 'asdasd', '2023-05-27 14:02:39'),
(67, 'asdasdsadasd', 'Erradish', 'fdf', '2023-05-27 14:02:42'),
(68, 'asdasdsadasd', 'Erradish', 'dfgdfg', '2023-05-27 14:02:47'),
(69, 'asdasdsadasd', 'Erradish', 'fdg', '2023-05-27 14:02:49'),
(70, 'asdasdsadasd', 'Erradish', 'CIAO', '2023-05-27 14:14:30'),
(71, 'Erradish', 'asdasdsadasd', 'Ao', '2023-05-27 14:34:30'),
(73, 'Erradish', 'ao', 'Ciao', '2023-05-27 15:14:19'),
(77, 'Erradish', 'ao', 'Bene', '2023-05-27 15:19:13');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `Mail` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Img` varchar(256) NOT NULL,
  `Codice` varchar(256) NOT NULL,
  `Verificato` tinyint(1) NOT NULL,
  `Token` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`Mail`, `UserName`, `Password`, `Number`, `Img`, `Codice`, `Verificato`, `Token`) VALUES
('radi07.gabbo07@gmail.com', 'asdasdsadasd', '$2y$10$kxFVCGt.XrEeDLNkBdzOwedpvD7vd5FFqvOjJyssf.DE1fQ9L2y4m', '17881781', 'https://www.psicosocial.it/wp-content/uploads/2020/10/immagine-fissa-si-muove.jpg', '358399', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2ODUzNDU0NDUsImp0aSI6Ik9UYzBNakU0TkE9PSIsIm5iZiI6MTY4NTM0NTQ1NSwiZXhwIjoxNjg1MzQ1NDY1LCJkYXRhIjp7Im1haWwiOiJyYWRpMDcuZ2FiYm8wN0BnbWFpbC5jb20ifX0.Pfrh_EPmYkp8MrZSI01XrvL2RdV854RcdZnLi5Wx5sE'),
('radici.gbrl@gmail.com', 'Erradish', '$2y$10$/hRRL4cKPc.ZXJHkqs0SDOlbHVZIbP5/.mjIt.sgBm8S.W18lZNhu', '81', 'https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg', '260748', 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2ODUzNDU0MjYsImp0aSI6Ik16Y3dNREExTmc9PSIsIm5iZiI6MTY4NTM0NTQzNiwiZXhwIjoxNjg1MzQ1NDQ2LCJkYXRhIjp7Im1haWwiOiJyYWRpY2kuZ2JybEBnbWFpbC5jb20ifX0.EXZVYqwqNlxhxtQB4XNxLMDQc52OqP_TQaUOmKtnfZU');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Sender` (`Sender`),
  ADD KEY `Recipient` (`Recipient`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `Mail` (`Mail`),
  ADD UNIQUE KEY `Number` (`Number`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `message`
--
ALTER TABLE `message`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Sender`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
