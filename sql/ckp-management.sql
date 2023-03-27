-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2023 pada 04.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ckp-management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bt_selected`
--

CREATE TABLE `bt_selected` (
  `id` int(11) NOT NULL,
  `bt` varchar(128) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bt_selected`
--

INSERT INTO `bt_selected` (`id`, `bt`, `bulan`, `tahun`) VALUES
(1, '0623', '', 2023);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_tahun`
--

CREATE TABLE `bulan_tahun` (
  `id` int(11) NOT NULL,
  `kode_bulan` varchar(4) NOT NULL,
  `bulan` varchar(128) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bulan_tahun`
--

INSERT INTO `bulan_tahun` (`id`, `kode_bulan`, `bulan`, `tahun`) VALUES
(1, '0123', 'januari', '2023'),
(2, '0223', 'februari', '2023'),
(5, '0323', 'maret', '2023'),
(6, '0423', 'april', '2023'),
(7, '0523', 'mei', '2023'),
(8, '0623', 'juni', '2023'),
(9, '0723', 'juli', '2023'),
(10, '0823', 'agustus', '2023'),
(11, '0923', 'september', '2023'),
(12, '1023', 'oktober', '2023'),
(13, '1123', 'november', '2023'),
(14, '1223', 'desember', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_belanja`
--

CREATE TABLE `daftar_belanja` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `belanja_1` int(128) NOT NULL,
  `belanja_2` int(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `bt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_belanja`
--

INSERT INTO `daftar_belanja` (`id`, `tanggal`, `belanja_1`, `belanja_2`, `ket`, `bt`) VALUES
(7, '02/07/23', 100000, 0, 'asdasdas', '0223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasbon`
--

CREATE TABLE `kasbon` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kasbon` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasbon`
--

INSERT INTO `kasbon` (`id`, `nama`, `kasbon`) VALUES
(1, 'fuad', 100000),
(2, 'other', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_list`
--

CREATE TABLE `po_list` (
  `id` int(11) NOT NULL,
  `po_ke` varchar(128) NOT NULL,
  `tgl_po` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `po_list`
--

INSERT INTO `po_list` (`id`, `po_ke`, `tgl_po`) VALUES
(2, '2', '25/11/2022'),
(5, '3', '1/01/2023'),
(13, '4', '2023-02-16'),
(15, '1', '2022-10-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_tinta`
--

CREATE TABLE `po_tinta` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `warna` varchar(1) NOT NULL,
  `tinta` varchar(10) NOT NULL,
  `terjual` int(6) NOT NULL,
  `modal` int(6) NOT NULL,
  `untung` int(6) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `po_ke` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `po_tinta`
--

INSERT INTO `po_tinta` (`id`, `tanggal`, `warna`, `tinta`, `terjual`, `modal`, `untung`, `customer`, `po_ke`) VALUES
(5, '04/03/23', 'K', 'Canon', 50000, 30000, 20000, '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `saldo` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id`, `saldo`, `nominal`) VALUES
(1, 'Sisa Saldo', 2890000),
(2, 'ATM', 2000000),
(3, 'Cash', 900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `barang` varchar(128) NOT NULL,
  `blb` varchar(128) NOT NULL,
  `nominal_blb` int(128) NOT NULL,
  `kulakan` int(128) NOT NULL,
  `harga_jual` int(128) NOT NULL,
  `laba` int(128) NOT NULL,
  `ket` varchar(128) NOT NULL,
  `nota` int(128) NOT NULL,
  `bt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `tanggal`, `customer`, `alamat`, `barang`, `blb`, `nominal_blb`, `kulakan`, `harga_jual`, `laba`, `ket`, `nota`, `bt`) VALUES
(59, '02/02/23', 'Ds Mangun legi', 'Mangunan', 'DCP 2540DW', '', 0, 0, 75000, 75000, 'Cleaning Doctor blade', 75000, '0223'),
(60, '01/02/23', 'Mbh Yar', 'Kuniran', 'TV', '', 0, 0, 20000, 20000, 'CUp', 20000, '0223'),
(61, '04/01/23', 'Pak karomen', 'maguan', 'L310', '', 0, 0, 250000, 250000, 'Ganti adaptor', 250000, '0123'),
(62, '06/01/23', 'Baldes Sumur gayam', 'kragan', 'L3110', '', 0, 0, 100000, 100000, 'Service mekanik roll penarik kertas', 120000, '0123'),
(63, '07/01/23', 'SMP N 1 Batangan', 'Batangan', 'G2000', 'CH-7', 430000, 0, 25000, 25000, 'Ganti CT CH-7', 255000, '0123'),
(64, '07/01/23', 'SMP N 1 Batangan', 'Batangan', 'IC Epromm g2000', '', 0, 0, 250000, 250000, 'Ganti IC eproom g Series', 250000, '0123'),
(65, '09/01/23', 'Pak Bowo Dinsos', 'rembang', 'DCP 2540DW', '', 0, 10000, 130000, 120000, 'Refil TN2356', 150000, '0123'),
(66, '10/01/23', 'SMP N 1 Batangan', 'Batangan', 'MX497', '745 &amp; 746', 546000, 0, 87000, 87000, 'Ganti CT 745 746', 633000, '0123'),
(67, '12/01/22', 'MI Raci', 'Batangan', 'CPU', 'Hdd, Wifi, PSU', 299000, 0, 291000, 291000, 'Ganti BLB', 594000, '0123'),
(68, '11/01/23', 'TK Pinggan', 'Sulang', 'TR4570', '', 0, 50000, 130000, 80000, 'Memasang Infus', 150000, '0123'),
(69, '12/01/23', 'TK Dukoh', 'Kaliori', 'MP287', '810 811', 525000, 0, 150000, 150000, 'Ganti CT BLB', 675000, '0123'),
(70, '13/01/23', 'DPU Taru', 'Rembang', 'DCP 2540DW', '', 0, 10000, 150000, 140000, 'Refil TN2356', 150000, '0123'),
(71, '13/01/23', 'BMT Harum', 'Rembang', 'L3110', '', 0, 0, 50000, 50000, 'Cleaning', 50000, '0123'),
(72, '13/01/23', 'Bu Ayu Dresi', 'Kaliori', 'DCP 2540DW', '', 0, 10000, 130000, 120000, 'Refil TN2356', 150000, '0123'),
(73, '16/01/23', 'Paud Gingsir', 'Kaliori', 'L Lenovo', 'SSD', 179000, 0, 101000, 101000, 'Ganti SSD', 280000, '0123'),
(74, '17/01/23', 'Ds Sumur Gayam', 'Kragan', 'L3110', 'IC Powe, TR,ADP', 236000, 0, 14000, 14000, 'Ganti BLB', 250000, '0123'),
(75, '19/01/23', 'Bu Wahyu', 'Rembang', 'IP2770', '810, Board', 290000, 0, 275000, 275000, 'ganti Board dan CT', 565000, '0123'),
(76, '20/01/23', 'Baldes PasarBanggi', 'Rembang', 'DCP 2540DW', '', 0, 10000, 130000, 120000, 'Refil TN2356', 150000, '0123'),
(77, '20/01/23', 'Baldes PasarBanggi', 'Rembang', 'LP HP Axio', '', 0, 0, 40000, 40000, 'Aktivasi dan Install Office', 50000, '0123'),
(78, '21/01/23', 'SMK Taruna Bulu', 'Sulang', 'Canon G210', '', 0, 0, 100000, 100000, 'Paper jam', 10000, '0123'),
(79, '26/01/23', 'Bu Dwi Landoh', 'Sulang', 'IP2770', '', 0, 0, 70000, 70000, 'Service CT', 90000, '0123'),
(80, '27/01/23', 'pak Joko DPU taru', 'Rembang', 'MP287', '811', 270000, 0, 90000, 90000, 'Ganti CT 811', 260000, '0123'),
(81, '27/01/23', 'pak Joko DPU taru', 'Rembang', 'MP287', 'Infus', 0, 50000, 150000, 100000, 'Ganti BLB', 150000, '0123'),
(82, '28/01/23', 'Mbkn Susanti', 'Rembang', 'MP287', '', 0, 0, 80000, 80000, 'Service CT', 100000, '0123'),
(83, '30/01/23', 'Kec Batangan', 'Batangan', 'IP2770', '810', 215000, 0, 80000, 80000, 'ganti CT 811', 295000, '0123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tinta`
--

CREATE TABLE `tinta` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `warna` varchar(2) NOT NULL,
  `tinta` varchar(128) NOT NULL,
  `terjual` int(128) NOT NULL,
  `modal` int(128) NOT NULL,
  `untung` int(128) NOT NULL,
  `customer` varchar(128) NOT NULL,
  `bt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tinta`
--

INSERT INTO `tinta` (`id`, `tanggal`, `warna`, `tinta`, `terjual`, `modal`, `untung`, `customer`, `bt`) VALUES
(8, '06/01/23', 'M', 'Canon', 50000, 30000, 20000, 'aa', '0223'),
(11, '03/03/23', 'Y', 'Epson 003', 50000, 30000, 20000, 'aa', '0323');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bt_selected`
--
ALTER TABLE `bt_selected`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_belanja`
--
ALTER TABLE `daftar_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kasbon`
--
ALTER TABLE `kasbon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_list`
--
ALTER TABLE `po_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `po_tinta`
--
ALTER TABLE `po_tinta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tinta`
--
ALTER TABLE `tinta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bt_selected`
--
ALTER TABLE `bt_selected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `daftar_belanja`
--
ALTER TABLE `daftar_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kasbon`
--
ALTER TABLE `kasbon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `po_list`
--
ALTER TABLE `po_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `po_tinta`
--
ALTER TABLE `po_tinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `tinta`
--
ALTER TABLE `tinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
