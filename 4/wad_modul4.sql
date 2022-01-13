-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2021 pada 15.05
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
-- Database: `wad_modul4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `nama_tempat`, `lokasi`, `harga`, `tanggal`) VALUES
(16, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-30'),
(17, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(18, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(19, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(20, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(21, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(22, 6, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(25, 3, 'Tanah Lot', 'Bali', 5000000, '2021-11-28'),
(27, 14, 'Gunung Bromo', 'Malang', 2000000, '2021-11-28'),
(28, 14, 'Tanah Lot', 'Bali', 5000000, '2021-11-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_hp`, `password`) VALUES
(2, 'hanif', 'han@gmail.com', '085', '$2y$10$1oU2xbq3RggRObSLwV8QQONBhpauB3AqbK5mISLu21OXlan8y/LO6'),
(3, 'asd', 'asd@asd.com', '123', '$2y$10$qf1gKDRyTeaiiH.TGB2NvOuEEt5eVVrhnxjaJFjL6nbiPNhZtTZOW'),
(4, '', '', '', '$2y$10$ZOygaZ8bM7th9kaMWXFc3uu2Gk69ThFXQLxVhIjvQzFCcQF1fjFX.'),
(5, 'Hanif', 'han@han.com', '123', '$2y$10$/dSAhgZhHkLwRu7dgDyy4OluDra0Gce9vXFDaiyDYIsnsXe0mOvkC'),
(6, 'Hanif Muflihul Anwar', 'hanifmuflihulanwar@gmail.com', '085709728703', '$2y$10$j/LvxjYPnAVr1cEIAQLdF.tSmy/cXAoWkoQDOkTgrjBQRDVF9u04G'),
(7, '123', '123@123.com', '123', '$2y$10$MA5w/A8o8/0I6SmybiXNnukBv0z5Am57IUD0/zCHjAskuLkLdaUMC'),
(8, '12', '12@12.com', '12', '$2y$10$LvRM9/EqAGTYSbUI1GKZU.khaqKOaCQU2gLqHmjCnMteDyMGPrlAe'),
(9, '1', '1@1.com', '1', '$2y$10$F.Flg721Sj/LQ/0KGcohWuXIL0L.tuBiF69ZrHEwSYLXtXTlNJSHS'),
(10, 'wd', '12@122.com', '12', '$2y$10$qG7fybMZFHIZKd3qnSnAQuNBr6smMryW8LArM59aTazp8WdnUekeq'),
(11, '22', '22@22.com', '22', '$2y$10$nzmhXoVLat8CgH0mke422u3njH1lnoHyi/gtm21Hp0sDPNIevdxw.'),
(12, '21', '22@2222.com', '21', '$2y$10$hY31tUm0bU7tG8GG9lDvb.GFttqyQ2b75bfs7VWrA6uuZIzg1uzPe'),
(13, '11', '11@22.com', '1', '$2y$10$YgSj18FGdme16N9vXyDF.eiER1Jj7vKjayoveYOCL59EqzDrc9PMa'),
(14, 'aa', 'aa@aa.com', '123', '$2y$10$v4Y4986AeTWd/wa5GFz83O23Bq0f66Kr7da/oIv9J85bRmMUBA7A6'),
(15, 'zz', 'zz@zz.com', '123', '$2y$10$Ewvwp0zDunDl7gDd3Ul8wuxEczSSJ/wFT13Xw2oXpUkr2ahRtIfWi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
