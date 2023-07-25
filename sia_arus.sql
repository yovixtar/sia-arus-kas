-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 12.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_arus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `kode_akun` varchar(255) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `jenis_akun` varchar(30) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `id_user` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `kode_akun`, `nama_akun`, `jenis_akun`, `saldo_awal`, `id_user`) VALUES
(1, '51110', 'biaya gaji', 'pasiva', 0, ''),
(4, '51125', 'biaya listrik', 'aktiva', 0, ''),
(5, '11110', 'Kas Tunai', 'aktiva', 0, ''),
(6, '11120', 'Kas Bank', 'aktiva', 0, ''),
(7, '12110', 'Inventaris & Harta Tetap', 'aktiva', 0, ''),
(8, '12111', 'Akumulasi Penyusutan Inventaris & HT', 'aktiva', 0, ''),
(9, '31110', 'Modal', 'aktiva', 50000000, ''),
(10, '41120', 'Pendapatan Lain', 'pasiva', 0, ''),
(11, '51115', 'Biaya Kantor', 'pasiva', 0, ''),
(12, '51120', 'Biaya Alat Tulis', 'pasiva', 0, ''),
(13, '51130', 'Biaya Air', 'pasiva', 0, ''),
(14, '51135', 'Biaya Transport', 'pasiva', 0, ''),
(15, '51140', 'Biaya Internet', 'pasiva', 0, ''),
(16, '51145', 'Biaya Penyusutan Inventaris & HT', 'pasiva', 0, ''),
(17, '52110', 'Biaya Administrasi Bank', 'pasiva', 0, ''),
(18, '52120', 'Biaya Pajak', 'pasiva', 0, ''),
(19, '41110', 'Penjualan', 'aktiva', 0, ''),
(20, 'hanif', 'hanif', 'aktiva', 12, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru_staf`
--

CREATE TABLE `tb_guru_staf` (
  `id_guru_staf` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `pegawai` varchar(100) DEFAULT NULL,
  `aktif` varchar(50) DEFAULT 'Ya'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru_staf`
--

INSERT INTO `tb_guru_staf` (`id_guru_staf`, `nama`, `alamat`, `no_telp`, `username`, `password`, `hak_akses`, `status`, `pegawai`, `aktif`) VALUES
(2, 'Budi Jatmiko, S.Pd.SD', 'Cepokokuning Batang', '089154678812', 'ben', 'ben', 'Bendahara', 'Guru', 'PNS', 'Ya'),
(3, 'Rafika Efri Dayani, S.M', 'Jl. RE. Martadinata Pekuncen Batang', '082567446381', 'tu', 'tu', 'Petugas TU', 'Guru', 'Honorer', 'Ya'),
(4, 'Inswide, S.Ag., M.Pd', 'Jl. RE. Martadinata Pandean', '086324517878', 'kep', 'kep', 'Kepala Sekolah', 'Guru', NULL, 'Ya'),
(5, 'Joni Setiawan, S.Pd.SD', 'Proyonanggan Utara Batang', '085967813451', '', '', '', 'Guru', NULL, 'Ya'),
(6, 'Inamah Firo, S.Pd.', 'Karangayar Batang', '081345672333', 'opo', 'opo', 'Bendahara', 'Guru', 'Honorer', 'Ya'),
(7, 'Intan Bandarini, S.Pd', 'Jl. Yos Sudarsoh Pejangkaran Batang', '085627382975', '', '', '', 'Guru', NULL, 'Ya'),
(8, 'Vera Andriana, S.Pd.', 'Cepokokuning Batang', '085219839130', '', '', '', 'Guru', NULL, 'Tidak'),
(9, 'Uun Safitri', 'Kalipucang Kulon Batang', '085923779520', '', '', '', 'Petugas TU', 'Honorer', 'Ya'),
(10, 'Suhartiningtyas', 'Kalipucang Kulon Batang', '089628118166', '', '', '', 'Guru', NULL, 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_detail`
--

CREATE TABLE `tb_jurnal_detail` (
  `id_jurnal_detail` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `kode_akun` varchar(100) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurnal_detail`
--

INSERT INTO `tb_jurnal_detail` (`id_jurnal_detail`, `id_jurnal`, `kode_akun`, `debit`, `kredit`) VALUES
(1, 1, '11110', 10000000, 0),
(2, 1, '41110', 0, 10000000),
(3, 2, '11110', 323424343, 0),
(4, 2, '41110', 0, 323424343),
(5, 3, '11110', 34234343, 0),
(6, 3, '41110', 0, 34234343),
(7, 4, '11110', 2147483647, 0),
(8, 4, '41110', 0, 2147483647),
(9, 5, '11110', 2434, 0),
(10, 5, '11120', 0, 2434),
(11, 6, '11110', 0, 323443),
(12, 6, '51115', 323443, 0),
(13, 7, '11110', 6000000, 0),
(14, 7, '41110', 0, 6000000),
(15, 8, '11110', 0, 2147483647),
(16, 8, '51110', 2147483647, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_header`
--

CREATE TABLE `tb_jurnal_header` (
  `id_jurnal` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurnal_header`
--

INSERT INTO `tb_jurnal_header` (`id_jurnal`, `id_transaksi`, `tanggal`, `keterangan`) VALUES
(1, '0', '2023-06-17', 'Kas Masuk Penjualan Seragam'),
(2, '0', '2023-06-17', 'Kas Masuk Penjualan Seragam'),
(3, '3', '2023-06-17', 'Kas Masuk BOS'),
(4, '4', '2023-06-17', 'Kas Masuk Penjualan Seragam'),
(5, '5', '2023-06-17', 'Kas Masuk BOS'),
(6, '1', '2023-06-17', 'Kas Keluar eawdas'),
(7, '6', '2023-06-18', 'Kas Masuk Penjualan Seragam'),
(8, '2', '2023-06-18', 'Kas Keluar Gajiannnn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas_keluar`
--

CREATE TABLE `tb_kas_keluar` (
  `id_kas_keluar` int(11) NOT NULL,
  `no_transaksi` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_guru_staf` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kas_keluar`
--

INSERT INTO `tb_kas_keluar` (`id_kas_keluar`, `no_transaksi`, `tanggal`, `jenis`, `jumlah`, `id_guru_staf`, `keterangan`) VALUES
(1, '01/KK/06/2023', '2023-06-17', '51115', 323443, NULL, 'eawdas'),
(2, '02/KK/06/2023', '2023-06-18', '51110', 2147483647, NULL, 'Gajiannnn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas_masuk`
--

CREATE TABLE `tb_kas_masuk` (
  `id_kas_masuk` int(11) NOT NULL,
  `no_transaksi` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sumber` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_guru_staf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kas_masuk`
--

INSERT INTO `tb_kas_masuk` (`id_kas_masuk`, `no_transaksi`, `tanggal`, `sumber`, `jumlah`, `id_guru_staf`) VALUES
(2, 'ds', '2023-06-05', 'ds', 434, NULL),
(3, '03/KM/06/2023', '2023-06-17', 'BOS', 34234343, NULL),
(4, '04/KM/06/2023', '2023-06-17', 'Penjualan Seragam', 2147483647, NULL),
(5, '05/KM/06/2023', '2023-06-17', 'BOS', 2434, NULL),
(6, '06/KM/06/2023', '2023-06-18', 'Penjualan Seragam', 6000000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tb_guru_staf`
--
ALTER TABLE `tb_guru_staf`
  ADD PRIMARY KEY (`id_guru_staf`);

--
-- Indeks untuk tabel `tb_jurnal_detail`
--
ALTER TABLE `tb_jurnal_detail`
  ADD PRIMARY KEY (`id_jurnal_detail`);

--
-- Indeks untuk tabel `tb_jurnal_header`
--
ALTER TABLE `tb_jurnal_header`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indeks untuk tabel `tb_kas_keluar`
--
ALTER TABLE `tb_kas_keluar`
  ADD PRIMARY KEY (`id_kas_keluar`);

--
-- Indeks untuk tabel `tb_kas_masuk`
--
ALTER TABLE `tb_kas_masuk`
  ADD PRIMARY KEY (`id_kas_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_guru_staf`
--
ALTER TABLE `tb_guru_staf`
  MODIFY `id_guru_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal_detail`
--
ALTER TABLE `tb_jurnal_detail`
  MODIFY `id_jurnal_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal_header`
--
ALTER TABLE `tb_jurnal_header`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_kas_keluar`
--
ALTER TABLE `tb_kas_keluar`
  MODIFY `id_kas_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kas_masuk`
--
ALTER TABLE `tb_kas_masuk`
  MODIFY `id_kas_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
