-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 04:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bengkel`
--

CREATE TABLE `bengkel` (
  `id_bengkel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `pemilik` varchar(50) DEFAULT NULL,
  `namabengkel` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_jenis` int(11) NOT NULL DEFAULT 0,
  `alamat` varchar(50) NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `diskripsi` varchar(100) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  `chat_id` varchar(50) DEFAULT NULL,
  `status` enum('EVALUASI','AKTIF','NONAKTIF') DEFAULT 'EVALUASI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bengkel`
--

INSERT INTO `bengkel` (`id_bengkel`, `id_user`, `pemilik`, `namabengkel`, `email`, `id_jenis`, `alamat`, `telephone`, `diskripsi`, `longitude`, `latitude`, `foto`, `chat_id`, `status`) VALUES
(18, 3, 'Astra Adi Nugraha ', 'Bengkel Joyo', 'gassone124@gmail.com', 1, 'Jl. Kampus UMK No. 18 18 RT 006/11, Kayuapu Kulon,', '0802345678564', 'Bengkel Motor canggih', '110.84195788630824', '-6.808892806460215', 'Hitam_dengan_Panah_Otomotif_Logo.png', '830306491', 'AKTIF'),
(27, 20, 'hadi', 'famili motor', 'famili@gmail.com', 2, 'kudus', '082313961816', '', '', '', 'default.jpg', '830306491', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `d_order`
--

CREATE TABLE `d_order` (
  `id_dorder` varchar(20) NOT NULL DEFAULT '',
  `id_kel` int(11) NOT NULL,
  `keterangan` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bengkel`
--

CREATE TABLE `jenis_bengkel` (
  `id_jenis` int(11) NOT NULL,
  `jenis_bengkel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_bengkel`
--

INSERT INTO `jenis_bengkel` (`id_jenis`, `jenis_bengkel`) VALUES
(1, 'Motor'),
(2, 'Mobil');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kend`
--

CREATE TABLE `jenis_kend` (
  `id_jnskend` int(25) NOT NULL,
  `jenis_kend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kend`
--

INSERT INTO `jenis_kend` (`id_jnskend`, `jenis_kend`) VALUES
(10, 'Motor'),
(11, 'Mobil');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_kel` int(11) NOT NULL,
  `keluhan` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_bengkel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_kel`, `keluhan`, `harga`, `id_bengkel`) VALUES
(5, 'Service Umum', 100000, 18),
(6, 'Oli', 50000, 18),
(10, 'Rantai', 75000, 18),
(11, 'Aki', 100000, 18),
(12, 'Lampu', 75000, 18),
(13, 'Rem', 50000, 18),
(14, 'Tambal Ban', 20000, 18),
(15, 'Ganti Ban Dalam', 60000, 18),
(16, 'Ganti Ban Luar', 150000, 18),
(17, 'Tambal ban', 20000, 24),
(18, 'Ganti Oli', 50000, 27);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kend` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jnskend` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `no_plat` varchar(11) NOT NULL,
  `status` enum('Order','Penjemputan','Sedang Service','Review','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kend`, `id_user`, `id_jnskend`, `id_merk`, `id_tipe`, `tahun`, `no_plat`, `status`) VALUES
(2, 13, 10, 29, 128, 2020, 'K2109NB', 'Selesai'),
(3, 13, 10, 18, 41, 2016, 'K2109NB', 'Selesai'),
(4, 6, 10, 18, 158, 2018, 'K4453YN', 'Selesai'),
(5, 6, 10, 29, 137, 2014, 'K5893YN', 'Selesai'),
(6, 13, 10, 28, 148, 2018, 'K6100ACF', 'Order'),
(8, 6, 10, 29, 138, 2017, 'k5311dw', 'Review'),
(9, 6, 10, 28, 145, 2020, 'K3426EA', 'Review'),
(10, 6, 10, 28, 145, 2019, 'k6100acf', 'Penjemputan'),
(11, 6, 10, 28, 148, 2019, 'K8765YN', 'Selesai'),
(12, 6, 10, 28, 149, 2019, 'K9867yn', 'Selesai'),
(13, 6, 10, 18, 80, 2017, 'K6100ACF', 'Review'),
(14, 6, 10, 28, 150, 2016, 'K3426EA', 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_kons` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_kons`, `alamat`, `telephone`, `foto`, `id_user`) VALUES
(9, 'Kunduran-Tondanan, Padas, Todanan, Kabupaten Blora', '083234567900', 'dinda_(2).jpg', 2),
(12, 'kudus', '09837363537', '', 7),
(15, 'Jl. Kampus UMK, Kayuapu Kulon, Gondangmanis, Kec. ', '082313961816', 'dinda_(2).jpg', 13),
(16, 'kudus', '085715930928', 'default.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lap` int(11) NOT NULL,
  `id_kons` int(11) DEFAULT NULL,
  `id_bengkel` int(11) DEFAULT NULL,
  `id_kel` int(11) DEFAULT NULL,
  `tgl_lap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `merk_kend`
--

CREATE TABLE `merk_kend` (
  `id_merk` int(25) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `id_jnskend` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk_kend`
--

INSERT INTO `merk_kend` (`id_merk`, `merk`, `id_jnskend`) VALUES
(16, 'Toyota', 11),
(17, 'Daihatzu', 11),
(18, 'Honda', 11),
(19, 'Mitsubishi', 11),
(20, 'Suzuki', 11),
(21, 'Nissan', 11),
(22, 'Isuzu ', 11),
(23, 'Datsun ', 11),
(24, 'Mazda', 11),
(25, 'DFSK', 11),
(26, 'Mercedes Benz', 11),
(27, 'BMW', 11),
(28, 'Honda', 10),
(29, 'Yamaha', 10),
(30, 'Kawasaki', 10),
(31, 'Suzuki', 10),
(32, 'Benelli', 10),
(33, 'KTM Indonesia', 10),
(34, 'TVS', 10),
(36, 'Vespa', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_kel` int(11) NOT NULL,
  `id_bengkel` int(11) NOT NULL,
  `id_kend` int(11) NOT NULL,
  `kode` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_kel`, `id_bengkel`, `id_kend`, `kode`, `tanggal`, `alamat`) VALUES
(15, 15, 18, 2, 'SVC001', '2021-01-20', 'Wergu Wetan RT 03/04'),
(16, 16, 18, 2, 'SVC001', '2021-01-20', 'Wergu Wetan RT 03/04'),
(17, 15, 18, 3, 'SVC002', '2021-01-21', 'Wergu Wetan RT 03/04'),
(18, 16, 18, 4, 'SVC003', '2021-01-21', 'jl. Lkr. Utara, Kayuapu Kulon, Gondangmanis, Kec. '),
(19, 10, 18, 5, 'SVC004', '2021-01-25', 'Rahayu.Net Padas, Todanan Kabupaten Blora Jawa Ten'),
(20, 5, 18, 8, 'SVC005', '2021-01-27', 'Jl. Lkr. Utara No.17 Kayuapu Kulon, Gondangmanis K'),
(21, 15, 18, 9, 'SVC006', '2021-01-27', 'Jl. Gondang Manis Panjang Kayuapu Kulon, Gondangma'),
(22, 13, 18, 10, 'SVC007', '2021-01-27', 'Jl. Lkr. Utara Kayuapu Kulon, Gondangmanis Bae Kud'),
(23, 12, 18, 11, 'SVC008', '2021-01-30', 'Rejosari Rt 3 Rw 4, Kudus'),
(24, 13, 18, 11, 'SVC008', '2021-01-30', 'Rejosari Rt 3 Rw 4, Kudus'),
(25, 14, 18, 11, 'SVC008', '2021-01-30', 'Rejosari Rt 3 Rw 4, Kudus'),
(26, 11, 18, 12, 'SVC009', '2021-02-01', 'Universitas muria kudus'),
(27, 13, 18, 12, 'SVC009', '2021-02-01', 'Universitas muria kudus'),
(28, 6, 18, 13, 'SVC010', '2021-02-02', 'Universitas muria kudus'),
(29, 13, 18, 13, 'SVC010', '2021-02-02', 'Universitas muria kudus');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bengkel` int(11) NOT NULL,
  `isi` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `id_bengkel`, `isi`) VALUES
(2, 13, 18, 'oke'),
(3, 13, 18, 'oke'),
(4, 6, 18, 'pelayanan bagus, mekanik handal'),
(5, 6, 18, 'cvhjghl'),
(6, 6, 18, 'mantaaabbbbbbbbbbbb'),
(7, 6, 18, 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id_sa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id_sa`, `nama`, `username`, `password`, `foto`) VALUES
(5, 'administrator', 'admin', 'admin', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kend`
--

CREATE TABLE `tipe_kend` (
  `id_tipe` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `id_merk` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kend`
--

INSERT INTO `tipe_kend` (`id_tipe`, `tipe`, `id_merk`) VALUES
(37, '86 | Bensin | 1998', 16),
(38, 'Agya | Bensin | 1200', 16),
(39, 'Alphard | Bensin | 2500, 3500', 16),
(40, 'Avanza | Bensin | 1300, 1500', 16),
(41, 'C-HR | Bensin | 1800', 16),
(42, 'C-HR Hybrid | Hybrid | 1798', 16),
(43, 'Calya | Bensin | 1197', 16),
(44, 'Camry | Bensin | 2500', 16),
(45, 'Corolla Altis | Bensin | 1798', 16),
(46, 'Corolla Cross | Bensin | 1798', 16),
(47, 'Fortuner | Bensin | 2400, 2700', 16),
(48, 'Rush | Bensin | 1496', 16),
(49, 'Sienta | Bensin | 1479', 16),
(50, 'Veloz | Bensin | 1300, 1500', 16),
(51, 'Yaris | Bensin |1497', 16),
(52, 'Vios | Bensin | 1496', 16),
(53, 'Ayla | Bensin | 1200', 17),
(54, 'Gran Max MB | Bensin | 1298, 1495', 17),
(55, 'Gran Max Pickup | Bensin | 1298, 1495', 17),
(56, 'Luxio | Bensin | 1500', 17),
(57, 'Sigra | Bensin | 1200', 17),
(58, 'Sirion | Bensin | 1329', 17),
(59, 'Terios | Bensin | 1500', 17),
(60, 'Xenia | Bensin | 1300', 17),
(61, 'Accord | Bensin | 2400', 18),
(62, 'BR-V | Bensin | 1497', 18),
(63, 'Brio | Bensin | 1199', 18),
(64, 'City | Bensin | 1497', 18),
(65, 'Civic | Bensin | 1496', 18),
(66, 'Civic Hatchback | Bensin | 1498', 18),
(67, 'Civic Type R | Bensin | 1996', 18),
(68, 'CR-V | Bensin | 1997 , 1498', 18),
(69, 'HR-V | Bensin | 1497, 1799', 18),
(70, 'Jazz | Bensin | 1497', 18),
(71, 'Mobilio | Bensin | 1500', 18),
(72, 'Eclipse Cross | Bensin | 1499', 19),
(73, 'Outlander Sport | Bensin | 2000', 19),
(74, 'L300 | Diesel | 2477', 19),
(75, 'Pajero Sport | Bensin | 2442', 19),
(76, 'Triton 4x4 | Diesel | 2500', 19),
(77, 'Xpander | Bensin | 1500', 19),
(78, 'Xpander Cross | Bensin 1499', 19),
(79, 'APV Arena | Bensin | 1590', 20),
(80, 'Baleno | Bensin | 1373', 20),
(81, 'Ertiga | Bensin | 1462', 20),
(82, 'Ignis | Bensin | 1197', 20),
(83, 'Jimny  | Bensin | 1462', 20),
(84, 'Karimun Wagon R | Bensin | 998', 20),
(85, 'SX4 | Bensin | 1491', 20),
(86, 'XL 7 | Bensin | 1462', 20),
(87, 'Magnite | Bensin | 999', 21),
(88, 'Juke | Bensin | 1498', 21),
(89, 'Kicks e-Power  | Bensin | 1198', 21),
(90, 'Livina | Bensin | 1499', 21),
(91, 'March | Bensin | 1198 , 1498', 21),
(92, 'Serena | Bensin | 1997', 21),
(93, 'X-Trail | Bensin | 2488', 21),
(94, 'Cross | Bensin | 1198', 23),
(95, 'Sedan | Bensin | 1998', 24),
(96, 'Glory 560 | Bensin | 1498', 25),
(97, 'Glory 580 | Bensin | 1498, 1798 ', 25),
(98, 'Glory i-Auto | Bensin | 1498', 25),
(99, 'Super Cab | Bensin , Diesel | 1248, 1498', 25),
(100, 'AMG G 63 | Bensin | 3982', 26),
(101, 'AMG GT 53 | Bensin | 2999', 26),
(102, 'B 200 | Bensin | 1332', 26),
(103, 'C 180 | Bensin | 1497', 26),
(104, 'C 200 | Bensin | 1991', 26),
(105, 'D-Max | Diesel | 1898', 22),
(107, 'MU-X | Diesel | 2499', 22),
(108, 'Panther | Diesel | 2499', 22),
(109, 'Traga | Diesel | 2499', 22),
(110, 'GEAR 125 S VERSION', 29),
(111, 'GEAR 125 STANDARD VERSION', 29),
(112, 'FREEGO S VERSION ABS 125', 29),
(113, 'FREEGO S VERSION 125', 29),
(114, 'MIO S SMART & SOPHISTICATED 125', 29),
(115, 'XRIDE 125', 29),
(116, 'MIO M3 125 AKS SSS', 29),
(117, 'MIO M3 125', 29),
(118, 'MIO Z 125', 29),
(119, 'FINO GRANDE TUBELESS & BAN LEBAR 125 BLUE CORE', 29),
(120, 'ALL NEW SOUL GT AKS SSS 125', 29),
(121, 'ALL NEW SOUL GT AKS', 29),
(122, 'ALL NEW NMAX 155 CONNECTED / ABS VERSION', 29),
(123, 'ALL NEW NMAX 155 STANDARD VERSION', 29),
(124, 'ALL NEW AEROX 155 CONNECTED / ABS VERSION', 29),
(125, 'ALL NEW AEROX 155 CONNECTED VERSION', 29),
(126, 'ALL NEW AEROX 155 CONNECTED / ABS - MOTOGP EDITION', 29),
(127, 'NMAX 155 ABS', 29),
(128, 'NMAX 155', 29),
(129, 'LEXI S - ABS', 29),
(130, 'XMAX Powerfull 250 ', 29),
(131, 'AEROX 155 VVA S-VERSION', 29),
(132, 'AEROX 155 VVA R-VERSION', 29),
(133, 'AEROX 155 VVA', 29),
(134, 'AEROX 155VVA R-VERSION MONSTER ENERGY YAMAHA MOTOG', 29),
(135, 'AEROX 155 VVA S DOXOU VERSION', 29),
(136, 'MT-15 ENGINE 155CC LC4V WITH VVA ', 29),
(137, 'VIXION MONSTER ENERGY YAMAHA MOTOGP EDITION 150', 29),
(138, 'VIXION 150', 29),
(139, 'VIXION R ENGINE 155CC LC4V WITH VVA', 29),
(140, 'XABRE 150cc', 29),
(141, 'BYSON FI ECO FRIENDLY 150CC FI ENGINE', 29),
(142, 'WR 155 R', 29),
(143, 'YZF R15 ENGINE 155CC LC4V WITH VVA', 29),
(144, 'NEW YZF R25 250', 29),
(145, 'Honda Beat 110 cc', 28),
(146, 'Honda PCX 149.3 cc', 28),
(147, 'Honda CRF150L 149.15 cc', 28),
(148, 'Honda Vario 125 ', 28),
(149, 'Honda CBR150R', 28),
(150, 'Honda Beat Street 110', 28),
(151, 'Honda CB150R Streetfire', 28),
(152, 'Honda Genio 110', 28),
(153, 'Supra X 125 FI', 28),
(154, 'Honda CB150 Verza ', 28),
(155, 'Honda Supra GTR 150', 28),
(156, 'Honda Sonic 150R', 28),
(157, 'Revo 110', 28),
(158, 'Scoopy 110', 28),
(159, 'PCX Hybrid 150', 28),
(160, 'Honda CRF250Rally', 28),
(161, 'Honda Vario 150', 28),
(162, 'Honda CBR500R', 28),
(163, 'Suzuki All New Satria F150', 31),
(164, ' Suzuki GSX-R150', 31),
(165, 'Suzuki GSX-S150', 31),
(166, 'Suzuki GSX-S150 Touring Edition', 31),
(167, 'Suzuki GSX 150 Bandit', 31),
(168, 'Suzuki New Smash FI', 31),
(169, 'Suzuki Address FI', 31),
(170, 'Suzuki Address Playful', 31),
(171, 'Suzuki NEX II', 31),
(172, 'Suzuki GSX-S750 ABS', 31),
(173, 'Ninja H2 Carbon', 30),
(174, 'Ninja ZX-10R', 30),
(175, 'Ninja ZX-14R Ohlins', 30),
(176, 'Ninja ZX-14R SE', 30),
(177, 'Ninja ZX-14R', 30),
(178, 'Ninja ZX-6R 636', 30),
(179, 'New Ninja 650 SE', 30),
(180, 'New Ninja 650', 30),
(181, 'Ninja 250 SE (ABS/MDP) Smart Key', 30),
(182, 'Ninja 250 SE (ABS) Smart Key', 30),
(183, 'Ninja 250 SE (ABS)', 30),
(184, 'Ninja 250 SE (MDP) Smart Key', 30),
(185, 'Ninja 250 SE', 30),
(186, 'Ninja 250SL KRT Edition', 30),
(187, 'Ninja 250SL', 30),
(188, 'Z250SL ABS', 30),
(189, 'Z125 PRO SE', 30),
(190, 'D-Tracker', 30),
(191, 'D-Tracker X', 30),
(192, 'D-Tracker SE', 30),
(193, 'KX 250F', 30),
(194, 'KX 85', 30),
(195, 'KX 65', 30),
(196, 'KLX 250', 30),
(197, 'KLX230 SE', 30),
(198, 'KLX230', 30),
(199, 'KLX150BF SE (X-TREME)', 30),
(200, 'KLX150BF SE', 30),
(201, 'New KLX', 30),
(202, 'KLX 150BF', 30),
(203, 'KLX150L Special Edition', 30),
(204, 'KLX150L', 30),
(205, 'Vespa Sprint I-Get 150 ABS', 36),
(206, 'Vespa S 150', 36),
(207, 'Vespa LX 125', 36),
(208, 'Vespa Primavera 155', 36),
(209, 'Vespa GTS 150', 36),
(210, 'Vespa GTS 300 Super Tech 278.3 cc', 36),
(211, 'TVS Dazz 110', 34),
(212, 'TVS Neo XR110', 34),
(213, 'TVS Rockz 125', 34),
(214, 'TVS Max 125', 34),
(215, 'TVS Apache RTR 200 4V', 34),
(216, 'KTM Duke 200', 33),
(217, 'KTM RC 200', 33),
(218, 'KTM 50 SX', 33),
(219, 'KTM 250 SX-F', 33),
(220, 'KTM 250 EXC-F', 33),
(221, 'KTM 350 EXC-F', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(11) NOT NULL,
  `level` enum('Konsumen','Bengkel','Superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'admin123@gmail.com', 'admin', 'Superadmin'),
(3, 'Astra Adi Nugraha ', 'joyo', 'bengkeljoyo@gmail.com', 'joyo', 'Bengkel'),
(6, 'Yeni Widya A', 'yenika', 'yeniinka@gmail.com', 'yenika', 'Konsumen'),
(13, 'Murta', 'murta', 'dinda453@gmail.com', 'murta', 'Konsumen'),
(20, 'hadi', 'famili@gmail.com', 'famili@gmail.com', '12345', 'Bengkel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bengkel`
--
ALTER TABLE `bengkel`
  ADD PRIMARY KEY (`id_bengkel`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `d_order`
--
ALTER TABLE `d_order`
  ADD PRIMARY KEY (`id_dorder`);

--
-- Indexes for table `jenis_bengkel`
--
ALTER TABLE `jenis_bengkel`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_kend`
--
ALTER TABLE `jenis_kend`
  ADD PRIMARY KEY (`id_jnskend`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kend`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jnskend` (`id_jnskend`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_kons`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `merk_kend`
--
ALTER TABLE `merk_kend`
  ADD PRIMARY KEY (`id_merk`),
  ADD KEY `id_jnskend` (`id_jnskend`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_kel` (`id_kel`),
  ADD KEY `id_bengkel` (`id_bengkel`),
  ADD KEY `id_kend` (`id_kend`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bengkel` (`id_bengkel`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id_sa`);

--
-- Indexes for table `tipe_kend`
--
ALTER TABLE `tipe_kend`
  ADD PRIMARY KEY (`id_tipe`),
  ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bengkel`
--
ALTER TABLE `bengkel`
  MODIFY `id_bengkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jenis_bengkel`
--
ALTER TABLE `jenis_bengkel`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_kend`
--
ALTER TABLE `jenis_kend`
  MODIFY `id_jnskend` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_kons` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merk_kend`
--
ALTER TABLE `merk_kend`
  MODIFY `id_merk` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id_sa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_kend`
--
ALTER TABLE `tipe_kend`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`id_jnskend`) REFERENCES `jenis_kend` (`id_jnskend`),
  ADD CONSTRAINT `kendaraan_ibfk_3` FOREIGN KEY (`id_merk`) REFERENCES `merk_kend` (`id_merk`),
  ADD CONSTRAINT `kendaraan_ibfk_4` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kend` (`id_tipe`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_kel`) REFERENCES `keluhan` (`id_kel`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_bengkel`) REFERENCES `bengkel` (`id_bengkel`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_kend`) REFERENCES `kendaraan` (`id_kend`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_bengkel`) REFERENCES `bengkel` (`id_bengkel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
