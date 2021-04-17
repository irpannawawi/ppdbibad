-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 12:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpppdbfix2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--
CREATE DATABASE IF NOT EXISTS   `ppdbibad`; 
Use `ppdbibad`;
CREATE TABLE `agenda` (
  `id_agenda` int(3) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kegiatan` text NOT NULL,
  `petugas` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `judul`, `kegiatan`, `petugas`, `tanggal`) VALUES
(1, 'registrasi ulang', '<p>registrasi ulang</p>', 'amar', '2020-04-17 12:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `no_daftar` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `user` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `kode_biaya` varchar(20) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`kode_biaya`, `nama_biaya`, `jumlah`) VALUES
('001', 'Atribut, Seragam Olahraga, kain sasirangan utkPutr', 175000),
('002', 'Atribut, seragam olahraga, kain sasirangan, jilbab', 225000);

-- --------------------------------------------------------

--
-- Table structure for table `bukukas`
--

CREATE TABLE `bukukas` (
  `id_kas` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `debet` int(10) NOT NULL,
  `kredit` int(10) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `user` int(2) NOT NULL,
  `id_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `no_daftar` varchar(20) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `saudara` int(3) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `berat` int(3) NOT NULL,
  `kebutuhan_khusus` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `dusun` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `jenis_tinggal` varchar(100) NOT NULL,
  `alat_transportasi` varchar(100) NOT NULL,
  `jarak` varchar(10) NOT NULL,
  `waktu_tempuh` varchar(5) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `skhun` varchar(20) NOT NULL,
  `nopes_ujian` varchar(20) NOT NULL,
  `no_ijazah` varchar(20) NOT NULL,
  `no_kps` varchar(50) NOT NULL,
  `nama_ayah` varchar(150) NOT NULL,
  `tahun_lahir_ayah` int(4) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` varchar(100) NOT NULL,
  `nohp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(150) NOT NULL,
  `tahun_lahir_ibu` int(4) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` varchar(100) NOT NULL,
  `nohp_ibu` int(15) NOT NULL,
  `nama_wali` varchar(150) NOT NULL,
  `tahun_lahir_wali` int(4) NOT NULL,
  `pendidikan_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `penghasilan_wali` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `daftar_ulang` int(3) NOT NULL,
  `status_bayar` int(3) NOT NULL,
  `baju` varchar(20) NOT NULL,
  `jenis_daftar` varchar(10) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sekolah_lain` varchar(100) DEFAULT NULL,
  `status_santrinya` varchar(20) DEFAULT NULL,
  `status_sekolah` varchar(50) DEFAULT NULL,
  `nama_kecil_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `alamat_dua` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(100) DEFAULT NULL,
  `noreg_akta` text,
  `hobi` varchar(50) DEFAULT NULL,
  `citacita` varchar(100) DEFAULT NULL,
  `no_kks` varchar(50) DEFAULT NULL,
  `penerima_kps` varchar(50) DEFAULT NULL,
  `usulan_pip` varchar(50) DEFAULT NULL,
  `penerima_kip` varchar(50) DEFAULT NULL,
  `no_kip` varchar(50) DEFAULT NULL,
  `tertera_kip` varchar(50) DEFAULT NULL,
  `terima_kip` varchar(50) DEFAULT NULL,
  `alasan_pip` varchar(50) DEFAULT NULL,
  `npsn_sekolah_asal` varchar(50) DEFAULT NULL,
  `kab_sekolah_asal` varchar(50) DEFAULT NULL,
  `kode_jenissekolah` varchar(20) DEFAULT NULL,
  `no_kk` int(30) DEFAULT NULL,
  `nik_ayah` int(30) DEFAULT NULL,
  `nik_ibu` int(30) DEFAULT NULL,
  `nss_sekolah` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`no_daftar`, `jurusan`, `asal_sekolah`, `nik`, `nis`, `nama`, `username`, `password`, `foto`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `anak_ke`, `saudara`, `tinggi`, `berat`, `kebutuhan_khusus`, `alamat`, `rt`, `rw`, `dusun`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `jenis_tinggal`, `alat_transportasi`, `jarak`, `waktu_tempuh`, `hp`, `email`, `skhun`, `nopes_ujian`, `no_ijazah`, `no_kps`, `nama_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `nohp_ayah`, `nama_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `nohp_ibu`, `nama_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `angkatan`, `nisn`, `daftar_ulang`, `status_bayar`, `baju`, `jenis_daftar`, `tgl_daftar`, `sekolah_lain`, `status_santrinya`, `status_sekolah`, `nama_kecil_ibu`, `alamat_ortu`, `alamat_dua`, `alamat_wali`, `noreg_akta`, `hobi`, `citacita`, `no_kks`, `penerima_kps`, `usulan_pip`, `penerima_kip`, `no_kip`, `tertera_kip`, `terima_kip`, `alasan_pip`, `npsn_sekolah_asal`, `kab_sekolah_asal`, `kode_jenissekolah`, `no_kk`, `nik_ayah`, `nik_ibu`, `nss_sekolah`) VALUES
('P001', '15%', 'S001', '133313', '', 'COBA NOPEN', '', '', '', 'L', 'SLEMAN', '2020-04-01', 'ISLAM', 0, 0, 0, 0, '', 'YOGYAKARTA DEPOK CONDONG CATUR SLEMAN', '', '', '', 'SLEMAN', 'TEPEL', '', '', 0, '', '', '', '', '081325220787', '', '', '', '', '', 'g', 0, '', '', '', '', 'g', 0, '', '', '', 0, '', 0, '', '', '', 0, '1311232', 1, 0, 'diverifikasi', 'online', '2020-04-03 03:15:04', '', '', 'NEGERI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '001', NULL, NULL, NULL, NULL),
('P002', '30%', 'S004', '1212', '', 'supri', '', '', '', 'P', 'sleman', '2020-04-03', '', 0, 0, 0, 0, '', 'yogyakarta depok condong catur sleman', '', '', '', 'ff', 'ff', '', '', 0, '', '', '', '', '081325220787', '', '', '', '', '', 'ff', 0, '', '', '', '', 'ff', 0, '', '', '', 0, '', 0, '', '', '', 0, '121212', 1, 0, 'diterima', '', '2020-04-03 09:22:34', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '001', NULL, NULL, NULL, NULL),
('P003', '30%', 'S001', '36356', '', 'COBA JENISSEKOLAH', '', '', '', 'L', 'SLEMAN', '2020-04-03', 'ISLAM', 0, 0, 0, 0, '', 'YOGYAKARTA DEPOK CONDONG CATUR SLEMAN', '', '', '', 'YY', 'YY', '', '', 0, '', '', '', '', '081325220787', '', '', '', '', '', 'amar', 0, 'SD Sederajat', 'Buruh', 'Kurang dari Rp. 500.000', '', 'hgh', 0, 'SMP Sederajat', 'Tenaga Kerja Indonesia', 'Rp. 2jt s/d Rp. 4 jt', 0, '', 0, '', '', '', 0, '3563', 1, 0, 'tidak', 'online', '2020-04-03 09:35:11', '', '', 'NEGERI', 'dghd', 'dhd', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '003', 123, 1233441, 13131313, '34434');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_transfer`
--

CREATE TABLE `gambar_transfer` (
  `id_transfer` int(6) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `tipe_file` varchar(20) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(3) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `menu`, `icon`, `text`, `status`) VALUES
(1, 'Alur Pendaftaran', 'assignment', '<p style=\"text-align: center;\"><span style=\"color: #0000ff;\"><strong><span style=\"font-size: 18pt;\">ALUR PENDAFTARAN CALON SISWA BARU</span></strong></span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>Calon siswa mendaftar melalui link&nbsp;</li>\r\n<li>Setelah memasukkan data harap langsung print/cetak bukti pendaftaran</li>\r\n<li>Lengkapi data diri dengan cara login pada web ppdb pada link =&gt;</li>\r\n<li>setelah melengkapi data Cetak Lagi Bukti Daftar dan langsung ke sekolah&nbsp; untuk verifikasi berkas jangan lupa bawa persyaratan verifikasi berkas. [*<strong>syarat verifikasi berkas ada pada web ini maupun web utama</strong>]</li>\r\n<li>Calon siswa akan mendapat cap sekolah/bukti verifikasi setelah berkas di verifikasi. [bisa dilihat pada menu&nbsp;<strong>Data Pendaftar</strong>]</li>\r\n<li>Calon Siswa Menunggu Hasil Pengumuman PPDB dan bisa langsung melihat hasil pengumuman sesuai tanggal pengumuman pada link berikut ini&nbsp;</li>\r\n</ol>', 1),
(2, 'Syarat Verifikasi', 'assignment', '<p style=\"text-align: center;\"><span style=\"font-size: 24px; color: #ff9900;\"><strong>SYARAT VERIFIKASI BERKAS</strong></span></p>\r\n<p style=\"text-align: left;\">Calon siswa baru datang ke sekolah&nbsp; wajib membawa:</p>\r\n<ol>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Bukti Cetak registrasi online Calon Siswa Baru</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy SKHUN/SKBYS yang dilegalisir (Memperlihatkan aslinya dan bisa ditambah menyusul jika sudah ada)</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy Ijazah yang dilegalisir</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>1 Lembar Fotocopy Kartu Keluarga yang dilegalisir</strong></h3>\r\n</li>\r\n<li style=\"text-align: left;\">\r\n<h3><strong>Foto 3x4 Latar Belakang Merah 2 Lembar</strong></h3>\r\n</li>\r\n</ol>\r\n<p>Tambahkan Lampiran Jika Memiliki :</p>\r\n<ol>\r\n<li><strong>Fotocopy Sertifikat prestasi yang relevan dan dilegalisir</strong></li>\r\n<li><strong>Fotocopy KKM/KKS/KIP/KPs yang masih berlaku</strong></li>\r\n</ol>', 1),
(3, 'Petunjuk Pengisian Registrasi', 'info', '<h3>UNTUK PETUNJUK PENGISIAN FORMULIR CALON SISWA BARU LIHAT VIDEO DIBAWAH INI:</h3>\r\n<p>klik tulisan PUTAR VIDEO dibawah ini nanti akan diarahkan ke alamat video di web resmi&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2><span style=\"background-color: #ccffcc;\"><strong>PUTAR VIDEO</strong></span></h2>', 1),
(4, 'Info Kontak', 'call', '<p style=\"text-align: center;\"><strong>DAFTAR KONTAK</strong></p>\r\n<p style=\"text-align: center;\"><strong>-------------------------------------</strong></p>\r\n<p style=\"text-align: justify;\">jika ada yang kurang jelas dengan sistem pendaftaran ini silahkan ditanyakan melalui kontak dan whatsapp dibawah ini:</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sekolah`
--

CREATE TABLE `jenis_sekolah` (
  `id_jenissekolah` varchar(20) NOT NULL,
  `nama_jenissekolah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_sekolah`
--

INSERT INTO `jenis_sekolah` (`id_jenissekolah`, `nama_jenissekolah`) VALUES
('001', 'SMP INTERNASIONAL'),
('002', 'Madrasah'),
('003', 'SMK INTERNASIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jur` varchar(10) NOT NULL,
  `nama_jur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jur`, `nama_jur`) VALUES
('15%', 'Otomatisasi & Tata Kelola Perkantoran'),
('30%', 'Akuntansi & Keuangan Lembaga'),
('5%', 'Tata Busana'),
('50%', 'Perhotelan');

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `kode_mou` varchar(5) NOT NULL,
  `sekolah_mou` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mou`
--

INSERT INTO `mou` (`kode_mou`, `sekolah_mou`, `status`, `jumlah`) VALUES
('S001', 'SMPN 1 TEMPEL', 'ya', 0),
('S002', 'SMPN 2 TEMPEL', 'ya', 0),
('S003', 'SMPN 3 TEMPEL', 'ya', 0),
('S004', 'SMPN 4 TEMPEL', 'ya', 0),
('S005', 'SMP MUHAMMADIYAH 1 TEMPEL', 'ya', 0),
('S006', 'SMPN 1 TURI', 'ya', 0),
('S007', 'SMPN 2 TURI', 'ya', 0),
('S008', 'SMPN 3 TURI', 'ya', 0),
('S009', 'SMP MUHAMMADIYAH TURI', 'ya', 0),
('S010', 'SMP SANTO ALOYSIUS TURI', 'ya', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengawas`
--

CREATE TABLE `pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawas`
--

INSERT INTO `pengawas` (`id_pengawas`, `nip`, `nama`, `jabatan`, `username`, `password`, `level`, `foto`) VALUES
(51, '-', 'Admin PPDB', '', 'admin', '$2y$10$490bmAlDpn5e.Cq75bWd6uPm4lOnlBZlfs.k7J/NLLF0.sftOKixa', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user` int(3) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `type`, `judul`, `user`, `text`, `date`) VALUES
(2, '', 'PENGUMUMAN CALON SISWA YANG DINYATAKAN DITERIMA', 0, '<p>Untuk <strong>INFO</strong> Kelulusan akan bisa diakses pada tanggal&nbsp;</p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 1: 12 APRIL 2020</strong></span></p>\r\n<p><span style=\"font-size: 24pt;\"><strong>Gelombang 2: 7 JULI 2020</strong></span></p>\r\n<p>&nbsp;</p>', '2020-03-09 05:19:01'),
(3, '', 'INFO PENGISIAN', 0, '<p>*harap isi sesuai data pribadi masing masing</p>\r\n<p>* untuk nama data wali silahkan diisi jika tidak tinggal bersama orang tua dan kosongkan bila tinggal bersama orang tua</p>', '2020-03-26 04:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `santristatus`
--

CREATE TABLE `santristatus` (
  `kode_status` varchar(20) NOT NULL,
  `nama_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `santristatus`
--

INSERT INTO `santristatus` (`kode_status`, `nama_status`) VALUES
('aktif', 'aktif'),
('alumni', 'alumni');

-- --------------------------------------------------------

--
-- Table structure for table `seragam`
--

CREATE TABLE `seragam` (
  `kode_seragam` varchar(20) NOT NULL,
  `ukuran_seragam` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seragam`
--

INSERT INTO `seragam` (`kode_seragam`, `ukuran_seragam`) VALUES
('diterima', 'diterima'),
('diverifikasi', 'diverifikasi'),
('tidak', 'tidak diterima');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_time` varchar(10) NOT NULL,
  `session_hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_time`, `session_hash`) VALUES
(1, '1447610188', '$2y$10$dt9BTs7FlTXgpactflaXPOSVWrs.wurWsKBGv18JkzolJmHZOj.B.');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `aplikasi` varchar(100) NOT NULL,
  `kode_sekolah` varchar(10) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `web` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `header` text NOT NULL,
  `header_kartu` text NOT NULL,
  `open_ppdb` varchar(10) NOT NULL,
  `close_ppdb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `aplikasi`, `kode_sekolah`, `sekolah`, `jenjang`, `kepsek`, `nip`, `alamat`, `kecamatan`, `kota`, `telp`, `fax`, `web`, `email`, `logo`, `header`, `header_kartu`, `open_ppdb`, `close_ppdb`) VALUES
(1, 'PPDB ONLINE', 'R1', 'NAMA SEKOLAH', 'SMK', 'NAMA KEPSEK', '19454', 'alamat isi disini', 'kec', 'kab', '081325220787', '-', 'https://xx.sch.id', 'email@gmail.com', 'images/logoapp.png', 'FORMULIR PENDAFTARAN CALON SISWA BARU', 'KARTU PESERTA \nPENILAIAN AKHIR SEMESTER', '2020-03-17', '2020-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `kode_kelamin` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`kode_kelamin`, `jenis_kelamin`) VALUES
('L', 'L'),
('P', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `bukukas`
--
ALTER TABLE `bukukas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`no_daftar`);

--
-- Indexes for table `gambar_transfer`
--
ALTER TABLE `gambar_transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jenis_sekolah`
--
ALTER TABLE `jenis_sekolah`
  ADD PRIMARY KEY (`id_jenissekolah`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jur`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`kode_mou`);

--
-- Indexes for table `pengawas`
--
ALTER TABLE `pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `santristatus`
--
ALTER TABLE `santristatus`
  ADD PRIMARY KEY (`kode_status`);

--
-- Indexes for table `seragam`
--
ALTER TABLE `seragam`
  ADD PRIMARY KEY (`kode_seragam`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`kode_kelamin`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bukukas`
--
ALTER TABLE `bukukas`
  MODIFY `id_kas` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gambar_transfer`
--
ALTER TABLE `gambar_transfer`
  MODIFY `id_transfer` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengawas`
--
ALTER TABLE `pengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(3) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `daftar` (`no_daftar`) ON DELETE CASCADE;

--
-- Constraints for table `bukukas`
--
ALTER TABLE `bukukas`
  ADD CONSTRAINT `bukukas_ibfk_1` FOREIGN KEY (`id_bayar`) REFERENCES `bayar` (`id_bayar`) ON DELETE CASCADE;

--
-- Constraints for table `gambar_transfer`
--
ALTER TABLE `gambar_transfer`
  ADD CONSTRAINT `gambar_transfer_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `daftar` (`no_daftar`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
