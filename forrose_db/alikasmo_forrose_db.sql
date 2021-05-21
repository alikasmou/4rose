-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 04:45 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alikasmo_forrose_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aliciadres`
--

CREATE TABLE `tbl_aliciadres` (
  `adresid` int(11) NOT NULL,
  `aliciid` int(11) DEFAULT NULL,
  `adresturu` varchar(20) NOT NULL,
  `ulke` int(11) DEFAULT NULL,
  `sehir` int(11) DEFAULT NULL,
  `acikadres` varchar(255) NOT NULL,
  `googleadres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aliciadres`
--

UPDATE `tbl_aliciadres` SET `adresid` = 1,`aliciid` = 1,`adresturu` = 'ofis',`ulke` = 1,`sehir` = 1,`acikadres` = '979878',`googleadres` = 'wervwervwervwevervwrv' WHERE `tbl_aliciadres`.`adresid` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aliciilestisim`
--

CREATE TABLE `tbl_aliciilestisim` (
  `iletisimid` int(11) NOT NULL,
  `aliciid` int(11) DEFAULT NULL,
  `depid` int(11) DEFAULT NULL,
  `aliciadresid` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aliciilestisim`
--

UPDATE `tbl_aliciilestisim` SET `iletisimid` = 1,`aliciid` = 1,`depid` = 1,`aliciadresid` = 1,`email` = 'fdverfvser',`cep` = 'vwervwerv',`tel` = 'ervwerv',`fax` = 'wervwervw' WHERE `tbl_aliciilestisim`.`iletisimid` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aliciler`
--

CREATE TABLE `tbl_aliciler` (
  `aliciid` int(11) NOT NULL,
  `alicifirmaadi` varchar(100) NOT NULL,
  `alicikodu` varchar(10) NOT NULL,
  `alicivd` int(11) DEFAULT NULL,
  `alicivdno` varchar(10) NOT NULL,
  `alicitesciltarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aliciler`
--

UPDATE `tbl_aliciler` SET `aliciid` = 1,`alicifirmaadi` = 'rfbvserverv',`alicikodu` = 'efrvwer',`alicivd` = 2,`alicivdno` = '234234233',`alicitesciltarihi` = '2017-06-08 10:14:38' WHERE `tbl_aliciler`.`aliciid` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `depid` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `aciklama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

UPDATE `tbl_department` SET `depid` = 1,`dep_name` = 'Accounting',`aciklama` = '' WHERE `tbl_department`.`depid` = 1;
UPDATE `tbl_department` SET `depid` = 2,`dep_name` = 'Managment',`aciklama` = '' WHERE `tbl_department`.`depid` = 2;
UPDATE `tbl_department` SET `depid` = 3,`dep_name` = 'Ceo',`aciklama` = '' WHERE `tbl_department`.`depid` = 3;
UPDATE `tbl_department` SET `depid` = 4,`dep_name` = 'Sales',`aciklama` = '' WHERE `tbl_department`.`depid` = 4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doviz`
--

CREATE TABLE `tbl_doviz` (
  `doviz_id` int(11) NOT NULL,
  `doviz` varchar(25) NOT NULL,
  `aciklama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doviz`
--

UPDATE `tbl_doviz` SET `doviz_id` = 1,`doviz` = 'USD',`aciklama` = 'United state dollars' WHERE `tbl_doviz`.`doviz_id` = 1;
UPDATE `tbl_doviz` SET `doviz_id` = 2,`doviz` = 'TRY',`aciklama` = 'Turkish Lira' WHERE `tbl_doviz`.`doviz_id` = 2;
UPDATE `tbl_doviz` SET `doviz_id` = 3,`doviz` = 'SAR',`aciklama` = 'Riyal saudi arabia' WHERE `tbl_doviz`.`doviz_id` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `katid` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kategori`
--

UPDATE `tbl_kategori` SET `katid` = 1,`kategori` = 'Silver' WHERE `tbl_kategori`.`katid` = 1;
UPDATE `tbl_kategori` SET `katid` = 2,`kategori` = 'Gold' WHERE `tbl_kategori`.`katid` = 2;
UPDATE `tbl_kategori` SET `katid` = 3,`kategori` = 'Accessories' WHERE `tbl_kategori`.`katid` = 3;
UPDATE `tbl_kategori` SET `katid` = 4,`kategori` = 'Leather' WHERE `tbl_kategori`.`katid` = 4;
UPDATE `tbl_kategori` SET `katid` = 5,`kategori` = 'Platinum' WHERE `tbl_kategori`.`katid` = 5;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kullanicilar`
--

CREATE TABLE `tbl_kullanicilar` (
  `k_id` int(20) NOT NULL,
  `k_resim` varchar(255) DEFAULT NULL,
  `k_ad` varchar(20) NOT NULL,
  `k_soyad` varchar(20) NOT NULL,
  `k_kullaniciAdi` varchar(20) NOT NULL,
  `k_kullaniciSifre` varchar(100) NOT NULL,
  `k_dtarihi` date NOT NULL,
  `k_cepTelefon` varchar(20) NOT NULL,
  `k_email` varchar(50) NOT NULL,
  `kullaniciDurum_id` int(11) NOT NULL DEFAULT '0',
  `kullaniciTipi_id` int(11) NOT NULL DEFAULT '2',
  `k_tescilTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kullanicilar`
--

UPDATE `tbl_kullanicilar` SET `k_id` = 1,`k_resim` = '',`k_ad` = 'Ali',`k_soyad` = 'Kasmou',`k_kullaniciAdi` = 'admin',`k_kullaniciSifre` = '25f9e794323b453885f5181f1b624d0b',`k_dtarihi` = '1993-10-09',`k_cepTelefon` = '05051037605',`k_email` = 'alikasmou@icloud.com',`kullaniciDurum_id` = 1,`kullaniciTipi_id` = 1,`k_tescilTarihi` = '2017-05-17 10:17:00' WHERE `tbl_kullanicilar`.`k_id` = 1;
UPDATE `tbl_kullanicilar` SET `k_id` = 2,`k_resim` = NULL,`k_ad` = 'yousef',`k_soyad` = 'kasmou',`k_kullaniciAdi` = 'yousef',`k_kullaniciSifre` = '123456',`k_dtarihi` = '2017-05-17',`k_cepTelefon` = '5051037605',`k_email` = 'yousef@gmail.com',`kullaniciDurum_id` = 0,`kullaniciTipi_id` = 2,`k_tescilTarihi` = '2017-05-16 14:48:39' WHERE `tbl_kullanicilar`.`k_id` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kullanicilardurumu`
--

CREATE TABLE `tbl_kullanicilardurumu` (
  `kullaniciDurum_id` int(20) NOT NULL,
  `kullaniciDurumu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kullanicilardurumu`
--

UPDATE `tbl_kullanicilardurumu` SET `kullaniciDurum_id` = 1,`kullaniciDurumu` = 'active' WHERE `tbl_kullanicilardurumu`.`kullaniciDurum_id` = 1;
UPDATE `tbl_kullanicilardurumu` SET `kullaniciDurum_id` = 2,`kullaniciDurumu` = 'blocked' WHERE `tbl_kullanicilardurumu`.`kullaniciDurum_id` = 2;
UPDATE `tbl_kullanicilardurumu` SET `kullaniciDurum_id` = 0,`kullaniciDurumu` = 'passive' WHERE `tbl_kullanicilardurumu`.`kullaniciDurum_id` = 0;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kullanicilartipi`
--

CREATE TABLE `tbl_kullanicilartipi` (
  `tip_id` int(20) NOT NULL,
  `kullanici_tipi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kullanicilartipi`
--

UPDATE `tbl_kullanicilartipi` SET `tip_id` = 1,`kullanici_tipi` = 'admin' WHERE `tbl_kullanicilartipi`.`tip_id` = 1;
UPDATE `tbl_kullanicilartipi` SET `tip_id` = 2,`kullanici_tipi` = 'user' WHERE `tbl_kullanicilartipi`.`tip_id` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_odemedurmu`
--

CREATE TABLE `tbl_odemedurmu` (
  `odemedurumuid` int(11) NOT NULL,
  `odemedurum` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_odemedurmu`
--

UPDATE `tbl_odemedurmu` SET `odemedurumuid` = 1,`odemedurum` = 'Paid' WHERE `tbl_odemedurmu`.`odemedurumuid` = 1;
UPDATE `tbl_odemedurmu` SET `odemedurumuid` = 2,`odemedurum` = 'unpaid' WHERE `tbl_odemedurmu`.`odemedurumuid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_odemeler`
--

CREATE TABLE `tbl_odemeler` (
  `odemeid` int(11) NOT NULL,
  `odemeTarihi` date NOT NULL,
  `saticiid` int(11) NOT NULL,
  `borc` double NOT NULL,
  `odemeDekont` varchar(255) NOT NULL,
  `odemeYapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_odemeplanlari`
--

CREATE TABLE `tbl_odemeplanlari` (
  `odemePlani_id` int(11) NOT NULL,
  `odemePlani` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_odemeplanlari`
--

UPDATE `tbl_odemeplanlari` SET `odemePlani_id` = 4,`odemePlani` = 'Cash ' WHERE `tbl_odemeplanlari`.`odemePlani_id` = 4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_odemeyapan`
--

CREATE TABLE `tbl_odemeyapan` (
  `odemeYapanid` int(11) NOT NULL,
  `firmaAdi` varchar(50) NOT NULL,
  `kisaisim` varchar(7) NOT NULL,
  `ulke` int(11) NOT NULL,
  `sehir` int(11) NOT NULL,
  `acikAdres` varchar(255) NOT NULL,
  `cepTelefon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_odemeyapan`
--

UPDATE `tbl_odemeyapan` SET `odemeYapanid` = 1,`firmaAdi` = 'Emir Tekstill ltd sti',`kisaisim` = 'emirtek',`ulke` = 1,`sehir` = 1,`acikAdres` = 'sair nigar mah sk no 34 k 2 D 7 ',`cepTelefon` = '5051037605' WHERE `tbl_odemeyapan`.`odemeYapanid` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saticiadres`
--

CREATE TABLE `tbl_saticiadres` (
  `satAdresid` int(11) NOT NULL,
  `adres_saticiid` int(11) NOT NULL,
  `adres_turu` varchar(20) NOT NULL,
  `ulke` int(11) NOT NULL,
  `sehir` int(11) NOT NULL,
  `acikAdres` varchar(255) NOT NULL,
  `googleAdres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saticiadres`
--

UPDATE `tbl_saticiadres` SET `satAdresid` = 2,`adres_saticiid` = 1,`adres_turu` = 'Ofis',`ulke` = 1,`sehir` = 1,`acikAdres` = 'izzetpasa sk no 14 ayhan is merkezi ',`googleAdres` = 'https://www.google.com.tr/maps/place/Sisli+Hamidiye+Pediatric+Education+and+Research+Hospital/@41.0536213,28.9819731,15z/data=!4m5!3m4!1s0x0:0x3b5b43efdd6ddcc1!8m2!3d41.0579403!4d28.9907688?hl=en' WHERE `tbl_saticiadres`.`satAdresid` = 2;
UPDATE `tbl_saticiadres` SET `satAdresid` = 3,`adres_saticiid` = 2,`adres_turu` = 'sube',`ulke` = 1,`sehir` = 1,`acikAdres` = 'merkez mah taskopruluzade sk99 D:34',`googleAdres` = 'https://www.google.com.tr/maps/place/Milpark+Konutlar%C4%B1/@41.0188114,28.6673137,15z/data=!4m5!3m4!1s0x0:0x23f9b1f68a3ea845!8m2!3d41.0126003!4d28.6721492?hl=en' WHERE `tbl_saticiadres`.`satAdresid` = 3;
UPDATE `tbl_saticiadres` SET `satAdresid` = 4,`adres_saticiid` = 2,`adres_turu` = 'merkez',`ulke` = 2,`sehir` = 2,`acikAdres` = 'Talatpaşa Mahallesi, Fatih Sultan Mehmet Caddesi No:85, 34518 ',`googleAdres` = 'https://www.google.com.tr/maps/place/Sevgi+%C4%B0%C3%A7+Giyim/@41.0188114,28.6673137,15z/data=!4m5!3m4!1s0x0:0x975d5de7bc84edc0!8m2!3d41.0213531!4d28.674413?hl=en' WHERE `tbl_saticiadres`.`satAdresid` = 4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saticiiletisim`
--

CREATE TABLE `tbl_saticiiletisim` (
  `iletisimid` int(11) NOT NULL,
  `ilet_saticiid` int(11) NOT NULL,
  `adSoyad` varchar(55) NOT NULL,
  `depid` int(11) DEFAULT NULL,
  `for_adres_id` int(11) NOT NULL,
  `saticiemail` varchar(100) NOT NULL,
  `saticicepTelefon` varchar(15) NOT NULL,
  `saticifax` varchar(15) NOT NULL,
  `saticitel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saticiiletisim`
--

UPDATE `tbl_saticiiletisim` SET `iletisimid` = 2,`ilet_saticiid` = 1,`adSoyad` = '',`depid` = 1,`for_adres_id` = 2,`saticiemail` = 'com@gmail.com',`saticicepTelefon` = '05051037605',`saticifax` = '02128407070',`saticitel` = '02123439090' WHERE `tbl_saticiiletisim`.`iletisimid` = 2;
UPDATE `tbl_saticiiletisim` SET `iletisimid` = 3,`ilet_saticiid` = 2,`adSoyad` = '',`depid` = 2,`for_adres_id` = 3,`saticiemail` = 'tur@tur.com',`saticicepTelefon` = '3456235',`saticifax` = '34523451',`saticitel` = '14513414' WHERE `tbl_saticiiletisim`.`iletisimid` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saticilar`
--

CREATE TABLE `tbl_saticilar` (
  `saticiid` int(11) NOT NULL,
  `saticiFirmaAdi` varchar(255) NOT NULL,
  `saticikodu` varchar(20) NOT NULL,
  `saticiVergiDairesi` int(11) NOT NULL,
  `saticiVergiNo` varchar(20) NOT NULL,
  `saticitescilTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_saticilar`
--

UPDATE `tbl_saticilar` SET `saticiid` = 1,`saticiFirmaAdi` = 'Company for accessories',`saticikodu` = 'accss-1',`saticiVergiDairesi` = 1,`saticiVergiNo` = '5051230890',`saticitescilTarihi` = '2017-05-22 09:41:32' WHERE `tbl_saticilar`.`saticiid` = 1;
UPDATE `tbl_saticilar` SET `saticiid` = 2,`saticiFirmaAdi` = 'Turkuaz Gulay ',`saticikodu` = '',`saticiVergiDairesi` = 2,`saticiVergiNo` = '5093092701',`saticitescilTarihi` = '2017-05-28 11:58:58' WHERE `tbl_saticilar`.`saticiid` = 2;
UPDATE `tbl_saticilar` SET `saticiid` = 3,`saticiFirmaAdi` = 'alikasmou',`saticikodu` = 'ali_145',`saticiVergiDairesi` = 1,`saticiVergiNo` = '245234523452',`saticitescilTarihi` = '2017-05-30 13:48:28' WHERE `tbl_saticilar`.`saticiid` = 3;
UPDATE `tbl_saticilar` SET `saticiid` = 4,`saticiFirmaAdi` = 'alikasmou',`saticikodu` = 'ali_308',`saticiVergiDairesi` = 1,`saticiVergiNo` = '245234523452',`saticitescilTarihi` = '2017-05-30 13:58:55' WHERE `tbl_saticilar`.`saticiid` = 4;
UPDATE `tbl_saticilar` SET `saticiid` = 5,`saticiFirmaAdi` = 'test2',`saticikodu` = 'tes_677',`saticiVergiDairesi` = 3,`saticiVergiNo` = '345234234r243',`saticitescilTarihi` = '2017-05-30 14:20:44' WHERE `tbl_saticilar`.`saticiid` = 5;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sehir`
--

CREATE TABLE `tbl_sehir` (
  `sehirid` int(11) NOT NULL,
  `ulke` int(11) NOT NULL,
  `sehir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sehir`
--

UPDATE `tbl_sehir` SET `sehirid` = 1,`ulke` = 1,`sehir` = 'ISTANBUL' WHERE `tbl_sehir`.`sehirid` = 1;
UPDATE `tbl_sehir` SET `sehirid` = 2,`ulke` = 2,`sehir` = 'JEDDAH' WHERE `tbl_sehir`.`sehirid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siparisdetay`
--

CREATE TABLE `tbl_siparisdetay` (
  `siparisDetayid` int(11) NOT NULL,
  `siparisid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_siparisdetay`
--

UPDATE `tbl_siparisdetay` SET `siparisDetayid` = 1,`siparisid` = 1,`itemid` = 10,`miktar` = 85,`unit_id` = 1 WHERE `tbl_siparisdetay`.`siparisDetayid` = 1;
UPDATE `tbl_siparisdetay` SET `siparisDetayid` = 2,`siparisid` = 1,`itemid` = 1,`miktar` = 50,`unit_id` = 1 WHERE `tbl_siparisdetay`.`siparisDetayid` = 2;
UPDATE `tbl_siparisdetay` SET `siparisDetayid` = 3,`siparisid` = 1,`itemid` = 7,`miktar` = 100,`unit_id` = 1 WHERE `tbl_siparisdetay`.`siparisDetayid` = 3;
UPDATE `tbl_siparisdetay` SET `siparisDetayid` = 4,`siparisid` = 1,`itemid` = 8,`miktar` = 30,`unit_id` = 1 WHERE `tbl_siparisdetay`.`siparisDetayid` = 4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siparisdurumu`
--

CREATE TABLE `tbl_siparisdurumu` (
  `siparisdurumid` int(11) NOT NULL,
  `siparisDurumu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_siparisdurumu`
--

UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 6,`siparisDurumu` = 'Cancelled ' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 6;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 2,`siparisDurumu` = 'Delivered in Istanbul' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 2;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 5,`siparisDurumu` = 'Done' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 5;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 1,`siparisDurumu` = 'Getting ready' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 1;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 4,`siparisDurumu` = 'in the way to saudiarabia' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 4;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 7,`siparisDurumu` = 'waiting or not confermed' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 7;
UPDATE `tbl_siparisdurumu` SET `siparisdurumid` = 3,`siparisDurumu` = 'Waiting to export' WHERE `tbl_siparisdurumu`.`siparisdurumid` = 3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siparislerimiz`
--

CREATE TABLE `tbl_siparislerimiz` (
  `siparisid` int(11) NOT NULL,
  `siparisKodu` varchar(15) NOT NULL,
  `siparisTarihi` date DEFAULT NULL,
  `teslimTarihi` date NOT NULL,
  `siparis_durumu` int(11) NOT NULL,
  `saticiid` int(11) NOT NULL,
  `iletisimid` int(11) NOT NULL,
  `sat_adresid` int(11) NOT NULL,
  `aliciid` int(11) DEFAULT NULL,
  `aliciadres` int(11) DEFAULT NULL,
  `aliciiletisim` int(11) DEFAULT NULL,
  `tutar` double NOT NULL,
  `ihracatMaliyeti` double(10,2) NOT NULL,
  `vergi` double NOT NULL,
  `Toplam` double NOT NULL,
  `doviz_id` int(11) NOT NULL,
  `odemePlaniid` int(11) NOT NULL,
  `odemeDurumu` int(11) NOT NULL,
  `odemeYapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_siparislerimiz`
--

UPDATE `tbl_siparislerimiz` SET `siparisid` = 1,`siparisKodu` = 'ali123',`siparisTarihi` = '2017-06-20',`teslimTarihi` = '2017-06-25',`siparis_durumu` = 1,`saticiid` = 1,`iletisimid` = 2,`sat_adresid` = 4,`aliciid` = 1,`aliciadres` = 1,`aliciiletisim` = 1,`tutar` = 1250,`ihracatMaliyeti` = 2000.50,`vergi` = 50,`Toplam` = 0,`doviz_id` = 2,`odemePlaniid` = 4,`odemeDurumu` = 1,`odemeYapan` = 1 WHERE `tbl_siparislerimiz`.`siparisid` = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ulke`
--

CREATE TABLE `tbl_ulke` (
  `ulkeid` int(11) NOT NULL,
  `ulke` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ulke`
--

UPDATE `tbl_ulke` SET `ulkeid` = 1,`ulke` = 'TURKEY' WHERE `tbl_ulke`.`ulkeid` = 1;
UPDATE `tbl_ulke` SET `ulkeid` = 2,`ulke` = 'SAUDI ARABIA' WHERE `tbl_ulke`.`ulkeid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `unitid` int(11) NOT NULL,
  `unit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_unit`
--

UPDATE `tbl_unit` SET `unitid` = 1,`unit` = 'Piece' WHERE `tbl_unit`.`unitid` = 1;
UPDATE `tbl_unit` SET `unitid` = 2,`unit` = 'Gram' WHERE `tbl_unit`.`unitid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uruncolor`
--

CREATE TABLE `tbl_uruncolor` (
  `colorid` int(11) NOT NULL,
  `colorKodu` varchar(50) COLLATE utf8_bin NOT NULL,
  `urunid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_urundurumu`
--

CREATE TABLE `tbl_urundurumu` (
  `durumid` int(11) NOT NULL,
  `urunDurumu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_urundurumu`
--

UPDATE `tbl_urundurumu` SET `durumid` = 1,`urunDurumu` = 'Active' WHERE `tbl_urundurumu`.`durumid` = 1;
UPDATE `tbl_urundurumu` SET `durumid` = 2,`urunDurumu` = 'Sold out' WHERE `tbl_urundurumu`.`durumid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_urunler`
--

CREATE TABLE `tbl_urunler` (
  `urunid` int(20) NOT NULL,
  `urunkodu` varchar(50) NOT NULL,
  `urunresim` varchar(255) DEFAULT NULL,
  `urunkat` int(11) NOT NULL,
  `uruntipi` int(10) NOT NULL,
  `urunfiyat` decimal(13,2) NOT NULL,
  `menseid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `saticiid` int(11) NOT NULL,
  `urunDurumu` int(11) NOT NULL,
  `tesciltarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_urunler`
--

UPDATE `tbl_urunler` SET `urunid` = 1,`urunkodu` = '1_1_dfg',`urunresim` = 'M21.jpg',`urunkat` = 2,`uruntipi` = 2,`urunfiyat` = '22.00',`menseid` = 2,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:51:34' WHERE `tbl_urunler`.`urunid` = 1;
UPDATE `tbl_urunler` SET `urunid` = 2,`urunkodu` = 'wffrfw',`urunresim` = 'M22.jpg',`urunkat` = 2,`uruntipi` = 2,`urunfiyat` = '23.00',`menseid` = 2,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:52:00' WHERE `tbl_urunler`.`urunid` = 2;
UPDATE `tbl_urunler` SET `urunid` = 3,`urunkodu` = 'dsfsbdb',`urunresim` = 'M23.jpg',`urunkat` = 4,`uruntipi` = 1,`urunfiyat` = '35.00',`menseid` = 1,`userid` = 2,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-27 20:01:31' WHERE `tbl_urunler`.`urunid` = 3;
UPDATE `tbl_urunler` SET `urunid` = 4,`urunkodu` = 'qwefr',`urunresim` = 'M24.jpg',`urunkat` = 2,`uruntipi` = 2,`urunfiyat` = '34.00',`menseid` = 2,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-27 20:02:46' WHERE `tbl_urunler`.`urunid` = 4;
UPDATE `tbl_urunler` SET `urunid` = 5,`urunkodu` = 'wqefq',`urunresim` = 'M25.jpg',`urunkat` = 2,`uruntipi` = 2,`urunfiyat` = '45.60',`menseid` = 2,`userid` = 2,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:52:15' WHERE `tbl_urunler`.`urunid` = 5;
UPDATE `tbl_urunler` SET `urunid` = 7,`urunkodu` = '1_1_672',`urunresim` = 'M26.jpg',`urunkat` = 1,`uruntipi` = 2,`urunfiyat` = '12.30',`menseid` = 1,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:52:21' WHERE `tbl_urunler`.`urunid` = 7;
UPDATE `tbl_urunler` SET `urunid` = 8,`urunkodu` = '1_1_791',`urunresim` = 'M27.jpg',`urunkat` = 1,`uruntipi` = 2,`urunfiyat` = '24.00',`menseid` = 1,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:52:26' WHERE `tbl_urunler`.`urunid` = 8;
UPDATE `tbl_urunler` SET `urunid` = 9,`urunkodu` = '2_1_913',`urunresim` = 'M28.jpg',`urunkat` = 2,`uruntipi` = 2,`urunfiyat` = '24.80',`menseid` = 1,`userid` = 1,`saticiid` = 1,`urunDurumu` = 1,`tesciltarihi` = '2017-05-26 14:52:31' WHERE `tbl_urunler`.`urunid` = 9;
UPDATE `tbl_urunler` SET `urunid` = 10,`urunkodu` = '1_1_223',`urunresim` = '1_1_223.jpg',`urunkat` = 1,`uruntipi` = 4,`urunfiyat` = '23.30',`menseid` = 1,`userid` = 1,`saticiid` = 1,`urunDurumu` = 2,`tesciltarihi` = '2017-05-26 14:54:32' WHERE `tbl_urunler`.`urunid` = 10;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_urunmense`
--

CREATE TABLE `tbl_urunmense` (
  `menseid` int(11) NOT NULL,
  `mense` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_urunmense`
--

UPDATE `tbl_urunmense` SET `menseid` = 1,`mense` = 'TURKEY' WHERE `tbl_urunmense`.`menseid` = 1;
UPDATE `tbl_urunmense` SET `menseid` = 2,`mense` = 'CHINA' WHERE `tbl_urunmense`.`menseid` = 2;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uruntipi`
--

CREATE TABLE `tbl_uruntipi` (
  `tipid` int(10) NOT NULL,
  `urunTipi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_uruntipi`
--

UPDATE `tbl_uruntipi` SET `tipid` = 1,`urunTipi` = 'Necklaces' WHERE `tbl_uruntipi`.`tipid` = 1;
UPDATE `tbl_uruntipi` SET `tipid` = 2,`urunTipi` = 'Bracelets' WHERE `tbl_uruntipi`.`tipid` = 2;
UPDATE `tbl_uruntipi` SET `tipid` = 3,`urunTipi` = 'Earrings' WHERE `tbl_uruntipi`.`tipid` = 3;
UPDATE `tbl_uruntipi` SET `tipid` = 4,`urunTipi` = 'Rings' WHERE `tbl_uruntipi`.`tipid` = 4;
UPDATE `tbl_uruntipi` SET `tipid` = 5,`urunTipi` = 'Ankle-bangle' WHERE `tbl_uruntipi`.`tipid` = 5;
UPDATE `tbl_uruntipi` SET `tipid` = 6,`urunTipi` = 'Sunglasses' WHERE `tbl_uruntipi`.`tipid` = 6;
UPDATE `tbl_uruntipi` SET `tipid` = 7,`urunTipi` = 'Watches' WHERE `tbl_uruntipi`.`tipid` = 7;
UPDATE `tbl_uruntipi` SET `tipid` = 8,`urunTipi` = 'Nail Stones' WHERE `tbl_uruntipi`.`tipid` = 8;
UPDATE `tbl_uruntipi` SET `tipid` = 9,`urunTipi` = 'Hot fix Stones' WHERE `tbl_uruntipi`.`tipid` = 9;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vergidairesi`
--

CREATE TABLE `tbl_vergidairesi` (
  `vergiDairesiid` int(11) NOT NULL,
  `vergiDairesi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vergidairesi`
--

UPDATE `tbl_vergidairesi` SET `vergiDairesiid` = 1,`vergiDairesi` = 'Şişli' WHERE `tbl_vergidairesi`.`vergiDairesiid` = 1;
UPDATE `tbl_vergidairesi` SET `vergiDairesiid` = 2,`vergiDairesi` = 'Fatih' WHERE `tbl_vergidairesi`.`vergiDairesiid` = 2;
UPDATE `tbl_vergidairesi` SET `vergiDairesiid` = 3,`vergiDairesi` = 'Kağıthane' WHERE `tbl_vergidairesi`.`vergiDairesiid` = 3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aliciadres`
--
ALTER TABLE `tbl_aliciadres`
  ADD PRIMARY KEY (`adresid`),
  ADD KEY `aliciidfk` (`aliciid`),
  ADD KEY `sehir` (`sehir`),
  ADD KEY `ulkefk2` (`ulke`);

--
-- Indexes for table `tbl_aliciilestisim`
--
ALTER TABLE `tbl_aliciilestisim`
  ADD PRIMARY KEY (`iletisimid`),
  ADD KEY `aliciidfk3` (`aliciid`),
  ADD KEY `depfkilet` (`depid`),
  ADD KEY `aliciadresfk` (`aliciadresid`);

--
-- Indexes for table `tbl_aliciler`
--
ALTER TABLE `tbl_aliciler`
  ADD PRIMARY KEY (`aliciid`),
  ADD KEY `vergidairesifk` (`alicivd`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`depid`);

--
-- Indexes for table `tbl_doviz`
--
ALTER TABLE `tbl_doviz`
  ADD PRIMARY KEY (`doviz_id`),
  ADD UNIQUE KEY `doviz` (`doviz`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indexes for table `tbl_kullanicilar`
--
ALTER TABLE `tbl_kullanicilar`
  ADD PRIMARY KEY (`k_id`),
  ADD UNIQUE KEY `k_kullaniciAdi` (`k_kullaniciAdi`),
  ADD KEY `kullaniciDurumu_fk` (`kullaniciDurum_id`),
  ADD KEY `kullanicitipi_fk` (`kullaniciTipi_id`);

--
-- Indexes for table `tbl_kullanicilardurumu`
--
ALTER TABLE `tbl_kullanicilardurumu`
  ADD PRIMARY KEY (`kullaniciDurum_id`),
  ADD UNIQUE KEY `kullaniciDurumu` (`kullaniciDurumu`);

--
-- Indexes for table `tbl_kullanicilartipi`
--
ALTER TABLE `tbl_kullanicilartipi`
  ADD PRIMARY KEY (`tip_id`),
  ADD UNIQUE KEY `kullanici_tipi` (`kullanici_tipi`);

--
-- Indexes for table `tbl_odemedurmu`
--
ALTER TABLE `tbl_odemedurmu`
  ADD PRIMARY KEY (`odemedurumuid`);

--
-- Indexes for table `tbl_odemeler`
--
ALTER TABLE `tbl_odemeler`
  ADD PRIMARY KEY (`odemeid`),
  ADD KEY `odemeyapanfk` (`odemeYapan`),
  ADD KEY `saticiborcfk` (`saticiid`);

--
-- Indexes for table `tbl_odemeplanlari`
--
ALTER TABLE `tbl_odemeplanlari`
  ADD PRIMARY KEY (`odemePlani_id`);

--
-- Indexes for table `tbl_odemeyapan`
--
ALTER TABLE `tbl_odemeyapan`
  ADD PRIMARY KEY (`odemeYapanid`),
  ADD KEY `sehirfk` (`sehir`),
  ADD KEY `ulkefk` (`ulke`);

--
-- Indexes for table `tbl_saticiadres`
--
ALTER TABLE `tbl_saticiadres`
  ADD PRIMARY KEY (`satAdresid`),
  ADD KEY `saticilerad` (`adres_saticiid`),
  ADD KEY `ulkeiletisimfk` (`ulke`),
  ADD KEY `Sehiriletisimfk` (`sehir`);

--
-- Indexes for table `tbl_saticiiletisim`
--
ALTER TABLE `tbl_saticiiletisim`
  ADD PRIMARY KEY (`iletisimid`),
  ADD KEY `saticiiletfk` (`ilet_saticiid`),
  ADD KEY `iletadresfk` (`for_adres_id`),
  ADD KEY `depfk` (`depid`);

--
-- Indexes for table `tbl_saticilar`
--
ALTER TABLE `tbl_saticilar`
  ADD PRIMARY KEY (`saticiid`),
  ADD KEY `saticiVergiDairesi` (`saticiVergiDairesi`);

--
-- Indexes for table `tbl_sehir`
--
ALTER TABLE `tbl_sehir`
  ADD PRIMARY KEY (`sehirid`),
  ADD KEY `ulke` (`ulke`);

--
-- Indexes for table `tbl_siparisdetay`
--
ALTER TABLE `tbl_siparisdetay`
  ADD PRIMARY KEY (`siparisDetayid`),
  ADD UNIQUE KEY `siparisDetayid` (`siparisDetayid`),
  ADD KEY `siparislerimizFk` (`siparisid`),
  ADD KEY `siparisUrunleriFk` (`itemid`),
  ADD KEY `unitfk` (`unit_id`);

--
-- Indexes for table `tbl_siparisdurumu`
--
ALTER TABLE `tbl_siparisdurumu`
  ADD PRIMARY KEY (`siparisdurumid`),
  ADD UNIQUE KEY `siparisDurumu` (`siparisDurumu`);

--
-- Indexes for table `tbl_siparislerimiz`
--
ALTER TABLE `tbl_siparislerimiz`
  ADD PRIMARY KEY (`siparisid`),
  ADD KEY `saticiSiparisFk` (`saticiid`),
  ADD KEY `odemeplanlariFK` (`odemePlaniid`),
  ADD KEY `saticiiletisimFK` (`iletisimid`),
  ADD KEY `saticiAdresFK` (`sat_adresid`),
  ADD KEY `dovizfk` (`doviz_id`),
  ADD KEY `odemeDurumufk` (`odemeDurumu`),
  ADD KEY `odemeyapanforeginkey` (`odemeYapan`),
  ADD KEY `siparisDurumufk` (`siparis_durumu`),
  ADD KEY `aliciidfk4` (`aliciid`),
  ADD KEY `aliciiletisim` (`aliciiletisim`),
  ADD KEY `aliciadresfk23` (`aliciadres`);

--
-- Indexes for table `tbl_ulke`
--
ALTER TABLE `tbl_ulke`
  ADD PRIMARY KEY (`ulkeid`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `tbl_uruncolor`
--
ALTER TABLE `tbl_uruncolor`
  ADD PRIMARY KEY (`colorid`);

--
-- Indexes for table `tbl_urundurumu`
--
ALTER TABLE `tbl_urundurumu`
  ADD PRIMARY KEY (`durumid`);

--
-- Indexes for table `tbl_urunler`
--
ALTER TABLE `tbl_urunler`
  ADD PRIMARY KEY (`urunid`),
  ADD KEY `urunlerTipiFk` (`uruntipi`),
  ADD KEY `urunKategorilerifk` (`urunkat`),
  ADD KEY `urunuEklenenKullanici` (`userid`),
  ADD KEY `urunlerMense` (`menseid`),
  ADD KEY `saticiid` (`saticiid`),
  ADD KEY `urunDurumufk` (`urunDurumu`);

--
-- Indexes for table `tbl_urunmense`
--
ALTER TABLE `tbl_urunmense`
  ADD PRIMARY KEY (`menseid`);

--
-- Indexes for table `tbl_uruntipi`
--
ALTER TABLE `tbl_uruntipi`
  ADD PRIMARY KEY (`tipid`);

--
-- Indexes for table `tbl_vergidairesi`
--
ALTER TABLE `tbl_vergidairesi`
  ADD PRIMARY KEY (`vergiDairesiid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aliciadres`
--
ALTER TABLE `tbl_aliciadres`
  MODIFY `adresid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_aliciilestisim`
--
ALTER TABLE `tbl_aliciilestisim`
  MODIFY `iletisimid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_aliciler`
--
ALTER TABLE `tbl_aliciler`
  MODIFY `aliciid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_doviz`
--
ALTER TABLE `tbl_doviz`
  MODIFY `doviz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `katid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_kullanicilar`
--
ALTER TABLE `tbl_kullanicilar`
  MODIFY `k_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kullanicilartipi`
--
ALTER TABLE `tbl_kullanicilartipi`
  MODIFY `tip_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_odemedurmu`
--
ALTER TABLE `tbl_odemedurmu`
  MODIFY `odemedurumuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_odemeler`
--
ALTER TABLE `tbl_odemeler`
  MODIFY `odemeid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_odemeplanlari`
--
ALTER TABLE `tbl_odemeplanlari`
  MODIFY `odemePlani_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_odemeyapan`
--
ALTER TABLE `tbl_odemeyapan`
  MODIFY `odemeYapanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_saticiadres`
--
ALTER TABLE `tbl_saticiadres`
  MODIFY `satAdresid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_saticiiletisim`
--
ALTER TABLE `tbl_saticiiletisim`
  MODIFY `iletisimid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_saticilar`
--
ALTER TABLE `tbl_saticilar`
  MODIFY `saticiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_sehir`
--
ALTER TABLE `tbl_sehir`
  MODIFY `sehirid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_siparisdetay`
--
ALTER TABLE `tbl_siparisdetay`
  MODIFY `siparisDetayid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_siparisdurumu`
--
ALTER TABLE `tbl_siparisdurumu`
  MODIFY `siparisdurumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_siparislerimiz`
--
ALTER TABLE `tbl_siparislerimiz`
  MODIFY `siparisid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ulke`
--
ALTER TABLE `tbl_ulke`
  MODIFY `ulkeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unitid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_uruncolor`
--
ALTER TABLE `tbl_uruncolor`
  MODIFY `colorid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_urundurumu`
--
ALTER TABLE `tbl_urundurumu`
  MODIFY `durumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_urunler`
--
ALTER TABLE `tbl_urunler`
  MODIFY `urunid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_urunmense`
--
ALTER TABLE `tbl_urunmense`
  MODIFY `menseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_uruntipi`
--
ALTER TABLE `tbl_uruntipi`
  MODIFY `tipid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_vergidairesi`
--
ALTER TABLE `tbl_vergidairesi`
  MODIFY `vergiDairesiid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_aliciadres`
--
ALTER TABLE `tbl_aliciadres`
  ADD CONSTRAINT `aliciidfk` FOREIGN KEY (`aliciid`) REFERENCES `tbl_aliciler` (`aliciid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sehir` FOREIGN KEY (`sehir`) REFERENCES `tbl_sehir` (`sehirid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ulkefk2` FOREIGN KEY (`ulke`) REFERENCES `tbl_ulke` (`ulkeid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_aliciilestisim`
--
ALTER TABLE `tbl_aliciilestisim`
  ADD CONSTRAINT `aliciadresfk` FOREIGN KEY (`aliciadresid`) REFERENCES `tbl_aliciadres` (`adresid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `aliciidfk3` FOREIGN KEY (`aliciid`) REFERENCES `tbl_aliciler` (`aliciid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `depfkilet` FOREIGN KEY (`depid`) REFERENCES `tbl_department` (`depid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_aliciler`
--
ALTER TABLE `tbl_aliciler`
  ADD CONSTRAINT `vergidairesifk` FOREIGN KEY (`alicivd`) REFERENCES `tbl_vergidairesi` (`vergiDairesiid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kullanicilar`
--
ALTER TABLE `tbl_kullanicilar`
  ADD CONSTRAINT `kullaniciDurumu_fk` FOREIGN KEY (`kullaniciDurum_id`) REFERENCES `tbl_kullanicilardurumu` (`kullaniciDurum_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kullanicitipi_fk` FOREIGN KEY (`kullaniciTipi_id`) REFERENCES `tbl_kullanicilartipi` (`tip_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_odemeler`
--
ALTER TABLE `tbl_odemeler`
  ADD CONSTRAINT `odemeyapanfk` FOREIGN KEY (`odemeYapan`) REFERENCES `tbl_odemeyapan` (`odemeYapanid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticiborcfk` FOREIGN KEY (`saticiid`) REFERENCES `tbl_saticilar` (`saticiid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_odemeyapan`
--
ALTER TABLE `tbl_odemeyapan`
  ADD CONSTRAINT `sehirfk` FOREIGN KEY (`sehir`) REFERENCES `tbl_sehir` (`sehirid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulkefk` FOREIGN KEY (`ulke`) REFERENCES `tbl_ulke` (`ulkeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_saticiadres`
--
ALTER TABLE `tbl_saticiadres`
  ADD CONSTRAINT `Sehiriletisimfk` FOREIGN KEY (`sehir`) REFERENCES `tbl_sehir` (`sehirid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticilerad` FOREIGN KEY (`adres_saticiid`) REFERENCES `tbl_saticilar` (`saticiid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulkeiletisimfk` FOREIGN KEY (`ulke`) REFERENCES `tbl_ulke` (`ulkeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_saticiiletisim`
--
ALTER TABLE `tbl_saticiiletisim`
  ADD CONSTRAINT `depfk` FOREIGN KEY (`depid`) REFERENCES `tbl_department` (`depid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `iletadresfk` FOREIGN KEY (`for_adres_id`) REFERENCES `tbl_saticiadres` (`satAdresid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticiiletfk` FOREIGN KEY (`ilet_saticiid`) REFERENCES `tbl_saticilar` (`saticiid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_saticilar`
--
ALTER TABLE `tbl_saticilar`
  ADD CONSTRAINT `vergiFk` FOREIGN KEY (`saticiVergiDairesi`) REFERENCES `tbl_vergidairesi` (`vergiDairesiid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sehir`
--
ALTER TABLE `tbl_sehir`
  ADD CONSTRAINT `ulke` FOREIGN KEY (`ulke`) REFERENCES `tbl_ulke` (`ulkeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siparisdetay`
--
ALTER TABLE `tbl_siparisdetay`
  ADD CONSTRAINT `siparisUrunleriFk` FOREIGN KEY (`itemid`) REFERENCES `tbl_urunler` (`urunid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparislerimizFk` FOREIGN KEY (`siparisid`) REFERENCES `tbl_siparislerimiz` (`siparisid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unitfk` FOREIGN KEY (`unit_id`) REFERENCES `tbl_unit` (`unitid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siparislerimiz`
--
ALTER TABLE `tbl_siparislerimiz`
  ADD CONSTRAINT `aliciadresfk23` FOREIGN KEY (`aliciadres`) REFERENCES `tbl_aliciadres` (`adresid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `aliciidfk4` FOREIGN KEY (`aliciid`) REFERENCES `tbl_aliciler` (`aliciid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `aliciiletisim` FOREIGN KEY (`aliciiletisim`) REFERENCES `tbl_aliciilestisim` (`iletisimid`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `dovizfk` FOREIGN KEY (`doviz_id`) REFERENCES `tbl_doviz` (`doviz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odemeDurumufk` FOREIGN KEY (`odemeDurumu`) REFERENCES `tbl_odemedurmu` (`odemedurumuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odemeplanlariFK` FOREIGN KEY (`odemePlaniid`) REFERENCES `tbl_odemeplanlari` (`odemePlani_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odemeyapanforeginkey` FOREIGN KEY (`odemeYapan`) REFERENCES `tbl_odemeyapan` (`odemeYapanid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticiAdresFK` FOREIGN KEY (`sat_adresid`) REFERENCES `tbl_saticiadres` (`satAdresid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticiSiparisFk` FOREIGN KEY (`saticiid`) REFERENCES `tbl_saticilar` (`saticiid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `saticiiletisimFK` FOREIGN KEY (`iletisimid`) REFERENCES `tbl_saticiiletisim` (`iletisimid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparisDurumufk` FOREIGN KEY (`siparis_durumu`) REFERENCES `tbl_siparisdurumu` (`siparisdurumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_urunler`
--
ALTER TABLE `tbl_urunler`
  ADD CONSTRAINT `saticilerimizfk` FOREIGN KEY (`saticiid`) REFERENCES `tbl_saticilar` (`saticiid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `urunDurumufk` FOREIGN KEY (`urunDurumu`) REFERENCES `tbl_urundurumu` (`durumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `urunKategorilerifk` FOREIGN KEY (`urunkat`) REFERENCES `tbl_kategori` (`katid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `urunlerMense` FOREIGN KEY (`menseid`) REFERENCES `tbl_urunmense` (`menseid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `urunlerTipiFk` FOREIGN KEY (`uruntipi`) REFERENCES `tbl_uruntipi` (`tipid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `urunuEklenenKullanici` FOREIGN KEY (`userid`) REFERENCES `tbl_kullanicilar` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
