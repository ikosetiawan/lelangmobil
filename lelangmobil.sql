-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 10:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelangmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nama` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`nama`, `username`, `password`) VALUES
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_penjual` varchar(128) NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `harga` int(24) NOT NULL,
  `status` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_penjual`, `nama_penjual`, `nama_barang`, `harga`, `status`, `deskripsi`) VALUES
(4, 15, 'Ahmad Syahroni', 'Agya 2014', 20000, 'Masih Dalam Lelang', ''),
(5, 15, 'Ahmad Syahroni', 'Mitshubishi L300', 20000000, 'Terjual', ''),
(6, 15, 'Ahmad Syahroni', 'Suzuki Ertiga 2013', 70000000, 'Masih dalam Lelang', 'qweerty\r\n                            ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `id_penawaran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(64) NOT NULL,
  `harga_penawaran` int(28) NOT NULL,
  `nama_penawar` int(11) NOT NULL,
  `tanggal` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama_penjual` varchar(64) NOT NULL,
  `nama_pembeli` varchar(64) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga` bigint(255) NOT NULL,
  `alamat_pengiriman` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_barang`, `id_penjual`, `id_pembeli`, `nama_penjual`, `nama_pembeli`, `nama_barang`, `harga`, `alamat_pengiriman`, `tanggal`) VALUES
(1, 4, 1, 2, 'Muhammad Dhikri', 'Muhammad Anam', 'Honda City 2004', 87000000, 'jl. Kenanga Jatiroto Jember Jawa Timur', '2020-04-02'),
(2, 4, 2, 3, 'Chirul Anam', 'Jainudin Iman', 'Avanza G', 90000000, 'JL. Perusahaan no. 81 Tunjungtirto Singosari Kab. Malang', '2020-03-27'),
(10, 6, 15, 3, 'Ahmad Syahroni', 'Kevin Merico', 'Suzuki Ertiga 2013', 300000, 'Jl. Mawar No. 88 A Tunjungtirto Singosari Kab. Malang', '2020-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `username` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `status`, `username`, `nama`, `telephone`, `alamat`, `email`, `password`) VALUES
(10, 'pembeli', 'ikosetiawan', 'Kevin Merico', '098765342123', 'Banyuwangi', 'mericosetiawan@gmail.com', '$2y$10$NZrNNV/uhDST1CdQsh7iM.n.OqvhJRMFuOE4tgKz/ngFh3gWQ.AAi'),
(12, 'pembeli', 'apasaja12', 'Desvianty YA', '0874534252718', 'Kalimantan', 'desvi@gmail.com', '$2y$10$a7Sm.6lhaGjg2UD6n/x.3.jsws4l.XyqSjezjoXXhQ3lbMBC2Ugeu'),
(13, 'pembeli', 'ajaaja', 'Josep Deddy', '098765676543', 'Blitar', 'kevinmerico@yahoo.co.id', '$2y$10$bHavbXd6g1JXSFaktr6Z5ea3d0LUr3MO/V4wCZ26FOnlvTRBC9QPi'),
(15, 'penjual', 'ajaaja', 'Josep Deddy Iarawan', '09876567654390', 'Blitar', 'kevinmerico@yahoo.co.id', ''),
(16, 'penjual', 'itn12', 'Rizal Abidin Nur', '0987634565216', 'Bali ', 'risal@gmail.com', '$2y$10$HvlGFSK71XrWb9bBuuQpOOuX2iXHUuxyxb8RjoYTZ5nz1GGMkoCji'),
(18, 'pembeli', 'aku', 'Kevin', '0', 'Banyuwangi', 'ikosetiawan2605@gmail.com', '$2y$10$hqgqPKDkbbnlRg7IMu9I.eGV8EtT4cvH7TX2IS2fSAAjNoGgnEdmm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `id_penawaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
