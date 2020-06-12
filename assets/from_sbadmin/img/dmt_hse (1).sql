-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2020 pada 11.57
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmt_hse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertakeu_dmt`
--

CREATE TABLE `pesertakeu_dmt` (
  `id_pesertakeu` int(11) NOT NULL,
  `id_plth` int(20) NOT NULL,
  `tglbuatinv_pesertakeu` int(255) NOT NULL,
  `tglkiriminv_pesertakeu` int(255) NOT NULL,
  `tglterimainv_pesertakeu` int(255) NOT NULL,
  `tglpayinv_pesertakeu` int(255) NOT NULL,
  `ket_pesertakeu` varchar(255) NOT NULL,
  `status_pesertakeu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesertakeu_dmt`
--

INSERT INTO `pesertakeu_dmt` (`id_pesertakeu`, `id_plth`, `tglbuatinv_pesertakeu`, `tglkiriminv_pesertakeu`, `tglterimainv_pesertakeu`, `tglpayinv_pesertakeu`, `ket_pesertakeu`, `status_pesertakeu`) VALUES
(1, 11, 0, 0, 0, 0, '6', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertapnd_dmt`
--

CREATE TABLE `pesertapnd_dmt` (
  `id_pesertapnd` int(11) NOT NULL,
  `id_plth` int(20) NOT NULL,
  `trfplth_pesertapnd` int(255) NOT NULL,
  `jmldtgh_pesertapnd` int(255) NOT NULL,
  `nmptmeng_pesertapnd` varchar(255) NOT NULL,
  `surund_pesertapnd` varchar(255) NOT NULL,
  `rawsurund_pesertapnd` varchar(255) NOT NULL,
  `status_pesertapnd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesertapnd_dmt`
--

INSERT INTO `pesertapnd_dmt` (`id_pesertapnd`, `id_plth`, `trfplth_pesertapnd`, `jmldtgh_pesertapnd`, `nmptmeng_pesertapnd`, `surund_pesertapnd`, `rawsurund_pesertapnd`, `status_pesertapnd`) VALUES
(1, 11, 10000, 12, 'PT Maju Mundur', 'IMG_20190410_111141.jpg', '1591424348IMG_20190410_111141.jpg', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesertakeu_dmt`
--
ALTER TABLE `pesertakeu_dmt`
  ADD PRIMARY KEY (`id_pesertakeu`);

--
-- Indeks untuk tabel `pesertapnd_dmt`
--
ALTER TABLE `pesertapnd_dmt`
  ADD PRIMARY KEY (`id_pesertapnd`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesertakeu_dmt`
--
ALTER TABLE `pesertakeu_dmt`
  MODIFY `id_pesertakeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesertapnd_dmt`
--
ALTER TABLE `pesertapnd_dmt`
  MODIFY `id_pesertapnd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
