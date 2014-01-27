-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 26 Ian 2014 la 06:32
-- Versiune server: 5.6.12-log
-- Versiune PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `gagauzia`
--
CREATE DATABASE IF NOT EXISTS `gagauzia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gagauzia`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(128) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Salvarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `part_number`, `title`, `price`, `url`, `img`) VALUES
(200652, 'EF 5800', 'Masina de spalat frontala EF5800 ARCTIC, SLIM, 800 RPM, 5 KG, A+, LED', '879.99', 'http://www.emag.ro/masina-de-spalat-frontala-ef5800-arctic-slim-800-rpm-5-kg-a-led-ef-5800/pd/ECQZDBBBM/', 'http://s1.emagst.ro/products/62/61027/images/1_150x150_gj2j.JPG'),
(248544, '800005', 'eBook Reader Kindle 6", Wi-Fi, Negru', '299.99', 'http://www.emag.ro/ebook-reader-kindle-6-wi-fi-negru-800005/pd/ES40KBBBM/?ref=landing_1_0', 'http://s1.emagst.ro/products/39/38018/images/res_3611d9b2adad067b773da991b3c5d71e_150x150_o6u4.jpg'),
(249088, 'md778bt/a', 'iPod shuffle 2GB, Argintiu', '199.99', 'http://www.emag.ro/ipod-shuffle-2gb-argintiu-md778bt-a/pd/E3DHKBBBM/', 'http://s1.emagst.ro/products/34/33442/images/res_9e1ecbc4e334e8b7ec866d308587b8fc_150x150_k09m.jpg'),
(266526, '980-000650', 'Boxe Logitech 2.1 Z553', '599.99', 'http://www.emag.ro/boxe-logitech-2-1-z553-980-000650/pd/E40GKBBBM/', 'http://s1.emagst.ro/products/40/39876/images/img266526_27052013104447_0_150x150_ugim.jpg'),
(278885, 'UE32F6400AWXXH', 'Televizor Smart 3D LED Samsung 32F6400, 80 cm, Full HD', '1899.99', 'http://www.emag.ro/televizor-smart-3d-led-samsung-32f6400-80-cm-full-hd-ue32f6400awxxh/pd/ENDHNBBBM/', 'http://s1.emagst.ro/products/52/51983/images/img278885_16042013155418_0_150x150_slnv.jpg'),
(286878, 'AWS 61212', 'Masina de spalat rufe SLIM 6th Sense Whirlpool AWS 61212, 1200 RPM, 6 Kg, Clasa A++, 45 cm , Alb', '1199.99', 'http://www.emag.ro/masina-de-spalat-rufe-slim-6th-sense-whirlpool-1200-rpm-6-kg-clasa-a-45-cm-alb-aws-61212/pd/E2J4NBBBM/', 'http://s1.emagst.ro/products/62/61788/images/img286878_28032013164601_0_150x150_atrq.jpg'),
(295959, 'HQ6902/16', 'Aparat de barbierit Philips HQ6902/16, 3 capete, Gri', '103.99', 'http://www.emag.ro/aparat-de-barbierit-philips-3-capete-gri-hq6902-16/pd/EYW8NBBBM/', 'http://s1.emagst.ro/products/70/69421/images/img295959_17052013151741_0_150x150_1tjb.jpg'),
(304702, 'I9195 Galaxy S4 Mini Black', 'Telefon mobil Samsung I9195 Galaxy S4 Mini, 8GB, Black', '1489.99', 'http://www.emag.ro/telefon-mobil-samsung-i9195-galaxy-s4-mini-8gb-black-i9195-galaxy-s4-mini-black/pd/DRFCXBBBM/', 'http://s1.emagst.ro/products/407/406993/images/1%20copy_150x150_bemq.jpg'),
(307691, '5009922131125', 'Tableta Vonino Otis S cu procesor Dual-Core A9 1.5GHz , 7", 8GB, Wi-Fi, Android 4.1.1 Jelly Bean, Black', '329.99', 'http://www.emag.ro/tableta-vonino-otis-s-cu-procesor-dual-core-a9-1-5ghz-7-8gb-wi-fi-android-4-1-1-jelly-bean-black-5009922131125/pd/DQGLXBBBM/', 'http://s1.emagst.ro/products/409/408387/images/res_2f91867db4611d3fad98d5bf41b711fe_150x150_hltp.jpg'),
(309815, '6901816082119', 'Geanta Laptop Rivacase 8211, 10.1", Blue', '79.49', 'http://www.emag.ro/laptop-rivacase-8211-10-1-blue-6901816082119/pd/DDJRXBBBM/', 'http://s1.emagst.ro/products/412/411810/images/res_887eb75120418a68fac208862f226a86_150x150_5anm.jpg'),
(318847, 'CH8333B006AA', 'Multifunctional Canon Pixma MG6450, A4, Negru', '499.99', 'http://www.emag.ro/multifunctional-canon-pixma-mg6450-a4-negru-ch8333b006aa/pd/D9D39BBBM/', 'http://s1.emagst.ro/products/421/420157/images/res_64120d433f0c4d8e05717feca64131c4_150x150_cuf9.jpg'),
(326161, 'LS24C350HS/EN', 'Monitor LED Samsung 24", Wide, Full HD, HDMI, Negru, S24C350HS', '799.99', 'http://www.emag.ro/monitor-led-samsung-24-wide-full-hd-hdmi-negru-s24c350hs-ls24c350hs-en/pd/D10GFBBBM/', 'http://s1.emagst.ro/products/476/475067/images/res_111bc9e80bf2f33cbc11ae2c4beb5965_150x150_p0ml.jpg');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `sitename` varchar(128) DEFAULT NULL,
  `title_rule` varchar(255) DEFAULT NULL,
  `price_rule` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `sites`
--

INSERT INTO `sites` (`id`, `url`, `sitename`, `title_rule`, `price_rule`) VALUES
(1, 'altex.ro', 'Altex', 'document.body.getElementsByTagName(''h1'')[0].innerHTML.trim();', 'document.getElementsByClassName(''money-int'')[0].innerHTML.replace(''.'', '''') + '''' + document.getElementsByClassName(''money-decimal'')[0].innerHTML.replace('','', ''.'');'),
(2, 'evomag.ro', 'evoMAG', 'document.body.getElementsByTagName(''h1'')[0].innerHTML.trim();', 'document.body.getElementsByClassName(''pret_ron'')[0].getElementsByTagName(''div'')[0].innerHTML.replace('','',''.'');'),
(3, 'pcgarage.ro', 'PC Garage', 'document.body.getElementsByTagName(''h1'')[0].innerHTML.trim();', 'document.body.getElementsByClassName(''ps-sell-price'')[0].getElementsByTagName(''span'')[1].innerHTML.replace('','',''.'').replace('' RON'', '''');');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `spider`
--

CREATE TABLE IF NOT EXISTS `spider` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(128) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_emag` int(5) NOT NULL,
  `id_site` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Salvarea datelor din tabel `spider`
--

INSERT INTO `spider` (`id`, `part_number`, `title`, `price`, `url`, `id_emag`, `id_site`) VALUES
(1, 'LEDUE32F6400', 'Televizor Smart TV LED 3D Full HD, 80 cm, SAMSUNG UE32F6400', '2199.90', '/televizor-smart-tv-led-3d-full-hd-80-cm-samsung-ue32f6400', 278885, 1),
(2, 'MSFAWS61212', 'Masina de spalat frontala WHIRLPOOL AWS 61212, 6kg,1200rpm, A++, alb', '1249.90', '/masina-de-spalat-frontala-whirlpool-aws-61212-6kg-1200rpm-a-alb', 286878, 1),
(3, 'MSFEF5800', 'Masina de spalat frontala ARCTIC EF5800, 5kg, 800rpm, A+, alb', '929.90', '/masina-de-spalat-frontala-arctic-ef5800-5kg-800rpm-a-alb', 200652, 1),
(4, 'EBKINDLEWIFI', 'eBook Reader Kindle Wi-Fi, 6.0", E Ink Display, negru ', '349.90', '/ebook-reader-kindle-wi-fi-6-0-e-ink-display-negru', 248544, 1),
(5, 'RASHQ6902/16', 'Aparat de ras PHILIPS HQ6902/16, retea, mobil, 3 capete, Sistem CloseCut, perie curatare, negru - gri', '129.90', '/aparat-de-ras-philips-hq6902-16-retea-mobil-3-capete-sistem-closecut-perie-curatare-negru-gri', 295959, 1),
(6, 'V77S1-08', 'Tableta Vonino Otis S, Procesor Dual Core A9 1.5 GHz, Display 7", 8GB Flash, WI-FI, Android (Neagra)', '390.93', '/PORTABILE-Tablete/Vonino-Tableta-Vonino-Otis-S-Procesor-Dual-Core-A9-1.5-GHz-Display-7-8GB-Flash-WI-FI-Android-Neagra-108552.html', 307691, 2),
(7, 'S24C350H', 'Monitor LED Samsung 24" S24C350H, Full HD, D-Sub, HDMI', '858.73', '/MONITOARE-Monitoare-LED/Samsung-Monitor-LED-Samsung-24-S24C350H-Full-HD-D-Sub-HDMI-105392.html', 326161, 2),
(8, 'Z553', 'Boxe Logitech Z553', '626.57', '/COMPONENTE-PC-Boxe/Logitech-Boxe-Z553-92550.html', 266526, 2),
(9, 'Galaxy S4 Mini Black', 'Telefon Mobil Samsung Galaxy S4 Mini i9195, Procesor Dual Core 1.7GHz Krait, Super amoled capacitiv touchscreen 4.3", 8GB Flash, 8MP, Wi-Fi, 4G, Android 4.2.2 Jelly Bean (Negru)', '1619.00', '/SOLUTII-MOBILE-Telefoane-mobile/Samsung-Telefon-Mobil-Samsung-Galaxy-S4-Mini-i9195-Negru-102633.html', 304702, 2),
(10, '797952', 'RivaCase Geanta netbook 10.1 inch 8211 blue', '84.99', '/genti-notebook/rivacase/geanta-netbook-101-inch-8211-blue/', 309815, 3),
(11, '737033', 'Multifunctional Canon Pixma MG6450, inkjet, color, format A4, Wi-Fi, duplex', '543.14', '/multifunctionale/canon/pixma-mg6450-inkjet-color-format-a4-wi-fi-duplex/', 318847, 3),
(12, '234607', 'MP3 Player Apple iPod shuffle generatia a 4-a 2GB silver', '249.32', '/mp3-playere/apple/ipod-shuffle-4th-gen-2gb-silver/', 249088, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
