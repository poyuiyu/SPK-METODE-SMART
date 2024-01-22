-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 10.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Fahri Aulia Alfarisi Harahap', 'Fahri Aulia Alfarisi Harahap', '123456'),
(2, 'Ronaldo', 'Ronaldo', '111111'),
(3, 'Anggi', 'Anggi', '222222'),
(4, 'admin', 'admin', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `kode_kost` int(50) NOT NULL,
  `nama_kost` varchar(50) NOT NULL,
  `daerah_kost` varchar(50) NOT NULL,
  `nama_jalan_kost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id_kost`, `kode_kost`, `nama_kost`, `daerah_kost`, `nama_jalan_kost`) VALUES
(7, 1, 'Kost Laut Dendang', 'Lau Dendang', 'Jalan Garapan Lau Dendang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria_kost`
--

CREATE TABLE `kriteria_kost` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria_kost`
--

INSERT INTO `kriteria_kost` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(10, 'Fasilitas', 20),
(11, 'Harga', 30),
(12, 'Subjektif ( Keamanan, Kebersihan, Kerapian )', 10),
(13, 'Sistem Kontrak', 5),
(14, 'Jarak Dengan Daerah Kampus', 15),
(15, 'Luas Kamar', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kode_kost` int(50) NOT NULL,
  `fasilitas` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `subjektif` int(50) NOT NULL,
  `sistem_kontrak` int(50) NOT NULL,
  `jarak_ke_kampus` int(50) NOT NULL,
  `luas_kamar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kode_kost`, `fasilitas`, `harga`, `subjektif`, `sistem_kontrak`, `jarak_ke_kampus`, `luas_kamar`) VALUES
(1, 100, 20, 50, 80, 70, 30);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indeks untuk tabel `kriteria_kost`
--
ALTER TABLE `kriteria_kost`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kriteria_kost`
--
ALTER TABLE `kriteria_kost`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
