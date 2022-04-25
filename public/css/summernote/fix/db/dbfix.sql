-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 03:13 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` varchar(255) NOT NULL,
  `user_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7d7d25b7676f3f1b095fff7f5034a6a6', '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '1480257264', 'a:3:{s:9:"user_data";s:0:"";s:8:"LoggedIn";b:1;s:5:"email";s:13:"demo@demo.com";}');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `id` int(4) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `vat` varchar(30) NOT NULL,
  `cf` varchar(30) NOT NULL,
  `data` date NOT NULL,
  `commenti` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `telefono`, `indirizzo`, `citta`, `email`, `vat`, `cf`, `data`, `commenti`) VALUES
(1, 'John', 'Doe', '0000000000', 'Borsellino Street 95', 'London', 'email@provider.com', 'VAT', 'NIN', '2015-07-28', 'This is one comment'),
(2, 'Mario', 'Rossi', '0000000000', 'Via delle fragole 30', 'Catania', 'email@provder.it', 'P.IVA', 'C.F', '2015-07-28', 'Qui eventuali commenti');

-- --------------------------------------------------------

--
-- Table structure for table `impostazioni`
--

CREATE TABLE `impostazioni` (
  `id` int(4) NOT NULL,
  `titolo` text NOT NULL,
  `lingua` text NOT NULL,
  `showcredit` int(11) NOT NULL,
  `disclaimer` varchar(370) NOT NULL,
  `skebby_user` text NOT NULL,
  `skebby_pass` text NOT NULL,
  `skebby_name` text NOT NULL,
  `skebby_method` text NOT NULL,
  `admin_user` varchar(40) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `valuta` text NOT NULL,
  `indirizzo` varchar(40) NOT NULL,
  `invoice_mail` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `vat` varchar(100) NOT NULL,
  `invoice_type` text NOT NULL,
  `tax` decimal(30,0) NOT NULL,
  `invoice_name` text NOT NULL,
  `categorie` varchar(500) NOT NULL,
  `twilio_mode` varchar(20) NOT NULL,
  `twilio_account_sid` varchar(90) NOT NULL,
  `twilio_auth_token` varchar(90) NOT NULL,
  `twilio_number` varchar(20) NOT NULL,
  `prefix_number` int(5) NOT NULL,
  `usesms` int(2) NOT NULL,
  `r_apertura` varchar(200) NOT NULL,
  `r_chiusura` varchar(200) NOT NULL,
  `colore1` text NOT NULL,
  `colore2` text NOT NULL,
  `colore3` text NOT NULL,
  `colore4` text NOT NULL,
  `colore5` text NOT NULL,
  `colore_prim` varchar(24) NOT NULL,
  `logo` varchar(24) NOT NULL,
  `campi_personalizzati` varchar(500) NOT NULL,
  `stampadue` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `impostazioni`
--

INSERT INTO `impostazioni` (`id`, `titolo`, `lingua`, `showcredit`, `disclaimer`, `skebby_user`, `skebby_pass`, `skebby_name`, `skebby_method`, `admin_user`, `admin_password`, `valuta`, `indirizzo`, `invoice_mail`, `telefono`, `vat`, `invoice_type`, `tax`, `invoice_name`, `categorie`, `twilio_mode`, `twilio_account_sid`, `twilio_auth_token`, `twilio_number`, `prefix_number`, `usesms`, `r_apertura`, `r_chiusura`, `colore1`, `colore2`, `colore3`, `colore4`, `colore5`, `colore_prim`, `logo`, `campi_personalizzati`, `stampadue`) VALUES
(1, 'YourBusinessName', 'english', 0, 'Insert here your disclaimer. (Visible on invoice footer)', '', '', '', '', 'demo@demo.com', 'demo', 'Euro', 'Your complete address', 'yourbusiness@mail.com', '(39)0000000000', '##00000000000', 'EU', '7', 'Nome Cognome', 'Computer\r\nSmartphone', 'prod', '', '', '', 39, 2, 'Hello %customer%, your order/repair for %model% was opened by %businessname%. Check the state of repair on %fixbookurl%.\nStatus code: (%statuscode%)', 'Hello %customer%, your order/repair fo %model% has been completed, come to %businessname% for take it. Thanks for choosing us.', '#3dc45b', '#f27705', '#a8a8a8', '#d61a1a', '#2b2b2b', '#0d6c94', 'default', 'YToyOntpOjA7czo0OiJJTUVJIjtpOjE7czo2OiJDdXN0b20iO30=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oggetti`
--

CREATE TABLE `oggetti` (
  `ID` int(255) NOT NULL,
  `Nominativo` varchar(255) NOT NULL,
  `ID_Nominativo` int(11) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `sms` int(1) NOT NULL DEFAULT '0',
  `Tipo` int(1) NOT NULL,
  `Guasto` text NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Modello` varchar(255) NOT NULL,
  `Pezzo` varchar(255) DEFAULT NULL,
  `Anticipo` int(11) NOT NULL,
  `Prezzo` int(255) NOT NULL,
  `dataApertura` datetime NOT NULL,
  `dataChiusura` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '3',
  `Commenti` varchar(500) NOT NULL,
  `codice` varchar(20) NOT NULL,
  `custom_field` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oggetti`
--

INSERT INTO `oggetti` (`ID`, `Nominativo`, `ID_Nominativo`, `Telefono`, `sms`, `Tipo`, `Guasto`, `Categoria`, `Modello`, `Pezzo`, `Anticipo`, `Prezzo`, `dataApertura`, `dataChiusura`, `status`, `Commenti`, `codice`, `custom_field`) VALUES
(1, 'John Doe', 1, '0000000000', 0, 2, 'Virus - Not start', 'Computer', 'Compaq', '', 20, 50, '2015-08-28 17:06:00', NULL, 5, 'Formatting system', 'compjohn', '{"494d4549":"IMEI Value","437573746f6d":"Custom Value"}'),
(5, 'Mario Rossi', 2, '0000000000', 0, 1, 'Glass Broken', 'Smartphone', 'Lumia 635', 'ljkljk', 10, 20, '2015-10-28 13:36:55', NULL, 1, 'Comment here', 'test', '{"494d4549":"IMEI Value","437573746f6d":"Custom Value"}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `impostazioni`
--
ALTER TABLE `impostazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oggetti`
--
ALTER TABLE `oggetti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `impostazioni`
--
ALTER TABLE `impostazioni`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `oggetti`
--
ALTER TABLE `oggetti`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
