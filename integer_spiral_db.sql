-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Ara 2021, 02:01:54
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `integer_spiral_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `spiral`
--

CREATE TABLE `spiral` (
  `id` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `spiral`
--

INSERT INTO `spiral` (`id`, `x`, `y`, `result`) VALUES
(5, 5, 5, '[[0,1,2,3,4],[15,16,17,18,5],[14,23,24,19,6],[13,22,21,20,7],[12,11,10,9,8]]'),
(6, 5, 6, '[[0,1,2,3,4],[17,18,19,20,5],[16,27,28,21,6],[15,26,29,22,7],[14,25,24,23,8],[13,12,11,10,9]]');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `spiral`
--
ALTER TABLE `spiral`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `spiral`
--
ALTER TABLE `spiral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
