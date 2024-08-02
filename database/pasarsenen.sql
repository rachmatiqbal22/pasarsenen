-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 03.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Pengirim'),
(3, 'Penjual'),
(4, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sayur`
--

CREATE TABLE `tb_sayur` (
  `id_sayur` int(11) NOT NULL,
  `nama_sayur` varchar(150) NOT NULL,
  `nama_pedagang` varchar(150) NOT NULL,
  `harga` varchar(150) NOT NULL,
  `stok` int(11) NOT NULL,
  `status_sayur` varchar(150) NOT NULL,
  `gambar_sayur` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_sayur`
--

INSERT INTO `tb_sayur` (`id_sayur`, `nama_sayur`, `nama_pedagang`, `harga`, `stok`, `status_sayur`, `gambar_sayur`) VALUES
(8, 'Sate Ayam', '11000', 15, 'tersedia', 'Sate Ayam.jpeg'),
(14, 'Sayur Asem', '7500', 78, 'tersedia', 'Sayur Asem.jpeg'),
(18, 'Ayam Geprek', '11000', 7, 'tersedia', 'Ayam Geprek.jpeg'),
(19, 'Nasi Pecel', '7000', 23, 'tersedia', 'Nasi Pecel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_pengunjung` int(11) NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `total_harga` varchar(150) NOT NULL,
  `uang_bayar` varchar(150) DEFAULT NULL,
  `uang_kembali` varchar(150) DEFAULT NULL,
  `status_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_admin`, `id_pengunjung`, `waktu_pesan`, `alamat`, `total_harga`, `uang_bayar`, `uang_kembali`, `status_order`) VALUES
(14, 1, 9, '2019-08-03 12:43:52', 1, '48000', '50000', '2000', 'sudah bayar'),
(15, 1, 1, '2019-08-04 16:25:45', 1, '44000', '50000', '6000', 'sudah bayar'),
(16, 1, 1, '2019-08-04 16:35:24', 8, '105500', '150000', '44500', 'sudah bayar'),
(18, 1, 7, '2019-08-04 16:37:58', 8, '87000', '100000', '13000', 'sudah bayar'),
(19, 1, 1, '2019-08-04 17:17:09', 1, '22000', '50000', '28000', 'sudah bayar'),
(20, 1, 6, '2019-08-04 18:04:22', 8, '29500', '50000', '20500', 'sudah bayar'),
(21, 0, 10, '2019-08-07 08:54:23', 1, '22000', '', '', 'belum bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_sayur` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status_pesan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_order`, `id_sayur`, `jumlah`, `status_pesan`) VALUES
(33, 9, 14, 14, 2, 'sudah'),
(34, 9, 14, 8, 3, 'sudah'),
(35, 1, 15, 19, 2, 'sudah'),
(36, 1, 15, 14, 4, 'sudah'),
(37, 1, 16, 19, 3, 'sudah'),
(38, 1, 16, 14, 1, 'sudah'),
(39, 1, 16, 8, 7, 'sudah'),
(43, 7, 18, 19, 4, 'sudah'),
(44, 7, 18, 14, 2, 'sudah'),
(45, 7, 18, 8, 4, 'sudah'),
(46, 1, 19, 19, 1, 'sudah'),
(47, 1, 19, 14, 2, 'sudah'),
(48, 6, 20, 8, 2, 'sudah'),
(49, 6, 20, 14, 1, 'sudah'),
(50, 10, 21, 18, 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `status_cetak` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `id_pesan`, `jumlah_terjual`, `status_cetak`) VALUES
(1, 46, 1, 'belum cetak'),
(2, 47, 2, 'belum cetak'),
(3, 48, 2, 'belum cetak'),
(4, 49, 1, 'belum cetak'),
(5, 50, 2, 'belum cetak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`, `status`, `no_hp`) VALUES
(1, 'hendrik24', '123', 'Hendrik Setiawan', 1, 'aktif', '081234567890'),
(6, 'hendro', '123', 'Hendro', 2, 'aktif', '081234567891'),
(7, 'fitri', '123', 'Fitri', 3, 'aktif', '081234567892'),
(8, 'slamet', '123', 'Slamet', 4, 'aktif', '081234567893'),
(9, 'sugiastutik', '123', 'Sugiastutik', 4, 'aktif', '081234567894'),
(10, 'topik', '123', 'Moh Taofik RR', 5, 'aktif', '081234567895'),
(11, 'selpi', '123', 'Selviana Ariani', 5, 'aktif', '081234567896'),
(12, 'kesi', '123', 'Sukesi', 5, 'aktif', '081234567897');


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_sayur`
--
ALTER TABLE `tb_sayur`
  ADD PRIMARY KEY (`id_sayur`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_sayur`
--
ALTER TABLE `tb_sayur`
  MODIFY `id_sayur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;