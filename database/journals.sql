-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 09:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journals`
--

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori_pekerjaan` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `instruksi_dari` varchar(255) DEFAULT NULL,
  `target` enum('tercapai','tidak_tercapai') NOT NULL DEFAULT 'tercapai',
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `tanggal`, `kategori_pekerjaan`, `user_id`, `instruksi_dari`, `target`, `deskripsi`) VALUES
(13, '2024-06-14', 'penilaian', NULL, 'Mas Aji', 'tercapai', ''),
(14, '2024-06-14', 'penilaian', NULL, NULL, 'tercapai', ''),
(15, '2024-06-01', 'penilaian', NULL, 'Mas Aji', 'tercapai', ''),
(43, '2024-06-14', 'penilaian', NULL, 'Mas Aji', 'tercapai', 'Penilaian Peserta Real'),
(44, '0000-00-00', '', 1, '', 'tercapai', ''),
(45, '2024-06-03', 'penilaian', NULL, 'Mas Aji', 'tercapai', 'ASFDGFHGJHKJ'),
(46, '0000-00-00', '', 1, '', 'tercapai', ''),
(47, '2024-06-14', 'penilaian', NULL, 'Mas Bariq', 'tercapai', 'VHUDCXVFCBG'),
(48, '0000-00-00', '', 1, '', 'tercapai', ''),
(49, '2024-06-14', 'penilaian', NULL, 'Mas Aji', 'tercapai', 'sdg'),
(50, '0000-00-00', '', 1, '', 'tercapai', ''),
(51, '2024-05-27', 'penilaian', NULL, 'Mas Bakhtiar', 'tercapai', 'rendra'),
(59, '0000-00-00', '', NULL, '', 'tercapai', ''),
(60, '2024-06-08', 'penilaian', NULL, 'Mas Bariq', 'tercapai', 'qwertyuio'),
(61, '0000-00-00', '', NULL, '', 'tercapai', ''),
(62, '2024-05-30', 'penilaian', NULL, 'Mas Bariq', 'tercapai', 'bgyhbhj'),
(63, '0000-00-00', '', NULL, '', 'tercapai', ''),
(64, '2024-07-04', 'penilaian', NULL, 'Mas Aji', 'tercapai', 'nando anjay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_journals_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
