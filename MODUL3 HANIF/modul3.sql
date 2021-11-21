-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2021 pada 14.10
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_table`
--

CREATE TABLE `buku_table` (
  `id_buku` int(100) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `tahun_terbit` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_table`
--

INSERT INTO `buku_table` (`id_buku`, `judul_buku`, `penulis_buku`, `tahun_terbit`, `deskripsi`, `gambar`, `tag`, `bahasa`) VALUES
(9, 'Tutorial Membuat Nasi Goreng Tanpa Nasi', 'Hanif_1202194185', 1990, 'Buku dari masa depan Buku dari masa depan Buku dari masa depan\r\nBuku dari masa depan', '1732753118_judul buku.png', ' Pemrograman, Lainnya', 'Lainnya'),
(10, 'Kiat kiat kiamat', 'Hanif_1202194185', 2012, 'Buku ini ga tau isinya apa', '237752833_Screenshot_3.png', ' OOP', 'Indonesia'),
(11, 'Ini Judul Buku', 'Hanif_1202194185', 1202, 'Ini Buku Jadul', '737338920_judul buku.png', ' Pemrograman, Website, Java, OOP, MVC, Kalkulus, Lainnya', 'Lainnya'),
(12, 'Kiamat jilid 2', 'Hanif_1202194185', 4140, 'Buku ngawur iki', '400749592_Screenshot_3.png', '', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_table`
--
ALTER TABLE `buku_table`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_table`
--
ALTER TABLE `buku_table`
  MODIFY `id_buku` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
