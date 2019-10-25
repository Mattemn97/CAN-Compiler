-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 25, 2019 alle 10:29
-- Versione del server: 5.7.17
-- Versione PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mappaturecentraline`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `funzioni`
--

CREATE TABLE `funzioni` (
  `Raw_Funz` text NOT NULL,
  `Funz_ID` int(11) NOT NULL,
  `Nome_Funz` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `funzioni`
--

INSERT INTO `funzioni` (`Raw_Funz`, `Funz_ID`, `Nome_Funz`) VALUES
('<IN_tipo=\'sys\'#<nome#NOME_FUNZIONE</nome#<val#VALORE_ASSEGNATO</val#</IN#', 3, 'Input_Sistema'),
('<IN_tipo=\'phys\'#<nome#NOME_FUNZIONE</nome#<val#VALORE_ASSEGNATO</val#</IN#', 4, 'Input_Fisico'),
('<IN_tipo=\'CAN\'#<nome#NOME_FUNZIONE</nome#<val#VALORE_ASSEGNATO</val#</IN#', 5, 'Input_CAN'),
('<OUT_tipo=\'phys\'#<nome#NOME_FUNZIONE</nome#<val#VALORE_ASSEGNATO</val#</OUT#', 6, 'Output_Fisico'),
('<OUT_tipo=\'CAN\'#<nome#NOME_FUNZIONE</nome#<val#VALORE_ASSEGNATO</val#</OUT#', 7, 'Output_CAN'),
('<action_istr=\'wait\'_arg1=\'TEMPO_AWAIT\'#</action#', 13, 'Await');

-- --------------------------------------------------------

--
-- Struttura della tabella `ruc`
--

CREATE TABLE `ruc` (
  `Connettore` text NOT NULL,
  `Gruppo` text,
  `Configurazione` text,
  `Spec_Electrical` text,
  `Pin_Rux` int(11) DEFAULT NULL,
  `Funz_Veicolo` text,
  `Note` text,
  `Pull_Up_Down` text,
  `Pin_VTSystem` text,
  `Sub_System` text,
  `Num_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `funzioni`
--
ALTER TABLE `funzioni`
  ADD PRIMARY KEY (`Funz_ID`);

--
-- Indici per le tabelle `ruc`
--
ALTER TABLE `ruc`
  ADD PRIMARY KEY (`Num_ID`),
  ADD UNIQUE KEY `Num_ID` (`Num_ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `funzioni`
--
ALTER TABLE `funzioni`
  MODIFY `Funz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT per la tabella `ruc`
--
ALTER TABLE `ruc`
  MODIFY `Num_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
