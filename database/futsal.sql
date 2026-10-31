-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2022 pada 21.15
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `transnum` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `tgl` date NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `fieldnum` int(11) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Waiting for Confirmation',
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`transnum`, `username`, `tgl`, `start`, `end`, `duration`, `fieldnum`, `status`, `datecreated`) VALUES
(1, 'ACHMAD', '2018-11-01', 20, 22, 2, 4, 'Accepted', '2018-10-31 00:00:00'),
(504, 'dio', '2022-02-25', 8, 9, 1, 1, 'Accepted', '2022-02-24 00:41:32'),
(506, 'dio', '2022-02-25', 16, 18, 2, 1, 'Accepted', '2022-02-24 22:55:26'),
(513, 'tester', '2022-03-12', 7, 9, 2, 1, 'Waiting for Confirmation', '2022-03-11 07:10:23'),
(514, 'dio', '2022-03-14', 8, 10, 2, 1, 'Rejected', '2022-03-13 11:14:15'),
(516, 'dio', '2022-03-16', 7, 9, 2, 1, 'Rejected', '2022-03-15 10:17:23'),
(517, 'dio', '2022-03-18', 12, 14, 2, 1, 'Accepted', '2022-03-18 10:35:16'),
(520, 'dio', '2022-03-19', 8, 10, 2, 1, 'Accepted', '2022-03-19 05:59:40');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `booking_price`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `booking_price` (
`transnum` bigint(20) unsigned
,`username` varchar(30)
,`tgl` date
,`start` int(11)
,`end` int(11)
,`duration` int(11)
,`fieldnum` int(11)
,`status` varchar(30)
,`datecreated` datetime
,`price` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `field`
--

CREATE TABLE `field` (
  `fieldnum` int(11) NOT NULL,
  `tipe` text NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `field`
--

INSERT INTO `field` (`fieldnum`, `tipe`, `image`) VALUES
(1, 'Sintetis', '684-sintetis.jpeg'),
(2, 'Plester', '592-gambar-olahraga-futsal-2.jpg'),
(3, 'Plester', '852-plester.jpg'),
(4, 'sintetis', '593-hasil-instalasi.jpg'),
(5, 'beton', '408-Jual-Karpet-Vinyl-Lapangan-Futsal-Per-Meter-1-min-1.jpg'),
(6, 'sintetis', '927-screen-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `price`
--

CREATE TABLE `price` (
  `transnum` int(11) DEFAULT NULL,
  `opt` int(11) DEFAULT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `price`
--

INSERT INTO `price` (`transnum`, `opt`, `totalprice`) VALUES
(520, 1, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pricelist`
--

CREATE TABLE `pricelist` (
  `opt` int(11) NOT NULL,
  `fieldnum` int(11) DEFAULT NULL,
  `startday` int(11) NOT NULL,
  `endday` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pricelist`
--

INSERT INTO `pricelist` (`opt`, `fieldnum`, `startday`, `endday`, `starttime`, `endtime`, `price`) VALUES
(1, 1, 1, 7, 7, 24, 25000),
(2, 2, 1, 7, 7, 24, 50000),
(3, 3, 1, 7, 7, 24, 75000),
(4, 4, 1, 7, 7, 24, 100000),
(5, 5, 1, 7, 7, 24, 125000),
(6, 6, 1, 7, 7, 24, 150000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `transaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `transaksi` (
`transnum` bigint(20) unsigned
,`tgl` date
,`username` varchar(30)
,`phonenum` text
,`start` int(11)
,`end` int(11)
,`duration` int(11)
,`fieldnum` int(11)
,`tipe` text
,`totalprice` int(11)
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `name` text NOT NULL,
  `phonenum` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`name`, `phonenum`, `username`, `password`, `role`) VALUES
('admin', '0855123455', 'admin', '123', 'admin'),
('dio', '0988878', 'dio', 'dio', 'customer'),
('fanza', '7685868', 'fanza', '123', 'customer'),
('tes', '1', 'tes', '123', 'admin');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `verifikasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `verifikasi` (
`transnum` bigint(20) unsigned
,`username` varchar(30)
,`phonenum` text
,`tgl` date
,`start` int(11)
,`end` int(11)
,`duration` int(11)
,`fieldnum` int(11)
,`tipe` text
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `booking_price`
--
DROP TABLE IF EXISTS `booking_price`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `booking_price`  AS  select `booking`.`transnum` AS `transnum`,`booking`.`username` AS `username`,`booking`.`tgl` AS `tgl`,`booking`.`start` AS `start`,`booking`.`end` AS `end`,`booking`.`duration` AS `duration`,`booking`.`fieldnum` AS `fieldnum`,`booking`.`status` AS `status`,`booking`.`datecreated` AS `datecreated`,`price`.`totalprice` AS `price` from (`booking` join `price` on(`booking`.`transnum` = `price`.`transnum`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `transaksi`
--
DROP TABLE IF EXISTS `transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `transaksi`  AS  select `booking`.`transnum` AS `transnum`,`booking`.`tgl` AS `tgl`,`user`.`username` AS `username`,`user`.`phonenum` AS `phonenum`,`booking`.`start` AS `start`,`booking`.`end` AS `end`,`booking`.`duration` AS `duration`,`field`.`fieldnum` AS `fieldnum`,`field`.`tipe` AS `tipe`,`price`.`totalprice` AS `totalprice`,`booking`.`status` AS `status` from (((`user` join `booking` on(`user`.`username` = `booking`.`username`)) join `price` on(`booking`.`transnum` = `price`.`transnum`)) join `field` on(`booking`.`fieldnum` = `field`.`fieldnum`)) where `booking`.`status` <> 'Waiting for Confirmation' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `verifikasi`
--
DROP TABLE IF EXISTS `verifikasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `verifikasi`  AS  select `booking`.`transnum` AS `transnum`,`user`.`username` AS `username`,`user`.`phonenum` AS `phonenum`,`booking`.`tgl` AS `tgl`,`booking`.`start` AS `start`,`booking`.`end` AS `end`,`booking`.`duration` AS `duration`,`field`.`fieldnum` AS `fieldnum`,`field`.`tipe` AS `tipe`,`booking`.`status` AS `status` from (((`user` join `booking` on(`user`.`username` = `booking`.`username`)) join `price` on(`booking`.`transnum` = `price`.`transnum`)) join `field` on(`booking`.`fieldnum` = `field`.`fieldnum`)) where `booking`.`status` = 'Waiting for Confirmation' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`transnum`);

--
-- Indeks untuk tabel `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`fieldnum`);

--
-- Indeks untuk tabel `price`
--
ALTER TABLE `price`
  ADD KEY `transnum` (`transnum`),
  ADD KEY `opt` (`opt`);

--
-- Indeks untuk tabel `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`opt`),
  ADD KEY `fieldnum` (`fieldnum`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `transnum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pricelist`
--
ALTER TABLE `pricelist`
  ADD CONSTRAINT `pricelist_ibfk_1` FOREIGN KEY (`fieldnum`) REFERENCES `field` (`fieldnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
