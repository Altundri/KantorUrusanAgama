-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kua`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catin`
--

CREATE TABLE `tbl_catin` (
  `id_catin` int(11) NOT NULL,
  `nama_suami` varchar(255) NOT NULL,
  `ttl_suami` date NOT NULL,
  `alamat_suami` varchar(255) NOT NULL,
  `pekerjaan_suami` varchar(255) NOT NULL,
  `foto_suami` varchar(255) NOT NULL,
  `nama_istri` varchar(255) NOT NULL,
  `ttl_istri` date NOT NULL,
  `alamat_istri` varchar(255) NOT NULL,
  `pekerjaan_istri` varchar(255) NOT NULL,
  `foto_istri` varchar(255) NOT NULL,
  `username_catin` varchar(255) NOT NULL,
  `email_catin` varchar(255) NOT NULL,
  `nohp_catin` varchar(255) NOT NULL,
  `pass_catin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_catin`
--

INSERT INTO `tbl_catin` (`id_catin`, `nama_suami`, `ttl_suami`, `alamat_suami`, `pekerjaan_suami`, `foto_suami`, `nama_istri`, `ttl_istri`, `alamat_istri`, `pekerjaan_istri`, `foto_istri`, `username_catin`, `email_catin`, `nohp_catin`, `pass_catin`) VALUES
(3, 'Ahmad Marzuqi ', '2022-01-02', 'Kenten Sukabangun', 'CEO', 'testimonials-1.jpg', 'Cindy Monica', '2022-02-01', 'Bukit Siguntang', 'Ibu Rumah Tangga', 'testimonials-2.jpg', 'lutpi', 'lutpi@gmail.com', '087857483758', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'Altundri', '2000-10-03', 'Sudirman', 'Fullstack', 'testimonials-2.jpg', 'Annisa', '2000-02-11', 'Lemabang', 'Ibu Rumah Tangga', 'testimonials-1.jpg', 'altundri', 'altundri@gmail.com', '085748482953', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_kesehatan`
--

CREATE TABLE `tbl_form_kesehatan` (
  `id_surat` int(11) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `nama_istri` varchar(50) NOT NULL,
  `umur_istri` varchar(50) NOT NULL,
  `pekerjaan_istri` varchar(50) NOT NULL,
  `alamat_istri` varchar(255) NOT NULL,
  `bb_istri` int(11) NOT NULL,
  `tb_istri` int(11) NOT NULL,
  `lila_istri` varchar(50) NOT NULL,
  `td_istri` varchar(50) NOT NULL,
  `hb_istri` varchar(50) NOT NULL,
  `darah_istri` varchar(50) NOT NULL,
  `nama_suami` varchar(50) NOT NULL,
  `umur_suami` varchar(50) NOT NULL,
  `pekerjaan_suami` varchar(50) NOT NULL,
  `alamat_suami` varchar(255) NOT NULL,
  `bb_suami` int(11) NOT NULL,
  `tb_suami` int(11) NOT NULL,
  `td_suami` varchar(50) NOT NULL,
  `hb_suami` varchar(50) NOT NULL,
  `darah_suami` varchar(50) NOT NULL,
  `screening_imunisasi` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `pernyataan` varchar(255) NOT NULL,
  `pelaksana` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_form_kesehatan`
--

INSERT INTO `tbl_form_kesehatan` (`id_surat`, `id_user`, `no_surat`, `nama_istri`, `umur_istri`, `pekerjaan_istri`, `alamat_istri`, `bb_istri`, `tb_istri`, `lila_istri`, `td_istri`, `hb_istri`, `darah_istri`, `nama_suami`, `umur_suami`, `pekerjaan_suami`, `alamat_suami`, `bb_suami`, `tb_suami`, `td_suami`, `hb_suami`, `darah_suami`, `screening_imunisasi`, `tindakan`, `pernyataan`, `pelaksana`, `tgl_surat`, `status`) VALUES
(3, 2, '004/34503/5135/642', 'Nadya Anggraini', '22', 'Ibu Rumah Tangga', 'Bukit Siguntang', 45, 165, '15', '15', '15', 'o', 'Rafliandi Ardana', '22', 'CEO', 'Lemabang', 45, 166, '15', '15', 'O', 'Bebas', 'Bebas', 'Sehat', 'Rifqi', '2022-07-19', 'Y'),
(4, 2, '004/34503/5135/644', 'Cindy Monica', '22', 'Ibu Rumah Tangga', 'Kenten Jaya', 75, 170, '20', '20', '20', 'A+', 'Ahmad Marzuqi ', '22', 'Pro Player ', 'Kenten Sukabangun', 45, 165, '20', '20', 'A-', 'Bebas', 'Diobati', 'Sehat', 'Rafliandi', '2022-07-12', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepala` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepala`, `nip`, `website`, `email`, `logo`, `id_user`) VALUES
(1, 'Kantor Urusan Agama Kecamatan Way Tuba', 'Kementrian Agama Republik Indonesia', 'Wakaf', 'Jl. Jend. Rya Cudu No. 461 Kp. Way Tuba Kec. Way Tuba Kab. Way Kanan Prov. Lampung', 'Muhammad Kosim, S. Pd. I.', '197005041995031001', 'https://kua.com', 'Zidan@gmail.com', 'logo_kua.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_akad`
--

CREATE TABLE `tbl_jadwal_akad` (
  `id_jadwal` int(22) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `no_daftar` varchar(255) NOT NULL,
  `nama_suami` varchar(255) NOT NULL,
  `nama_istri` varchar(255) NOT NULL,
  `tgl_akad` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal_akad`
--

INSERT INTO `tbl_jadwal_akad` (`id_jadwal`, `tgl_daftar`, `no_daftar`, `nama_suami`, `nama_istri`, `tgl_akad`, `status`) VALUES
(1, '2022-07-14', '003/5524/7567/2021', 'RAFLIANDI ARDANA', 'NADYA ANGGRAINI', '2022-07-25', 'Sedang Pemeriksaan'),
(2, '2022-07-14', '005/2515/3463/2023', 'AHMAD MARZUQI', 'CINDY MONICA', '2022-07-27', 'Sedang Pemeriksaan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sett`
--

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_pengantar` tinyint(2) NOT NULL,
  `form_kesehatan` tinyint(2) NOT NULL,
  `jadwal_akad` tinyint(2) NOT NULL,
  `data_catin` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sett`
--

INSERT INTO `tbl_sett` (`id_sett`, `surat_pengantar`, `form_kesehatan`, `jadwal_akad`, `data_catin`, `id_user`) VALUES
(1, 10, 10, 10, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_pengantar`
--

CREATE TABLE `tbl_surat_pengantar` (
  `id_surat` int(10) NOT NULL,
  `no_surat` varchar(250) NOT NULL,
  `nama_suami` varchar(250) NOT NULL,
  `nama_istri` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tgl_surat` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_pengantar`
--

INSERT INTO `tbl_surat_pengantar` (`id_surat`, `no_surat`, `nama_suami`, `nama_istri`, `alamat`, `tgl_surat`, `status`) VALUES
(7, '0042/1/24/5532', 'Rafliandi Ardana', 'Nadya Anggraini', 'Lemabang', '2022-07-12', 'Y'),
(9, '0053/5135/5236/2022', 'Ahmad Marzuqi', 'Cindy Monica', 'Kenten palembang', '2022-07-12', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `nip`, `admin`) VALUES
(1, 'zidan', '827ccb0eea8a706c4c34a16891f84e7b', 'Super Admin', '-', 1),
(2, 'adminkua', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator KUA', '09809812074124', 2),
(3, 'puskes', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator Puskes', '0192498120959', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catin`
--
ALTER TABLE `tbl_catin`
  ADD PRIMARY KEY (`id_catin`);

--
-- Indexes for table `tbl_form_kesehatan`
--
ALTER TABLE `tbl_form_kesehatan`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tbl_jadwal_akad`
--
ALTER TABLE `tbl_jadwal_akad`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_sett`
--
ALTER TABLE `tbl_sett`
  ADD PRIMARY KEY (`id_sett`);

--
-- Indexes for table `tbl_surat_pengantar`
--
ALTER TABLE `tbl_surat_pengantar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catin`
--
ALTER TABLE `tbl_catin`
  MODIFY `id_catin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_form_kesehatan`
--
ALTER TABLE `tbl_form_kesehatan`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jadwal_akad`
--
ALTER TABLE `tbl_jadwal_akad`
  MODIFY `id_jadwal` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_surat_pengantar`
--
ALTER TABLE `tbl_surat_pengantar`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
