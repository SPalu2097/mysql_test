-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Märts 12, 2026 kell 10:52 EL
-- Serveri versioon: 10.4.32-MariaDB
-- PHP versioon: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `cr`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `fuel` enum('bensiin','diisel','elekter','gaas') NOT NULL,
  `price` int(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `cars`
--

INSERT INTO `cars` (`id`, `mark`, `model`, `engine`, `fuel`, `price`, `image`) VALUES
(1, 'Audi', 'Q8', 'V8', 'elekter', 150, 'audiq8.jpg'),
(2, 'Lincoln', 'Town Car', 'V6', 'elekter', 850, '/massa/id/lobortis/convallis.html'),
(3, 'Cadillac', 'Escalade EXT', 'V12', 'diisel', 112, '/quis.jsp'),
(4, 'Audi', 'A3', 'V12', 'gaas', 415, '/in/hac/habitasse/platea/dictumst/etiam.xml'),
(5, 'Ford', 'Escape', 'V12', 'gaas', 587, '/sagittis/sapien/cum/sociis.jsp'),
(6, 'Mercedes-Benz', 'CL-Class', 'V12', 'diisel', 144, '/quam.xml'),
(7, 'Ford', 'E-Series', 'V12', 'gaas', 545, '/a/libero.json'),
(8, 'Chevrolet', 'Malibu', 'V8', 'gaas', 325, '/auctor/gravida/sem/praesent.json'),
(9, 'Buick', 'Riviera', 'V8', 'gaas', 692, '/sit/amet/sapien/dignissim/vestibulum/vestibulum.jpg'),
(10, 'Lexus', 'ES', 'V8', 'diisel', 544, '/vitae/nisl/aenean/lectus/pellentesque/eget/nunc.jsp'),
(11, 'Ford', 'Taurus', 'V12', 'diisel', 620, '/cursus/urna/ut/tellus.aspx'),
(12, 'Acura', 'TL', 'V12', 'bensiin', 558, '/quam/nec/dui/luctus/rutrum/nulla/tellus.jpg'),
(13, 'Pontiac', 'Grand Prix', 'V6', 'gaas', 972, '/orci/luctus/et/ultrices/posuere.aspx'),
(14, 'Ford', 'Festiva', 'V12', 'bensiin', 539, '/odio.json'),
(15, 'Chevrolet', 'Cobalt', 'V12', 'diisel', 623, '/nec/nisi.js'),
(16, 'Chevrolet', 'Metro', 'V12', 'bensiin', 388, '/pulvinar/lobortis/est/phasellus/sit/amet.jsp'),
(17, 'Porsche', 'Cayenne', 'V6', 'diisel', 647, '/vivamus.html'),
(18, 'Mazda', 'MX-6', 'V8', 'elekter', 734, '/volutpat/in/congue/etiam/justo/etiam/pretium.json'),
(19, 'GMC', 'Rally Wagon 2500', 'V6', 'diisel', 737, '/parturient/montes/nascetur/ridiculus.js'),
(20, 'Chrysler', 'LHS', 'V8', 'diisel', 606, '/venenatis/tristique/fusce/congue.js'),
(21, 'Mazda', 'Tribute', 'V12', 'elekter', 638, '/volutpat.xml'),
(22, 'Audi', '4000s', 'V8', 'gaas', 649, '/vestibulum/sit/amet/cursus/id/turpis.png'),
(23, 'Subaru', 'Alcyone SVX', 'V12', 'diisel', 439, '/aenean/lectus/pellentesque/eget/nunc.xml'),
(24, 'Honda', 'CR-V', 'V6', 'gaas', 570, '/quam/pharetra/magna/ac/consequat/metus/sapien.jsp'),
(25, 'BMW', 'M6', 'V12', 'gaas', 585, '/interdum.png'),
(26, 'Mazda', 'MX-6', 'V8', 'diisel', 895, '/sit/amet/consectetuer/adipiscing/elit/proin/risus.jpg'),
(27, 'Volkswagen', 'R32', 'V12', 'gaas', 435, '/et/ultrices/posuere.aspx'),
(28, 'Volkswagen', 'Corrado', 'V12', 'gaas', 629, '/eu/est/congue/elementum/in/hac/habitasse.aspx'),
(29, 'Lincoln', 'Continental Mark VII', 'V8', 'bensiin', 959, '/diam/in/magna.aspx'),
(30, 'Subaru', 'Legacy', 'V12', 'gaas', 600, '/turpis/integer/aliquet/massa.jpg'),
(31, 'Mercedes-Benz', 'W126', 'V12', 'diisel', 423, '/posuere/cubilia/curae/mauris/viverra.xml'),
(32, 'Pontiac', '1000', 'V12', 'gaas', 763, '/risus/dapibus.jsp'),
(33, 'Toyota', 'Tundra', 'V6', 'gaas', 418, '/nisl/nunc/nisl/duis/bibendum.png'),
(34, 'GMC', 'Suburban 2500', 'V6', 'gaas', 878, '/est/quam/pharetra/magna/ac.aspx'),
(35, 'Ford', 'Mustang', 'V6', 'bensiin', 348, '/odio/elementum.aspx'),
(36, 'Nissan', 'Armada', 'V6', 'diisel', 907, '/justo/morbi/ut/odio/cras.js'),
(37, 'Volvo', 'XC70', 'V8', 'gaas', 413, '/est/risus.aspx'),
(38, 'Pontiac', 'Grand Prix', 'V12', 'diisel', 125, '/blandit/non/interdum.json'),
(39, 'Kia', 'Sorento', 'V8', 'bensiin', 818, '/vivamus/metus/arcu.js'),
(40, 'Mazda', 'B-Series Plus', 'V8', 'diisel', 496, '/vulputate/justo/in/blandit.png'),
(41, 'Toyota', '4Runner', 'V8', 'gaas', 769, '/nulla/ultrices/aliquet/maecenas/leo/odio.jpg');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
