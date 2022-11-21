-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Nov 2022 pada 02.14
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18246162_db_inventorirs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `penginput_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `tanggal_input_barang` varchar(20) NOT NULL,
  `tanggal_terima_barang` varchar(10) NOT NULL,
  `asal_donatur` varchar(50) NOT NULL,
  `pemberi` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kuantitas` int(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan_harga` varchar(100) NOT NULL,
  `kondisi_barang` text NOT NULL,
  `surat_resmi_donasi` varchar(100) NOT NULL,
  `surat_tugas_pengambilan` varchar(100) NOT NULL,
  `surat_serah_terima` varchar(100) NOT NULL,
  `foto_dokumentasi_serah_terima` varchar(100) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `sertifikat_ucapan_terima_kasih` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `penginput_barang`, `nama_barang`, `tanggal_input_barang`, `tanggal_terima_barang`, `asal_donatur`, `pemberi`, `jenis_barang`, `kuantitas`, `satuan`, `keterangan_harga`, `kondisi_barang`, `surat_resmi_donasi`, `surat_tugas_pengambilan`, `surat_serah_terima`, `foto_dokumentasi_serah_terima`, `foto_barang`, `sertifikat_ucapan_terima_kasih`) VALUES
(68, 'Mila', 'PEPSODENT MOUNTWASH', '2022-02-21', '2022-02-15', 'Pihak Swasta', 'PT. UNILEVER TBK', 'Cairan Rumah Tangga', 0, 'BOTOL', 'Rp. 30.500', 'Baik/Standar', '', '', 'BAST_PT__UNILEVER_TBK_15022022.pdf', 'WhatsApp_Image_2022-02-15_at_11_02_36.jpeg', '', ''),
(69, 'Mila', 'MASKER BEDAH', '2022-02-21', '2022-02-18', 'Pihak Swasta', 'PT. MNG', 'Alat Pelindung Diri', 0, 'BOX', 'Rp. 28.900', 'Baik/Standar', '', '', 'BAST_18022022_Donasi_Masker_PT__MNG.pdf', 'WhatsApp_Image_2022-02-18_at_11_46_35.jpeg', '', ''),
(70, 'Mila', 'ACTIV WATER ORANGE', '2022-03-15', '2022-02-23', 'Pihak Swasta', 'PT. MARGA NUSANTARA JAYA', 'Lain-lain', 264, 'BOTOL', 'Rp. 6.300', 'Baik/Standar', '', '', 'BAST_23022022_PT_Marga_Nusantara.pdf', 'PT__Marga_Nusantara_18022022.jpeg', '', ''),
(72, 'Mila', 'ACTIV WATER LEMON ', '2022-03-15', '2022-02-23', 'Pihak Swasta', 'PT. MARGA NUSANTARA JAYA', 'Lain-lain', 456, 'BOTOL', 'Rp. 6.300', 'Baik/Standar', '', '', 'BAST_23022022_PT_Marga_Nusantara1.pdf', 'PT__MARGA_NUSANTARA_23022022.jpeg', '', ''),
(73, 'Mila', 'AIR PURIFIER AP-6034-SKY', '2022-03-15', '2022-03-14', 'Pihak Swasta', 'MODENA INDONESIA', 'Barang Rumah Tangga', 2, 'UNIT', 'Rp. 3.156.000', 'Baik/Standar', '', '', 'BAST_14032022_Air_Purifier_Modena_(hibah)1.pdf', 'MODENA_INDONESIA_140320221.jpeg', '', ''),
(76, 'Mila', 'ELISA READER ( THERMO FISHER SCIENTIFIC)', '2022-03-15', '2022-03-14', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BHP)', 1, 'UNIT', 'Rp. 418.132.000', 'Baik/Standar', '', '', 'BAST_14032022_hibah_alat_lab_dari_KSEI2.pdf', 'PT_KSEI_140320222.jpeg', '', ''),
(77, 'Mila', 'DEEP FREEZER', '2022-03-15', '2022-03-14', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 187.000.000', 'Baik/Standar', '', '', 'BAST_14032022_hibah_alat_lab_dari_KSEI3.pdf', 'PT_KSEI_140320223.jpeg', '', ''),
(78, 'Mila', 'INFUS PUM TERUMO TE*LM730N03 TYPE LM3', '2022-03-17', '2022-03-15', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan', 2, 'UNIT', 'Rp. 101.200.000', 'Baik/Standar', '', '', 'BAST_15032022_Hibah_alat_Infusion_Pump_dan_Syiringe_Pump_(PT_KSEI).pdf', 'PT_KSEI_15032022.jpeg', '', ''),
(79, 'Mila', 'SYRING PUMP TERUMO TE*SS730N03 TYPE SS3', '2022-03-17', '2022-03-15', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 2, 'UNIT', 'Rp. 70.400.000', 'Baik/Standar', '', '', 'BAST_15032022_Hibah_alat_Infusion_Pump_dan_Syiringe_Pump_(PT_KSEI)1.pdf', 'PT_KSEI_150320221.jpeg', '', ''),
(80, 'Mila', 'SENTRIFUSE HIGHSPEED EPPENDROF ANGLE ROT', '2022-03-17', '2022-03-16', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 192.500.000', 'Baik/Standar', '', '', 'BAST_16032022_PT_KSEI_alat_lab.pdf', 'PT_KSEI_16032022.jpeg', '', ''),
(81, 'Mila', 'SENTIFUSE SMALL SIZE EPPERNDROF MINI CEN', '2022-03-17', '2022-03-16', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 80.300.000', 'Baik/Standar', '', '', 'BAST_16032022_PT_KSEI_alat_lab1.pdf', 'PT_KSEI_160320221.jpeg', '', ''),
(82, 'Mila', 'MICROSCOPIC BINOCULER DIGITAL NIKON BIOL', '2022-03-17', '2022-03-16', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 110.000.000', 'Baik/Standar', '', '', 'BAST_16032022_PT_KSEI_alat_lab2.pdf', 'PT_KSEI_160320222.jpeg', '', ''),
(83, 'Mila', 'MICROSCOPIC CAHAYA NIKON BIOLOGICAL TRIN', '2022-03-17', '2022-03-16', 'Pihak Swasta', 'PT. KSEI (PANITIA HUT KE-44)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 99.000.000', 'Baik/Standar', '', '', 'BAST_16032022_PT_KSEI_alat_lab3.pdf', 'PT_KSEI_160320223.jpeg', '', ''),
(87, 'Mila', 'BONEKA BESAR', '2022-04-21', '2022-04-21', 'Pihak Swasta', 'KOMUNITAS KASIH UNTUK NEGERI', 'Lain-lain', 2, 'BUAH', 'Rp. 220.000', 'Baik/Standar', 'BAST_21042022_KOMUNITAS_KASIH_UNTUK_NEGERI.pdf', '', '', 'SERAH_TERIMA_DONASI_BONEKA.jpeg', 'FOTO_BONEKA_DONASI.jpeg', ''),
(88, 'Mila', 'BONEKA KECIL (KUDA PONI)', '2022-04-21', '2022-04-21', 'Pihak Swasta', 'KOMUNITAS KASIH UNTUK NEGERI', 'Lain-lain', 60, 'PCS', 'Rp. 70.000', 'Baik/Standar', 'BAST_21042022_KOMUNITAS_KASIH_UNTUK_NEGERI1.pdf', '', 'BAST_21042022_KOMUNITAS_KASIH_UNTUK_NEGERI.pdf', 'SERAH_TERIMA_DONASI_BONEKA1.jpeg', 'FOTO_BONEKA_DONASI1.jpeg', ''),
(89, 'Mila', 'BUKU BACAAN', '2022-06-09', '2022-04-21', 'Pihak Swasta', 'KOMUNITAS KASIH UNTUK NEGERI', 'Lain-lain', 25, 'PCS', 'Rp. 42.800', 'Baik/Standar', '', '', 'BAST_21042022_KOMUNITAS_KASIH_UNTUK_NEGERI1.pdf', '21042022_SERAH_TERIMA_KOMUNITAS_KASIH_UNTUK_NEGERI.jpeg', '', ''),
(90, 'Mila', ' BONEKA KECIL ', '2022-06-09', '2022-04-21', 'Pihak Swasta', 'KOMUNITAS KASIH UNTUK NEGERI', 'Lain-lain', 60, 'PCS', 'Rp. 70.000', 'Baik/Standar', '', '', 'BAST_21042022_KOMUNITAS_KASIH_UNTUK_NEGERI2.pdf', '21042022_FOTO_BONEKA_DONASI.jpeg', '', ''),
(91, 'Mila', 'WTW HARDLED PH METERS GERMANY PH2110SETZ', '2022-06-09', '2022-06-08', 'Pemerintah Pusat', 'PT. PROLABMAS MURNI SWADAYA', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 14.055.930', 'Baik/Standar', '', '', 'BAST_08062022_PT__PROLABMAS_MURNI_SWADAYA_(FASYANKES)_08062022.pdf', 'PT__PROLABMAS_MURNI_SWADAYA_(FASYANKES)_08062022.jpeg', '', ''),
(92, 'Mila', 'THERMO SCIENTIFIC , CAT: 1384-G, BIOLOGI', '2022-06-09', '2022-06-09', 'Pemerintah Pusat', 'PT. ELO KARSA UTAMA (FASYANKES)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 108.175.050', 'Baik/Standar', '', '', 'BAST_09062022_PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_ATM_Biosefty_Cabinet_dan_Freezer_Alkes_2022.p', 'PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_Combined.pdf', '', ''),
(93, 'Mila', 'THERMOSCIENTIFIC, CAT: TSX 2330 FV, TSX ', '2022-06-09', '2022-06-09', 'Pemerintah Pusat', 'PT. ELO KARSA UTAMA (FASYANKES)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 183.705.000', 'Baik/Standar', '', '', 'BAST_09062022_PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_ATM_Biosefty_Cabinet_dan_Freezer_Alkes_20221.', 'PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_Combined1.pdf', '', ''),
(94, 'Mila', 'BIO-BOTTLE, CAT:BC1, BIO-BOTLLE COMPLETE', '2022-06-09', '2022-06-09', 'Pemerintah Pusat', 'PT. ELO KARSA UTAMA (FASYANKES)', 'Alat Kesehatan(BMN)', 10, 'UNIT', 'Rp. 3.607.500', 'Baik/Standar', '', '', 'BAST_09062022_PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_ATM_Biosefty_Cabinet_dan_Freezer_Alkes_20222.', 'PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_Combined2.pdf', '', ''),
(95, 'Mila', 'THERMO SCIENTIFIC, CAT:9501, PIPETTE AID', '2022-06-09', '2022-06-09', 'Pemerintah Pusat', 'PT. ELO KARSA UTAMA (FASYANKES)', 'Alat Kesehatan(BMN)', 1, 'UNIT', 'Rp. 8.130.750', 'Baik/Standar', '', '', 'BAST_09062022_PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_ATM_Biosefty_Cabinet_dan_Freezer_Alkes_20223.', 'PT__ELO_KARSA_UTAMA_(FASYANKES)_09062022_Combined3.pdf', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangdidistribusi`
--

CREATE TABLE `tb_barangdidistribusi` (
  `id_barang_didistribusi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `penerima_barang_distribusi` varchar(80) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `tanggal_terima_barang` varchar(10) NOT NULL,
  `tanggal_input_pendistribusian` varchar(10) NOT NULL,
  `tanggal_barang_didistribusi` varchar(10) NOT NULL,
  `asal_donatur` varchar(50) NOT NULL,
  `pemberi` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kuantitas` int(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan_harga` varchar(100) NOT NULL,
  `kondisi_barang` text NOT NULL,
  `laporan_distribusi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangdisimpan`
--

CREATE TABLE `tb_barangdisimpan` (
  `id_barang_disimpan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `tanggal_terima_barang` varchar(10) NOT NULL,
  `tanggal_input_penyimpanan` varchar(10) NOT NULL,
  `tanggal_barang_disimpan` varchar(10) NOT NULL,
  `tempat_penyimpanan_barang` varchar(100) NOT NULL,
  `asal_donatur` varchar(50) NOT NULL,
  `pemberi` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `kuantitas` int(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan_harga` varchar(100) NOT NULL,
  `kondisi_barang` text NOT NULL,
  `laporan_penyimpanan_logistik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barangdisimpan`
--

INSERT INTO `tb_barangdisimpan` (`id_barang_disimpan`, `id_barang`, `nama_barang`, `tanggal_terima_barang`, `tanggal_input_penyimpanan`, `tanggal_barang_disimpan`, `tempat_penyimpanan_barang`, `asal_donatur`, `pemberi`, `jenis_barang`, `kuantitas`, `satuan`, `keterangan_harga`, `kondisi_barang`, `laporan_penyimpanan_logistik`) VALUES
(30, 68, 'PEPSODENT MOUNTWASH', '2022-02-15', '2022-02-21', '2022-02-18', 'Gudang Rumah Tangga', 'Pihak Swasta', 'PT. UNILEVER TBK', 'Cairan Rumah Tangga', 1300, 'BOTOL', 'Rp. 30.500', 'Baik/Standar', ''),
(31, 69, 'MASKER BEDAH', '2022-02-18', '2022-02-21', '2022-02-18', 'Gudang Farmasi', 'Pihak Swasta', 'PT. MNG', 'Alat Pelindung Diri', 500, 'BOX', 'Rp. 28.900', 'Baik/Standar', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(2, 'Ariko', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(14, 'Siti Pratiekauri', 'uri', '98f595b444628720ed72fa8ed3c0b0aa', 'Admin'),
(15, 'Mila', 'mila', '0d5c82813c52b2d5ba31175a17303b82', 'Admin'),
(16, 'Ari', 'ari', 'f0ba8f9f389484af6f1a6ccc62a645d0', 'Admin'),
(18, 'Candra', 'candra', 'e999cd3950bd8db879e2fd401e95ed9d', 'Petugas Logistik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barangdidistribusi`
--
ALTER TABLE `tb_barangdidistribusi`
  ADD PRIMARY KEY (`id_barang_didistribusi`);

--
-- Indeks untuk tabel `tb_barangdisimpan`
--
ALTER TABLE `tb_barangdisimpan`
  ADD PRIMARY KEY (`id_barang_disimpan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tb_barangdidistribusi`
--
ALTER TABLE `tb_barangdidistribusi`
  MODIFY `id_barang_didistribusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_barangdisimpan`
--
ALTER TABLE `tb_barangdisimpan`
  MODIFY `id_barang_disimpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
