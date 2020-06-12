-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2020 pada 07.26
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
-- Struktur dari tabel `access_dmt`
--

CREATE TABLE `access_dmt` (
  `id_access` int(11) NOT NULL,
  `nama_access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `access_dmt`
--

INSERT INTO `access_dmt` (`id_access`, `nama_access`) VALUES
(1, 'Super Admin'),
(2, 'PND'),
(3, 'Instruktur'),
(4, 'Operation'),
(5, 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ins_dmt`
--

CREATE TABLE `ins_dmt` (
  `id_ins` int(11) NOT NULL,
  `id_plth` int(20) NOT NULL,
  `ins1_ins` varchar(255) NOT NULL DEFAULT 'N/A',
  `ins2_ins` varchar(255) NOT NULL DEFAULT 'N/A',
  `ins3_ins` varchar(255) NOT NULL DEFAULT 'N/A',
  `ins4_ins` varchar(255) NOT NULL DEFAULT 'N/A',
  `ins5_ins` varchar(255) NOT NULL DEFAULT 'N/A',
  `sesins1_ins` int(255) NOT NULL,
  `sesins2_ins` int(255) NOT NULL,
  `sesins3_ins` int(255) NOT NULL,
  `sesins4_ins` int(255) NOT NULL,
  `sesins5_ins` int(255) NOT NULL,
  `beasesins1_ins` int(255) NOT NULL,
  `beasesins2_ins` int(255) NOT NULL,
  `beasesins3_ins` int(255) NOT NULL,
  `beasesins4_ins` int(255) NOT NULL,
  `beasesins5_ins` int(255) NOT NULL,
  `status_ins` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keu_dmt`
--

CREATE TABLE `keu_dmt` (
  `id_keu` int(11) NOT NULL,
  `id_plth` int(20) NOT NULL,
  `namaven_keu` varchar(255) NOT NULL,
  `namavenako_keu` varchar(255) NOT NULL,
  `tgldelinv_keu` int(255) NOT NULL,
  `tgldelinvako_keu` int(255) NOT NULL,
  `tglkorekinv_keu` int(255) NOT NULL,
  `tglkorekinvako_keu` int(255) NOT NULL,
  `tglprocessinv_keu` int(255) NOT NULL,
  `tglprocessinvako_keu` int(255) NOT NULL,
  `tglpayven_keu` int(255) NOT NULL,
  `tglpayvenako_keu` int(255) NOT NULL,
  `tgldeldokins_keu` int(255) NOT NULL,
  `tglpayhon_keu` int(255) NOT NULL,
  `status_keu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `opr_dmt`
--

CREATE TABLE `opr_dmt` (
  `id_opr` int(11) NOT NULL,
  `id_plth` int(20) NOT NULL,
  `glsarfas_opr` varchar(255) NOT NULL,
  `dokumen_opr` varchar(255) NOT NULL,
  `addcost_opr` int(255) NOT NULL,
  `pkba_opr` varchar(255) NOT NULL,
  `file_opr` varchar(255) NOT NULL,
  `status_opr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plth_dmt`
--

CREATE TABLE `plth_dmt` (
  `id_plth` int(11) NOT NULL,
  `nama_plth` varchar(255) NOT NULL,
  `ketpros_plth` varchar(255) NOT NULL,
  `batch_plth` varchar(20) NOT NULL,
  `tglmulai_plth` bigint(255) NOT NULL,
  `tgldone_plth` bigint(255) NOT NULL,
  `jmlpsrt_plth` int(100) NOT NULL,
  `sifat_plth` varchar(255) NOT NULL,
  `vendor_plth` varchar(255) NOT NULL,
  `sertifikasi_plth` varchar(255) NOT NULL,
  `nmvendor_plth` varchar(255) NOT NULL,
  `nmvenakom_plth` varchar(255) NOT NULL,
  `hrgkspvend_plth` bigint(255) NOT NULL,
  `ketkspvend_plth` varchar(255) NOT NULL,
  `memopem_plth` varchar(255) NOT NULL,
  `uniquefile_plth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sifat_dmt`
--

CREATE TABLE `sifat_dmt` (
  `id_sifat` int(11) NOT NULL,
  `nama_sifat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sifat_dmt`
--

INSERT INTO `sifat_dmt` (`id_sifat`, `nama_sifat`) VALUES
(1, 'Residensial'),
(2, 'Non Residensial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_dmt`
--

CREATE TABLE `user_dmt` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `lv_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_dmt`
--

INSERT INTO `user_dmt` (`id_user`, `nama_user`, `email_user`, `pass_user`, `lv_user`) VALUES
(9, 'Super Admin Tester', 'admin@rainbytelabs.com', '$2y$10$rNNgGolSz9aowTUfvyagVuotX02zI7LFqkkJJG23QdkFC16AL8MUK', 1),
(10, 'PND Tester', 'pnd@rainbytelabs.com', '$2y$10$2ObqljdPLYFFpElwwypnVeqOczvmYFV0nKKSoXyu/GiLj4xV.7b..', 2),
(11, 'Keuangan Tester', 'keuangan@rainbytelabs.com', '$2y$10$DaZT6AbXOUvFgsRM8bSLyOwSPfB7FVT/u0a9P8E1g8PsaIuIjJjDG', 5),
(12, 'Instruktur Tester', 'instruktur@rainbytelabs.com', '$2y$10$KVadTGRKBTohWTYa2Tjr.uNyI05cHA6lQetjbGjyLu6ep/EajEQl6', 3),
(13, 'Operation Tester', 'operation@rainbytelabs.com', '$2y$10$avawZJxoDTroSsqgN4AUmeHoDQFFklEbIAZt7rFAfCc/x1Qf0Wmia', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_dmt`
--

CREATE TABLE `vendor_dmt` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `vendor_dmt`
--

INSERT INTO `vendor_dmt` (`id_vendor`, `nama_vendor`) VALUES
(1, 'Vendor'),
(2, 'Non Vendor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_dmt`
--
ALTER TABLE `access_dmt`
  ADD PRIMARY KEY (`id_access`);

--
-- Indeks untuk tabel `ins_dmt`
--
ALTER TABLE `ins_dmt`
  ADD PRIMARY KEY (`id_ins`);

--
-- Indeks untuk tabel `keu_dmt`
--
ALTER TABLE `keu_dmt`
  ADD PRIMARY KEY (`id_keu`);

--
-- Indeks untuk tabel `opr_dmt`
--
ALTER TABLE `opr_dmt`
  ADD PRIMARY KEY (`id_opr`);

--
-- Indeks untuk tabel `plth_dmt`
--
ALTER TABLE `plth_dmt`
  ADD PRIMARY KEY (`id_plth`);

--
-- Indeks untuk tabel `sifat_dmt`
--
ALTER TABLE `sifat_dmt`
  ADD PRIMARY KEY (`id_sifat`);

--
-- Indeks untuk tabel `user_dmt`
--
ALTER TABLE `user_dmt`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vendor_dmt`
--
ALTER TABLE `vendor_dmt`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_dmt`
--
ALTER TABLE `access_dmt`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ins_dmt`
--
ALTER TABLE `ins_dmt`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keu_dmt`
--
ALTER TABLE `keu_dmt`
  MODIFY `id_keu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `opr_dmt`
--
ALTER TABLE `opr_dmt`
  MODIFY `id_opr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `plth_dmt`
--
ALTER TABLE `plth_dmt`
  MODIFY `id_plth` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sifat_dmt`
--
ALTER TABLE `sifat_dmt`
  MODIFY `id_sifat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_dmt`
--
ALTER TABLE `user_dmt`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `vendor_dmt`
--
ALTER TABLE `vendor_dmt`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
