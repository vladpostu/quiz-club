-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mar 16, 2022 alle 11:33
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz-club`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `scores`
--

CREATE TABLE `scores` (
  `id_score` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `scores`
--

INSERT INTO `scores` (`id_score`, `score`, `id_user`) VALUES
(127, 0, 7),
(128, 2, 7),
(129, 0, 7),
(130, 1, 8),
(131, 5, 7),
(132, 0, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(7, 'vlad', '$2y$10$yZ8XyHXOaBfBX/x8A5MugevMSh3ZfLt4Z9JhLqrIdztX1fo2Ug6bO'),
(8, 'postu', '$2y$10$sBHiJGiYDcitYWgSq6FNS.7s6wk70may/DAie.hMmQc/Lu18V2FKe'),
(9, 'ao', '$2y$10$2/pZaokQy6Uj/lwLD7BhMuPeTdDAepDTuc6N6HryF1qu0zf3t0n7q'),
(10, 'davide', '$2y$10$617zXbj/AKtoZCnKxgja8.5m6sLsUmo7QheoVJiLOryJ30Cojqpke'),
(11, 'ciao', '$2y$10$x.FqTvIQ4Iy5WR8AX0fhGeg8i/ctC0thY4S.Dtlspb4NGNQR0nb6O');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id_score`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `scores`
--
ALTER TABLE `scores`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
