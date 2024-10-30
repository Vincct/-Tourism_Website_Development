-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 02:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kategoriberitaKODE` char(4) NOT NULL,
  `kategoriberitaNAMA` varchar(60) NOT NULL,
  `kategoriberitaKAT` char(100) NOT NULL,
  `kategoriberitaKET` varchar(255) NOT NULL,
  `kategoriberitaFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kategoriberitaKODE`, `kategoriberitaNAMA`, `kategoriberitaKAT`, `kategoriberitaKET`, `kategoriberitaFOTO`) VALUES
('KB01', 'Pesona Pariwisata Indonesia yang Mengagumkan', 'Berita Acara', 'Indonesia, dengan kekayaan budaya dan keindahan alamnya, terus menunjukkan dirinya sebagai destinasi pariwisata yang tak tertandingi. Acara-acara pariwisata di negeri ini tidak hanya menarik perhatian wisatawan lokal, tetapi juga mencuri perhatian dunia.', 'Beritakomodo.jpg'),
('KB02', 'Peluang dan Tantangan Destinasi Pariwisata di Indonesia', 'Berita Cuaca', 'Indonesia, dengan kekayaan alamnya yang memukau, seringkali terkenal dengan cuaca tropisnya yang eksotis. Namun, setiap destinasi pariwisata di tanah air tidak hanya menawarkan keindahan alam, tetapi juga berbagi pengalaman cuaca yang berbeda.', 'Beritacuaca.jpg'),
('KB03', 'Melacak Jejak Tren Pariwisata Indonesia', 'Berita Tren', 'Dalam beberapa tahun terakhir, Indonesia telah menyaksikan tren pariwisata yang menarik dan dinamis. Salah satu tren utama adalah peningkatan kunjungan wisatawan mancanegara ke destinasi-destinasi unggulan di seluruh negeri.', 'Beritatren.jpg'),
('KB04', 'Promosi Pariwisata untuk Menarik Wisatawan Dunia', 'Berita Promosi', 'Indonesia terus memperkenalkan kekayaan budaya, alam, dan kuliner sebagai destinasi pariwisata unggulan. Melalui berbagai upaya promosi, pemerintah dan pihak terkait berkolaborasi untuk memperluas jangkauan pesona Indonesia ke seluruh dunia.', 'Beritapromosi.jpg'),
('KB05', 'Meresapi Kecantikan Indonesia dari Sudut Mata Seorang Wisata', 'Berita Perjalanan', 'Seorang petualang berbagi kisah tentang perjalanan menakjubkan di seluruh penjuru Indonesia. Dari jantung kota Jakarta yang sibuk hingga keindahan alam pulau-pulau terpencil di Nusa Tenggara, setiap langkah adalah petualangan baru yang menggugah selera.', 'Beritaperjalanan.jpg'),
('KB06', 'Merawat Keindahan Alam Indonesia', 'Berita Lingkungan', 'Indonesia, destinasi pariwisata yang memesona, juga memegang tanggung jawab besar dalam menjaga keberlanjutan lingkungan. Dalam upaya untuk memelihara keindahan alamnya, Indonesia semakin mengadopsi praktik pariwisata berkelanjutan.', 'Beritalingkungan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` char(255) NOT NULL,
  `destinasiFOTO` char(255) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('T001', 'Monumen', 'Monumen Nasional (Monas) di Jakarta, Indonesia, merupakan salah satu ikon yang tak terpisahkan dari kekayaan sejarah dan keindahan ibu kota.', 'Monas.jpg', 'K001'),
('T002', 'Pura', 'Pura Ulun Danu Bratan, sebuah situs suci yang memesona, berdiri megah di tepi Danau Bratan, Bali.', 'Pura Ulun.jpg', 'K002'),
('T003', 'Candi', 'Candi Borobudur, yang terletak di Magelang, Jawa Tengah, adalah keajaiban arsitektur dan keagamaan yang menarik ribuan pengunjung setiap tahun.', 'Candi Borobudur.jpg', 'K003'),
('T004', 'Taman', 'Taman Nasional Komodo, sebuah surga alam yang memukau terletak di pulau Komodo, Flores, Indonesia.', 'Taman Komodo.jpg', 'K004');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(255) NOT NULL,
  `fotodestinasiFILE` char(255) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('C001', 'N111', 'fotodestinasi1.jpg', 'T001'),
('C002', 'N222', 'fotodestinasi2.jpg', 'T002'),
('C003', 'N333', 'fotodestinasi3.jpg', 'T003'),
('C004', 'N444', 'fotodestinasi4.jpg', 'T004'),
('C005', 'N555', 'fotodestinasi5.jpg', 'T001'),
('C006', 'N666', 'fotodestinasi6.jpg', 'T002'),
('C007', 'N777', 'fotodestinasi7.jpg', 'T003'),
('C008', 'N888', 'fotodestinasi8.jpg', 'T004'),
('C009', 'N999', 'fotodestinasi9.jpg', 'T001');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(255) NOT NULL,
  `hotelFILE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelFILE`) VALUES
('H011', 'Pullman Hotel', 'Pullman Hotel.jpg'),
('H022', 'Merlynn Park Hotel', 'Merlynn Park Hotel.jpg'),
('H033', 'Apurva Kempinski Hotel', 'Apurva Kempinski Hotel.jpg'),
('H044', 'The Langham Hotel', 'The Langham Hotel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('K001', 'Jakarta', 'Monas', 'K101'),
('K002', 'Bali', 'Pura Ulun Danu Beratan', 'K102'),
('K003', 'Jogjakarta', 'Candi Borobudur', 'K103'),
('K004', 'Nusa Tenggara Timur', 'Pulau Komodo', 'K104');

-- --------------------------------------------------------

--
-- Table structure for table `oleholeh`
--

CREATE TABLE `oleholeh` (
  `olehKODE` char(4) NOT NULL,
  `olehNAMA` char(255) NOT NULL,
  `olehFILE` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oleholeh`
--

INSERT INTO `oleholeh` (`olehKODE`, `olehNAMA`, `olehFILE`) VALUES
('OO01', 'Pie', 'Pie.jpg'),
('OO02', 'Bakpia', 'Bakpia.jpg'),
('OO03', 'Dodol', 'Dodol.jpg'),
('OO04', 'Mochi', 'Mochi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `parkirKODE` char(4) NOT NULL,
  `parkirNAMA` char(255) NOT NULL,
  `parkirJENIS` char(255) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`parkirKODE`, `parkirNAMA`, `parkirJENIS`, `destinasiKODE`) VALUES
('P001', 'Vincentius', 'P115', 'T001'),
('P002', 'Kenaz Reisha', 'P200', 'T002'),
('P003', 'Marcell Budiman', 'P300', 'T003'),
('P004', 'Hansen Christian Lie', 'P400', 'T004');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `restoranKODE` char(4) NOT NULL,
  `restoranNAMA` char(255) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`restoranKODE`, `restoranNAMA`, `kategoriKODE`) VALUES
('R110', 'Masakan Jakarta', 'K001'),
('R220', 'Masakan Bali', 'K002'),
('R330', 'Masakan Jogjakarta', 'K003'),
('R440', 'Masakan Nusa Tenggara Timur', 'K004');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `saranID` char(4) NOT NULL,
  `saranNAMA` char(100) NOT NULL,
  `saranEMAIL` char(150) NOT NULL,
  `saranKOM` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`saranID`, `saranNAMA`, `saranEMAIL`, `saranKOM`) VALUES
('01', 'Kenaz Reisha', 'kenazgntng@gmail.com', 'Tampilan webnya terlihat menarik!'),
('02', 'Hansen Christian Lie', 'hansenClie@gmail.com', 'Informasi web ini sangat bermanfaat, terima kasih.'),
('03', 'Marcell Budiman', 'marcell123@gmail.com', 'Tampilan web ini seperti milik saya!'),
('04', 'Andres Malvin Jiu', 'dreso@gmail.com', 'Tolong tambahkan lagi isi dari konten web ini :D'),
('05', 'Nicolas', 'nicolasdrn@gmail.com', 'Berikan keterangan dari harga tiap hotel juga.'),
('06', 'Steven Lucio Austen', 'piringmelayang123@gmail.com', 'Kerja bagus!'),
('07', 'test1', 'test1', 'test1'),
('08', 'test2', 'test2', 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` char(4) NOT NULL,
  `travelJENIS` char(255) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `travelJENIS`, `kategoriKODE`) VALUES
('MM11', 'Motor', 'K001'),
('MM22', 'Mobil', 'K002'),
('MM33', 'Mini Bus', 'K003'),
('MM44', 'Tronton', 'K004');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('U001', 'vincenah', 'vincenah@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `vincentius`
--

CREATE TABLE `vincentius` (
  `vincentiusID` char(4) NOT NULL,
  `vincentiusKOTA` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vincentius`
--

INSERT INTO `vincentius` (`vincentiusID`, `vincentiusKOTA`, `destinasiKODE`) VALUES
('D001', 'Jakarta', 'T001'),
('D002', 'Bali', 'T002'),
('D003', 'Yogyakarta', 'T003'),
('D004', 'Nusa Tenggara Timur', 'T004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kategoriberitaKODE`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `oleholeh`
--
ALTER TABLE `oleholeh`
  ADD PRIMARY KEY (`olehKODE`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`parkirKODE`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`restoranKODE`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`saranID`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);

--
-- Indexes for table `vincentius`
--
ALTER TABLE `vincentius`
  ADD PRIMARY KEY (`vincentiusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
