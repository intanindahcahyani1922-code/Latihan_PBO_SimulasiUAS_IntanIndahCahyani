-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 07:01 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_intanindahcahyani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) COLLATE tis620_bin NOT NULL,
  `asal_sekolah` varchar(100) COLLATE tis620_bin NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` int NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') COLLATE tis620_bin NOT NULL,
  `pilihan_prodi` varchar(100) COLLATE tis620_bin DEFAULT NULL,
  `lokasi_kampus` varchar(100) COLLATE tis620_bin DEFAULT NULL,
  `jenis_prestasi` varchar(100) COLLATE tis620_bin DEFAULT NULL,
  `tingkat_prestasi` varchar(50) COLLATE tis620_bin DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) COLLATE tis620_bin DEFAULT NULL,
  `instansi_sponsor` varchar(100) COLLATE tis620_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COLLATE=tis620_bin;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Budi Santoso', 'SMA Negeri 1 Cilacap', 85.50, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'MA Negeri 2 Purwokerto', 78.40, 250000, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Rian Hidayat', 'SMK Negeri 1 Banyumas', 82.10, 250000, 'Reguler', 'Teknik Elektro', 'Kampus 2', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA Negeri 3 Cilacap', 90.00, 250000, 'Reguler', 'Akuntansi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMA Swasta PGRI', 75.00, 250000, 'Reguler', 'Manajemen', 'Kampus 2', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMK Komputer Cilacap', 88.25, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMA Negeri 1 Maos', 80.70, 250000, 'Reguler', 'Sistem Informasi', 'Kampus 2', NULL, NULL, NULL, NULL),
(8, 'Ahmad Fauzi', 'SMA Negeri 2 Cilacap', 84.60, 250000, 'Reguler', 'Teknik Mesin', 'Kampus Utama', NULL, NULL, NULL, NULL),
(9, 'Rina Marlina', 'SMK Negeri 2 Purwokerto', 79.15, 250000, 'Reguler', 'Akuntansi', 'Kampus 2', NULL, NULL, NULL, NULL),
(10, 'Deni Setiawan', 'MA Al-Irsyad', 83.40, 250000, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(11, 'Hendra Wijaya', 'SMA Negeri 1 Kroya', 92.00, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(12, 'Indah Cahyani', 'SMA Negeri 2 Cilacap', 89.50, 250000, 'Prestasi', NULL, NULL, 'Juara 1 Pencak Silat', 'Provinsi', NULL, NULL),
(13, 'Joko Tarub', 'SMK Negeri 2 Purwokerto', 84.00, 250000, 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa', 'Kabupaten', NULL, NULL),
(14, 'Kevin Sanjaya', 'SMA Olahraga Khusus', 79.80, 250000, 'Prestasi', NULL, NULL, 'Juara 2 Bulutangkis', 'Nasional', NULL, NULL),
(15, 'Larasati Putri', 'SMA Negeri 1 Sidareja', 94.10, 250000, 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Provinsi', NULL, NULL),
(16, 'Muhammad Riski', 'MA Al-Ikhlas', 86.30, 250000, 'Prestasi', NULL, NULL, 'Hafidz Al-Quran 10 Juz', 'Kabupaten', NULL, NULL),
(17, 'Nadia Vega', 'SMA Negeri 1 Majenang', 91.20, 250000, 'Prestasi', NULL, NULL, 'Juara 1 Pidato Bahasa Inggris', 'Provinsi', NULL, NULL),
(18, 'Dimas Anggara', 'SMA Negeri 1 Purwokerto', 95.00, 250000, 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(19, 'Siti Badriah', 'SMK Merdeka Cilacap', 87.80, 250000, 'Prestasi', NULL, NULL, 'Juara 3 Futsal', 'Provinsi', NULL, NULL),
(20, 'Yusuf Mansur', 'MA Negeri 1 Cilacap', 88.90, 250000, 'Prestasi', NULL, NULL, 'Hafidz Al-Quran 20 Juz', 'Nasional', NULL, NULL),
(21, 'Oki Setiawan', 'SMA Negeri 1 Cilacap', 87.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/001', 'Dinas Kominfo'),
(22, 'Putri Ayu', 'SMA Negeri 5 Purwokerto', 83.40, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/002', 'Badan Pusat Statistik'),
(23, 'Rendra Pramudya', 'SMK Negeri 1 Cilacap', 86.90, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/003', 'Dinas Perhubungan'),
(24, 'Sania Mirza', 'SMA Negeri 2 Majenang', 81.15, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/004', 'Dinas Pendidikan'),
(25, 'Taufik Hidayat', 'SMA Swasta Muallimin', 88.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/005', 'Kementerian Agama'),
(26, 'Vina Panduwinata', 'SMA Negeri 1 Kroya', 85.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/006', 'Dinas Lingkungan Hidup'),
(27, 'Zacky Mirza', 'SMA Negeri 3 Cilacap', 82.50, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/007', 'Dinas Kesehatan'),
(28, 'Citra Kirana', 'SMA Negeri 1 Maos', 89.10, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/008', 'Dinas Sosial'),
(29, 'Baim Wong', 'SMK Negeri 1 Purwokerto', 80.00, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/009', 'Dinas Pekerjaan Umum'),
(30, 'Paula Verhoeven', 'SMA Swasta PGRI', 84.75, 250000, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DINAS/2026/010', 'Dinas Pertanian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
