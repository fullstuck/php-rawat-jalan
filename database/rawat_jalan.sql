-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 07:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rawat_jalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(10) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialisasi`, `alamat`, `no_hp`) VALUES
(1, 'dr.Budiman,M.Si,SPK', 'Penyakit Dalam', 'Batu Aji', '0834567812'),
(2, 'dr.Agustina', 'Dokter Umum', 'Batam Center', '0852631232'),
(3, 'dr.Astriana,SPak', 'Dokter Anak', 'Tembesi', '0823517231'),
(4, 'dr.Sahat Sianturi,M.Si,MRP', 'Penyakit Paru - Paru dan Organ Dalam', 'Muka Kuning', '0856327391'),
(5, 'dr.Frementeliana', 'Dokter Umum', 'Tiban', '0825647231'),
(6, 'dr. Gunawan Fauzi, Msi', 'Penyakit Luar', 'Sei Harapan', '08xxx'),
(7, 'dr. Ardi', 'penyakit telinga', 'punggur', '08xx'),
(8, 'Dr. Antok', 'Penyakit Hati', 'Batam', '080999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `jenis_obat`, `kategori`) VALUES
(1, 'Aspirin', 'Puyer', 'Gigi'),
(2, 'Kasih Tau Gak ya', 'Puyer', 'Mata'),
(3, 'Lakoni', 'Tablet', 'THT'),
(4, 'Panadol', 'Cair', 'Gigi'),
(5, 'Visin', 'Tetes', 'Mata'),
(6, 'Amoxilin', 'Tablet', 'Alergi'),
(10, 'A', 'Puyer', 'Gigi'),
(11, 'B', 'Cair', 'THT'),
(16, 'AZ', 'Puyer', 'Gigi'),
(17, 'Paramex', 'Puyer', 'Mata'),
(18, 'Konidin', 'Tablet', 'Alergi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(10) NOT NULL,
  `no_badge` int(5) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `usia` int(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_badge`, `nama_pasien`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `usia`, `agama`, `alamat`, `no_hp`) VALUES
(3, 1111, 'Ryan Aja', 'Laki - Laki', '2017-06-29', 'Karimun', 23, 'Islam', 'Lubuk Semut', '456789'),
(4, 6235, 'Santi', 'Perempuan', '0000-00-00', '', 0, '', '', 'yyy'),
(5, 5246, 'Nola', 'Perempuan', '0000-00-00', '', 0, '', '', 'xxx'),
(7, 4567, 'drfg', 'Perempuan', '2017-06-28', 'rtyuio', 44, 'Hindu', 'ert', '567'),
(8, 9989, 'ghjk', 'Perempuan', '2017-06-29', 'yguhjk', 99, 'Hindu', 'ghjk', '678890'),
(9, 8888, 'haha', '', '2017-06-29', '9999', 99, '', '999', '999'),
(10, 444, 'Pasien', 'Laki - Laki', '2017-08-04', 'Batam', 14, 'Islam', 'Batu Aji', '08566659152');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekmed`
--

CREATE TABLE `tb_rekmed` (
  `id_rekmed` int(10) NOT NULL,
  `tgl_rekmed` date NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekmed`
--

INSERT INTO `tb_rekmed` (`id_rekmed`, `tgl_rekmed`, `id_pasien`, `id_dokter`, `nama_obat`, `keterangan`) VALUES
(18, '2017-08-04', 3, 1, 'Paramex, Konidin', ''),
(19, '2017-08-04', 7, 3, 'Aspirin, Kasih Tau Gak ya, Lakoni', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `no_hp`) VALUES
(1, 'admin', 'admin', 'Amstron', '08xxxx'),
(3, 'tes lagi', 'tes lagi', 'tes lagi', 'teslagi'),
(4, 'coba3', 'coba', 'dicoba lagi', '56789'),
(5, 'ayo2', 'ayo2', 'ayo2', 'ayo2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_rekmed`
--
ALTER TABLE `tb_rekmed`
  ADD PRIMARY KEY (`id_rekmed`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_rekmed`
--
ALTER TABLE `tb_rekmed`
  MODIFY `id_rekmed` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
